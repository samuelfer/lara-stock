<?php

namespace App\Http\Controllers;

use App\Saida;
use Illuminate\Http\Request;

class SaidaController extends Controller
{
    protected $saida;

    public function __construct(Saida $saida)
    {
        $this->saida = $saida;
    }

    public function index()
    {
        $data = $this->saida->orderBy('id', 'asc')->paginate(5);
//        dd($data);
        return view('saida.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('saida.create');
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

            $saida = $this->saida->create($data);

            return redirect()->route('saida.index')->with('status', 'Registro criado com sucesso!');

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
        $sai = $this->saida->findOrFail($id);

        return view('saida.edit', compact('sai'));
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

            $sai = $this->saida->findOrFail($id);

            $sai->update($data);

            return redirect()->route('saida.index')->with('atualiza', 'Registro atualizado com sucesso!');

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
        if (!($sai = $this->saida->find($id))) {
            throw new ModelNotFoundException("A saída não foi encontrado");
        }
        $sai->delete();
        return redirect()->route('saida.index');
    }

}
