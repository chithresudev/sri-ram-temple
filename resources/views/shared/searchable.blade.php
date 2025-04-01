<div class="col-md-12 mb-4">
    <form id="search" action="{{ route('donors.searchable') }}" method="post">
        @csrf

        @php
            $filter_by = app('request')->filter_by;
            $filter_by_2 = app('request')->filter_by_2;
            $search_by = app('request')->search_by;
            $search_by_2 = app('request')->search_by_2;
        @endphp
        <div class="form-row">
            <div class="form-group col-md-2">
                <select id="filterby" name="filter_by" class="custom-select" required>
                    <option {{ $filter_by == '' ? 'selected' : '' }} value='' selected>Choose...</option>
                    <option {{ $filter_by == 'all' ? 'selected' : '' }} value="all">All</option>
                    <option {{ $filter_by == 'name' ? 'selected' : '' }} value="name">Name</option>
                    <option {{ $filter_by == 'pincode' ? 'selected' : '' }} value="pincode">Pincode</option>
                    <option {{ $filter_by == 'phone1' ? 'selected' : '' }} value="phone1">Mobile</option>
                    <option {{ $filter_by == 'district' ? 'selected' : '' }} value="district">District</option>
                </select>
            </div>


            <div class="form-group col-md-3">
                <input type="text" name="search_by" value="{{ $search_by }}" class="form-control" id="searchby"
                    placeholder="Search here....">
            </div>

            <div class="form-group col-md-2">
                <select id="filterby" name="filter_by_2" class="custom-select">
                    <option value='' selected>Choose...</option>

                    <option {{ $filter_by_2 == 'name' ? 'selected' : '' }} value="name">Name</option>
                    <option {{ $filter_by_2 == 'pincode' ? 'selected' : '' }} value="pincode">Pincode</option>
                    <option {{ $filter_by_2 == 'phone1' ? 'selected' : '' }} value="phone1">Mobile</option>
                    <option {{ $filter_by_2 == 'district' ? 'selected' : '' }} value="district">District</option>
                </select>
            </div>


            <div class="form-group col-md-3">
                <input type="text" name="search_by_2" value="{{ $search_by_2 }}" class="form-control"
                    id="searchby_2" placeholder="Search....">
            </div>

            <div class="col-md-2">
                <a href="/donors/view" class="btn btn-danger">Clear</a>
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </div>
    </form>
</div>
