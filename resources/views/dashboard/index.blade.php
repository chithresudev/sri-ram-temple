@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @include('shared.searchable')
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header text-center border-bottom-0">Total Donors Count</div>

                    <div class="card-body">
                        <h1 class="text-center">{{ $total_donor }}</h1>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header text-center border-bottom-0">This Month Donors Count</div>

                    <div class="card-body">
                        <h1 class="text-center">{{ $month_donor }}</h1>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header text-center border-bottom-0">Today Donors Count</div>

                    <div class="card-body">
                        <h1 class="text-center">{{ $today_donor }}</h1>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header text-center border-bottom-0">Upcoming Birthday</div>

                    <div class="card-body">
                        <h1 class="text-center">0</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center pt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center border-bottom-0">Upcoming Birthday</div>

                    <div class="card-body p-0">
                        <table class="table table-striped mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">Family Head</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Age</th>
                                    <th scope="col">Birthday</th>
                                    <th scope="col">Rasi</th>
                                    <th scope="col">Natchathiram</th>

                                </tr>
                            </thead>
                            <tbody>

                                @forelse($ups as $key => $up)
                                    <tr>
                                        <td> {{ $up->family_head }} </td>
                                        <td> {{ $up->name }} </td>
                                        <td class="text-info">
                                            {{ $up->birthday }}


                                        </td>
                                        <td> {{ $up->dob }} </td>
                                        <td> {{ $up->rasi }} </td>
                                        <td> {{ $up->natchathiram }} </td>

                                    </tr>
                                @empty
                                    <td class="text-center" colspan="10">No data Available</td>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
