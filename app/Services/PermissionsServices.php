<?php 

namespace App\Services;

use App\Repositories\PermissionsRepository;
use Exception;
use Illuminate\Support\Facades\Auth;

class PermissionsServices {

    public function __construct(
        public PermissionsRepository $permissionsRepository
    ) { }

    /**
     * Chama o repository onde faz a consulta de todos usuários/permissões
     * @return \App\Models\User
     */
    public function getUsersPermissions() { 
        return $this->permissionsRepository->usersPermissions();
    }

    /** 
     * Cria um novo usuário com a permissão setada pelo cadastro
     * @return \App\Models\User
    */
    public function createANewPermissionUser($data) { 
        return $this->permissionsRepository->createUserPermission($data);
    }

    /** 
     * Cria um novo usuário com a permissão setada pelo cadastro
     * @return \App\Models\User
    */
    public function deletePermissionUser($data) { 
        if($data['id'] == Auth::user()->id) {
            return throw new Exception();
        }

        return $this->permissionsRepository->deleteUserPermission($data);
    }

    /** 
     * Edita um usuário com a permissão setada pelo formulário
     * @return \App\Models\User
    */
    public function updatePermissionUser($data, $user_id) { 
        return $this->permissionsRepository->updateUserPermission($data, $user_id);
    }
}