<?php
namespace CodeProject\Validators;

use Prettus\Validator\LaravelValidator;

class ProjectTaskValidator extends LaravelValidator {

    protected $rules = [
        'project_id' => 'required|integer|exists:projects,id',
        'name'       => 'required|max:255',
        'start_date' => 'required|date',
        'due_date'   => 'required|date',
        'status'     => 'required|integer|min:1|max:3'
    ];
}