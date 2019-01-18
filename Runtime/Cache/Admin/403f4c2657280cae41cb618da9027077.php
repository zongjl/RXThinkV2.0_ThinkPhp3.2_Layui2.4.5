<?php if (!defined('THINK_PATH')) exit(); if($cityList != null): if(is_array($cityList)): $i = 0; $__LIST__ = $cityList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="layui-input-inline">
		<select name="<?php echo ($vo["code"]); ?>_id" id="<?php echo ($vo["code"]); ?>_id" lay-filter="<?php echo ($vo["code"]); ?>_id" lay-search="">
			<option value="">【请选择<?php echo ($vo["tname"]); ?>】</option>
			<?php echo (make_option($vo['list'],$vo['selected'],name,id)); ?>
		</select>
	</div><?php endforeach; endif; else: echo "" ;endif; endif; ?>

<script type="text/javascript">
layui.use(['form'],function(){

	//声明变量
	var layer = layui.layer
	,form = layui.form
	,$ = layui.$;

	//选择省份
	form.on('select(province_id)',function(data){
		var id = data.value;
		console.log("省份ID:"+id);
		var select = data.othis;
		if (select[0]) {
			if (id > 0) {
				$.post(mUrl+"/City/getChilds", { 'id':id }, function(data){
					if (data.success) {
						var str = "";
						$.each(data.data, function(i,item){
							str += "<option value=\"" + i + "\" >" + item.name + "</option>";
						});
						$("#city_id").html('<option value="">【请选择市】</option>' + str);
						$("#district_id").html('<option value="">【请选择县/区】</option>');
						form.render('select');
					}else{
						layer.msg(data.msg,{ icon: 5 });
						
						$("#city_id").html('<option value="">【请选择市】</option>');
						$("#district_id").html('<option value="">【请选择县/区】</option>');
						form.render('select');
						
						
						return false;
					}
				}, 'json');
			} else {
				
			}
		}
	});
	
	//选择城市
	form.on('select(city_id)',function(data){
		var id = data.value;
		console.log("城市ID:"+id);
		var select = data.othis;
		if (select[0]) {
			if (id > 0) {
				$.post(mUrl+"/City/getChilds", { 'id':id }, function(data){
					if (data.success) {
						var str = "";
						$.each(data.data, function(i,item){
							str += "<option value=\"" + i + "\" >" + item.name + "</option>";
						});
						$("#district_id").html('<option value="">【请选择县/区】</option>' + str);
						form.render('select');
					}
				}, 'json');
			} else {
				layer.msg(data.msg,{ icon: 5 });
				
				$("#district_id").html('<option value="">【请选择县/区】</option>');
				form.render('select');

				return false;
			}
		}
	});
	
	//选择县区
	form.on("select(district_id)",function(data){
		var id = data.value;
		console.log("县区ID:"+id);
	});
	
});
</script>