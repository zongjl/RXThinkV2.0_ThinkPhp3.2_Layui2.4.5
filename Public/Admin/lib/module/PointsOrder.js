/**
 *	积分兑换订单
 *
 *	@auth zongjl
 *	@date 2018-10-25
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
				,{ field:'order_num', width:250, title: '订单编号', align:'center' }
				,{ field:'order_type_name', width:100, title: '订单类型', align:'center' }
				,{ field:'mobile', width:130, title: '下单用户', align:'center' }
				,{ field:'receiver_name', width:100, title: '收货人名称', align:'center' }
				,{ field:'receiver_mobile', width:130, title: '收票人手机', align:'center' }
				,{ field:'amount', width:100, title: '使用积分', align:'center' }
				,{ field:'format_freight_amount', width:100, title: '运费', align:'center' }
				,{ field:'source_name', width:100, title: '订单来源', align:'center'}
				,{ field:'format_add_time', width:180, title: '下单时间', align:'center' }
				,{ field:'status_name', width:100, title: '订单状态', align:'center'}
				,{ field:'format_shipping_time', width:180, title: '发货时间', align:'center' }
				,{ field:'shipping_status_name', width:100, title: '发货状态', align:'center' }
				,{ field:'format_sign_time', width:180, title: '签收时间', align:'center' }
				,{ fixed:'right', width:320, title: '功能操作区', align:'center', toolbar: '#toolBar' }
			];
		
		//【渲染TABLE】
		func.tableIns(cols,"tableList",function(layEvent,data){
			if(layEvent==='confirmOrder') {
				//订单确认
				var url = cUrl + "/confirmOrder?id="+data.id;
				func.showWin("订单确认",url,600,380);
				
			}else if(layEvent==='shipping') {
				//发货
				var url = cUrl + "/shipping?id="+data.id;
				func.showWin("订单发货",url);
			}
		});
		
		//【设置弹框】
		func.setWin("积分兑换订单",850,450);
		
	}

});