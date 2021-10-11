@extends('admin.master-admin')
@section('breadcrumb')
    <div class="page-title">
        <div class="title_left">
            <h3>Admin | Categories Page</h3>
        </div>
    </div>
@endsection
@section('page-content')
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <div class="col-md-3 col-sm-3"><h2>Form category</h2></div>
                    @if(Session::has('success'))
                        <div class="col-md-6 col-sm-6 success text-center p-1"><h6>{{ Session::get('success') }}</h6>
                        </div>
                    @endif
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br/>
                    <form name="formCategory" method="post"
                          action="{{!isset($item) ? route('admin.createCategory') : route('admin.updateCategory')}}">
                        @csrf
                        @if(isset($item))
                            <input type="hidden" name="id" value="{{$item->id}}">
                        @endif
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align"> Name *</label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" name="name"
                                       value="{{ !isset($item) ? request()->old('name') : $item->name}}"
                                       class="form-control ">
                                @if($errors->has('name'))
                                    <div class="error ">{{ $errors->first('name') }}</div>
                                @endif
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align"> Description *</label>
                            <div class="col-md-6 col-sm-6 ">
                                <label>
                                    <textarea style="width: 100%" name="description" rows="4" id="description"
                                              cols="50">{{ isset($item) ? $item->description : request()->old('description') }}</textarea>
                                </label>
                                @if($errors->has('description'))
                                    <div class="error ">{{ $errors->first('description') }}</div>
                                @endif
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align"> Image *</label>
                            <div class="col-md-6 col-sm-6 ">
                                <button type="button" id="upload_widget" class="cloudinary-button">Upload files</button>
                                @if($errors->has('thumbnail'))
                                    <div class="error ">{{ $errors->first('thumbnail') }}</div>
                                @endif
                                <input type="hidden" class="form-control" name="thumbnail"
                                       value="{{ isset($item) ? $item->thumbnail : request()->old('thumbnail') }}">
                                <div id="preview-img"></div>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="item form-group">
                            <div class="col-md-6 col-sm-6 offset-md-3">
                                <a class="btn btn-primary" style="color: white" href="/admin">Cancel</a>
                                <button class="btn btn-primary" id="reset" type="reset">Reset</button>
                                <button class="btn btn-success">{{!isset($item)? 'Create':'Update'}}</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('page-script')
    <script src="https://upload-widget.cloudinary.com/global/all.js" type="text/javascript"></script>
    <script src="/js/category-form.js"></script>
@endsection
