@extends('layouts.app')

@section('title' , 'Upload File')

@section('content')
<div class="content">
  <div class="upload-file">
    <h3>Upload Your File</h3>
    <form action="{{ route('file.storage') }}" method="POST">
      <div class="mb-3">
        <label for="email" class="form-label">Email:</label>
        <input type="email" class="form-control" id="email" placeholder="Your Email...">
      </div>
      <div class="mb-3">
        <label for="title" class="form-label">Title:</label>
        <input type="text" class="form-control" id="title" placeholder="File Title...">
      </div>
      <div class="mb-3">
        <label for="file" class="form-label">Choose Your File:</label>
        <input type="file" class="form-control" id="file">
      </div>
      <p>Upload Status:</p>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="status" id="public" value="public">
        <label class="form-check-label" for="public">Upload Publicly</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="status" id="private" value="private">
        <label class="form-check-label" for="private">Upload Privately</label>
      </div>
      <br><br>
      <div class="d-grid gap-2">
        <button class="btn btn-primary orange" type="button">Upload</button>
      </div>
    </form>
  </div>
</div>
@endsection