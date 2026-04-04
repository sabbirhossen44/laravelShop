@extends('web.layouts.app')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5>Order Details</h5>
                        <div class="">
                            <a href="" class="btn btn-primary btn-sm">
                                <i class="fa fa-download"></i>
                                <span>Download Invoice</span>
                            </a>
                        </div>
                    </div>

                    <hr>

                    <div class="row">

                        <div class="col-md-6">
                            <div class="d-flex justify-content-between align-items-center">
                                <span>Order Id:</span>
                                <strong>{{ $order->order_code }}</strong>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <span>Payment Status:</span>
                                <strong>{{ $order->hasPayment ? 'Paid' : 'Unpaid' }}</strong>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <span>Payment Method:</span>
                                <strong>{{ $order->payment_method }}</strong>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="d-flex justify-content-between align-items-center">
                                <span>Order Status:</span>
                                <strong>{{ $order->status }}</strong>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <span>Order Date:</span>
                                <strong>{{ $order->created_at->format('d M Y') }}</strong>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <span>Delivery Time:</span>
                                <strong>--</strong>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

            <div class="card mt-4">
               <div class="card-body">
                 <h5>Order Items</h5>
                 <hr>

                 <div class="row">
                     <div class="col-md-12">
                         <table class="table table-bordered">
                             <thead>
                                 <tr>
                                     <th>Name</th>
                                     <th>Price</th>
                                     <th>Quantity</th>
                                     <th>Total</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 @forelse ($order->orderItems as $item)
                                     <tr>
                                         <td>{{ $item->product?->name }}</td>
                                         <td>${{ $item->product?->discount_price > 0 ? $item->product?->discount_price : $item->product?->price }}</td>
                                         <td>{{ $item->quantity }}</td>
                                         <td>${{ $item->product?->discount_price > 0 ? $item->product?->discount_price * $item->quantity : $item->product?->price * $item->quantity }}</td>
                                     </tr>
                                 @empty
                                     <tr>
                                         <td colspan="4" class="text-center text-danger">No Item Found</td>
                                     </tr>
                                 @endforelse
                             </tbody>
                         </table>
                     </div>
                 </div>
               </div>
            </div>
        </div>



        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5>Billing Address</h5>
                    <hr>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex justify-content-between align-items-center">
                                <span>Name:</span>
                                <strong>{{ $order->billing?->name }}</strong>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <span>Email:</span>
                                <strong>{{ $order->billing?->email }}</strong>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <span>Phone:</span>
                                <strong>{{ $order->billing?->phone }}</strong>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <span>Address:</span>
                                <strong>{{ $order->billing?->address }}</strong>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <span>Country:</span>
                                <strong>{{ $order->billing?->country }}</strong>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <span>City:</span>
                                <strong>{{ $order->billing?->city }}</strong>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <span>Post Code:</span>
                                <strong>{{ $order->billing?->post }}</strong>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <span>Company:</span>
                                <strong>{{ $order->billing?->company }}</strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="card mt-4">
                <div class="card-body">
                    <h5>Shipping Address</h5>
                    <hr>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex justify-content-between align-items-center">
                                <span>Name:</span>
                                <strong>{{ $order->shipping?->name }}</strong>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <span>Email:</span>
                                <strong>{{ $order->shipping?->email }}</strong>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <span>Phone:</span>
                                <strong>{{ $order->shipping?->phone }}</strong>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <span>Address:</span>
                                <strong>{{ $order->shipping?->address }}</strong>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <span>Country:</span>
                                <strong>{{ $order->shipping?->country }}</strong>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <span>City:</span>
                                <strong>{{ $order->shipping?->city }}</strong>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <span>Post Code:</span>
                                <strong>{{ $order->shipping?->post }}</strong>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <span>Company:</span>
                                <strong>{{ $order->shipping?->company }}</strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

