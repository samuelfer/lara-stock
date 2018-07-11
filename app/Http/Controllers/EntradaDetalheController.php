<?php

namespace App\Http\Controllers;

use App\EntradaDetalhe;

use Illuminate\Http\Request;

class EntradaDetalheController extends Controller
{
    protected $entradaDetalhe;


    public function __construct(EntradaDetalhe $entradaDetalhe)
    {
        $this->entradaDetalhe = $entradaDetalhe;
    }

    public function index()
    {
        $data = $this->entradaDetalhe->orderBy('id', 'asc')->paginate(5);
//        dd($data);
        return view('entradadetalhe.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       // $this->authorize('entrada_create', $this->entrada);

        return view('entradadetalhe.create');
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


            $entradaDetalhe = $this->entradaDetalhe->create($data);

            $data = $array = array_add($data, 'data_entrada', $data['data']);

            $data['entrada_id'] = $entrada->id;

            $data['entrada_detalhe_id'] = $entradaDetalhe->id;

            $this->historico->create($data);//Inserindo os dados em historico

            session()->flash('flash_message', 'Cadastro realizado com sucesso');
            session()->flash('flash_message_type', BOOTSTRAP_SUCCESS);

            return redirect()->route('entrada.index');

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
        $this->authorize('entrada_edit', $this->entrada);
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

            session()->flash('flash_message', 'Registro atualizado com sucesso');
            session()->flash('flash_message_type', BOOTSTRAP_SUCCESS);

            return redirect()->route('entrada.index');

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
        $this->authorize('entrada_delete', $this->entrada);
        if (!($prod = $this->entrada->find($id))) {
            throw new ModelNotFoundException("A entrada não foi encontrada");
        }
        $prod->delete();

        session()->flash('flash_message', 'Registro excluído com sucesso');
        session()->flash('flash_message_type', BOOTSTRAP_SUCCESS);
        return redirect()->route('entrada.index');
    }

}
