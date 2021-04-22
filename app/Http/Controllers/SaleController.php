<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\SaleRepositoryInterface;
use App\Http\Requests\SaleRequest;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    protected $ISaleRepository;

    public function __construct()
    {
        $this->ISaleRepository = app(SaleRepositoryInterface::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->ISaleRepository->list($request);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\SaleRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaleRequest $request)
    {
        $this->ISaleRepository->store($request);
        return Response()->json(['message'=>'Venda Concluida com sucesso!'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->ISaleRepository->show($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\SaleRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SaleRequest $request, $id)
    {
        $this->ISaleRepository->update($request, $id);
        return Response()->json('Venda Alterada com sucesso!', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->ISaleRepository->deleteById($id);
        return Response()->json('Venda Excluida com sucesso!', 200);
    }
}
