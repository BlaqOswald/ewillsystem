<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

use App\Helpers\MailHelper;
use App\Models\User;

class EmailVerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles both OTP-based and standard Laravel email
    | verification for registered users. It includes methods for verifying
    | emails using OTPs, verifying via verification links, and resending
    | verification links.
    |
    */

    use VerifiesEmails;

    /**
     * Where to redirect users after verification.
     *
     * @var string
     */
    protected $redirectTo = "/home";

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware("auth")->only(["resend"]);
        $this->middleware("signed")->only(["verify"]);
        $this->middleware("throttle:6,1")->only([
            "sendOTP",
            "verifyOTP",
            "verify",
            "resend",
        ]);
    }

    /**
     * Display verification status for the current user.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|Illuminate\Contracts\Routing\ResponseFactory
     */

    public function show(Request $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            return response(["message" => "Email already verified."], 200);
        }

        return response(["message" => "Email verification required."], 422);
    }

    /**
     * Send an OTP to the user's email for email verification.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendOTP(Request $request)
    {
        $request->validate(["email" => "required|email"]);

        $email = $request->input("email");
        $otp = random_int(100000, 999999);

        // Store OTP and email in session for temporary validation
        Session::put("otp", $otp);
        Session::put("email", $email);

        // Prepare email content
        $subject = "Your OTP for Email Verification";
        $body = view("emails.otp", compact("otp"))->render();

        // Send the OTP via email
        if (MailHelper::sendMail($email, $subject, $body)) {
            return response()->json(
                ["message" => "OTP sent successfully!"],
                200
            );
        }

        return response()->json(["message" => "Failed to send OTP."], 500);
    }

    /**
     * Verify the OTP entered by the user.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function verifyOTP(Request $request)
    {
        $request->validate(["otp" => "required|numeric"]);

        if ($request->input("otp") == Session::get("otp")) {
            // Mark email as verified for the user
            $user = User::where("email", Session::get("email"))->first();

            if ($user && !$user->hasVerifiedEmail()) {
                $user->markEmailAsVerified();
                event(new Verified($user));
            }

            // Clear the session
            Session::forget("otp");
            Session::forget("email");

            return response()->json(
                ["message" => "Email verified successfully!"],
                200
            );
        }

        return response()->json(["message" => "Invalid OTP."], 400);
    }

    /**
     * Verify the email via verification link.
     *
     * @param Request $request
     * @param int $id
     * @param string $hash
     * @return \Illuminate\Http\JsonResponse|Illuminate\Contracts\Routing\ResponseFactory
     */
    public function verify(Request $request, $id, $hash)
    {
        $user = User::find($id);

        if ($user) {
            if (!$user->hasVerifiedEmail()) {
                if ($user->markEmailAsVerified()) {
                    event(new Verified($user));
                    return response(
                        ["message" => "Email verified successfully."],
                        200
                    );
                }
            }

            return response(["message" => "Email already verified."], 200);
        }

        return response(["message" => "User not found."], 404);
    }

    /**
     * Resend the email verification link.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function resend(Request $request)
    {
        if (auth()->check()) {
            if ($request->user()->hasVerifiedEmail()) {
                return response(["message" => "Email already verified."], 200);
            }

            $request->user()->sendEmailVerificationNotification();

            return response(["message" => "Verification link sent!"], 200);
        }

        return response(["message" => "Unauthenticated."], 401);
    }
}
