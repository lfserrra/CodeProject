<?php

namespace CodeProject\Http\Controllers;

use CodeProject\Repositories\ProjectTaskRepository;
use CodeProject\Services\ProjectTaskService;
use Illuminate\Http\Request;

class ProjectTasksController extends Controller {

    /**
     * @var ProjectTaskRepository
     */
    protected $repository;
    /**
     * @var ProjectTaskService
     */
    protected $service;

    /**
     * @param ProjectTaskRepository $repository
     * @param ProjectTaskService    $service
     */
    public function __construct(ProjectTaskRepository $repository, ProjectTaskService $service)
    {
        $this->repository = $repository;
        $this->service    = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @param $id
     * @return Response
     */
    public function index($id)
    {
        return $this->repository->findWhere(['project_id' => $id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store($id, Request $request)
    {
        return $this->service->create(array_merge($request->all(), ['project_id' => $id]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id, $taskId)
    {
        return $this->repository->findWhere(['project_id' => $id, 'id' => $taskId]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request $request
     * @param  int     $id
     * @return Response
     */
    public function update($id, $taskId, Request $request)
    {
        return $this->service->update(array_merge($request->all(), ['project_id' => $id]), $taskId);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id, $taskId)
    {
        return $this->service->delete($taskId);
    }
}
