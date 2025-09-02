@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="page-header d-flex justify-content-between align-items-center flex-wrap mb-4">
        <h1 class="page-title mb-2">Gallery - {{ $center->center_name }}</h1>
        <a href="{{ url('center-managements') }}" class="btn btn-secondary">Back</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card mb-5">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Upload New File</h5>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('center_managements.gallery.upload', $center->center_id) }}" enctype="multipart/form-data">
                @csrf
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="file_title" class="form-label">File Name</label>
                            <input type="text" name="file_title" class="form-control" id="file_title" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="gallery_file" class="form-label">Select File</label>
                            <input type="file" name="gallery_file" class="form-control" id="gallery_file" required>
                        </div>
                    </div>
                    <div class="col-12 text-end">
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-header bg-dark text-white">
            <h5 class="mb-0">Uploaded Files</h5>
        </div>
        <div class="card-body">
            @if(count($uploads))
                <div class="row g-4">
                    @foreach($uploads as $upload)
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="card h-100 shadow-sm">
                                <div class="card-body d-flex flex-column justify-content-between">
                                    <h6 class="card-title text-truncate" title="{{ $upload['title'] }}">
                                        {{ $upload['title'] }}
                                    </h6>
                                    <a href="{{ asset('/public' . $upload['path']) }}" class="btn btn-sm btn-outline-primary mt-3" target="_blank">View</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-muted">No files uploaded yet.</p>
            @endif
        </div>
    </div>
</div>
@endsection
