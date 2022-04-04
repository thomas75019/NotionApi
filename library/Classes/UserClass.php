<?php

namespace Library\Classes;

use Library\Interfaces\UserInterface;

class UserClass implements UserInterface
{
    private string $object = "user";
    private string $userId;
    private string $name;
    private string $avatarUrl;
    private string $type;


    public function getObject(): string
    {
        return $this->object;
    }

    public function getId(): string
    {
        return $this->userId;
    }

    public function setId(string $id): void
    {
        $this->userId = $id;
    }

    public function setType(string $type): void
    {
        $this->type = $type;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getAvatarUrl(): string
    {
        return $this->avatarUrl;
    }

}