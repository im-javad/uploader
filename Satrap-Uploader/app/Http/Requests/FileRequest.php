<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'email' => 'required|email',
            'title' => 'required|string|min:5|max:50',
            'file' => 'required|max:10000|mimetypes:image,video/mp4,application/zip',
            'status' => 'required|in:private,public'
        ]; 
    }
}
