<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Mail\EmailVerificationMail;
use App\Mail\EmailVerificationMailForgotPwd;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class UserController extends Controller
{
    // Show Register/Create Form
    public function create()
    {
        return view("users.register");
    }

    // Create New User
    public function store(Request $request)
    {
        $formFields = $request->validate([
            "name" => ["required", "min:3"],
            "email" => ["required", "email", Rule::unique("users", "email")],
            "password" => "required|confirmed|min:6"
        ]);

        $formFields["email_verification_code"] = Str::random(40);
        $formFields['remember_token'] = Str::random(10);


        // Hash Password
        $formFields["password"] = bcrypt($formFields["password"]);

        // dd($formFields);

        // Create Form Fields Session
        $_SESSION["formFields"] = $formFields;
        $emailDir = "emails.email_verification_mail";

        // Set Email Session for resend email Functionality
        $_SESSION["mail"] = $emailDir;

        // Send email
        if (Mail::to($request->email)->send(new EmailVerificationMail($formFields))) {
            // Create User
            User::create($formFields);

            return redirect(route("notifyauth"))->with("message", "An email has been sent to your email account, please verify that it's you");
        } else {
            return back()->with("message", "email could not send");
        }
    }

    // Log User Out
    public function logout(Request $request)
    {
        auth()->logout();

        // Invalidate and Regenerate User token
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route("home"))->with("message", "You have been logged out");
    }

    // Show Login Form
    public function login()
    {
        return view("users.login");
    }

    // Authenticate User and Login
    public function authenticate(Request $request)
    {
        $formFields = $request->validate([
            "email" => ["required", "email"],
            "password" => "required"
        ]);

        // Authenticate Log In Credentials
        if (auth()->attempt($formFields)) {
            $request->session()->regenerate();
            return redirect(route("home"))->with("message", "You have logged in successfully");
        }

        // To pass errors for only the email
        return back()->withErrors(["email" => "Invalid Credentials"])->onlyInput("email");

    }

    // Verify Email
    public function verify_email($verification_code)
    {
        $user = User::where("email_verification_code", $verification_code)->first();
        if (!$user) {
            return redirect(route("register"))->with("message", "Invalid URL");
        } else {
            if ($user->email_verified_at) {
                return redirect(route("register"))->with("message", "Email has already been verified");
            } else {
                // Unset formFields and mail
                unset($_SESSION["formFields"]);
                unset($_SESSION["mail"]);

                $user->update([
                    "email_verified_at" => \Carbon\Carbon::now()
                ]);
                return redirect(route("login"))->with("message", "Email verified successfully");
            }
        }
    }

    // Show Email Verification Notification
    public function notifyauth()
    {
        return view("users.notifyauth");
    }

    // Show Forgot Password Email form
    public function checkemail()
    {
        return view("users.checkemail");
    }

    // Show Forgot Password Email confirm
    public function confirmemail(Request $request)
    {
        $formFields = $request->validate([
            "email" => ["required", "email"]
        ]);

        $user = User::where("email", $formFields["email"])->first();

        if ($user) {

            // Get Values from database
            $email_verification_code = $user->email_verification_code;
            $name  = $user->name;
            $formFields["email_verification_code"] = $email_verification_code;
            $formFields["name"] = $name;

            // Set formFields session
            $_SESSION["formFields"] = $formFields;

            // Set Email Directory
            $emailDir = "emails.email_verification_mail_forgotpwd";

            // Set Email Session for resend email Functionality
            $_SESSION["mail"] = $emailDir;

            // Send Verification Email
            if (Mail::to($formFields["email"])->send(new EmailVerificationMailForgotPwd($formFields))) {
                return redirect(route("notifyauth"))->with("message", "An email has been sent to your email account, please verify that it's you");
            } else {
                return back()->with("message", "email could not send");
            }
        } else {
            return back()->with("message", "This email does not exists");
        }
    }

    // Verify email_verification_code To Reset Password
    public function verify_code($verification_code)
    {
        $user = User::where("email_verification_code", $verification_code)->first();
        if (!$user) {
            return redirect(route("checkemail"))->with("message", "Invalid URL please input your email again");
        } else {
            // Unset formFields and mail
            unset($_SESSION["formFields"]);
            unset($_SESSION["mail"]);

            // Set User Id Session
            session()->put("user_id", $user->id);
            // echo session("user_id");
            return redirect(route("password"))->with("message", "You can now reset your password");
        }
    }

    // Show Reset Password Forms
    public function password()
    {
        return view("users.password-reset");
    }

    // Reset User Password
    public function pwd_reset(Request $request)
    {
        // Validate Form
        $formFields = $request->validate([
            "password" => "required|confirmed|min:6"
        ]);

        //  Hash Password
        $formFields["password"] = bcrypt($formFields["password"]);

        // Set User Id
        if (session()->has("user_id")) {
            $id = session("user_id");

            // Check if User exists
            $user = User::where("id", $id)->first();
            if ($user) {
                // Set User new Password value
                $user->password = $formFields["password"];

                // Update the User credentials
                $user->update();

                //Unset User id session
                session()->invalidate();
                session()->regenerateToken();

                // Redirect Back to login page
                return redirect(route("login"))->with("message", "Password successfully changed you can now login");
            }
        } else {
            return redirect(route("confirmemail"))->with("message", "You are not ellegible to perform this action at the moment, pls you can try again when you are legible");
        }
    }

    // Resend Verification Email
    public function resendEmail()
    {
        if (isset($_SESSION["mail"]) && isset($_SESSION["formFields"])) {
            if (Mail::to($_SESSION["formFields"]["email"])->send(new EmailVerificationMailForgotPwd($_SESSION["formFields"]))) {

                // Unset these sessions
                unset($_SESSION["formFields"]);
                unset($_SESSION["mail"]);

                // redirect to notifyauth page
                return back()->with("message", "An email has been resent to your email account, please verify that it's you");
            } else {
                return back()->with("message", "email could not send");
            }
        } else {
            return back()->with("message", "You are not legible to perform this action at the moment, pls you can try again when you are legible");
        }
    }
}
