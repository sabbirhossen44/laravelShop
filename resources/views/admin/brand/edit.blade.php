@extends('admin.layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4 class="">Edit Brand</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('brand.update', $brand->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ $brand->name }}">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="slug">Slug</label>
                            <input type="text" class="form-control" id="slug" name="slug"
                                value="{{ $brand->slug }}">
                            @error('slug')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="brandImage" class="form-label">Brand Image</label> <br>
                            <img src="{{ $brand?->thumbnail }}" width="120" class="mb-2" alt=""
                                id="brandImagePrv">
                            <input type="file" name="image" id="brandImage" class="form-control"
                                onchange="validateImage(this)">
                            <span class="text-danger" id="imageError"></span>
                            @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <button type="submit" class="btn btn-primary" id="submit">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        function validateImage(input) {
            const file = input.files[0];
            const errorMessage = document.getElementById('imageError');
            const ImagePrv = document.getElementById('brandImagePrv');
            const submit = document.getElementById('submit');
            errorMessage.textContent = '';

            if (file) {
                const imgSize = file.size / (1024 * 1024);
                if (imgSize > 2) {
                    errorMessage.textContent = 'Image size must be less than 2MB';
                    ImagePrv.src = URL.createObjectURL(file);
                    submit.disabled = true;
                } else {
                    ImagePrv.src = URL.createObjectURL(file);
                    submit.disabled = false;
                }
            }
        }
    </script>
@endpush
