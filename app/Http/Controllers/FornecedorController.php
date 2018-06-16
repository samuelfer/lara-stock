<?php

namespace App\Http\Controllers;

use App\Fornecedor;
use Illuminate\Http\Request;
use Auth;
use Session;

class FornecedorController extends Controller
{
	protected $fornecedor;

    public function __construct(Fornecedor $fornecedor)
    {
        $this->middleware(['auth', 'clearance'])->except('index', 'show');
        $this->fornecedor = $fornecedor;
    }

    public function index()
    {
        $data = $this->fornecedor->orderBy('id', 'asc')->paginate(5);
//        dd($data);
        return view('fornecedor.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
{
    return view('fornecedor.create');
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

        $fornecedor = $this->fornecedor->create($data);

        return redirect()->route('fornecedor.index')->with('status', 'Registro criado com sucesso!');

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
    $forn = $this->fornecedor->findOrFail($id);

    return view('fornecedor.edit', compact('forn'));
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

        $fornecedor = $this->fornecedor->findOrFail($id);

        $fornecedor->update($data);

        return redirect()->route('fornecedor.index')->with('atualiza', 'Registro atualizado com sucesso!');

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
        if (!($fornecedor = $this->fornecedor->find($id))) {
        throw new ModelNotFoundException("O fornecedor não foi encontrado");
    }
    $fornecedor->delete();
    return redirect()->route('fornecedor.index');
    }
}
