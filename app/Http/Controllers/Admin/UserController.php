<?php

namespace App\Http\Controllers\Admin;

use App\Model\AdminUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;

class UserController extends Controller
{
    /**
     * 獲取用戶列表
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.user.list');
    }

    /**
     * 用戶添加頁面
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.add');
    }

    /**
     * 執行添加操作
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 接收表單提交數據
        $input = $request->all();

        // 添加數據庫的user
        $user_name = $input['email'];

        $pass = Crypt::encrypt($input['pass']);
        $res  = AdminUser::create(['user_name' => $user_name, 'user_pass' => $pass]);

        // 返回JSON格式反饋
        if ($res) {
            $data = [
                'status' => 0,
                'message' => '添加成功'
            ];
        } else {
            $data = [
                'status' => 0,
                'message' => '添加失敗'
            ];
        }
        return response()->json($data, 200);
    }

    /**
     * 顯示一條數據
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * 修改頁面
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * 修改操作
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * 刪除操作
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
