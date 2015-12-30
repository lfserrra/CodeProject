<?php
namespace CodeProject\Transformers;

use CodeProject\Entities\User;
use League\Fractal\TransformerAbstract;

class ProjectMemberTransformer extends TransformerAbstract {

    public function transform(User $model)
    {
        return [
            'user_id' => $model->id,
            'name'    => $model->name,
        ];
    }
}