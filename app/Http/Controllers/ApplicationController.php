<?php

namespace App\Http\Controllers;

use App\Http\Requests\applications\StoreApplicationRequest;
use App\Models\Application;
use App\Models\Review;
use Illuminate\Http\Request;
use App\Models\Course;

class ApplicationController extends Controller
{
    public function index()
    {
        $applications = Application::all();
    }
    public function create()
    {
        $courses = Course::all();
        return view('applications.create', compact('courses'));
    }
    public function store(StoreApplicationRequest $request)
    {
        $validated = $request->validated();
        $validated['user_id'] = auth()->id();
        Application::create($validated);
        return redirect()->route('auth.profile');
    }
    public function setStatus(Request $request, $id)
    {
        Application::setStatus($request["status"], $id);
        return redirect()->back();
    }
    public function addReview(Request $request, $id)
    {
        Review::makeReview($request["text"], $id);
        return redirect()->back();

    }
}
