<?php

namespace App\Http\Controllers;

use App\Article;
use App\Events\ArticlesEvent;
use App\Http\Requests\ArticlesRequest;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

//use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use function Psy\debug;
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
        $this->middleware('auth', ['except' => ['index', 'show']]);
//        $this->middleware('accessible', ['except' => ['index', 'show', 'create']]);
//        view()-> share('allTags', \App\Tag::with('articles')->get());
//        parent::__construct();
    }

    public function show($id)
    {
        //\App\Article $article
//        return __METHOD__ . '다음 기본 키를 가진 article 모델을 조회한다.' . $id;
        $article = \App\Article::findOrFail($id);
        dd($article->toArray());
        return view('articles.show', compact('article'));

//        return $article->toArray();
    }

    public function index()
    {
        // 페이지 네이터 latest()
         $articles = \App\Article::latest()->paginate(10);
//         dd(view('articles.index', compact('articles'))->render());
         // render -> html 소스 코드를 보여준다
//         -> 쿼리 결과를 날짜 역순으로 정렬하는 도우미 메서드 -> orderBy('created_at', 'desc')와 같다

        // __METHOD__ Article 컬렉션을 조회
//        $articles = Articles::with('comments', /'author')->latest()->paginate(2);
//        $articles = Articles::where('id', '1')->first();
//        return view('articles.index', compact('article'));
        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response/
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
//        var_dump(\App\User::find(1)->articles()); exit();

//        return __METHOD__ . '사용자의 입력한 폼 데이터로 새로운 article 컬렉션을 만든다';

        $rules = [
            // 폼이 유효하지 않은 값을 전송했을 때 오류 메시지 표시되고, 직전 입력이 남아있는지 확인한다 (required:필수)
            'title' => ['required', 'max:255'],
            'content' => ['required', 'min:5'],
        ];

        $message = [
            'title.required' => '제목은 필수 입력 항목입니다.',
            'content.required' => '본문은 필수 입력 항목입니다.',
            'content.min' => '본문은 최소 5자 글자 이상 필요합니다.',
        ];

        $validator = \Validator::make($request->all(), $rules, $message);

        if ($validator->fails()) {
            // 유효성 검사  -> bool 반환하는데, 유효성 검사를 통과하지 않는다면 true 반환한다
            return back()->withErrors($validator)
                ->withInput();
            // withInput() 폼 데이터를 세션에 굽는 일, 뷰의 old() 함수는 이메서드가 구운 값을 읽는다
        }

//        $article = $request->user()->articles()->create($request->getPayload());
         $article = \App\User::find(1)->articles()->create($request->all());
        if (!$article) {
            return back()->with('flush_message', '글을 저장되지 않았습니다.')
                ->withInput();
        }
        dump('이벤트를 던져봅니다');
        event(new \App\Events\ArticlesCreated($article));
        dump('이벤트를 받았습니다.');
//        return $this->respondCreated($article);
        return redirect(route('articles.index'))
            ->with('flash_message', '작성하신 글이 저장되었습니다.');
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


    protected function respondCreated($article)
    {
        flash()->success(
            trans('forum.articles.success_writing')
        );

        return redirect(route('articles.show', $article->id));
    }
}
