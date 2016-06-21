<?php

class Posts
{
    public $title;
    public $content;
    public $author;

    public function info()
    {
        return '#'.$this->title.': '.$this->content.' '.$this->author;
    }
}

