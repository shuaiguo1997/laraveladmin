@extends('Admin/parent')

@section('title')
    
@section('content')
    
        <div class="layui-fluid">
            <div class="layui-row" style="margin-top: 20px">
                <form class="layui-form" action="{{route('admin.menulist.add')}}" method="POST">
                    @csrf
                    @isset($pid)
                        <input type="hidden" value="{{$pid}}" name="pid"> 
                    @endisset
                    <div class="layui-form-item">
                      <label for="title" class="layui-form-label">
                          <span class="x-red">*</span>菜单名称
                      </label>
                      <div class="layui-input-inline">
                          <input type="text" id="title" name="title" required="" lay-verify="required"
                          autocomplete="off" class="layui-input">
                      </div>
                      
                    </div>
                  
                    <div class="layui-form-item">
                      <label for="" class="layui-form-label">
                          <span class="x-red">*</span>链接地址
                      </label>
                      <div class="layui-input-inline">
                          <input type="text" id="" name="url" required="" lay-verify="required"
                          autocomplete="off" class="layui-input">
                      </div>
                      <div class="layui-form-mid layui-word-aux">
                          <span class="x-red">*</span>
                      </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">选择图标</label>
                        <div class="layui-input-block">
                            <input type="text" id="iconPicker" name="icon" lay-filter="iconPicker" class="layui-input">
                        </div>
                    </div>
                    
                    
                    <div class="layui-form-item">
                        <label for="L_repass" class="layui-form-label">
                        </label>
                        <button  class="layui-btn" type="submit">
                            增加
                        </button>
                    </div>
                    @if($errors->any())
                        @foreach($errors->all() as $error)
                        <div class="layui-form-item">
                            <div class="layui-input-block layui-col-md2">
                                <h2 class="layui-bg-orange" style="height: 30px;width:auto;text-align:center">{{$error}}</h2>
                            </div>
                        </div>
                        @endforeach
                    @endif
              </form>
            </div>
        </div>
        <script>

                // layui.config({
                //     base: "{{asset(__Admin__)}}/"  // 配置你下载的iconFonts文件夹路径
                // }).extend({
                //     IconFonts: 'iconFonts/iconFonts',
                // });

                // layui.use(['element','form', 'jquery', 'IconFonts'], function () {
                //     var element = layui.element;
                //     var form = layui.form;
                //     var $ = layui.jquery;
                //     var IconFonts=layui.IconFonts;

                //     //图标选择器
                //     IconFonts.render({
                //         // 选择器，推荐使用input
                //         elem: '#iconFonts', //选择器ID
                //         // 数据类型：fontClass/layui_icon，
                //         type: 'layui_icon',
                //         // 是否开启搜索：true/false
                //         search: true,
                //         // 是否开启分页
                //         page: true,
                //         // 每页显示数量，默认12
                //         limit: 12,
                //         // 点击回调
                //         click: function (data) {
                //             //console.log(data);
                //         }
                //     });
                    

                // });
 
                


                layui.use(['form'], function(){
                    form = layui.form;
                    @if(session()->has('data'))
                        @if(session('data')['code']=='200')
                            layer.alert("{{session('data')['msg']}}",{
                                icon: 6
                            },function(){
                                //关闭当前frame
                                xadmin.close();
                                // 可以对父窗口进行刷新 
                                top.location.reload();
                            });
                        @else
                            layer.alert("{{session('data')['msg']}}", {
                                icon: 7
                            });
                        @endif
                    @endif
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
                            console.log(data);
                        }
                    });
    
                    /**
                    * 选中图标 （常用于更新时默认选中图标）
                    * @param filter lay-filter
                    * @param iconName 图标名称，自动识别fontClass/unicode
                    */
                    iconPicker.checkIcon('iconPicker', '');
    
            });
        </script>
@endsection

