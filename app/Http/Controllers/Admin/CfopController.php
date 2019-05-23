<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreUpdateCfopFormRequest;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CfopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cfops = DB::table('cfops')
            ->orderBy('id', 'desc')
            ->paginate(6);

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
        DB::table('cfops')->insert([
            'codigo'      => $request->codigo,
            'numseq'      => $request->numseq,
            'description' => $request->description,
            'ent_sai'     => $request->ent_sai,
            'operacao'    => $request->operacao,
            'descr_int'   => $request->descr_int,
            'url'         => $request->url
            
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
        $cfop = DB::table('cfops')->where('id', $id)->first();

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
        $cfop = DB::table('cfops')->where('id', $id)->first();
        
        if (!$cfop)
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
        DB::table('cfops')
            ->where('id', $id)
            ->update([
            'codigo'      => $request->codigo,
            'numseq'      => $request->numseq,
            'description' => $request->description,
            'ent_sai'     => $request->ent_sai,
            'operacao'    => $request->operacao,
            'descr_int'   => $request->descr_int,
            'url'         => $request->url
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
        DB::table('cfops')->where('id', $id)->delete();

        return redirect()->route('cfops.index');
    }

    public function search(Request $request)
    {
        $data = $request->except('_token');
        /**
        $cfops = DB::table('cfops')
            ->where('codigo', $search)
            ->orWhere('url', $search)
            ->orWhere('description', 'LIKE', "%$search%")
            ->get();
        */

        $cfops = DB::table('cfops')
        ->where(function($query) use($data) {
            if(isset($data['codigo'])){
                $query->where('codigo', $data['codigo']);
            }
            
            if(isset($data['url'])){
                $query->orWhere('url', $data['url']);
            }

            if(isset($data['description'])){
                $desc = $data['description'];
                $query->orWhere('description', 'LIKE', "%{$desc}%");
            }

            if(isset($data['ent_sai'])){
                $desc = $data['ent_sai'];
                $query->orWhere('ent_sai', 'LIKE', "%{$desc}%");
            }

            if(isset($data['operacao'])){
                $desc = $data['operacao'];
                $query->orWhere('operacao', 'LIKE', "%{$desc}%");
            }
        })
        ->orderBy('id', 'desc')
        ->get();

        return view('admin.cfops.index', compact('cfops', 'data')); 
    }
}
