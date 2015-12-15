<?php

namespace CodeProject\Http\Controllers;

use CodeProject\Http\Requests;
use CodeProject\Repositories\ProjectMembersRepository;
use CodeProject\Repositories\ProjectRepository;
use CodeProject\Services\ProjectService;

class ProjectsController extends Controller {

    use TraitController;
    /**
     * @var ProjectMembersRepository
     */
    private $membersRepository;

    /**
     * @param ProjectRepository        $repository
     * @param ProjectService           $service
     * @param ProjectMembersRepository $membersRepository
     */
    public function __construct(ProjectRepository $repository, ProjectService $service, ProjectMembersRepository $membersRepository)
    {
        $this->repository        = $repository;
        $this->service           = $service;
        $this->membersRepository = $membersRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return $this->repository->with(['owner', 'client'])->all();
    }

    public function members($id)
    {
        return $this->repository->find($id)->members;
    }

    public function addMember($id, $userId)
    {
        return $this->service->addMember($id, $userId);
    }

    public function removeMember($id, $membersId)
    {
        return $this->service->removeMember($membersId);
    }

    public function isMember($id, $userId)
    {
        return $this->service->isMember($id, $userId);
    }
}
