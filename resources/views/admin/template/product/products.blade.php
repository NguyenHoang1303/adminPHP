@extends('admin.master-admin')
@section('page-css')
    <style>
        #input-search {
            position: relative;
        }

        #delete-search {
            position: absolute;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            right: 2px;
            top: 8px;
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
                    <h2 class="col-sm-2 col-md-2">Product Manager</h2>
                    <div class="col-sm-9 col-md-9">
                        <form action="{{route('searchProduct')}}" method="get">
                            <div class="navbar-right">
                                <div class="col-md-4 col-sm-4 form-group top_search pr-2">
                                    <select name="sort" class="form-control" id="select-sort">

                                        <option value="-1"  selected>---Select option---</option>
                                        <option value="nameAsc" {{isset($sort) && $sort == 'nameAsc'? 'selected' : ''}}>
                                            Sort by name a-z
                                        </option>
                                        <option
                                            value="nameDesc" {{isset($sort) && $sort == 'nameDesc'? 'selected' : ''}}>
                                            Sort by name z-a
                                        </option>
                                        <option
                                            value="priceAsc" {{isset($sort) && $sort == 'priceAsc'? 'selected' : ''}}>
                                            Sort by price low to height
                                        </option>
                                        <option
                                            value="priceDesc" {{isset($sort) && $sort == 'priceDesc'? 'selected' : ''}}>
                                            Sort by price height to low
                                        </option>

                                    </select>
                                </div>

                                <div class="col-md-4 col-sm-4 form-group pull-right top_search pr-2">
                                    <select name="category" class="form-control" id="select-category">
                                        <option selected value="-1">---Select category---</option>
                                        @foreach($categories as $cate )
                                            <option
                                                value="{{$cate->id}}" {{isset($category) && $category == $cate->id? 'selected' : ''}}>
                                                {{$cate->name}}
                                            </option>

                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-4 col-sm-4 form-group pull-right top_search">
                                    <div class="input-group">
                                        <div id="input-search">
                                            <input id="query" type="text" class="form-control"
                                                   value="{{$oldQuery ?? ""}}" name="query"
                                                   placeholder="Search for...">
                                            <span id="delete-search">&times;</span>
                                        </div>
                                        <span class="input-group-btn">
                                            <button class="btn btn-default">Go!</button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    @if(session()->has('fail'))
                        <div style="width: 100%; display: flex; justify-content: center">
                            <p style="margin: 0; font-size: 16px; color: red">{{session()->get('fail')}}</p>
                        </div>
                    @elseif(session()->has('deleteSuccess'))
                        <div style="width: 100%; display: flex; justify-content: center">
                            <p style="margin: 0; font-size: 16px; color: limegreen">{{session()->get('deleteSuccess')}}</p>
                        </div>
                    @elseif(session()->has('successUpdate'))
                        <div style="width: 100%; display: flex; justify-content: center">
                            <p style="margin: 0; font-size: 16px; color: limegreen">{{session()->get('successUpdate')}}</p>
                        </div>
                    @elseif(session()->has('search'))
                        <div style="width: 100%; display: flex; justify-content: center">
                            <p style="margin: 0; font-size: 16px; color: red">{{session()->get('search')}}</p>
                        </div>
                    @endif

                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box table-responsive">
                                @if(isset($data))
                                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Image</th>
                                            <th style="width:35%;">Description</th>
                                            <th style="width:8%;">Price <small>(vnđ)</small></th>
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
                                                    <div class="tooltip-bottom">
                                                    <span class="hover-pointer dataItem"
                                                          data-toggle="modal"
                                                          data-target="#informationModal"
                                                          data-created_at="{{$item->created_at}}"
                                                          data-category_id="{{$item->category_id}}"
                                                          data-updated_at="{{$item->updated_at}}"
                                                          data-description="{{$item->description}}"
                                                          data-thumbnail="{{$item->thumbnail}}"
                                                          data-name="{{$item->name}}"
                                                          data-detail="{{$item->detail}}"
                                                          data-price="{{"$item->price"}}"
                                                          data-status="{{$item->status}}"
                                                          data-id="{{$item->id}}">
                                                        <i class="fa fa-info mr-1 text-primary"></i></span>
                                                        <span class="tooltip-text">Information</span>
                                                    </div>
                                                    <div class="tooltip-bottom">
                                                        <a href="/admin/product/update/{{$item->id}}"
                                                           class="hover-pointer">
                                                            <i class="fa fa-edit mr-1 text-primary"></i></a>
                                                        <span class="tooltip-text">Edit</span>
                                                    </div>
                                                    <div class="tooltip-bottom">
                                                    <span id="delete" class="hover-pointer dataItem"
                                                          data-toggle="modal"
                                                          data-target="#deleteModal"
                                                          data-name="{{$item->name}}"
                                                          data-id="{{$item->id}}">
                                                        <i class="fa fa-trash mr-1 text-primary"></i></span>
                                                        <span class="tooltip-text">Delete</span>
                                                    </div>
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
                                                {{$data->links('admin.include.pagination')}}
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
    <?php
    $lisFieldModal = [
        'category_id' => "category_id",
        'detail' => 'detail',
        'price' => 'price',
        'thumbnail' => 'thumbnail',
        'status' => 'status',
    ];
    ?>
    @includeIf('admin.include.modalInformation',$lisFieldModal)
    {{------------------------------------------------------------Modal Information------------------------------------------------------}}
@endsection
@section('page-script')
    <script src="/admin/js/manager-page.js"></script>
@endsection

