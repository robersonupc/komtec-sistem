<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreUpdateBrandFormRequest;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = DB::table('brands')
            ->orderBy('id', 'desc')
            ->paginate(8);

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
        DB::table('brands')->insert([
            'title'       => $request->title,
            'url'         => $request->url,
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
        $brand = DB::table('brands')->where('id', $id)->first();

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
        $brand = DB::table('brands')->where('id', $id)->first();
        
        if (!$brand)
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
        DB::table('brands')
            ->where('id', $id)
            ->update([
                'title'       => $request->title,
                'url'         => $request->url,
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
        DB::table('brands')->where('id', $id)->delete();

        return redirect()->route('brands.index');
    }

    public function search(Request $request)
    {
        $data = $request->except('_token');
        /**
        $brands = DB::table('brands')
            ->where('title', $search)
            ->orWhere('url', $search)
            ->orWhere('description', 'LIKE', "%$search%")
            ->get();
        */

        $brands = DB::table('brands')
        ->where(function($query) use($data) {
            if(isset($data['title'])){
                $query->where('title', $data['title']);
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

        return view('admin.brands.index', compact('brands', 'data')); 
    }
}
