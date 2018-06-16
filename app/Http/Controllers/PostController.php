<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use Auth;
use Session;

class PostController extends Controller
{
    protected $post;

    public function __construct(Post $post) {
        $this->middleware(['auth', 'clearance']);
        $this->post = $post;
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

        $post =  $this->postcreate($request->only('title', 'body'));

        //Display a successful message upon save
        return redirect()->route('posts.index')
            ->with('flash_message', 'Post,
             '. $post->title.' criado com sucesso');
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

        return redirect()->route('posts.show',
            $post->id)->with('flash_message',
            'Post, '. $post->title.' atualizado com sucesso');

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