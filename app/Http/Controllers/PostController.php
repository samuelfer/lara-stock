<?php

namespace App\Http\Controllers;

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
        $this->middleware(['auth', 'clearance']);
//        $this->middleware(['auth', 'roles']);
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
        //$this->role->hasPermissionTo ( 'create_post');
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {


        $this->validate($request, [
            'title'=>'required|max:100',
            'body' =>'required',
        ]);

        //$this->_validate($request);

        $title = $request['title'];
        $body = $request['body'];

        $post =  $this->post->create($request->only('title', 'body'));

        session()->flash('flash_message', 'teste');
        //Display a successful message upon save
        session()->flash('flash_message_type', BOOTSTRAP_SUCCESS);
//        return redirect()->route('posts.index')
//            ->with('flash_message', 'Post,
//             '. $post->title.' criado com sucesso');

        //return redirect()->route('posts.index')->with('flash_message_type',
          //  'Post '. $post->title.' atualizado com sucesso');
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

        return redirect()->route('posts.index')->with('flash_message',
            'Post '. $post->title.' atualizado com sucesso');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $post =  $this->post->findOrFail($id);
        $post->delete();

        return redirect()->route('posts.index')
            ->with('flash_message',
                'Post excluído com sucessso');

    }

//    private function _validate(Request $request)
//    {
//        $this->validate(
//            $request,
//            $this->customAttributes()
//        );
//    }
//
//
//    /**
//     * @return array
//     */
//    private function customAttributes()
//    {
//        return [
//            "title" => "Título",
//            'body' => 'Texto',
//        ];
//    }

}