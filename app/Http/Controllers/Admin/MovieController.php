<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Services\MovieService;
use App\User;
use App\Models\Admin\Admin;
use Illuminate\Support\Facades\Auth;

class MovieController extends BaseController
{
    /**
     * @var MovieService
     */
    protected $service;

    /**
     * MovieController constructor
     * 
     */
    public function __construct(
        MovieService $service
    )
    {
        $this->service = $service;
    }

    public function getAllMovies() {
        $movies = $this->service->getAllMovies();

        return response()->json([
            'movies' => $movies
        ]);
    }

    public function getMovieDetailInfo($id) {
        $movie_detail = $this->service->getMovieDetailInfo($id);

        return response()->json([
            'movie_detail' => $movie_detail
        ]);
    }

    public function blockMovie(Request $request)
    {
        $flag = $this->service->blockMovie($request->input('movie_id'));

        return response()->json([
            'flag' => $flag
        ]);
    }

    public function pickupMovie(Request $request) {
        $this->service->pickupMovie($request->all());

        return response()->json([
            'flag' => true
        ]);
    }
}
