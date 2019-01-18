<?php if (!defined('THINK_PATH')) exit();?><style type="text/css">
	.layui-upload-drag {
	    position: relative;
	    padding: 10px;
	    border: 1px dashed #e2e2e2;
	    background-color: #fff;
	    text-align: center;
	    cursor: pointer;
	    color: #999;
	}
</style>
<div class="layui-input-block">
	<div class="layui-upload-drag">
	 	<a href="<?php if($imgUrl != null): echo ($imgUrl); else: ?>javascript:void(0);<?php endif; ?>" <?php if($imgUrl != null): ?>target="black"<?php endif; ?>>
	 		<img id="<?php echo ($name); ?>_show_id" src="<?php if($imgUrl != null): echo ($imgUrl); else: ?>/Public/Admin/images/default_upload.png<?php endif; ?>" alt="上传图片" width="<?php echo ($imgW); ?>" height="<?php echo ($imgH); ?>">
	 	</a>
	 	<input type="hidden" id="<?php echo ($name); ?>" name="<?php echo ($name); ?>" value="<?php if($img != null): echo ($img); endif; ?>">
	</div>
	<div style="margin-top:10px;">
		<button type="button" class="layui-btn" id="btnUploadImg_<?php echo ($name); ?>"><i class="layui-icon">&#xe67c;</i>上传<?php echo ($nameStr); ?></button>
	</div>
	<?php if($sizeStr != null): ?><div class="layui-form-mid layui-word-aux">建议尺寸：<?php echo ($sizeStr); ?></div><?php endif; ?>
</div>
<script type="text/javascript">
layui.config({
	base: '/Public/Admin'
}).extend({
	croppers: '/lib/extend/cropper/croppers',
}).use(['upload','croppers'],function(){
	
	//声明变量
	var layer = layui.layer
	,upload = layui.upload
	,croppers = layui.croppers
	,$ = layui.$;
	
	if(<?php echo ($isCrop); ?>==1) {
		
		//图片裁剪组件
	    croppers.render({
	        elem: '#btnUploadImg_<?php echo ($name); ?>'
	        ,name:"<?php echo ($name); ?>"
	        ,saveW:<?php echo ($cropW); ?>     //保存宽度
	        ,saveH:<?php echo ($cropH); ?>
	        ,mark:<?php echo ($cropRate); ?>    //选取比例
	        ,area:'900px'  //弹窗宽度
	        ,url: mUrl + "/upload/uploadImg"
	        ,done: function(url){ 
	        	//上传完毕回调
	            $('#<?php echo ($name); ?>').val(url);
	            $('#<?php echo ($name); ?>_show_id').attr('src',url);
	        }
	    });
		
	}else{
		
		/**
		 * 普通图片上传
		 */
		var uploadInst = upload.render({
		    elem: '#btnUploadImg_<?php echo ($name); ?>'
			,url: mUrl + "/upload/uploadImg"
			,accept:'images'
			,acceptMime:'image/*'
			,exts: "<?php echo ($uploadImgExt); ?>"
			,field:'file'//文件域字段名
			,size: <?php echo ($uploadImgSize); ?> //最大允许上传的文件大小
			,before: function(obj){
				//预读本地文件
			}
			,done: function(res){
				//上传完毕回调
				
				if(!res.success){
					layer.msg(res.msg,{ icon: 5 });
					return false;
				}

				//上传成功
				$('#<?php echo ($name); ?>_show_id').attr('src', res.data);
	    		$('#<?php echo ($name); ?>').val(res.data);
			}
			,error: function(){
				//请求异常回调
				return layer.msg('数据请求异常');
			}
		});
		
	}
	
});

</script>