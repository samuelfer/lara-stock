<?php

namespace App\Http\Controllers;

use App\Entrada;

use App\EntradaDetalhe;
use App\Historico;
use App\Http\Requests\EntradaRequest;
use App\Produto;
use App\TipoUnidade;
use Illuminate\Http\Request;

class EntradaController extends Controller
{
    protected $entrada;
    protected $entradaDetalhe;
    protected $historico;
    protected $tipoUnidade;
    protected $produto;

    public function __construct(Entrada $entrada, Historico $historico,
                                EntradaDetalhe $entradaDetalhe, TipoUnidade $tipoUnidade, Produto $produto)
    {
        $this->entrada = $entrada;
        $this->historico = $historico;
        $this->entradaDetalhe = $entradaDetalhe;
        $this->tipoUnidade = $tipoUnidade;
        $this->produto = $produto;
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
        $this->authorize('entrada_create', $this->entrada);
        $tpunidades = $this->tipoUnidade->pluck('nome', 'id');
        $produtos = $this->produto->pluck('nome', 'id');

        return view('entrada.create', compact('tpunidades', 'produtos'));
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

        //dd($data['detalhe']);

        try {

            $data = $this->entrada->create($data);

            $entradaDetalhe = array_get($request, 'detalhe', []);


            $entradaDetalhe = array_add($entradaDetalhe[0], 'entrada_id',$data->id);

            foreach ($entradaDetalhe as $key => $value){
                dd($value);
            }

            EntradaDetalhe::create($entradaDetalhe);


            //$historico = $entrada->historico->create($data->toArray());//Inserindo os dados em historico

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
        //$this->authorize('entrada_edit', $this->entrada);
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
        //$this->authorize('entrada_delete', $this->entrada);
        if (!($prod = $this->entrada->find($id))) {
            throw new ModelNotFoundException("A entrada não foi encontrada");
        }
        $prod->delete();

        session()->flash('flash_message', 'Registro excluído com sucesso');
        session()->flash('flash_message_type', BOOTSTRAP_SUCCESS);
        return redirect()->route('entrada.index');
    }

}
