<?php

namespace CodeProject\Http\Controllers;

use CodeProject\Repositories\UserRepository;
use Illuminate\Http\Request;

use CodeProject\Http\Requests;
use CodeProject\Http\Controllers\Controller;
use LucaDegasperi\OAuth2Server\Facades\Authorizer;

class UsersController extends Controller {

    /**
     * @var UserRepository
     */
    private $repository;

    public function __construct(UserRepository $repository)
    {

        $this->repository = $repository;
    }

    public function authenticated()
    {
        $userId = Authorizer::getResourceOwnerId();
        return $this->repository->find($userId);
    }
}
