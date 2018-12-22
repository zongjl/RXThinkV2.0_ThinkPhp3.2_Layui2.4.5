<?php

/**
 * 公共控制器-基类
 * //文档https://www.cnblogs.com/dee0912/p/5116695.html
 * 
 * @author zongjl
 * @date 2018-07-29
 */
namespace Admin\Controller;
use Think\Controller;
use Admin\Model\AdminModel;
use Admin\Model\MenuModel;
class BaseController extends Controller {
    public $adminId,$adminInfo;
    //权限点
    public $adminAuth;
    //模型、服务
    protected $mod,$service;
    function __construct() {
        parent::__construct();
        
        //初始化系统配置
        $this->initConfig();
        
        //检查登录
        $this->checkLogin();
        
        //检查权限
        $this->checkAuth();
        
    }
    
    /**
     * 初始化系统配置
     * 
     * @author zongjl
     * @date 2018-08-20
     */
    private function initConfig() {
        
        //设置基础参数
        $this->assign("siteName", C('SITE_NAME'));
        $this->assign("nickName", C('NICK_NAME'));
        
        //上传图片参数
        $this->assign('uploadImgExt',C('UPLOAD')['UPLOAD_IMG_EXT']);
        $this->assign('uploadImgSize',C('UPLOAD')['UPLOAD_IMG_SIZE']);
        $this->assign('uploadImgNum',C('UPLOAD')['UPLOAD_IMG_NUM']);
        
        //系统分页参数
        define('PERPAGE', isset($_REQUEST['limit']) ? $_REQUEST['limit'] : 0);
        define('PAGE', isset($_REQUEST['page']) ? $_REQUEST['page'] : 0);
        
        //系统应用参数
        define('ROOT_PATH', realpath(__ROOT__));
        define('APP', CONTROLLER_NAME);
        define('ACT', ACTION_NAME );
        $this->assign('mdu' , __MODULE__);
        $this->assign('app' , APP);
        $this->assign('act' , ACT);
        
    }
    
    /**
     * 基类方法
     * 
     * @author zongjl
     * @date 2018-07-09
     */
    public function index() {
        if(IS_POST) {
            $message = $this->service->getList();
            $this->ajaxReturn($message);
            return;
        }
        $this->render();
    }
    
    /**
     * 添加或编辑基类
     * 
     * @author zongjl
     * @date 2018-07-16
     */
    public function edit($data=array()) {
        if(IS_POST) {
            $message = $this->service->edit();
            $this->ajaxReturn($message);
            return ;
        }
        $id = I("get.id",0);
        if($id) {
            $info = $this->mod->getInfo($id);
        }else{
            foreach ($data as $key=>$val) {
                $info[$key] = $val;
            }
        }
        $this->assign('info',$info);
        $this->render();
    }
    
    /**
     * 详情信息
     * 
     * @author zongjl
     * @date 2018-10-22
     */
    public function detail() {
        if(IS_POST) {
            $message = $this->service->edit();
            $this->ajaxReturn($message);
            return ;
        }
        $id = I("get.id",0);
        if($id) {
            $info = $this->mod->getInfo($id);
            $this->assign('info',$info);
        }
        $this->render();
    }
    
    /**
     * 初始化(会在所有方法执行之前判断是否登录)
     * 
     * @author zongjl
     * @date 2018-06-21
     */
    public function _initialize() {
//         if(!isset($_SESSION['user']['uid']) || !isset($_SESSION['user']['username'])) {
//             $this->redirect('Admin/Login/index.html');
//         }
    }
    
    /**
     * 访问方法不存在时调用
     * 
     * @author zongjl
     * @date 2018-06-21
     */
    public function _empty() {
        //及时清除登录信息
//         session('adminId', null);
        $this->display('Public:404');
    }
    
    /**
     * 检查登录
     * 
     * @author zongjl
     * @date 2018-06-21
     */
    private function checkLogin() {
        $noLoginActs = array("Login");
        if(!isset($_SESSION['adminId']) && !in_array(CONTROLLER_NAME, $noLoginActs)) {
            $this->redirect('/Login/index');
            exit;
        }
        
        //获取用户ID
        $this->adminId = session('adminId');
        $this->assign("adminId" , $this->adminId);
        
        //查询基本信息
        $adminMod = new AdminModel();
        $this->adminInfo = $adminMod->getInfo($this->adminId,true);
        $this->assign('adminInfo', $this->adminInfo);
        $this->adminAuth = $this->adminInfo['adminAuth'];

    }
    
    /**
     * 检查权限
     * 
     * @author zongjl
     * @date 2018-06-21
     */
    private function checkAuth() {
        
        //访问权限判断
        if(!in_array(CONTROLLER_NAME,['Login','Index'])) {
            
            $funcInfo = M("menu")->where([
                'type'      =>4,
                'url'       =>__ACTION__,
                'mark'      =>1
            ])->find();
            if(!$funcInfo) {
                if(IS_POST || IS_GET) {
                    $this->ajaxReturn(message('暂无操作权限',false));
                    return ;
                }
                $this->display('Public:404');
                exit;
            }
            $funcArr = $this->adminAuth[$funcInfo['parent_id']];
            $funcList = [];
            if(is_array($funcArr)) {
                $keys = array_values($funcArr);
                $map['id'] = array('in',$keys);
                $funcList = M("menu")->where($map)->getField('auth',true);
            }
            if(!in_array($funcInfo['auth'], $funcList)) {
                if(IS_POST) {
                    $this->ajaxReturn(message('暂无操作权限',false));
                    return ;
                }
                $this->display('Public:404');
                exit;
            }
            $this->assign('funcList',$funcList);
            
            //获取面包屑
            $this->getCrumb($funcInfo['parent_id']);
            
        }
        
    }
    
    /**
     * 获取面包屑
     *
     * @author zongjl
     * @date 2018-11-30
     */
    function getCrumb($menuId) {
        $menuMod = new MenuModel();
        $crumbStr = $menuMod->getMenuName($menuId);
        $crumb = explode('/', $crumbStr);
        $this->assign('crumb',$crumb);
    }

    /**
     * 模板渲染
     * 
     * @author zongjl
     * @date 2018-07-11
     */
    public function render($tpl="", $data=array()) {
        if (empty($tpl)) {
            $tpl = lcfirst(APP) . "." . ACT;
        }else if(strpos($tpl, ".html")>0){
            $tpl = rtrim($tpl, ".html");
        }
        if ($data) {
            foreach ($data as $name=>$value) {
                $this->assign($name, $value);
            }
        }
        //渲染头部
        $this->display("Public:header");
        //渲染主体
        if (strpos($tpl, "/")===0) {
            $tpl = ltrim($tpl, "/");
        }
        $this->display(APP.":{$tpl}");
        //渲染底部
        $this->display("Public:footer");
    }
    
    /**
     * 删除一条数据
     *
     * @author zongjl
     * @date 2018-07-12
     */
    function drop() {
        if(IS_POST) {
            $id = I('post.id');
            $info = $this->mod->getInfo($id);
            if($info) {
                $res = $this->mod->drop($id);
                if($res!==false) {
                    $this->ajaxReturn(message());
                    return ;
                }
            }
            $this->ajaxReturn(message($this->mod->getError(),false));
            return ;
        }
    }
    
    /**
     * 批量删除
     *
     * @author zongjl
     * @date 2018-7-13
     */
    function batchDrop() {
        if(IS_POST) {
            $ids = explode(',', $_POST['id']);
            $changeAct = $_POST['changeAct'];
            if($changeAct==0) {
                //删除
                $num = 0;
                foreach ($ids as $key => $val) {
                    $res = $this->mod->drop($val);
                    if($res!==false) $num++;
                }
                $message = message('本次共选择' . count($ids) . "个条数据,删除" . $num . "个");
                $this->ajaxReturn($message);
                return ;
            }else if($changeAct==1){
                //重置缓存
                foreach ($ids as $key => $val){
                    $this->mod->_cacheReset($val);
                }
                $message = message('重置缓存成功！');
                $this->ajaxReturn($message);
            }
            $this->ajaxReturn(message($this->mod->getError(),false));
            return ;
        }
    }
    
}