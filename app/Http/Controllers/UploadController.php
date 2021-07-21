<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;

use App\Http\Controllers\Controller;

class UploadController extends Controller
{
    public function upload(Request $request){
        if($request->method()== 'POST'){
            $file = $request->file('file');
            if($file->isValid()){
                $path = $file->path();
                $extension = $request->file('file')->extension();
                // dd($path);
                // $extension = 'jpg';

                $allow_ext = ['jpg','jpeg','png','gif','doc','docx','pdf'];
                //是否在允许的文件后缀中
                if(in_array(strtolower($extension),$allow_ext)){
                    $src = Storage::putFile('/public/avatars',$file);
                    $output=[
                        'extension'=>$extension,
                        'path'=>$path,
                        'src'=>$src,
                        'code'=>200,
                    ];
                    return $output;
                    dd($output);
                }else{
                    dd($extension.'上传后缀不允许！！！');
                }
            }
        }else{
            return view('upload');
        }
    }

}
