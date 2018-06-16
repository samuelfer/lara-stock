<?php

namespace App\Http\Controllers;

use App\Entrada;
use Illuminate\Http\Request;

class EntradaController extends Controller
{
    protected $entrada;

    public function __construct(Entrada $entrada)
    {
        $this->entrada = $entrada;
    }

    public function index()
    {
        $data = $this->entrada->orderBy('id', 'asc')->paginate(5);
//        dd($data);
        return view('entrada.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('entrada.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        try {

            //$this->validator->with($data)->passesOrFail('create');

            $entrada = $this->entrada->create($data);

            return redirect()->route('entrada.index')->with('status', 'Registro criado com sucesso!');

        } catch (ValidatorException $e) {

            return redirect()->back()->withInput()->withErrors($e->getMessageBag());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ent = $this->entrada->findOrFail($id);

        return view('entrada.edit', compact('ent'));
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
        $data = $request->all();

        try {

            //$this->validator->with($data)->passesOrFail('edit');

            $prod = $this->entrada->findOrFail($id);

            $prod->update($data);

            return redirect()->route('entrada.index')->with('atualiza', 'Registro atualizado com sucesso!');

        } catch (ValidatorException $e) {

            return redirect()->back()->withInput()->withErrors($e->getMessageBag());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!($prod = $this->entrada->find($id))) {
            throw new ModelNotFoundException("A entrada não foi encontrado");
        }
        $prod->delete();
        return redirect()->route('entrada.index');
    }

}
