<?php

namespace App\Http\Controllers\Board;

use Illuminate\Http\Request;

class BoardController
{
    // 게시판 페이지
    public function board(Request $request)
    {
        return view('board.board');
    }
    public function write(Request $request)
    {
        return view('board.boardWrite');
    }

//    public function show(\App\ ){
//        return view('.show', compact(''));
//    }

    // 게시판 상세보기
    public function detail(Request $request)
    {
        return view('admin.board.detail');
    }

    // 게시판 리스트
    public function list(Request $request)
    {
        return view('admin.board.boards');
    }
}
?>