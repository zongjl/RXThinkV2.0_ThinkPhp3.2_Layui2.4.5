/**
 *	分类管理
 *
 *	@auth zongjl
 *	@date 2018-10-09
 */
layui.use(['func'],function(){
	var func = layui.func,
		$ = layui.$;
	
	if(A=='index') {
		
		//【TREE列数组】
		var layout =
			[{	name: 'ID',
		 		headerClass: 'value_col',
		 		colClass: 'value_col',
		 		style: 'width: 5%',
		 		render: function(row) {
		 			return row.id;
		 		}
		 	},
		 	{ 
		 		name: '分类名称', 
		 		treeNodes: true, 
		 		headerClass: 'value_col', 
		 		colClass: 'value_col2', 
		 		style: '15%;min-width:200px;',  
		 		render: function(row) {
		 			return row.name;
		 		} 
		 	},
		 	{
		 		name: '分类图标',
		 		headerClass: 'value_col',
		 		colClass: 'value_col',
		 		style: 'width:30px;min-width:80px;',
		 		render: function(row) {
		 			var iconStr = "";
		 			if(row.icon_url) {
		 				iconStr = '<a href="'+row.icon_url+'" target="_blank"><img src="'+row.icon_url+'" height="26" /></a>';
		 			}
		 			return iconStr;
		 		}
		 	},
		 	{
		 		name: '分类类型',
		 		headerClass: 'value_col',
		 		colClass: 'value_col',
		 		style: 'width:30px;min-width:100px;',
		 		render: function(row) {
		 			return row.type_name;
		 		}
		 	},
		 	{
		 		name: '状态',
		 		headerClass: 'value_col',
		 		colClass: 'value_col',
	        	style: 'width: 5%;min-width:80px;',
	        	render: function(row) {
	        		var str = "";
	        		if(row.status==1) {
	        			//在用
	        			str = '<span class="layui-btn layui-btn-normal layui-btn-xs">在用</span>';
	            	}else if(row.status==2){
	            		//停用
	            		str = '<span class="layui-btn layui-btn-danger layui-btn-xs">停用</span>';
	            	}
	        		return str;
	        	}
		 	},
		 	{
		 		name: '添加人',
		 		headerClass: 'value_col',
		 		colClass: 'value_col',
		 		style: 'width: 10%;min-width:80px;',
		 		render: function(row) {
		 			return row.format_add_user;
		 		}
		 	},
		 	{
		 		name: '添加时间',
		 		headerClass: 'value_col',
		 		colClass: 'value_col',
		 		style: 'width: 10%;min-width:150px;',
		 		render: function(row) {
		 			return row.format_add_time;
		 		}
		 	},
		 	{
		 		name: '更新时间',
		 		headerClass: 'value_col',
		 		colClass: 'value_col',
		 		style: 'width: 10%;min-width:150px;',
		 		render: function(row) {
		 			return row.format_upd_time ? row.format_upd_time : '';
		 		}
		 	},
		 	{
		 		name: '排序',
		 		headerClass: 'value_col',
		 		colClass: 'value_col',
		 		style: 'width: 10%;min-width:50px;',
		 		render: function(row) {
		 			return row.sort_order;
		 		}
		 	},
			{
	    	  	name: '操作',	
	    	  	headerClass: 'value_col',
	    	  	colClass: 'value_col2',
	    	  	style: 'width: 20%;min-width:180px;text-align:left;',
	    	  	render: function(row) {
	    	  		var strXml = $("#toolBar").html();
	    	  	    var regExp = /<a.*?>([\s\S]*?)<\/a>/g;
	    	  	    //exec返回一个数组对象
	    	  	    var arr = strXml.match(regExp);
//	    	  	    console.log(RegExp.$1);
//	    	  		console.log(arr);
//	    	  		console.log(arr.length);
	    	  	    
	    	  	    var itemStr = '';
	    	  	    if(arr!=null) {
	    	  	    	for(var i=0;i<arr.length;i++) {
		    	  			if(i==2 && row.parent_id!=0) continue;
		    	  			itemStr += arr[i].replace('<a',"<a data-id="+row.id);
		    	  		}
	    	  	    }
	    	  		return itemStr;
	    	  	}
			}];
		
		//【TREE渲染】
		func.treeIns(layout,"treeList");
		
		//【设置弹框】
		func.setWin("分类");
		
	}
	
});
