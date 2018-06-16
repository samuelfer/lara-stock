<?php

namespace App\Http\Controllers;

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
        return view('setor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $validaDados = $request->validate([
            'nome' => 'required|unique:setor|min:3|max:255'
        ]);

        try {
            $setor = $this->setor->create($data);

            return redirect()->route('setor.index')->with('status', 'Registro criado com sucesso!');

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
        $set = $this->setor->findOrFail($id);

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

            //$this->validator->with($data)->passesOrFail('edit');

            $set = $this->setor->findOrFail($id);

            $set->update($data);

            return redirect()->route('setor.index')->with('atualiza', 'Registro atualizado com sucesso!');

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
        if (!($set = $this->setor->find($id))) {
            throw new ModelNotFoundException("O seto não foi encontrado");
        }
        $set->delete();
        return redirect()->route('setor.index');
    }
}
