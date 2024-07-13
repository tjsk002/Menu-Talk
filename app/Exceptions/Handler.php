<?php

namespace App\Exceptions;

use Exception;
//use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\HttpKernel;
use Throwable;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $exception
     * @return void
     */
//    public function report(Exception $e)
//    {
//        // 로그에 예외를 기록
//        parent::report($e);
//    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
//    public function render($request, Exception $exception)
//    {
//        if(app()->environment('production')){
//            $statusCode = 400;
//            $title = '죄송합니다. :(';
//            $description = '에러가 발생하였습니다.';
//
//            if($exception instanceof \Illuminate\Database\Eloquent\ModelNotFoundException or $exception instanceof \Symfony\Component\HttpKernel\Exception\NotFoundHttpException){
//                $statusCode = 404;
//                $description = $exception->getMessage() ?: '요청하신 페이지가 없습니다.';
//            }
//
//            return response(view('errors.notice',[
//                'title'=>$title,
//                'description'=>$description,
//            ]), $statusCode);
//        }
//        // render -> 예외를 화면에 표시하는 메서드
//        return parent::render($request, $exception);
//    }

    public function report(Throwable $e) // 여기에서 Exception을 Throwable로 변경
    {
        // 기존 로직
    }
}
