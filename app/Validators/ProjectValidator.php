<?php
namespace CodeProject\Validators;

use Prettus\Validator\LaravelValidator;

class ProjectValidator extends LaravelValidator {

    protected $rules = [
        'owner_id'    => 'required|exists:users,id',
        'client_id'   => 'required|exists:clients,id',
        'name'        => 'required|max:255',
        'description' => 'required|max:255',
        'progress'    => 'required|max:255',
        'status'      => 'required|max:255',
        'due_date'    => 'required|date',
    ];
}