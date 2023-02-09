<?php

namespace App\Models;

use App\Services\Uploader\StorageManager;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model{
    use HasFactory;

    protected $fillable = ['name' , 'size' , 'type' , 'is_private' , 'email' , 'title' , 'time'];

    public function isMedia(){
        return $this->type === 'video';
    }

    public function absolutePath(){
        return resolve(StorageManager::class)->getAbsolutePathOf($this->name , $this->type , $this->is_private);
    }

    public function download(){
        return resolve(StorageManager::class)->getFile($this->type , $this->name , $this->is_private);
    }

    public function delete(){
        resolve(StorageManager::class)->deleteFile($this->type , $this->name , $this->is_private);

        parent::delete();
    }
}
