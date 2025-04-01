<div class="modal fade" id="importbulkdata" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Import Devotees</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('donors.import') }}" method="post" enctype='multipart/form-data'>
                    @csrf
                    <div class="form-group">
                        <div class="custom-file">

                            <input type="file" class="custom-file-input" accept=".xls,.xlsx,.csv" id="donor"
                                name="donor" required>
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

<script>
    // JavaScript to update the label with the selected file name
    document.getElementById('donor').addEventListener('change', function(e) {
        var fileName = e.target.files[0] ? e.target.files[0].name : "Choose file...";
        document.querySelector('.custom-file-label').textContent = fileName;
    });
</script>
