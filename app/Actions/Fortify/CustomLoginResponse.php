<?php

// app/Actions/Fortify/CustomLoginResponse.php

namespace App\Actions\Fortify;

use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class CustomLoginResponse implements LoginResponseContract
{
    // public function toResponse($request)
    // {
    //     if ($request->wantsJson()) {
    //         return response()->json(['status' => 'success'], 200);
    //     }

    //     if ($request->user()->isAdmin()) {
    //         return redirect()->route('admin.dashboard');
    //     } else {
    //         return redirect()->route('user.dashboard');
    //     }
    // }
}
