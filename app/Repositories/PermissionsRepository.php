<?php
namespace App\Repositories;

use App\Models\User;

class PermissionsRepository {
    public function __construct() { }

    /**
     * Faz a consulta no banco de todos usuários
     * @return \App\Models\User
     */
    public function usersPermissions() {
        return User::paginate(10);
    }

    /**
     * Cria um novo usuário com a permissão setada pelo cadastro
     * @return \App\Models\User
     */
    public function createUserPermission($data) {
        return User::insert([
            'email' => $data['email'],
            'password'=> bcrypt('123'),
            'permission_level' => $data['funcao'],
            'name' => $data['nome']
        ]);
    }

    /**
     * Cria um novo usuário com a permissão setada pelo cadastro
     * @return \App\Models\User
     */
    public function deleteUserPermission($data) {
        return User::where('id', $data['id'])
            ->delete();
    }

    /**
     * Atualiza um usuário com as informações informadas pelo formulário
     * @return \App\Models\User
     */
    public function updateUserPermission($data, $user_id) {
        return User::where('id', $user_id)
            ->update([
                'email' => $data['email'],
                'password'=> bcrypt('123'),
                'permission_level' => $data['funcao'],
                'name' => $data['nome']
            ]);
    }
}