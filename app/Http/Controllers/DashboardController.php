<?php

namespace App\Http\Controllers;

use App\Associate;
use App\Attraction;
use App\Event;
use App\Reservation;

class DashboardController extends Controller
{
    /**
     * Create a new Dashboard instance
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     * 
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        $data = [
            'associatesCount' => Associate::where('is_active', true)->count(),
            'eventsCount' => Event::where('is_cancelled', false)->count(),
            'reservationsCount' => Reservation::count(),
            'attractionsCount' => Attraction::count(),
        ];

        return view('dashboard', $data);
    }
}
