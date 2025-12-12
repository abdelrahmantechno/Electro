<x-layout>
    <h1 class="h3 mb-4 text-gray-800">{{ __('Edit Category') }}</h1>

    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-body">
                    <form action="{{ route('categories.update', $category) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <!-- Left Side Inputs -->
                            <div class="col-lg-9">
                                <div class="row">
                                    <div class="col-md-6">
                                        <x-input type="text" name="name_en" label="{{ __('English name') }}"
                                            :oldValue="$category->trans_name_en" placeholder="{{ __('Enter english name') }}" />
                                    </div>
                                    <div class="col-md-6">
                                        <x-input type="text" name="name_ar" label="{{ __('Arabic Name') }}"
                                            :oldValue="$category->trans_name_ar" placeholder="{{ __('Enter arabic name') }}" />
                                    </div>
                                </div>

                                <x-textarea name="description_en" label="{{ __('English description') }}"
                                    :oldValue="$category->trans_description_en" placeholder="{{ __('Enter english description') }}" />


                                <x-textarea name="description_ar" label="{{ __('Arabic description') }}"
                                    :oldValue="$category->trans_description_ar" placeholder="{{ __('Enter description') }}" />
                            </div>

                            <!-- Right Side Image -->
                            <div class="col-lg-3">
                                <div class="text-center mb-3">
                                    <img id="imagePreview"
                                        src="{{ $category->image ? asset('images/' . $category->image->path) : 'https://via.placeholder.com/200x150?text=Preview' }}"
                                        class="img-fluid rounded mb-2" style="max-height: 150px;">
                                </div>

                                <x-input type="file" name="image" id="imageInput"
                                    label="{{ __('Change Image') }}" />
                            </div>
                        </div>

                        <button class="btn btn-primary mt-3">{{ __('Update') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('js')
        <script>
            const imageInput = document.querySelector('input[name="image"]');
            const imagePreview = document.getElementById('imagePreview');

            if (imageInput) {
                imageInput.addEventListener('change', function(e) {
                    const [file] = e.target.files;
                    if (file) {
                        imagePreview.src = URL.createObjectURL(file);
                    }
                });
            }
        </script>
    @endpush
</x-layout>
