<x-layout>
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Edit Category</h1>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('categories.update', $category) }}" method="POST">
                @csrf
                @method('PUT')
                <x-input type="text" name="name" label="Name" :oldValue="$category->name" placeholder="Enter name" />
                <x-textarea name="description" label="Description" :oldValue="$category->description" placeholder="Enter description" />
                <button class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</x-layout>
