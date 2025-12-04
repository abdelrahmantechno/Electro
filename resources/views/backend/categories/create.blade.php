<x-layout>
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Add New Category</h1>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('categories.store') }}" method="POST">
                @csrf
                <x-input type="text" name="name" label="Name" placeholder="Enter name" />
                <x-textarea name="description" label="Description" placeholder="Enter description" />
                <button class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</x-layout>
