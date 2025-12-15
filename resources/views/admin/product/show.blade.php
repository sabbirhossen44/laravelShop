@extends('admin.layouts.app')
@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="pb-0">Product Details</h5>
            <a href="{{ route('product.index') }}" class="btn btn-primary btn-lg d-inline-flex align-items-center gap-1">
                <div class="mr-1">
                    <i class="fa fa-arrow-left"></i>
                </div>
                <span class="ms-1">Back</span>
            </a>
        </div>
        <div class="card-body">
            {{-- {{ $product }} --}}
            <div class="sectionCard mb-5 mt-2">
                <span class="sectionTitle">Product Info</span>
                <div class="row mt-4">
                    <div class="col-12">
                        <p>Product Name:</p>
                        <h5>{{ $product->name }}</h5>
                    </div>
                    <div class="col-12 mt-3">
                        <p>Short Description:</p>
                        <h5>{{ $product->details?->short_description }}</h5>
                    </div>
                    <div class="col-12 mt-3">
                        <p>Tags:</p>
                        @foreach ($product->tags as $tag)
                            <h6 class="mb-1 btn btn-primary text-white">{{ $tag->name }}</h6>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="sectionCard mb-5">
                <span class="sectionTitle">General Information</span>
                <div class="row mt-4">
                    <div class="col-md-6 mt-3">
                        <p>Category Name:</p>
                        <h5>{{ $product->details?->category?->name }}</h5>
                    </div>
                    <div class="col-md-6 mt-3">
                        <p>Sub-Category Name:</p>
                        <h5>{{ $product->details?->subCategory?->name }}</h5>
                    </div>
                    <div class="col-md-6 mt-3">
                        <p>Product SKU:</p>
                        <h5>{{ $product->sku_code }}</h5>
                    </div>
                    <div class="col-md-6 mt-3">
                        <p>Product SKU:</p>
                        <h5>{{ $product->sku_code }}</h5>
                    </div>
                    <div class="col-md-6 mt-3">
                        <p>Buying Price:</p>
                        <h5>{{ $product->by_price }}</h5>
                    </div>
                    <div class="col-md-6 mt-3">
                        <p>Selling Price:</p>
                        <h5>{{ $product->price }}</h5>
                    </div>

                </div>
            </div>

            <div class="sectionCard mb-5">
                <span class="sectionTitle">Product Description</span>
                <div class="row mt-4">
                    <div class="col-12">
                        <p>Description:</p>
                        {!! $product->details?->description !!}
                    </div>
                    @if ($product->details?->additional_information)
                        <div class="col-12 mt-3">
                            <p>Additional Information:</p>
                            {!! $product->details?->additional_information !!}
                        </div>
                    @endif

                </div>
            </div>

            <div class="sectionCard mb-5">
                <span class="sectionTitle">Product Images</span>
                <div class="row mt-4">
                    <div class="col-12 mb-3">
                        <h5 class="mb-2">product Thumbnail:</h5>
                        <img src="{{ $product?->thumbnail }}" alt="product thumbnail" class="w-25" >
                    </div>
                    <div class="col-12 mb-3">
                        <h5 class="mb-2">Product Gallery:</h5>
                        <div class="row">
                            @foreach ($productGalleries as $gallery)
                                <div class="col-sm-6 col-md-3 col-lg-2">
                                    <img src="{{ $gallery['src'] }}" alt="product gallery" class="w-100">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-between align-items-lg-center gap-2">
                <a href="{{ route('product.index') }}" class="btn btn-secondary btn-lg px-5">
                    <i class="fa fa-arrow-left me-2"></i>
                    Back
                </a>
                <a href="{{ route('product.edit', $product->id) }}" class="btn btn-primary btn-lg px-5">
                    Edit
                    <i class="fa fa-edit me-2"></i>
                </a>
            </div>
        </div>
    </div>
@endsection

@push('style')
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
