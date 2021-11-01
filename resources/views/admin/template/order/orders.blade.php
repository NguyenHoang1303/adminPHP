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


        .status-order div {
            display: inline-block;
            padding: 2px 10px;
            border-radius: 8px;
        }

        .checkOut-order div {
            display: inline-block;
            padding: 2px 10px;
            border-radius: 8px;
        }

        #menu-table {
            display: none;
        }
    </style>
@endsection
@section('breadcrumb')
    <div class="page-title mb-4">
        <div class="title_left mb-3">
            <h3>Admin | Order page</h3>
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
                <h2 class="col-sm-12 col-md-12 font-weight-bold">Product Manager</h2>
                <div class="x_title">
                    <form action="{{route('searchOrder')}}" method="get" id="form-search">
                        <div class="col-sm-12 col-md-12">
                            <div class="col-md-3 col-sm-3 form-group pull-right pr-2  top_search">
                                <input type="text" class=" form-control query"
                                       value="{{$oldName ?? ""}}" name="name"
                                       placeholder="Search by name...">
                                <span class="delete-search">&times;</span>
                                <span class="icon-search"><i class="fa fa-search"></i></span>
                            </div>
                            <div class="col-md-3 col-sm-3 form-group pull-right pr-2 top_search">
                                <input type="text" class=" form-control query"
                                       value="{{$oldPhone ?? ""}}" name="phone"
                                       placeholder="Search by phone...">
                                <span class="delete-search">&times;</span>
                                <span class="icon-search"><i class="fa fa-search"></i></span>
                            </div>
                            <div class="col-md-3 col-sm-3 form-group pull-right pr-2 top_search">
                                <input type="text" class=" form-control query"
                                       value="{{$oldEmail ?? ""}}" name="email"
                                       placeholder="Search by email...">
                                <span class="delete-search">&times;</span>
                                <span class="icon-search"><i class="fa fa-search"></i></span>
                            </div>
                            <div class="col-md-3 col-sm-3 form-group pull-right pr-2 top_search">
                                <input type="text" class=" form-control query"
                                       value="{{$oldId ?? ""}}" name="id"
                                       placeholder="Search by id...">
                                <span class="delete-search">&times;</span>
                                <span class="icon-search"><i class="fa fa-search"></i></span>
                            </div>
                            <div class="col-md-3 col-sm-3 form-group pull-right pr-2 top_search">
                                <input type="number" class=" form-control query"
                                       value="{{$oldMinPrice ?? ""}}" name="minPrice"
                                       placeholder="Min price...">
                                <span class="delete-search">&times;</span>
                                <span class="icon-search"><i class="fa fa-search"></i></span>
                            </div>
                            <div class="col-md-3 col-sm-3 form-group pull-right pr-2 top_search">
                                <input type="number" class=" form-control query"
                                       value="{{$oldMaxPrice ?? ""}}" name="maxPrice"
                                       placeholder="Max price...">
                                <span class="delete-search">&times;</span>
                                <span class="icon-search"><i class="fa fa-search"></i></span>
                            </div>
                            {{--        Sort name             --}}
                            <div class="col-md-3 col-sm-3 form-group pull-right top_search pr-2">
                                <select name="sortName" class="form-control sortOrder">

                                    <option selected value="{{SORT_REGULAR}}">---Name---</option>
                                    <option
                                        value="{{SORT_ASC}}" {{isset($sortName) && $sortName == SORT_ASC? 'selected' : ''}}>
                                        Sort by name a-z
                                    </option>
                                    <option
                                        value="{{SORT_DESC}}" {{isset($sortName) && $sortName == SORT_ASC? 'selected' : ''}}>
                                        Sort by name z-a
                                    </option>


                                </select>
                            </div>
                            {{--        Sort price             --}}
                            <div class="col-md-3 col-sm-3 form-group pull-right top_search pr-2">
                                <select name="sortPrice" class="form-control sortOrder" id="">

                                    <option selected value="{{SORT_REGULAR}}">---Total price---</option>
                                    <option
                                        value="{{SORT_ASC}}" {{isset($sortPrice) && $sortPrice == SORT_ASC? 'selected' : ''}}>
                                        Price low to height
                                    </option>
                                    <option
                                        value="{{SORT_DESC}}" {{isset($sortPrice) && $sortPrice == SORT_DESC? 'selected' : ''}}>
                                        Price height to low
                                    </option>
                                </select>
                            </div>
                            {{--        Search status             --}}
                            <div class="col-md-3 col-sm-3 form-group pull-right top_search pr-2">
                                <select name="status" class="form-control" id="select-category">
                                    <option selected value="{{\App\Enums\OrderStatus::None}}">---Status---</option>
                                    <option
                                        value="{{\App\Enums\OrderStatus::Cancel}}" {{isset($oldStatus) && $oldStatus == (\App\Enums\OrderStatus::Cancel)? 'selected' : ''}}>
                                        {{\App\Enums\OrderStatus::getKey(\App\Enums\OrderStatus::Cancel)}}
                                    </option>
                                    <option
                                        value="{{\App\Enums\OrderStatus::Done}}" {{isset($oldStatus) && $oldStatus == (\App\Enums\OrderStatus::Done)? 'selected' : ''}}>
                                        {{\App\Enums\OrderStatus::getKey(\App\Enums\OrderStatus::Done)}}
                                    </option>
                                    <option
                                        value="{{\App\Enums\OrderStatus::Waiting}}" {{isset($oldStatus) && $oldStatus == (\App\Enums\OrderStatus::Waiting)? 'selected' : ''}}>
                                        {{\App\Enums\OrderStatus::getKey(\App\Enums\OrderStatus::Waiting)}}
                                    </option>
                                    <option
                                        value="{{\App\Enums\OrderStatus::Processing}}" {{isset($oldStatus) && (\App\Enums\OrderStatus::Processing) == $oldStatus? 'selected' : ''}}>
                                        {{\App\Enums\OrderStatus::getKey(\App\Enums\OrderStatus::Processing)}}
                                    </option>
                                    <option
                                        value="{{\App\Enums\OrderStatus::Deleted}}" {{isset($oldStatus) && $oldStatus == (\App\Enums\OrderStatus::Deleted)? 'selected' : ''}}>
                                        {{\App\Enums\OrderStatus::getKey(\App\Enums\OrderStatus::Deleted)}}
                                    </option>
                                </select>
                            </div>
                            <div class="col-md-3 col-sm-3 form-group pull-right top_search pr-2">
                                <select name="payment" class="form-control sortOrder" id="">

                                    <option selected value="{{SORT_REGULAR}}">---Payment---</option>
                                    <option
                                        value="{{\App\Enums\Payment::Unpaid}}" {{isset($oldPayment) && $oldPayment == \App\Enums\Payment::Unpaid? 'selected' : ''}}>
                                        Unpaid
                                    </option>
                                    <option
                                        value="{{\App\Enums\Payment::Complete}}" {{isset($oldPayment) && $oldPayment == \App\Enums\Payment::Complete? 'selected' : ''}}>
                                        Complete
                                    </option>


                                </select>
                            </div>
                            <div class="col-md-3 col-sm-3 form-group pull-right top_search pr-2">
                                <select name="created_at" class="form-control sortOrder" id="">
                                    <option
                                        value="{{SORT_DESC}}" {{isset($oldCreated_at) && $oldCreated_at == SORT_DESC ? 'selected' : ''}}>
                                        Latest creation date
                                    </option>
                                    <option
                                        value="{{SORT_ASC}}" {{isset($oldCreated_at) && $oldCreated_at == SORT_ASC ? 'selected' : ''}}>
                                        Last created date
                                    </option>



                                </select>
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
                                <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th><input type="checkbox" value="" name="selected-all"></th>
                                        <th>ID</th>
                                        <th>Status</th>
                                        <th>Total price<small>(VND)</small></th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Payment</th>
                                        <th>Created at</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(isset($orders))
                                        @foreach($orders as $order)
                                            <tr>
                                                <td><input type="checkbox" value="{{$order->id}}" class="selected-item">
                                                </td>
                                                <td>{{$order->id}}</td>
                                                <td class="status-order"
                                                    data-id="{{$order->status}}"
                                                >
                                                    <div>{{$order->handlerStatus}}</div>
                                                </td>
                                                <td>{{\App\util\Util::formatPriceToVnd($order->total_price)}}</td>
                                                <td>{{$order->ship_name}}</td>
                                                <td>{{$order->ship_phone}}</td>
                                                <td>{{$order->ship_email}}</td>

                                                <td class="checkOut-order"
                                                    data-check-out="{{$order->check_out}}"
                                                >
                                                    <div>{{$order->handlerCheckOut}}</div>
                                                </td>
                                                <td>{{$order->created_at}}</td>
                                                <td style="font-size: 14px; color: #0000c1;">
                                                    <a href="/admin/order/detail/{{$order->id}}" class="hover-pointer">
                                                        <i data-toggle="tooltip" data-placement="bottom" title=""
                                                           data-original-title="Information"
                                                           style="font-size: 20px; color: #11c12b"
                                                           class="fa fa-info-circle mr-2"></i></a>
                                                    {{--                                                    <a href="/admin/product/update/1" class="hover-pointer">--}}
                                                    {{--                                                        <i data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Edit" class="fa fa-edit mr-1 text-primary"></i></a>--}}
                                                    <span id="delete" class="hover-pointer dataItem" data-toggle="modal"
                                                          data-target="#deleteModal" data-name="orderID: {{$order->id}}"
                                                          data-id="{{$order->id}}">
                                                        <i data-toggle="tooltip" data-placement="bottom" title=""
                                                           data-original-title="Delete"
                                                           style="font-size: 20px; color: #f81616;"
                                                           class="fa fa-trash mr-1"></i></span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif

                                    </tbody>

                                </table>
                                <div class="row">
                                    <div class="col-sm-5">
                                        <div class="dataTables_info" id="datatable_info" role="status"
                                             aria-live="polite">Showing 1 to {{$paginate ?? ''}} of {{$sumOrder ?? ''}}
                                            entries
                                        </div>
                                    </div>
                                    <div class="col-sm-7">
                                        <div class="dataTables_paginate">
                                            {{$orders->appends(request()->all())->links('admin.include.pagination')}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @includeIf('admin.include.modalDelete',['url'=> 'order'])
@endsection
@section('page-script')
    <script src="/admin/js/manager-page.js"></script>
    <script>
        //lấy value attribute của các class
        let list = $(".status-order[data-id]").map(function () {
            return parseInt($(this).attr("data-id"));
        }).get();
        $(".checkOut-order").map(function () {

            if (parseInt($(this).attr('data-check-out')) === 1) {
                $(this).children().css('background-color', '#4fe161')
            } else {
                $(this).children().css('background-color', '#fc4545')
            }
        })
        $(".status-order").map(function () {
            switch (parseInt($(this).attr("data-id"))) {
                case 0:
                    //cancel
                    $(this).children().css('background-color', '#f88800')
                    break;
                case 1:
                    //done
                    $(this).children().css('background-color', "#4fe161")
                    break;
                case 2:
                    //waiting
                    $(this).children().css('background-color', "#ffff05")
                    break;
                case 3:
                    //processing
                    $(this).children().css('background-color', "#00c4ff")
                    break;
                case -1:
                    //delete
                    $(this).children().css('background-color', "#d92121")
                    break;

            }
        })


    </script>
@endsection
