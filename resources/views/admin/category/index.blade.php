@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header"></div>
                <div class="card-footer"></div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                    <h5 class="">Add New Category</h5>
                </div>
                <div class="card-footer">
                    <form action="{{ route('category.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="" class="form-label">Category Name</label>
                            <input type="text" name="name" id="categoryName" class="form-control"
                                placeholder="Category Name">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="" class="form-label">Category Slug</label>
                            <input type="text" name="slug" id="categorySlug" class="form-control"
                                placeholder="Category Slug">
                            @error('slug')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="categoryImage" class="form-label">Category Image</label> <br>
                            <img src="{{ asset('default.webp') }}" width="100" class="mb-2" alt=""
                                id="categoryImagePrv">
                            <input type="file" name="image" id="categoryImage" class="form-control"
                                onchange="document.getElementById('categoryImagePrv').src= window.URL.createObjectURL(this.files[0])">
                            @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            @if ($errors->has('image'))
                                <div class="text-danger mt-1">
                                    {{ $errors->first('image') }}
                                </div>
                            @endif
                        </div>
                        <div class="mb-4">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
