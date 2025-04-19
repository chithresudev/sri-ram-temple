@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <div class="card custom-card h-auto">

                    <div class="card-header">
                        Devotee Details
                        <div class="float-right">
                            <a href="{{ route('donors.view') }}" class="btn btn-info btn-sm">
                                Back
                            </a>
                        </div>
                    </div>

                    <!-- <div class="custom-card-header">View Donor</div> -->
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="w-25">Name</th>
                                <td>{{ $donor->name }}</td>
                            </tr>
                            <tr>
                                <th>Phone</th>
                                <td>{{ $donor->phone_details }}</td>
                            </tr>
                            <tr>
                                <th>City</th>
                                <td>{{ $donor->city }}</td>
                            </tr>
                            <tr>
                                <th>Address1</th>
                                <td>{{ $donor->address1 }}</td>
                            </tr>
                            <tr>
                                <th>Address2</th>
                                <td>{{ $donor->address2 }}</td>
                            </tr>
                            <tr>
                                <th>State</th>
                                <td>{{ $donor->state }}</td>
                            </tr>
                            <tr>
                                <th>District</th>
                                <td>{{ Str::replace('_', ' ', $donor->district) }}</td>
                            </tr>
                            <tr>
                                <th>Country</th>
                                <td>{{ Str::replace('_', ' ', $donor->country) }}</td>
                            </tr>
                            <tr>
                                <th>Pincode</th>
                                <td>{{ $donor->pincode }}</td>
                            </tr>
                            <tr>
                                <th>DOB</th>
                                <td>{{ $donor->dob }}</td>
                            </tr>
                            <tr>
                                <th>Age</th>
                                <td>{{ $donor->birthday }}</td>
                            </tr>
                            <tr>
                                <th>Rasi</th>
                                <td>{{ $donor->rasi }}</td>
                            </tr>
                            <tr>
                                <th>Natchathiram</th>
                                <td>{{ str_replace('_', ' ', $donor->natchathiram) }}</td>
                            </tr>
                            <tr>
                                <th>Donation Type</th>
                                <td> {{ ucfirst($donor->type) }} </td>
                            </tr>
                            <tr>
                                <th>Others Detail</th>
                                <td>{{ $donor->others_detail }} </td>
                            </tr>
                            <tr>
                                <th>Total Amount</th>
                                <td> Rs. {{ $donor->total_amount }}
                                    <button class="btn btn-success btn-sm" data-target="#add_donation" data-toggle="modal"
                                        data-backdrop="static">Add Donation</button>
                                    <button class="btn btn-info btn-sm" data-target="#view_donation" data-toggle="modal"
                                        data-backdrop="static">View Donation</button>

                                </td>
                            </tr>
                            <tr>
                                <th>Family Details</th>
                                <td>Family Members : {{ count($donor->families) }}
                                    <button class="btn btn-success btn-sm" data-target="#addfamily" data-toggle="modal"
                                        data-backdrop="static">Add Family</button>
                                </td>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
            <!-- FamilyDetails -->
            <div class="col-md-12 pt-3">
                <h6>Family Details</h6>
                <div class="card custom-card h-auto">
                    <table class="table table-striped mb-0">
                        <thead>
                            <tr>
                                <th scope="col">S.no</th>
                                <th scope="col">Name</th>
                                <th scope="col">DOB</th>
                                <th scope="col">Rasi</th>
                                <th scope="col">Natchathiram</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($donor->families as $key => $family)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $family->name }}</td>
                                    <td>{{ $family->dob }}</td>
                                    <td>{{ $family->rasi }}</td>
                                    <td>{{ str_replace('_', ' ', $family->natchathiram) }}</td>
                                    <td>
                                        <a href="{{ route('donors.removeFamily', ['family' => $family]) }}"
                                            class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                @empty
                                    <td colspan="6" class="text-center">No Data Load</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <div class="modal fade" id="addfamily" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add Donors Family</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('donors.addfamily', ['donor' => $donor]) }}" method="post">
                                        @csrf
                                        <table id="family_table" align=center>
                                            <tr id="row1">
                                                <td width="40px;"><input type="text" class="form-control" readonly
                                                        value="1"></td>
                                                <td><input type="text" class="form-control" name="name[]" id="name"
                                                        placeholder="Name" required autofocus></td>
                                                <td><input type="date" class="form-control" name="dob[]" id="dob"
                                                        placeholder="DOB" required autofocus></td>
                                                <td>
                                                    <select class="custom-select" name="rasi[]" required>
                                                        <option value="">Please Select ராசி...</option>
                                                        <option value="மேஷம்">மேஷம் </option>
                                                        <option value="ரிஷபம்">ரிஷபம் </option>
                                                        <option value="மிதுனம்">மிதுனம் </option>
                                                        <option value="கடகம்">கடகம் </option>
                                                        <option value="சிம்மம்">சிம்மம் </option>
                                                        <option value="கன்னி">கன்னி </option>
                                                        <option value="துலாம்">துலாம் </option>
                                                        <option value="விருச்சிகம்">விருச்சிகம் </option>
                                                        <option value="தனுசு">தனுசு </option>
                                                        <option value="மகரம்">மகரம் </option>
                                                        <option value="கும்பம்">கும்பம் </option>
                                                        <option value="மீனம்">மீனம் </option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select class="custom-select" name="natchathiram[]" required>
                                                        <option value="">Please Select நட்சத்திரம்...</option>
                                                        <option value="அஸ்வினி_சரஸ்வதி தேவி">அஸ்வினி - சரஸ்வதி தேவி</option>
                                                        <option value="பரணி_துர்கா தேவி">பரணி - துர்கா தேவி</option>
                                                        <option value="கார்த்திகை_முருகப்பெருமான்">கார்த்திகை -
                                                            முருகப்பெருமான்
                                                        </option>
                                                        <option value="ரோகிணி_கிருஷ்ணன்">ரோகிணி - கிருஷ்ணன்</option>
                                                        <option value="மிருகசீரிஷம்_சிவபெருமான்">மிருகசீரிஷம் - சிவபெருமான்
                                                        </option>

                                                        <option value="திருவாதிரை_சிவபெருமான்">திருவாதிரை - சிவபெருமான்
                                                        </option>

                                                        <option value="புனர்பூசம்_ராமர்">புனர்பூசம் - ராமர்</option>

                                                        <option value="பூசம்_தட்சிணாமூர்த்தி">பூசம் - தட்சிணாமூர்த்தி
                                                        </option>

                                                        <option value="ஆயில்யம்_ஆதிசேஷன்">ஆயில்யம் - ஆதிசேஷன்</option>

                                                        <option value="மகம்_சூரிய பகவான்">மகம் - சூரிய பகவான்</option>

                                                        <option value="பூரம்_ஆண்டாள்">பூரம் - ஆண்டாள்</option>

                                                        <option value="உத்திரம்_மகாலட்சுமி">உத்திரம் - மகாலட்சுமி</option>

                                                        <option value="ஹஸ்தம்_காயத்திரி தேவி">ஹஸ்தம் - காயத்திரி தேவி
                                                        </option>

                                                        <option value="சித்திரை_சக்கரத்தாழ்வார்">சித்திரை - சக்கரத்தாழ்வார்
                                                        </option>

                                                        <option value="சுவாதி_நரசிம்மமூர்த்தி">சுவாதி - நரசிம்மமூர்த்தி
                                                        </option>

                                                        <option value="விசாகம்_முருகப்பெருமான்">விசாகம் - முருகப்பெருமான்
                                                        </option>

                                                        <option value="அனுசம்_லட்சுமி நாராயணர்">அனுசம் - லட்சுமி நாராயணர்
                                                        </option>

                                                        <option value="கேட்டை_வராஹ பெருமாள்">கேட்டை - வராஹ பெருமாள்
                                                        </option>

                                                        <option value="மூலம்_ஆஞ்சநேயர்">மூலம் - ஆஞ்சநேயர்</option>

                                                        <option value="பூராடம்_ஜம்புகேஸ்வரர்">பூராடம் - ஜம்புகேஸ்வரர்
                                                        </option>

                                                        <option value="உத்திராடம்_விநாயகப் பெருமான்">உத்திராடம் - விநாயகப்
                                                            பெருமான்
                                                        </option>

                                                        <option value="திருவோணம்_ஹயக்ரீவர்">திருவோணம் - ஹயக்ரீவர்</option>

                                                        <option value="அவிட்டம்_அனந்த சயனப் பெருமாள்">அவிட்டம் - அனந்த
                                                            சயனப்
                                                            பெருமாள்
                                                        </option>

                                                        <option value="சதயம்_மிருத்யுஞ்ஜேஸ்வரர்">சதயம் - மிருத்யுஞ்ஜேஸ்வரர்
                                                        </option>

                                                        <option value="பூரட்டாதி_ஏகபாதர்">பூரட்டாதி - ஏகபாதர்</option>

                                                        <option value="உத்திரட்டாதி_மகா ஈஸ்வரர்">உத்திரட்டாதி - மகா ஈஸ்வரர்
                                                        </option>
                                                        <option value="ரேவதி_அரங்கநாதன்">ரேவதி - அரங்கநாதன்</option>

                                                    </select>

                                                <td><a href="#" class="btn btn-primary" onclick="add_row();">
                                                        <i class="material-icons">add_box</i>
                                                    </a>
                                                </td>
                                            </tr>
                                        </table>
                                        <div class="text-center pt-3">
                                            <button type="submit" class="btn btn-success">Submit</button>
                                            <button class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Add Donation -->
                    <div class="modal fade" id="add_donation" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add Donations</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('donors.donationAmt', ['donor' => $donor]) }}" method="post">
                                        @csrf
                                        <div class="form-row custom-form-row">
                                            <div class="col-md-4">
                                                <label for="name">Donation Via
                                                    <span class="required">*</span>
                                                </label>
                                                <select class="custom-select"name="via" id="via" required>
                                                    <option value="">Please Select</option>
                                                    <option value="online">Online Payment</option>
                                                    <option value="card">Debit/Credit Card</option>
                                                    <option value="cash payment">Cash Payment</option>
                                                </select>
                                            </div>

                                            <div class="col-md-3">
                                                <label for="name">Amount
                                                    <span class="required">*</span>
                                                </label>
                                                <input type="number" class="form-control" name="amount" id="amount"
                                                    required>
                                            </div>

                                            <div class="col-md-5">
                                                <label for="name">Donation Details
                                                    <span class="required">*</span>
                                                </label>
                                                <input type="text" class="form-control" name="donation_details"
                                                    id="donation_details" required>
                                            </div>
                                        </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary d-block mx-auto">Submit</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Add Donation -->
                    <div class="modal fade" id="view_donation" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">All Donations</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <table class="table table-striped mb-0">
                                        <thead>
                                            <tr>
                                                <th scope="col">S.no</th>
                                                <th scope="col">Via</th>
                                                <th scope="col">Amount</th>
                                                <th scope="col">Donations Details</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($donor->donations as $key => $donation)
                                                <tr>
                                                    <th scope="row">{{ $loop->iteration }}</th>
                                                    <td>{{ $donation->via }}</td>
                                                    <td>{{ $donation->amount }}</td>
                                                    <td>{{ $donation->donation_details }}</td>
                                                    <td><a href="{{ route('donors.otheraction', ['donation' => $donation]) }}"
                                                            class="btn btn-danger btn-sm">Delete</a></td>
                                                @empty
                                                    <td colspan="6" class="text-center">No Data Load</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            @endsection

            @push('script')
                <script type="text/javascript">
                    function add_row() {

                        $rasi = ` <select class="custom-select" name="rasi[]" required>
                                    <option value="">Please Select ராசி...</option>
                                    <option value="மேஷம்">மேஷம் </option>
                                    <option value="ரிஷபம்">ரிஷபம் </option>
                                    <option value="மிதுனம்">மிதுனம் </option>
                                    <option value="கடகம்">கடகம் </option>
                                    <option value="சிம்மம்">சிம்மம் </option>
                                    <option value="கன்னி">கன்னி </option>
                                    <option value="துலாம்">துலாம் </option>
                                    <option value="விருச்சிகம்">விருச்சிகம் </option>
                                    <option value="தனுசு">தனுசு </option>
                                    <option value="மகரம்">மகரம் </option>
                                    <option value="கும்பம்">கும்பம் </option>
                                    <option value="மீனம்">மீனம் </option>
                                </select>`;
                        $natchathiram = `
                                    <select class="custom-select" name="natchathiram[]" required>
                                <option value="">Please Select நட்சத்திரம்...</option>
                                <option value="அஸ்வினி_சரஸ்வதி தேவி">அஸ்வினி - சரஸ்வதி தேவி</option>
                                <option value="பரணி_துர்கா தேவி">பரணி - துர்கா தேவி</option>
                                <option value="கார்த்திகை_முருகப்பெருமான்">கார்த்திகை -
                                    முருகப்பெருமான்
                                </option>
                                <option value="ரோகிணி_கிருஷ்ணன்">ரோகிணி - கிருஷ்ணன்</option>
                                <option value="மிருகசீரிஷம்_சிவபெருமான்">மிருகசீரிஷம் - சிவபெருமான்
                                </option>

                                <option value="திருவாதிரை_சிவபெருமான்">திருவாதிரை - சிவபெருமான்
                                </option>

                                <option value="புனர்பூசம்_ராமர்">புனர்பூசம் - ராமர்</option>

                                <option value="பூசம்_தட்சிணாமூர்த்தி">பூசம் - தட்சிணாமூர்த்தி
                                </option>

                                <option value="ஆயில்யம்_ஆதிசேஷன்">ஆயில்யம் - ஆதிசேஷன்</option>

                                <option value="மகம்_சூரிய பகவான்">மகம் - சூரிய பகவான்</option>

                                <option value="பூரம்_ஆண்டாள்">பூரம் - ஆண்டாள்</option>

                                <option value="உத்திரம்_மகாலட்சுமி">உத்திரம் - மகாலட்சுமி</option>

                                <option value="ஹஸ்தம்_காயத்திரி தேவி">ஹஸ்தம் - காயத்திரி தேவி
                                </option>

                                <option value="சித்திரை_சக்கரத்தாழ்வார்">சித்திரை - சக்கரத்தாழ்வார்
                                </option>

                                <option value="சுவாதி_நரசிம்மமூர்த்தி">சுவாதி - நரசிம்மமூர்த்தி
                                </option>

                                <option value="விசாகம்_முருகப்பெருமான்">விசாகம் - முருகப்பெருமான்
                                </option>

                                <option value="அனுசம்_லட்சுமி நாராயணர்">அனுசம் - லட்சுமி நாராயணர்
                                </option>

                                <option value="கேட்டை_வராஹ பெருமாள்">கேட்டை - வராஹ பெருமாள்
                                </option>

                                <option value="மூலம்_ஆஞ்சநேயர்">மூலம் - ஆஞ்சநேயர்</option>

                                <option value="பூராடம்_ஜம்புகேஸ்வரர்">பூராடம் - ஜம்புகேஸ்வரர்
                                </option>

                                <option value="உத்திராடம்_விநாயகப் பெருமான்">உத்திராடம் - விநாயகப்
                                    பெருமான்
                                </option>

                                <option value="திருவோணம்_ஹயக்ரீவர்">திருவோணம் - ஹயக்ரீவர்</option>

                                <option value="அவிட்டம்_அனந்த சயனப் பெருமாள்">அவிட்டம் - அனந்த
                                    சயனப்
                                    பெருமாள்
                                </option>

                                <option value="சதயம்_மிருத்யுஞ்ஜேஸ்வரர்">சதயம் - மிருத்யுஞ்ஜேஸ்வரர்
                                </option>

                                <option value="பூரட்டாதி_ஏகபாதர்">பூரட்டாதி - ஏகபாதர்</option>

                                <option value="உத்திரட்டாதி_மகா ஈஸ்வரர்">உத்திரட்டாதி - மகா ஈஸ்வரர்
                                </option>
                                <option value="ரேவதி_அரங்கநாதன்">ரேவதி - அரங்கநாதன்</option>

                            </select>`;

                        $rowno = $("#family_table tr").length;
                        $rowno = $rowno + 1;
                        $("#family_table tr:last").after("<tr id='row" + $rowno +
                            "'><td width='40px'><input type='text' class='form-control' value=" + $rowno +
                            " readonly></td><td><input type='text' name='name[]'class='form-control'  placeholder='Name' required></td><td><input type='date' name='dob[]' class='form-control' placeholder='DOB' required></td><td>" +
                            $rasi +
                            "</td><td>" + $natchathiram + "</td><td><a href='#' class='btn btn-danger' onclick=delete_row('row" +
                            $rowno + "')><i class='material-icons'>delete</i></a></td></tr>");
                    }

                    function delete_row(rowno) {
                        $('#' + rowno).remove();
                    }
                </script>
            @endpush
