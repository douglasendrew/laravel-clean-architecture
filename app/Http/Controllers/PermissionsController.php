<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserPermissionRequest;
use App\Services\PermissionsServices;
use Exception;
use Illuminate\Http\Request;

class PermissionsController extends Controller
{
    /**
     * Create a new controller instance.
     * @return void
     */
    public function __construct(
        public PermissionsServices $permissionsService
    )
    {
        $this->middleware('auth');
    }

    /**
     * Home das permissoes
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function permissions_list() {
        return view('permissions.list', [
            'users' => $this->permissionsService->getUsersPermissions()
        ]);
    }   

    /**
     * Criar uma nova permissão
     */
    public function new_permission(UserPermissionRequest $request) { 
        try {
            $this->permissionsService->createANewPermissionUser($request->all());   

            return redirect()
                ->route('permissions.list')
                ->with('success', 'Usuário cadastrado com sucesso');
        } catch (Exception $e) {    
            return redirect()
                ->route('permissions.list')
                ->withErrors('Não foi possível cadastrar o usuário solicitado');
        }
    }

    /**
     * Deleta a permissão (usuário) do banco de dados
     */
    public function deletePermission(Request $request) {
        try {
            $this->permissionsService->deletePermissionUser($request->all());   

            return redirect()
                ->route('permissions.list')
                ->with('success', 'Usuário deletado com sucesso');
        } catch (Exception $e) {    
            return redirect()
                ->route('permissions.list')
                ->withErrors('Não foi possível deletar o usuário solicitado');
        }
    }


    /**
     * Deleta a permissão (usuário) do banco de dados
     */
    public function updatePermission(UserPermissionRequest $request, $user_id) {
        try {
            $this->permissionsService->updatePermissionUser($request->all(), $user_id);   

            return redirect()
                ->route('permissions.list')
                ->with('success', 'Usuário alterado com sucesso');
        } catch (Exception $e) {    
            return redirect()
                ->route('permissions.list')
                ->withErrors('Não foi possível alterar o usuário solicitado');
        }
    }
}
