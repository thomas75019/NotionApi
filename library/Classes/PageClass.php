<?php
namespace Library\Classes;

use DateTime;
use DateTimeInterface;
use Library\Interfaces\PageInterface;
use Library\Interfaces\PropertiesObjectInterface;
use Library\Interfaces\UserInterface;
use Library\Interfaces\ParentInterface;
use Library\Interfaces\EmojiInterface;

class PageClass implements PageInterface
{
    private string $pageId;
    private string $createdTime;
    private string $lastEditedTime;
    private UserInterface $lastEditedBy;
    private bool $archived;
    private EmojiInterface $icon;
    private PropertiesObjectInterface $properties;
    private ParentInterface $parent;
    private string $url;

    public function __construct(string $pageId)
    {
        if (preg_match('/^[0-9A-F]{8}-[0-9A-F]{4}-4[0-9A-F]{3}-[89AB][0-9A-F]{3}-[0-9A-F]{12}$/i', $id))
        {
            $this->pageId = $pageId;
        }

        if (empty($this->createdTime)) {
            $this->createdTime = $this->setCreatedTime();
        }
    }

    public function getObject(): string
    {
        return "page";
    }

    public function setPageId(string $pageId): void
    {
        $this->pageId = $pageId;
    }
    
    public function getPageId(): string
    {
        return $this->pageId;
    }

    public function setCreatedTime(): void
    {
        $this->createdTime = new DateTime();
    }
    public function getCreatedTime(): string   
    {
        return $this->createdTime;
    }

    public function setLastEditedTime(DateTime $lastEditedTime): void
    {
        $this->lastEditedTime = $lastEditedTime;
    }

    public function getLastEditedTime(): string
    {
        return $this->lastEditedTime;
    }
    

    public function setLastEditedBy(UserInterface $user): void
    {
        $this->user = $user;
    }
    public function getLastEditedBy(): UserInterface
    {
        return $this->user;
    }

    public function setArchived(bool $archived): void
    {
        $this->archived = $archived;
    }

    public function getArchived(): bool
    {
        return $this->archived;
    }

    public function setIcon(EmojiInterface $emoji): void
    {
        $this->emoji = $emoji;
    }
    public function getIcon(): EmojiInterface
    {
        return $this->emoji;
    }
    
    public function setProperties(PropertiesObjectInterface $properties): void
    {
        $this->properties = $properties;
    }
    public function getProperties(): PropertiesObjectInterface
    {
        return $this->properties;
    }

    public function setParent(ParentInterface $prarent): void
    {
        $this->parent = $prarent;
    }
    public function getParent(): ParentInterface
    {
        return $this->parent;
    }

    public function setUrl(string $url): void
    {
        $this->url = $url;
    }
    public function getUrl(): string
    {
        return $this->url;
    }
}