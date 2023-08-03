<?php

namespace App\Http\Controllers;

use App\Models\Tipo;
use App\Http\Requests\StoreTipoRequest;
use App\Http\Requests\UpdateTipoRequest;

class TipoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Solicitar os dados que estão disponiveis do banco de dados
        $tipos = Tipo::all();

        // Retorna as Tipos em formato JSON
        return response()->json($tipos);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTipoRequest $request)
    {
        // Cria uma nova Tipo com os dados recebidos
        $tipo = Tipo::create($request->all());
        return response()->json($tipo, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Encontra uma tipo pelo ID e retorna em formato JSON
        $tipo = Tipo::find($id);

        if (!$tipo) {
            return response()->json(['message' => 'Tipo nao encontrado'], 404);
        }
        return response()->json($tipo);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTipoRequest $request, $id)
    {
        // Encontra a tipo pelo ID
        $tipo = Tipo::find($id);

        if (!$tipo) {
            return response()->json(['message' => 'Tipo não encontrado'], 404);
        }

        // Atualiza os dados da tipo
        $tipo->update($request->all());

        return response()->json($tipo);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Encontra a Tipo pelo ID
        $tipo = Tipo::find($id);

        if (!$tipo) {
            return response()->json(['message' => 'Tipo não encontrada'], 404);
        }

        // Deleta a Tipo
        $tipo->delete();

        return response()->json(['message' => 'Tipo deletado com sucesso'], 200);
    }
}
