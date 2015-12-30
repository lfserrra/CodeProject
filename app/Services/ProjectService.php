<?php

namespace CodeProject\Services;

use CodeProject\Repositories\ProjectMembersRepository;
use CodeProject\Repositories\ProjectRepository;
use CodeProject\Validators\ProjectMembersValidator;
use CodeProject\Validators\ProjectValidator;


class ProjectService extends AbstractService {

    /**
     * @var ProjectMembersValidator
     */
    private $membersValidator;
    /**
     * @var ProjectMembersRepository
     */
    private $membersRepository;

    /**
     * @param ProjectRepository        $repository
     * @param ProjectValidator         $validator
     * @param ProjectMembersRepository $membersRepository
     * @param ProjectMembersValidator  $membersValidator
     */
    public function __construct(ProjectRepository $repository, ProjectValidator $validator, ProjectMembersRepository $membersRepository, ProjectMembersValidator $membersValidator)
    {
        $this->repository        = $repository;
        $this->validator         = $validator;
        $this->membersRepository = $membersRepository;
        $this->membersValidator  = $membersValidator;
    }

    public function addMember($id, $userId)
    {
        try
        {
            $data = ['project_id' => $id, 'user_id' => $userId];
            $this->membersValidator->with($data)->passesOrFail();

            return $this->membersRepository->create($data);
        }
        catch (ValidatorException $e)
        {
            return [
                'error'   => true,
                'message' => $e->getMessageBag()
            ];
        }
    }

    public function removeMember($membersId)
    {
        try
        {
            $this->membersRepository->delete($membersId);
        }
        catch (ValidatorException $e)
        {
            return [
                'error'   => true,
                'message' => $e->getMessageBag()
            ];
        }
    }
}