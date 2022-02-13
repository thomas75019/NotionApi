<?php

namespace Library\Interfaces;

interface ParentInterface
{
    public function getType(): string;

    public function getPageId(): string;
}