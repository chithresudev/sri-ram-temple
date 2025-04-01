@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">

            @include('shared.searchable')
            <div class="col-md-12">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="card k-card">
                    {{ session(['ids' => $donors->pluck('id')]) }}
                    <div class="card-header">
                        All Devotee ({{ count($donors) }})
                        <div class="float-right">
                            <a href="{{ route('donors.create') }}" class="btn btn-success btn-sm">
                                Add Devotee
                            </a>
                            {{-- <a href="{{ route('tcpdf.printall') }}" class="btn btn-primary btn-sm">Print All Address</a> --}}
                            <a href="{{ route('donors.printAddress') }}" target="_blank" class="btn btn-primary btn-sm">A4
                                Print</a>
                            <a href="{{ route('donors.labelPrintAddress') }}" target="_blank"
                                class="btn btn-primary btn-sm">Thermal Label Print</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            @forelse($donors as $index => $donor)
                                <div class="col-md-6 p-2">
                                    <div class="card">
                                        <div class="card-body">
                                            <span id="donor-ids" data-ids="{{ $donor->id }}">
                                                <h5 class="card-title text-info fw-bold">{{ $donor->name }}

                                                </h5>


                                                <p class="card-text">{{ $donor->address }}</p>
                                                <p class="card-text">{{ $donor->phone_details }}</p>

                                                <a href="{{ route('donors.printAddress', ['id' => $donor]) }}"
                                                    class="btn btn-sm btn-primary " target="_blank">Print
                                                </a>
                                                <a href="{{ route('donors.donardetails', ['donor' => $donor]) }}"
                                                    class="btn btn-sm btn-info mx-2">
                                                    View</a>
                                                <a href="{{ route('donors.removeDonor', ['donor' => $donor]) }}"
                                                    class="btn btn-sm btn-danger">
                                                    Remove</a>

                                                <p class="float-right"><span
                                                        class="badge badge-sm {{ $donor->print_count == 0 ? 'badge-warning' : 'badge-success' }}">
                                                        {{ $donor->print_count == 0 ? 'Not Yet Print' : $donor->print_count . ' Time printed' }}
                                                    </span><br>
                                                    @if ($donor->print_count)
                                                        <small class="float-right"> Last Printed :
                                                            {{ $donor->print_last_time }}
                                                        </small>
                                                    @endif


                                                </p>


                                        </div>
                                    </div>
                                </div>

                            @empty
                                <div class="mx-auto">No Data Available found.</div>
                            @endforelse
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
