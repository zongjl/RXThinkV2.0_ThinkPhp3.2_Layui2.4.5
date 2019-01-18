<?php if (!defined('THINK_PATH')) exit();?><form class="layui-form info-form" action="">
	<input name="id" id="id" type="hidden" value="<?php echo ($info["id"]); ?>">
	<div class="layui-form-item">
		<label class="layui-form-label">角色名称：</label>
		<div class="layui-input-block">
			<input name="name" id="name" value="<?php echo ($info["name"]); ?>" lay-verify="required" autocomplete="off" placeholder="请输入角色名称" class="layui-input" type="text">
		</div>
	</div>
	<div class="layui-form-item">
		<label class="layui-form-label">序号：</label>
		<div class="layui-input-block">
			<input name="sort_order" id="sort_order" value="<?php echo ($info["sort_order"]); ?>" lay-verify="required|number" autocomplete="off" placeholder="请输入序号" class="layui-input" type="text">
		</div>
	</div>
	<div class="layui-form-item">
		<div class="layui-input-block">
			<button class="layui-btn" lay-submit="" lay-filter="submitForm" id="submitForm">立即提交</button>
			<button type="reset" class="layui-btn layui-btn-primary">重置</button>
		</div>
	</div>
</form>