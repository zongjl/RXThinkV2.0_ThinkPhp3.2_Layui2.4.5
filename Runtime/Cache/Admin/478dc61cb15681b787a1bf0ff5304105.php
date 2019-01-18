<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo ($siteName); ?></title>
    <meta name="renderer" content="webkit">	
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">	
    <meta name="Author" content="larry" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">	
	<meta name="apple-mobile-web-app-capable" content="yes">	
	<meta name="format-detection" content="telephone=no">	
	<link rel="Shortcut Icon" href="/Public/Admin/images/favicon.ico" />
	<link rel="stylesheet" type="text/css" href="/Public/Admin/layui/css/layui.css" media="all">
	<link rel="stylesheet" type="text/css" href="/Public/Admin/css/admin.css" media="all">
	<link rel="stylesheet" type="text/css" href="/Public/Admin/css/global.css" media="all">
	<script type="text/javascript" src="/Public/Admin/layui/layui.js"></script>
	<script type="text/javascript">
		var M = '<?php echo ($mdu); ?>';
		var C = '<?php echo ($app); ?>';
		var A = '<?php echo ($act); ?>';
		var RES_URL = '/Public/Admin';
		var page = 'index.php';
		var mUrl = M;
		var cUrl = M+"/"+C;
		var aUrl = "<?php echo U('"+C+"/"+A+"');?>";
		var imgUrl = '<?php echo ($imgUrl); ?>';
	</script>
</head>
<body style="margin-right:10px;">