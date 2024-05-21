@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">

        <div class="col-md-12">
            <div class="card k-card">
                <div class="card-header">
                    All Donors
                    <a href="{{ route('donors.create') }}" 
                    class="btn btn-info btn-sm float-right">Add Donation</a>
                </div>

                <div class="card-body p-0">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>City</th>
                                <th>District</th>
                                <th>Type</th>
                                <th>Donations</th>
                            </tr>
                        </thead>
                        <tbody>
                           @forelse($donations as $donation)
                           <tr>
                               <td>{{ $donation->id }}</td>
                               <td></td>
                               <td></td>
                               <td></td>
                               <td></td>
                               <td></td>
                               <td></td>
                           </tr>
                           @empty
                           <tr class="text-center">
                               <td colspan="7" >No donations found.</td>
                           </tr>
                           @endforelse
                        </tbody>
                    </table>
                    {{ $donations->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
