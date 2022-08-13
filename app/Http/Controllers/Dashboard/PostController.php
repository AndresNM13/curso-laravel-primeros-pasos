<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\post\PutRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Http\Requests\Post\StoreRequest;
use App\Models\Category;
use App\Models\Post;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd(Category::find(1)->posts);
        
        $posts = Post::paginate(2); //esto + linea en index.blade son para dividir registros mostrados
        return view('dashboard.post.index', compact('posts'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$categories = Category::get();
        $categories = Category::pluck('id', 'title');
        $post = new Post();        

        //dd($categories[1]);
        echo view('dashboard.post.create', compact('categories', 'post'));
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        //echo request('title');
        //dd($request);
        //echo $request->input('slug');
        //dd($request->all());

        // $validated = $request->validate(StoreRequest::myRules());
        //dd($validated);

        //$validated = Validator::make($request->all(),StoreRequest::myRules());

        //dd($validated->fails());
        //dd($validated->errors());

        //$data = array_merge($request->all(), ['image' => '']);

        // dd($data);

        Post::create($request->validated());
        
        return to_route('post.index')->with('status', 'Registro creado');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view("dashboard.post.show", compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::pluck('id', 'title');        

        echo view('dashboard.post.edit', compact('categories', 'post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PutRequest $request, Post $post)
    {
        $data = $request->validated();
        if(isset($data['image'])){
            //dd($request->image);
            
            //dd($request->validated()['image']->extension());

            $data['image'] = $filename = time().".".$data['image']->extension();
            
            $request->image->move(public_path('image'), $filename);
        }
        $post->update($data);
        
        //$request->session()->flash('status', 'Registro Actualizado');
        return to_route('post.index')->with('status', 'Registro actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        
        $post->delete();
        return to_route('post.index')->with('status', 'Registro eliminado');
    }
}
