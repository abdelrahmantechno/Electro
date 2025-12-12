<x-layout>
    <h1 class="h3 mb-4 text-gray-800">{{ __('Permissions') }}</h1>
    <div class="card">
        <div class="card-body text-black">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        {{-- <th>Image</th> --}}
                        <th>{{ __('Name') }}</th>
                        <th>{{ __('Created At') }}</th>
                        <th>{{ __('Updated At') }}</th>
                        <th>{{ __('Actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($permissions as $permission)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $permission->name }}</td>
                            <td>{{ $permission->created_at->diffForHumans() }}</td>
                            <td>{{ $permission->updated_at->diffForHumans() }}</td>
                            <td class="actions d-flex align-items-center gap-2">
                                <div>
                                    <a href="{{ route('permissions.edit', $permission) }}"
                                        class="btn btn-sm btn-primary d-flex align-items-center justify-content-center"
                                        title="Edit">
                                        <i class="fas fa-edit"></i></a>
                                </div>
                                <div>
                                    <form id="myForm" action="{{ route('permissions.destroy', $permission->id) }}"
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
                            <td class="text-center" colspan="6">{{ __('No permissions') }}</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {{ $permissions->links() }}
            </div>

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
