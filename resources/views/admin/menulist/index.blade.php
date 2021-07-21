@extends('Admin/parent')

@section('title')

@section('content')

        <div class="x-nav">
            
            <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" onclick="location.reload()" title="刷新">
                <i class="layui-icon layui-icon-refresh" style="line-height:30px"></i>
            </a>
        </div>
        <div class="layui-fluid">
            <div class="layui-row layui-col-space15">
                <div class="layui-col-md12">
                    <div class="layui-card">
                        <div class="layui-card-body ">
                          <div class="layui-input-inline layui-show-xs-block">
                              <button class="layui-btn" onclick="xadmin.open('添加','{{route('admin.menulist.add')}}')" ><i class="layui-icon"></i>增加一级菜单</button>
                          </div>
                            <table class="layui-table layui-form">
                              <thead>
                                <tr>
                                  <th width="70">ID</th>
                                  <th>菜单名</th>
                                  <th width="50">链接</th>
                                  <th width="250">操作</th>
                              </thead>
                              <tbody class="x-cate">
                                @foreach ($datas as $item)
                                  <tr cate-id='{{$item->id}}' fid='{{$item->pid}}'>
                                    <td>{{$item->id}}</td>
                                    <td>
                                    @if ($item->pid==0)
                                      <i class="layui-icon x-show" status='true'>&#xe623;</i>
                                    @endif 
                                      {{$item->title}}
                                    </td>
                                    <td><input type="text" class="layui-input x-sort" name="url" value="{{$item->url}}"></td>
                                
                                    <td class="td-manage">
                                      <button class="layui-btn layui-btn layui-btn-xs"  onclick="xadmin.open('编辑','{{route('admin.menulist.edit',array('ids'=>$item->id))}}')" ><i class="layui-icon">&#xe642;</i>编辑</button>
                                      @if ($item->pid==0)
                                        <button class="layui-btn layui-btn-warm layui-btn-xs"  onclick="xadmin.open('添加','{{route('admin.menulist.add',array('pid'=>$item->id))}}')" ><i class="layui-icon">&#xe642;</i>添加子栏目</button>
                                      @endif
                                      <button class="layui-btn-danger layui-btn layui-btn-xs"  onclick="member_del(this,'要删除的id')" href="javascript:;" ><i class="layui-icon">&#xe640;</i>删除</button>
                                    </td>
                                  </tr>
                                @endforeach
                              </tbody>
                            </table>
                        </div>
                        {{-- <div class="layui-card-body ">
                            <div class="page">
                                <div>
                                    <a class="prev" href="">&lt;&lt;</a>
                                    <a class="num" href="">1</a>
                                    <span class="current">2</span>
                                    <a class="num" href="">3</a>
                                    <a class="num" href="">489</a>
                                    <a class="next" href="">&gt;&gt;</a></div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
        <script>
          layui.use('form', function(){
            form = layui.form;
          });

          //  /*用户-删除*/
          // function member_del(obj,id){
          //     layer.confirm('确认要删除吗？',function(index){
          //         //发异步删除数据
          //         $(obj).parents("tr").remove();
          //         layer.msg('已删除!',{icon:1,time:1000});
          //     });
          // }
            // 分类展开收起的分类的逻辑
          // 
          $(function(){
            $("tbody.x-cate tr[fid!='0']").hide();
            // 栏目多级显示效果
            $('.x-show').click(function () {
                if($(this).attr('status')=='true'){
                    $(this).html('&#xe625;'); 
                    $(this).attr('status','false');
                    cateId = $(this).parents('tr').attr('cate-id');
                    $("tbody tr[fid="+cateId+"]").show();
               }else{
                    cateIds = [];
                    $(this).html('&#xe623;');
                    $(this).attr('status','true');
                    cateId = $(this).parents('tr').attr('cate-id');
                    getCateId(cateId);
                    for (var i in cateIds) {
                        $("tbody tr[cate-id="+cateIds[i]+"]").hide().find('.x-show').html('&#xe623;').attr('status','true');
                    }
               }
            })
          })

          var cateIds = [];
          function getCateId(cateId) {
              $("tbody tr[fid="+cateId+"]").each(function(index, el) {
                  id = $(el).attr('cate-id');
                  cateIds.push(id);
                  getCateId(id);
              });
          }
    
   
        </script>
        @endsection

        
        


