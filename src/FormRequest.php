<?php

namespace Bfg\Request;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

/**
 * Class FormRequest
 * @package Bfg\Request
 */
class FormRequest extends \Illuminate\Foundation\Http\FormRequest
{
    /**
     * Sets true only after successfully of save
     * @var bool
     */
    public $saved = false;

    /**
     * Model
     * @var string
     */
    protected $model;

    /**
     * Model getter
     * @return string
     */
    public function model()
    {
        return $this->model;
    }

    /**
     * Save any model with condition and request transform
     * @param  callable|bool  $condition
     * @param  Model|Relation|Builder|string  $model
     * @return bool|Builder|Model|Relation|\Illuminate\Support\Collection|mixed|string|void
     * @throws \Throwable
     */
    public function saveIf(callable|bool $condition, Model|Relation|Builder|string $model)
    {
        $condition = is_callable($condition) ? embedded_call($condition) : $condition;
        return !!$condition ? $this->save($model) : false;
    }

    /**
     * Save any model with request transform
     * @param  Model|Relation|Builder|string  $model
     * @return bool|Builder|Model|Relation|\Illuminate\Support\Collection|mixed|string|void
     */
    public function save(Model|Relation|Builder|string $model)
    {
        $return = \BlessModel::do($model, $this->transform());
        $this->saved = !!$return;
        return $return;
    }

    /**
     * Transform and get a request validation result
     * @return array
     */
    public function transform(): array
    {
        return $this->transformation($this->validated());
    }

    /**
     * Transformation callback for request validation result
     * @param  array  $validated
     * @return array
     */
    protected function transformation(array $validated): array {

        return $validated;
    }
}
