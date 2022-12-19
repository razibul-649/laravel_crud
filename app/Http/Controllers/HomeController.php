<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
	private $products, $product;
	public function index()
	{
		$this->products = Product::orderBy('id', 'DESC')->get();
		return view('home.index', ['products' => $this->products]);
	}

	public function details($id)
	{
		$this->product = Product::find($id);
		return view('home.details', ['product' => $this->product ]);
	}
}
