<?PhP 
namespace App\Services\Uploader;

use App\Models\File;

class Uploader{
    private $file;
    private $storageManager;
    private $ffmpeg;

    public function __construct(private array $validator){
        $this->file = $validator['file'];
        $this->ffmpeg = new FFMpeg;
        $this->storageManager = new StorageManager;
    } 

    public function upload(){
        $this->putFileIntoStorage();

        return $this->saveFileIntoDatabase();
    }

    public function saveFileIntoDatabase(){
        $file = new File([
            'name' => $this->file->getClientOriginalName(),
            'size' => $this->file->getSize(),
            'type' => $this->getType(),
            'is_private' => $this->isPrivate(),
            'email' => $this->validator['email'],
            'title' => $this->validator['title'],
        ]);

        $file->time = $this->getTime($file);
        $file->save();
    }

    public function getTime(File $file){
        if(!$file->isMedia()) return null;

        return $this->ffmpeg->durationOf($file->absolutePath());
    }

    private function putFileIntoStorage(){
        $method = $this->isPrivate() ? 'putFileAsPrivate' : 'putFileAsPublic';

        $this->storageManager->$method($this->getType() , $this->file ,  $this->file->getClientOriginalName());
    }   

    private function getType(){
        return [
            'image/jpeg' => 'image',
            'video/mp4' => 'video',
            'application/zip' => 'archive',
        ][$this->file->getClientMimeType()];
    }

    public function isPrivate(){
        return $this->validator['status'] === 'private' ? true : false;
    }
}
