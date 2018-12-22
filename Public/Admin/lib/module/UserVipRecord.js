/**
 *	会员升级记录
 *
 *	@auth zongjl
 *	@date 2018-08-25
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
				,{ field:'mobile', width:130, title: '充值手机号', align:'center' }
				,{ field:'order_num', width:300, title: '订单编号', align:'center' }
				,{ field:'type', width:100, title: '充值类型', align:'center', templet:function(d){
  	  			  var str = "";
  	  			  if(d.type==1){
  	  				  str = '<span class="layui-btn layui-btn-green layui-btn-xs">套餐充值</span>';
  	  			  }else{
  	  				  str = '<span class="layui-btn layui-bg-cyan layui-btn-xs">其他</span>';
  	  			  }
  	  			  return str;
  	  		  	}}
				,{ field:'format_start_time', width:180, title: '开始时间', align:'center' }
				,{ field:'format_end_time', width:180, title: '结束时间', align:'center' }
				,{ field:'format_total_fee', width:120, title: '充值费用/元', align:'center' }
				,{ field:'pay_type', width:100, title: '充值方式', align:'center', templet:function(d){
  	  			  var str = "";
  	  			  if(d.pay_type==1){
  	  				  str = '<span class="layui-btn layui-btn-green layui-btn-xs">支付宝</span>';
  	  			  }else if(d.pay_type==2){
  	  				  str = '<span class="layui-btn layui-bg-cyan layui-btn-xs">微信</span>';
  	  			  }
  	  			  return str;
  	  		  	}}
				,{ field:'format_pay_time', width:180, title: '支付时间', align:'center' }
				,{ field:'status', width:100, title: '订单状态', align:'center', templet:function(d){
					  var str = "";
					  if(d.status==1){
						  str = '<span class="layui-btn layui-btn-normal layui-btn-xs">已支付</span>';
					  }else if(d.status==2){
						  str = '<span class="layui-btn layui-btn-normal layui-btn-xs layui-btn-danger">未支付</span>';
					  }
					  return str;
				  } }
				,{ field:'format_add_time', width:180, title: '添加时间', align:'center', sort: true }
				,{ field:'format_upd_time', width:180, title: '更新时间', align:'center', sort: true }
				,{ fixed:'right', width:100, title: '功能操作区', align:'center', toolbar: '#toolBar' }
			];
		
		//【渲染TABLE】
		func.tableIns(cols,"tableList");
		
	}
	
});
