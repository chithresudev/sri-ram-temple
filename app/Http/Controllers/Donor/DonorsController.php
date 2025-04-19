<?php

namespace App\Http\Controllers\Donor;

use App\Models\Donor;
use App\Models\Donation;
use App\Models\FamilyDetails;
use App\Models\Printable;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\DonorsImport;
use Illuminate\Http\Request;

class DonorsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth'); // Ensure only authenticated users can access these methods
    }


    public function index()
    {
        $donation = Donation::get();

        $start = Carbon::now()->startOfMonth();
        $end = Carbon::parse($start)->endOfMonth();

        $total = Donor::count();
        $month = Donor::whereBetween('created_at', [$start, $end])->count();
        $today = Donor::whereDay('created_at', Carbon::today())->count();

        $upcoming_dob = FamilyDetails::orderBy('dob', 'asc')->take(10)->get();

        $summary = [
            'total_donor' => $total,
            'month_donor' => $month,
            'today_donor' => $today,
            'ups' => $upcoming_dob
        ];

        return view('dashboard.index', $summary);
    }



    /**
     * Display the donor creation form.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('donor.create');
    }

    /**
     * Store bulk donors from an uploaded Excel file.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request)
    {
        // Ensure the file is uploaded
        if ($request->hasFile('donor')) {
            // Import the Excel file using DonorsImport
            Excel::import(new DonorsImport, $request->file('donor'));

            // Redirect back with a success message
            return back()->with('status', 'Donors imported successfully!');
        }

        // If no file is uploaded, redirect back with an error message
        return back()->with('error', 'Please upload a valid file!');
    }

    /**
     * Store a newly created donor.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Donor $donors, Request $request)
    {
        $donor = new Donor();
        $donor->name = $request->head_name;
        $donor->phone1 = $request->phone1;
        $donor->phone2 = $request->phone2;
        $donor->city = $request->city;
        $donor->address1 = $request->address1;
        $donor->address2 = $request->address2;
        $donor->district = $request->district;
        $donor->country = $request->country;
        $donor->state = $request->state;
        $donor->dob = $request->dob;
        $donor->pincode = $request->pincode;
        $donor->rasi = $request->head_rasi;
        $donor->natchathiram = $request->head_natchathiram;
        $donor->type = $request->type;
        $donor->others_detail = $request->others_detail;
        $donor->save();

        if ($request->donation_type == 'now') {
            $donation = new Donation();
            $donation->donor_id = $donors->lastid;
            $donation->amount = $request->amount;
            $donation->amount = $request->via;
            $donation->save();
        }

        if ($request->family_type == 'add_now') {

            foreach ($request->f_name as $key => $value) {
                $family = new FamilyDetails();
                $family->donor_id = $donors->lastid;
                $family->name = $request->f_name[$key];
                $family->dob = $request->f_dob[$key];
                $family->rasi = $request->f_rasi[$key];
                $family->natchathiram = $request->f_natchathiram[$key];
                $family->save();
            }
        }

        return redirect()->route('donors.create')->with('status', 'New Devotee Added Successfully!');
    }

    /**
     * Display all donors.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewAll()
    {
        $donors = Donor::orderBy('created_at', 'desc')->get(); // Get all donors
        return view('donor.view-all', ['donors' => $donors]);
    }

    /**
     * Display the details of a single donor.
     *
     * @param  \App\Models\Donor  $donor
     * @return \Illuminate\Http\Response
     */
    public function donorDetails(Donor $donor)
    {
        return view('donor.view-donors', ['donor' => $donor]);
    }

    /**
     * Add a donation amount for a donor.
     *
     * @param  \App\Models\Donor  $donor
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function donationAmt(Donor $donor, Request $request)
    {
        // Validate the donation amount
        // $validatedDonation = $request->validate([
        //     'amount' => 'required|numeric|min:1',
        //     'donation_details' => 'nullable|string|max:255',
        //     'via' => 'nullable|string|max:255',
        // ]);

        // Create a new donation record
        $donation = new Donation();
        $donation->donor_id = $donor->id;
        $donation->amount = $request->amount;
        $donation->donation_details = $request->donation_details;
        $donation->via = $request->via;
        $donation->save();

        return back()->with('status', 'Donation Added Successfully!');
    }

    /**
     * Remove donation record.
     *
     * @param  \App\Models\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function otherAction(Donation $donation)
    {

        $donation->delete();
        return back()->with('status', 'Donation Removed Successfully!');
    }

    public function searchable()
    {
        $query = app('request');

        $donors = Donor::query();

        if ($query->filter_by != 'all') {
            if ($query->filter_by && $query->search_by) {
                $donors = $donors->where($query->filter_by, 'like', '%' . $query->search_by . '%');
            }

            if ($query->filter_by_2 && $query->search_by_2) {
                $donors = $donors->where($query->filter_by_2, 'like', '%' . $query->search_by_2 . '%');
            }
        } else {
            $donors =  $donors;
        }

        $donors =  $donors->get();

        return view('donor.view-all', ['donors' => $donors]);
    }

    /**
     * Add family members for a donor.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Donor  $donor
     * @return \Illuminate\Http\Response
     */
    public function addFamily(Request $request, Donor $donor)
    {
        foreach ($request->name as $key => $value) {
            $family = new FamilyDetails();
            $family->donor_id = $donor->id;
            $family->name = $request->name[$key];
            $family->dob = $request->dob[$key];
            $family->rasi = $request->rasi[$key];
            $family->natchathiram = $request->natchathiram[$key];
            $family->save();
        }
        return back()->with('status', 'Family Members Added Successfully!');
    }

    /**
     * Remove a family member.
     *
     * @param  \App\Models\FamilyDetails  $family
     * @return \Illuminate\Http\Response
     */
    public function removeFamily(FamilyDetails $family)
    {
        $family->delete();
        return back()->with('status', 'Family Member Removed Successfully!');
    }

    /**
     * Remove a donor.
     *
     * @param  \App\Models\Donor  $donor
     * @return \Illuminate\Http\Response
     */
    public function removeDonor(Donor $donor)
    {
        $donor->delete();
        return back()->with('status', 'Devotee Removed Successfully!');
    }



    /**
     * Print the donor address.
     *
     * @return \Illuminate\Http\Response
     */
    public function printAddress(Request $request)
    {
        $session_id = session('ids') ?? []; // Handle session fallback if empty

        $donors = Donor::when(request()->has('id'), function ($query) {
            return $query->where('id', request('id'));
        })->when($session_id, function ($query1) use ($session_id) {
            return $query1->whereIn('id', $session_id);
        })->get();

        if (!count($donors)) {
            return back()->with('status', 'No data available. Unable print');
        }

        foreach ($donors as $key => $donor) {
            $print = new Printable;
            $print->user_id = auth()->user()->id;
            $print->donor_id = $session_id[$key] ?? null;
            $print->save();
        }

        return view('donor.print-address', compact('donors'));
    }
    /**
     * Print the donor address.
     *
     * @return \Illuminate\Http\Response
     */
    public function labelPrintAddress(Request $request)
    {
        $session_id = session('ids') ?? []; // Handle session fallback if empty

        $donors = Donor::when(request()->has('id'), function ($query) {
            return $query->where('id', request('id'));
        })->when($session_id, function ($query1) use ($session_id) {
            return $query1->whereIn('id', $session_id);
        })->get();


        if (!count($donors)) {
            return back()->with('status', 'No data available. Unable print');
        }


        foreach ($donors as $key => $donor) {
            $print = new Printable;
            $print->user_id = auth()->user()->id;
            $print->donor_id = $session_id[$key] ?? null;
            $print->save();
        }

        return view('donor.label-print-address', compact('donors'));
    }
}
