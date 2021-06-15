@extends('admin.layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-success"><i class="far fa-flag"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Total Orders</span>
                        <span class="info-box-number">{{$total}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        {{--<h3 class="card-title float-right">
                            <a href="{{route('products.create')}}" class="btn btn-primary">Add Product</a>
                        </h3>--}}
                        <h3 class="card-title float-left">
                            Orders
                        </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Order Number</th>
                                <th>Status</th>
                                <th>Total</th>
                                <th>Quantity</th>
                                <th>Payment Method</th>
                                <th>User Name</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($orders as $order)
                                <tr>
                                    <td>{{$order->order_number}}</td>
                                    <td>{{$order->status}}</td>
                                    <td>{{$order->grand_total}}</td>
                                    <td>{{$order->item_count}}</td>
                                    <td>{{$order->payment_method}}</td>
                                    <td>{{ucfirst($order->user->name)}}</td>
                                    <td class="text-center">
                                        <a class="btn btn-xs btn-primary"
                                           href="{{route('orders.show',$order->id)}}">
                                            View
                                        </a>
                                        {{--<a class="btn btn-xs btn-info"
                                           href="{{route('orders.edit',$order->id)}}">
                                            Edit
                                        </a>
                                        <form action="{{route('orders.destroy',$order->id)}}" method="POST"
                                              onsubmit="return confirm('Are you sure?');"
                                              style="display: inline-block;">
                                            @method('DELETE')
                                            @csrf
                                            <input type="submit" class="btn btn-xs btn-danger" value="Delete">
                                        </form>--}}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">No Orders Found!</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
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

@push('scripts')
    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
        });
    </script>
@endpush
