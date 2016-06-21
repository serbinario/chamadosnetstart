<?php

namespace Serbinario\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Serbinario\Validators\ServicoValidator;
use Serbinario\Repositories\ServicoRepository;
use Serbinario\Entities\Servico;

/**
 * Class ServicoRepositoryEloquent
 * @package namespace App\Repositories;
 */
class ServicoRepositoryEloquent extends BaseRepository implements ServicoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Servico::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

         return ServicoValidator::class;
    }



    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
