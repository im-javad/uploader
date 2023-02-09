<?PhP 
namespace App\Services\Uploader;

use FFMpeg\FFProbe;

class FFMpeg{
    private $ffprobe;

    public function __construct(){
        $this->ffprobe = FFProbe::create([
            'ffmpeg.binarie' => config('services.ffmpeg.ffprobe_path'),
        ]);
    }

    public function durationOf(string $path){
        return (int)$this->ffprobe->format($path)->get('duration');
    }
}
