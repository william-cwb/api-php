<?php

namespace src\Controllers;

use Exception;
use src\Models\User;
use src\Utils\Request;
use src\Dao\UserDao;
use src\Utils\Response;

class UserController
{

    private $request;

    public function __construct()
    {
        $this->request = new Request();
    }

    public function index()
    {
        try {
            $data = UserDao::all();
            echo Response::success($data);
        } catch (Exception $e) {
            echo Response::error();
        }
    }

    public function store()
    {
        try {

            $data = $this->request->getBody();
            $user = new User($data->name, $data->email);
            $result = UserDao::save($user);

            echo Response::success($result);
        } catch (Exception $e) {
            echo Response::error();
        }
    }

    public function update()
    {
        try {
            $data = $this->request->getBody();
            $user = new User($data->name, $data->email, $data->id);
            $result = UserDao::update($user);
            echo Response::success($result);
        } catch (Exception $e) {
            echo Response::error();
        }
    }

    public function show()
    {
        try {
            $data = $this->request->getBody();
            $user = UserDao::get($data->id);
            echo Response::success($user);
        } catch (Exception $e) {
            echo Response::error();
        }
    }
}
