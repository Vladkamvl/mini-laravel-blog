<?php


namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

abstract class CoreRepository
{

    /**
     * @var Model
     */
    protected $model;

    /**
     * CoreRepository constructor.
     */
    public function __construct(){
        $this->model = app($this->getModelClass());
    }

    /**
     * @return string
     */
    abstract protected function getModelClass();

    /**
     * @return \Illuminate\Contracts\Foundation\Application|Model|mixed
     */
    public function startCondition(){
        return clone $this->model;
    }
}
