@extends('layouts.app')

@section('title' , 'Upload File')

@section('content')
<div class="content">
  <div class="upload-file">
    <h3>Upload Your File</h3>
    <form action="{{ route('file.storage') }}" method="POST" enctype="multipart/form-data">
    @csrf
      <div class="mb-3">
        <label for="email" class="form-label">Email:</label>
        <input type="email" name="email" class="form-control" id="email" placeholder="Your Email...">
        @error('email')
          <span class="valid-danger" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
      <div class="mb-3">
        <label for="title" class="form-label">Title:</label>
        <input type="text" name="title" class="form-control" id="title" placeholder="File Title...">
        @error('title')
          <span class="valid-danger" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
      <div class="mb-3">
        <label for="file" class="form-label">Choose Your File:</label>
        <input type="file" name="file" class="form-control" id="file">
        @error('file')
          <span class="valid-danger" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
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
      <br>
      @error('status')
        <span class="valid-danger" role="alert">
          <strong>{{ $message }}</strong>
        </span>
      @enderror
      <br>
      <div class="d-grid gap-2">
        <button class="btn btn-primary orange" type="submit">Upload</button>
      </div>
    </form>
  </div>
</div>
@endsection