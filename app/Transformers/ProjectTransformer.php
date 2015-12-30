<?php
namespace CodeProject\Transformers;

use CodeProject\Entities\Project;
use League\Fractal\TransformerAbstract;

class ProjectTransformer extends TransformerAbstract {

    protected $defaultIncludes = ['members', 'notes', 'tasks'];

    public function transform(Project $model)
    {
        return [
            'project_id'  => $model->id,
            'client_id'   => $model->client_id,
            'owner_id'    => $model->owner_id,
            'name'        => $model->name,
            'description' => $model->description,
            'progress'    => $model->progress,
            'status'      => $model->status,
            'due_date'    => $model->due_date,
            'members'     => $model->members,
            'notes'       => $model->notes,
            'tasks'       => $model->tasks
        ];
    }

    public function includeMembers(Project $project)
    {
        return $this->collection($project->members, new ProjectMemberTransformer());
    }

    public function includeNotes(Project $project)
    {
        return $this->collection($project->notes, new ProjectNoteTransformer());
    }

    public function includeTasks(Project $project)
    {
        return $this->collection($project->tasks, new ProjectTaskTransformer());
    }
}