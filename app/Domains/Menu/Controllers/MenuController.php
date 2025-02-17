<?php

namespace App\Domains\Menu\Controllers;

use App\Domains\Menu\Models\Menu;
use App\Domains\Utils\Traits\ControllerTrait;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    use ControllerTrait;

    // 메뉴관리 페이지
    public function viewMenu(Request $request){
        $user = $request->user();
        return view('menu.menu',[
            'user' => $user
        ]);
    }

    // 새로운 메뉴 페이지
    public function viewNewMenu(Request $request){
        $user = $request->user();
        return view('menu.new-menu');
    }

    public function getMenuList(Request $request){
        $user = $request->user();
//        if($request->input('count') < 0) {
//            return response()->json(['errors' => '숫자 입력값을 확인해주세요.'], 422);
//        }
//        $user->table_count = $request->input('count');
//        $user->save();
    }
    
    // 새로운 메뉴 생성
    public function updateNewMenu(Request $request){
        // todo 서비스단으로 옮기기
        try {
            $menu = Menu::create([
                'category' => $request->input('category'),
                'tag' => $request->input('tag'),
                'title' => $request->input('title'),
                'content' => $request->input('content') ?? null,
                'sub_title' => $request->input('sub_title'),
                'price' => $request->input('price'),
                'img_url' => $request->input('img_url'),
            ]);
        }catch(Exception $e){
            return $this->errorResponse($e->getMessage(), $e->getCode(), 422);
        }

        return $this->successResponse([
            'menu' => $menu,
        ]);
    }
}