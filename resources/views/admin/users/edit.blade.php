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
                            Edit User
                        </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form role="form" action="{{route('users.update',$user->id)}}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Name<code>*</code></label>
                                    <input type="text" class="form-control" name="name" value="{{$user->name}}" id="name" placeholder="Enter Name">
                                    @error('name')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Roles</label>
                                    <select class="select2" name="roles[]" multiple="multiple" data-placeholder="Select a Role"
                                            style="width: 100%;">
                                        @forelse($roles as $role)
                                            <option value="{{$role->id}}" {{(  in_array($role->id, $user->roles->pluck('id')->toArray() ) ) ? "selected" : ""   }}>{{$role->name}}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="{{route('users.index')}}"  class="btn btn-secondary">Back</a>
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
