<?php

namespace App\Http\Controllers;

use App\Http\Requests\FileRequest;
use App\Models\File;
use App\Services\Uploader\Uploader;

class FileController extends Controller{
    public function index(){
        $files = File::all();

        return view('frontend.files.index' , compact('files'));
    }
    
    public function upload(){
        return view('frontend.files.create');
    }

    public function storage(FileRequest $request){
        $validator = $request->validated();

        try{
            (new Uploader($validator))->upload();
            return back()->with('simpleSuccess' , 'Your file has uploaded successfully');
        }catch(\Exception $e){
            return back()->with('simpleError' , 'File has already uploaded');
        }  
    }

    public function download(File $file){
        return $file->download();
    }
}
