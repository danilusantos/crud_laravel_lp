<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Exception;
use Illuminate\Http\Request;
use App\Http\Resources\Produto as ProdutoResource;

class ProdutoApiController extends Controller
{
    public function apiFind(Produto $Produto)
    {
        return new ProdutoResource($Produto);
    }

    public function apiAll()
    {
        return ProdutoResource::collection(Produto::all());
    }

    public function apiStore(Request $request)
    {
        try{
            $Produto = Produto::create($request->all());
            return response()->json($Produto, 201);
        } catch (Exception $e){
            return response()->json($e->getMessage(), 400);
        }
    }
    public function apiUpdate(Request $request, Produto $Produto)
    {
        try{
            $Produto->update($request->all());
            return response()->json($Produto, 200);
        } catch(Exception $e){
            return response()->json($e->getMessage(), 400);
        }
    }

    public function apiDelete(Produto $Produto)
    {
        try{
            $Produto->delete();
            return response()->json(null, 204);
        } catch(Exception $e){
            return response()->json($e->getMessage(), 400);
        }
    }
}
