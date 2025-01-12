<?php

namespace App\Domains\Auth\Controllers;

use App\Domains\Auth\Resources\AuthCollection;
use App\Domains\Auth\Services\AuthServiceInterface;
use App\Domains\Utils\Traits\ControllerTrait;
use App\Http\Controllers\Controller;
use Exception;
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

    // 로그인
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);


//        $user = \App\User::create([
//            // DB에 입력한 값 input
//            'name' => $request->input('name'),
//            //  Request::input('name')과 같다
//            'email' => $request->input('email'),
//            'password' => bcrypt($request->input('password')),
//            'confirmCode'=> $confirmCode,
////            'businessNumber' => $request->input('business_number')
//        ]);
//
//        auth()->login($user);
//        flash(auth()->user()->name . '님 환영합니다.');

        /**
         * 이메일 보내기 추출 -> 컨트롤러에서 가입 확인 메일을 보내지말고, 이벤트를 던져 이벤트 리스너에서 메일을 보낸다
         */

//        event(new \App\Events\UserCreated($user));
//        \Mail::send('emails.auth.confirm',compact('user'), function ($message)use($user){
//        event(new \App\Events\UserCreated($user));
//            $message->to($user -> email);
//            $message->subject(
//                sprintf('[%s 회원가입을 확인해 주세요.]', config('app.name'))
//            );
//        });

//        return $this->respondCreated('가입하신 메일 계정으로 가입 확인 메일을 보내드렸습니다. 가입 확인 하시고 로그인해 주세요.');
//        flash('가입하신 메일 계정으로 가입 확인 메일을 보내드렸습니다. 가입 확인 하시고 로그인해 주세요.');
//        return redirect('/');

//        auth()->login($user);
        // 생성한 사용자 객체로 로그인한
//        flash(auth()->user()->name . '님 환영합니다');
    }

    public function viewJoin()
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
}