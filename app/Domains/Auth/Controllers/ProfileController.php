<?php

namespace App\Domains\Auth\Controllers;

use App\Domains\Auth\Services\ProfileServiceInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct(private ProfileServiceInterface $profileService)
    {
    }

    public function viewProfile(Request $request)
    {
        $user = $request->user();
        return view('auth-v2.profile', [
            'user' => $user
        ]);
    }

    public function updateProfile(Request $request)
    {
        $user = $request->user();
        $user->name = $request->input('name');
        $user->phone_number = $request->input('phone_number');
        $user->company_name = $request->input('company_name');
        $user->business_id = $request->input('business_id');
        $user->company_number = $request->input('company_number');
        $user->save();
    }
}