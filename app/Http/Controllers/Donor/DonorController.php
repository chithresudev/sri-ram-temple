<?php

namespace App\Http\Controllers\Donor;

use App\Donor;
use App\Donation;
use App\FamilyDetails;
use App\Imports\DonorsImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Printable;

class DonorController extends Controller
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


  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return view('donor.create');
    //
    // $donors = Donor::paginate(5);
    // return view('donor.donors', ['donors' => $donors]);
  }

  /**
   * Store Bulk donors.
   *
   */
  public function import(Request $request)
  {

    // Check if the file was uploaded
    if ($request->hasFile('donor')) {
      // Import the Excel file using DonorsImport
      Excel::import(new DonorsImport, $request->file('donor'));

      // Redirect back with a success message
      return back()->with('status', 'All good!');
    }

    // If no file is uploaded, redirect back with an error message
    return back()->with('error', 'Please upload a valid file!');
  }

  /**
   * Store a newly created in donors.
   *
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
    return redirect()->route('donors.create')->with('status', 'New Donor Added Successfully!');
  }

  /**
   * Display the specified view all.
   *
   */
  public function viewAll()
  {
    $donors = Donor::get();

    return view('donor.view-all', ['donors' => $donors]);
  }

  /**
   * Display the specified single donors details.
   *
   */

  public function donarDetails(Donor $donor)
  {

    return view('donor.view-donors', ['donor' =>  $donor]);
  }

  /**
   * Add donation amount.
   *
   */

  public function donationAmt(Donor $donor, Request $request)
  {
    $donation = new Donation;
    $donation->donor_id = $donor->id;
    $donation->amount = $request->amount;
    $donation->donation_details = $request->donation_details;
    $donation->via = $request->via;
    $donation->save();

    return back()->with('status', 'Added Successfully!');
  }

  public function otherAction(Donation $donation)
  {
    $query = app('request');
    if ($query->has('remove_amount')) {

      Donation::where('id', $donation->id)->delete();
      return back()->with('status', 'Removed Successfully!');
    }
  }

  public function edit(Donor $donor)
  {
    return 'ok';
  }

  /**
   * Update the specified in donors.
   *
   */
  public function update(Request $request, Donor $donor)
  {
    $donor->name = $request->name;
    $donor->phone = $request->phone;
    $donor->doorno = $request->door_no;
    $donor->address1 = $request->address1;
    $donor->address2 = $request->address2;
    $donor->district = $request->district;
    $donor->state = $request->state;
    $donor->pincode = $request->pincode;
    $donor->type = $request->type;
    $donor->others_detail = $request->others_detail;
    $donor->save();

    return redirect()->route('donors.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Donor  $donor
   * @return \Illuminate\Http\Response
   */
  public function destroy(Donor $donor) {}



  /**
   * Display a listing of the donations.
   *
   * @return \Illuminate\Http\Response
   */
  public function donations()
  {
    $donations = Donation::get();
    return view('donor.donations', ['donationss' =>  $donations]);
  }

  /**
   * Show the form for add donation for the specified donor.
   *
   * @param  \App\Donor  $donor
   * @return \Illuminate\Http\Response
   */
  public function donationForm(Donor $donor)
  {
    //
  }

  /**
   * Add the specified donor's donation.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Donor  $donor
   * @return \Illuminate\Http\Response
   */
  public function donate(Request $request, Donor $donor)
  {
    //
  }

  public function searchable()
  {
    $query = app('request');

    if ($query->filter_by == 'all') {
      $donors = Donor::get();
    } else {
      $donors = Donor::where($query->filter_by, 'like', '%' . $query->search_by . '%')->get();
    }
    return view('donor.view-all', ['donors' => $donors]);
  }

  public function addfamily(Request $request, Donor $donor)
  {
    foreach ($request->name as $key => $value) {
      $family = new FamilyDetails;
      $family->donor_id = $donor->id;
      $family->name = $request->name[$key];
      $family->dob = $request->dob[$key];
      $family->rasi = $request->rasi[$key];
      $family->natchathiram = $request->natchathiram[$key];
      $family->save();
    }
    return back();
  }

  public function removeFamily(Request $request, FamilyDetails $family)
  {
    $family->delete();
    return back()->with('status', 'Removed Successfully family detail!');
  }
  public function removeDonor(Donor $donor)
  {
    $donor->delete();
    return back()->with('status', 'Removed Successfully Donor!');
  }

  public function printAddress()
  {
    $query = app('request');
    $session_id = session('ids');


    if ($query->has('id')) {

      $print = new Printable();
      $print->user_id = auth()->user()->id;
      $print->donor_id = $query->id;
      $print->save();

      $donors = Donor::where('id', $query->id)->get();
    } else {

      for ($i = 0; $i < count($session_id); $i++) {
        $print = new Printable;
        $print->user_id = auth()->user()->id;
        $print->donor_id = $session_id[$i];
        $print->save();
      }
      $donors = Donor::whereIn('id', $session_id)->get();
    }

    return view('donor.print-address', compact('donors'));
  }
}
