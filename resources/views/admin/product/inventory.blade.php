@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">
                    <h5 class="">Product Name: {{ $product->name }}</h5>
                </div>
                <div class="card-footer">
                    <table class="table table-hover display" id="categoryTable">
                        <thead>
                            <tr>
                                <th class="">Sl</th>
                                <th class="">Color Name</th>
                                <th class="">Size</th>
                                <th class="text-center">Quantity</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($inventories ?? [] as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->color?->name }}</td>
                                    <td>{{ $item->size?->name }}</td>
                                    <td class="text-center">{{ $item->quantity }}</td>
                                    <td class="text-center">
                                        <div class="btn btn-danger btn-icon btn-md editBtn"
                                            data-inventory="{{ json_encode($item->toArray()) }}">
                                            <i data-lucide="edit"></i>
                                            </d>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-danger">No product inventory Found</td>
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
                    <h5 class="">Add Product Inventory</h5>
                </div>
                <div class="card-footer">
                    <form action="{{ route('inventory.store', $product?->id) }}" method="post">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product?->id }}">
                        <div class="mb-4">
                            {{-- <label for="" class="form-label">Color Name</label>
                            <input type="text" name="name" id="categoryName" class="form-control"
                                placeholder="Category Name">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror --}}
                            {{-- <x-select label="Color Name" name="color" placeholder="Select Color"> --}}
                            <x-select label='Color Name' name="color">
                                <option value="">Select Color</option>
                                @foreach ($colors ?? [] as $color)
                                    <option value="{{ $color?->id }}">{{ $color?->name }}</option>
                                @endforeach
                            </x-select>
                        </div>

                        <div class="mb-4">
                            <x-select label='Size Name' name="size">
                                <option value="">Select Size</option>
                                @foreach ($sizes ?? [] as $size)
                                    <option value="{{ $size?->id }}">{{ $size?->name }}</option>
                                @endforeach
                            </x-select>
                        </div>

                        <div class="mb-4">
                            <x-input type="number" label='Quantity' name="quantity" placeholder="Quantity"
                                :required="true" />
                        </div>

                        <div class="mb-4 d-flex align-items-center justify-content-between">
                            <a href="{{ route('product.index') }}" class="btn btn-secondary">
                                <i class="fa fa-arrow-left"></i>
                                Back
                            </a>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <!-- Modal -->
        <div class="modal fade"id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                        <button type="button" class="btn-close" onclick="closeModel()"></button>
                    </div>
                    <form action="" id="editInventoryForm" method="post">
                        @csrf
                        <div class="modal-body">
                            <input type="hidden" name="product_id" value="{{ $product?->id }}">
                            <div class="mb-4">
                                <x-select label='Color Name' name="editColor">
                                    <option value="">Select Color</option>
                                    @foreach ($colors ?? [] as $color)
                                        <option value="{{ $color?->id }}">{{ $color?->name }}</option>
                                    @endforeach
                                </x-select>
                            </div>

                            <div class="mb-4">
                                <x-select label='Size Name' name="editSize">
                                    <option value="">Select Size</option>
                                    @foreach ($sizes ?? [] as $size)
                                        <option value="{{ $size?->id }}">{{ $size?->name }}</option>
                                    @endforeach
                                </x-select>
                            </div>

                            <div class="mb-4">
                                <x-input type="number" label='Quantity' name="editQuantity" placeholder="Quantity"
                                    :required="true" />
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" onclick="closeModel()">Close</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Vertically centered scrollable modal -->
        {{-- <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        ...
        </div> --}}

    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $('#categoryTable').DataTable();

            $('.editBtn').on('click', function() {
                const inventory = $(this).data('inventory');
                const url = `{{ route('inventory.update', ':id') }}`.replace(':id', inventory.id) ?? '';

                $('#editInventoryForm').attr('action', '');
                $('#editColor').val('');
                $('#editSize').val('');
                $('#editQuantity').val('');

                $('#exampleModal').modal('show');
                $('#editInventoryForm').attr('action', url);
                $('#editColor').val(inventory.color_id).trigger('change');
                $('#editSize').val(inventory.size_id).trigger('change');
                $('#editQuantity').val(inventory.quantity);

            })
        });

        function closeModel() {
            $('#exampleModal').modal('hide');
        }
    </script>
@endpush
