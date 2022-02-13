<?php

namespace Library\Classes;
use Library\Interfaces\ParentInterface;

class ParentClass implements ParentInterface
{
    private string $type = "page_id";
    private string $pageId;

    public function __construct(string $pageId)
    {
        if (preg_match('/^[0-9A-F]{8}-[0-9A-F]{4}-4[0-9A-F]{3}-[89AB][0-9A-F]{3}-[0-9A-F]{12}$/i', $pageId))
        {
            $this->pageId = $pageId;
        }

    }


    public function getType(): string
    {
        return $this->type;
    }

    public function setPageId(string $id): void
    {
        $this->pageId = $id;
    }

    public function getPageId(): string
    {
        return $this->pageId;
    }

}