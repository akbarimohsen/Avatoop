<?php

interface DatabaseContract{
    public function save($data);
}
class Mysql implements DatabaseContract{
    public function save($data)
    {

        return $data;

    }
}

class UserModel {
    protected $database;

    public function __construct(DatabaseContract $database)
    {
        $this->database = $database;
    }

    public function createUser($data)
    {
        $this->database->save($data);
    }
}
$user=new UserModel(new Mysql());
$user->createUser([
    'name' => 'John',
    'family' => 'JohnDoe',
]);
