/**
 *	品牌
 *
 *	@auth zongjl
 *	@date 2018-10-08
 */
layui.use(['form','func'],function(){
	var form = layui.form,
		func = layui.func,
		$ = layui.$;
	
	if(A=='index') {
		
		//【TABLE列数组】
		var cols = [
				{ type:'checkbox', fixed: 'left' }
				  ,{ field:'id', width:80, title: 'ID', align:'center', sort: true, fixed: 'left' }
				  ,{ field:'name', width:200, title: '品牌名称', align:'center' }
				  ,{ field:'logo_url', width:120, title: '品牌LOGO', align:'center', templet:function(d){
					  var logoStr = "";
			 			if(d.logo_url) {
			 				logoStr = '<a href="'+d.logo_url+'" target="_blank"><img src="'+d.logo_url+'" height="26" /></a>';
			 			}
			 			return logoStr;
		          }}
				  ,{ field:'sort_order', width:80, title: '排序', align:'center' }
				  ,{ field:'format_add_user', width:100, title: '添加人', align:'center' }
				  ,{ field:'format_add_time', width:180, title: '添加时间', align:'center' }
				  ,{ field:'format_upd_time', width:180, title: '更新时间', align:'center' }
				  ,{ fixed:'right', width:150, title: '功能操作区', align:'center', toolbar: '#toolBar' }
			];
		
		//【TABLE渲染】
		func.tableIns(cols,"tableList");
		
		//【设置弹框】
		func.setWin("品牌",450,500);
		
	}
	
});
