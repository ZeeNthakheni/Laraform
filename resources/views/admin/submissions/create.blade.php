@extends('admin.layout')

@section('title', 'Create Submission - Admin Panel')
@section('page-title', 'Create Submission')

@section('content')
<div class="header">
    <h1 class="header-title">Create Submission</h1>
    <p class="header-breadcrumb">Add a new submission</p>
</div>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Submission Information</h3>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('admin.submissions.store') }}">
            @csrf
            
            <div class="form-group">
                <label for="name">Name <span style="color: red;">*</span></label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
                @error('name')
                    <small style="color: #f5365c;">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Email <span style="color: red;">*</span></label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
                @error('email')
                    <small style="color: #f5365c;">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="message">Message <span style="color: red;">*</span></label>
                <textarea name="message" id="message" class="form-control" required>{{ old('message') }}</textarea>
                @error('message')
                    <small style="color: #f5365c;">{{ $message }}</small>
                @enderror
            </div>

            <div style="display: flex; gap: 10px;">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Create Submission
                </button>
                <a href="{{ route('admin.submissions.index') }}" class="btn btn-danger">
                    <i class="fas fa-times"></i> Cancel
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
