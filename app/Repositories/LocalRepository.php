<?php
namespace App\Repositories;

use App\Models\Local;

class LocalRepository {

    /**
     * Pesquisar todos locais e pagina-los em grupos de 10
     * @return Local
     */
    public function getAllLocais()
    {
        return Local::paginate(10);
    }

    /**
     * Criar um novo local
     * @return Local
     */
    public function createNewLocal($data)
    {
        return Local::insert([
            'local_cep'     => $data['local_cep'],
            'local_city'    => $data['local_cidade'],
            'local_address' => $data['local_rua'],
            'local_number'  => $data['local_numero'],
            'local_name'    => $data['local_nome']
        ]);
    }
   
    /**
     * Deletar um local
     * @return Local
     */
    public function deleteALocal($data)
    {
        return Local::where('id', $data['id'])
            ->delete();
    }

    /**
     * Atualziar um local
     * @return Local
     */
    public function updateLocal($data, $id_local)
    {
        return Local::where('id', $id_local)  
            ->update([
                'local_cep'     => $data['local_cep'],
                'local_city'    => $data['local_cidade'],
                'local_address' => $data['local_rua'],
                'local_number'  => $data['local_numero'],
                'local_name'    => $data['local_nome']
            ]);
    }
}