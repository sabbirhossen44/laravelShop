@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">
                    <h5 class="">All Size</h5>
                </div>
                <div class="card-footer">
                    <table class="table table-hover display" id="sizeTable">
                        <thead>
                            <tr>
                                <th class="">Sl</th>
                                <th class="">Size Name</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($sizes ?? [] as $key => $size)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $size?->name }}</td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-primary btn-icon btn-md editBtn"
                                            data-bs-toggle="modal" data-bs-target="#exampleModal"
                                            data-id="{{ $size?->id }}" data-name="{{ $size?->name }}">
                                            <i data-lucide="edit"></i>
                                        </button>
                                        <a href="{{ route('size.destroy', $size?->id) }}" class="btn btn-danger btn-icon btn-md deleteConfirm">
                                            <i data-lucide="trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-danger">No Brand Found</td>
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
                    <h5 class="">Add New Size</h5>
                </div>
                <div class="card-footer">
                    <form action="{{ route('size.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="" class="form-label">size Name</label>
                            <input type="text" name="name" id="sizeName" class="form-control"
                                placeholder="size Name">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <button type="submit" class="btn btn-primary" id="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="editSizeForm" action="" method="POST" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class="mb-4">
                                <label for="" class="form-label">Size Name</label>
                                <input type="text" name="name" id="editSizeName" class="form-control"
                                    placeholder="size Name">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

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
            $('#sizeTable').DataTable();
        });

        $('.editBtn').click(function() {
            const id = $(this).data('id');
            const name = $(this).data('name');
            const url = `{{ route('size.update', ':id') }}`.replace(':id', id);

            $('#editSizeName').val(name);
            $('#editSizeForm').attr('action', url);
        })
    </script>
@endpush
