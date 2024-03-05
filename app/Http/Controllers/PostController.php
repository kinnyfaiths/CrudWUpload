<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        return view('post.index', [
            'posts' => Post::all()
        ]);
    }

    public function createPost(Request $request)
    {
        $oPost = new Post;

        $request->validate(['file' => 'mimes:pdf,docx']);
        if ($request->file()) {
            $fileInfo = $this->storeFile($request);
            $oPost->original_filename = $request->file->getClientOriginalName();
            $oPost->filename = $fileInfo['fileName'];
            $oPost->file_path = $fileInfo['filePath'];
        }

        $oPost->message = $request->message;
        $oPost->save();
        return redirect('/')->with('status', 'Post Created successfully');
    }

    public function updatePost(Request $request)
    {
        return view('post.update', [
            'post' => Post::find($request->id)
        ]);
    }

    public function doUpdatePost(Request $request)
    {
        $post = Post::findOrFail($request->id);
        if (empty($request->file()) === false) {
            if ($post->filename !== null) {
                unlink(storage_path('app/public/' . $post->file_path));
            }
            $fileInfo = $this->storeFile($request);
            $post->original_filename = $request->file->getClientOriginalName();
            $post->filename = $fileInfo['fileName'];
            $post->file_path = $fileInfo['filePath'];
        }

        $post->message = $request->message;
        $post->save();
        return redirect('/')->with('status', 'Post successfully updated');
    }

    public function deletePost(Request $request)
    {
        $post = Post::findOrFail($request->id);
        if ($post) {
            if ($post->filename !== null) {
                unlink(storage_path('app/public/' . $post->file_path));
            }
            $post->delete();
            return redirect('/')->with('status', 'Post has been deleted.');
        }
        return redirect('/')->with('status', 'There is nothing to delete.');
    }

    private function storeFile($request)
    {
        $fileName = time() . '_' . $request->file->getClientOriginalName();
        return [
            'fileName' => $fileName,
            'filePath' => $request->file('file')->storeAs('uploads', $fileName, 'public')
        ];
    }
}
