<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Session;
use Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return view('posts.index', ['posts' => Post::orderBy('created_at', 'desc')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->file('photo');
        if ($file && $file->isValid()) {
            $place = $request->post('place');

            $filename = 'image' . DIRECTORY_SEPARATOR . uniqid('image_', true) . '.' . $file->extension();
            Storage::putFileAs('public', $file, $filename);

            $post = new Post();
            $post->user_id = auth()->id();
            $post->user_name = Auth::user()->name;
            $post->path = 'storage' . DIRECTORY_SEPARATOR . $filename;
            $post->place = $place;

            $post->saveOrFail();

            $request->session()->flash('success', 'Данные успешно сохранены.');
        } else {
            $request->session()->flash('error', 'Файл не заполнен');
        }

        return redirect('/home');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        return view('posts.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $file = $request->file('photo');
        if ($file && $file->isValid()) {
            $place = $request->post('place');

            $filename = 'image' . DIRECTORY_SEPARATOR . uniqid('image_', true) . '.' . $file->extension();
            Storage::putFileAs('public', $file, $filename);

            $post = Post::find($id);
            $post->user_id = auth()->id();
            $post->user_name = Auth::user()->name;
            $post->path = 'storage' . DIRECTORY_SEPARATOR . $filename;
            $post->place = $place;

            $post->saveOrFail();

            $request->session()->flash('success', 'Данные успешно сохранены.');
        } else {
            $request->session()->flash('error', 'Файл не заполнен');
        }

        return redirect('/home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $post = Post::find($id);
        unlink($post->path);
        $post->delete();
        $request->session()->flash('gooddel', 'Данные успешно удалены.');
        return redirect('/home');
    }
}
