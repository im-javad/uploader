<?PhP 
namespace App\Services\Uploader;


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
        
        $path_durationOf = $this->storageManager->getAbsolutePathOf($this->file->getClientOriginalName() , $this->getType() , $this->isPrivate());

        dd($this->ffmpeg->durationOf($path_durationOf)); 
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
