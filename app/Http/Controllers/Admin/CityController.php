<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\Contracts\CityRepositoryInterface;
use App\Http\Requests\StoreUpdateCityFormRequest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CityController extends Controller
{
    protected $repository;

    public function __construct(CityRepositoryInterface $repository)
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
        $cities = $this->repository->orderBy('id')->paginate(5);

        return view('admin.cities.index', compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.cities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdateCityFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateCityFormRequest $request)
    {
        $this->repository->store([
            'title' => $request->title,
        ]);

        return redirect()
            ->route('cities.index')
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
        $city = $this->repository->findById($id);

        if (!$city)        
             return redirect()->back();

        return view('admin.cities.show', compact('city'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {        
        if (!$city = $this->repository->findById($id))
            return redirect()->back();

        return view('admin.cities.edit', compact('city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdateCityFormRequest  $request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateCityFormRequest $request, $id)
    {
        $this->repository
                    ->update($id, [
                        'title' => $request->title,
                    ]);

        return redirect()
            ->route('cities.index')
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

        return redirect()->route('cities.index');
    }

    public function search(Request $request)
    {
        $data = $request->except('_token');

        $cities = $this->repository->search($data);        

        return view('admin.cities.index', compact('cities', 'data')); 
    }
}
