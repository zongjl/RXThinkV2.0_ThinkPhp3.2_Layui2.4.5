/**
 *	商品订单
 *
 *	@auth zongjl
 *	@date 2018-10-19
 */
layui.use(['func'],function(){
	
	//【声明变量】
	var func = layui.func
		,$ = layui.$;
	
	if(A=='index') {
		
		var status = $("#status").val();
		
		//【TABLE列数组】
		var cols = [
				{ type:'checkbox', fixed: 'left' }
				,{ field:'id', width:80, title: 'ID', align:'center', sort: true, fixed: 'left' }
				,{ field:'order_num', width:200, title: '订单编号', align:'center' }
				,{ field:'order_type_name', width:100, title: '订单类型', align:'center' }
				,{ field:'format_amount', width:100, title: '商品总额', align:'center' }
				,{ field:'format_freight_amount', width:100, title: '快递费', align:'center' }
				,{ field:'format_pay_amount', width:100, title: '实际支付额', align:'center' }
				,{ field:'format_add_time', width:180, title: '下单时间', align:'center' }
				,{ field:'status_name', width:100, title: '订单状态', align:'center'}
				,{ field:'pay_type_name', width:100, title: '支付方式', align:'center' }
				,{ field:'pay_status_name', width:100, title: '支付状态', align:'center'}
				,{ field:'format_pay_time', width:180, title: '支付时间', align:'center' }
				,{ field:'mobile', width:130, title: '下单用户', align:'center' }
				,{ field:'receiver_name', width:120, title: '收货人姓名', align:'center' }
				,{ field:'receiver_mobile', width:130, title: '收货人手机', align:'center' }
				,{ field:'city_name', width:200, title: '所属地区', align:'center' }
				,{ field:'address', width:250, title: '详细地址', align:'center' }
				,{ field:'shipping_status_name', width:100, title: '物流状态', align:'center'}
				,{ field:'source_name', width:100, title: '订单来源', align:'center'}
				,{ field:'format_shipping_time', width:180, title: '发货时间', align:'center' }
				,{ field:'format_sign_time', width:180, title: '签收时间', align:'center' }
				,{ fixed:'right', width:620, title: '功能操作区', align:'center', toolbar: '#toolBar' }
			];
		
		//【渲染TABLE】
		func.tableIns(cols,"tableList",function(layEvent,data){
			if(layEvent==='updateAddress') {
				//修改收货地址
				var url = cUrl + "/updateAddress?id="+data.id;
				func.showWin("修改收货地址",ur,750,500);
				
			}else if(layEvent==='delivery') {
				//发货
				var url = cUrl + "/delivery?id="+data.id;
				func.showWin("订单发货",url);
				
			}else if(layEvent==='confirmOrder') {
				//订单确认
				var url = cUrl + "/confirmOrder?id="+data.id;
				func.showWin("订单确认",url,600,380);
				
			}else if(layEvent==='invoice') {
				//发票详情
				var url = cUrl + "/invoice?id="+data.id;
				func.showWin("发票详情",url,750,350);
			}else if(layEvent==='transfer') {
				//转账凭证审核
				var url = cUrl + "/transfer?id="+data.id;
				func.showWin("转账凭证审核",url,550,420);
			}

		},cUrl+"/index?status="+status);
		
		//【设置弹框】
		func.setWin("订单");
		
	}

});