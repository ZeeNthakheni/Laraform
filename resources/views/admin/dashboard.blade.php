@extends('admin.layout')

@section('title', 'Dashboard - Admin Panel')
@section('page-title', 'Dashboard')

@section('content')
<div class="header">
    <h1 class="header-title">Dashboard</h1>
    <p class="header-breadcrumb">Welcome back, {{ auth()->user()->name }}!</p>
</div>

<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-content">
            <h3>Total Submissions</h3>
            <div class="stat-value">{{ $totalSubmissions }}</div>
        </div>
        <div class="stat-icon bg-gradient-red">
            <i class="fas fa-envelope"></i>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-content">
            <h3>Total Users</h3>
            <div class="stat-value">{{ $totalUsers }}</div>
        </div>
        <div class="stat-icon bg-gradient-orange">
            <i class="fas fa-users"></i>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-content">
            <h3>Recent Activity</h3>
            <div class="stat-value">{{ $recentSubmissions->count() }}</div>
        </div>
        <div class="stat-icon bg-gradient-green">
            <i class="fas fa-chart-line"></i>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-content">
            <h3>Status</h3>
            <div class="stat-value">Active</div>
        </div>
        <div class="stat-icon bg-gradient-info">
            <i class="fas fa-check-circle"></i>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Recent Submissions</h3>
    </div>
    <div class="card-body">
        @if($recentSubmissions->count() > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Message</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($recentSubmissions as $submission)
                        <tr>
                            <td>{{ $submission->name }}</td>
                            <td>{{ $submission->email }}</td>
                            <td>{{ Str::limit($submission->message, 50) }}</td>
                            <td>{{ $submission->created_at->format('M d, Y') }}</td>
                            <td>
                                <a href="{{ route('admin.submissions.show', $submission->id) }}" class="btn btn-info btn-sm">
                                    <i class="fas fa-eye"></i> View
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div style="text-align: center; margin-top: 1rem;">
                <a href="{{ route('admin.submissions.index') }}" class="btn btn-primary">
                    View All Submissions
                </a>
            </div>
        @else
            <p style="text-align: center; color: #8898aa; padding: 2rem;">No submissions yet.</p>
        @endif
    </div>
</div>
@endsection
