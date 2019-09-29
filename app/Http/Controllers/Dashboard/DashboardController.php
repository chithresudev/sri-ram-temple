<?php

namespace App\Http\Controllers\Dashboard;

use App\Donation;
use App\Donor;
use App\FamilyDetails;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
      $donation = Donation::get();

      $start = Carbon::now()->startOfMonth();
      $end = Carbon::parse($start)->endOfMonth();

      $total = Donor::count();
      $month = Donor::whereBetween('created_at', [$start, $end])->count();
      $today = Donor::where('created_at', Carbon::today())->count();

      $upcoming_dob = FamilyDetails::orderBy('dob', 'asc')->take(10)->get();
  
      $summary = [
        'total_donor' => $total,
        'month_donor' => $month,
        'today_donor' => $today,
        'ups' => $upcoming_dob
      ];

      return view('dashboard.index', $summary);
    }

    public function settings()
    {
        return view('dashboard.settings');
    }
}
