<?php

namespace App\Storage;

use App\Storage\Contracts\StorageInterface;
class SessionStorage implements StorageInterface{

    public function all()
    {
        print_r($_SESSION['items']);
    }

    public function set($key, $value)
    {
        $_SESSION['items'][$key] = $value;
    }

    public function destroy()
    {
        $_SESSION['items']= [];
    }

    public function get($key)
    {
        return $_SESSION['items'][$key];
    }

    public function delete($key)
    {
        unset($_SESSION['items'][$key]);
    }

}
