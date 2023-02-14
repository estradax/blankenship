<?php

namespace App\Http\Controllers;

use http\Exception\RuntimeException;
use Illuminate\Http\Request;

class UpdateProfileController extends Controller
{
    /**
     * @throws \Throwable
     */
    public function __invoke(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required']
        ]);

        $isUpdated = auth()->user()->update([
            'name' => $validated['name']
        ]);

        throw_unless($isUpdated, RuntimeException::class);

        return response()->noContent();
    }
}
