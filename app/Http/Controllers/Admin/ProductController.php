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
                    ->paginate(5);

        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create', compact('product', 'ncms', 'categories', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StoreUpdateProductFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateProductFormRequest $request)
    {
        $product = $this->product->create($request->all());

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
        //$product = Product::find($id);

       $product = Product::where('id', $id)->first();

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

        return view('admin.products.edit', compact('product', 'ncms', 'categories', 'brands'));
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
        $product = $this->product->find($id);

        $product->update($request->all());

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

        return redirect()
                    ->route('products.index')
                    ->withSuccess('Produto deletado com sucesso!');
    }

    public function search(Request $request)
    {
        $filters = $request->except('_token');

        $products = $this->product
                            ->with('category')
                            ->where(function($query) use ($request) {
                                
                                if($request->name) {
                                    $filter = $request->name;
                                    $query->where(function($querySub) use ($filter) {
                                        $querySub->where('name', 'LIKE', "%{$filter}%")
                                                        ->orWhere('code', 'LIKE', "%{$filter}%");
                                    });
                                    
                                }
                                if($request->pricePurchase) {
                                    $filter = $request->pricePurchase;
                                    $query->where(function($querySub) use ($filter) {
                                        $querySub->where('pricePurchase', 'LIKE', "%{$filter}%")
                                                        ->orWhere('priceSale', 'LIKE', "%{$filter}%");
                                    });
                                    
                                }
                                if($request->category) {
                                    $query->orWhere('category_id', $request->category);
                                }
                                if($request->ncm) {
                                    $query->orWhere('ncm_id', $request->ncm);
                                }
                                if($request->brand) {
                                    $query->orWhere('brand_id', $request->brand);
                                }
                        })
                        ->paginate(5);

        return view('admin.products.index', compact('products', 'filters')); 
    }
}
