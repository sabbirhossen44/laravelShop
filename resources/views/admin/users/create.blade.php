@extends('admin.layouts.app')
@section('content')
    <div class="row mb-3">
        <div class="col-md-12 grid-margin">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h4 class="font-weight-bold mb-0">Add New User</h4>
                </div>
                <div class="">
                    <a href="{{ route('admin.user.index') }}" class="btn btn-primary" style="font-size: 14px">
                        <i class="fa-solid fa-users"></i>
                        <span class="link-title">All Users</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create User</div>

                <div class="card-body">
                    <form action="{{route('admin.user.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">User Name</label>
                            <input type="text" class="form-control" name="name" id="" aria-describedby="helpId"
                                placeholder="Enter user name" value="{{ old('name') }}">

                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">User Email</label>
                            <input type="email" class="form-control" name="email" id="" aria-describedby="helpId"
                                placeholder="Enter user email" value="{{ old('email') }}">

                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Profile Image</label>
                            <div class="">
                                <img src="{{ asset('default.webp') }}" width="100" id="userImagePrv" alt="">
                            </div>
                            <input type="file" class="form-control" name="image" id="" aria-describedby="helpId"
                                placeholder="Enter user image" value="{{ old('image') }}" onchange="document.getElementById('userImagePrv').src = window.URL.createObjectURL(this.files[0])">

                            @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="role" class="form-label">Role</label>
                            <select name="role" id="role" class="form-control form-select">
                                <option value="">Select Role</option>
                                <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>User</option>
                            </select>

                            @error('role')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" id="" aria-describedby="helpId" placeholder="Enter password">

                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
