<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use RuntimeException;
use Throwable;

class UpdateProfileController extends Controller
{
    /**
     * @throws Throwable
     */
    public function __invoke(Request $request): Response
    {
        $validated = $request->validate([
            'name' => ['required'],
        ]);

        $isUpdated = auth()->user()->update([
            'name' => $validated['name'],
        ]);

        throw_unless($isUpdated, RuntimeException::class);

        return response()->noContent();
    }
}
