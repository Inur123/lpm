@extends('admin.layouts.app')
@section('title', 'Tambah Post Baru - LPM Ibnu Rusyd')
@section('content')
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="p-6 border-b border-gray-200">
            <h2 class="text-lg font-medium text-gray-900">Tambah Post Baru</h2>
            <p class="mt-1 text-sm text-gray-600">Isi form di bawah untuk menambahkan post baru.</p>
        </div>

        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data" class="p-6">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <!-- Title -->
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Judul *</label>
                    <input type="text" name="title" id="title" value="{{ old('title') }}"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary"
                        required>
                    @error('title')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Category -->
                <div>
                    <label for="category_id" class="block text-sm font-medium text-gray-700 mb-2">Kategori *</label>
                    <select name="category_id" id="category_id"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary"
                        required>
                        <option value="">-- Pilih Kategori --</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Status -->
                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                    <select name="status" id="status"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary">
                        <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Nonactive</option>
                        <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Acvive</option>
                    </select>
                </div>

                <!-- Published At -->
                <div>
                    <label for="published_at" class="block text-sm font-medium text-gray-700 mb-2">Tanggal Publish</label>
                    <input type="date" name="published_at" id="published_at" value="{{ old('published_at') }}"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary">
                </div>

                <!-- Thumbnail -->
                <div>
                    <label for="thumbnail"
                        class="block text-sm font-medium text-gray-700 mb-2 flex items-center justify-between">
                        Thumbnail
                        <span class="text-xs text-gray-500">Maksimal 5 MB</span>
                    </label>
                    <input type="file" name="thumbnail" id="thumbnail" accept="image/*"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm">

                    <!-- Tempat Preview Thumbnail -->
                    <div id="thumbnail-preview" class="mt-2"></div>

                    @error('thumbnail')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Additional Images -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2 flex items-center justify-between">
                        Gambar Tambahan
                        <span class="text-xs text-gray-500">Maksimal 5 MB per gambar</span>
                    </label>


                    <div id="image-inputs" class="space-y-4"></div>

                    <button type="button" id="add-image-input"
                        class="px-3 py-2 bg-blue-500 text-white rounded-md text-sm cursor-pointer hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400">
                        + Tambah Gambar
                    </button>

                    @error('images.*')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>


                <!-- Tags -->
                <div class="md:col-span-2">
                    <label for="tags" class="block text-sm font-medium text-gray-700 mb-2">Tags (pisahkan dengan
                        koma)</label>
                    <input type="text" name="tags" id="tags" value="{{ old('tags') }}"
                        placeholder="contoh: teknologi, pendidikan, kesehatan"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary">
                    @error('tags')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Content -->
                <div class="md:col-span-2">
                    <label for="content" class="block text-sm font-medium text-gray-700 mb-2">Konten *</label>
                    <textarea name="content" id="content" rows="8"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary">{{ old('content') }}</textarea>
                    @error('content')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex justify-end space-x-3 pt-6 border-t border-gray-200">
                <a href="{{ route('posts.index') }}"
                    class="px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary">
                    Batal
                </a>
                <button type="submit"
                    class="px-4 py-2 bg-primary border border-transparent rounded-md text-sm font-medium text-white hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary cursor-pointer">
                    Simpan Post
                </button>
            </div>
        </form>
    </div>

    <!-- TinyMCE -->
    <script src="https://cdn.tiny.cloud/1/mimr482vltcpcta1nd94dwlkgbsdgmcyz4n3tve4ydvf4l83/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#content', // target textarea
            menubar: true, // menubar atas
            plugins: 'print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern help emoticons',
            toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media link anchor codesample | ltr rtl',
            toolbar_sticky: true,
            height: 400,
            autosave_ask_before_unload: true,
            autosave_interval: "30s",
            autosave_prefix: "{path}{query}-{id}-",
            image_advtab: true,
            importcss_append: true,
            content_style: "body { font-family:Helvetica,Arial,sans-serif; font-size:14px }"
        });
    </script>
    <script>
        document.getElementById('add-image-input').addEventListener('click', function() {
            let container = document.getElementById('image-inputs');

            let wrapper = document.createElement('div');
            wrapper.classList.add('space-y-2');

            wrapper.innerHTML = `
            <div class="flex items-center space-x-2">
                <input type="file" name="images[]" accept="image/*"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm image-input">
                <button type="button"
                    class="remove-input px-3 py-2 bg-red-500 text-white rounded-md text-xs cursor-pointer hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-400">
                    Hapus
                </button>
            </div>
            <div class="preview"></div>
        `;

            container.appendChild(wrapper);

            // tombol hapus
            wrapper.querySelector('.remove-input').addEventListener('click', function() {
                wrapper.remove();
            });

            // preview gambar
            wrapper.querySelector('.image-input').addEventListener('change', function(e) {
                let previewDiv = wrapper.querySelector('.preview');
                previewDiv.innerHTML = "";
                if (e.target.files && e.target.files[0]) {
                    let reader = new FileReader();
                    reader.onload = function(event) {
                        previewDiv.innerHTML = `
                        <img src="${event.target.result}" class="mt-2 w-32 h-32 object-cover rounded-md border" />
                    `;
                    };
                    reader.readAsDataURL(e.target.files[0]);
                }
            });
        });
    </script>
    <script>
        document.getElementById('thumbnail').addEventListener('change', function(event) {
            const previewContainer = document.getElementById('thumbnail-preview');
            previewContainer.innerHTML = ""; // reset preview sebelumnya

            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    let img = document.createElement("img");
                    img.src = e.target.result;
                    img.classList.add("h-32", "object-cover", "rounded-md", "shadow");
                    previewContainer.appendChild(img);
                }
                reader.readAsDataURL(file);
            }
        });
    </script>

@endsection
