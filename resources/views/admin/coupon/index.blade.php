@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="">All Coupons</h5>
                </div>
                <div class="card-footer">
                    <table class="table table-hover display table-responsive" id="couponTable">
                        <thead>
                            <tr>
                                <th class="">Sl</th>
                                <th class="">Name</th>
                                <th class="">Type</th>
                                <th class="">Minimum Amount</th>
                                <th class="">Discount</th>
                                <th class="">Limit</th>
                                <th class="">Start Date</th>
                                <th class="">Expiry Date</th>
                                <th class="">Total Applied</th>
                                <th class="">Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($coupons ?? [] as $key => $coupon)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $coupon?->coupon_code }}</td>
                                    <td>{{ $coupon?->coupon_type }}</td>
                                    <td>{{ $coupon?->min_amount }}</td>
                                    <td>{{ $coupon?->discount }}</td>
                                    <td>{{ $coupon?->limit }}</td>
                                    <td>{{ $coupon?->start_date ? \Carbon\Carbon::parse($coupon->start_date)->format('Y-m-d') : '-' }}
                                    </td>
                                    <td>{{ $coupon?->expiry_date ? \Carbon\Carbon::parse($coupon->expiry_date)->format('Y-m-d') : '-' }}
                                    </td>
                                    <td>{{ $coupon?->total_applied }}</td>
                                    <td>{{ $coupon?->status }}</td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-primary btn-icon btn-md editBtn"
                                            data-bs-toggle="modal" data-bs-target="#couponModal"
                                            data-coupon="{{ json_encode($coupon->toArray()) }}">
                                            <i data-lucide="edit"></i>
                                        </button>
                                        <a href="{{ route('coupon.destroy', $coupon?->id) }}"
                                            class="btn btn-danger btn-icon btn-md deleteConfirm">
                                            <i data-lucide="trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="11" class="text-center text-danger">Coupon Not Found</td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="">Add New Coupon</h5>
                </div>
                <div class="card-footer">
                    <form action="{{ route('coupon.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <x-input label="Coupon Code" name="couponCode" placeholder="Coupon Code" />

                        <x-select label='Coupon Type' name="type">
                            <option value="">Select Type</option>
                            @foreach ($couponTypes ?? [] as $type)
                                <option value="{{ $type?->value }}">{{ $type?->value }}</option>
                            @endforeach
                        </x-select>

                        <x-input label="Minimum Amount" name="minimumAmount" placeholder="Minimum Amount" />

                        <x-input label="Discount" name="discount" placeholder="Discount" />

                        <x-input label="Limit" name="limit" placeholder="Limit" />

                        <x-input type="date" label="Start Date" name="startDate" placeholder="Start Date" />

                        <x-input type="date" label="Expiry Date" name="expiryDate" placeholder="Expiry Date" />

                        <div class="my-3">
                            <button type="submit" class="btn btn-primary" id="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <!-- Modal -->
        <div class="modal fade" id="couponModal" tabindex="-1" aria-labelledby="couponModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="couponModalLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="editSizeForm" action="" method="POST" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <x-input label="Coupon Code" name="couponCode" id="editCouponCode" placeholder="Coupon Code"
                                readonly />

                            <x-select label='Coupon Type' name="type" id="editType">
                                <option value="">Select Type</option>
                                @foreach ($couponTypes ?? [] as $type)
                                    <option value="{{ $type?->value }}">{{ $type?->value }}</option>
                                @endforeach
                            </x-select>

                            <x-input label="Minimum Amount" name="minimumAmount" id="editMinimumAmount"
                                placeholder="Minimum Amount" />

                            <x-input label="Discount" name="discount" placeholder="Discount" id="editDiscount" />

                            <x-input label="Limit" name="limit" placeholder="Limit" id="editLimit" />

                            <x-input type="date" label="Start Date" name="startDate" id="editStartDate"
                                placeholder="Start Date" />

                            <x-input type="date" label="Expiry Date" name="expiryDate" id="editExpiryDate"
                                placeholder="Expiry Date" />

                            <div class="mb-4 d-flex justify-content-end gap-2 w-100">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <script>
        $(document).ready(function() {
            $('#couponTable').DataTable();
        });

        $('.editBtn').click(function() {
            const coupon = $(this).data('coupon');
            const id = coupon.id;
            const url = `{{ route('coupon.update', ':id') }}`.replace(':id', id);

            $('#editCouponCode').val(coupon.coupon_code);
            $('#editType').val(coupon.coupon_type);
            $('#editMinimumAmount').val(coupon.min_amount);
            $('#editDiscount').val(coupon.discount);
            $('#editLimit').val(coupon.limit);
            $('#editStartDate').val(formatDate(coupon.start_date));
            $('#editExpiryDate').val(formatDate(coupon.expiry_date));

            $('#editSizeForm').attr('action', url);
        })


        function formatDate(dateString) {
            const date = new Date(dateString);
            const year = date.getFullYear();
            const month = ('0' + (date.getMonth() + 1)).slice(-2);
            const day = ('0' + date.getDate()).slice(-2);
            return `${year}-${month}-${day}`;
        }
    </script>
@endpush
