<x-layout>
    <h1 class="h3 mb-4 text-gray-800">Edit User</h1>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('users.update', $user) }}" method="POST">
                @csrf
                @method('PUT')
                <x-input type="text" name="name" label="Name" placeholder="Enter name" :oldValue="$user->name" />
                <x-input type="text" name="email" label="Email" placeholder="Enter email" :oldValue="$user->email" />
                <x-input type="password" name="password" label="password" placeholder="Enter password" />
                <x-input type="password" name="password_confirmation" label="Confirm password"
                    placeholder="Enter confirm password" />
                <x-select name="type" label="User Type" :options="[
                    'customer' => 'Customer',
                    'employee' => 'Employee',
                    'admin' => 'Admin',
                ]" :oldValue="$user->type" />
                <button class="btn btn-primary">update</button>
            </form>
        </div>
    </div>
</x-layout>
