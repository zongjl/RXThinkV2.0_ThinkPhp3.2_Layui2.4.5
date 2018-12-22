/**
 *	职位管理
 *
 *	@auth zongjl
 *	@date 2018-05-30
 */
layui.use(['func'],function(){
	
	//声明变量
	var func = layui.func
		,$ = layui.$;
	
	if(A=='index') {
		
		//【TABLE列数组】
		var cols = [
		       { type:'checkbox', fixed: 'left' }
			  ,{ field:'id', width:80, title: 'ID', align:'center', sort: true, fixed: 'left' }
			  ,{ field:'name', width:300, title: '职位名称', align:'center' }
			  ,{ field:'status', width:100, title: '状态', align:'center', templet: '#statusTpl', sort: true, templet:function(d){
			  var str = "";
			  if(d.status==1){
				  str = '<span class="layui-btn layui-btn-normal layui-btn-xs">在用</span>';
			  }else{
				  str = '<span class="layui-btn layui-btn-normal layui-btn-xs layui-btn-danger">停用</span>';
			  }
				  return str;
			  } }
			  ,{ field:'format_add_user', width:100, title: '添加人', align:'center' }
			  ,{ field:'format_add_time', width:180, title: '添加时间', align:'center', sort: true }
			  ,{ field:'format_upd_time', width:180, title: '更新时间', align:'center', sort: true }
			  ,{ field:'sort_order', width:80, title: '排序', align:'center' }
			  ,{ fixed:'right', width:150, title: '功能操作区', align:'center', toolbar: '#toolBar' }
			];
		
		//【渲染TABLE】
		func.tableIns(cols,"tableList");
		
		//【设置弹框】
		func.setWin("职位",500,300);
		
	}

});
