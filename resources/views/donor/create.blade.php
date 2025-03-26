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
                <div class="pb-3 text-right">
                    <button class="btn btn-success btn-sm" data-target="#importbulkdata" data-toggle="modal"
                        data-backdrop="static">Add Bulk Donors</button>
                </div>
                <div class="card custom-card">
                    <form action="{{ route('donors.store') }}" method="POST">
                        @csrf
                        <div class="card-body">

                            <div class="custom-card-title">Add Donor Details</div>
                            <div class="form-row custom-form-row">
                                <div class="col-md-4">
                                    <label for="name">Name
                                        <span class="required">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="head_name" id="name" required>
                                </div>


                                <div class="col-md-4">
                                    <label for="address1">Address1
                                        <span class="required">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="address1" id="address1" required>
                                </div>

                                <div class="col-md-4">
                                    <label for="address2">Address2
                                        <span class="required">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="address2" id="address2" required>
                                </div>



                            </div>

                            <div class="form-row custom-form-row">

                                <div class="col-md-4">
                                    <label for="name">City
                                        <span class="required">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="city" id="city" required>
                                </div>

                                <div class="col-md-4">
                                    <label for="state">State
                                        <span class="required">*</span>
                                    </label>
                                    <select name="state" class="custom-select" id="state" required>
                                        <option value="Tamilnadu">Tamil Nadu - தமிழ்நாடு</option>
                                    </select>

                                </div>



                                <div class="col-md-4">
                                    <label for="type">District
                                        <span class="required">*</span>
                                    </label>

                                    <select class="custom-select"name="district" id="district" required>
                                        <option value="Ariyalur_அரியலூர்">Ariyalur - அரியலூர்</option>
                                        <option value="Chengalpattu_செங்கல்பட்டு">Chengalpattu - செங்கல்பட்டு</option>
                                        <option value="Chennai_சென்னை">Chennai - சென்னை</option>
                                        <option value="Coimbatore_கோயம்புத்தூர்">Coimbatore - கோயம்புத்தூர்</option>
                                        <option value="Cuddalore_குடியாத்தம்">Cuddalore - குடியாத்தம்</option>
                                        <option value="Dharmapuri_தர்மபுரி">Dharmapuri - தர்மபுரி</option>
                                        <option value="Dindigul_திண்டுக்கல்">Dindigul - திண்டுக்கல்</option>
                                        <option value="Erode_ஈரோடு">Erode - ஈரோடு</option>
                                        <option value="Kallakurichi_கள்ளக்குறிச்சி">Kallakurichi - கள்ளக்குறிச்சி</option>
                                        <option value="Kancheepuram_காஞ்சிபுரம்">Kancheepuram - காஞ்சிபுரம்</option>
                                        <option value="Kanyakumari_கன்னியாகுமரி">Kanyakumari - கன்னியாகுமரி</option>
                                        <option value="Karur_கரூர்">Karur - கரூர்</option>
                                        <option value="Krishnagiri_கிருஷ்ணகிரி">Krishnagiri - கிருஷ்ணகிரி</option>
                                        <option value="Madurai_மதுரை">Madurai - மதுரை</option>
                                        <option value="Nagapattinam_நாகப்பட்டினம்">Nagapattinam - நாகப்பட்டினம்</option>
                                        <option value="Namakkal_நாமக்கல்">Namakkal - நாமக்கல்</option>
                                        <option value="Nilgiris_நிலவேரி">Nilgiris - நிலவேரி</option>
                                        <option value="Perambalur_பெரம்பலூர்">Perambalur - பெரம்பலூர்</option>
                                        <option value="Pudukkottai_புதுக்கோட்டை">Pudukkottai - புதுக்கோட்டை</option>
                                        <option value="Ramanathapuram_ராமநாதபுரம்">Ramanathapuram - ராமநாதபுரம்</option>
                                        <option value="Salem_சேலம்">Salem - சேலம்</option>
                                        <option value="Sivaganga_சிவகங்கை">Sivaganga - சிவகங்கை</option>
                                        <option value="Tenkasi_தேன்காசி">Tenkasi - தேன்காசி</option>
                                        <option value="Thanjavur_தஞ்சாவூர்">Thanjavur - தஞ்சாவூர்</option>
                                        <option value="Nilgiris_தேனிலையர்கள்">Nilgiris - தேனிலையர்கள்</option>
                                        <option value="Tirunelveli_திருநெல்வேலி">Tirunelveli - திருநெல்வேலி</option>
                                        <option value="Tiruppur_திருப்பூர்">Tiruppur - திருப்பூர்</option>
                                        <option value="Tiruvallur_திருவள்ளூர்">Tiruvallur - திருவள்ளூர்</option>
                                        <option value="Tiruvannamalai_திருவண்ணாமலை">Tiruvannamalai - திருவண்ணாமலை</option>
                                        <option value="Vellore_வேலூர்">Vellore - வேலூர்</option>
                                        <option value="Viluppuram_விழுப்புரம்">Viluppuram - விழுப்புரம்</option>
                                        <option value="Virudhunagar_விருதுநகர்">Virudhunagar - விருதுநகர்</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-row custom-form-row">
                                <div class="col-md-4">
                                    <label for="head_phone1">Phone1
                                        <span class="required">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="phone1" id="phone1" required>
                                </div>

                                <div class="col-md-4">
                                    <label for="head_phone2">Phone2(Optional)
                                        <span class="required"></span>
                                    </label>
                                    <input type="text" class="form-control" name="phone2" id="phone2">
                                </div>

                                <div class="col-md-4">
                                    <label for="pincode">Pincode
                                        <span class="required">*</span>
                                    </label>
                                    <input type="number" maxlength="6" class="form-control" name="pincode"
                                        id="pincode" required>
                                </div>

                            </div>


                            <div class="custom-card-title my-3">Add Donation Details</div>

                            <div class="form-row custom-form-row">
                                <div class="col-md-3">
                                    <label for="dob">பிறந்த தேதி
                                        <span class="required">*</span>
                                    </label>
                                    <input type="date" maxlength="6" class="form-control" name="dob"
                                        id="dob" required>
                                    <span id="invalid_dob"></span>
                                </div>
                                <div class="col-md-1">
                                    <label for="age">வயது
                                    </label>
                                    <input type="text" readonly class="form-control" name="age" id="age">
                                </div>

                                <div class="col-md-4">
                                    <label for="type">ராசி<span class="required">*</span></label>
                                    <select class="custom-select" name="head_rasi" required="">
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
                                </div>
                                <div class="col-md-4">
                                    <label for="type">நட்சத்திரம்<span class="required">*</span></label>
                                    <select class="custom-select" name="head_natchathiram" required="">
                                        <option value="">Please Select நட்சத்திரம்...</option>
                                        <option value="அஸ்வினி_சரஸ்வதி தேவி">அஸ்வினி - சரஸ்வதி தேவி</option>
                                        <option value="பரணி_துர்கா தேவி">பரணி - துர்கா தேவி</option>
                                        <option value="கார்த்திகை_முருகப்பெருமான்">கார்த்திகை - முருகப்பெருமான்</option>
                                        <option value="ரோகிணி_கிருஷ்ணன்">ரோகிணி - கிருஷ்ணன்</option>
                                        <option value="மிருகசீரிஷம்_சிவபெருமான்">மிருகசீரிஷம் - சிவபெருமான்</option>

                                        <option value="திருவாதிரை_சிவபெருமான்">திருவாதிரை - சிவபெருமான்</option>

                                        <option value="புனர்பூசம்_ராமர்">புனர்பூசம் - ராமர்</option>

                                        <option value="பூசம்_தட்சிணாமூர்த்தி">பூசம் - தட்சிணாமூர்த்தி</option>

                                        <option value="ஆயில்யம்_ஆதிசேஷன்">ஆயில்யம் - ஆதிசேஷன்</option>

                                        <option value="மகம்_சூரிய பகவான்">மகம் - சூரிய பகவான்</option>

                                        <option value="பூரம்_ஆண்டாள்">பூரம் - ஆண்டாள்</option>

                                        <option value="உத்திரம்_மகாலட்சுமி">உத்திரம் - மகாலட்சுமி</option>

                                        <option value="ஹஸ்தம்_காயத்திரி தேவி">ஹஸ்தம் - காயத்திரி தேவி</option>

                                        <option value="சித்திரை_சக்கரத்தாழ்வார்">சித்திரை - சக்கரத்தாழ்வார்</option>

                                        <option value="சுவாதி_நரசிம்மமூர்த்தி">சுவாதி - நரசிம்மமூர்த்தி</option>

                                        <option value="விசாகம்_முருகப்பெருமான்">விசாகம் - முருகப்பெருமான்</option>

                                        <option value="அனுசம்_லட்சுமி நாராயணர்">அனுசம் - லட்சுமி நாராயணர்</option>

                                        <option value="கேட்டை_வராஹ பெருமாள்">கேட்டை - வராஹ பெருமாள்</option>

                                        <option value="மூலம்_ஆஞ்சநேயர்">மூலம் - ஆஞ்சநேயர்</option>

                                        <option value="பூராடம்_ஜம்புகேஸ்வரர்">பூராடம் - ஜம்புகேஸ்வரர்</option>

                                        <option value="உத்திராடம்_விநாயகப் பெருமான்">உத்திராடம் - விநாயகப் பெருமான்
                                        </option>

                                        <option value="திருவோணம்_ஹயக்ரீவர்">திருவோணம் - ஹயக்ரீவர்</option>

                                        <option value="அவிட்டம்_அனந்த சயனப் பெருமாள்">அவிட்டம் - அனந்த சயனப் பெருமாள்
                                        </option>

                                        <option value="சதயம்_மிருத்யுஞ்ஜேஸ்வரர்">சதயம் - மிருத்யுஞ்ஜேஸ்வரர்</option>

                                        <option value="பூரட்டாதி_ஏகபாதர்">பூரட்டாதி - ஏகபாதர்</option>

                                        <option value="உத்திரட்டாதி_மகா ஈஸ்வரர்">உத்திரட்டாதி - மகா ஈஸ்வரர்</option>
                                        <option value="ரேவதி_அரங்கநாதன்">ரேவதி - அரங்கநாதன்</option>


                                    </select>
                                </div>

                            </div>

                            <div class="form-row custom-form-row">
                                <div class="col-md-4">
                                    <label for="type">Donation Type <span class="required">*</span></label>
                                    <select class="custom-select" name="type" id="type" required>
                                        <option value="">Please Select</option>
                                        <option value="monthly">Monthly Once</option>
                                        <option value="festival"> Fesitival Seasons</option>
                                        <option value="laksha">Laksha Archanai</option>
                                        <option value="others">Others</option>
                                    </select>

                                    <div class="pt-3 d-none" id="others">
                                        <label for="name">Others Detail
                                            <span class="required">*</span>
                                        </label>
                                        <input type="text" class="form-control" name="others_detail"
                                            id="others_detail">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label for="type">When Donation Give?<span class="required">*</span></label>
                                    <select class="custom-select" name="donation_type" id="donation_type" required>
                                        <option value="">Please Select</option>
                                        <option value="now">Give Now </option>
                                        <option value="later">Give Later</option>
                                    </select>
                                    <div class="pt-3 d-none" id="amount">
                                        <label for="dob">Amount</label>
                                        <input type="number" maxlength="6" class="form-control" name="amount"
                                            id="amount">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="family_type">Family Details?<span class="required">*</span></label>
                                    <select class="custom-select" name="family_type" id="family_type" required>
                                        <option value="">Please Select</option>
                                        <option value="add_now">Add Now </option>
                                        <option value="add_later">Add Later</option>
                                    </select>
                                    <div class="pt-3 d-none" id="amount">
                                        <label for="dob">Amount</label>
                                        <input type="number" maxlength="6" class="form-control" name="amount"
                                            id="amount">
                                    </div>
                                </div>
                            </div>




                            <div id="family_table" class="d-none">
                                <div class="custom-card-title">Add Family Details</div>
                                <div class="form-row custom-form-row">
                                    <table>
                                        <tr id="row1">
                                            <td width="40px;"><input type="text" class="form-control" readonly
                                                    value="1"></td>
                                            <td><input type="text" class="form-control" name="f_name[]"
                                                    id="name" placeholder="Name"></td>
                                            <td><input type="date" class="form-control" name="f_dob[]" id="dob"
                                                    placeholder="DOB"></td>
                                            <td>
                                                <select class="custom-select" name="f_rasi[]">
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
                                                <select class="custom-select" name="f_natchathiram[]">
                                                    <option value="">Please Select நட்சத்திரம்...</option>
                                                    <option value="அஸ்வினி_சரஸ்வதி தேவி">அஸ்வினி - சரஸ்வதி தேவி</option>
                                                    <option value="பரணி_துர்கா தேவி">பரணி - துர்கா தேவி</option>
                                                    <option value="கார்த்திகை_முருகப்பெருமான்">கார்த்திகை - முருகப்பெருமான்
                                                    </option>
                                                    <option value="ரோகிணி_கிருஷ்ணன்">ரோகிணி - கிருஷ்ணன்</option>
                                                    <option value="மிருகசீரிஷம்_சிவபெருமான்">மிருகசீரிஷம் - சிவபெருமான்
                                                    </option>

                                                    <option value="திருவாதிரை_சிவபெருமான்">திருவாதிரை - சிவபெருமான்
                                                    </option>

                                                    <option value="புனர்பூசம்_ராமர்">புனர்பூசம் - ராமர்</option>

                                                    <option value="பூசம்_தட்சிணாமூர்த்தி">பூசம் - தட்சிணாமூர்த்தி</option>

                                                    <option value="ஆயில்யம்_ஆதிசேஷன்">ஆயில்யம் - ஆதிசேஷன்</option>

                                                    <option value="மகம்_சூரிய பகவான்">மகம் - சூரிய பகவான்</option>

                                                    <option value="பூரம்_ஆண்டாள்">பூரம் - ஆண்டாள்</option>

                                                    <option value="உத்திரம்_மகாலட்சுமி">உத்திரம் - மகாலட்சுமி</option>

                                                    <option value="ஹஸ்தம்_காயத்திரி தேவி">ஹஸ்தம் - காயத்திரி தேவி</option>

                                                    <option value="சித்திரை_சக்கரத்தாழ்வார்">சித்திரை - சக்கரத்தாழ்வார்
                                                    </option>

                                                    <option value="சுவாதி_நரசிம்மமூர்த்தி">சுவாதி - நரசிம்மமூர்த்தி
                                                    </option>

                                                    <option value="விசாகம்_முருகப்பெருமான்">விசாகம் - முருகப்பெருமான்
                                                    </option>

                                                    <option value="அனுசம்_லட்சுமி நாராயணர்">அனுசம் - லட்சுமி நாராயணர்
                                                    </option>

                                                    <option value="கேட்டை_வராஹ பெருமாள்">கேட்டை - வராஹ பெருமாள்</option>

                                                    <option value="மூலம்_ஆஞ்சநேயர்">மூலம் - ஆஞ்சநேயர்</option>

                                                    <option value="பூராடம்_ஜம்புகேஸ்வரர்">பூராடம் - ஜம்புகேஸ்வரர்</option>

                                                    <option value="உத்திராடம்_விநாயகப் பெருமான்">உத்திராடம் - விநாயகப்
                                                        பெருமான்
                                                    </option>

                                                    <option value="திருவோணம்_ஹயக்ரீவர்">திருவோணம் - ஹயக்ரீவர்</option>

                                                    <option value="அவிட்டம்_அனந்த சயனப் பெருமாள்">அவிட்டம் - அனந்த சயனப்
                                                        பெருமாள்
                                                    </option>

                                                    <option value="சதயம்_மிருத்யுஞ்ஜேஸ்வரர்">சதயம் - மிருத்யுஞ்ஜேஸ்வரர்
                                                    </option>

                                                    <option value="பூரட்டாதி_ஏகபாதர்">பூரட்டாதி - ஏகபாதர்</option>

                                                    <option value="உத்திரட்டாதி_மகா ஈஸ்வரர்">உத்திரட்டாதி - மகா ஈஸ்வரர்
                                                    </option>
                                                    <option value="ரேவதி_அரங்கநாதன்">ரேவதி - அரங்கநாதன்</option>

                                                </select>
                                            </td>
                                            <td><a href="javascript:void(0)" class="btn btn-primary"
                                                    onclick="add_row();">
                                                    <i class="material-icons">add_box</i>
                                                </a>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary d-block mx-auto">Save</button>
                        </div>
                    </form>
                </div>
            </div>
            @include('donor.add-bulk-donor')
        </div>
    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function() {

            $('#type').change(function() {
                var value = $(this).val();
                if (value == 'others') {
                    $('#others').removeClass('d-none');
                } else {
                    $('#others').addClass('d-none');
                }
            });
            // When Donation Given validation
            $('#donation_type').change(function() {
                var value = $(this).val();
                if (value == 'now') {
                    $('#amount').removeClass('d-none');
                } else {
                    $('#amount').addClass('d-none');
                }
            });

            //FamilyDetails Show Multiple Rows
            $('#family_type').change(function() {
                var value = $(this).val();
                if (value == 'add_now') {
                    $('#family_table').removeClass('d-none');
                } else {
                    $('#family_table').addClass('d-none');
                }
            });

            // Date of Birth Culculation

            $('#dob').change(function() {
                var value = $(this).val();
                dob = new Date(value);
                var today = new Date();
                var age = Math.floor((today - dob) / (365.25 * 24 * 60 * 60 * 1000));
                if (age < 0) {
                    $('#invalid_dob').text('Invalid DOB');
                    $('#age').attr('value', '');
                } else {
                    $('#age').attr('value', age);
                    $('#invalid_dob').text('');
                }
            });

            $('#age[]').change(function() {
                var value = $(this).val();
                dob = new Date(value);
                var today = new Date();
                var age = Math.floor((today - dob) / (365.25 * 24 * 60 * 60 * 1000));
                if (age < 0) {
                    $('#invalid_dob').text('Invalid DOB');
                    $('#age[]').attr('value', '');
                } else {
                    $('#age[]').attr('value', age);
                    $('#invalid_dob').text('');
                }
            });
        });

        function add_row() {
            $rasi = `
                <select class="custom-select" name="f_rasi[]" required>
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
                 <select class="custom-select" name="f_natchathiram[]" required>
                <option value="">Please Select நட்சத்திரம்...</option>
                <option value="அஸ்வினி_சரஸ்வதி தேவி">அஸ்வினி - சரஸ்வதி தேவி</option>
                <option value="பரணி_துர்கா தேவி">பரணி - துர்கா தேவி</option>
                <option value="கார்த்திகை_முருகப்பெருமான்">கார்த்திகை - முருகப்பெருமான்
                </option>
                <option value="ரோகிணி_கிருஷ்ணன்">ரோகிணி - கிருஷ்ணன்</option>
                <option value="மிருகசீரிஷம்_சிவபெருமான்">மிருகசீரிஷம் - சிவபெருமான்
                </option>

                <option value="திருவாதிரை_சிவபெருமான்">திருவாதிரை - சிவபெருமான்
                </option>

                <option value="புனர்பூசம்_ராமர்">புனர்பூசம் - ராமர்</option>

                <option value="பூசம்_தட்சிணாமூர்த்தி">பூசம் - தட்சிணாமூர்த்தி</option>

                <option value="ஆயில்யம்_ஆதிசேஷன்">ஆயில்யம் - ஆதிசேஷன்</option>

                <option value="மகம்_சூரிய பகவான்">மகம் - சூரிய பகவான்</option>

                <option value="பூரம்_ஆண்டாள்">பூரம் - ஆண்டாள்</option>

                <option value="உத்திரம்_மகாலட்சுமி">உத்திரம் - மகாலட்சுமி</option>

                <option value="ஹஸ்தம்_காயத்திரி தேவி">ஹஸ்தம் - காயத்திரி தேவி</option>

                <option value="சித்திரை_சக்கரத்தாழ்வார்">சித்திரை - சக்கரத்தாழ்வார்
                </option>

                <option value="சுவாதி_நரசிம்மமூர்த்தி">சுவாதி - நரசிம்மமூர்த்தி
                </option>

                <option value="விசாகம்_முருகப்பெருமான்">விசாகம் - முருகப்பெருமான்
                </option>

                <option value="அனுசம்_லட்சுமி நாராயணர்">அனுசம் - லட்சுமி நாராயணர்
                </option>

                <option value="கேட்டை_வராஹ பெருமாள்">கேட்டை - வராஹ பெருமாள்</option>

                <option value="மூலம்_ஆஞ்சநேயர்">மூலம் - ஆஞ்சநேயர்</option>

                <option value="பூராடம்_ஜம்புகேஸ்வரர்">பூராடம் - ஜம்புகேஸ்வரர்</option>

                <option value="உத்திராடம்_விநாயகப் பெருமான்">உத்திராடம் - விநாயகப்
                    பெருமான்
                </option>

                <option value="திருவோணம்_ஹயக்ரீவர்">திருவோணம் - ஹயக்ரீவர்</option>

                <option value="அவிட்டம்_அனந்த சயனப் பெருமாள்">அவிட்டம் - அனந்த சயனப்
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
                " readonly></td><td><input type='text' name='f_name[]'class='form-control'  placeholder='Name' ></td><td><input type='date' name='f_dob[]' class='form-control' placeholder='DOB' ></td><td>" +
                $rasi + "</td><td>" + $natchathiram +
                "</td><td><a href='javascript:void(0)' class='btn btn-danger' onclick=delete_row('row" + $rowno +
                "')><i class='material-icons'>delete</i></a></td></tr>");
        }

        function delete_row(rowno) {
            $('#' + rowno).remove();
        }
    </script>
@endpush
