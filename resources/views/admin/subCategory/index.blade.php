@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="">All Sub Categories</h5>
                </div>
                <div class="card-footer">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="">Sl</th>
                                <th class="">Category Name</th>
                                <th class="">Name</th>
                                <th class="">Slug</th>
                                <th class="text-center">Image</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($subCategories ?? [] as $key => $subCategory)
                                <tr>
                                    <td>{{ $subCategories->firstItem() + $key }}</td>
                                    <td>{{ $subCategory?->category?->name }}</td>
                                    <td>{{ $subCategory?->name }}</td>
                                    <td>{{ $subCategory?->slug }}</td>
                                    <td class="text-center">
                                        <img src="{{ $subCategory?->thumbnail }}" alt="">
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('subCategory.edit', $subCategory?->id) }}" class="btn btn-danger btn-icon btn-md">
                                            <i data-lucide="edit"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-danger">No Category Found</td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                    <div class="d-flex justify-content-end mt-4">
                        {{ $subCategories->links() }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="">Add New Sub-Category</h5>
                </div>
                <div class="card-footer">
                    <form action="{{ route('subCategory.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="" class="form-label">Name</label>
                            <input type="text" name="name" id="categoryName" class="form-control"
                                placeholder="Sub-Category Name">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="" class="form-label">Slug</label>
                            <input type="text" name="slug" id="categorySlug" class="form-control"
                                placeholder="Sub-Category Slug">
                            @error('slug')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="" class="form-label">Category</label>
                            <select name="category" id="category" class="form-control form-select">
                                <option value="">Select Category</option>
                                @foreach ($categories ?? [] as $category)
                                    <option value="{{$category?->id}}" {{ old('category') == $category?->id ? 'selected' : ''}}>{{$category?->name}}</option>
                                @endforeach
                            </select>
                            @error('category')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="categoryImage" class="form-label">Thumbnail</label> <br>
                            <img src="{{ asset('default.webp') }}" width="120" class="mb-2" alt=""
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
