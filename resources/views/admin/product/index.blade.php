@extends('admin.layouts.app')
@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5>Product List</h5>
            <a href="{{route('product.create')}}" class="btn btn-primary btn-lg d-inline-flex align-items-center gap-1">
                <div class="mr-1">
                    <i class="fa fa-plus"></i>
                </div>
                <span class="ms-1">Add Product</span>
            </a>
        </div>
        <div class="card-body"></div>
    </div>
@endsection
