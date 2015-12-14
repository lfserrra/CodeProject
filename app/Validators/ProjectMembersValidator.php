<?php
namespace CodeProject\Validators;

use Prettus\Validator\LaravelValidator;

class ProjectMembersValidator extends LaravelValidator {

    protected $rules = [
        'project_id' => 'required|integer|exists:projects,id',
        'user_id'    => 'required|integer|exists:users,id',
    ];
}