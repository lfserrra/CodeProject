<?php
namespace CodeProject\Validators;

use Prettus\Validator\LaravelValidator;

class ProjectValidator extends LaravelValidator {

    protected $rules = [
        'owner_id'  => 'required|integer|exists:users,id',
        'client_id' => 'required|integer|exists:clients,id',
        'name'      => 'required|max:255',
        'progress'  => 'required|integer|min:0|git comax:100',
        'status'    => 'required|integer|min:1|max:3',
        'due_date'  => 'required|date',
    ];
}