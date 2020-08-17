<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>歡迎頁面-X-admin2.0</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport"
        content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    @include('admin.public.styles')

    @include('admin.public.script')
    <!-- 讓IE8/9支持媒體查詢，從而兼容柵格 -->
    <!--[if lt IE 9]>
      <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
      <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <div class="x-body">
        <form class="layui-form">
            <div class="layui-form-item">
                <label for="L_email" class="layui-form-label">
                    <span class="x-red">*</span>郵箱
                </label>
                <div class="layui-input-inline">
                    <input type="text" id="L_email" name="email" required="" lay-verify="email" autocomplete="off"
                        class="layui-input">
                </div>
                <div class="layui-form-mid layui-word-aux">
                    <span class="x-red">*</span>將會成為您唯一的登入名
                </div>
            </div>
            {{-- <div class="layui-form-item">
                <label for="L_username" class="layui-form-label">
                    <span class="x-red">*</span>昵稱
                </label>
                <div class="layui-input-inline">
                    <input type="text" id="L_username" name="username" required="" lay-verify="nikename"
                        autocomplete="off" class="layui-input">
                </div>
            </div> --}}
            <div class="layui-form-item">
                <label for="L_pass" class="layui-form-label">
                    <span class="x-red">*</span>密碼
                </label>
                <div class="layui-input-inline">
                    <input type="password" id="L_pass" name="pass" required="" lay-verify="pass" autocomplete="off"
                        class="layui-input">
                </div>
                <div class="layui-form-mid layui-word-aux">
                    6到16個字符
                </div>
            </div>
            <div class="layui-form-item">
                <label for="L_repass" class="layui-form-label">
                    <span class="x-red">*</span>確認密碼
                </label>
                <div class="layui-input-inline">
                    <input type="password" id="L_repass" name="repass" required="" lay-verify="repass"
                        autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label for="L_repass" class="layui-form-label">
                </label>
                <button class="layui-btn" lay-filter="add" lay-submit="">
                    增加
                </button>
            </div>
        </form>
    </div>
    <script>
        layui.use(['form', 'layer'], function () {
            $ = layui.jquery;
            var form = layui.form,
                layer = layui.layer;

            //自定義驗證規則
            form.verify({
                nikename: function (value) {
                    if (value.length < 5) {
                        return '昵稱至少得5個字符啊';
                    }
                },
                pass: [/(.+){6,12}$/, '密碼必須6到12位'],
                repass: function (value) {
                    if ($('#L_pass').val() != $('#L_repass').val()) {
                        return '兩次密碼不一致';
                    }
                }
            });

            //監聽提交
            form.on('submit(add)', function (data) {
                console.log(data);
                //發異步，把數據提交給php
                $.ajax({
                    type: 'POST',
                    url: '/admin/user',
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: data.field,
                    success: function (data) {
                        // 彈出添加成功，刷新頁面
                        if (data.status == 0) {
                            layer.alert(data.message,{icon:6},function(){
                                parent.location.reload(true)
                            })
                        }else{
                            layer.alert(data.message,{icon:6})
                        }
                    },
                    error: function () {
                        // 錯誤訊息
                    }
                })

                // layer.alert("增加成功", {
                //     icon: 6
                // }, function () {
                //     // 獲得frame索引
                //     var index = parent.layer.getFrameIndex(window.name);
                //     //關閉當前frame
                //     parent.layer.close(index);
                // });
                return false;
            });


        });

    </script>
    <script>
        var _hmt = _hmt || [];
        (function () {
            var hm = document.createElement("script");
            hm.src = "https://hm.baidu.com/hm.js?b393d153aeb26b46e9431fabaf0f6190";
            var s = document.getElementsByTagName("script")[0];
            s.parentNode.insertBefore(hm, s);
        })();

    </script>
</body>

</html>
