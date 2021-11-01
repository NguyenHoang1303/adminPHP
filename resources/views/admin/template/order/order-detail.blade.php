@extends('admin.master-admin')
@section('page-css')
    <style>
        .information-order {
            font-size: 16px;
        }

        .mb-2 h3 {
            font-size: 25px;
        }
        #status option{
            font-weight: 600;
        }

        #status{
            font-weight: 600;
        }
        .table thead tr th {
            font-size: 15px;
        }
        .table tbody tr td {
            font-size: 14px;
        }
        .information-order .col-sm-12 label, .information-order .col-sm-12 p {
            color: #4c4c4c;
        }
    </style>
@endsection
@section('breadcrumb')
    <div class="page-title mb-4">
        <div class="title_left mb-3">
            <h3>Admin | Order detail page</h3>
        </div>
    </div>
@endsection
@section('page-content')
    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                    <h3>Order detail manager</h3>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    @if(isset($order))
                        <section class="content invoice">
                            @include('admin.include.flash-message')
                            <div class="row invoice-info">

                                <div class="col-sm-4 invoice-col information-order">
                                    <div class="mb-2 font-weight-bold col-sm-12 col-md-12">
                                        <h3>General detail:</h3>
                                    </div>
                                    <div class="mb-2 font-weight-bold col-sm-12 col-md-12">
                                        <label for="">Order creation date:</label>
                                        <div>
                                            <input type="text" disabled value="{{$order->created_at}}">
                                        </div>
                                    </div>
                                    <div class="mb-2 font-weight-bold col-sm-12 col-md-12">
                                        <label for="">Order update date:</label>
                                        <div>
                                            <input type="text" disabled value="{{$order->updated_at}}">
                                        </div>
                                    </div>
                                    <div class="mb-2 font-weight-bold col-sm-12 col-md-12">
                                        <label for="">Order delete date:</label>
                                        <div>
                                            <input type="text" disabled value="{{$order->deleted_at}}">
                                        </div>
                                    </div>
                                    <form action="/admin/order/update/status" method="get">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$order->id}}">
                                        <div class="mb-2 font-weight-bold col-sm-12 col-md-12">
                                            <label for="">Order status:</label>
                                            <div class="w-75">
                                                @include('admin.include.select-option-order-status')
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4 invoice-col information-order">
                                    <div class="mb-2 font-weight-bold col-sm-12 col-md-12">
                                        <h3>Shipping information:</h3>
                                    </div>
                                    <div class="mb-2 font-weight-bold col-sm-12 col-md-12">
                                        <label for="">Recipient's name :</label>
                                        <p style="word-break: break-all;"
                                           class="font-weight-light">{{$order->ship_name}}</p>
                                    </div>
                                    <div class="mb-2 font-weight-bold col-sm-12 col-md-12">
                                        <label for="">Recipient's phone :</label>
                                        <p style="word-break: break-all;"
                                           class="font-weight-light">{{$order->ship_phone}}</p>
                                    </div>
                                    <div class="mb-2 font-weight-bold col-sm-12 col-md-12">
                                        <label for="">Recipient's email :</label>
                                        <p style="word-break: break-all;"
                                           class="font-weight-light">{{$order->ship_email}}</p>
                                    </div>
                                    <div class="mb-2 font-weight-bold col-sm-12 col-md-12">
                                        <label for="">Recipient's address :</label>
                                        <p style="word-break: break-all;"
                                           class="font-weight-light">{{$order->ship_address}}</p>
                                    </div>
                                    <div class="mb-2 font-weight-bold col-sm-12 col-md-12">
                                        <label for="">Recipient's address :</label>
                                        <p style="word-break: break-all;" class="font-weight-light">
                                            {{$order->ship_note ?? 'Not note'}}
                                        </p>
                                    </div>
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4 invoice-col information-order">
                                    <div class="mb-2 font-weight-bold col-sm-12 col-md-12">
                                        <h3>Payment:</h3>
                                    </div>
                                    <div class="mb-2 font-weight-bold col-sm-12 col-md-12">
                                        <label for="">Total <small>(VND)</small>:</label>
                                        <p style="word-break: break-all;" class="font-weight-light">
                                            {{\App\util\Util::formatPriceToVnd($order->total_price)}}
                                        </p>
                                    </div>
                                    <div class="mb-2 font-weight-bold col-sm-12 col-md-12">
                                        <label for="">Payment:</label>
                                        <p style="word-break: break-all;" class="font-weight-light">
                                            {{$order->check_out ? 'Complete' : 'Unpaid'}}
                                        </p>
                                    </div>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <!-- Table row -->
                            <div class="row">
                                <h3>Order detail</h3>
                            </div>
                            <div class="row">
                                <div class="table table-striped table-bordered">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>OrderID</th>
                                            <th>Product name</th>
                                            <th>Unit price<small>(VND)</small></th>
                                            <th>Quantity</th>
                                            <th>Ship</th>
                                            <th>Discount</th>
                                            <th>Total<small>(VND)</small></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($order->orderDetails as $orderDetail)
                                            <tr>
                                                <td>{{$order->id}}</td>
                                                <td>{{$orderDetail->products->name}}</td>
                                                <td>{{\App\util\Util::formatPriceToVnd($orderDetail->unit_price)}}</td>
                                                <td>{{$orderDetail->quantity}}</td>
                                                <td>0</td>
                                                <td>0</td>
                                                <td>{{\App\util\Util::formatPriceToVnd($orderDetail->total_price)}}</td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td class="text-center font-weight-bold" colspan="4">Total price order</td>
                                            <td class="text-center font-weight-bold" colspan="3">{{\App\util\Util::formatPriceToVnd($order->total_price)}} <small>(VND)</small> </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                            <a class="btn btn-secondary" href="/admin/orders"><i class="fa fa-arrow-left"></i> Back to Orders</a>
                        </section>

                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
@section('page-script')
    <script src="/admin/js/manager-page.js"></script>
    <script>
        $('#status').change(function () {
            this.form.submit();
        })

    </script>
@endsection
