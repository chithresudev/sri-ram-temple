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
          <button class="btn btn-success btn-sm" data-target="#importbulkdata" data-toggle="modal" data-backdrop="static">Add Bulk Donors</button>
        </div>
            <div class="card custom-card">
              <form  action="{{ route('donors.store') }}" method="POST">
                @csrf
                <div class="card-body">

                    <div class="custom-card-title">Add Donor Details</div>
                      <div class="form-row custom-form-row">
                          <div class="col-md-4">
                              <label for="name">Name
                                <span class="required">*</span>
                              </label>
                              <input type="text" class="form-control" name="head_name"
                              id="name" required>
                          </div>
                          <div class="col-md-4">
                              <label for="name">Phone
                              <span class="required">*</span>
                            </label>
                              <input type="text" class="form-control" name="head_phone"
                              id="phone" required>
                          </div>
                          <div class="col-md-4">
                              <label for="name">Door No
                                <span class="required">*</span>
                              </label>
                              <input type="text" class="form-control" name="door_no"
                              id="door_no" required>
                          </div>
                      </div>

                      <div class="form-row custom-form-row">
                          <div class="col-md-4">
                              <label for="address1">Address1
                                <span class="required">*</span>
                              </label>
                              <input type="text" class="form-control" name="address1"
                              id="address1" required>
                          </div>

                          <div class="col-md-4">
                              <label for="address2">Address2
                                 <span class="required">*</span>
                               </label>
                              <input type="text" class="form-control" name="address2"
                              id="address2" required>
                          </div>
                          <div class="col-md-4">
                              <label for="state">State
                                <span class="required">*</span>
                              </label>
                              <input type="text" class="form-control" name="state"
                              id="state" required>
                          </div>
                      </div>

                      <div class="form-row custom-form-row">

                        <div class="col-md-4">
                            <label for="type">District
                              <span class="required">*</span>
                            </label>
                            <select class="custom-select"name="district"id="district" required>
                                <option value="">Please Select</option>
                                <option value="pudukkottai">Pudukottai</option>
                                <option value="chennai">Chennai</option>
                            </select>
                        </div>

                          <div class="col-md-4">
                              <label for="pincode">Pincode
                                <span class="required">*</span>
                              </label>
                              <input type="text" maxlength="6" class="form-control" name="pincode" id="pincode" required>
                          </div>
                        </div>

                <div class="custom-card-title">Add Donation Details</div>

                <div class="form-row custom-form-row">
                  <div class="col-md-3">
                      <label for="dob">DOB
                        <span class="required">*</span>
                      </label>
                      <input type="date" maxlength="6" class="form-control" name="dob" id="dob" required>
                      <span id="invalid_dob"></span>
                  </div>
                  <div class="col-md-1">
                      <label for="age">Age</label>
                      <input type="text" readonly class="form-control" name="age" id="age" >
                  </div>

                  <div class="col-md-4">
                    <label for="type">Rasi<span class="required">*</span></label>
                    <select class="custom-select" name="head_rasi" required="">
                     <option value="">Please Select Rasi...</option>
                     <option value="Mesham">மேஷம் </option>
                     <option value="Rishabam">ரிஷபம் </option>
                     <option value="Midhunam">மிதுனம் </option>
                     <option value="Kadagam">கடகம் </option>
                     <option value="Simmam">சிம்மம் </option>
                     <option value="Kanni">கன்னி </option>
                     <option value="Thulaam">துலாம் </option>
                     <option value="Viruchigam">விருச்சிகம் </option>
                     <option value="Dhanusu">தனுசு </option>
                     <option value="Magaram">மகரம் </option>
                     <option value="Kumbam">கும்பம் </option>
                     <option value="Meenam">மீனம் </option>
                   </select>
                  </div>
                  <div class="col-md-4">
                    <label for="type">Natchathiram<span class="required">*</span></label>
                    <select class="custom-select" name="head_natchathiram" required="">
                     <option value="">Please Select Natchathiram...</option>
                     <option value="அஸ்வினி">அஸ்வினி - சரஸ்வதி தேவி</option>
                       <option value="பரணி">பரணி - துர்கா தேவி</option>
                       <option value="கார்த்திகை">கார்த்திகை - முருகப்பெருமான்</option>
                       <option value="ரோகிணி">ரோகிணி - கிருஷ்ணன்</option>
                       <option value="மிருகசீரிஷம்">மிருகசீரிஷம் - சிவபெருமான்</option>

                       <option value="திருவாதிரை">திருவாதிரை - சிவபெருமான்</option>

                       <option value="புனர்பூசம்">புனர்பூசம் - ராமர்</option>

                       <option value="பூசம்">பூசம் - தட்சிணாமூர்த்தி</option>

                       <option value="ஆயில்யம்">ஆயில்யம் - ஆதிசேஷன்</option>

                       <option value="மகம்">மகம் - சூரிய பகவான்</option>

                       <option value="பூரம்">பூரம் - ஆண்டாள்</option>

                       <option value="உத்திரம்">உத்திரம் - மகாலட்சுமி</option>

                       <option value="ஹஸ்தம்">ஹஸ்தம் - காயத்திரி தேவி</option>

                       <option value="சித்திரை">சித்திரை - சக்கரத்தாழ்வார்</option>

                       <option value="சுவாதி">சுவாதி - நரசிம்மமூர்த்தி</option>

                       <option value="விசாகம்">விசாகம் - முருகப்பெருமான்</option>

                       <option value="அனுசம்">அனுசம் - லட்சுமி நாராயணர்</option>

                       <option value="கேட்டை">கேட்டை - வராஹ பெருமாள்</option>

                       <option value="மூலம்">மூலம் - ஆஞ்சநேயர்</option>

                       <option value="பூராடம்">பூராடம் - ஜம்புகேஸ்வரர்</option>

                       <option value="உத்திராடம்">உத்திராடம் - விநாயகப் பெருமான்</option>

                       <option value="திருவோணம்">திருவோணம் - ஹயக்ரீவர்</option>

                       <option value="அவிட்டம்">அவிட்டம் - அனந்த சயனப் பெருமாள்
                       </option>

                       <option value="சதயம்">சதயம் - மிருத்யுஞ்ஜேஸ்வரர்</option>

                       <option value="பூரட்டாதி">பூரட்டாதி - ஏகபாதர்</option>

                       <option value="உத்திரட்டாதி">உத்திரட்டாதி - மகா ஈஸ்வரர்</option>
                       <option value="ரேவதி">ரேவதி - அரங்கநாதன்</option>


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
                      <label for="name" >Others Detail
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
                        <input type="number" maxlength="6" class="form-control" name="amount" id="amount">
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
                        <input type="number" maxlength="6" class="form-control" name="amount" id="amount">
                    </div>
                 </div>
                 </div>




               <div id="family_table" class="d-none">
                <div class="custom-card-title">Add Family Details</div>
                <div class="form-row custom-form-row">
                 <table>
                  <tr id="row1">
                    <td  width="40px;"><input type="text" class="form-control" readonly value="1"></td>
                    <td><input type="text" class="form-control" name="f_name[]" id="name"  placeholder="Name"></td>
                    <td><input type="date" class="form-control" name="f_dob[]" id="dob" placeholder="DOB"></td>
                     <td>
                    <select class="custom-select" name="f_rasi[]">
                     <option value="">Please Select Rasi...</option>
                     <option value="Mesham">மேஷம் </option>
                     <option value="Rishabam">ரிஷபம் </option>
                     <option value="Midhunam">மிதுனம் </option>
                     <option value="Kadagam">கடகம் </option>
                     <option value="Simmam">சிம்மம் </option>
                     <option value="Kanni">கன்னி </option>
                     <option value="Thulaam">துலாம் </option>
                     <option value="Viruchigam">விருச்சிகம் </option>
                     <option value="Dhanusu">தனுசு </option>
                     <option value="Magaram">மகரம் </option>
                     <option value="Kumbam">கும்பம் </option>
                     <option value="Meenam">மீனம் </option>
                   </select>
                    </td>
                    <td>
                      <select class="custom-select" name="f_natchathiram[]">
                        <option value="">Please Select Natchathiram...</option>
                        <option value="அஸ்வினி">அஸ்வினி - சரஸ்வதி தேவி</option>
                          <option value="பரணி">பரணி - துர்கா தேவி</option>
                          <option value="கார்த்திகை">கார்த்திகை - முருகப்பெருமான்</option>
                          <option value="ரோகிணி">ரோகிணி - கிருஷ்ணன்</option>
                          <option value="மிருகசீரிஷம்">மிருகசீரிஷம் - சிவபெருமான்</option>

                          <option value="திருவாதிரை">திருவாதிரை - சிவபெருமான்</option>

                          <option value="புனர்பூசம்">புனர்பூசம் - ராமர்</option>

                          <option value="பூசம்">பூசம் - தட்சிணாமூர்த்தி</option>

                          <option value="ஆயில்யம்">ஆயில்யம் - ஆதிசேஷன்</option>

                          <option value="மகம்">மகம் - சூரிய பகவான்</option>

                          <option value="பூரம்">பூரம் - ஆண்டாள்</option>

                          <option value="உத்திரம்">உத்திரம் - மகாலட்சுமி</option>

                          <option value="ஹஸ்தம்">ஹஸ்தம் - காயத்திரி தேவி</option>

                          <option value="சித்திரை">சித்திரை - சக்கரத்தாழ்வார்</option>

                          <option value="சுவாதி">சுவாதி - நரசிம்மமூர்த்தி</option>

                          <option value="விசாகம்">விசாகம் - முருகப்பெருமான்</option>

                          <option value="அனுசம்">அனுசம் - லட்சுமி நாராயணர்</option>

                          <option value="கேட்டை">கேட்டை - வராஹ பெருமாள்</option>

                          <option value="மூலம்">மூலம் - ஆஞ்சநேயர்</option>

                          <option value="பூராடம்">பூராடம் - ஜம்புகேஸ்வரர்</option>

                          <option value="உத்திராடம்">உத்திராடம் - விநாயகப் பெருமான்</option>

                          <option value="திருவோணம்">திருவோணம் - ஹயக்ரீவர்</option>

                          <option value="அவிட்டம்">அவிட்டம் - அனந்த சயனப் பெருமாள்
                          </option>

                          <option value="சதயம்">சதயம் - மிருத்யுஞ்ஜேஸ்வரர்</option>

                          <option value="பூரட்டாதி">பூரட்டாதி - ஏகபாதர்</option>

                          <option value="உத்திரட்டாதி">உத்திரட்டாதி - மகா ஈஸ்வரர்</option>
                          <option value="ரேவதி">ரேவதி - அரங்கநாதன்</option>
                     </select>
                   </td>
                    <td><a href="javascript:void(0)" class="btn btn-primary" onclick="add_row();">
                      <i class="material-icons">add_box</i>
                    </a>
                    </td>
                  </tr>
                </table>
                </div>
                </div>
                <button type="submit" class="btn btn-primary d-block mx-auto" >Save</button>
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
  $(document).ready(function(){

    $('#type').change(function(){
      var value = $(this).val();
      if (value =='others') {
        $('#others').removeClass('d-none');
      }else{
        $('#others').addClass('d-none');
      }
    });
    // When Donation Given validation
    $('#donation_type').change(function(){
      var value = $(this).val();
      if (value =='now') {
        $('#amount').removeClass('d-none');
      }else{
        $('#amount').addClass('d-none');
      }
    });

    //FamilyDetails Show Multiple Rows
    $('#family_type').change(function(){
      var value = $(this).val();
      if (value =='add_now') {
        $('#family_table').removeClass('d-none');
      }else{
        $('#family_table').addClass('d-none');
      }
    });

    // Date of Birth Culculation

    $('#dob').change(function(){
      var value = $(this).val();
      dob = new Date(value);
      var today = new Date();
      var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
      if(age < 0) {
        $('#invalid_dob').text('Invalid DOB');
        $('#age').attr('value', '');
      }else{
        $('#age').attr('value', age);
        $('#invalid_dob').text('');
      }
    });

    $('#age[]').change(function(){
      var value = $(this).val();
      dob = new Date(value);
      var today = new Date();
      var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
      if(age < 0) {
        $('#invalid_dob').text('Invalid DOB');
        $('#age[]').attr('value', '');
      }else{
        $('#age[]').attr('value', age);
        $('#invalid_dob').text('');
      }
    });
  });

  function add_row()
  {
  $rasi = "<select class='custom-select' name='f_rasi[]' ><option value=''>Please Select Rasi...</option><option value='Mesham'>மேஷம் </option><option value='Rishabam'>ரிஷபம் </option><option value='Midhunam'>மிதுனம் </option><option value='Kadagam'>கடகம் </option><option value='Simmam'>சிம்மம் </option> <option value='Kanni'>கன்னி </option><option value='Thulaam'>துலாம் </option><option value='Viruchigam'>விருச்சிகம்</option><option value='Dhanusu'>தனுசு </option><option value='Magaram'>மகரம்</option><option value='Kumbam'>கும்பம் </option><option value='Meenam'>மீனம் </option></select>";

  $natchathiram =
  "<select class='custom-select' name='f_natchathiram[]' ><option value=''>Please Select Natchathiram...</option><option value='அஸ்வினி'>அஸ்வினி - சரஸ்வதி தேவி</option><option value='பரணி'>பரணி - துர்கா தேவி</option><option value='கார்த்திகை'>கார்த்திகை - முருகப்பெருமான்</option><option value='ரோகிணி'>ரோகிணி - கிருஷ்ணன்</option><option value='மிருகசீரிஷம்'>மிருகசீரிஷம் - சிவபெருமான்</option><option value='திருவாதிரை'>திருவாதிரை - சிவபெருமான்</option><option value='புனர்பூசம்'>புனர்பூசம் - ராமர்</option><option value='பூசம்'>பூசம் - தட்சிணாமூர்த்தி</option><option value='ஆயில்யம்'>ஆயில்யம் - ஆதிசேஷன்</option><option value='மகம்'>மகம் - சூரிய பகவான்</option><option value='பூரம்'>பூரம் - ஆண்டாள்</option><option value='உத்திரம்'>உத்திரம் - மகாலட்சுமி</option><option value='ஹஸ்தம்'>ஹஸ்தம் - காயத்திரி தேவி</option><option value='சித்திரை'>சித்திரை - சக்கரத்தாழ்வார்</option><option value='சுவாதி'>சுவாதி - நரசிம்மமூர்த்தி</option><option value='விசாகம்'>விசாகம் - முருகப்பெருமான்</option><option value='அனுசம்'>அனுசம் - லட்சுமி நாராயணர்</option><option value='கேட்டை'>கேட்டை - வராஹ பெருமாள்</option><option value='மூலம்'>மூலம் - ஆஞ்சநேயர்</option><option value='பூராடம்'>பூராடம் - ஜம்புகேஸ்வரர்</option><option value='உத்திராடம்'>உத்திராடம் - விநாயகப் பெருமான்</option><option value='திருவோணம்'>திருவோணம் - ஹயக்ரீவர்</option><option value='அவிட்டம்'>அவிட்டம் - அனந்த சயனப் பெருமாள்</option><option value='சதயம்'>சதயம் மிருத்யுஞ்ஜேஸ்வரர்</option><option value='பூரட்டாதி'>பூரட்டாதி - ஏகபாதர்</option><option value='உத்திரட்டாதி'>உத்திரட்டாதி - மகா ஈஸ்வரர்</option><option value='ரேவதி'>ரேவதி - அரங்கநாதன்</option></select>";
  $rowno = $("#family_table tr").length;

   $rowno = $rowno + 1;
   $("#family_table tr:last").after("<tr id='row"+$rowno+"'><td width='40px'><input type='text' class='form-control' value="+$rowno+" readonly></td><td><input type='text' name='f_name[]'class='form-control'  placeholder='Name' ></td><td><input type='date' name='f_dob[]' class='form-control' placeholder='DOB' ></td><td>"+ $rasi +"</td><td>"+ $natchathiram +"</td><td><a href='javascript:void(0)' class='btn btn-danger' onclick=delete_row('row"+$rowno+"')><i class='material-icons'>delete</i></a></td></tr>");
  }
  function delete_row(rowno)
  {
   $('#'+rowno).remove();
  }
  </script>
@endpush
