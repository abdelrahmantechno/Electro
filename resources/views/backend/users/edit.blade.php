<x-layout>
    <h1 class="h3 mb-4 text-gray-800">{{ __('Edit User') }}</h1>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('users.update', $user) }}" method="POST">
                @csrf
                @method('PUT')
                <x-input type="text" name="name" label="{{ __('Name') }}" placeholder="{{ __('Enter name') }}"
                    :oldValue="$user->name" />
                <x-input type="text" name="email" label="{{ __('Email') }}" placeholder="{{ __('Enter email') }}"
                    :oldValue="$user->email" />
                <x-input type="password" name="password" label="{{ __('Password') }}"
                    placeholder="{{ __('Enter password') }}" />
                <x-input type="password" name="password_confirmation" label="{{ __('Confirm password') }}"
                    placeholder="{{ __('Enter confirm password') }}" />
                <x-select name="type" label="User Type" :options="[
                    'customer' => 'Customer',
                    'employee' => 'Employee',
                    'admin' => 'Admin',
                ]" :oldValue="$user->type" />
                <button class="btn btn-primary">{{ __('Update') }}</button>
            </form>
        </div>
    </div>
</x-layout>
