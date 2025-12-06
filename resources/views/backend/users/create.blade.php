<x-layout>
    <h1 class="h3 mb-4 text-gray-800">Add New User</h1>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('users.store') }}" method="POST">
                @csrf
                <x-input type="text" name="name" label="Name" placeholder="Enter name" />
                <x-input type="text" name="email" label="Email" placeholder="Enter email" />
                <x-input type="password" name="password" label="password" placeholder="Enter password" />
                <x-input type="password" name="password_confirmation" label="Confirm password"
                    placeholder="Enter confirm password" />
                <x-select name="type" label="User Type" :options="[
                    'customer' => 'Customer',
                    'employee' => 'Employee',
                    'admin' => 'Admin',
                ]" />
                <button class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</x-layout>
