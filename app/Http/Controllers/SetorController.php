<?php

namespace App\Http\Controllers;

use App\Http\Requests\SetorRequest;
use App\Setor;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class SetorController extends Controller
{
    protected $setor;

    public function __construct(Setor $setor)
    {
        $this->setor = $setor;
    }

    public function index()
    {
        $data = $this->setor->orderBy('id', 'asc')->paginate(5);

        return view('setor.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('setor_create', $this->setor);
        return view('setor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(SetorRequest $request)
    {
        $data = $request->all();

        try {
            $setor = $this->setor->create($data);

            session()->flash('flash_message', 'Cadastro realizado com sucesso');
            session()->flash('flash_message_type', BOOTSTRAP_SUCCESS);

            return redirect()->route('setor.index');

        } catch (ValidatorException $e) {

            return redirect()->back()->withInput()->withErrors($e->getMessageBag());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('setor_edit', $this->setor);
        $set = $this->setor->findOrFail($id);

        session()->flash('flash_message', 'Registro atualizado com sucesso');
        session()->flash('flash_message_type', BOOTSTRAP_SUCCESS);

        return view('setor.edit', compact('set'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();

        try {

            $set = $this->setor->findOrFail($id);

            $set->update($data);

            session()->flash('flash_message', 'Registro atualizado com sucesso');
            session()->flash('flash_message_type', BOOTSTRAP_SUCCESS);

            return redirect()->route('setor.index');

        } catch (ValidatorException $e) {

            return redirect()->back()->withInput()->withErrors($e->getMessageBag());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('setor_delete', $this->setor);
        if (!($set = $this->setor->find($id))) {
            throw new ModelNotFoundException("O setor não foi encontrado");
        }
        $set->delete();

        session()->flash('flash_message', 'Registro excluído com sucesso');
        session()->flash('flash_message_type', BOOTSTRAP_SUCCESS);

        return redirect()->route('setor.index');
    }
}
