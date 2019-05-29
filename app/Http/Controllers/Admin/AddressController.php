<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\Contracts\AddressRepositoryInterface;
use App\Http\Requests\StoreUpdateAddressFormRequest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AddressController extends Controller
{
    protected $repository;

    public function __construct(AddressRepositoryInterface $repository)
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
        $addresses =  $this->repository
                                    ->orderBy('id')
                                    ->relationships('address', 'city', 'state')
                                    ->paginate();

        return view('admin.addresses.index', compact('addresses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {  

        return view('admin.addresses.create', compact('address', 'cities', 'states'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StoreUpdateAddressFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateAddressFormRequest $request)
    {
        $address = $this->repository->store($request->all());
    
            return redirect()
                ->route('addresses.index')
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
        $address = $this->repository->findWhereFirst('id', $id);

        if (!$address)        
        return redirect()->back();

        return view('admin.addresses.show', compact('address', 'cities', 'states'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!$address = $this->repository->findById($id))
            return redirect()->back();

        return view('admin.addresses.edit', compact('address', 'cities', 'states'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\StoreUpdateAddressFormRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateAddressFormRequest $request, $id)
    {
        $this->repository->update($id, $request->all());

        return redirect()
        ->route('addresses.index')
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

        return redirect()->route('addresses.index');
    }

    public function search(Request $request)
    {
        $filters = $request->except('_token');

        $addresses = $this->repository->search($request);

        return view('admin.addresses.index', compact('addresses', 'data')); 
    }
}
