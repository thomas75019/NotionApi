<?php

namespace Library\Database\Interfaces;

interface PropertiesObjectInterface
{
    public function getId(): string;
    public function setId(): void;
    public function setType(): void;
    public function getType(): string;
    public function setName(): void;
    public function getName(): string;

}