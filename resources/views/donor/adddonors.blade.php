@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card custom-card">
                <div class="custom-card-header">Add Donor</div>

                <div class="card-body">
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
@endsection
