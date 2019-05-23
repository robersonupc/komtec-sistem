<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreUpdateCityFormRequest;
use DB;
use App\Models\City;;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CityController extends Controller
{
    protected $city;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = DB::table('cities')
        ->orderBy('id', 'desc')
        ->paginate(5);

        return view('admin.cities.index', compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.cities.create', compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StoreUpdateCityFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateCityFormRequest $request)
    {
       
      DB::table('cities')->insert([
        'title'       => $request->title,
        'url'         => $request->url,
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
       $city = City::find($id);

       //$city = City::where('id', $id)->first();

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
        $city = DB::table('cities')->where('id', $id)->first();
        
        if (!$city)
            return redirect()->back();

        return view('admin.cities.edit', compact('city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\StoreUpdateCityFormRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateCityFormRequest $request, $id)
    {
        DB::table('cities')
            ->where('id', $id)
            ->update([
                'title'       => $request->title,
                'url'         => $request->url,
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
        DB::table('cities')->where('id', $id)->delete();

        return redirect()->route('cities.index');
    }

    public function search(Request $request)
    {
        $data = $request->except('_token');
        /**
        $cities = DB::table('cities')
            ->where('title', $search)
            ->orWhere('url', $search)
            ->orWhere('state_id', 'LIKE', "%$search%")
            ->get();
        */

        $cities = DB::table('cities')
        ->where(function($query) use($data) {
            if(isset($data['title'])){
                $query->where('title', $data['title']);
            }
            
            if(isset($data['url'])){
                $query->orWhere('url', $data['url']);
            }
            /**
            if(isset($data['state_id'])){
                $desc = $data['state_id'];
                $query->orWhere('state_id', 'LIKE', "%{$desc}%");
            }
            */
        })
        ->orderBy('id', 'desc')
        ->get();

        return view('admin.cities.index', compact('cities', 'data')); 
    }
}
