@extends('admin.layouts.app')
@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5>All Order</h5>
            {{-- <a href="{{route('product.create')}}" class="btn btn-primary btn-lg d-inline-flex align-items-center gap-1">
                <div class="mr-1">
                    <i class="fa fa-plus"></i>
                </div>
                <span class="ms-1">Add Product</span>
            </a> --}}
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Order ID</th>
                            <th scope="col">Total Price</th>
                            <th scope="col">Date</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders ?? [] as $order)
                            <tr>
                                <th scope="row">{{$order->order_code}}</th>
                                <td>{{$order->total_price}}</td>
                                <td>{{$order->created_at->format('d-m-Y')}}</td>
                                {{-- <td>{{$order->status}}</td> --}}
                                <td>
                                    @if ($order->status == 1)
                                        <span class="badge badge-success">Active</span>
                                    @else
                                        <span class="badge badge-danger">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="#" class="btn btn-success btn-icon btn-md">
                                        <i data-lucide="list"></i>
                                    </a>
                                    <a href="#" class="btn btn-secondary btn-icon btn-md">
                                        <i data-lucide="eye"></i>
                                    </a>
                                    <a href="#" class="btn btn-primary btn-icon btn-md">
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
