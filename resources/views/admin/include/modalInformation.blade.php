<div class="modal fade bd-example-modal-lg" id="informationModal" tabindex="-1"
     role="dialog"
     aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header-1">
                <div style="width: 70%; float: left">
                    <h5 class="modal-title pt-2 pl-2 text-dark font-weight-bold font-weight-lighter" id="confirmDelete">
                        INFORMATION</h5>
                </div>
                <div style="width: 30%; float: left">
                    <button type="button" class="close " data-dismiss="modal"
                            aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            <div class="modal-body" id="modal-body-information">
                <div class="col-sm-6 col-md-6 p-0">
                    <label>Name:</label>
                    <p id="name"></p>
                </div>
                @if(isset($status))
                    <div class="col-sm-6 col-md-6 p-0">
                        <label>Status:</label>
                        <p id="status"></p>
                    </div>
                @endif
                <div>
                    <label class="col-sm-12 col-md-12 p-0">Description:</label>
                    <div class="col-sm-12 col-md-12 p-0">
                        <p id="description"></p>
                    </div>
                </div>

                @if(isset($price))
                    <div class="col-sm-6 col-md-6 p-0">
                        <label>Price <small>(vnđ)</small>:</label>
                        <p id="{{$price}}"></p>
                    </div>
                @endif
                @if(isset($categoryId))
                    <div class="col-sm-6 col-md-6 p-0">
                        <label>CategoryId:</label>
                        <p id="{{$categoryId}}"></p>
                    </div>
                @endif
                <div class="col-sm-6 col-md-6 p-0">
                    <label>Create_At:</label>
                    <p id="created"></p>
                </div>
                <div class="col-sm-6 col-md-6 p-0">
                    <label>Update_At:</label>
                    <p id="updated"></p>
                </div>
                @if(isset($detail))
                    <div class="col-sm-12 col-md-12 p-0">
                        <label class="col-sm-12 col-md-12 p-0">Detail:</label>
                        <div id="{{$detail}}"></div>
                    </div>
                @endif
                @if(isset($thumbnail))
                    <div  class="col-sm-12 col-md-12 p-0">
                        <label class="col-sm-12 col-md-12 p-0">Thumbnail:</label>
                        <div id="thumbnail" ></div>
                    </div>
                @endif

            </div>
            <div class="modal-footer">
                <a class="btn btn-secondary" data-dismiss="modal">Cancel</a>
            </div>
        </div>
    </div>
</div>
