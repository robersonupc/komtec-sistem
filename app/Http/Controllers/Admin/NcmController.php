<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreUpdateNcmFormRequest;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NcmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ncms = DB::table('ncms')
            ->orderBy('id', 'desc')
            ->paginate(6);

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
        DB::table('ncms')->insert([
            'code'      => $request->code,
            'description' => $request->description,
            'url'         => $request->url
            
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
        $ncm = DB::table('ncms')->where('id', $id)->first();

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
        $ncm = DB::table('ncms')->where('id', $id)->first();
        
        if (!$ncm)
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
        DB::table('ncms')
            ->where('id', $id)
            ->update([
            'code'      => $request->code,
            'description' => $request->description,
            'url'         => $request->url
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
        DB::table('ncms')->where('id', $id)->delete();

        return redirect()->route('ncms.index');
    }

    public function search(Request $request)
    {
        $data = $request->except('_token');
        /**
        $ncms = DB::table('ncms')
            ->where('code', $search)
            ->orWhere('url', $search)
            ->orWhere('description', 'LIKE', "%$search%")
            ->get();
        */

        $ncms = DB::table('ncms')
        ->where(function($query) use($data) {
            if(isset($data['code'])){
                $query->where('code', $data['code']);
            }
            
            if(isset($data['url'])){
                $query->orWhere('url', $data['url']);
            }

            if(isset($data['description'])){
                $desc = $data['description'];
                $query->orWhere('description', 'LIKE', "%{$desc}%");
            }

        })
        ->orderBy('id', 'desc')
        ->get();

        return view('admin.ncms.index', compact('ncms', 'data')); 
    }
}
