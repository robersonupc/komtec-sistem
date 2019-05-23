<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreUpdateProductFormRequest;
use DB;
use App\Models\Product;
use App\Models\Category;
use App\Models\Ncm;
use App\Models\Brand;
use App\Http\Controllers\Admin\NcmController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BrandController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    protected $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('ncm', 'category', 'brand')
                    ->orderBy('id', 'desc')
                    ->paginate(6);

        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ncms = Ncm::all();
        $categories = Category::all();
        $brands = Brand::all();

        return view('admin.products.create', compact('ncms', 'categories', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StoreUpdateProductFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateProductFormRequest $request)
    {
        DB::table('products')->insert([
            'description'         => $request->description,
            'code'                => $request->code,
            'ncm_id'              => $request->ncm_id,
            'category_id'         => $request->category_id,
            'brand_id'            => $request->brand_id,
            'codeManufacturer'    => $request->codeManufacturer,
            'pricePurchase'       => $request->pricePurchase,
            'margin'              => $request->margin,
            'priceSale'           => $request->priceSale,
            'qty'                 => $request->qty,
            'url'                 => $request->url,
            'note'                => $request->note,
        ]);

        return redirect()
            ->route('products.index')
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
        $product = Product::find($id);

       //$product = Product::where('id', $id)->first();

        if (!$product)        
            return redirect()->back();

        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = DB::table('products')->where('id', $id)->first();
        
        if (!$product)
            return redirect()->back();

        return view('admin.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\StoreUpdateProductFormRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateProductFormRequest $request, $id)
    {
        DB::table('products')
            ->where('id', $id)
            ->update([
                'description'         => $request->description,
                'code'                => $request->code,
                'ncm_id'              => $request->ncm->code,
                'category_id'         => $request->category->title,
                'brand_id'            => $request->brand->title,
                'codeManufacturer'    => $request->codeManufacturer,
                'pricePurchase'       => $request->pricePurchase,
                'margin'              => $request->margin,
                'priceSale'           => $request->priceSale,
                'qty'                 => $request->qty,
                'url'                 => $request->url,
                'note'                => $request->note,
            ]);

        return redirect()
            ->route('products.index')
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
        DB::table('products')->where('id', $id)->delete();

        return redirect()->route('products.index');
    }

    public function search(Request $request)
    {
        $data = $request->except('_token');
        /**
        $products = DB::table('products')
            ->where('description', $search)
            ->orWhere('code', $search)
            ->orWhere('description', 'LIKE', "%$search%")
            ->get();
        */

        $products = DB::table('products')
        ->where(function($query) use($data) {
            if(isset($data['description'])){
                $query->where('description', $data['description']);
            }
            
            if(isset($data['code'])){
                $query->orWhere('code', $data['code']);
            }

            if(isset($data['priceSale'])){
                $desc = $data['priceSale'];
                $query->orWhere('priceSale', 'LIKE', "%{$desc}%");
            }
        })
        ->orderBy('id', 'desc')
        ->get();

        return view('admin.products.index', compact('products', 'data')); 
    }
}
