<?PhP 
namespace App\Services\Uploader;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class  StorageManager{
    public function putFileAsPublic(string $type , UploadedFile $file , string $name){
        return Storage::disk('public')->putFileAs($type , $file , $name);
    }

    public function putFileAsPrivate(string $type , UploadedFile $file , string $name){
        return Storage::disk('private')->putFileAs($type , $file , $name);
    }

    public function getAbsolutePathOf(string $name , string $type , bool $isPrivate){
        return $this->disk($isPrivate)->path($this->directoryPrefix($type , $name));
    }

    public function getFile(string $type , string $name , bool $isPrivate){
        return $this->disk($isPrivate)->download($this->directoryPrefix($type , $name));
    }

    public function isFileExists(string $name , string $type , bool $isPrivate){
        return $this->disk($isPrivate)->exists($this->directoryPrefix($type , $name));
    }

    private function directoryPrefix(string $type , string $name){
        return $type . DIRECTORY_SEPARATOR . $name;
    }

    public function disk(bool $isPrivate){
        return $isPrivate ? Storage::disk('private') : Storage::disk('public');
    }
}
