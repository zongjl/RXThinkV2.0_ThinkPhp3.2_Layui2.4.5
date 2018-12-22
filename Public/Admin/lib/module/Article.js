/**
 *	文章CMS管理
 *
 *	@auth zongjl
 *	@date 2018-07-17
 */
layui.use(['laydate','func'],function(){
	var func = layui.func,
		$ = layui.$;
	
	if(A=='index') {
		
		//【TABLE列数组】
		var cols = [
				{ type:'checkbox', fixed: 'left' }
				  ,{ field:'id', width:80, title: 'ID', align:'center', sort: true, fixed: 'left' }
				  ,{ field:'title', width:400, title: '文章标题', align:'center', }
				  ,{ field:'type_name', width:100, title: '文章类型', align:'center' }
				  ,{ field:'is_show', width:150, title: '是否显示', align:'center' }
				  ,{ field:'view_num', width:100, title: '浏览数', align:'center', sort: true }
				  ,{ field:'format_add_user', width:150, title: '添加人', align:'center', sort: true }
				  ,{ field:'format_add_time', width:180, title: '添加时间', align:'center', }
				  ,{ fixed: 'right', width:150, title: '功能操作区', align:'center', toolbar: '#toolBar' }
			];
		
		//【TABLE渲染】
		func.tableIns(cols,"tableList");
		
		//【设置弹框】
		func.setWin("文章");
		
	}
	
	//【CMS选择列数组】
	var cols2 = [
			{ type:'checkbox', fixed: 'left' }
			  ,{ field:'id', width:80, title: 'ID', align:'center', sort: true, fixed: 'left' }
			  ,{ field:'cover_url', width:60, title: '封面', align:'center', templet:function(d){
	              return '<img src="'+d.cover_url+'" height="26" />';
	          }}
			  ,{ field:'title', width:400, title: '文章标题', align:'center', event: 'setSign', style:'cursor: pointer;' }
			  ,{ field:'cate_name', width:100, title: '文章类型', align:'center' }
			  ,{ field:'view_num', width:100, title: '浏览数', align:'center', sort: true }
			  ,{ field:'format_add_user', width:100, title: '添加人', align:'center', sort: true }
			  ,{ field:'format_add_time', width:180, title: '添加时间', align:'center', }
		];
	
	//【CMS选择】
	func.tableIns(cols2,"tableList2",function(layEvent,data){
		
		if(layEvent === 'setSign') {
			//layer.msg("你选中了：【"+data.id+ "】" +data.title, {time:2000});
			
			//关闭窗口
			//parent.layui.$(".layui-layer-close1").trigger('click'); //选中A页关闭iframe窗口
			var index = parent.layer.getFrameIndex(window.name); //先得到当前iframe层的索引  
		    parent.layer.close(index); //再执行关闭  
		    
//		    //第一种:调取父页面方法赋值
//		    parent.setAdVal(data.id,data.name);//访问父页面方法
		    
		    //第二种：直接赋值
			parent.layui.$("#type_id").val(data.id);
			parent.layui.$("#type_value").val(data.title);
		}
		
	});
	
	//【搜索功能】
	func.searchForm("searchForm2","tableList2");
	
});
