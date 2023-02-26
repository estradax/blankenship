<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Resources\ResponseResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthenticatedSessionController extends Controller
{
    /**
     * Handle an incoming authentication request.
     *
     * @throws ValidationException
     */
    public function store(LoginRequest $request): ResponseResource
    {
        $request->authenticate();

        $request->session()->regenerate();

        return ResponseResource::success([
           'auth' => true
        ]);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): ResponseResource
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return ResponseResource::success([
            'logout' => true
        ]);
    }
}
