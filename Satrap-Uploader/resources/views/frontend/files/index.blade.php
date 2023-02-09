@extends('layouts.app')

@section('content')
<section class="table-section">
    <table class="table">
    <thead class="table-dark">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Size</th>
            <th>Time</th>
            <th>Type</th>
            <th>Status</th>
            <th>Email</th>
            <th>Title</th>
            <th>Built</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($files as $file)
            <tr>
                <td>{{ $file->id }}</td>
                <td>{{ strstr($file->name , '.' , true) }}</td>
                <td>{{ number_format($file->size / (1024 * 1024) , 2) }}MB</td>
                <td>{{ round($file->time / 60 , 2) }} Minute</td>
                <td>{{ $file->type }}</td>
                <td>{{ ($file->is_private) ? 'private' : 'public' }}</td>
                <td>{{ $file->email }}</td>
                <td>{{ substr($file->title , 0 , 8)}}...</td>
                <td>{{ $file->created_at }}</td>
            </tr>
        @endforeach
    </tbody>
    </table>
</section>
@endsection
