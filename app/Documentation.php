<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use File;
class Documentation
{
    //
    public function get($file = 'documentation.md'){
        $content = File::get($this->path($file));
        return $this->replaceLinks($content);
    }

    /**
     * @param $file
     * @return string
     * 파일 경로를 계산하는 메서드이다
     */
    protected function path($file){
        $file = ends_with($file, '.md') ? $file : $file . '.md';
//       확장자 없이 파일을 요청했을 경우를 대비해서 확장자를 덧붙여주는 일을 하는 구분
        // needles -> $haystack 문자열이 $needle 문자열로 끝나는지 검사하는 함수이다
        $path = base_path('docs' . DIRECTORY_SEPARATOR . $file);
//      path -> 절대 경로를 반환하는 함수
        if(! File::exists($path)){
            // 파일이 있는지 확인하고 없으면 예외를 던져준다
            about(404, '요청하신 파일이 없습니다.');
        }
        return $path;
    }

    /**
     * @param $content
     * @return array|string|string[]
     */
    protected function replaceLinks($content){
            return str_replace('/docs/{{version}}', '/docs', $content);
    }
}
