<?php

namespace Model;

use Core\EventManager;

class FileSave extends EventManager  implements \SaveString
{
    protected $path = __DIR__ . '/../text.txt';

    public function save($str)
    {
        if (is_string($str)) {
            file_put_contents($this->path, $str . "\n", FILE_APPEND);
            $this->trigger('successWriting');
        }
    }
}