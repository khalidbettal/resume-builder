<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class ProviderController extends Controller
{
    /**
     * Redirect to the provider for authentication.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function redirectToProvider(Request $request)
    {
        $providerValue = $request->provider;

        // Validate the provider to ensure it's supported
        if (!in_array($providerValue, ['google', 'linkedin', 'github'])) {
            return redirect()->route('home')->with('error', 'Unsupported provider.');
        }

        // Store the previous URL to redirect back after login
        session()->put('previous_url', url()->previous());

        return Socialite::driver($providerValue)->redirect();
    }

    /**
     * Handle the provider callback after authentication.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handleProviderCallback(Request $request)
    {
        $providerValue = $request->provider;

        // Validate the provider to ensure it's supported
        if (!in_array($providerValue, ['google', 'linkedin', 'github'])) {
            return redirect()->route('home')->with('error', 'Unsupported provider.');
        }

        $previousUrl = $request->session()->pull('previous_url', route('home')); // Use a named route as default

        try {
            $providerUser = Socialite::driver($providerValue)->user();

            // Find or create the user based on provider details
            $user = User::updateOrCreate(
                [
                    $providerValue . '_id' => $providerUser->id, // Match user by provider ID dynamically
                ],
                [
                    'name' => $providerUser->name,
                    'email' => $providerUser->email,
                    'password' => Hash::make(Str::random(16)), // Generate a secure random password
                ]
            );

            // Log in the user
            Auth::login($user);
            $request->session()->regenerate();

            return redirect()->intended($previousUrl);
        } catch (\Exception $e) {
            // Log the exception for debugging
            logger()->error($providerValue . ' OAuth callback error', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            // Redirect to a safe fallback with a flash message
            return redirect()->route('home')->with('error', 'Unable to log in with ' . ucfirst($providerValue) . '. Please try again.');
        }
    }
}
