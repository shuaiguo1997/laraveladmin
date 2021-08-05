@extends('admin/parent')

@section('title')

@section('content')
    <div class="layui-fluid">
        <div class="layui-row" style="margin-top: 20px">
                <form class="layui-form" id="formname" action="{{route('admin.menulist.edit')}}" method="POST">
                    @csrf
                    
                    <input type="hidden" value="{{$id}}" name="id"> 
                    
                
                    <div class="layui-form-item">
                    <label for="title" class="layui-form-label">
                        <span class="x-red">*</span>菜单名称
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="title" name="title" required="" value="{{$all_data->title}}" lay-verify="required"
                        autocomplete="off" class="layui-input">
                    </div>
                    
                    </div>
                
                    <div class="layui-form-item">
                        <label for="" class="layui-form-label">
                            <span class="x-red">*</span>链接地址
                        </label>
                        <div class="layui-input-inline">
                            <input type="text" id="" name="url" required="" value="{{$all_data->url}}" lay-verify="required"
                            autocomplete="off" class="layui-input">
                        </div>
                        <div class="layui-form-mid layui-word-aux">
                            <span class="x-red">*</span>
                        </div>
                    </div>
                    @if ($all_data->pid!=0)
                        <div class="layui-form-item">
                            <label class="layui-form-label">选择父级</label>
                            <div class="layui-input-inline">
                            <select name="pid">
                                @foreach ($pdatas as $item)
                                    <option value="{{$item->id}}" @if ($all_data->pid==$item->id)
                                        selected = "selected"
                                    @endif>{{$item->title}}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>
                    @endif
                    
                    <div class="layui-form-item">
                        <label class="layui-form-label">选择图标</label>
                        <div class="layui-input-block">
                            <input type="text" id="iconPicker" name="icon" value="{{$all_data->icon}}" lay-filter="iconPicker" class="layui-input">
                        </div>
                    </div>
                    
                    
                    <div class="layui-form-item">
                        <label for="L_repass" class="layui-form-label">
                        </label>
                        <button  class="layui-btn" type="button" onclick="return submits()">
                            修改
                        </button>
                    </div>
                    
                </form>
        </div>
    </div>
    <script>
            layui.use(['form'], function(){

                form = layui.form;
                
                //监听提交
                // form.on('submit(add)',
                // function(data) {
                //     console.log(data);
                //     //发异步，把数据提交给php
                //     layer.alert("增加成功", {
                //         icon: 6
                //     },
                //     function() {
                //         //关闭当前frame
                //         xadmin.close();

                //         // 可以对父窗口进行刷新 
                //         xadmin.father_reload();
                //     });
                //     return false;
                // });
                
            });

            function submits(){
                var serializeUrl = $("#formname").serialize();
                $.ajax({
                    url:"{{route('admin.menulist.edit')}}",
                    async:false,
                    data:serializeUrl,
                    type:"POST",
                    success:function(res){
                        console.log(res['code']);
                        if(res['code']==400){
                            layer.alert(res['msg'], {
                                icon: 7
                            })
                        }else{
                            layer.alert(res['msg'], {
                                icon: 6
                            },function() {
                                //关闭当前frame
                                xadmin.close();

                                // 可以对父窗口进行刷新 
                                top.location.reload();
                            })
                        }
                    },
                });
            }

    
    </script>
    <script>
        layui.config({
            base: "{{asset(__Admin__)}}/"  // 配置你下载的iconFonts文件夹路径
        }).extend({
            // IconFonts: 'iconFonts/iconFonts',
            iconPicker: 'iconPicker/iconPicker'
        });

        layui.use(['iconPicker'], function () {
            var iconPicker = layui.iconPicker;
                
                iconPicker.render({
                    // 选择器，推荐使用input
                    elem: '#iconPicker',
                    // 数据类型：fontClass/unicode，推荐使用fontClass
                    type: 'fontClass',
                    // 是否开启搜索：true/false
                    search: true,
                    // 点击回调
                    click: function (data) {
                        // console.log(data);
                    }
                });

                /**
                * 选中图标 （常用于更新时默认选中图标）
                * @param filter lay-filter
                * @param iconName 图标名称，自动识别fontClass/unicode
                */
                iconPicker.checkIcon('iconPicker', '{{$all_data->icon}}');

        });
    </script>
@endsection
    