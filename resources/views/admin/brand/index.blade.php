@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">
                    <h5 class="">All Brands</h5>
                </div>
                <div class="card-footer">
                    <table class="table table-hover display" id="brandTable">
                        <thead>
                            <tr>
                                <th class="">Sl</th>
                                <th class="">Brand Name</th>
                                <th class="">Brands Slug</th>
                                <th class="text-center">Brands Image</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($brands ?? [] as $key => $brand)
                                <tr>
                                    <td>{{ $key + 1  }}</td>
                                    <td>{{ $brand?->name }}</td>
                                    <td>{{ $brand?->slug }}</td>
                                    <td class="text-center">
                                        <img src="{{ $brand?->thumbnail }}" alt="">
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('brand.edit', $brand?->id) }}"
                                            class="btn btn-primary btn-icon btn-md">
                                            <i data-lucide="edit"></i>
                                        </a>
                                        <a href="{{ route('brand.destroy', $brand?->id) }}" class="btn btn-danger btn-icon btn-md deleteConfirm">
                                            <i data-lucide="trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-danger">No Brand Found</td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                    <h5 class="">Add New Brand</h5>
                </div>
                <div class="card-footer">
                    <form action="{{ route('brand.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="" class="form-label">brand Name</label>
                            <input type="text" name="name" id="brandName" class="form-control"
                                placeholder="Brand Name">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="" class="form-label">Brand Slug</label>
                            <input type="text" name="slug" id="brandSlug" class="form-control"
                                placeholder="Brand Slug">
                            @error('slug')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="brandImage" class="form-label">Brand Image</label> <br>
                            <img src="{{ asset('default.webp') }}" width="120" class="mb-2" alt=""
                                id="brandImagePrv">
                            <input type="file" name="image" id="brandImage" class="form-control"
                                onchange="validateImage(this)" />
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
        $(document).ready(function() {
            $('#brandTable').DataTable();
        });

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
