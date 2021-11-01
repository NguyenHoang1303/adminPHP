@extends('admin.master-admin')
@section('page-css')
    <style>
        .fa-sort-amount-desc {
            cursor: pointer;
        }

        .bs-glyphicons-list li span {
            float: left;
            font-size: 16px;
        }

        .bs-glyphicons-list li i {
            color: #000;
            float: left;
            margin-right: 20px;
            font-size: 20px;
        }

        .bs-glyphicons-list li {
            display: flex;
            align-items: baseline;
            width: 20%;
            height: auto;
            background-color: #ececec;

        }

        .bs-glyphicons-list a:hover {
            background-color: #c4dcf4;
            color: #FFF;
        }

        .bs-glyphicons-list li:hover {
            background-color: #c4dcf4;
            color: #FFF;
        }
        #sortName, #sortPrice{
            border-radius: 20px;
        }



        #menu-table {
            display: none;
        }
    </style>
@endsection
@section('breadcrumb')
    <div class="page-title mb-4">
        <div class="title_left mb-3">
            <h3>Admin | Product Page</h3>
        </div>
        <div class="title_right">
            <div class="bs-glyphicons" id="menu-table">
                <ul class="bs-glyphicons-list">
                    <li>
                        <i class="fa fa-check-circle-o text-danger"></i>
                        <span class="text-danger" id="numberChoice">0 select</span>
                    </li>
                    <a id="deleteAll" href="/admin/product/deleteAll?arrId=">
                        <li style="cursor: pointer">
                            <i class="fa fa-trash-o"></i>
                            <span style="color: #0b0b0b">Delete</span>
                        </li>
                    </a>
                    <a id="updateAll" href="/admin/product/updateAll/">
                        <li style="cursor: pointer">
                            <i class="fa fa-edit"></i>
                            <span style="color: #0b0b0b">Update</span>
                        </li>
                    </a>
                </ul>
            </div>
        </div>
    </div>
@endsection
@section('page-content')

    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <form action="{{route('searchProduct')}}" method="get" id="form-search">
                        <h2 class="col-sm-2 col-md-2">Product Manager</h2>
                        <div class="col-sm-9 col-md-9">
                            <div class="navbar-right">
                                <div class="col-md-4 col-sm-4 form-group pull-right top_search pr-2">
                                    <select name="sortName" class="form-control sortProduct" id="">

                                        <option selected value="0">---Name---</option>
                                        <option
                                            value="nameAsc" {{isset($sortName) && $sortName == 'nameAsc'? 'selected' : ''}}>
                                            Sort by name a-z
                                        </option>
                                        <option
                                            value="nameDesc" {{isset($sortName) && $sortName == 'nameDesc'? 'selected' : ''}}>
                                            Sort by name z-a
                                        </option>


                                    </select>
                                </div>

                                <div class="col-md-4 col-sm-4 form-group pull-right top_search pr-2">
                                    <select name="category" class="form-control" id="select-category">
                                        <option selected value="0">---Category---</option>
                                        @foreach($categories as $cate )
                                            <option
                                                value="{{$cate->id}}" {{isset($category) && $category == $cate->id? 'selected' : ''}}>
                                                {{$cate->name}}
                                            </option>

                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-4 col-sm-4 form-group pull-right  top_search">
                                    <input  type="text" class="form-control query"
                                           value="{{$oldName ?? ""}}" name="name"
                                           placeholder="Search for...">
                                    <span class="delete-search">&times;</span>
                                    <span class="icon-search"><i class="fa fa-search"></i></span>
                                </div>
                            </div>

                        </div>
                        <h2 class="col-sm-2 col-md-2"></h2>
                        <div class="col-sm-9 col-md-9">
                            <div class="navbar-right">
                                <div class="col-md-4 col-sm-4 form-group top_search pr-2">
                                    <select name="sortPrice" class="form-control sortProduct" >

                                        <option selected value="0">---Price---</option>
                                        <option
                                            value="priceAsc" {{isset($sortPrice) && $sortPrice == 'priceAsc'? 'selected' : ''}}>
                                            Sort by price low to height
                                        </option>
                                        <option
                                            value="priceDesc" {{isset($sortPrice) && $sortPrice == 'priceDesc'? 'selected' : ''}}>
                                            Sort by price height to low
                                        </option>

                                    </select>
                                </div>

                                {{--                                <div class="col-md-4 col-sm-4 form-group pull-right top_search pr-2">--}}
                                {{--                                    <select name="category" class="form-control" id="select-category">--}}
                                {{--                                        <option selected value="0">---Select category---</option>--}}
                                {{--                                        @foreach($categories as $cate )--}}
                                {{--                                            <option--}}
                                {{--                                                value="{{$cate->id}}" {{isset($category) && $category == $cate->id? 'selected' : ''}}>--}}
                                {{--                                                {{$cate->name}}--}}
                                {{--                                            </option>--}}

                                {{--                                        @endforeach--}}
                                {{--                                    </select>--}}
                                {{--                                </div>--}}

                                {{--                                <div class="col-md-4 col-sm-4 form-group pull-right  top_search">--}}
                                {{--                                    <input id="query" type="text" class="form-control"--}}
                                {{--                                           value="{{$oldName ?? ""}}" name="name"--}}
                                {{--                                           placeholder="Search for...">--}}
                                {{--                                    <span id="delete-search">&times;</span>--}}
                                {{--                                    <span id="icon-search-name"><i class="fa fa-search"></i></span>--}}
                                {{--                                </div>--}}
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </form>
                </div>
                @include('admin.include.flash-message')
                <div class="x_content">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box table-responsive">
                                @if(isset($data))
                                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                        <tr>
                                            <th><input type="checkbox" value="" name="selected-all"></th>
                                            <th>Name</th>
                                            <th>Image</th>
                                            <th style="width:35%;">Description</th>
                                            <th style="width:8%;">Price <small>(VND)</small></th>
                                            <th>Category</th>
                                            <th style="width:2%">Status</th>
                                            <th>CreateAt</th>
                                            <th>UpdateAt</th>
                                            <th style="width: 7%">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($data as $item)
                                            <tr>
                                                <td><input type="checkbox" value="{{$item->id}}" class="selected-item">
                                                </td>
                                                <td>{{$item->name}}</td>
                                                <td><img src="{{$item->firstImage}}" width="100px"
                                                         alt="">
                                                </td>
                                                <td>{{$item->description}}</td>
                                                <td>{{$item->formatPrice}}</td>
                                                <td>{{$item->category->name}}</td>
                                                <td>
                                                    {{$item->handlerStatus}}
                                                </td>
                                                <td>{{$item->created_at}}</td>
                                                <td>{{$item->updated_at}}</td>
                                                <td style="font-size: 14px; color: #0000c1;">
                                                    <span class="hover-pointer dataItem"
                                                          data-toggle="modal"
                                                          data-target="#informationModal"
                                                          data-item="{
                                                            &#34;id&#34;:&#34;{{$item->id}}&#34;,
                                                            &#34;name&#34;:&#34;{{$item->name}}&#34;,
                                                            &#34;price&#34;:&#34;{{$item->price}}&#34;,
                                                            &#34;category&#34;:&#34;{{$item->category->name}}&#34;,
                                                            &#34;description&#34;:&#34;{{$item->description}}&#34;,
                                                            &#34;thumbnail&#34;:&#34;{{$item->thumbnail}}&#34;,
                                                            &#34;status&#34;:&#34;{{$item->status}}&#34;,
                                                            &#34;created_at&#34;:&#34;{{$item->created_at}}&#34;,
                                                            &#34;updated_at&#34;:&#34;{{$item->updated_at}}&#34;
                                                            }"
                                                          data-detail="{{$item->detail}}">
                                                        <i class="fa fa-info mr-1 text-primary"
                                                           data-toggle="tooltip" data-placement="bottom"
                                                           title="Information"
                                                           data-original-title="Tooltip bottom"></i></span>

                                                    <a href="/admin/product/update/{{$item->id}}"
                                                       class="hover-pointer">
                                                        <i data-toggle="tooltip" data-placement="bottom" title=""
                                                           data-original-title="Edit"
                                                           class="fa fa-edit mr-1 text-primary"></i></a>
                                                    <span id="delete" class="hover-pointer dataItem"
                                                          data-toggle="modal"
                                                          data-target="#deleteModal"
                                                          data-name="{{$item->name}}"
                                                          data-id="{{$item->id}}">
                                                        <i data-toggle="tooltip" data-placement="bottom" title=""
                                                           data-original-title="Delete"
                                                           class="fa fa-trash mr-1 text-primary"></i></span>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <div class="dataTables_info" id="datatable_info" role="status"
                                                 aria-live="polite">Showing 1 {{ $paginate == 1 ? '': "to " .$paginate}}
                                                of {{$sumRecord}} entries
                                            </div>
                                        </div>
                                        <div class="col-sm-7">
                                            <div class="dataTables_paginate">
                                                {{$data->appends(request()->all())->links('admin.include.pagination')}}
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
    {{------------------------------------------------------------Modal Delete------------------------------------------------------}}
    @includeIf('admin.include.modalDelete',['url'=> 'product'])
    {{------------------------------------------------------------Modal Delete------------------------------------------------------}}
    {{------------------------------------------------------------Modal Information------------------------------------------------------}}

    @includeIf('admin.include.modalInformation')
    {{------------------------------------------------------------Modal Information------------------------------------------------------}}
@endsection
@section('page-script')
    <script src="/admin/js/manager-page.js"></script>
    <script>
        $('#nameSort').on('click', function () {
            $(this).toggleClass("fa-soccer-ball-o")
        })
    </script>
@endsection

