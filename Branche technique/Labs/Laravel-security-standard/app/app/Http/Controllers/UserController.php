<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Flash;

class UserController extends AppBaseController
{
    /** @var UserRepository $UserRepository*/
    private $UserRepository;

    public function __construct(UserRepository $UserRepository)
    {
        $this->UserRepository = $UserRepository;
    }

    /**
     * Display a listing of the Users.
     */
    public function index()
    {
        $users = $this->UserRepository->paginate(10);

        return view('users')
            ->with('users', $users);
    }
}