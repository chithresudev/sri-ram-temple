
        <div class="col-md-12 mb-4">
            <form id="search" action="{{ route('donors.searchable') }}" method="post">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-3">
                      <select id="filterby" name="filter_by" class="custom-select" required>
                        <option value='' selected>Choose...</option>
                        <option value="all">All</option>
                        <option value="name">Name</option>
                        <option value="pincode">Pincode</option>
                        <option value="phone">Mobile</option>
                        <option value="district">District</option>
                      </select>
                    </div>

                     <div class="form-group col-md-8">
                       <input type="text" name="search_by" class="form-control" id="searchby" placeholder="Search here....">
                     </div>

                    <div class="col-md-1">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                    </div>
            </form>
          </div>
