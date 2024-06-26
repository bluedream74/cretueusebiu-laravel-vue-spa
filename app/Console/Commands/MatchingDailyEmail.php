<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use App\Models\Consultant;
use App\Models\AvailableContent;
use App\Models\AvailableAmount;
use App\Models\AvailableJob;
use App\Models\AvailablePrice;
use App\Models\ConsultantAnswer;
// Carbonをインポート
use Carbon\Carbon;
// MatchingDailyEmailJobをインポート
use App\Jobs\MatchingDailyEmailJob;

class MatchingDailyEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'matching:daily_email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $users = User::all();
        foreach ($users as $user) {
            // ユーザーにマッチングされている案件を取得する
            $available_contents = AvailableContent::where('user_id', $user->id)->get();
            $available_contents = $available_contents->map(function($item) {
                return $item->content_id;
            })->toArray();
            $available_amounts = AvailableAmount::where('user_id', $user->id)->get();
            $available_amounts = $available_amounts->map(function($item) {
                return $item->amount_id;
            })->toArray();
            $available_jobs = AvailableJob::where('user_id', $user->id)->get();
            $available_jobs = $available_jobs->map(function($item) {
                return $item->job_id;
            })->toArray();
            $available_prices = AvailablePrice::where('user_id', $user->id)->get();
            $available_prices = $available_prices->map(function($item) {
                return $item->price_id;
            })->toArray();
            $consultants = Consultant::where('available', 1)->get();
            $filtered = $consultants->filter(function($item) use ($user) {
                $answers = ConsultantAnswer::where('consultant_id', $item->id)->get();
                $answers_count = ConsultantAnswer::where('consultant_id', $item->id)->count();

                if ($answers_count == 0) {
                    return true;
                }
                $consultant = $answers->first(function($answer) use ($user) {
                    return $answer->user_id == $user->id;
                });

                return is_null($consultant);
            });

            $filtered = $filtered->filter(function($item) {
                return $item->available == 1 && Carbon::parse($item->expired_at)->isFuture(Carbon::now());
            });

            $filtered = $filtered->filter(function($item) use ($available_amounts, $available_jobs, $available_contents, $available_prices) {
                $confirms = $item->confirms->map(function($confirm) {
                    return $confirm->confirm_id;
                })->toArray();
                $misss = $item->misss->map(function($miss) {
                    return $miss->miss_id;
                })->map(function($miss) {
                    if($miss == 0) {
                        return [0, 1, 2, 6, 8];
                    } else if ($miss == 1) {
                        return [0, 1, 2, 6];
                    } else if ($miss == 2) {
                        return [0, 1, 2, 6];
                    } else if ($miss == 3) {
                        return [0, 1, 2, 8];
                    } else if ($miss == 4) {
                        return [0, 1, 2, 8];
                    } else if ($miss == 5) {
                        return [0, 1, 2, 6];
                    } else if ($miss == 6) {
                        return [11];
                    } else if ($miss == 7) {
                        return [1, 5, 7, 9];
                    } else if ($miss == 8) {
                        return [1, 5, 7, 9];
                    } else if ($miss == 9) {
                        return [3];
                    } else if ($miss == 10) {
                        return [0, 1, 2, 6];
                    } else if ($miss == 11) {
                        return [6];
                    } else if ($miss == 12) {
                        return [0, 1];
                    } else if ($miss == 13) {
                        return [0, 1];
                    } else if ($miss == 14) {
                        return [4];
                    } else if ($miss == 15) {
                        return [0, 3];
                    } else if ($miss == 16) {
                        return [10];
                    } else if ($miss == 17) {
                        return [11];
                    } else if ($miss == 18) {
                        return [0, 1, 2];
                    } else if ($miss == 19) {
                        return [2, 3];
                    }
                });

                $flag1 = false;
                if (count($this->intersection($available_contents, $confirms)) > 0) {
                    $flag1 = true;
                }

                $flag = false;
                foreach($misss as $miss) {
                    if (count($this->intersection($available_contents, $miss)) > 0) {
                        $flag = true;
                    }
                }

                if ($flag == true) {
                    $flag1 = true;
                }

                if ($flag1 == false) {
                    return false;
                }

                if (in_array($item->amount, $available_amounts)) {
                    $flag1 = true;
                } else {
                    return false;
                }

                if (in_array($item->job, $available_jobs)) {
                    $flag1 = true;
                } else {
                    return false;
                }
                
                if (in_array($item->price, $available_prices)) {
                    $flag1 = true;
                } else {
                    return false;
                }

                return true;
            });

            $newJobs = $filtered->filter(function($item) {
                // 24時間以内のものをFilterする
                \Log::info($item->created_at);
                return Carbon::parse($item->created_at)->gt(Carbon::now()->subDay());
            });
            

            if (count($newJobs) > 0) {
                \Log::info($user->email.' '.count($newJobs));
                //　MatchingDailyEmailJobを利用して、メールを送信する
                MatchingDailyEmailJob::dispatch($user, $filtered, $newJobs);
            }
        }
    }

    private function intersection($arrA, $arrB) {
        return array_values(array_filter($arrA, function ($x) use ($arrB) {
            return in_array($x, $arrB);
        }));
    }
}
