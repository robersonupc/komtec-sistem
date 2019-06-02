<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\Contracts\ProviderRepositoryInterface;
use App\Http\Requests\StoreUpdateProviderFormRequest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProviderController extends Controller
{
    protected $repository;

    public function __construct(ProviderRepositoryInterface $repository)
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
        $providers = $this->repository->orderBy('id')->relationships('address')->paginate(5);
        
        return view('admin.providers.index', compact('providers'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.providers.create', compact('provider', 'addresses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StoreUpdateProviderFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateProviderFormRequest $request)
    {
        $provider = $this->repository->store($request->all());

        return redirect()
            ->route('providers.index')
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
       $provider = $this->repository->findWhereFirst('id', $id);

        if (!$provider)        
            return redirect()->back();

        return view('admin.providers.show', compact('provider'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!$provider = $this->repository->findById($id))
            return redirect()->back();

        return view('admin.providers.edit', compact('provider', 'addresses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\StoreUpdateProviderFormRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateProviderFormRequest $request, $id)
    {
        $this->repository->update($id, $request->all());

        return redirect()
            ->route('providers.index')
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

        return redirect()
                    ->route('providers.index')
                    ->withSuccess('Fornecedor deletado com sucesso!');
    }

    public function search(Request $request)
    {
        $filters = $request->except('_token');

        $providers = $this->repository->search($request);

        return view('admin.providers.index', compact('providers', 'filters')); 
    }
    
}
