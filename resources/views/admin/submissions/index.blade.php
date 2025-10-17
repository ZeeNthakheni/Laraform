@extends('admin.layout')

@section('title', 'Submissions Management')
@section('page-title', 'Submissions')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6>All Submissions</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Email</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Message Preview</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date</th>
                                <th class="text-secondary opacity-7"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($submissions as $submission)
                            <tr>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">{{ $submission->name }}</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">{{ $submission->email }}</p>
                                </td>
                                <td>
                                    <p class="text-xs text-secondary mb-0">{{ Str::limit($submission->message, 50) }}</p>
                                </td>
                                <td class="align-middle text-center">
                                    <span class="text-secondary text-xs font-weight-bold">{{ $submission->created_at->format('M d, Y H:i') }}</span>
                                </td>
                                <td class="align-middle">
                                    <a href="{{ route('admin.submissions.show', $submission) }}" class="text-secondary font-weight-bold text-xs me-2">
                                        <i class="fas fa-eye"></i> View
                                    </a>
                                    <form action="{{ route('admin.submissions.destroy', $submission) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this submission?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-link text-danger font-weight-bold text-xs mb-0 p-0">
                                            <i class="fas fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center">No submissions found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                {{ $submissions->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
