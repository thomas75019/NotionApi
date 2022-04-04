<?php

namespace Library\Interfaces;

interface PageInterface
{
    public function getObject(): string;

    public function setPageId(): string;
    public function getPageId(): string;

    public function setCreatedTime(): string;
    public function getCreatedTime(): string;

    public function setLastEditedTime(): string;
    public function getLastEditedTime(): string;

    public function setLastEditedBy(): Object;
    public function getLastEditedBy(): Object;

    public function setArchived(): bool;
    public function getArchived(): bool;

    public function setIcon(): Object;
    public function getIcon(): Object;

    public function setProperties(): Object;
    public function getProperties(): Object;

    public function setParent(): Object;
    public function getParent(): Object;

    
    public function setUrl(): string;
    public function getUrl(): string;
}