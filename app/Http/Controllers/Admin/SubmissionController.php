<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\submissions;

class SubmissionController extends Controller
{
    public function index()
    {
        $submissions = submissions::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.submissions.index', compact('submissions'));
    }

    public function show(submissions $submission)
    {
        return view('admin.submissions.show', compact('submission'));
    }

    public function destroy(submissions $submission)
    {
        $submission->delete();
        return redirect()->route('admin.submissions.index')->with('success', 'Submission deleted successfully.');
    }
}
