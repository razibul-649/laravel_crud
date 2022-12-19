<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
	private $status;
	private $products, $product;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('product.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, [
        'name' => 'required|string|max:255',
        'description' => 'required|string|max:500',
        'price' => 'required',
        'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
      ]);
			$this->status = Product::newProduct($request);
			
			if($this->status) {
				return redirect('/product/add')
					->with('message', [
						'status' => $this->status,
						'msg' => 'Product info save successfully.'
					]);
			} else {
				return redirect('/product/add')->with('message', [
					'status' => $this->status,
					'msg' => 'Product not saved.'
				]);				
			}
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
			$this->product = Product::find($id);
			// echo "<pre>";
			// var_dump($this->product);
			return view('product.edit', ['product' => $this->product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      // return $request->all();
			$this->status = Product::updateProduct($request, $id);
			if($this->status) {
				return redirect('/product/manage')->with('message', [
          'status' => $this->status,
          'msg' => 'Product info updated successfully.'
        ]);
			} else {
				return redirect('/product/manage')->with('message', [
					'status' => $this->status,
					'msg' => 'Product update Failed.'
				]);				
			}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $this->status = Product::deleteProduct($id);
      if($this->status) {
				return redirect('/product/manage')->with('message', [
          'status' => $this->status,
          'msg' => 'Product Delete successfully.'
        ]);
			} else {
				return redirect('/product/manage')->with('message', [
					'status' => $this->status,
					'msg' => 'Product delete Failed.'
				]);				
			}
    }

    public function manage()
    {
      $this->products = Product::all();
			// echo "<pre>";
			// foreach($this->products as $product) {
			// 	var_dump($product);
			// }
      return view('product.manage', ['products' => $this->products]);
    }

    public function js()
    {
      return view('js');
    }
}
