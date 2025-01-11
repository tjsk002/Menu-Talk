<?php

namespace App\Http\Controllers;

use App\Domains\Utils\Traits\ControllerTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersController extends Controller
{
    use ControllerTrait;
    /**
     * 사용자 등록
     */
    public function __construct()
    {
       $this->middleware('guest')->except('logout');
       // except logout 제외
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
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
            $user = User::create([
                'name' => $request->input('name'),
                'company_name' => $request->input('company_name'),
                'phone_number' => $request->input('phone_number'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
                'business_id' => $request->input('business_number'),
                'company_number' => $request->input('company_number')
            ]);
        }catch(Exception $e){
            return response()->json(['message' => 'fail', 500]);
        }

        return response()->json(['message' => 'success'], 200);
//        return $this->successResponse('가입하신 메일 계정으로 가입 확인 메일을 보내드렸습니다. 가입 확인 하시고 로그인해 주세요.');
    }

    protected function respondCreated($message)
    {
        flash($message);
        return redirect('/');
    }

//     public function confirm($code)
//     {
//         $user = \App\User::whereConfirmCode($code)->first();
//
//         if (!$user) {
//             flash('URL이 정확하지 않습니다.');
//             return redirect('/');
//         }
//         $user->activated = 1;
//         $user->confirm_code = null;
//         $user->save();
//
//         auth()->login($user);
//         flash(auth()->user()->name . '님 환영합니다. 가입 확인되었습니다.');
//
//         return redirect('/');
//     }


}
