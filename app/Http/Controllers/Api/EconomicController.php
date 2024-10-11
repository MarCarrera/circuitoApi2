<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Economic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;



class EconomicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $economics = Economic::all();

        if($economics->count() >0){
            return response()->json([
                'status' => 200,
                'data' => $economics
            ], 200);
        }else{
            return response()->json([
                'status' => 404,
                'data' => 'Sin datos para mostrar'
            ], 404);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'Id'=>'required|string|max:191',
            'Name'=>'required|string|max:191',
        ]);

        if($validator->fails()){
            return response()->json([
                'status'=>422,
                'errors'=>$validator->errors()

            ],422);
        }else{
            $economic = Economic::create([
                'Id'=>$request->Id,
                'Name'=>$request->Name,
            ]);

            if($economic){
                return response()->json([
                    'status'=>200,
                    'message'=>'Agregado'
                ], 200);
            }else{
                return response()->json([
                    'status'=>500,
                    'message'=>'Registro no agregado'
                ], 500);
            }

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  string  $Name //-------------------tipo de dato 
     * @return \Illuminate\Http\Response
     */
    //mostrar un registro especifico
    public function show($name)
{
    $economic = Economic::where('Name', $name)->first();

    if ($economic) {
        return response()->json([
            'status' => 200,
            'data' => $economic
        ], 200);
    } else {
        return response()->json([
            'status' => 404,
            'message' => 'Registro no encontrado'
        ], 404);
    }
}


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'Name' => 'required|string|max:191'
        ]);
            if($validator->fails()){
                return response()->json([
                    'status'=>422,
                    'errors'=>$validator->errors(  )
                ], 422);
            }else{
                $economic = Economic::find($id);
                
                if($economic){
                    $economic->update([
                        'Name'=>$request->Name,
                    ]);
                    return response()->json([
                        'status'=>200,
                        'message'=>'Actualizado'
                    ], 200);
                }else{
                    return response()->json([
                        'status'=>404,
                        'message'=>'Registro no encontrado'
                    ], 404);
                }
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
        //
    }
}
