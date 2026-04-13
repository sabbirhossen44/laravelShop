@extends('admin.layouts.app')
@section('content')
    <div class="row mb-3">
        <div class="col-md-12 grid-margin">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h4 class="font-weight-bold mb-0">Edit User </h4>
                </div>
                <div class="">
                    <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Reset Password
                    </button>

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
                <div class="card-header">Edit User</div>

                <div class="card-body">
                    <form action="{{ route('admin.user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="" class="form-label">User Name</label>
                            <input type="text" class="form-control" name="name" id=""
                                aria-describedby="helpId" placeholder="Enter user name"
                                value="{{ old('name') ?? $user->name }}">

                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">User Email</label>
                            <input type="email" class="form-control" name="email" id=""
                                aria-describedby="helpId" placeholder="Enter user email"
                                value="{{ old('email') ?? $user->email }}">

                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Profile Image</label>
                            <div class="">
                                <img src="{{ $user->thumbnail }}" width="100" id="userImagePrv" alt="">
                            </div>
                            <input type="file" class="form-control" name="image" id=""
                                aria-describedby="helpId" placeholder="Enter user image" value="{{ old('image') }}"
                                onchange="document.getElementById('userImagePrv').src = window.URL.createObjectURL(this.files[0])">

                            @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- <div class="mb-3">
                            <label for="role" class="form-label">Role</label>
                            <select name="role" id="role" class="form-control form-select">
                                <option value="">Select Role</option>
                                <option value="admin"  {{ old('role')== 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="user" {{ (old('role') ?? $user->role) == 'user' ? 'selected' : '' }}>User</option>
                            </select>

                            @error('role')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div> --}}
                        <div class="mb-3 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!------------ password change modal ------------>
        {{-- <div class="modal-dialog modal-dialog-centered">

        </div> --}}

        <!-- Button trigger modal -->
        {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button> --}}
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('admin.user.changePassword', $user->id)}}" method="POST" enctype="multipart/form-data" id="changePassword">
                            @csrf
                            <div class="mb-4">
                                <label for="" class="form-label">Password</label>
                                <input type="password" name="password" id="" class="form-control"
                                    placeholder="Password">
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="" class="form-label">Confirm Password</label>
                                <input type="password" name="password_confirmation" id="" class="form-control"
                                    placeholder="Confirm Password">
                                @error('password_confirmation')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="changePasswordBtn">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

    @if ($errors->any())
        <script>
            $(document).ready(function() {
                $('#exampleModal').modal('show');
            });
        </script>
    @endif

    <script>
        $('#changePasswordBtn').click(function() {
            $('#changePassword').submit();
        })
    </script>
@endpush
