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

    public function show($file = null){
        $index = markdown($this->docs->get());
        $content = markdown($this->docs->get($file ?: 'installation.md'));

//        뷰의 왼쪽에 표시할 메뉴를 $index, 오른쪽에 표시할 본문을 $content(에) 담고 뷰에 넘긴다
        return view('docs.show', compact('index','content'));
    }
}
