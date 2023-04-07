<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\ConsultantKaikin;
use App\Models\Koukoku;
use Carbon\Carbon;
use App\Jobs\InvoiceEmailJob;
use App\User;

class InvoiceMonthlyEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'invoice:monthly_email';

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
        $users = User::where('available', 1)->where('need_pay', 1)->get();
        $startOfLastMonth = Carbon::now()->subMonth()->startOfMonth();
        $endOfLastMonth = Carbon::now()->subMonth()->endOfMonth();
        $lastMonth = Carbon::now()->subMonth();
        $formattedLastMonth = $lastMonth->format('Y年m月');
        $month = $lastMonth->format('m月');
        $thisMonth25th = Carbon::now()->startOfMonth()->addDays(24);
        $formattedThisMonth25th = $thisMonth25th->format('Y年m月d日');
        foreach ($users as $user) {
            $kakin = ConsultantKakin::whereBetween('created_at', [$startOfLastMonth, $endOfLastMonth])->where('user_id', $user->id)->first();
            $koukoku = Koukoku::where('date', $formattedLastMonth)->where('user_id', $user->id)->first();

            if (!is_null($kakin) || !is_null($koukoku)) {
                InvoiceEmailJob::dispatch($user, $month, $startOfLastMonth->format('Y年m月d日'), $endOfLastMonth->format('Y年m月d日'), $formattedThisMonth25th);
            }
        }
    }
}
