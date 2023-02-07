<?PhP 
namespace App\Services\Uploader;


class Uploader{
    private $file;
    private $storageManager;

    public function __construct(private array $validator){
        $this->file = $validator['file'];
        $this->storageManager = new StorageManager;
    } 

    public function upload(){
        $this->putFileIntoStorage();
    }

    private function putFileIntoStorage(){
        $method = $this->validator['status'] === 'public' ? 'putFileAsPublic' : 'putFileAsPrivate';

        $this->storageManager->$method($this->getType() , $this->file ,  $this->file->getClientOriginalName());
    }   

    private function getType(){
        return [
            'image/jpeg' => 'image',
            'video/mp4' => 'video',
            'application/zip' => 'archive',
        ][$this->file->getClientMimeType()];
    }
}
