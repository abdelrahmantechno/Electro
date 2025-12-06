<x-layout>
    <h1 class="h3 mb-4 text-gray-800">Roles</h1>
    <div class="card">
        <div class="card-body text-black">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Permissions</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($roles as $role)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $role->name }}</td>
                            <td>
                                @foreach ($role->permissions as $permission)
                                    <span class="badge bg-primary text-white">{{ $permission->name }}</span>
                                @endforeach
                            </td>
                            <td class="actions d-flex align-items-center gap-2">
                                <div>
                                    <a href="{{ route('roles.edit', $role) }}"
                                        class="btn btn-sm btn-primary d-flex align-items-center justify-content-center"
                                        title="Edit">
                                        <i class="fas fa-edit"></i></a>
                                </div>
                                <div>
                                    <form id="myForm" action="{{ route('roles.destroy', $role->id) }}" method="POST"
                                        class="m-0 p-0">
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
                            <td class="text-center" colspan="6">No roles</td>
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
