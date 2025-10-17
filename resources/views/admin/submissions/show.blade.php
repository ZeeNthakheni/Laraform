@extends('admin.layout')

@section('title', 'View Submission')
@section('page-title', 'View Submission')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between align-items-center">
                    <h6>Submission Details</h6>
                    <a href="{{ route('admin.submissions.index') }}" class="btn btn-secondary btn-sm">
                        <i class="fas fa-arrow-left"></i> Back
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label class="form-control-label">Name</label>
                        <p class="form-control-static">{{ $submission->name }}</p>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label class="form-control-label">Email</label>
                        <p class="form-control-static">
                            <a href="mailto:{{ $submission->email }}">{{ $submission->email }}</a>
                        </p>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label class="form-control-label">Message</label>
                        <div class="card">
                            <div class="card-body">
                                <p class="mb-0">{{ $submission->message }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-control-label">Submitted At</label>
                        <p class="form-control-static">{{ $submission->created_at->format('F d, Y H:i:s') }}</p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-control-label">Time Ago</label>
                        <p class="form-control-static">{{ $submission->created_at->diffForHumans() }}</p>
                    </div>
                </div>
                <div class="d-flex justify-content-between mt-4">
                    <form action="{{ route('admin.submissions.destroy', $submission) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this submission?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-trash"></i> Delete Submission
                        </button>
                    </form>
                    <a href="mailto:{{ $submission->email }}" class="btn btn-primary">
                        <i class="fas fa-reply"></i> Reply via Email
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
