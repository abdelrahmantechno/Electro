<x-layout>
    @push('css')
        <style>
            .img-preview {
                width: 246px;
                height: 246px;
                border: 1px solid #ccc;
                padding: 5px;
                cursor: pointer;
                object-fit: cover;
                object-position: top;
                transition: all .3s ease;
            }

            .img-preview:hover {
                opacity: .8;
            }
        </style>
    @endpush

    <h1 class="h3 mb-4 text-gray-800">{{ __('Profile') }}</h1>
    <div class="row">
        <div class="col-md-4 text-center">
            <div>
                @php
                    if (Auth::user()->image) {
                        $src = asset('images/' . Auth::user()->image->path);
                    } else {
                        $src = 'https://ui-avatars.com/api/?name=' . Auth::user()->name;
                    }
                @endphp
                <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <label for="img-preview">
                        <img src="{{ $src }}" id="imagePreview" class="img-preview img-fluid rounded-circle mb-3"
                            alt="User Image">
                    </label>
                    <input onchange="showImg(event)" type="file" name="image" id="img-preview" class="d-none">
            </div>
        </div>
        <div class="col-md-8">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">{{ __('Name') }}</label>
                        <input type="text" class="form-control" name="name" id="name"
                            value="{{ Auth::user()->name }}">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">{{ __('Email') }}</label>
                        <input type="email" class="form-control" disabled id="email"
                            value="{{ Auth::user()->email }}">
                    </div>
                    <div class="mb-3">
                        <div class="mb-3">
                            <label for="current_password" class="form-label">{{ __('Current Password') }}</label>
                            <input type="password" name="current_password" class="form-control" id="current_password">
                        </div>
                        <div class="mb-3">
                            <label for="new_password" class="form-label">{{ __('New Password') }}</label>
                            <input type="password" name="password" class="form-control" id="new_password">
                        </div>
                        <div class="mb-3">
                            <label for="confirm_password" class="form-label">{{ __('Confirm New Password') }}</label>
                            <input type="password" name="password_confirmation" class="form-control"
                                id="confirm_password">
                        </div>
                        <button type="submit" class="btn btn-primary">{{ __('Save Changes') }}</button>

                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>

    <!-- Delete Account Modal -->
    <div class="modal fade" id="deleteAccountModal" tabindex="-1" aria-labelledby="deleteAccountModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteAccountModalLabel">Confirm Account Deletion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete your account? This action cannot be undone.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>

                    <form action="{{ route('profile.destroy') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Yes, Delete My Account</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('js')
        <script>
            function showImg(e) {
                const [file] = e.target.files;
                if (file) {
                    imagePreview.src = URL.createObjectURL(file);
                }
            }
        </script>
    @endpush

</x-layout>
