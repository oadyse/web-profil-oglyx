<div id="edit{{ $id }}" class="modal fade bd-example" tabindex="-1" role="dialog" aria-labelledby="createTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createTitle">Update Order Status</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('status', $id) }}" class="needs-validation" novalidate>
                    @csrf
                    @if ($pesanan->status == 'Belum Proses')
                        <div class="form-row justify-content-center">
                            <div class="radio d-inline-block mr-2">
                                <input type="radio" name="status" id="radio1" value="Proses">
                                <label for="radio1" style="font-size: 16px">Proses</label>
                            </div>
                        </div>
                        <div class="form-row justify-content-center">
                            <div class="radio d-inline-block mr-2">
                                <input type="radio" name="status" id="radio1" value="Selesai">
                                <label for="radio1" style="font-size: 16px">Selesai</label>
                            </div>
                        </div>
                    @elseif ($pesanan->status == 'Proses')
                        <div class="form-row justify-content-center">
                            <div class="radio d-inline-block mr-2">
                                <input type="radio" name="status" id="radio1" value="Selesai">
                                <label for="radio1" style="font-size: 16px">Selesai</label>
                            </div>
                        </div>
                    @endif
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>
