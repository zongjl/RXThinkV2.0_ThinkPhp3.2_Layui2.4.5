<?php if (!defined('THINK_PATH')) exit();?><style>
html {
    background-color: #F1F2F7;
}
</style>

<!-- 面包屑 -->
<!-- 面包屑 -->
<div class="layui-body-header">
    <span class="layui-body-header-title"></span>
    <span class="layui-breadcrumb pull-left" style="visibility: visible;">
      <a>首页</a><span lay-separator="">/</span>
      <?php if(is_array($crumb)): $i = 0; $__LIST__ = $crumb;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a><?php echo ($vo); ?></a><span lay-separator="">/</span><?php endforeach; endif; else: echo "" ;endif; ?>
      <a>查看</a>
    </span>
</div>

<!-- 主体部分开始 -->
<div class="layui-fluid">
    <div class="layui-card">
        <div class="layui-card-body">
        
             <!-- 内容区 -->
			 

	<!-- 功能操作区一 -->
	<div class="layui-form toolbar">
       <div class="layui-form-item">
            <div class="layui-inline">
                <div class="layui-input-inline" style="width: auto;">
					<button class="layui-btn layui-btn-normal" id="expand"><i class="larry-icon">&#xe8c0;</i> 全部展开</button>
			    	<button class="layui-btn layui-btn-warm" id="collapse"><i class="larry-icon">&#xe8c1;</i> 全部收起</button>
					<?php echo W('funcNode/btnAdd',array(添加部门));?>
               </div>
           </div>
       </div>
	</div>

	<!-- TREE渲染区 -->
	<div id="treeList" lay-filter="treeList" ></div>
	
	<!-- 操作功能区二 -->
	<script type="text/html" id="toolBar">
		<?php echo W('funcNode/btnSetAuth',array(部门权限));?>
		<?php echo W('funcNode/btnEdit',array(编辑));?>
		<?php echo W('funcNode/btnDel',array(删除));?>
		<?php echo W('funcNode/btnAdd2',array(添加));?>
	</script>


			
        </div>
    </div>
</div>
<!-- 主体部分结束 -->