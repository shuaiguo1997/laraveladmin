@extends('admin/parent')

@section('title')

@section('content')
<div class="layui-fluid">
    <div class="layui-row">
        <form action="{{route('admin.Role.edit')}}" method="post" class="layui-form layui-form-pane">
            @csrf
            <input type="hidden" name="id" value="{{$data->id}}">
            <div class="layui-form-item">
                <label for="name" class="layui-form-label">
                    <span class="x-red">*</span>角色名
                </label>
                <div class="layui-input-inline">
                    <input type="text" id="name" name="r_name" value="{{$data->r_name}}" required="required" lay-verify="required"
                    autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item layui-form-text">
                <label class="layui-form-label">
                    拥有权限
                </label>
                <table  class="layui-table layui-input-block">
                    <tbody>
                        @foreach ($category as $item)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{$item->id}}" @if (in_array($item->id,$data->menu_id_arr))
                                checked="checked"
                                @endif  name="menu_id[]" lay-skin="primary" lay-filter="father" title="{{$item->title}}">
                            </td>
                            <td>
                                <div class="layui-input-block">
                                    @foreach ($item->son['0'] as $v)
                                        <input name="menu_id[]" lay-filter="son" lay-skin="primary" type="checkbox" title="{{$v->title}}" value="{{$v->id}}" @if (in_array($v->id,$data->menu_id_arr)) checked="checked" @endif> 
                                    @endforeach
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            <div class="layui-form-item">
            <button class="layui-btn" lay-submit="" lay-filter="add">修改</button>
          </div>
        </form>
    </div>
</div>
<script>
    layui.use(['form','layer'], function(){
        $ = layui.jquery;
      var form = layui.form
      ,layer = layui.layer;
    
      //自定义验证规则
      form.verify({
        nikename: function(value){
          if(value.length < 5){
            return '昵称至少得5个字符啊';
          }
        }
        ,pass: [/(.+){6,12}$/, '密码必须6到12位']
        ,repass: function(value){
            if($('#L_pass').val()!=$('#L_repass').val()){
                return '两次密码不一致';
            }
        }
      });

      //监听提交
      form.on('submit(add)', function(data){
        // console.log(data);
        //发异步，把数据提交给php
        var r_name = $("input[name='r_name']").val();
        var id = $("input[name='id']").val();
        var menu_id = "";

        $('input[type=checkbox]:checked').each(function() {
            menu_id += $(this).attr('value')+','; 
        });

        menu_id = menu_id.substring(0,menu_id.length-1);
        // console.log(menu_id=='');
        if(menu_id==''){
            layer.msg('角色权限不能为空',{icon:5});return false;
        }

        $.post("{{route('admin.Role.edit')}}",{'_token':'{{csrf_token()}}',r_name:r_name,menu_id:menu_id,id:id},function(data){
            // console.log(data);return false;
            if(data.code==200){
                layer.alert(data.msg, {icon: 6},function () {
                    // 获得frame索引
                    var index = parent.layer.getFrameIndex(window.name);
                    //关闭当前frame
                    parent.layer.close(index);
                    // 可以对父窗口进行刷新 
                    xadmin.father_reload();
                });
            }else{
                layer.alert(data.msg, {icon: 5});
            }
        });
        return false;
      });


    form.on('checkbox(father)', function(data){
        // console.log(data);
        if(data.elem.checked){
            $(data.elem).parent().siblings('td').find('input').prop("checked", true);
            form.render(); 
        }else{
           $(data.elem).parent().siblings('td').find('input').prop("checked", false);
            form.render();  
        }
    });
      
    form.on('checkbox(son)', function(data){
        // console.log(data.elem.checked);
        if(data.elem.checked){
            $(data.elem).parent().parent().siblings('td').find('input').prop("checked", true);
            form.render(); 
        }
        // if(data.elem.checked)
    });
    });
</script>
<script>var _hmt = _hmt || []; (function() {
    var hm = document.createElement("script");
    hm.src = "https://hm.baidu.com/hm.js?b393d153aeb26b46e9431fabaf0f6190";
    var s = document.getElementsByTagName("script")[0];
    s.parentNode.insertBefore(hm, s);
  })();</script>
@endsection