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
                    @if(session()->has('createOk'))
                        <div class="col-md-6 col-sm-6 success text-center p-1"><h6>{{ session()->get('createOk') }}</h6>
                        </div>
                    @endif
                    @if(session()->has('nameExist'))
                        <div class="col-md-6 col-sm-6 error text-center p-1"><h6>{{ session()->get('nameExist') }}</h6>
                        </div>
                    @endif
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br/>
                    <form name="formCategory" method="post"
                          action="{{!isset($item) ? route('createProduct') : route('updateProduct')}}">
                        @csrf
                        @if(isset($item))
                            <input type="hidden" name="id" value="{{$item->id}}">
                        @endif
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
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align"> Price *</label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="number" name="price"
                                       value="{{ $item->price ?? request()->old('price') }}"
                                       class="form-control ">
                                @error('price')
                                <div class="text-danger">* {{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group item">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Categories *</label>
                            <div class="col-md-6 col-sm-6 col-form-label">
                                <select name="category_id" class="form-control">
                                    <option selected disabled>--Select--</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}"
                                            {{isset($item) && $item->category_id == $category->id ? 'selected': '' }}
                                            {{request()->old('category_id') == $category->id ? 'selected': '' }}>

                                            {{$category->name}}</option>
                                    @endforeach
                                </select>
                                @error('categoryId')
                                <div class="text-danger">* {{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <?php
                        $status = [

                            (object)[
                                'name' => 'hết hàng',
                                'value' => 0
                            ],
                            (object)[
                                'name' => 'còn hàng',
                                'value' => 1
                            ],
                        ]
                        ?>
                        <div class="form-group item">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Status *</label>
                            <div class="col-md-6 col-sm-6 col-form-label">
                                <select name="status" class="form-control">
                                    <option selected disabled>--Select--</option>
                                    @foreach($status as $st)
                                        <option value="{{$st->value}}"
                                            {{isset($item) && $item->status == $st->value ? 'selected': '' }}>
                                            {{$st->name}}</option>
                                    @endforeach
                                </select>
                                @error('categoryId')
                                <div class="text-danger">* {{ $message }}</div>
                                @enderror
                            </div>
                        </div>

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
