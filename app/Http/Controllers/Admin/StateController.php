<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreUpdateStateFormRequest;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $states = DB::table('states')
            ->orderBy('id', 'desc')
            ->paginate(6);

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
        DB::table('states')->insert([
            'title'       => $request->title,
            'url'         => $request->url,
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
        $state = DB::table('states')->where('id', $id)->first();

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
        $state = DB::table('states')->where('id', $id)->first();
        
        if (!$state)
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
        DB::table('states')
            ->where('id', $id)
            ->update([
                'title'       => $request->title,
                'url'         => $request->url,
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
        DB::table('states')->where('id', $id)->delete();

        return redirect()->route('states.index');
    }

    public function search(Request $request)
    {
        $data = $request->except('_token');
        /**
        $states = DB::table('states')
            ->where('title', $search)
            ->orWhere('url', $search)
            ->orWhere('uf', 'LIKE', "%$search%")
            ->get();
        */

        $states = DB::table('states')
        ->where(function($query) use($data) {
            if(isset($data['title'])){
                $query->where('title', $data['title']);
            }
            
            if(isset($data['url'])){
                $query->orWhere('url', $data['url']);
            }

            if(isset($data['uf'])){
                $desc = $data['uf'];
                $query->orWhere('uf', 'LIKE', "%{$desc}%");
            }
        })
        ->orderBy('id', 'desc')
        ->get();

        return view('admin.states.index', compact('states', 'data')); 
    }
}
