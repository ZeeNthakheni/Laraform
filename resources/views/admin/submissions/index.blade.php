@extends('admin.layout')

@section('title', 'Submissions - Admin Panel')
@section('page-title', 'Submissions')

@section('content')
<div class="header">
    <h1 class="header-title">Submissions</h1>
    <p class="header-breadcrumb">Manage all form submissions</p>
</div>

<div class="card">
    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
        <h3 class="card-title">All Submissions</h3>
        <a href="{{ route('admin.submissions.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Add New
        </a>
    </div>
    <div class="card-body">
        @if($submissions->count() > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Message</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($submissions as $submission)
                        <tr>
                            <td>#{{ $submission->id }}</td>
                            <td>{{ $submission->name }}</td>
                            <td>{{ $submission->email }}</td>
                            <td>{{ Str::limit($submission->message, 50) }}</td>
                            <td>{{ $submission->created_at->format('M d, Y') }}</td>
                            <td>
                                <a href="{{ route('admin.submissions.show', $submission->id) }}" class="btn btn-info btn-sm">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.submissions.edit', $submission->id) }}" class="btn btn-success btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form method="POST" action="{{ route('admin.submissions.destroy', $submission->id) }}" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
            <div style="display: flex; justify-content: center;">
                {{ $submissions->links() }}
            </div>
        @else
            <p style="text-align: center; color: #8898aa; padding: 2rem;">No submissions found.</p>
        @endif
    </div>
</div>
@endsection
