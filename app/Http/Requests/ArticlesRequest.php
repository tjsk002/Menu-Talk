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

    public function store(ArticlesRequest $request){

    }

    /**
     * @return \string[][]
     * 폼 퀘스트 클래스 이용
     */
    public function rules()
    {
        return [
            'title'=>['required'],
            'content'=>['required','min:5'],
        ];
    }

    public function messages()
    {
        return [
            'required'=>':attribute 필수 입력 사항입니다.',
            'contend'=>':attribute 최소 5글자 이상이 필요합니다.'
        ];

    }

    public function attributes()
    {
        return [
          'title'=>'제목',
          'content'=>'본문',
        ];
    }
}