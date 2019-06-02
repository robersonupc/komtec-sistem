<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreUpdateCfopFormRequest;
use App\Repositories\Contracts\CfopRepositoryInterface;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CfopController extends Controller
{

    protected $repository;

    public function __construct(CfopRepositoryInterface $repository)
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
        $cfops = $this->repository->orderBy('id')->paginate(5);

        return view('admin.cfops.index', compact('cfops'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.cfops.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StoreUpdateCfopFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateCfopFormRequest $request)
    {
        $this->repository->store([
            'code'        => $request->code,
            'numseq'      => $request->numseq,
            'description' => $request->description,
            'ent_sai'     => $request->ent_sai,
            'operacao'    => $request->operacao,
            'descr_int'   => $request->descr_int,
            
        ]);

        return redirect()
            ->route('cfops.index')
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
        $cfop = $this->repository->findById($id);

        if (!$cfop)        
             return redirect()->back();

        return view('admin.cfops.show', compact('cfop'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {        
        if (!$cfop = $this->repository->findById($id))
            return redirect()->back();

        return view('admin.cfops.edit', compact('cfop'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\StoreUpdateCfopFormRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateCfopFormRequest $request, $id)
    {
        $this->repository
                ->update($id, [
                    'code'        => $request->code,
                    'numseq'      => $request->numseq,
                    'description' => $request->description,
                    'ent_sai'     => $request->ent_sai,
                    'operacao'    => $request->operacao,
                    'descr_int'   => $request->descr_int,
                    ]);

        return redirect()
            ->route('cfops.index')
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

        return redirect()->route('cfops.index');
    }

    public function search(Request $request)
    {
        $data = $request->except('_token');

        $cfops = $this->repository->search($data);

        return view('admin.cfops.index', compact('cfops', 'data')); 
    }
}
