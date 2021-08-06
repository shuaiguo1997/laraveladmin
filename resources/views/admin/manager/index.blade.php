@extends('admin/parent')

@section('title')

@section('content')
<div class="x-nav">
    <span class="layui-breadcrumb">
      <a href="">首页</a>
      <a href="">演示</a>
      <a>
        <cite>导航元素</cite></a>
    </span>
    <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" onclick="location.reload()" title="刷新">
      <i class="layui-icon layui-icon-refresh" style="line-height:30px"></i></a>
  </div>
  <div class="layui-fluid">
      <div class="layui-row layui-col-space15">
          <div class="layui-col-md12">
              <div class="layui-card">
                  <div class="layui-card-body ">
                      <form class="layui-form layui-col-space5" method="GET" action="{{route('admin.Manager.index')}}">
                          <div class="layui-inline layui-show-xs-block" >
                              <input type="text" name="username" value=""  placeholder="请输入用户名" autocomplete="off" class="layui-input">
                          </div>
                          <div class="layui-inline layui-show-xs-block">
                              <button class="layui-btn"  lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
                          </div>
                      </form>
                  </div>
                  <div class="layui-card-header">
                     
                      <button class="layui-btn" onclick="xadmin.open('添加用户','{{route('admin.Manager.add')}}',800,600)"><i class="layui-icon"></i>添加</button>
                  </div>
                  <div class="layui-card-body ">
                      <table class="layui-table layui-form">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>登录名</th>
                            <th>加入时间</th>
                            <th>状态</th>
                            <th>操作</th>
                        </thead>
                        <tbody>
                          @foreach ($data as $item)
                            <tr>
                              <td>{{$item->id}}</td>
                              <td>{{$item->username}}</td>
                              <td>{{date('Y-m-d',$item->createtime)}}</td>
                              <td class="td-status">
                                <span class="layui-btn layui-btn-normal @if($item->status!=1) layui-btn-disabled @endif layui-btn-mini">@if($item->status==1) 已启用 @else 已禁用 @endif</span></td>
                              <td class="td-manage">
                                <a onclick="member_stop(this,'{{$item->id}}')" href="javascript:;"  title="{{$item->status}}">
                                  <i class="layui-icon">&#xe601;</i>
                                </a>
                                <a title="编辑"  onclick="xadmin.open('编辑','{{url('admin/Manager/edit',['id'=>$item->id])}}')" href="javascript:;">
                                  <i class="layui-icon">&#xe642;</i>
                                </a>
                                <a title="删除" onclick="member_del(this,'要删除的id')" href="javascript:;">
                                  <i class="layui-icon">&#xe640;</i>
                                </a>
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                  </div>
                  <div class="layui-card-body ">
                      <div class="page">
                        {{$data->links('admin.layouts.paginate')}}
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <script>
    layui.use(['laydate','form'], function(){
      var laydate = layui.laydate;
      var form = layui.form;
      
      //执行一个laydate实例
      laydate.render({
        elem: '#start' //指定元素
      });

      //执行一个laydate实例
      laydate.render({
        elem: '#end' //指定元素
      });
    });

     /*用户-停用*/
    function member_stop(obj,id){
        layer.confirm('确认要更改用户状态？',function(index){
            var status = $(obj).attr('title');
            // console.log(status);return false;
            if(status == '1'){
              status='0';
            }else{
              status='1';
            }
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                url:"{{route('admin.Manager.edit')}}",
                async:false,
                data:{status:status,id:id},
                type:"POST",
                success:function(res){
                    if(res.code == 200){
                        layer.msg(res.msg,{icon: 4,time:2000});
                        window.parent.location.reload();
                    }else{
                        layer.msg(res.msg,{icon: 5,time:2000}); 
                    }
                }
            })
        });
    }

    /*用户-删除*/
    function member_del(obj,id){
        layer.confirm('确认要删除吗？',function(index){
            //发异步删除数据
            $(obj).parents("tr").remove();
            layer.msg('已删除!',{icon:1,time:1000});
        });
    }



    function delAll (argument) {

      var data = tableCheck.getData();

      layer.confirm('确认要删除吗？'+data,function(index){
          //捉到所有被选中的，发异步进行删除
          layer.msg('删除成功', {icon: 1});
          $(".layui-form-checked").not('.header').parents('tr').remove();
      });
    }
  </script>
  <script>var _hmt = _hmt || []; (function() {
      var hm = document.createElement("script");
      hm.src = "https://hm.baidu.com/hm.js?b393d153aeb26b46e9431fabaf0f6190";
      var s = document.getElementsByTagName("script")[0];
      s.parentNode.insertBefore(hm, s);
    })();</script>
@endsection
    