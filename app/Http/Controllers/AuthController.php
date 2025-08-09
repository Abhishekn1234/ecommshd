<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $response = Http::post('https://app.ecominnerix.com/api/login', $request->only('email', 'password'));

        if ($response->successful()) {
            session(['user' => $response->json()]);
            return redirect('/home');
        }

        return back()->withErrors(['msg' => 'Login failed']);
    }

    public function showOtpLoginForm()
    {
        return view('otp-login');
    }

    public function requestOtp(Request $request)
    {
        $email = $request->email;

        $response = Http::post('https://app.ecominnerix.com/api/request-otp', [
            'email' => $email
        ]);

        Log::info('OTP Request API Response', [
            'status' => $response->status(),
            'body'   => $response->body(),
            'json'   => $response->json(),
        ]);

        if ($response->successful() && isset($response->json()['otp'])) {
            session()->put('email', $email);
            session()->put('otp', $response->json()['otp']);
            session()->put('otp_time', now());

            return redirect()->route('otp.verify.form')->with('message', 'OTP sent to your email.');
        }

        $errorMsg = $response->json()['message'] ?? 'Failed to send OTP.';
        return back()->withErrors(['otp_error' => $errorMsg]);
    }

    public function showOtpVerifyForm()
    {
        return view('verify-otp', [
            'email' => session('email') ?? '',
            'otp'   => session('otp') ?? ''
        ]);
    }

    public function verifyOtp(Request $request)
    {
        $email = session('email');
        $enteredOtp = $request->otp;

        if (!$email || !$enteredOtp) {
            return back()->withErrors(['otp_error' => 'Missing email or OTP.']);
        }

        if (now()->diffInMinutes(session('otp_time')) > 5) {
            session()->forget(['email', 'otp', 'otp_time']);
            return back()->withErrors(['otp_error' => 'OTP expired. Please request again.']);
        }

        $response = Http::post('https://app.ecominnerix.com/api/verify-email-otp', [
            'email' => $email,
            'otp'   => $enteredOtp
        ]);

        Log::info('OTP Verify API Response', [
            'status' => $response->status(),
            'body'   => $response->body(),
            'json'   => $response->json(),
        ]);

        if ($response->successful() && $response->json('status') === true) {
            session()->forget(['email', 'otp', 'otp_time']);
            session(['user' => $response->json()]);

            return redirect('/home')->with('message', 'OTP verified successfully!');
        }

        $errorMsg = $response->json('message') ?? 'OTP verification failed.';
        return back()->withErrors(['otp_error' => $errorMsg]);
    }

    public function showRegisterForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $response = Http::post('https://app.ecominnerix.com/api/register', $request->all());

        if ($response->successful()) {
            return redirect('/login')->with('success', 'Registered successfully. Please login.');
        }

        $errorMsg = $response->json('message') ?? 'Registration failed.';
        return back()->withErrors(['msg' => $errorMsg]);
    }

    public function logout(Request $request)
    {
        $request->session()->forget('user');
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'You have been logged out successfully.');
    }
}
