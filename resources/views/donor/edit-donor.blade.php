@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card custom-card">
                <div class="custom-card-header">View Donor</div>

                <div class="card-body">
                    <form action="{{ route('donors.update', ['donor' => $donor]) }}" method="post">
                      {{ csrf_field() }}
                      {{ method_field('PATCH') }}
                        <div class="form-row pb-4">
                            <div class="col-md-6">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" id="name" value="{{ $donor->name }}" required autofocus>
                            </div>
                            <div class="col-md-6">
                                <label for="name">Phone</label>
                                <input type="text" class="form-control" name="phone" id="phone" value="{{ $donor->phone }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-row pb-4">
                            <div class="col-md-6">
                                <label for="name">Door No</label>
                                <input type="text" class="form-control" name="door_no" id="door_no" value="{{ $donor->doorno }}" required autofocus>
                            </div>
                            <div class="col-md-6">
                                <label for="type">Donation Type</label>
                                <select class="custom-select" name="type" id="type" required>
                                    <option disabled selected>
                                        Please Select
                                    </option>
                                    <option {{ $donor->type=='monthly' ? 'selected' : '' }} value="monthly">
                                        Monthly Once
                                    </option>
                                    <option {{ $donor->type=='festival' ? 'selected' : '' }} value="festival">
                                        Fesitival Seasons
                                    </option>
                                    <option {{ $donor->type=='laksha' ? 'selected' : '' }} value="laksha">
                                        Laksha Archanai
                                    </option>
                                    <option {{ $donor->type=='others' ? 'selected' : '' }} value="others'">Others</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-row pb-4">
                            <div class="col-md-6">
                                <label for="address1">Address Line1</label>
                                <input type="text" class="form-control" name="address1" id="address1" value="{{ $donor->address1 }}" required>
                            </div>

                            <div class="col-md-6">
                                <label for="address2">Address Line2</label>
                                <input type="text" class="form-control" name="address2" id="address2" value="{{ $donor->address2 }}" required>
                            </div>
                        </div>

                        <div class="form-row  pb-4">
                            <div class="col-md-4">
                                <label for="state">State</label>
                                <input type="text" value="{{ $donor->state }}" class="form-control" name="state" id="state" required>
                            </div>

                            <div class="col-md-5">
                                <label for="type">District</label>
                                <select class="custom-select" name="district" id="district" required>
                                    <option disabled selected>Please Select</option>
                                    <option {{ $donor->district =='pudukkottai' ? 'selected' : ' ' }} value="pudukkottai">Pudukottai</option>
                                    <option {{ $donor->district =='chennai' ? 'selected' : ' ' }} value="chennai">Chennai</option>
                                </select>
                            </div>

                            <div class="col-md-3">
                                <label for="pincode">Pincode</label>
                                <input type="text" maxlength="6" class="form-control" name="pincode" value="{{ $donor->pincode }}" id="pincode" required>
                            </div>
                        </div>
                        <button class="btn btn-primary float-right" type="submit">Update</button>
                    </form>
                    <a href="#" class="btn btn-danger"data-toggle="modal" data-target="#addfamily" data-backdrop="static">Add family Details</a>

        </div>
      </div>
      <br>
<div class="card custom-card">
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
        <td>{{ $family->natchathiram }}</td>
        <td><a href="#" class="btn btn-warning btn-sm">Edit</a></td>
      @empty
        <td colspan="6" class="text-center">No Data Load</td>
    </tr>
  @endforelse
  </tbody>
</table>

        <div class="modal fade" id="addfamily" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
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
                     <td  width="40px;"><input type="text" class="form-control" readonly value="1"></td>
                     <td><input type="text" class="form-control" name="name[]" id="name"  placeholder="Name" required autofocus></td>
                     <td><input type="text" class="form-control" name="dob[]" id="dob" placeholder="DOB" required autofocus></td>
                     <td>
                     <select class="custom-select" name="rasi[]" required="">
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
                     <td><input type="text" class="form-control" name="natchathiram[]" id="natchathiram" placeholder="Natchathiram" required autofocus></td>
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
      </div>
    </div>
      </div>
</div>

@endsection

@push('script')
  <script type="text/javascript">
function add_row()
{
$row = "<select class='custom-select' name='rasi[]' required><option value=''>Please Select Rasi...</option> <option value='Mesham'>மேஷம் </option><option value='Rishabam'>ரிஷபம் </option><option value='Midhunam'>மிதுனம் </option> <option value='Kadagam'>கடகம் </option><option value='Simmam'>சிம்மம் </option> <option value='Kanni'>கன்னி </option><option value='Thulaam'>துலாம் </option><option value='Viruchigam'>விருச்சிகம்</option><option value='Dhanusu'>தனுசு </option><option value='Magaram'>மகரம்</option><option value='Kumbam'>கும்பம் </option><option value='Meenam'>மீனம் </option></select>";
 $rowno=$("#family_table tr").length;
 $rowno=$rowno+1;
 $("#family_table tr:last").after("<tr id='row"+$rowno+"'><td width='40px'><input type='text' class='form-control' value="+$rowno+" readonly></td><td><input type='text' name='name[]'class='form-control'  placeholder='Name' required></td><td><input type='text' name='dob[]' class='form-control' placeholder='DOB' required></td><td>"+ $row +"</td><td><input type='text' name='natchathiram[]' class='form-control' placeholder='Natchathiram' required></td><td><a href='#' class='btn btn-danger' onclick=delete_row('row"+$rowno+"')><i class='material-icons'>delete</i></a></td></tr>");
}
function delete_row(rowno)
{
 $('#'+rowno).remove();
}
</script>
@endpush
