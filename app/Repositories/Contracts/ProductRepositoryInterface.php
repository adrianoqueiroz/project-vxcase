<?php

namespace App\Repositories\Contracts;

use Illuminate\Http\Request;

interface ProductRepositoryInterface
{
  public function list(Request $request);
  public function store(Request $request);
  public function update(Request $request, $id);
  public function findById($id);
  public function deleteById($id);
}