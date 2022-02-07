<?php

namespace App\Http\Controllers\Admin;

//use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // __METHOD__ Article 컬렉션을 조회
        return view('admin.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 컬렉션을 만들기 위한 폼을 담은 뷰를 반환한다
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 사용자의 입력한 폼 데이터로 새로운 article 컬렉션을 만든다
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // 다음 기본키를 가진 article 모델을 조회한다

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // 다음 기본키를 가진 article 모델을 수정하기 위한 폼을 담은 뷰를 반환한다
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // 사용자의 입력한 폼 데이터로 다음 기본 키를 가진 article 모델을 수정한다
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // 기본키를 사진 article 모델 삭제한다
    }
}
