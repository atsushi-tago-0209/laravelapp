<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\HelloRequest;
use Validator;
use Illuminate\Support\Facades\DB;


class HelloController extends Controller
{
    public function index(Request $request)
    {
        if ($request->hasCookie('msg'))
        {
            $msg = 'Cookie'.$request->cookie('msg');
        } else {
            $msg = 'クッキーはありません。';
        }
        return view('hello.index',['msg'=>$msg]);
    }

    public function post(HelloRequest $request)
    {
        $validate_rule = [
            'msg' => 'required',
        ];
        $this->validate($request,$validate_rule);
        $msg = $request->msg;
        $response = response()->view('hello.index',['msg'=>'「'.$msg.'」をクッキーに保存しました。']);
        $response->cookie('msg',$msg,100);
        return $response;
    }
    // public function index(Request $request)
    // {
    //     $validator = Validator::make($request->query(),[
    //         'id'=>'required',
    //         'pass'=>'required',
    //     ]);
    //     if($validator->fails()){
    //         $msg='クエリに問題があります。';
    //     } else {
    //         $msg='ID/PASSを受け付けました。フォームを入力してください。';
    //     }
    //     return view('hello.index', ['msg'=>$msg,]);
    // }
    // public function post(Request $request)
    // {
    //     $rules = [
    //         'name'=>'required',
    //         'mail'=>'email',
    //         'age'=>'numeric|between:0,100',
    //     ];

    //     $messages = [
    //         'name.required' => '名前はかならず入力してください。',
    //         'mail.email' => 'メールアドレスが必要です',
    //         'age.numeric' => '年齢を整数で入力してください。',
    //         'age.min' => '年齢はゼロ歳以上で記入ください',
    //         'age.max' => '年齢は100歳以下で記入ください',
    //     ];

    //     $validator = Validator::make($request->all(),$rules,$messages);
    //     $validator->sometimes('age','min:0',function($input){
    //         return !is_int($input->age);
    //     });
    //     $validator->sometimes('age','max:100',function($input){
    //         return !is_int($input->age);
    //     });
    //     if($validator->fails()){
    //         return redirect('/hello')->withErrors($validator)->withInput();
    //     }
    //     return view('hello.index', ['msg'=>'正しく入力されました。']);
    // }
}

