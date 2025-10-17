@extends('admin.layout')

@section('title', 'Edit Submission - Admin Panel')
@section('page-title', 'Edit Submission')

@section('content')
<div class="header">
    <h1 class="header-title">Edit Submission</h1>
    <p class="header-breadcrumb">Submission #{{ $submission->id }}</p>
</div>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Submission Information</h3>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('admin.submissions.update', $submission->id) }}">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="name">Name <span style="color: red;">*</span></label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $submission->name) }}" required>
                @error('name')
                    <small style="color: #f5365c;">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Email <span style="color: red;">*</span></label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $submission->email) }}" required>
                @error('email')
                    <small style="color: #f5365c;">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="message">Message <span style="color: red;">*</span></label>
                <textarea name="message" id="message" class="form-control" required>{{ old('message', $submission->message) }}</textarea>
                @error('message')
                    <small style="color: #f5365c;">{{ $message }}</small>
                @enderror
            </div>

            <div style="display: flex; gap: 10px;">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Update Submission
                </button>
                <a href="{{ route('admin.submissions.show', $submission->id) }}" class="btn btn-danger">
                    <i class="fas fa-times"></i> Cancel
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
