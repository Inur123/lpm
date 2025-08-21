@extends('admin.layouts.app')
@section('title', 'Edit Post - LPM Ibnu Rusyd')
@section('content')
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="p-6 border-b border-gray-200">
            <h2 class="text-lg font-medium text-gray-900">Edit Post</h2>
            <p class="mt-1 text-sm text-gray-600">Perbarui data post di bawah.</p>
        </div>

        <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data" class="p-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <!-- Title -->
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Judul *</label>
                    <input type="text" name="title" id="title" value="{{ old('title', $post->title) }}"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm" required>
                    @error('title')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Category -->
                <div>
                    <label for="category_id" class="block text-sm font-medium text-gray-700 mb-2">Kategori *</label>
                    <select name="category_id" id="category_id"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm" required>
                        <option value="">-- Pilih Kategori --</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>
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
                        class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm">
                        <option value="draft" {{ old('status', $post->status) == 'draft' ? 'selected' : '' }}>Nonactive
                        </option>
                        <option value="active" {{ old('status', $post->status) == 'active' ? 'selected' : '' }}>Active
                        </option>
                    </select>
                </div>

                <!-- Published At -->
                <div>
                    <label for="published_at" class="block text-sm font-medium text-gray-700 mb-2">Tanggal Publish</label>
                    <input type="date" name="published_at" id="published_at"
                        value="{{ old('published_at', $post->published_at ? date('Y-m-d', strtotime($post->published_at)) : '') }}"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm">
                </div>

                <!-- Thumbnail -->
              <div>
    <label for="thumbnail" class="block text-sm font-medium text-gray-700 mb-2">Thumbnail</label>
    <input type="file" name="thumbnail" id="thumbnail" accept="image/*"
        class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm">

    <!-- Thumbnail lama -->
    @if ($post->thumbnail)
        <div class="mt-2">
            <p class="text-xs text-gray-500 mb-1">Thumbnail saat ini:</p>
            <img src="{{ asset('storage/' . $post->thumbnail) }}" class="h-32 rounded-md border" />
        </div>
    @endif

    <!-- Preview thumbnail baru -->
    <div id="thumbnail-preview" class="mt-2 hidden">
        <p class="text-xs text-gray-500 mb-1">Thumbnail baru:</p>
        <img id="thumbnail-img" class="h-32 rounded-md border" />
    </div>
</div>

                <!-- Additional Images -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Gambar Tambahan</label>

                    <!-- Gambar lama -->
                    @if ($post->images->count())
                        <div class="grid grid-cols-3 gap-2 mb-3" id="old-images">
                            @foreach ($post->images as $img)
                                <div class="relative" id="image-{{ $img->id }}">
                                    <img src="{{ asset('storage/' . $img->image) }}"
                                        class="h-24 w-full object-cover rounded-md border" />

                                    <button type="button" onclick="removeImage({{ $img->id }})"
                                        class="absolute top-1 right-1 bg-red-500 text-white text-xs px-2 py-1 rounded">
                                        Hapus
                                    </button>
                                </div>
                            @endforeach
                        </div>
                    @endif
                    <div id="deleted-images"></div>

                    <!-- Input gambar baru -->
                    <div id="image-inputs" class="space-y-4"></div>

                    <button type="button" id="add-image-input" class="px-3 py-2 bg-blue-500 text-white rounded-md text-sm">
                        + Tambah Gambar
                    </button>
                </div>

                <!-- Tags -->
                <div class="md:col-span-2">
                    <label for="tags" class="block text-sm font-medium text-gray-700 mb-2">Tags</label>
                    <input type="text" name="tags" id="tags"
                        value="{{ old('tags', $post->tags->pluck('name')->implode(', ')) }}"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm">
                </div>

                <!-- Content -->
                <div class="md:col-span-2">
                    <label for="content" class="block text-sm font-medium text-gray-700 mb-2">Konten *</label>
                    <textarea name="content" id="content" rows="8"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary">
        {{ old('content', $post->content) }}
    </textarea>
                    @error('content')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex justify-end space-x-3 pt-6 border-t border-gray-200">
                <a href="{{ route('posts.index') }}" class="px-4 py-2 border rounded-md text-sm">Batal</a>
                <button type="submit" class="px-4 py-2 bg-primary text-white rounded-md text-sm">Update Post</button>
            </div>
        </form>
    </div>
    <script src="https://cdn.tiny.cloud/1/mimr482vltcpcta1nd94dwlkgbsdgmcyz4n3tve4ydvf4l83/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#content', // target textarea
            menubar: true,
            plugins: 'print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern help emoticons',
            toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | ' +
                'alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | ' +
                'pagebreak | charmap emoticons | fullscreen preview save print | insertfile image media link anchor codesample | ltr rtl',
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
        function removeImage(id) {
            // Hilangkan preview dari tampilan
            const el = document.getElementById('image-' + id);
            if (el) el.remove();

            // Tambahkan hidden input agar terkirim saat update
            const input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'deleted_images[]';
            input.value = id;
            document.getElementById('deleted-images').appendChild(input);
        }
    </script>
    <!-- Script Thumbnail Preview -->
   <script>
    document.getElementById('thumbnail').addEventListener('change', function(event) {
        const previewContainer = document.getElementById('thumbnail-preview');
        const previewImage = document.getElementById('thumbnail-img');
        const file = event.target.files[0];

        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImage.src = e.target.result;
                previewContainer.classList.remove('hidden'); // tampilkan
            }
            reader.readAsDataURL(file);
        } else {
            previewContainer.classList.add('hidden'); // sembunyikan kalau batal pilih
            previewImage.src = '';
        }
    });
</script>

    <!-- Script Tambah Gambar Baru -->
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
                        class="remove-input px-3 py-2 bg-red-500 text-white rounded-md text-xs">
                        Hapus
                    </button>
                </div>
                <div class="preview"></div>
            `;
            container.appendChild(wrapper);

            wrapper.querySelector('.remove-input').addEventListener('click', () => wrapper.remove());

            wrapper.querySelector('.image-input').addEventListener('change', e => {
                let previewDiv = wrapper.querySelector('.preview');
                previewDiv.innerHTML = "";
                if (e.target.files[0]) {
                    let reader = new FileReader();
                    reader.onload = ev => {
                        previewDiv.innerHTML =
                            `<img src="${ev.target.result}" class="mt-2 w-32 h-32 object-cover rounded-md border" />`;
                    };
                    reader.readAsDataURL(e.target.files[0]);
                }
            });
        });
    </script>
@endsection
