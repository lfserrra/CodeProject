<?php
namespace CodeProject\Transformers;

use CodeProject\Entities\ProjectTask;
use League\Fractal\TransformerAbstract;

class ProjectTaskTransformer extends TransformerAbstract {

    public function transform(ProjectTask $model)
    {
        return [
            'project_id' => $model->project_id,
            'id'         => $model->id,
            'name'       => $model->name,
            'start_date' => $model->start_date,
            'due_date'   => $model->due_date,
            'status'     => $model->status,
        ];
    }
}