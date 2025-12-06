<x-layout>
    <h1 class="h3 mb-4 text-gray-800">Edit permission</h1>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('permissions.update', $permission->id) }}" method="POST">
                @csrf
                <x-input type="text" name="name" label="Name" placeholder="Enter name" :oldValue="$permission->name" />
                <button class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</x-layout>
