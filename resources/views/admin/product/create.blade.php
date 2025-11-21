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
                <div class="sectionCard">
                    <span class="sectionTitle">Product Info</span>
                    <div class="row mt-4">
                        <div class="col-12">
                            <x-input label="Product Name" name="name" placeholder="Product Name" />

                            <x-input label="Short Description" name="short_description" placeholder="Short Description"  :required="true"/>

                            {{-- <img src="" alt="" id="preview">
                            <x-file type='file' label="Product Image" name="image" placeholder="Product Image" :required="true" preview="preview" /> --}}

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
