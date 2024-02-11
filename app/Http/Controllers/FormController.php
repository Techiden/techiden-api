<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserDataRequest;
use App\Models\Submission;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function create() {
        return view('form');
    }

    /**
     * Handle the form submission
     */

     public function store(StoreUserDataRequest $request) {
        $validated = $request->validated();

        $submission = Submission::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? '',
            'message' => $validated['message'],
        ]);

        return response()->json(['message' => 'Form submitted successfully!', 'data' => $submission], 201);
     }
}
