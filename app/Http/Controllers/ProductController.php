<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\SpladeTable; 

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()

    {
        return view('dashboard.product.index',[
            'products'=>SpladeTable::for(product::class)
            ->column('image',sortable:true)
            ->column('name',sortable:true)
            ->withGlobalSearch(columns: ['name', 'description'])
            ->column('description',sortable:true,hidden: true)
             ->column('price',sortable:true)
             ->column('stock',sortable:true)
             ->column('action')
             ->column('created_at', sortable: true, hidden: true)
             ->paginate(15)]);

        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(product $product)
    {
        $product->delete();
        Splade::toast('Role deleted')->autoDismiss(3);

        return back();

    }
}
