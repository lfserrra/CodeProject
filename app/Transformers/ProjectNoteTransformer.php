<?php
namespace CodeProject\Transformers;

use CodeProject\Entities\ProjectNote;
use League\Fractal\TransformerAbstract;

class ProjectNoteTransformer extends TransformerAbstract {

    public function transform(ProjectNote $model)
    {
        return [
            'project_id' => $model->project_id,
            'id'         => $model->id,
            'title'      => $model->title,
            'note'       => $model->note,
        ];
    }
}