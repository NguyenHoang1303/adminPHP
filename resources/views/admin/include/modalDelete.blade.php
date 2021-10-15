<div class="modal fade" id="deleteModal" tabindex="-1"
     role="dialog"
     aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-header-1">
                <div style="width: 70%; float: left">
                    <h5 class="modal-title pt-2 pl-2" id="confirmDelete"></h5>
                </div>
                <div style="width: 30%; float: left">
                    <button type="button" class="close " data-dismiss="modal"
                            aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            <div class="modal-footer">
                <a class="btn btn-secondary" data-dismiss="modal">No</a>
                <a class="btn btn-primary" id="deleteId"
                   href="/admin/{{$url}}/delete/"
                >Yes</a>
            </div>
        </div>
    </div>
</div>
