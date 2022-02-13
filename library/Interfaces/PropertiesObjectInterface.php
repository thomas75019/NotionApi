<?php

namespace Library\Interfaces;

interface PropertiesObjectInterface
{
    public function getId(): string;
    public function setId(string $id): void;
    public function setType(string $type): void;
    public function getType(): string;
    public function setName(string $name): void;
    public function getName(): string;

}