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
                            Create Product
                        </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form role="form" action="{{route('products.store')}}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Name<code>*</code></label>
                                    <input type="text" class="form-control" value="{{old('name')}}" name="name"
                                           id="name" placeholder="Enter Name">
                                    @error('name')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Categories</label>
                                    <select class="select2" name="categories[]" multiple="multiple" data-placeholder="Select a Category"
                                            style="width: 100%;">
                                        @forelse($categories as $category)
                                                <option value="{{$category->id}}" >{{$category->name}}</option>
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
                                              id="description"
                                              placeholder="Enter Description">{{old('description')}}</textarea>
                                    @error('description')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="price">Price<code>*</code></label>
                                    <input type="text" class="form-control" value="{{old('price')}}" name="price"
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
                                <button type="submit" class="btn btn-primary">Submit</button>
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
