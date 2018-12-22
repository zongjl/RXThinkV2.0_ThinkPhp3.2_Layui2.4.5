/**
 *	商品
 *
 *	@auth zongjl
 *	@date 2018-10-16
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
				,{ field:'product_sn', width:100, title: '商品编码', align:'center' }
				,{ field:'cover_url', width:80, title: '封面', align:'center', templet:function(d){
		              return '<a href="'+d.cover_url+'" target="_blank"><img src="'+d.cover_url+'" height="26" /></a>';
		          } }
				,{ field:'name', width:200, title: '商品名称', align:'center' }
				,{ field:'short_name', width:100, title: '商品简称', align:'center' }
				,{ field:'is_sale', width:100, title: '上下架', align:'center', templet:function(d){
	  	  			  var str = "";
	  	  			  if(d.is_sale==1){
	  	  				  str = '<span class="layui-btn layui-btn-green layui-btn-xs">上架</span>';
	  	  			  }else if(d.is_sale==2){
	  	  				  str = '<span class="layui-btn layui-bg-cyan layui-btn-xs">下架</span>';
	  	  			  }
	  	  			  return str;
	  	  		  }}
				,{ field:'is_hot', width:100, title: '是否热销', align:'center', templet:function(d){
	  	  			  var str = "";
	  	  			  if(d.is_hot==1){
	  	  				  str = '<span class="layui-btn layui-btn-green layui-btn-xs">是</span>';
	  	  			  }else if(d.is_hot==2){
	  	  				  str = '<span class="layui-btn layui-bg-cyan layui-btn-xs">否</span>';
	  	  			  }
	  	  			  return str;
	  	  		  }}
				,{ field:'is_new', width:100, title: '是否新品', align:'center', templet:function(d){
	  	  			  var str = "";
	  	  			  if(d.is_new==1){
	  	  				  str = '<span class="layui-btn layui-btn-green layui-btn-xs">是</span>';
	  	  			  }else if(d.is_new==2){
	  	  				  str = '<span class="layui-btn layui-bg-cyan layui-btn-xs">否</span>';
	  	  			  }
	  	  			  return str;
	  	  		  }}
				,{ field:'is_best', width:100, title: '是否精品', align:'center', templet:function(d){
	  	  			  var str = "";
	  	  			  if(d.is_best==1){
	  	  				  str = '<span class="layui-btn layui-btn-green layui-btn-xs">是</span>';
	  	  			  }else if(d.is_best==2){
	  	  				  str = '<span class="layui-btn layui-bg-cyan layui-btn-xs">否</span>';
	  	  			  }
	  	  			  return str;
	  	  		  }}
				,{ field:'points', width:100, title: '积分兑换值', align:'center' }
				,{ field:'stock_num', width:100, title: '商品库存', align:'center' }
				,{ field:'sales_num', width:100, title: '销售总量', align:'center' }
				,{ field:'sort_order', width:100, title: '排序', align:'center' }
				,{ field:'format_add_time', width:180, title: '添加时间', align:'center', sort: true }
				,{ field:'format_upd_time', width:180, title: '更新时间', align:'center', sort: true }
				,{ fixed:'right', width:150, title: '功能操作区', align:'center', toolbar: '#toolBar' }
			];
		
		//【渲染TABLE】
		func.tableIns(cols,"tableList");
		
		//【设置弹框】
		func.setWin("商品");
		
	}

});