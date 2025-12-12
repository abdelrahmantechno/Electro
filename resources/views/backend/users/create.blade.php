<x-layout>
    <h1 class="h3 mb-4 text-gray-800">{{ __('Add New User') }}</h1>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('users.store') }}" method="POST">
                @csrf
                <x-input type="text" name="name" label="{{ __('Name') }}" placeholder="{{ __('Enter name') }}" />
                <x-input type="text" name="email" label="{{ __('Email') }}"
                    placeholder="{{ __('Enter email') }}" />
                <x-input type="password" name="password" label="{{ __('Password') }}"
                    placeholder="{{ __('Enter password') }}" />
                <x-input type="password" name="password_confirmation" label="{{ __('Confirm password') }}"
                    placeholder="{{ __('Enter confirm password') }}" />
                <x-select name="type" label="{{ __('User Type') }}" :options="[
                    'customer' => 'Customer',
                    'employee' => 'Employee',
                    'admin' => 'Admin',
                ]" />
                <button class="btn btn-primary">{{ __('Save') }}</button>
            </form>
        </div>
    </div>
</x-layout>
