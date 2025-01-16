<?php

namespace App\Domains\Auth\Controllers;

use App\Domains\Auth\Services\AuthServiceInterface;
use App\Domains\Utils\Traits\ControllerTrait;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    use ControllerTrait;

    public function __construct(private AuthServiceInterface $authService)
    {
    }

    public function viewJoin()
    {
        return view('auth-v2.create');
    }

    public function join(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'  => 'required|string|max:100', // 회원 이름
            'company_name'  => 'required|string|max:50', // 회사 이름
            'phone_number' => 'required|string|max:50', // 회원 연락처
            'email'      => 'required|string|email|max:255|unique:users', // 회원 이메일
            'password'   => 'required|string|min:6|confirmed',
            'business_number'  => 'required|string|max:50', // 사업자 번호
            'company_number'  => 'required|string|max:50', // 회사 연락처
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()], 422);
        }

        try {
            $user = $this->authService->create([
                'name' => $request->input('name'),
                'company_name' => $request->input('company_name'),
                'phone_number' => $request->input('phone_number'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
                'business_id' => $request->input('business_number'),
                'company_number' => $request->input('company_number')
            ]);
        }catch(Exception $e){
            return $this->errorResponse($e->getMessage(), $e->getCode(), 422);
        }

        return $this->successResponse([
            'email' => $user->getEmail(),
            'name' => $user->getName(),
        ]);
    }

    public function viewLogin()
    {
        return view('auth-v2.login');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'    => 'required|string|email|max:255',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()], 422);
        }

        $user = $this->authService->findUser($request->input('email'));
        if(!$user) {
            return response()->json(['errors' => '가입되지 않은 이메일입니다.'], 422);
        }

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);


        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/auth');
        }

        return response()->json(['errors' => '이메일 혹은 비밀번호를 확인해주세요.'], 422);
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/auth/login');
    }
}