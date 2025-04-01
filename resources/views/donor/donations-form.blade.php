@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card k-card">
                <div class="card-header">Add Donation</div>

                <div class="card-body">
                    <form class="needs-validation" action="{{ route('donors.store') }}" method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" 
                                id="name" placeholder="Name" required autofocus>                            
                            </div>

                            <div class="col-md-6">
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
                            </div>                            
                        </div>

                        <div class="form-row mt-4">
                            <div class="col-md-6">
                                <label for="name">Others Detail</label>
                                <input type="text" class="form-control" name="others_detail" 
                                id="others_detail" placeholder="Other Details" required>                            
                            </div>                      
                        </div>

                        <div class="form-row mt-4">
                            <div class="col-md-6">
                                <label for="address1">Address Line1</label>
                                <input type="text" class="form-control" name="address1" 
                                id="address1" placeholder="Address Line1" required>                            
                            </div>

                            <div class="col-md-6">
                                <label for="address2">Address Line2</label>
                                <input type="text" class="form-control" name="address2" 
                                id="address2" placeholder="Address Line2" required>                            
                            </div>                       
                        </div>

                        <div class="form-row mt-4 mb-4">
                            <div class="col-md-5">
                                <label for="district">District</label>
                                <input type="text" class="form-control" name="district" 
                                id="district" placeholder="District" required>
                            </div>

                            <div class="col-md-5">
                                <label for="state">State</label>
                                <input type="text" class="form-control" name="state" 
                                id="state" placeholder="State" required>
                            </div>

                            <div class="col-md-2">
                                <label for="pincode">Pincode</label>
                                <input type="text" class="form-control" name="pincode" 
                                id="pincode" placeholder="Pincode" required>
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
