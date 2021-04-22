<?php

namespace App\Repositories;

use App\Models\Sale;
use App\Repositories\Contracts\SaleRepositoryInterface;
use App\Http\Requests\SaleRequest;
use Illuminate\Http\Request;
use Carbon\Carbon;

class SaleRepository implements SaleRepositoryInterface
{
    /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function list(Request $request)
  {
    if(isset($request->per_page))
      $per_page = $request->per_page;
    else 
        $per_page = 20;

    return Sale::with('products:name,delivery_days')->paginate($per_page);
  }

  public function store(SaleRequest $request)
  {
        // $validator = Validator::make($request->all(),[
        //     'purchase_at' => 'required|date|before:tomorrow',
        //     'delivery_days' => 'required',
        //     'amount' => 'required',
        //     'products'=>'required',
        // ]);
        
        // if ($validator->fails() || true) {
        //   return response()->json(['errors'=>$validator->errors()], 422);
        // }
    
        $sale = new Sale;
        $sale->purchase_at = Carbon::parse($request->purchase_at);
        $sale->amount = $request->amount;
        $sale->delivery_days = $request->delivery_days;
        $sale->save();
        $sale->products()->sync($request->products);
  }

  public function show($id)
  {
    return Sale::with('products:name,delivery_days')->find($id);
  }

  public function update(Request $request, $id)
  {
    $sale = Sale::find($id);
    $sale->purchase_at = Carbon::parse($request->purchase_at);
    $sale->save();

    $sale->products()->sync($request->products);
  }

  public function deleteById($id)
  {
    $sale = Sale::find($id);
    $sale->products()->detach();
    return $sale->delete();
  }
}