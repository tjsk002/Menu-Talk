<?php

namespace App\Http\Controllers;

use App\Article;
use App\Events\ArticlesEvent;
use App\Http\Requests\ArticlesRequest;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use function view;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // index() show() -> guest 허용

//    $allTags란 변수 포험을 위한 모든 뷰 공유
    public function __construct()
    {
        $this->middleware('auth', ['except'=> ['index', 'show']]);
//        $this->middleware('accessible', ['except' => ['index', 'show', 'create']]);
//        view()-> share('allTags', \App\Tag::with('articles')->get());
//        parent::__construct();
    }

    public function show(Article $article)
    {
//        return __METHOD__ . '다음 기본 키를 가진 article 모델을 조회한다.' . $id;
        return view('articles.show',compact('article'));
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
        $article = new Article();
        return view('articles.create', compact('article'));
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

    public function store(ArticlesRequest $request)
    {
        // csrf token 검사를 통과하면 articlesController@store 메서드에 작업을 위임하고,
        // 그렇지 않으면 TokenMismatchException을 던진다
        // 사용자의 입력한 폼 데이터로 새로운 article 컬렉션을 만든다

        //auth 미들웨어에는 로그인 하지 않은 사용자가 이 메서드에 들어오는 것을 막아주고, null pointer 예외에 안전하다
        $user = $request->user();
        $article = $request->user()->articles()->create($request->getPayload());
//        return __METHOD__ . '사용자의 입력한 폼 데이터로 새로운 article 컬렉션을 만든다';

        flash('게시글 작성이 완료되었습니다.');

        if(! $article){
            flash()->error(
//              trans('forum.articles.error_writing')
                trans('일단 테스트')
            );
            return back()->withInput();
        }
        event(new ArticlesEvent($article));
//        return $this->respondCreated($article);
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
    public function edit(\App\Articles $article)
    {
        // 다음 기본키를 가진 article 모델을 수정하기 위한 폼을 담은 뷰를 반환한다
//        return __METHOD__ . '다음 기본 키를 가진 article 모델을 수정하기 위한 폼을 담은 뷰 반환한다' . $id;
        return view('articles.edit', compact('article'));
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
        return __METHOD__ . 'article 모델을 수정한다' . $id;
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
        return __METHOD__ . '기본키를 사진 article 모델 삭제한다' . $id;
    }


    protected function respondCreated($article){
        flash()->success(
            trans('forum.articles.success_writing')
        );

        return redirect(route('articles.show', $article->id));
    }
}
