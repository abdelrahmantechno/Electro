<x-layout>
    <h1 class="h3 mb-4 text-gray-800">Categories</h1>
    <div class="card">
        <div class="card-body text-black">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        {{-- <th>Image</th> --}}
                        <th>Name</th>
                        <th>Description</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($categories as $category)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            {{-- <td>{{ $category->image() }}</td> --}}
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->description }}</td>
                            <td>{{ $category->created_at->diffForHumans() }}</td>
                            <td>{{ $category->updated_at->diffForHumans() }}</td>
                            <td class="actions d-flex align-items-center gap-2">
                                <div>
                                    <a href="{{ route('categories.edit', $category) }}"
                                        class="btn btn-sm btn-primary d-flex align-items-center justify-content-center"
                                        title="Edit">
                                        <i class="fas fa-edit"></i></a>
                                </div>
                                <div>
                                    <form id="myForm" action="{{ route('categories.destroy', $category->id) }}"
                                        method="POST" class="m-0 p-0">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            class="btn btn-sm btn-danger d-flex align-items-center justify-content-center"
                                            title="Delete">
                                            <i class="fas fa-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        @empty
                            <td class="text-center" colspan="6">No Categories</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @push('js')
        <script>
            const form = document.getElementById("myForm");
            form.addEventListener("submit", function(event) {
                event.preventDefault();

                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#34495e",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                        Swal.fire({
                            title: "Deleted!",
                            text: "Your file has been deleted.",
                            icon: "success"
                        });
                    }
                });
            });
        </script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @endpush
</x-layout>
