<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  use HasFactory;
	private static $product, $image, $directory, $imageName, $imageUrl;
	private static $is_save;

	public static function getImageUrl($request)
	{
		self::$image = $request->file('image');
		self::$imageName = self::$image->getClientOriginalName();
		self::$directory = 'assets/img/product-image/';
		self::$image->move(self::$directory, self::$imageName);

		return self::$directory . self::$imageName;
	}

	public static function newProduct($request)
	{
		self::$product = new Product();
		self::$product->name = $request->name;
		self::$product->description = $request->description;
		self::$product->price = $request->price;
		if($request->file('image')) {
			self::$product->image = self::getImageUrl($request);
		} else {
			self::$product->image = '';
		}
		self::$is_save = self::$product->save();
		
		return self::$is_save;
	}

	public static function updateProduct($request, $id)
	{
		self::$product = Product::find($id);
		if($request->file('image')) {
			if(file_exists(self::$product->image))
			{
				unlink(self::$product->image);
			}
			self::$imageUrl = self::getImageUrl($request);
		}
		else
		{
			self::$imageUrl = self::$product->image;
		}

		self::$product->name = trim($request->name);
		self::$product->description = trim($request->description);
		self::$product->price = trim($request->price);
		self::$product->image = self::$imageUrl;
		self::$is_save = self::$product->save();
		return self::$is_save;
	}

	public static function deleteProduct($id)
	{
		self::$product = Product::find($id);
		if(file_exists(self::$product->image))
		{
			unlink(self::$product->image);
		}

		self::$is_save = self::$product->delete();
		return self::$is_save;
	}
}
