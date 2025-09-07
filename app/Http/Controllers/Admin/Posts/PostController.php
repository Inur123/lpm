<?php

namespace App\Http\Controllers\Admin\Posts;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use App\Models\PostImage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.create', compact('categories', 'tags'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:posts,title',
            'category_id' => 'required|exists:categories,id',
            'content' => 'required',
            'thumbnail' => 'nullable|image|max:5120', // 5MB
            'images.*' => 'nullable|image|max:5120', // 5MB per file
            'tags' => 'nullable|string', // tag input berupa string
        ]);

        // upload thumbnail
        $thumbnailPath = $request->file('thumbnail') ? $request->file('thumbnail')->store('posts/thumbnails', 'public') : null;

        // create post
        $post = Post::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'status' => $request->status ?? 'draft',
            'content' => $request->content,
            'thumbnail' => $thumbnailPath,
            'category_id' => $request->category_id,
            'published_at' => $request->published_at,
        ]);

        // handle tags (split by comma)
        if ($request->tags) {
            $tags = explode(',', $request->tags);
            $tagIds = [];
            foreach ($tags as $tagName) {
                $tagName = trim($tagName);
                $tag = Tag::firstOrCreate(
                    ['name' => $tagName],
                    ['slug' => Str::slug($tagName)]
                );
                $tagIds[] = $tag->id;
            }
            $post->tags()->sync($tagIds);
        }

        // handle additional images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('posts/images', 'public');
                $post->images()->create(['image' => $path]);
            }
        }

        return redirect()->route('posts.index')->with('success', 'Berita berhasil dibuat.');
    }


    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|unique:posts,title,' . $post->id,
            'category_id' => 'required|exists:categories,id',
            'content' => 'required',
            'thumbnail' => 'nullable|image|max:5120', // 5MB
            'images.*' => 'nullable|image|max:5120', // 5MB per file
            'tags' => 'nullable|string',
        ]);

        // upload thumbnail baru (jika ada)
        if ($request->hasFile('thumbnail')) {
            $thumbnailPath = $request->file('thumbnail')->store('posts/thumbnails', 'public');
            $post->thumbnail = $thumbnailPath;
        }

        // update post utama
        $post->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'status' => $request->status ?? 'draft',
            'content' => $request->content,
            'category_id' => $request->category_id,
            'published_at' => $request->published_at,
        ]);

        // handle tags (split by comma)
        if ($request->tags) {
            $tags = explode(',', $request->tags);
            $tagIds = [];
            foreach ($tags as $tagName) {
                $tagName = trim($tagName);
                $tag = Tag::firstOrCreate(
                    ['name' => $tagName],
                    ['slug' => Str::slug($tagName)]
                );
                $tagIds[] = $tag->id;
            }
            $post->tags()->sync($tagIds);
        } else {
            $post->tags()->sync([]);
        }

        // 🚀 hapus gambar lama kalau ada yang ditandai
        if ($request->has('deleted_images')) {
            foreach ($request->deleted_images as $imageId) {
                $img = $post->images()->find($imageId);
                if ($img) {
                    Storage::delete('public/' . $img->image); // hapus file fisik
                    $img->delete(); // hapus dari DB
                }
            }
        }

        // tambah gambar tambahan baru (jika ada)
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('posts/images', 'public');
                $post->images()->create(['image' => $path]);
            }
        }

        return redirect()->route('posts.index')->with('success', 'Berita berhasil diperbarui');
    }



    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Berita berhasil dihapus.');
    }
    public function deleteImage($id)
    {
        $image = PostImage::findOrFail($id);

        // hapus file fisik (jika ada)
        if ($image->image && file_exists(public_path('storage/' . $image->image))) {
            unlink(public_path('storage/' . $image->image));
        }

        // hapus record dari database
        $image->delete();

        return response()->json(['success' => true]);
    }
}
