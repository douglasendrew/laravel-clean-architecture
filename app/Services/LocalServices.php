<?php 

namespace App\Services;

use App\Models\Local;
use App\Repositories\LocalRepository;

class LocalServices {
    
    public function __construct(
        public LocalRepository $localRepository
    ) { }

    /**
     * Chama o repository onde faz a consulta de todos locais
     * @return Local
     */
    public function getUsersLocais() { 
        return $this->localRepository->getAllLocais();
    }

    public function createANewLocal($data)  {
        return $this->localRepository->createNewLocal($data);
    }

    public function deleteLocal($data)  {
        return $this->localRepository->deleteALocal($data);
    }

    public function updateLocal($data, $id_local)  {
        return $this->localRepository->updateLocal($data, $id_local);
    }
}