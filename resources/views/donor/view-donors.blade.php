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
            <h6>Donor Details</h6>
            <div class="card custom-card h-auto">
                <!-- <div class="custom-card-header">View Donor</div> -->
                <table class="table table-bordered">
                <thead>
                  <tr>
                    <th class="w-25">Name</th>
                    <td>{{ $donor->name }}</td>
                  </tr>
                  <tr>
                    <th>Phone</th>
                    <td>{{ $donor->phone }}</td>
                  </tr>
                  <tr>
                    <th>Door No</th>
                    <td>{{ $donor->doorno }}</td>
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
                    <td>{{ $donor->district }}</td>
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
                    <td>0</td>
                  </tr>
                  <tr>
                    <th>Rasi</th>
                    <td>{{ $donor->rasi }}</td>
                  </tr>
                  <tr>
                    <th>Natchathiram</th>
                    <td>{{ $donor->natchathiram }}</td>
                  </tr>
                  <tr>
                    <th>Donation Type</th>
                    <td> {{ $donor->type }} </td>
                  </tr>
                  <tr>
                    <th>Others Detail</th>
                    <td>{{ $donor->others_detail }} </td>
                  </tr>
                  <tr>
                    <th>Total Amount</th>
                    <td> Rs. {{ $donor->total_amount }}
                      <button class="btn btn-success btn-sm" data-target="#add_donation" data-toggle="modal" data-backdrop="static">Add Donation</button>
                      <button class="btn btn-info btn-sm" data-target="#view_donation" data-toggle="modal" data-backdrop="static">View Donation</button>

                    </td>
                  </tr>
                  <tr>
                    <th>Family Details</th>
                    <td>Family Members : {{ count($donor->families) }}
                    <button class="btn btn-success btn-sm" data-target="#addfamily" data-toggle="modal" data-backdrop="static">Add Family</button>
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
                     <td><input type="date" class="form-control" name="dob[]" id="dob" placeholder="DOB" required autofocus></td>
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

<!-- Add Donation -->
          <div class="modal fade" id="add_donation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Add Donations</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="{{ route('donors.donationAmt', ['donar' => $donor]) }}" method="post">
                      @csrf
                      <div class="form-row custom-form-row">
                          <div class="col-md-4">
                              <label for="name">Donation Via
                                <span class="required">*</span>
                              </label>
                              <select class="custom-select"name="via"id="via" required>
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
                              <input type="number" class="form-control" name="amount"
                              id="amount" required>
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
          <div class="modal fade" id="view_donation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <td><a href="{{ route('donors.otheraction', ['donation' => $donation,
                          'remove_amount'])}}" class="btn btn-danger btn-sm">Delete</a></td>
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
function add_row()
{
$row = "<select class='custom-select' name='rasi[]' required><option value=''>Please Select Rasi...</option> <option value='Mesham'>மேஷம் </option><option value='Rishabam'>ரிஷபம் </option><option value='Midhunam'>மிதுனம் </option> <option value='Kadagam'>கடகம் </option><option value='Simmam'>சிம்மம் </option> <option value='Kanni'>கன்னி </option><option value='Thulaam'>துலாம் </option><option value='Viruchigam'>விருச்சிகம்</option><option value='Dhanusu'>தனுசு </option><option value='Magaram'>மகரம்</option><option value='Kumbam'>கும்பம் </option><option value='Meenam'>மீனம் </option></select>";
 $rowno=$("#family_table tr").length;
 $rowno=$rowno+1;
 $("#family_table tr:last").after("<tr id='row"+$rowno+"'><td width='40px'><input type='text' class='form-control' value="+$rowno+" readonly></td><td><input type='text' name='name[]'class='form-control'  placeholder='Name' required></td><td><input type='date' name='dob[]' class='form-control' placeholder='DOB' required></td><td>"+ $row +"</td><td><input type='text' name='natchathiram[]' class='form-control' placeholder='Natchathiram' required></td><td><a href='#' class='btn btn-danger' onclick=delete_row('row"+$rowno+"')><i class='material-icons'>delete</i></a></td></tr>");
}
function delete_row(rowno)
{
 $('#'+rowno).remove();
}
</script>
@endpush
