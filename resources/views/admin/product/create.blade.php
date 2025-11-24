@extends('admin.layouts.app')
@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5>Add New Product</h5>
            <a href="{{ route('product.index') }}" class="btn btn-primary btn-md d-inline-flex align-items-center gap-1">
                <div class="mr-1">
                    <i class="fa fa-arrow-left"></i>
                </div>
                <span class="ms-1">Back</span>
            </a>
        </div>
        <div class="card-body">
            <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="sectionCard mb-5">
                    <span class="sectionTitle">Product Info</span>
                    <div class="row mt-4">
                        <div class="col-12">
                            <x-input label="Product Name" name="name" placeholder="Product Name" />

                            <x-textarea label="Short Description" name="short_description"
                                placeholder="Short Description..." rows='6'/>

                        </div>
                    </div>
                </div>

                <div class="sectionCard mb-5">
                    <span class="sectionTitle">General Information</span>
                    <div class="row mt-4">
                        <div class="col-md-6 mt-3">
                            <x-select label="Category" name="category" placeholder="Select Category">
                                <option value="">Select Category</option>
                                @foreach ($categories ?? [] as $category)
                                    <option value="{{ $category?->id }}">{{ $category?->name }}</option>
                                @endforeach
                            </x-select>

                        </div>
                        <div class="col-md-6 mt-3">
                            <x-select label="Sub Category" name="sub_category" placeholder="Select Sub Category">
                                <option value="">Select Sub Category</option>
                                @foreach ($subCategories ?? [] as $subCategory)
                                    <option value="{{ $subCategory?->id }}">{{ $subCategory?->name }}</option>
                                @endforeach
                            </x-select>
                        </div>

                        <div class="col-md-6 mt-3">
                            <x-input label='Product SKU' name="sku" placeholder="Product SKU"
                                :required="true"></x-input>
                        </div>

                        <div class="col-md-6 mt-3">
                            <x-select label='Product Brand' name="brand" placeholder="Product Brand">
                                <option value="">Select Brand</option>
                                @foreach ($brands ?? [] as $brand)
                                    <option value="{{ $brand?->id }}">{{ $brand?->name }}</option>
                                @endforeach
                            </x-select>
                        </div>


                        <div class="col-md-6 mt-3">
                            <x-input type="number" label='Product Buying Price' name="buying_price"
                                placeholder="Product Buying Price" :required="true"></x-input>
                        </div>

                        <div class="col-md-6 mt-3">
                            <x-input type="number" label='Product Selling Price' name="selling_price"
                                placeholder="Product Selling Price" :required="true"></x-input>
                        </div>
                    </div>
                </div>


                <div class="sectionCard mb-5">
                    <span class="sectionTitle">Product Description</span>
                    <div class="row mt-4">
                        <div class="col-12 mt-3">
                            <x-textarea label="Description" name="description"  class="summernote" placeholder="Description..." />
                        </div>
                        <div class="col-12 mt-3">
                            <x-textarea label="Additional Information" name="additional_information" class="summernote"  placeholder=" Additional Information..." rows='10' />
                        </div>
                    </div>
                </div>

                <div class="my-4 d-flex justify-content-end align-items-center gap-2">
                    <a href="{{ route('product.create') }}" class="btn btn-secondary btn-lg mr-2">
                        <i class="fa fa-undo"></i>
                        Reset
                    </a>
                    <button type="submit" class="btn btn-primary btn-lg">
                        Submit
                        <i class="fa fa-arrow-right"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('style')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.css" rel="stylesheet">
    <style>
        .sectionCard {
            position: relative;
            border: 1px solid #ebebeb;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .sectionTitle {
            position: absolute;
            top: -15px;
            left: 15px;
            /* font-weight: 600; */
            font-size: 18px;
            padding: 2px 20px;
            background: #ededed;
            border-radius: 5px;
        }
    </style>
@endpush

@push('script')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.summernote').summernote();
        });
    </script>
@endpush
