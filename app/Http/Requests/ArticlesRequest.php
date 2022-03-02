<?php

namespace App\Http\Requests;
//Attachment-> 파일 첨부 기능
//use App\Attachment;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Database\Eloquent\Collection;

class ArticlesRequest extends FormRequest
{

    public function authorize(){
        // 권한
        return true;
    }

    /**
     * @return mixed
     */
    public function getPayload()
    {
        return array_merge($this->all(), [
            // 'notification' 입력 값을 머지한 사용자 입력값을 조회합니다.
            'notification' => $this->has('notification'),
        ]);
    }

    public function rules()
    {
        return [];
    }
}