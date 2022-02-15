<?php

namespace App\Http\Controllers\Articles;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Articles;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // index() show() -> guest 허용

//    $allTags란 변수 포험을 위한 모든 뷰 공유
//    public function __construct()
//    {
//        $this->middleware('auth', ['except'=> ['index', 'show']]);
//        $this->middleware('accessible', ['except' => ['index', 'show', 'create']]);
//        view()-> share('allTags', \App\Tag::with('articles')->get());
//        parent::__construct();
//    }

    public function show(\App\Article $article)
    {
        return view('articles.show', compact('article'));
    }

    public function index()
    {
//        $articles = \App\Article::get();
        // __METHOD__ Article 컬렉션을 조회
//        $articles = Articles::with('comments', /'author')->latest()->paginate(2);
//        $articles = Articles::where('id', '1')->first();
//        return view('articles.index', compact('article'));
        return view('articles.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 컬렉션을 만들기 위한 폼을 담은 뷰를 반환한다
        return view('articles.articleCreate');
        /**
         * @create 메서드에서 숨은 필드로 _token 값을 담아 새로운 모델을 만들기 폼을 응답한다
         */
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // csrf token 검사를 통과하면 articlesController@store 메서드에 작업을 위임하고,
        // 그렇지 않으면 TokenMismatchException을 던진다
        // 사용자의 입력한 폼 데이터로 새로운 article 컬렉션을 만든다
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
//    public function show(\App\Http\Controllers\Articles $articles)
//    {
//        // 다음 기본키를 가진 article 모델을 조회한다
//        return view('articles.show', compact('articles'));
//    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // 다음 기본키를 가진 article 모델을 수정하기 위한 폼을 담은 뷰를 반환한다
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // 사용자의 입력한 폼 데이터로 다음 기본 키를 가진 article 모델을 수정한다
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // 기본키를 사진 article 모델 삭제한다
    }
}
