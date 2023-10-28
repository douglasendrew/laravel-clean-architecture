<?php

namespace App\Http\Controllers;

use App\Http\Requests\LocalRequest;
use App\Services\LocalServices;
use Illuminate\Http\Request;
use Exception;

class LocalController extends Controller
{
    /**
     * Create a new controller instance.
     * @return void
     */
    public function __construct(
        public LocalServices $localServices
    )
    {
        $this->middleware('auth');
    }

    /**
     * Home dos locais
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function locais() {
        return view('locais.list', [
            'locais' => $this->localServices->getUsersLocais()
        ]);
    }   

    /**
     * Criar um novo local
     */
    public function insertNewLocal(LocalRequest $localRequest) {
        try {
            $this->localServices->createANewLocal($localRequest->all());

            return redirect()
                ->route('locais.list')
                ->with('success', 'Local criado com sucesso');
        } catch (Exception) {
            return redirect()
                ->route('locais.list')
                ->withErrors('Não foi possível cadastrar o local solicitado');
        }
    }

    /**
     * Deletar um local
     */
    public function deleteLocal(Request $request) {
        try {
            $this->localServices->deleteLocal($request->all());
            
            return redirect()
                ->route('locais.list')
                ->with('success', 'Local excluido com sucesso');
        } catch (Exception) {
            return redirect()
                ->route('locais.list')
                ->withErrors('Não foi possível excluir o local solicitado');
        }
    }

    /**
     * Criar um novo local
     */
    public function updateLocal(LocalRequest $localRequest, $id_local) {
        try {
            $this->localServices->updateLocal($localRequest->all(), $id_local);

            return redirect()
                ->route('locais.list')
                ->with('success', 'Local atualizado com sucesso');
        } catch (Exception) {
            return redirect()
                ->route('locais.list')
                ->withErrors('Não foi possível atualizar o local solicitado');
        }
    }
}
