<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreUpdateStateFormRequest;
use App\Repositories\Contracts\StateRepositoryInterface;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StateController extends Controller
{

    protected $repository;

    public function __construct(StateRepositoryInterface $repository)
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
        $states = $this->repository->orderBy('id')->paginate(5);

        return view('admin.states.index', compact('states'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.states.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StoreUpdateStateFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateStateFormRequest $request)
    {
        $this->repository->store([
            'title'       => $request->title,
            'uf'          => $request->uf
        ]);

        return redirect()
            ->route('states.index')
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
        $state = $this->repository->findById($id);

        if (!$state)        
        return redirect()->back();

        return view('admin.states.show', compact('state'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!$state = $this->repository->findById($id))
            return redirect()->back();

        return view('admin.states.edit', compact('state'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\StoreUpdateStateFormRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateStateFormRequest $request, $id)
    {
        $this->repository
        ->update($id, [
                'title'       => $request->title,
                'uf'          => $request->uf,
            ]);

        return redirect()
            ->route('states.index')
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

        return redirect()->route('states.index');
    }

    public function search(Request $request)
    {
        $data = $request->except('_token');

        $states = $this->repository->search($data);

        return view('admin.states.index', compact('states', 'data')); 
    }
}
