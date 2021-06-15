@extends('admin.layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">
                            Edit Product
                        </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form role="form" action="{{route('products.update',$products->id)}}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Name<code>*</code></label>
                                    <input type="text" class="form-control" name="name" value="{{$products->name}}"
                                           id="name" placeholder="Enter Name">
                                    @error('name')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Categories</label>
                                    <select class="select2" name="categories[]" multiple="multiple"
                                            data-placeholder="Select a Category"
                                            style="width: 100%;">
                                        @forelse($categories as $category)
                                            <option
                                                value="{{$category->id}}" {{(  in_array($category->id, $products->categories->pluck('id')->toArray() ) ) ? "selected" : ""   }}>{{$category->name}}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                    @error('categories')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="description">Description<code>*</code></label>
                                    <textarea type="text" class="form-control" name="description"
                                              id="description" value="{{$products->description}}"
                                              placeholder="Enter Description">{{$products->description}}</textarea>
                                    @error('description')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="price">Price<code>*</code></label>
                                    <input type="text" class="form-control" value="{{$products->price}}" name="price"
                                           id="price" placeholder="Enter Price">
                                    @error('price')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>

                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="{{route('products.index')}}" class="btn btn-secondary">Back</a>
                            </div>
                        </form>
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
            //Initialize Select2 Elements
            $('.select2').select2()
        })
    </script>
@endpush
