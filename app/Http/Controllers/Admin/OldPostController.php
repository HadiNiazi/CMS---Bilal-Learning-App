<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\PostRequest;
use App\Http\Controllers\Controller;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    private $imagesPath = 'app/public/uploads/images/';

    public function index()
    {
        // $posts = Post::all();

        $posts = Post::paginate(5);


        // select * from 'posts';

        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(PostRequest $request)
    {
            if ($request->image) {

                $file = $request->image;

                $extenstion = $file->getClientOriginalExtension();

                $filename = 'images_' .rand(10000, 100000).'.'.$extenstion;

                $file->move(storage_path($this->imagesPath), $filename);



                try {

                    Post::create([
                        'title' => $request->title,
                        'category' => $request->category,
                        'description' => $request->description,
                        'image' => $filename
                    ]);

                    session()->flash('alert-success', 'Post created successfully!');

                    return to_route('posts.create');

                }

                catch (\Exception $ex) {
                    return back()->withInput()->withErrors('Failed due to this error '.$ex->getMessage());
                }

            }

            // return redirect()->route('posts.create');






    }

    public function show($id)
    {
    //    $post = Post::find($id);

       $post = Post::findOrFail($id);

       return view('admin.posts.show', compact('post'));
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);

        return view('admin.posts.edit', compact('post'));
    }

    public function update(PostRequest $request, $id)
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

    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        $post->delete();

        session()->flash('alert-success', 'Post removed');

        return to_route('posts.index');

    }




}
