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
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Product SKU</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Category</th>
                            <th scope="col">Sub-Category</th>
                            <th scope="col">Brand</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <th scope="row">{{$product->sku_code}}</th>
                                <td>{{$product->name}}</td>
                                <td>{{$product->details?->category?->name}}</td>
                                <td>{{$product->details?->subCategory?->name}}</td>
                                <td>{{$product->details?->brand?->name}}</td>
                                <td>
                                    @if ($product->status == 1)
                                        <span class="badge badge-success">Active</span>
                                    @else
                                        <span class="badge badge-danger">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('product.show', $product->id)}}" class="btn btn-secondary btn-icon btn-md">
                                        <i data-lucide="eye"></i>
                                    </a>
                                    <a href="{{route('product.edit', $product->id)}}" class="btn btn-primary btn-icon btn-md">
                                        <i data-lucide="edit"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
