<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreUpdateFormaPgtoFormRequest;
use App\Repositories\Contracts\FormaPgtoRepositoryInterface;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FormaPgtoController extends Controller
{

    protected $repository;

    public function __construct(FormaPgtoRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $formapgtos = $this->repository->orderBy('id')->paginate(5);

        return view('admin.formapgtos.index', compact('formapgtos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.formapgtos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StoreUpdateFormaPgtoFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateFormaPgtoFormRequest $request)
    {
        $this->repository->store([
            'description'       => $request->description,
            'parcela'           => $request->parcela,
            'prazoinicial'      => $request->prazoinicial,
            'diasentreparcelas' => $request->diasentreparcelas,
        ]);

        return redirect()
            ->route('formapgtos.index')
            ->withSuccess('Cadastro realizado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $formapgto = $this->repository->findById($id);

        if (!$formapgto)        
             return redirect()->back();

        return view('admin.formapgtos.show', compact('formapgto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!$formapgto = $this->repository->findById($id))
            return redirect()->back();

        return view('admin.formapgtos.edit', compact('formapgto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\StoreUpdateFormaPgtoFormRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateFormaPgtoFormRequest $request, $id)
    {
        $this->repository
            ->update($id, [
                'description'       => $request->description,
                'parcela'           => $request->parcela,
                'prazoinicial'      => $request->prazoinicial,
                'diasentreparcelas' => $request->diasentreparcelas,
                ]);

        return redirect()
            ->route('formapgtos.index')
            ->withSuccess('Cadastro atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->repository->delete($id);

        return redirect()->route('formapgtos.index');
    }

    public function search(Request $request)
    {
        $data = $request->except('_token');

        $formapgtos = $this->repository->search($data);

        return view('admin.formapgtos.index', compact('formapgtos', 'data')); 
    }
}
