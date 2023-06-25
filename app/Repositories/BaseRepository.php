<?php
namespace App\Repositories;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository
{
    public $model;


    public function __construct()
    {
        $this->makeModel();
    }

    /**
     * Retrieve all data of repository
     * @return Collection|Model[] `
     */
    public function all()
    {
        return $this->model->all();
    }

    /**
     * Retrieve all data of repository, paginated
     * @param null $limit
     * @param array $columns
     * @return mixed
     */
    public function paginate($limit = null, array $columns = ['*'])
    {
        $limit = is_null($limit) ? config('repository.pagination.limit', 10) : $limit;

        return $this->model->paginate($limit, $columns);
    }

    /**
     * Find data by id
     * @param $id
     * @param array $columns
     * @return
     */
    public function find($id, array $columns = ['*'])
    {
        return $this->model->findOrFail($id, $columns);
    }

    public function findWithoutRedirect($id, $columns = ['*'])
    {
        return $this->model->find($id, $columns);
    }

    public function findOrFail($id, $columns = ['*'])
    {
        return $this->model->findOrFail($id);
    }

    public function findOrFailWithTrashed($id, $columns = ['*'])
    {
        return $this->model->withTrashed()->findOrFail($id);
    }

    /**
     * Save a new entity in repository
     * @param array $input
     * @return mixed
     */
    public function create(array $input)
    {
        return $this->model->create($input);
    }

    /**
     * Update a entity in repository by id
     * @param array $input
     * @param $id
     * @return BaseRepository
     */
    public function update(array $input, $id): BaseRepository
    {
        $model = $this->model->findOrFail($id);
        $model->fill($input);
        $model->save();

        return $model;
    }

    /**
     * Delete a entity in repository by id
     *
     * @param $id
     *
     * @return int
     */
    public function delete($id): int
    {
        return $this->model->destroy($id);
    }

    public function multipleDelete(array $ids)
    {
        return $this->model->destroy(array_values($ids));
    }

    public function latest($id)
    {
        return $this->model->latest('id');
    }

    abstract public function model();


    public function makeModel(): void
    {
        $this->model = app()->make($this->model());
    }

    public function updateOrCreate(array $arrayFind, $arrayCreate = ['*'])
    {
        return $this->model->updateOrCreate($arrayFind, $arrayCreate);
    }

    public function insertMany($data)
    {
        return count($data) > 0 ? $this->model->insert($data) : null;
    }
}


