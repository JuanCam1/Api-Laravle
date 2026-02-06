<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoriaController extends Controller
{
    public function index()
    {
        $categoria = Categoria::all();

        if ($categoria->isEmpty()) {
            $data = [
                'message' => 'No se encontraron categorias',
                'status' => 200
            ];
            return response()->json($data, 404);
        }

        $data = [
            'categoria' => $categoria,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'Error en la validación de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        $categoria = Categoria::create([
            'name' => $request->name,
        ]);

        if (!$categoria) {
            $data = [
                'message' => 'Error al crear la categoria',
                'status' => 500
            ];
            return response()->json($data, 500);
        }

        $data = [
            'categoria' => $categoria,
            'status' => 201
        ];

        return response()->json($data, 201);

    }

    public function show($id)
    {
        $categoria = Categoria::find($id);

        if (!$categoria) {
            $data = [
                'message' => 'Categoria no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'categoria' => $categoria,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    public function destroy($id)
    {
        $categoria = Categoria::find($id);

        if (!$categoria) {
            $data = [
                'message' => 'Categoria no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        
        $categoria->delete();

        $data = [
            'message' => 'Categoria eliminado',
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    public function update(Request $request, $id)
    {
        $categoria = Categoria::find($id);

        if (!$categoria) {
            $data = [
                'message' => 'Categoria no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'Error en la validación de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        $categoria->name = $request->name;
        $categoria->save();

        $data = [
            'message' => 'Categoria actualizado',
            'categoria' => $categoria,
            'status' => 200
        ];

        return response()->json($data, 200);

    }

    public function updatePartial(Request $request, $id)
    {
        $categoria = Categoria::find($id);

        if (!$categoria) {
            $data = [
                'message' => 'Categoria no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'max:255',
        ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'Error en la validación de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ]; 
            return response()->json($data, 400);
        }

        if ($request->has('name')) {
            $categoria->name = $request->name;
        }

        $categoria->save();

        $data = [
            'message' => 'Categoria actualizado',
            'categoria' => $categoria,
            'status' => 200
        ];

        return response()->json($data, 200);
    }
}
