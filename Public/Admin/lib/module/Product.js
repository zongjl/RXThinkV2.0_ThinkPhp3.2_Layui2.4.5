/**
 *	商品
 *
 *	@auth zongjl
 *	@date 2018-10-16
 */
layui.use(['func','form'],function(){
	
	//【声明变量】
	var func = layui.func
		,form = layui.form
		,$ = layui.$;
	
	if(A=='index') {
		
		//【TABLE列数组】
		var cols = [
				{ type:'checkbox', fixed: 'left' }
				,{ field:'id', width:80, title: 'ID', align:'center', sort: true, fixed: 'left' }
				,{ field:'product_sn', width:100, title: '商品编码', align:'center' }
				,{ field:'name', width:200, title: '商品名称', align:'center' }
				,{ field:'brand_name', width:100, title: '品牌名称', align:'center' }
				,{ field:'tags_name', width:100, title: '标签名称', align:'center' }
				,{ field:'product_model', width:100, title: '商品型号', align:'center' }
				,{ field:'product_spec', width:150, title: '商品规格', align:'center' }
				,{ field:'business_sn', width:150, title: '商家商品编码', align:'center' }
				,{ field:'tags_name', width:100, title: '标签名称', align:'center' }
				,{ field:'is_spec', width:120, title: '规格状态', align:'center', templet:"#specTpl" }
				,{ field:'is_sale_name', width:80, title: '上下架', align:'center' }
				,{ field:'is_hot_name', width:90, title: '是否热销', align:'center' }
				,{ field:'is_new_name', width:90, title: '是否新品', align:'center' }
				,{ field:'is_best_name', width:90, title: '是否精品', align:'center' }
				,{ field:'format_price', width:100, title: '商品价格', align:'center' }
				,{ field:'stock_num', width:100, title: '商品库存', align:'center' }
				,{ field:'sales_num', width:100, title: '销售总量', align:'center' }
				,{ field:'view_num', width:100, title: '浏览量', align:'center' }
				,{ field:'give_points', width:100, title: '赠送积分', align:'center' }
				,{ field:'sort_order', width:100, title: '排序', align:'center' }
				,{ field:'format_add_time', width:180, title: '添加时间', align:'center', sort: true }
				,{ field:'format_upd_time', width:180, title: '更新时间', align:'center', sort: true }
				,{ fixed:'right', width:250, title: '功能操作区', align:'center', toolbar: '#toolBar' }
			];
		
		//【渲染TABLE】
		func.tableIns(cols,"tableList",function(layEvent,data){
			if(layEvent==='productModel') {
				//规格管理
				if(data.is_spec!=1) {
					layer.msg("商品规格暂未开启,无法设置商品规格",{ icon: 5 });
					return false;
				}
				//弹出窗体
				var url = cUrl + "/productModel?product_id="+data.id;
				func.showWin("商品规格管理",url);
			}
		});
		
		//【设置弹框】
		func.setWin("商城商品");
		
		//【规格状态】
    	form.on('switch(is_spec)', function(obj){
    		//获取值
    		var is_spec = this.checked ? '1' : '2';
    		
    		//向服务端发起POST请求
    		var url = cUrl+"/setIsSpec",
    			data = {"product_id":this.value,"is_spec":is_spec};
    		func.ajaxPost(url,data,function(res,flag){
    			location.reload();
    		});
    		
    	});
	}

});