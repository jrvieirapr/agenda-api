<?php

namespace App\Http\Controllers;

use App\Models\Tarefa;
use App\Http\Requests\StoreTarefaRequest;
use App\Http\Requests\UpdateTarefaRequest;

class TarefaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retorna todas as tarefas em formato JSON
        $tarefas = Tarefa::all();
        return response()->json($tarefas);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTarefaRequest $request)
    {
         // Cria uma nova tarefa com os dados recebidos
         $tarefa = Tarefa::create($request->all());

         return response()->json($tarefa, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Encontra uma tarefa pelo ID e retorna em formato JSON
        $tarefa = Tarefa::find($id);

        if (!$tarefa) {
            return response()->json(['message' => 'Tarefa não encontrada'], 404);
        }

        return response()->json($tarefa);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tarefa $tarefa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTarefaRequest $request, $id)
    {
        // Encontra a tarefa pelo ID
        $tarefa = Tarefa::find($id);

        if (!$tarefa) {
            return response()->json(['message' => 'Tarefa não encontrada'], 404);
        }

        // Atualiza os dados da tarefa
        $tarefa->update($request->all());

        return response()->json($tarefa);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
       // Encontra a tarefa pelo ID
       $tarefa = Tarefa::find($id);

       if (!$tarefa) {
           return response()->json(['message' => 'Tarefa não encontrada'], 404);
       }

       // Deleta a tarefa
       $tarefa->delete();

       return response()->json(['message' => 'Tarefa deletada com sucesso'], 200);
    }
}
