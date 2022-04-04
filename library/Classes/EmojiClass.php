<?php

namespace Library\Classes;

use Library\Interfaces\EmojiInterface;

class EmojiClass implements EmojiInterface
{
    private string $emoji;

    public function setEmoji(string $emoji): void
    {
        if (preg_match('\u00a9|\u00ae|[\u2000-\u3300]|\ud83c[\ud000-\udfff]|\ud83d[\ud000-\udfff]|\ud83e[\ud000-\udfff])', $emoji))
        {
            $this->emoji = $emoji;
        }
        throw new \Exception("Emoji is not valid");
    }

    public function getEmoji(): string
    {
        return $this->emoji;
    }

    //emoji to jspn
    public function emojiToJson(string $emoji): string
    {
        $emoji = json_encode($emoji);
        return $emoji;
    }
}