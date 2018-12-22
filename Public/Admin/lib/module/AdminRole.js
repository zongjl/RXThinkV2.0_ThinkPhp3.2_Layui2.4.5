/**
 *	角色管理
 *
 *	@auth zongjl
 *	@date 2018-07-12
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
				,{ field:'name', width:300, title: '角色名称', align:'center' }
				,{ field:'format_add_user', width:100, title: '创建人', align:'center' }
				,{ field:'format_add_time', width:180, title: '添加时间', align:'center', sort: true }
				,{ field:'format_upd_time', width:180, title: '更新时间', align:'center', sort: true }
				,{ field:'sort_order', width:100, title: '排序', align:'center' }
				,{ fixed: 'right', width:250, title: '功能操作区', align:'center', toolbar: '#toolBar' }
			];
		
		//【渲染TABLE】
		func.tableIns(cols,"tableList",function(layEvent,data){

			if(layEvent === 'auth'){
				console.log("权限设置");
				location.href = mUrl + "/adminAuth/index?type=1&type_id="+data.id;
			}
			
		});
		
		//【设置弹框】
		func.setWin("角色",450,250);
		
	}

});