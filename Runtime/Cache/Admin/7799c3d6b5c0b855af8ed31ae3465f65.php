<?php if (!defined('THINK_PATH')) exit();?><select name="<?php echo ($idStr); ?>" id="<?php echo ($idStr); ?>" {if $isV==1}lay-verify="required"{/if} lay-search="" lay-filter="<?php echo ($idStr); ?>">
	<option value="">【请选择<?php echo ($msg); ?>】</option>
	<?php echo (make_option($positionList,$selectId,$show_name,$show_value)); ?>
</select>