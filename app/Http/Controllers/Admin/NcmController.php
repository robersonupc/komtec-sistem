<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreUpdateNcmFormRequest;
use App\Repositories\Contracts\NcmRepositoryInterface;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NcmController extends Controller
{
    protected $repository;

    public function __construct(NcmRepositoryInterface $repository)
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
        $ncms = $this->repository->orderBy('code', 'DESC')->paginate(5);

        return view('admin.ncms.index', compact('ncms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ncms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StoreUpdateNcmFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateNcmFormRequest $request)
    {
        $this->repository->store([
            'code'      => $request->code,
            'description' => $request->description,
            
        ]);

        return redirect()
            ->route('ncms.index')
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
        $ncm = $this->repository->findById($id);

        if (!$ncm)        
             return redirect()->back();

        return view('admin.ncms.show', compact('ncm'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!$ncm = $this->repository->findById($id))
            return redirect()->back();

        return view('admin.ncms.edit', compact('ncm'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\StoreUpdateNcmFormRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateNcmFormRequest $request, $id)
    {
        $this->repository
            ->update($id, [
            'code'      => $request->code,
            'description' => $request->description
            ]);

        return redirect()
            ->route('ncms.index')
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

        return redirect()->route('ncms.index');
    }

    public function search(Request $request)
    {
        $data = $request->except('_token');

        $ncms = $this->repository->search($data); 

        return view('admin.ncms.index', compact('ncms', 'data')); 
    }
}
