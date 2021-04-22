<?php

namespace App\Repositories\Contracts;

use App\Http\Requests\SaleRequest;
use Illuminate\Http\Request;

interface SaleRepositoryInterface
{
  public function list(Request $request);
  public function store(SaleRequest $request);
  public function show($id);
  public function update(SaleRequest $request, $id);
  public function deleteById($id);
}