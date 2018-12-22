<?php

/**
 * DES加解密常用方法
 * 
 * @author zongjl
 * @date 2018-08-29
 */
if (isset($_REQUEST['APIDATA'])) {
    $dataStr = $_REQUEST['APIDATA'];
    $crypt = getCryptDesObject();
    $dataStr = str_replace(" ", "+",$dataStr);
    $data = $crypt->decrypt(stripslashes($dataStr));
    $data = (array) json_decode($data, true);
    //初始化表单数据
    foreach ($data as $name=>$row) {
        if (IS_POST) {
            $_POST[$name] = $row;
        } else {
            $_GET[$name] = $row;
        }
        $_REQUEST[$name] = $row;
    }
}

function getCryptDesObject() {
    if (isset($GLOBALS['des'])) {
        return $GLOBALS['des'];
    }
    vendor('des');
    
    $crypt = new DesCrypt(API_KEY);
    $GLOBALS['des'] = $crypt;
    return $crypt;
}