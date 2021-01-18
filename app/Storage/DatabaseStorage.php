<?php

namespace App\Storage;
use App\Storage\Contracts\StorageInterface;
class DatabaseStorage implements StorageInterface{

    protected $db;
    public function __construct(\PDO $db){
        $this->db = $db;
    }

    public function all()
    {
        $statement = $this->db->prepare('SELECT * FROM items');
        return $statement->fetchAll();
    }

    public function set($key, $value)
    {
        $statement = $this->db->prepare("INSERT INTO items (clef, value) VALUE (?,?)");
        $statement->execute([
            $key,
            $value
        ]);
    }

    public function destroy()
    {
        $statement = $this->db->query('DELETE FROM items');
    }

    public function get($key)
    {
        $statement = $this->db->prepare('SELECT * FROM items WHERE clef=?');
        $statement->execute([
            $key
        ]);
        return $statement->fetch()['value'];    }

    public function delete($key)
    {
        $statement = $this->db->prepare('DELETE FROM items WHERE key=?');
        $statement->execute([
            $key
        ]);
    }

}
