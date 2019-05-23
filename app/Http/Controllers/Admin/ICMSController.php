<?php

namespace App\Http\Controllers\Admin;

use DB;
use App\Models\ICMS;
use App\Http\Requests\StoreUpdateICMSFormRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ICMSController extends Controller
{

    protected $icms;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $icmss = DB::table('icmss')
            ->orderBy('id', 'desc')
            ->paginate(6);

        return view('admin.icmss.index', compact('icmss'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.icmss.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StoreUpdateICMSFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateICMSFormRequest $request)
    {
        DB::table('icmss')->insert([
            'uf'          => $request->uf,
            'description' => $request->description,
            'aliqicms'    => $request->aliqicms,
            'url'         => $request->url            
        ]);

        return redirect()
            ->route('icmss.index')
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
        $icms = DB::table('icmss')->where('id', $id)->first();

        if (!$icms)        
             return redirect()->back();

        return view('admin.icmss.show', compact('icms'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $icms = DB::table('icmss')->where('id', $id)->first();
        
        if (!$icms)
            return redirect()->back();

        return view('admin.icmss.edit', compact('icms'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\StoreUpdateICMSFormRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateICMSFormRequest $request, $id)
    {
        DB::table('icmss')
                    ->where('id', $id)
                    ->update([
                        'uf'          => $request->uf,
                        'description' => $request->description,
                        'aliqicms'    => $request->aliqicms,
                        'url'         => $request->url,
                        
            ]);

        return redirect()
            ->route('icmss.index')
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
        DB::table('icmss')->where('id', $id)->delete();

        return redirect()->route('icmss.index');
    }

    public function search(Request $request)
    {
        $data = $request->except('_token');
        /**
        $icmss = DB::table('icmss')
            ->where('uf', $search)
            ->orWhere('url', $search)
            ->orWhere('description', 'LIKE', "%$search%")
            ->get();
        */

        $icmss = DB::table('icmss')
        ->where(function($query) use($data) {
            if(isset($data['uf'])){
                $query->where('uf', $data['uf']);
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

        return view('admin.icmss.index', compact('icmss', 'data')); 
    }
}
