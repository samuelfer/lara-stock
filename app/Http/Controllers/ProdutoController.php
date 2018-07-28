<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Fornecedor;
use App\Http\Requests\ProdutoRequest;
use App\Produto;
use App\TipoUnidade;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    protected $produto;
    protected $categoria;
    protected $tipoUnidade;
    protected $fornecedor;

    public function __construct(Produto $produto, Categoria $categoria, TipoUnidade $tipoUnidade, Fornecedor $fornecedor)
    {
        $this->produto = $produto;
        $this->categoria = $categoria;
        $this->tipoUnidade = $tipoUnidade;
        $this->fornecedor = $fornecedor;
    }

    public function index()
    {
        $data = $this->produto->orderBy('id', 'asc')->paginate(5);
        //dd($data);
        return view('produto.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create_produto', $this->produto);
        $categorias = $this->categoria->pluck('nome', 'id');
        $tpunidades = $this->tipoUnidade->pluck('nome', 'id');
        $fornecedores = $this->fornecedor->pluck('nome', 'id');

        return view('produto.create', compact('categorias', 'tpunidades', 'fornecedores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProdutoRequest $request)
    {
        $this->authorize('store_produto', $this->produto);
        $data = $request->all();

        try {
            //$this->validator->with($data)->passesOrFail('create');

            $fornecedor = $this->produto->create($data);

            return redirect()->route('produto.index')->with('status', 'Registro criado com sucesso!');

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
        $prod = $this->produto->findOrFail($id);
        $fornecedores = $this->fornecedor->pluck('nome', 'id');
        $tpunidades = $this->tipoUnidade->pluck('nome', 'id');
        $categorias = $this->categoria->pluck('nome', 'id');

        return view('produto.edit', compact('prod', 'fornecedores', 'tpunidades', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProdutoRequest $request, $id)
    {
        $data = $request->all();

        try {

            //$this->validator->with($data)->passesOrFail('edit');

            $prod = $this->produto->findOrFail($id);

            $prod->update($data);

            return redirect()->route('produto.index')->with('status', 'Registro atualizado com sucesso!');

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
        if (!($prod = $this->produto->find($id))) {
            throw new ModelNotFoundException("O produto não foi encontrado");
        }
        $prod->delete();
        return redirect()->route('produto.index');
    }
}
