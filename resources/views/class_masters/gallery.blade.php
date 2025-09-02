@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">Gallery - {{ $class->class_name }}</h1>
        <a href="{{ url('class-masters') }}" class="btn btn-secondary">Back</a>
    </div>

    <!-- Success Message -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Upload Form -->
    <div class="card mb-4 shadow-sm">
        <div class="card-header bg-primary text-white">
            <strong>Upload New File</strong>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('class_masters.gallery.upload', $class->class_id) }}" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="file_title" class="form-label">File Name</label>
                        <input type="text" name="file_title" id="file_title" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label for="gallery_file" class="form-label">Select File</label>
                        <input type="file" name="gallery_file" id="gallery_file" class="form-control" required>
                    </div>
                </div>
                <div class="col-12 text-end">
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
            </form>
        </div>
    </div>

    <!-- Uploaded Files -->
    <div class="card shadow-sm">
        <div class="card-header bg-dark text-white">
            <strong>Uploaded Files</strong>
        </div>
        <div class="card-body">
            @if(count($uploads))
                <div class="row g-4">
                    @foreach($uploads as $upload)
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="card h-100 shadow-sm">
                                <div class="card-body d-flex flex-column justify-content-between">
                            <div>
                                <i class="bi bi-file-earmark-text-fill me-2 text-primary"></i>
                                {{ $upload['title'] }}
                            </div>
                            <a href="{{ asset('/public' . $upload['path']) }}" class="btn btn-sm btn-outline-info" target="_blank">View</a>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-muted mb-0">No files uploaded yet.</p>
            @endif
        </div>
    </div>
</div>
@endsection
