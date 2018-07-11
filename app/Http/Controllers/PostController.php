<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostsRequest;
use Illuminate\Http\Request;

use App\Post;
use Auth;
use Session;
use Spatie\Permission\Models\Role;

class PostController extends Controller
{
    protected $post;
    protected $role;

    public function __construct(Post $post, Role $role) {
        //$this->middleware(['auth', 'clearance']);
        //$this->middleware(['auth', 'roles']);
        $this->post = $post;
        $this->role = $role;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index() {
        $posts =  $this->post->orderby('id', 'desc')->paginate(5);
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {

        $this->authorize('posts_create', $this->post);
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostsRequest $request) {
        $post =  $this->post->create($request->only('title', 'body'));

        session()->flash('flash_message', 'Cadastro realizado com sucesso');
        session()->flash('flash_message_type', BOOTSTRAP_SUCCESS);
        return redirect()->route("posts.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $post =  $this->post->findOrFail($id); //Find post of id = $id

        return view ('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $this->authorize('posts_edit', $this->post);
        $post = $this->post->findOrFail($id);

        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $this->validate($request, [
            'title'=>'required|max:100',
            'body'=>'required',
        ]);

        $post =  $this->post->findOrFail($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->save();

        session()->flash('flash_message', 'Registro atualizado com sucesso');
        session()->flash('flash_message_type', BOOTSTRAP_SUCCESS);
        return redirect()->route('posts.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('posts_delete', $this->post);
        $post =  $this->post->findOrFail($id);
        $post->delete();

        session()->flash('flash_message', 'Registro excluído com sucesso');
        session()->flash('flash_message_type', BOOTSTRAP_SUCCESS);
        return redirect()->route('posts.index');

    }

}