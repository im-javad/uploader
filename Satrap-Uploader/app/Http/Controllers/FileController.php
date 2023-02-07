<?php

namespace App\Http\Controllers;

use App\Http\Requests\FileRequest;
use Illuminate\Http\Request;

class FileController extends Controller{
    public function upload(){
        return view('frontend.files.create');
    }

    public function storage(FileRequest $request){
        $validator = $request->validated();
    }
}
 