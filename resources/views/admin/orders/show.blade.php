@extends('admin.layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-8">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        {{--<h3 class="card-title">
                            Order <span class="badge-success">#{{$order->order_number}}</span>
                        </h3>--}}
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="card-body">
                            <table class="table table-striped">
                                <tbody>
                                @foreach($order as $key => $val)
                                <tr>
                                    <td>{{ucfirst(str_replace("_"," ",$key))}}</td>
                                    <td>{{$val}}</td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <a href="{{route('orders.index')}}" class="btn btn-secondary">Back</a>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>


            <div class="col-4">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">
                            Order Items
                        </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>John</td>
                                    <td>2</td>
                                    <td>50</td>
                                </tr>
                                <tr>
                                    <td>Doe</td>
                                    <td>1</td>
                                    <td>30</td>
                                </tr>
                                <tr>
                                    <td>Tim</td>
                                    <td>2</td>
                                    <td>30</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer">
                            Total: $110
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>


            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
@endsection
