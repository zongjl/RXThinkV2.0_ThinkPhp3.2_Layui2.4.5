/**
 *	商家合同
 *
 *	@auth zongjl
 *	@date 2018-10-25
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
				,{ field:'contract_no', width:200, title: '合同编号', align:'center' }
				,{ field:'mobile', width:130, title: '签订用户', align:'center' }
				,{ field:'type', width:100, title: '寄件类型', align:'center', templet:function(d){
	  	  			  var str = "";
	  	  			  if(d.type==1){
	  	  				  str = '<span class="layui-btn layui-btn-green layui-btn-xs">新签订</span>';
	  	  			  }else if(d.type==2){
	  	  				  str = '<span class="layui-btn layui-bg-cyan layui-btn-xs">续签</span>';
	  	  			  }
	  	  			  return str;
	  	  		  }}
				,{ field:'format_begin_time', width:180, title: '开始时间', align:'center' }
				,{ field:'format_end_time', width:180, title: '结束时间', align:'center' }
				,{ field:'status_name', width:100, title: '合同状态', align:'center' }
				,{ field:'note', width:300, title: '备注', align:'center' }
				,{ field:'format_add_time', width:180, title: '创建时间', align:'center' }
				,{ fixed:'right', width:250, title: '功能操作区', align:'center', toolbar: '#toolBar' }
			];
		
		//【渲染TABLE】
		func.tableIns(cols,"tableList",function(layEvent,data){
			if(layEvent==='confirmOrder') {
				//合同确认
				var url = cUrl + "/confirmOrder?id="+data.id;
				func.showWin("订单确认",url,700,380);
			}
		});
		
		//【设置弹框】
		func.setWin("商家合同",750,400);
		
	}

});