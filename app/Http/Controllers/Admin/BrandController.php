<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreUpdateBrandFormRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Repositories\Contracts\BrandRepositoryInterface;

class BrandController extends Controller
{
    protected $repository;

    public function __construct(BrandRepositoryInterface $repository)
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
        $brands = $this->repository->orderBy('id')->paginate();

        return view('admin.brands.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdateBrandFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateBrandFormRequest $request)
    {
        $this->repository->store([
            'title'       => $request->title,
            'description' => $request->description
        ]);

        return redirect()
            ->route('brands.index')
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
        $brand = $this->repository->findById($id);

        if (!$brand)        
             return redirect()->back();

        return view('admin.brands.show', compact('brand'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {        
        if (!$brand = $this->repository->findById($id))
            return redirect()->back();

        return view('admin.brands.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdateBrandFormRequest  $request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateBrandFormRequest $request, $id)
    {
        $this->repository
            ->update($id, [
                'title'       => $request->title,
                'description' => $request->description,
            ]);

        return redirect()->route('brands.index');
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

        return redirect()->route('brands.index');
    }

    public function search(Request $request)
    {
        $data = $request->except('_token');

        $brands = $this->repository->search($data);

        return view('admin.brands.index', compact('brands', 'data')); 
    }
}
