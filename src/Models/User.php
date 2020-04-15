<?php

namespace src\Models;



class User
{

    private $name;
    private $email;
    private $id;
    public function __construct(String $name, String $email, int $id = null)
    {
        $this->name = $name;
        $this->email = $email;
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getId()
    {
        return $this->id;
    }
}
