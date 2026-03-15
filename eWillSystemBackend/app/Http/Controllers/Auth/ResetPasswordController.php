<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Helpers\MailHelper;
use Illuminate\Support\Facades\Session;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    // for admins and frontend system users
    /**
     * Send a password reset OTP to the user's email.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function sendOtp(Request $request)
    {
        $request->validate(["email" => "required|email"]);

        // Check if the user exists
        $email = $request->input("email");
        $user = User::where("email", $email)->first();

        if (!$user) {
            return response()->json(["message" => "User not found."], 404);
        }

        // Generate OTP
        $resetOtp = random_int(100000, 999999);
        $user->otp = $resetOtp;
        $user->otp_expires_at = now()->addMinutes(10); // OTP expires in 10 minutes
        $user->save();

        // Send OTP via email
        if (
            MailHelper::sendMail($user->email, "password_reset", [
                "otp" => $resetOtp,
            ])
        ) {
            return response()->json([
                "status" => 200,
                "message" => "OTP sent to your email. Please verify.",
            ]);
        } else {
            return response()->json(
                ["message" => "Failed to send OTP email to {$user->email}."],
                500
            );
        }
    }

    // forfrontend system users
    public function sendFrontResetOtp(Request $request)
    {
        $request->validate(["email" => "required|email"]);

        // Check if the user exists
        $email = $request->input("email");
        $user = User::where("email", $email)->first();

        if (!$user) {
            return response()->json(["message" => "User not found."], 404);
        }

        // Generate OTP
        $resetOtp = random_int(100000, 999999);
        $user->otp = $resetOtp;
        $user->otp_expires_at = now()->addMinutes(10); // OTP expires in 10 minutes
        $user->save();

        // Send OTP via email
        if (
            MailHelper::sendMail($user->email, "password_reset", [
                "otp" => $resetOtp,
            ])
        ) {
            return response()->json([
                "status" => 200,
                "message" => "OTP sent to your email. Please verify.",
            ]);
        } else {
            return response()->json(
                ["message" => "Failed to send OTP email to {$user->email}."],
                500
            );
        }
    }

    /**
     * Verify the OTP and reset the user's password.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\RedirectResponse
     */
    public function verifyOtp(Request $request)
    {
        $request->validate([
            "email" => "required|email",
            "otp" => "required|numeric",
        ]);

        // Validate email and OTP
        $user = User::where("email", $request->input("email"))
            ->where("otp", $request->input("otp"))
            ->where("otp_expires_at", ">=", now()) // Ensure OTP is not expired
            ->first();

        if (!$user) {
            return response()->json(
                ["message" => "Invalid OTP or email."],
                400
            );
        }

        // Clear OTP after successful verification
        $user->update([
            "otp" => null,
            "otp_expires_at" => null,
        ]);

        // Redirect to password reset form
        return response()->json(
            [
                "message" => "OTP verified. Redirecting to password reset.",
                "redirect" => route("request.password"),
            ],
            200
        );
    }

    // for front reset password otp verification
    public function verifyResetOtp(Request $request)
    {
        $request->validate([
            "email" => "required|email",
            "otp" => "required|numeric",
        ]);

        // Validate email and OTP
        $user = User::where("email", $request->input("email"))
            ->where("otp", $request->input("otp"))
            ->where("otp_expires_at", ">=", now()) // Ensure OTP is not expired
            ->first();

        if (!$user) {
            return response()->json(
                ["message" => "Invalid OTP or email."],
                400
            );
        }

        // Clear OTP after successful verification
        $user->update([
            "otp" => null,
            "otp_expires_at" => null,
        ]);

        // Redirect to password reset form
        return response()->json(
            [
                "message" => "OTP verified. Redirecting to password reset.",
            ],
            200
        );
    }

    // for frontsystem
    public function resetPassword(Request $request)
    {
        // Validate the request
        $request->validate([
            "email" => "required|email|exists:users,email",
            "password" => "required|confirmed|min:8",
        ]);

        // Find the user by email
        $user = User::where("email", $request->email)->first();

        if (!$user) {
            return response()->json(
                [
                    "message" => "User not found.",
                ],
                404
            );
        }

        // Update the user's password
        $user->update([
            "password" => Hash::make($request->password),
        ]);

        // Return success response
        return response()->json(
            [
                "message" => "Password reset successfully.",
            ],
            200
        );
    }

    /**
     * Verify the OTP and reset the user's password.
     *
     * @return Illuminate\Http\JsonResponse
     */
    public function passwordReset(Request $request)
    {
        $request->validate([
            "email" => "required|email",
            "current_password" => "required",
            "new_password" => "required|min:8|confirmed", // Ensures passwords match
        ]);

        $user = User::where("email", $request->input("email"))->first();

        // Validate current password
        if (
            !$user ||
            !Hash::check($request->input("current_password"), $user->password)
        ) {
            return response()->json(
                ["message" => "Invalid current password or email."],
                400
            );
        }

        // Update password
        $user->update([
            "password" => Hash::make($request->input("new_password")),
        ]);

        // Return success response with redirect
        return response()->json(
            [
                "message" => "Password updated successfully.",
                "redirect" => route("login"),
            ],
            200
        );
    }
}
