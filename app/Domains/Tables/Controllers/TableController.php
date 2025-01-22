<?php

namespace App\Domains\Tables\Controllers;

use App\Domains\Utils\Traits\ControllerTrait;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TableController extends Controller
{
    use ControllerTrait;

    public function viewTable(Request $request){
        $user = $request->user();
        return view('tables.table',[
            'user' => $user
        ]);
    }

    public function updateTable(Request $request){
        $user = $request->user();
        if($request->input('count') < 0) {
            return response()->json(['errors' => '숫자 입력값을 확인해주세요.'], 422);
        }
        $user->table_count = $request->input('count');
        $user->save();
    }
}