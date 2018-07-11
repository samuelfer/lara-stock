<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use Auth;
use Spatie\Permission\Models\Role;


use Session;

class UserController extends Controller
{
    protected $user;
    protected $role;

    public function __construct(User $user, Role $role) {
        //$this->middleware(['auth', 'isAdmin']); //Apenas admin acessa
        $this->user = $user;
        $this->role = $role;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $users = $this->user->all();
        return view('users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $roles = $this->user->get();
        return view('users.create', ['roles'=>$roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
//        $this->validate($request, [
//            'name'=>'required|max:120',
//            'email'=>'required|email|unique:users',
//            'password'=>'required|min:6|confirmed'
//        ]);

        $user = $this->user->create($request->only('email', 'name', 'password'));

        $roles = $request['roles'];

        if (isset($roles)) {

            foreach ($roles as $role) {
                $role_r = $this->user->where('id', '=', $role)->firstOrFail();
                $user->assignRole($role_r);
            }
        }

        return redirect()->route('users.index')
            ->with('flash_message',
                'Usuário criado com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        return redirect('users');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $user = $this->user->findOrFail($id);
        $roles =  $this->role->get();

        return view('users.edit', compact('user', 'roles'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $user = $this->user->findOrFail($id);


        $this->validate($request, [
            'name'=>'required|max:120',
            'email'=>'required|email|unique:users,email,'.$id,
            'password'=>'required|min:6|confirmed'
        ]);

        $input = $request->only(['name', 'email', 'password']); //recupera o nome email e senha
        $roles = $request['roles']; //Recupera os papeis(funcoes)
        $user->fill($input)->save();

        if (isset($roles)) {
            $user->roles()->sync($roles);  //associando as funcoes ao usuario
        }
        else {
            $user->roles()->detach(); //removendo as funcoes
        }
        return redirect()->route('users.index')
            ->with('flash_message',
                'Usuário atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $user = $this->user->findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')
            ->with('flash_message',
                'Usuário excluído com sucesso.');
    }
}
