<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    private $imagesPath = 'app/public/uploads/images/';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::where('user_id', auth()->id())->paginate(5);

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {

        if ($request->image) {

            $file = $request->image;

            $extenstion = $file->getClientOriginalExtension();

            $filename = 'images_' .rand(10000, 100000).'.'.$extenstion;

            $file->move(storage_path($this->imagesPath), $filename);



            try {

                Post::create([
                    'user_id' => auth()->id(),
                    'title' => $request->title,
                    'category' => $request->category,
                    'description' => $request->description,
                    'image' => $filename
                ]);

                session()->flash('alert-success', 'Post created successfully!');

                return to_route('admin.posts.create');

            }

            catch (\Exception $ex) {
                return back()->withInput()->withErrors('Failed due to this error '.$ex->getMessage());
            }

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
       $post = Post::findOrFail($id);

       return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $post = Post::findOrFail($id);

        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, int $id)
    {
        $post = Post::findOrFail($id);

        try {

            $post->update([
                'title' => $request->title,
                'category' => $request->category,
                'description' => $request->description
            ]);

            session()->flash('alert-success', 'Post updated successfully');

        }

        catch(\Exception $ex) {
            return back()->withErrors('Error is '. $ex->getMessage());
        }

        return to_route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $post = Post::findOrFail($id);

        $post->delete();

        session()->flash('alert-success', 'Post removed');

        return to_route('posts.index');
    }
}
