<?php

namespace Seracademico\Services;

use Seracademico\Repositories\EmpresaRepository;
use Seracademico\Entities;

class EmpresaService
{
    /**
     * @var EmpresaRepository
     */
    private $repository;

    /**
     * @param EmpresaRepository $repository
     */
    public function __construct(EmpresaRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param $id
     * @return mixed
     * @throws \Exception
     */
    public function find($id)
    {
        #Recuperando o registro no banco de dados
        $empresas = $this->repository->find($id);

        #Verificando se o registro foi encontrado
        if(!$empresas) {
            throw new \Exception('Empresa não encontrada!');
        }

        #retorno
        return $empresas;
    }

    /**
     * @param array $data
     * @return array
     */
    public function store(array $data) : Aluno
    {
        #Salvando o registro pincipal
        $empresas =  $this->repository->create($data);

        #Verificando se foi criado no banco de dados
        if(!$empresas) {
            throw new \Exception('Ocorreu um erro ao cadastrar!');
        }

        #Retorno
        return $empresas;
    }

    /**
     * @param array $data
     * @param int $id
     * @return mixed
     */
    public function update(array $data, int $id) : Empresa
    {
        #Atualizando no banco de dados
        $empresas = $this->repository->update($data, $id);


        #Verificando se foi atualizado no banco de dados
        if(!$empresas) {
            throw new \Exception('Ocorreu um erro ao cadastrar!');
        }

        #Retorno
        return $empresas;
    }

    /**
     * @param array $models
     * @return array
     */
    public function load(array $models) : array
    {
        #Declarando variáveis de uso
        $result = [];

        #Criando e executando as consultas
        foreach ($models as $model) {
            #qualificando o namespace
            $nameModel = "Seracademico\\Entities\\$model";

            #Recuperando o registro e armazenando no array
            $result[strtolower($model)] = $nameModel::lists('nome', 'id');
        }

        #retorno
        return $result;
    }
}