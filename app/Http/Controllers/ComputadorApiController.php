<?php

namespace App\Http\Controllers;

use App\Models\Computador;
use Exception;
use Illuminate\Http\Request;
use App\Http\Resources\Computador as ComputadorResource;

class ComputadorApiController extends Controller
{
    public function apiFind(Computador $computador)
    {
        return new ComputadorResource($computador);
    }

    public function apiAll()
    {
        return ComputadorResource::collection(Computador::all());
    }

    public function apiStore(Request $request)
    {
        try{
            $computador = Computador::create($request->all());
            return response()->json($computador, 201);
        } catch (Exception $e){
            return response()->json($e->getMessage(), 400);
        }
    }
    public function apiUpdate(Request $request, Computador $computador)
    {
        try{
            $computador->update($request->all());
            return response()->json($computador, 200);
        } catch(Exception $e){
            return response()->json($e->getMessage(), 400);
        }
    }

    public function apiDelete(Computador $computador)
    {
        try{
            $computador->delete();
            return response()->json(null, 204);
        } catch(Exception $e){
            return response()->json($e->getMessage(), 400);
        }
    }
}
