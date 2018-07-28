<?php

namespace App\Http\Controllers;

use App\Historico;
use App\Http\Requests\SaidaRequest;
use App\Produto;
use App\Saida;
use App\SaidaDetalhe;
use App\TipoUnidade;
use Illuminate\Http\Request;

class SaidaController extends Controller
{
    protected $saida;
    protected $saidaDetalhe;
    protected $historico;
    protected $tipoUnidade;
    protected $produto;

    public function __construct(Saida $saida, SaidaDetalhe $saidaDetalhe,Historico $historico,
                                TipoUnidade $tipoUnidade, Produto $produto)
    {
        $this->saida = $saida;
        $this->saidaDetalhe = $saidaDetalhe;
        $this->historico = $historico;
        $this->tipoUnidade = $tipoUnidade;
        $this->produto = $produto;
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
        $this->authorize('saida_create', $this->saida);
        $tpunidades = $this->tipoUnidade->pluck('nome', 'id');
        $produtos = $this->produto->pluck('nome', 'id');

        return view('saida.create', compact('tpunidades', 'produtos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaidaRequest $request)
    {
        $data = $request->all();

        try {

            //$this->validator->with($data)->passesOrFail('create');

            $saidaModel = $this->saida->create($data);

            $detalhes = $request->get('detalhe');

            foreach($detalhes as $detalhe) {
                $salvarDetalhe = $detalhe;
                $salvarDetalhe['saida_id'] = $saidaModel->id;
                $this->saidaDetalhe->create($salvarDetalhe);
            }

            session()->flash('flash_message', 'Cadastro realizado com sucesso');
            session()->flash('flash_message_type', BOOTSTRAP_SUCCESS);

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
        $this->authorize('saida_edit', $this->saida);
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

            session()->flash('flash_message', 'Registro atualizado com sucesso');
            session()->flash('flash_message_type', BOOTSTRAP_SUCCESS);

            return redirect()->route('saida.index');

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
        $this->authorize('saida_delete', $this->saida);
        if (!($sai = $this->saida->find($id))) {
            throw new ModelNotFoundException("A saída não foi encontrado");
        }
        $sai->delete();

        session()->flash('flash_message', 'Registro excluído com sucesso');
        session()->flash('flash_message_type', BOOTSTRAP_SUCCESS);

        return redirect()->route('saida.index');
    }

}
