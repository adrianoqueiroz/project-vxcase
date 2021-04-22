<?php

namespace App\Repositories;

use App\Models\Product;
use App\Repositories\Contracts\ProductRepositoryInterface;
use Illuminate\Http\Request;

class ProductRepository implements ProductRepositoryInterface
{
    /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function list(Request $request)
  {
      if(isset($request->product_name))
          $query = strtoupper($request->product_name);
          return Product::where('name','LIKE','%'.$query.'%')
                      ->orWhere('reference','LIKE','%'.$query.'%')->get();

      return Product::all();
  }

  public function store(Request $request) 
  {
    $product = new Product;
    return $product->create($request->all());
  }

  public function update(Request $request, $id) 
  {
    $product = Product::find($id);
    $product->name = $request->name;
    $product->reference = $request->reference;
    $product->price = $request->price;
    $product->delivery_days = $request->delivery_days;
    return $product->save();
  }

  public function findById($id)
  {
    return Product::find($id);

  }

  public function deleteById($id) 
  {
    $product = Product::find($id);
    return $product->delete();
  }
}