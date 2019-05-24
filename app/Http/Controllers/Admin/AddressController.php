<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreUpdateAddressFormRequest;
use DB;
use App\Models\Address;
use App\Models\City;
use App\Models\State;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CityController;
use App\Http\Controllers\StateController;
use Illuminate\Http\Response;

class AddressController extends Controller
{
    protected $address;

    public function __construct(Address $address)
    {
        $this->address = $address;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $addresses = Address::with('city', 'state')
            ->orderBy('id', 'desc')
            ->paginate(5);

        return view('admin.addresses.index', compact('addresses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::all();  
        $states = State::all();  

        return view('admin.addresses.create', compact('cities', 'states'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StoreUpdateAddressFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateAddressFormRequest $request)
    {
        DB::table('addresses')->insert([
            'street'       => $request->street,
            'url'          => $request->url,
            'number'       => $request->number,
            'neighborhood' => $request->neighborhood,
            'complement'   => $request->complement,
            'zipeCode'     => $request->zipeCode,
            'city_id'      => $request->city_id,
            'state_id'     => $request->state_id,
        ]);
    
            return redirect()
                ->route('addresses.index')
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
        $address = DB::table('addresses')->where('id', $id)->first();

        if (!$address)        
        return redirect()->back();

        return view('admin.addresses.show', compact('address'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $address = DB::table('addresses')->where('id', $id)->first();
        
        if (!$address)
            return redirect()->back();

        return view('admin.addresses.edit', compact('address'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\StoreUpdateAddressFormRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateAddressFormRequest $request, $id)
    {
        DB::table('addresses')
        ->where('id', $id)
        ->update([
            'street'       => $request->street,
            'url'          => $request->url,
            'number'       => $request->number,
            'neighborhood' => $request->neighborhood,
            'complement'   => $request->complement,
            'zipeCode'      => $request->zipeCode,
            'city_id'      => $request->city_id,
            'state_id'     => $request->state_id,
        ]);

        return redirect()
        ->route('addresses.index')
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
        DB::table('addresses')->where('id', $id)->delete();

        return redirect()->route('addresses.index');
    }

    public function search(Request $request)
    {
        $data = $request->except('_token');
        /**
        $addresses = DB::table('addresses')
            ->where('street', $search)
            ->orWhere('zipeCode', $search)
            ->orWhere('neighborhood', 'LIKE', "%$search%")
            ->get();
        */

        $addresses = DB::table('addresses')
        ->where(function($query) use($data) {
            if(isset($data['street'])){
                $query->where('street', $data['street']);
            }
            
            if(isset($data['zipeCode'])){
                $query->orWhere('zipeCode', $data['zipeCode']);
            }

            if(isset($data['neighborhood'])){
                $desc = $data['neighborhood'];
                $query->orWhere('neighborhood', 'LIKE', "%{$desc}%");
            }
        })
        ->orderBy('id', 'desc')
        ->get();

        return view('admin.addresses.index', compact('addresses', 'data')); 
    }
}
