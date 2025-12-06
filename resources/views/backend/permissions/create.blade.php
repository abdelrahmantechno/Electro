<x-layout>
    <h1 class="h3 mb-4 text-gray-800">Add New Permission</h1>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('permissions.store') }}" method="POST">
                @csrf
                <x-input type="text" name="name" label="Name" placeholder="Enter name" />
                <button class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</x-layout>
