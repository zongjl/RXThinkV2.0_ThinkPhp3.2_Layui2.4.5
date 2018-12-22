/**
 *	用户积分充值订单
 *
 *	@auth zongjl
 *	@date 2018-10-18
 */
layui.use(['func'],function(){
	
	//【声明变量】
	var func = layui.func
		,$ = layui.$;
	
	if(A=='index') {
		
		//【TABLE列数组】
		var cols = [
				{ type:'checkbox', fixed: 'left' }
				,{ field:'id', width:80, title: 'ID', align:'center', sort: true, fixed: 'left' }
				,{ field:'mobile', width:130, title: '充值用户', align:'center' }
				,{ field:'type', width:100, title: '用户类型', align:'center', templet:function(d){
	  	  			  var str = "";
	  	  			  if(d.type==1){
	  	  				  str = '<span class="layui-btn layui-btn-green layui-btn-xs">个人会员</span>';
	  	  			  }else if(d.type==2){
	  	  				  str = '<span class="layui-btn layui-bg-cyan layui-btn-xs">公司会员</span>';
	  	  			  }
	  	  			  return str;
	  	  		  }}
				,{ field:'account', width:130, title: '充值账号', align:'center' }
				,{ field:'point', width:100, title: '充值积分', align:'center' }
				,{ field:'note', width:200, title: '备注', align:'center' }
				,{ field:'status', width:80, title: '状态', align:'center', templet:function(d){
	  	  			  var str = "";
	  	  			  if(d.status==1){
	  	  				  str = '<span class="layui-btn layui-btn-green layui-btn-xs">在用</span>';
	  	  			  }else if(d.status==2){
	  	  				  str = '<span class="layui-btn layui-bg-cyan layui-btn-xs">停用</span>';
	  	  			  }
	  	  			  return str;
	  	  		  }}
				,{ field:'format_add_user', width:100, title: '创建人', align:'center' }
				,{ field:'format_add_time', width:180, title: '添加时间', align:'center', sort: true }
				,{ field:'format_upd_time', width:180, title: '更新时间', align:'center', sort: true }
				,{ fixed:'right', width:80, title: '功能操作区', align:'center', toolbar: '#toolBar' }
			];
		
		//【渲染TABLE】
		func.tableIns(cols,"tableList");
		
	}

});