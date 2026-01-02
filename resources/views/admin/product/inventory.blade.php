@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">
                    <h5 class="">All Categories</h5>
                </div>
                <div class="card-footer">
                    <table class="table table-hover display" id="categoryTable">
                        <thead>
                            <tr>
                                <th class="">Sl</th>
                                <th class="">Category Name</th>
                                <th class="">Category Slug</th>
                                <th class="text-center">Category Image</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($categories ?? [] as $key => $category)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $category?->name }}</td>
                                    <td>{{ $category?->slug }}</td>
                                    <td class="text-center">
                                        <img src="{{ $category?->thumbnail }}" alt="">
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('category.edit', $category?->id) }}"
                                            class="btn btn-danger btn-icon btn-md">
                                            <i data-lucide="edit"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-danger">No Category Found</td>
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

                        <div class="mb-4">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        $(document).ready(function() {
            $('#categoryTable').DataTable();
        });
    </script>
@endpush
