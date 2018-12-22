/**
 *	商家
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
				,{ field:'company_name', width:200, title: '商家名称', align:'center' }
				,{ field:'format_seller_amount', width:100, title: '销售总额', align:'center' }
				,{ field:'format_balance', width:100, title: '待结算余额', align:'center' }
				,{ field:'taxpayer_number', width:200, title: '纳税人识别号', align:'center' }
				,{ field:'invoice_address', width:200, title: '注册地址', align:'center' }
				,{ field:'invoice_tel', width:130, title: '注册电话', align:'center' }
				,{ field:'invoice_bank', width:100, title: '开户银行', align:'center' }
				,{ field:'invoice_bank_account', width:200, title: '开户账号', align:'center' }
				,{ field:'format_seller_target', width:100, title: '销售目标', align:'center' }
				,{ field:'city_name', width:200, title: '所属城市', align:'center' }
				,{ field:'address', width:200, title: '详细地址', align:'center' }
				,{ field:'contact_tel', width:130, title: '联系电话', align:'center' }
				,{ field:'check_status_name', width:100, title: '审核状态', align:'center' }
				,{ field:'status', width:100, title: '状态', align:'center', templet:function(d){
	  	  			  var str = "";
	  	  			  if(d.status==1){
	  	  				  str = '<span class="layui-btn layui-btn-green layui-btn-xs">在用</span>';
	  	  			  }else if(d.status==2){
	  	  				  str = '<span class="layui-btn layui-bg-cyan layui-btn-xs">停用</span>';
	  	  			  }
	  	  			  return str;
	  	  		  }}
				,{ field:'format_add_time', width:180, title: '添加时间', align:'center', sort: true }
				,{ field:'format_upd_time', width:180, title: '更新时间', align:'center', sort: true }
				,{ fixed:'right', width:150, title: '功能操作区', align:'center', toolbar: '#toolBar' }
			];
		
		//【渲染TABLE】
		func.tableIns(cols,"tableList");
		
		//【设置弹框】
		func.setWin("商家");
		
	}

});