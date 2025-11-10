@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">
                    <h5 class="">All Color</h5>
                </div>
                <div class="card-footer">
                    <table class="table table-hover display" id="colorTable">
                        <thead>
                            <tr>
                                <th class="">Sl</th>
                                <th class="">Color Name</th>
                                <th class="">Color</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($colors ?? [] as $key => $color)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $color?->name }}</td>
                                    {{-- <td>{{ $color?->color_code }}</td> --}}
                                    <td class="text-center align-items-center">
                                        <div class=""
                                            style="width: 60px; padding: 8px 0; background-color: {{ $color?->color_code }}; border-radius: 5px; color: {{ $color?->color_code == 'N/A' ? '' : 'transparent' }}">
                                            {{ $color?->name }}</div>
                                    </td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-danger btn-icon btn-md editBtn"
                                            data-bs-toggle="modal" data-bs-target="#exampleModal"
                                            data-id="{{ $color?->id }}" data-name="{{ $color?->name }}"
                                            data-code="{{ $color?->color_code }}">
                                            <i data-lucide="edit"></i>
                                        </button>
                                        {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#staticBackdrop">
                                            Launch static backdrop modal
                                        </button> --}}

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
                    <h5 class="">Add New Color</h5>
                </div>
                <div class="card-footer">
                    <form action="{{ route('color.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="" class="form-label">Color Name</label>
                            <input type="text" name="name" id="colorName" class="form-control"
                                placeholder="color Name">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="" class="form-label">color Code</label>
                            <input type="text" name="color_code" id="colorCode" class="form-control"
                                placeholder="color code">
                            @error('color_code')
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
                        <form action="{{ route('color.update' , $color?->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-4">
                                <label for="" class="form-label">Color Name</label>
                                <input type="text" name="name" id="editColorName" class="form-control"
                                    placeholder="color Name">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="" class="form-label">color Code</label>
                                <input type="text" name="color_code" id="editColorCode" class="form-control"
                                    placeholder="color code">
                                @error('color_code')
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
            $('#colorTable').DataTable();
        });

        $('.editBtn').click(function() {
            let id = $(this).data('id');
            let name = $(this).data('name');
            let colorCode = $(this).data('code');
            // console.log(id, name, colorCode);

            $('#editColorName').val(name);
            $('#editColorCode').val(colorCode);


        })
    </script>
@endpush
