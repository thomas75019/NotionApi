<?php

namespace Library\Interfaces;

use DateTime;

interface PageInterface
{
    public function getObject(): string;

    public function setPageId(string $pageId): string;
    public function getPageId(): string;

    public function getCreatedTime(): DateTime;

    public function setLastEditedTime(DateTime $date): void;
    public function getLastEditedTime(): DateTime;

    public function setLastEditedBy(UserInterface $user): void;
    public function getLastEditedBy(): UserInterface;

    public function setArchived(bool $archived): void;
    public function getArchived(): bool;

    public function setIcon(EmojiInterface $emoji): void;
    public function getIcon(): EmojiInterface;

    public function setProperties(PropertiesObjectInterface $properties): void;
    public function getProperties(): PropertiesObjectInterface;

    public function setParent(ParentInterface $prarent): void;
    public function getParent(): ParentInterface;

    
    public function setUrl(string $url): void;
    public function getUrl(): string;
}