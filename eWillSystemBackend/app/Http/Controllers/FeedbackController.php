<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\User;
use App\Models\Faq;
use App\Models\Audit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            "email" => "required|email|exists:users,email", // Assuming you have a users table
            "fullname" => "required|string|max:255",
            "message" => "required|string",
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Create feedback
        $feedback = Feedback::create(
            $request->only("email", "fullname", "message")
        );

        return response()->json(
            [
                "message" => "Feedback submitted successfully!",
                "data" => $feedback,
            ],
            201
        );
    }

    public function index()
    {
        $feedbacks = Feedback::all(); // Fetch all feedbacks

        return view("feedback.index", compact("feedbacks"));
    }

    public function show($id)
    {
        $feedback = Feedback::findOrFail($id); // Ensure the feedback exists
        return response()->json($feedback); // Return as JSON
    }

    public function destroy($id)
    {
        $feedback = Feedback::find($id);

        if (!$feedback) {
            return response()->json(["message" => "Feedback not found"], 404);
        }

        $feedback->delete();

        return response()->json(["message" => "Feedback deleted successfully"]);
    }

    public function share(Request $request)
    {
        $request->validate([
            'feedback_id' => 'required|exists:feedbacks,id',
        ]);
        // Store reply in `faq` table
        $faq = Faq::create([
            "title" => "Reply to Feedback", // Generic title
            "description" => $request->description,
        ]);

        // Update feedback as "Replied"
        $feedback = Feedback::find($request->feedback_id);
        $feedback->replied = true;
        $feedback->save();

        // Log action
        Audit::create([
            "activity" => "Replied to feedback ID: " . $request->feedback_id,
            "addedon" => now(),
            "user" => Auth::id(),
        ]);

        return response()->json([
            "message" => "Reply sent successfully!",
            "code" => 200,
        ]);
    }
}
