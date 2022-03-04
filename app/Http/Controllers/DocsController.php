<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use function App\markdown;

class DocsController extends Controller
{
    // 목록, 쓰기, 수정, 삭제 -> html(로) 변환된 마크다운 문서의 내용을 보여 줄 상세보기 메서드
    protected $docs;

    public function __construct(\App\Documentation $docs)
    {
        $this->docs = $docs;
    }

    public function show($file = null)
    {
//        $index = markdown($this->docs->get());
//        $content = markdown($this->docs->get($file ?: 'installation.md'));
        /**
         * 캐시 적재를 위해 remember(를) 사용
         * 1. 캐시 키
         * 2. 유효 기간
         * 3. 클로저
         *
         * 캐시 저장소에서 유효 기간이 남은 캐시기간이 있으면 그 값을 읽어 반환하고,
         * 캐시 키가 없으면 클로저에서 값을 받아와 캐시 저장소에 저장하는 동시에 반환한다.
         *
         * 유효기간을 120분으로 잡아보자
         * 처음 적재 시점부터 120분이 지나면 캐시는 만료되고,
         * 해당 문서를 다시 요청 받을 때 캐시에 다시 적재한다.
         */
        $index = \Cache::remember('docs.index', 120, function () {
            return markdown($this->docs->get());
        });

        $content = \Cache::remember('docs.{$file}', 120, function () use ($file) {
            return markdown($this->docs->get($file?: 'installation.md'));
        });

        /**
         * use -> 클로저에 $file 변수를 바인딩 시키는 문법이다.
         * 만료되지 않은 캐시를 강제로 삭제할 때는 'php artisan cache:clear'
         * 데이터베이스 드라이버 -> 라라벨 5.5 이상 처음한번 실행해야한다.
         */


//        뷰의 왼쪽에 표시할 메뉴를 $index, 오른쪽에 표시할 본문을 $content(에) 담고 뷰에 넘긴다
        return view('docs.show', compact('index','content'));
    }
}
