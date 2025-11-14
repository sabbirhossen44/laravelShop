@extends('admin.layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="">Edit Sub-Category</h4>
                    <a href="{{ route('subCategory.index') }}" class="btn btn-primary btn-md d-flex align-items-center">
                        <div class="mr-1">
                            <i class="fa fa-arrow-left"></i>
                        </div>
                        <span class="ms-1">Back</span>
                    </a>
                </div>
                <div class="card-body">
                    <form action="{{ route('subCategory.update', $subCategory->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="" class="form-label">Name</label>
                            <input type="text" name="name" id="categoryName" class="form-control"
                                placeholder="Sub-Category Name" value="{{ $subCategory?->name }}">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="" class="form-label">Slug</label>
                            <input type="text" name="slug" id="categorySlug" class="form-control"
                                placeholder="Sub-Category Slug" value="{{ $subCategory?->slug }}">
                            @error('slug')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="" class="form-label">Category</label>
                            <select name="category" id="category" class="form-control form-select">
                                <option value="">Select Category</option>
                                @foreach ($categories ?? [] as $category)
                                    <option value="{{ $category?->id }}"
                                        {{ ($subCategory?->category_id ?? old('category')) == $category?->id ? 'selected' : '' }}>
                                        {{ $category?->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="categoryImage" class="form-label">Thumbnail</label> <br>
                            <img src="{{ $subCategory?->thumbnail }}" width="120" class="mb-2" alt=""
                                id="subCategoryImagePrv">
                            <input type="file" name="image" id="subCategoryImage" class="form-control"
                                onchange="validateImage(this)">
                            <span class="text-danger" id="imageError"></span>
                            @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <button type="submit" class="btn btn-primary" id="submit">Submit</button>
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
            const ImagePrv = document.getElementById('subCategoryImagePrv');
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
