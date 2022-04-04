<?php
namespace Library\Interfaces;

interface EmojiInterface
{
    public function setEmoji(string $emoji): void;
    public function getEmoji(): string;
}