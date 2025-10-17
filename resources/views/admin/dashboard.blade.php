@extends('admin.layout')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
            <div class="card-body p-3">
                <div class="row">
                    <div class="col-8">
                        <div class="numbers">
                            <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Users</p>
                            <h5 class="font-weight-bolder">
                                {{ $totalUsers }}
                            </h5>
                        </div>
                    </div>
                    <div class="col-4 text-end">
                        <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                            <i class="ni ni-single-02 text-lg opacity-10" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
            <div class="card-body p-3">
                <div class="row">
                    <div class="col-8">
                        <div class="numbers">
                            <p class="text-sm mb-0 text-uppercase font-weight-bold">Submissions</p>
                            <h5 class="font-weight-bolder">
                                {{ $totalSubmissions }}
                            </h5>
                        </div>
                    </div>
                    <div class="col-4 text-end">
                        <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                            <i class="ni ni-email-83 text-lg opacity-10" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
            <div class="card-body p-3">
                <div class="row">
                    <div class="col-8">
                        <div class="numbers">
                            <p class="text-sm mb-0 text-uppercase font-weight-bold">Admin Users</p>
                            <h5 class="font-weight-bolder">
                                {{ App\Models\User::where('role', 'admin')->count() }}
                            </h5>
                        </div>
                    </div>
                    <div class="col-4 text-end">
                        <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                            <i class="ni ni-badge text-lg opacity-10" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6">
        <div class="card">
            <div class="card-body p-3">
                <div class="row">
                    <div class="col-8">
                        <div class="numbers">
                            <p class="text-sm mb-0 text-uppercase font-weight-bold">Regular Users</p>
                            <h5 class="font-weight-bolder">
                                {{ App\Models\User::where('role', 'user')->count() }}
                            </h5>
                        </div>
                    </div>
                    <div class="col-4 text-end">
                        <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                            <i class="ni ni-circle-08 text-lg opacity-10" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-lg-7 mb-lg-0 mb-4">
        <div class="card">
            <div class="card-header pb-0 p-3">
                <div class="d-flex justify-content-between">
                    <h6 class="mb-2">Recent Submissions</h6>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table align-items-center">
                    <tbody>
                        @forelse($recentSubmissions as $submission)
                        <tr>
                            <td class="w-30">
                                <div class="d-flex px-2 py-1 align-items-center">
                                    <div class="ms-4">
                                        <p class="text-xs font-weight-bold mb-0">Name:</p>
                                        <h6 class="text-sm mb-0">{{ $submission->name }}</h6>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="text-center">
                                    <p class="text-xs font-weight-bold mb-0">Email:</p>
                                    <h6 class="text-sm mb-0">{{ $submission->email }}</h6>
                                </div>
                            </td>
                            <td>
                                <div class="text-center">
                                    <p class="text-xs font-weight-bold mb-0">Date:</p>
                                    <h6 class="text-sm mb-0">{{ $submission->created_at->format('M d, Y') }}</h6>
                                </div>
                            </td>
                            <td class="align-middle text-sm">
                                <a href="{{ route('admin.submissions.show', $submission) }}" class="btn btn-link text-secondary mb-0">
                                    <i class="fa fa-eye text-xs"></i> View
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center">No submissions yet</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-5">
        <div class="card">
            <div class="card-header pb-0 p-3">
                <h6 class="mb-0">Recent Users</h6>
            </div>
            <div class="card-body p-3">
                <ul class="list-group">
                    @forelse($recentUsers as $user)
                    <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                        <div class="d-flex align-items-center">
                            <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                                <i class="ni ni-single-02 text-white opacity-10"></i>
                            </div>
                            <div class="d-flex flex-column">
                                <h6 class="mb-1 text-dark text-sm">{{ $user->name }}</h6>
                                <span class="text-xs">{{ $user->email }}</span>
                            </div>
                        </div>
                        <div class="d-flex">
                            <span class="badge badge-sm bg-gradient-{{ $user->role === 'admin' ? 'success' : 'secondary' }}">
                                {{ ucfirst($user->role) }}
                            </span>
                        </div>
                    </li>
                    @empty
                    <li class="list-group-item border-0 ps-0">No users yet</li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
