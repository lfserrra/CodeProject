<?php

namespace CodeProject\Services;

use Prettus\Validator\Exceptions\ValidatorException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

abstract class AbstractService {

    /**
     * @var ClientRepository
     */
    protected $repository;
    /**
     * @var ClientValidator
     */
    protected $validator;

    public function create(Array $data)
    {
        try
        {
            $this->validator->with($data)->passesOrFail();

            return $this->repository->create($data);
        }
        catch (ValidatorException $e)
        {
            return [
                'error'   => true,
                'message' => $e->getMessageBag()
            ];
        }
    }

    public function update(Array $data, $id)
    {
        try
        {
            $this->validator->with($data)->passesOrFail();

            return $this->repository->update($data, $id);
        }
        catch (ValidatorException $e)
        {
            return [
                'error'   => true,
                'message' => $e->getMessageBag()
            ];
        }
        catch (ModelNotFoundException $e)
        {
            return [
                'error'   => true,
                'message' => $e->getMessage()
            ];
        }
    }

    public function delete($id)
    {
        try
        {
            $this->repository->delete($id);
        }
        catch (ModelNotFoundException $e)
        {
            return [
                'error'   => true,
                'message' => $e->getMessage()
            ];
        }
    }
}