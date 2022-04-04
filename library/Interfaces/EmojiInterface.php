<?php
namespace Library\Interfaces;

interface EmojiInterface
{
    public function setEmoji(string $emoji): void;
    public function getEmoji(): string;
    public function emojiToJson(string $emoji): string;
}