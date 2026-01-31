<?php

namespace App\Http\Controllers;

use App\Http\Requests\applications\StoreApplicationRequest;
use App\Models\Application;
use App\Models\Review;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function index()
    {
        $applications = Application::all();
    }
    public function create()
    {

    }
    public function store(StoreApplicationRequest $request)
    {
        $validated = $request->validated();
        Application::create($validated);
    }
    public function setStatus(Request $request, $id)
    {
        Application::setStatus($request["status"], $id);
    }
    public function addReview(Request $request, $id)
    {
        Review::makeReview($request["text"], $id);
    }
}
