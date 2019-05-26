<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreUpdateFormapgtoFormRequest;
use DB;
use App\Models\FormaPgmento;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FomaPgtoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $formapgtos = DB::table('formapgtos')
            ->orderBy('id', 'desc')
            ->paginate(5);

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
     * @param  \Illuminate\Http\StoreUpdateFormapgtoFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateFormapgtoFormRequest $request)
    {
        DB::table('formapgtos')->insert([
            'description'       => $request->description,
            'parcela'           => $request->parcela,
            'prazoinicial'      => $request->prazoinicial,
            'diasentreparcelas' => $request->diasentreparcelas,
            'url'               => $request->url,
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
        $formapgto = DB::table('formapgtos')->where('id', $id)->first();

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
        $formapgto = DB::table('formapgtos')->where('id', $id)->first();
        
        if (!$formapgto)
            return redirect()->back();

        return view('admin.formapgtos.edit', compact('formapgto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\StoreUpdateFormapgtoFormRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateFormapgtoFormRequest $request, $id)
    {
        DB::table('formapgtos')
                    ->where('id', $id)
                    ->update([
            'description'       => $request->description,
            'parcela'           => $request->parcela,
            'prazoinicial'      => $request->prazoinicial,
            'diasentreparcelas' => $request->diasentreparcelas,
            'url'               => $request->url,
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
        DB::table('formapgtos')->where('id', $id)->delete();

        return redirect()->route('formapgtos.index');
    }

    public function search(Request $request)
    {
        $data = $request->except('_token');
        /**
        $formapgtos = DB::table('formapgtos')
            ->where('description', $search)
            ->orWhere('url', $search)
            ->orWhere('diasentreparcelas', 'LIKE', "%$search%")
            ->get();
        */

        $formapgtos = DB::table('formapgtos')
        ->where(function($query) use($data) {
            if(isset($data['description'])){
                $query->where('description', $data['description']);
            }
            
            if(isset($data['url'])){
                $query->orWhere('url', $data['url']);
            }

            if(isset($data['diasentreparcelas'])){
                $desc = $data['diasentreparcelas'];
                $query->orWhere('diasentreparcelas', 'LIKE', "%{$desc}%");
            }
        })
        ->orderBy('id', 'desc')
        ->get();

        return view('admin.formapgtos.index', compact('formapgtos', 'data')); 
    }
}
