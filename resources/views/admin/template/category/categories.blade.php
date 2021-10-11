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
                    <h2>Category Manager</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <div class="col-md-12 col-sm-12 form-group pull-right top_search">
                            <form action="{{route('admin.searchCategory')}}" method="get">
                                <div class="input-group">
                                    <input type="text" class="form-control" value="{{$oldQuery ?? ""}}" name="nameQuery"
                                           placeholder="Search for...">
                                    <span class="input-group-btn">
                                    <button class="btn btn-default">Go!</button>
                                 </span>
                                </div>
                            </form>
                        </div>
                    </ul>
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
                                                <td><img src="{{rtrim($item->thumbnail,",")}}" width="100px" alt="">
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
                                                    <span id="delete" class="hover-pointer dataItem"
                                                          data-toggle="modal"
                                                          data-target="#informationModal"
                                                          data-created_at="{{$item->created_at}}"
                                                          data-updated_at="{{$item->updated_at}}"
                                                          data-description="{{$item->description}}"
                                                          data-thumbnail="{{rtrim($item->thumbnail,",")}}"
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
                       href="/admin/category/delete/"
                    >Yes</a>
                </div>
            </div>
        </div>
    </div>
    {{------------------------------------------------------------Modal Delete------------------------------------------------------}}
    {{------------------------------------------------------------Modal Information------------------------------------------------------}}
    <div class="modal fade" id="informationModal" tabindex="-1"
         role="dialog"
         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

                <div class="modal-header-1">
                    <div style="width: 70%; float: left">
                        <h5 class="modal-title pt-2 pl-2" id="confirmDelete">Information Category</h5>
                    </div>
                    <div style="width: 30%; float: left">
                        <button type="button" class="close " data-dismiss="modal"
                                aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
                <div class="modal-body" id="modal-body-inforCategory">
                    <div>
                        <label>Name:</label>
                        <p id="nameCategory"></p>
                    </div>
                    <div>
                        <label>Description:</label>
                        <p id="descriptionCategory"></p>
                    </div>
                    <div>
                        <label>Image:</label>
                        <img id="thumbnailCategory"
                             src=""
                             alt="">
                    </div>
                    <div>
                        <label>Create_At:</label>
                        <p id="created_atCategory"></p>
                    </div>
                    <div>
                        <label>Update_At:</label>
                        <p id="updated_atCategory">Nguyen</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <a class="btn btn-secondary" data-dismiss="modal">Cancel</a>
                </div>
            </div>
        </div>
    </div>

    {{------------------------------------------------------------Modal Information------------------------------------------------------}}
@endsection
@section('page-script')
    <script>
        const deleteId = $('#deleteId');
        const updateId = $('#updateId');
        const urlDelete = deleteId.attr('href')
        const urlUpdate = updateId.attr('href')

        $('.dataItem').on('click', function () {
            const name = $(this).data('name');
            const id = $(this).data('id');
            const description = $(this).data('description');
            const thumbnail = $(this).data('thumbnail');
            const updated_at = $(this).data('updated_at');
            const created_at = $(this).data('created_at');
            const category = {
                'id': id,
                'name': name,
                'description': description,
                'thumbnailCategory': thumbnail,
                'created_at': created_at,
                'updated_at': updated_at
            }
            getInformationCategory(category)
            deleteCategory(id, name);
        })

        // deleteId.attr('href', "");

        function deleteCategory(id, name) {
            $('#confirmDelete').text(`Do you wan to delete ${name}?`);
            deleteId.attr('href', urlDelete + id)
        }

        function getInformationCategory(category) {
            const id = category.id;
            const name = category.name;
            const description = category.description;
            const thumbnails = category.thumbnailCategory;
            const created_at = category.created_at;
            const updated_at = category.updated_at;
            $('#nameCategory').text(name)
            $('#descriptionCategory').text(description)
            $('#created_atCategory').text(created_at)
            $('#updated_atCategory').text(updated_at)
            $('#thumbnailCategory').attr('src', thumbnails)
            updateId.attr('href', urlUpdate + id)

        }
    </script>
@endsection
