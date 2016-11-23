<?php

namespace Model;

use Core\EventManager;

class DbSave extends EventManager  implements \SaveString
{
    protected $dbh;
    protected static $table = 'strings';

    public function __construct($dbh)
    {
        $this->dbh = $dbh;
        $this->dbh->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }


    public function save($str)
    {
        if (is_string($str)) {
            $sql = 'INSERT INTO ' . static::$table . ' (text) VALUES (:text)';
            $sth = $this->dbh->prepare($sql);
            $sth->execute(['text' => $str]);
            $this->trigger('successWriting');
        }
    }


}