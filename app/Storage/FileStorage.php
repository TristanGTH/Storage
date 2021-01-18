<?php

namespace App\Storage;
use App\Storage\Contracts\StorageInterface;
class FileStorage implements StorageInterface{

    public function all()
    {
        $folder_path = __DIR__ .'../../../storage/items/';
        $files = glob($folder_path.'/*');
        print_r($files);
    }

    public function set($key, $value)
    {
         file_put_contents(__DIR__ .'../../../storage/items/'.$key, $value);
    }

    public function destroy()
    {
        $folder_path = __DIR__ .'../../../storage/items/';
        $files = glob($folder_path.'/*');
        foreach($files as $file) {
            if(is_file($file))
                unlink($file);
        }
    }

    public function get($key)
    {
        return file_get_contents(__DIR__ .'../../../storage/items/'.$key);
    }

    public function delete($key)
    {
        unlink(__DIR__ .'../../../storage/items/'.$key);
    }

}