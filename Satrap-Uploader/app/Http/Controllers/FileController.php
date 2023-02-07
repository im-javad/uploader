<?php

namespace App\Http\Controllers;

use App\Http\Requests\FileRequest;
use App\Services\Uploader\Uploader;

class FileController extends Controller{
    public function upload(){
        return view('frontend.files.create');
    }

    public function storage(FileRequest $request){
        $validator = $request->validated();
        
        (new Uploader($validator))->upload();

        return back();
    }
}
