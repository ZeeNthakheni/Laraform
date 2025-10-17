@extends('admin.layout')

@section('title', 'View Submission - Admin Panel')
@section('page-title', 'View Submission')

@section('content')
<div class="header">
    <h1 class="header-title">View Submission</h1>
    <p class="header-breadcrumb">Submission #{{ $submission->id }}</p>
</div>

<div class="card">
    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
        <h3 class="card-title">Submission Details</h3>
        <div>
            <a href="{{ route('admin.submissions.edit', $submission->id) }}" class="btn btn-success">
                <i class="fas fa-edit"></i> Edit
            </a>
            <a href="{{ route('admin.submissions.index') }}" class="btn btn-primary">
                <i class="fas fa-arrow-left"></i> Back
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="form-group">
            <label>Name</label>
            <div style="padding: 0.625rem 0.75rem; background: #f6f9fc; border-radius: 0.375rem;">
                {{ $submission->name }}
            </div>
        </div>

        <div class="form-group">
            <label>Email</label>
            <div style="padding: 0.625rem 0.75rem; background: #f6f9fc; border-radius: 0.375rem;">
                {{ $submission->email }}
            </div>
        </div>

        <div class="form-group">
            <label>Message</label>
            <div style="padding: 0.625rem 0.75rem; background: #f6f9fc; border-radius: 0.375rem; min-height: 100px;">
                {{ $submission->message }}
            </div>
        </div>

        <div class="form-group">
            <label>Submitted At</label>
            <div style="padding: 0.625rem 0.75rem; background: #f6f9fc; border-radius: 0.375rem;">
                {{ $submission->created_at->format('F d, Y \a\t h:i A') }}
            </div>
        </div>

        <div class="form-group">
            <label>Last Updated</label>
            <div style="padding: 0.625rem 0.75rem; background: #f6f9fc; border-radius: 0.375rem;">
                {{ $submission->updated_at->format('F d, Y \a\t h:i A') }}
            </div>
        </div>

        <form method="POST" action="{{ route('admin.submissions.destroy', $submission->id) }}">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this submission?')">
                <i class="fas fa-trash"></i> Delete Submission
            </button>
        </form>
    </div>
</div>
@endsection
