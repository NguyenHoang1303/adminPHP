@extends('admin.master-admin')
@section('page-css')
    <style>
        .close-preview {
            font-size: 15px;
            position: absolute;
            right: 5px;
            top: -9px;
            z-index: 1000;
            cursor: pointer;
        }

        .error {
            color: red;
        }

        .x_title .alert-danger {
            color: #ffffff;
            background-color: rgba(232, 38, 16, 0.7);
            border-color: rgba(255, 22, 0, 0.7);
        }

        .ck-editor__editable_inline {
            min-height: 200px;
        }
    </style>
@endsection
@section('breadcrumb')
    <div class="page-title">
        <div class="title_left">
            <h3>Admin | Product Page</h3>
        </div>
    </div>
@endsection
@section('page-content')
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <div class="col-md-3 col-sm-3"><h2>Form product</h2></div>
                    @if ($errors->any())
                        <div class="col-md-12 col-sm-12 alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li class="col-md-4 col-sm-4">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="clearfix"></div>
                </div>
                @include('admin.include.flash-message')
                <div class="x_content">
                    <br/>
                    @if(request()->is('admin/product/updateAll*'))
                        @php
                        $route = route('updateAllProduct')
                        @endphp
                    @elseif(isset($item))
                        @php
                            $route = route('updateProduct')
                        @endphp
                    @else
                        @php
                            $route = route('createProduct')
                        @endphp
                    @endif
                    <form name="formCategory" method="post"
                          action="{{$route}}">
                        @csrf

                        @if(request()->is('admin/product/updateAll*'))
                            @include('admin.include.form-include')

                        @else
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align"> Name *</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" name="name"
                                           value="{{ $item->name ?? request()->old('name') }}"
                                           class="form-control ">
                                    @error('name')
                                    <div class="text-danger">* {{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            @include('admin.include.form-include')
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align"> Description *</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <label>
                                    <textarea style="   width: 100%" name="description" rows="4" id="description"
                                              cols="50">{{ $item->description ?? request()->old('description') }}</textarea>
                                    </label>
                                    @error('description')
                                    <div class="text-danger">* {{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align"> Image *</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="hidden" class="form-control" name="thumbnail"
                                           value="{{ $item->thumbnail ?? request()->old('thumbnail') }}">
                                    {{--                                <a href="#" id="opener">upload</a>--}}
                                    <button type="button" id="upload_widget" class="cloudinary-button mb-3">Upload files
                                    </button>
                                    @error('thumbnail')
                                    <div class="text-danger">* {{ $message }}</div>
                                    @enderror
                                    <div id="preview-img">
                                    @if(isset($item))
                                        @foreach($item->listImage as $image)
                                                <div class="col-md-3 col-sm-3 position-relative">
                                                    <span class="close-preview">&#10006;</span>
                                                    <img src="{{$image}}"
                                                         data-delete-token = "${result.info.delete_token}"
                                                         class="col-md-12 col-sm-12 img-thumbnail mr-2 mb-2 imagesChoice">
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align"> Detail content *</label>
                                <div class="col-md-6 col-sm-6 ">
                                <textarea
                                    placeholder="Enter detail product" name="detail" class="detailProduct"
                                    id="editor">{{ $item->detail ?? request()->old('detail') }}</textarea>
                                    @error('detail')
                                    <div class="text-danger">* {{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="ln_solid"></div>

                        @endif
                        <div class="item form-group">
                            <div class="col-md-6 col-sm-6 offset-md-3">
                                <a class="btn btn-primary" style="color: white" href="{{route('products')}}">Cancel</a>
                                <button class="btn btn-primary" id="reset" type="reset">Reset</button>
                                <button class="btn btn-success">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page-script')
    <script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>
    <script src="https://upload-widget.cloudinary.com/global/all.js" type="text/javascript"></script>
    <script src="/admin/js/form-admin.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
