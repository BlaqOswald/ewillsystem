<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Helpers\MailHelper;
use App\Models\User;

class LoginController extends Controller
{
    use \Illuminate\Foundation\Auth\AuthenticatesUsers;

    protected $redirectTo = "/home";

    /**
     * Handle login and send OTP for verification.
     */
    public function sendLoginOtp(Request $request)
    {
        $request->validate([
            "username" => "required|string",
            "password" => "required|string",
        ]);

        $credentials = $request->only("username", "password");

        // Validate credentials
        if (Auth::validate($credentials)) {
            // Retrieve user by username
            $user = User::where("username", $request->username)->first();

            if ($user && $user->email) {
                // Generate OTP
                $otp = random_int(100000, 999999);
                $user->otp = $otp;
                $user->otp_expires_at = now()->addMinutes(10); // OTP expires in 10 minutes
                $user->save();

                // Send OTP via email
                if (
                    MailHelper::sendMail($user->email, "otp", ["otp" => $otp])
                ) {
                    // Store username in session for OTP verification
                    Session::put("username_for_otp", $user->username);

                    return response()->json([
                        "status" => 200,
                        "message" => "OTP sent to your email. Please verify.",
                    ]);
                } else {
                    return response()->json(
                        [
                            "status" => 500,
                            "message" =>
                                "Failed to send OTP. Please try again.",
                        ],
                        500
                    );
                }
            }

            return response()->json(
                [
                    "status" => 404,
                    "message" =>
                        "User email not found. Please contact support.",
                ],
                404
            );
        }

        return response()->json(
            [
                "status" => 401,
                "message" => "Invalid username or password.",
            ],
            401
        );
    }

    /**
     * Handle OTP verification.
     */
    public function verifyOtp(Request $request)
    {
        $request->validate(["otp" => "required|numeric"]);

        $username = Session::get("username_for_otp");
        $user = User::where("username", $username)->first();

        if (
            $user &&
            $user->otp == $request->otp &&
            $user->otp_expires_at >= now()
        ) {
            // Log in the user and clear OTP
            Auth::login($user);
            $user->otp = null;
            $user->otp_expires_at = null;
            $user->save();

            Session::forget("username_for_otp");

            // Return success JSON response
            return response()->json([
                "status" => 200,
                "message" => "OTP Verified. Logging in.",
                "redirect" => url("/"), // Redirect URL after successful login
            ]);
        }

        // Return error JSON response for invalid or expired OTP
        return response()->json(
            [
                "status" => 401,
                "message" => "Invalid or expired OTP.",
            ],
            401
        );
    }
}
