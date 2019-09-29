@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
  @include('shared.searchable')
        <div class="col-md-12">
            <div class="card k-card">
              <div class="card-header">
                  All Donors
                  <div class="float-right">
                  <button class="btn btn-green btn-sm" data-target="#importbulkdata" data-toggle="modal" data-backdrop="static">Add Bulk Donors</button>
                  <button class="btn btn-orange btn-sm" data-toggle="modal" data-target="#single_donor" data-backdrop="static">
                    Add Single Donors
                  </button>
                  <button id="print_all" data-url="{{ route('tcpdf.printall') }}" class="btn btn-danger btn-sm">Print All Address</button>
                </div>
              </div>

                <div class="card-body p-0">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                           @forelse($donors as $index => $donor)
                           <tr>
                               <td>{{ $donors->firstItem() + $index  }}</td>
                               <td>{{ $donor->name }}</td>
                               <td>{{ $donor->phone }}</td>
                               <td>{{ $donor->address }}</td>
                               <td>
                                 <a href="{{ route('tcpdf.index', ['printdetails' => $donor]) }}" class="btn btn-sm btn-success">Print
                                 </a>
                                  <a href="{{ route('donors.show', ['donor' => $donor]) }}" class="btn btn-sm btn-danger">
                                  View</a>
                                </td>
                           </tr>
                           @empty
                           <tr class="text-center">
                               <td colspan="7" >No donors found.</td>
                           </tr>
                           @endforelse
                        </tbody>
                    </table>
                </div>
            </div><br>
            {{-- {{ $donors->links() }} --}}
            {{ $donors->appends(['sort' => 'votes'])->links() }}
        </div>

        {{-- Bulk Data  --}}

<div class="modal fade" id="importbulkdata" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Import Donors</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('donors.import') }}" method="post"
        enctype='multipart/form-data'>
            @csrf
            <div class="form-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="donor" name="donor" required>
                        <label class="custom-file-label" for="donor">Choose file</label>
                    </div>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Upload</button>
      </div>
        </form>
    </div>
  </div>
</div>


{{-- Single data inster --}}
<div class="modal fade" id="single_donor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Insert Single Donors</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="needs-validation" action="{{ route('donors.store') }}" method="POST">
            @csrf
            <div class="form-row pb-4">
                <div class="col-md-6">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name"
                    id="name" required autofocus>
                </div>
                <div class="col-md-6">
                    <label for="name">Phone</label>
                    <input type="text" class="form-control" name="phone"
                    id="phone" required autofocus>
                </div>
            </div>

            <div class="form-row pb-4">
              <div class="col-md-6">
                  <label for="name">Door No</label>
                  <input type="text" class="form-control" name="door_no"
                  id="door_no" required autofocus>
              </div>
                <div class="col-md-6">
                    <label for="type">Donation Type</label>
                    <select class="custom-select"name="type"id="type" required>
                        <option value="">Please Select</option>
                        <option value="monthly">Monthly Once</option>
                        <option value="festival"> Fesitival Seasons</option>
                        <option value="laksha">Laksha Archanai</option>
                        <option value="others'">Others</option>
                    </select>
                </div>
                {{-- <div class="col-md-6">
                    <label for="type">Type</label>
                    <select class="custom-select"name="type"id="type" required>
                        <option value="">Please Select</option>
                        <option value="yearly">Yearly Once</option>
                        <option value="monthly">Monthly Once</option>
                        <option value="quarterly">Quarterly Once</option>
                        <option value="half_yearly">Half Yearly Once</option>
                        <option value="weekly">Weekly Once</option>
                        <option value="daily">Daily</option>
                        <option value="festival_season"> Fesitival Seasons</option>
                        <option value="happy_days">Happy Days</option>
                        <option value="new">New</option>
                        <option value="unknown">Unknown</option>
                        <option value="others'">Others</option>
                    </select>
                </div> --}}
              </div>

              {{-- <div class="form-row pb-4 d-none">
                <div class="col-md-6">
                    <label for="name">Others Detail</label>
                    <input type="text" class="form-control" name="others_detail"
                    id="others_detail" required>
                </div>
            </div> --}}

            <div class="form-row pb-4">
                <div class="col-md-6">
                    <label for="address1">Address Line1</label>
                    <input type="text" class="form-control" name="address1"
                    id="address1" required>
                </div>

                <div class="col-md-6">
                    <label for="address2">Address Line2</label>
                    <input type="text" class="form-control" name="address2"
                    id="address2" required>
                </div>
            </div>

            <div class="form-row  pb-4">
          <div class="col-md-4">
              <label for="state">State</label>
              <input type="text" class="form-control" name="state"
              id="state" required>
          </div>

              <div class="col-md-5">
                  <label for="type">District</label>
                  <select class="custom-select"name="district"id="district" required>
                      <option value="">Please Select</option>
                      <option value="pudukkottai">Pudukottai</option>
                      <option value="chennai">Chennai</option>
                  </select>
              </div>

        <div class="col-md-3">
            <label for="pincode">Pincode</label>
            <input type="text" maxlength="6" class="form-control" name="pincode" id="pincode" required>
        </div>
            </div>

            <button class="btn btn-primary float-right" type="submit">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>

    </div>
</div>
@endsection

@push('script')
  <script>
    $(document).ready(function(){
      $('#searchby').attr('readonly', '#searchby');
      $('#filterby').change(function(){
        var filterby = $(this).val();
        if(filterby == 'all' || filterby == '') {
          $('#searchby').removeAttr('required');
          $('#searchby').attr('readonly', '#searchby');
        } else{
            $('#searchby').attr('required', '#searchby');
            $('#searchby').removeAttr('readonly');
        }

    });
    $('#print_all').click(function(){
    var data_url = $(this).data('url');
    // var params = $('#search').serialize();
    var filterby = $('#filterby').val();
    var value = $('#searchby').val();
    var url = data_url + "?filterby="+ filterby + "&searchby=" +  value;
    window.location.href = url;
  });
  });
  </script>
@endpush
