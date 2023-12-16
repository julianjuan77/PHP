<?php

namespace Julian\Notas\models;

use Julian\Notas\lib\database;
use LDAP\Result;
use PDO;

class Note extends Database
{

    private string $uuid;

    public function __construct(private string $title, private string $content)
    {
        parent::__construct();
        $this->uuid = uniqid();
    }

    public function save()
    {
        $query = $this->connect()->prepare("INSERT INTO notes (uuid, title, content, updated) VALUES (:uuid, :title, :content, NOW() )");
        $query->execute(['title' => $this->title, 'uuid' => $this->uuid, 'content' => $this->content]);
    }

    public function update()
    {
        $query = $this->connect()->prepare("UPDATE notes SET title = :title, content = :content, updated = NOW() WHERE uuid = :uuid");
        $query->execute(['title' => $this->title, 'uuid' => $this->uuid, 'content' => $this->content]);
    }

    public function delete()
    {
        $query = $this->connect()->prepare("DELETE FROM notes WHERE uuid = :uuid");
        $query->execute(['uuid' => $this->uuid]);
    }

    public static function get($uuid)
    {
        $db = new Database();
        $query = $db->connect()->prepare("SELECT * FROM notes WHERE uuid = :uuid");
        $query->execute(['uuid' => $uuid]);
        $note = Note::createFromArray($query->fetch(PDO::FETCH_ASSOC)); //Fetch realiza la query y la retorna como array asociativo

        return $note;
    }

    public static function getAll()
    {
        $notes = [];
        $db = new Database();
        $query = $db->connect()->query("SELECT * FROM notes");

        while ($r = $query->fetch(PDO::FETCH_ASSOC)) {

            $note = Note::createFromArray($r);
            array_push($notes, $note);
        }

        return $notes;
    }

    public static function createFromArray($arr): Note
    {
        $note = new Note($arr['title'], $arr['content']);
        $note->setUUID($arr['uuid']);
        return $note;
    }

    public function getUUID()
    {
        return $this->uuid;
    }

    public function setUUID($value)
    {
        $this->uuid = $value;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($value)
    {
        $this->title = $value;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($value)
    {
        $this->content = $value;
    }
}
