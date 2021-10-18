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
                    <h2 class="col-sm-3 col-md-3">Category Manager</h2>
                    <div class="col-sm-9 col-md-9">
                        <form action="{{route('searchByNameCategory')}}" method="get">
                            <div class="navbar-right">
                                <div class="col-md-5 col-sm-5 form-group top_search">
                                    <select name="sort" class="form-control" id="select-sort">
                                        <option disabled selected>---Select option---</option>
                                        <option value="nameAsc" {{isset($sort) && $sort == 'nameAsc'? 'selected' : ''}}>Sort by name a-z</option>
                                        <option value="nameDesc" {{isset($sort) && $sort == 'nameDesc'? 'selected' : ''}}>Sort by name z-a</option>
                                    </select>
                                </div>

                                <div class="col-md-2 col-sm-2 form-group pull-right top_search">
                                </div>

                                <div class="col-md-5 col-sm-5 form-group pull-right top_search">
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
                                            <th style="width:40%;">Description</th>
                                            <th>Status</th>
                                            <th>CreateAt</th>
                                            <th>UpdateAt</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($data as $item)
                                            <tr>
                                                <td>{{$item->name}}</td>
                                                <td><img src="{{explode(",",$item->thumbnail)[0]}}" width="100px"
                                                         alt="">
                                                </td>
                                                <td>{{$item->description}}</td>
                                                <td>
                                                    @if($item->status == 1)
                                                        unlock
                                                    @elseif($item->status == 2)
                                                        lock
                                                    @else
                                                        deleted
                                                    @endif
                                                </td>
                                                <td>{{$item->created_at}}</td>
                                                <td>{{$item->updated_at}}</td>
                                                <td style="font-size: 14px; color: #0000c1;">
                                                    <div class="tooltip-bottom">
                                                    <span id="information" class="hover-pointer dataItem"
                                                          data-toggle="modal"
                                                          data-target="#informationModal"
                                                          data-created_at="{{$item->created_at}}"
                                                          data-updated_at="{{$item->updated_at}}"
                                                          data-status="{{$item->status}}"
                                                          data-description="{{$item->description}}"
                                                          data-thumbnail="{{$item->thumbnail}}"
                                                          data-name="{{$item->name}}"
                                                          data-id="{{$item->id}}">
                                                        <i class="fa fa-info mr-1 text-primary"></i></span>
                                                        <span class="tooltip-text">Information</span>
                                                    </div>
                                                    <div class="tooltip-bottom">
                                                        <a href="/admin/category/update/{{$item->id}}"
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
    @include('admin.include.modalDelete',['url'=> 'category'])
    {{------------------------------------------------------------Modal Delete------------------------------------------------------}}
    {{------------------------------------------------------------Modal Information------------------------------------------------------}}
    <?php
    $lisFieldModal = [
        'thumbnail' => 'thumbnail',
        'status' => 'status',
    ];
    ?>
    @include('admin.include.modalInformation',$lisFieldModal)
    {{------------------------------------------------------------Modal Information------------------------------------------------------}}
@endsection
@section('page-script')
    <script src="/admin/js/manager-page.js"></script>
@endsection
