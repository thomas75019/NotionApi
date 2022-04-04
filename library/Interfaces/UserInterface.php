<?php

namespace Library\Interfaces;

interface UserInterface
{
    public function getObject(): string;
    public function getId(): string;
    public function setType(string $type): void;
    public function getType(): string;
    public function setName(string $name): void;
    public function getName(): string;
    public function getAvatarUrl(): string;
}