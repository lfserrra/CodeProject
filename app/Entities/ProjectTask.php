<?php

namespace CodeProject\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class ProjectTask extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'name',
        'project_id',
        'start_date',
        'due_date',
        'status'
    ];

    protected $dates = ['start_date', 'due_date'];

    public function project()
    {
        return $this->belongsTo(\CodeProject\Entities\Project::class);
    }
}
