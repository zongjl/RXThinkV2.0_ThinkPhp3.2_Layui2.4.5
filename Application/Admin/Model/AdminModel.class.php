<?php

/**
 * 人员管理-模型
 * 
 * @author zongjl
 * @date 2018-06-21
 */
namespace Admin\Model;
use Common\Model\CBaseModel;
class AdminModel extends CBaseModel {
    public function __construct() {
        parent::__construct("admin");
    }
    
    //自动验证
    protected $_validate = array(
//         array('realname','','真实姓名已经存在！',self::EXISTS_VALIDATE,'unique',1),//新增数据时验证
        array('realname', '1,30', '真实姓名长度不合法', self::EXISTS_VALIDATE, 'length',3),
        array('mobile','/^1[3|4|5|7|8][0-9]\d{4,8}$/','手机号码不正确！','0','regex',1),
//         array('email', '', '邮箱已经存在！', 0, 'unique', 1),//新增数据时验证
        array('email', 'email', '邮箱不合法！', 0, '', 3),
    );
   
    //自动完成
    protected $_auto = array (
        array('add_time','time',3,'function'), // 对add_time字段在更新的时候写入当前时间戳
        array('upd_time','time',3,'function'),
    );
    
//     //自动验证
//     protected $_validate = array (
//         array('name', 'require', '姓名不能为空！', 1, '', 3),
//         array('tel', 'require', '手机号不能为空！', 1, '', 3),
//         array('password', 'require', '密码不能为空！', 1, '', 1),
//         array('email', 'require', '邮箱不能为空！', 1, '', 3),
//         array('ID_number', 'require', '身份证号不能为空！', 1, '', 3),
//         array('ID_positive', 'require', '身份证正面照不能为空！', 1, '', 1),
//         array('ID_opposite', 'require', '身份证反面照不能为空！', 1, '', 1),
//         array('ID_handle', 'require', '手持身份证照不能为空！', 1, '', 1),
//         array('bankcard', 'require', '银行卡照片不能为空！', 1, '', 1),
//         array('openbank', 'require', '开户行不能为空！', 1, '', 3),
//         array('accountname', 'require', '银行账户名不能为空！', 1, '', 3),
//         array('bankaccount', 'require', '银行账户号不能为空！', 1, '', 3),
//         array('tel', '/^\d{11}$/', '手机号不合法！', 1, 'regex', 3),
//         array('email', 'email', '邮箱不合法！', 1, '', 3),
//         array('ID_number', '/^(\d{15}$|^\d{18}$|^\d{17}(\d|X|x))$/', '身份证号不合法！', 1, 'regex', 3),
//         array('tel', '', '手机号已经存在！', 1, 'unique', 3), // 新增修改时候验证tel字段是否唯一
//         array('email', '', '邮箱已经存在！', 1, 'unique', 3), // email唯一
//         array('ID_number', '', '身份证号已经存在！', 1, 'unique', 3), // 身份证号唯一
//     );
    
    /**
     * 获取缓存信息
     * 
     * @author zongjl
     * @date 2018-07-12
     */
    public function getInfo($id,$flag=false) {
        $info = parent::getInfo($id);
        if($info) {
            
            //头像
            if($info['avatar']) {
                $info['avatar_url'] = IMG_URL . $info['avatar'];
            }
            
            //入职日期
            if($info['entry_date']) {
                $info['format_entry_date'] = date('Y-m-d H:i:s',$info['entry_date']);
            }
            
            //性别
            $info['gender_name'] = C("GENDER_ARR")[$info['gender']];
            
            //职位
            if($info['position_id']) {
                $positionMod = M("adminPosition");
                $positionInfo = $positionMod->find($info['position_id']);
                $info['position_name'] = $positionInfo['name'];
            }
            
            //获取组织
            if($info['organization_id']) {
                $adminOrgMod = new AdminOrgModel();
                $adminOrgInfo = $adminOrgMod->getInfo($info['organization_id']);
            }
            
            //获取部门
            if($info['dept_id']) {
                $adminDepMod = new AdminDepModel();
                $adminDepName = $adminDepMod->getDepName($info['dept_id'],">>");
                $info['dept_name'] = $adminOrgInfo['name'] . ">>" . $adminDepName;
            }
            
            if($flag) {
                
                //独立权限反序列化
                if($info['auth']) {
                    $auth = unserialize($info['auth']);
                }
                $info['auth'] = $auth;
                
                //角色权限
                if($info['role_ids']) {
                    $roleIds = explode(',', $info['role_ids']);
                    $adminRoleMod = new AdminRoleModel();
                    $roleAuth = $adminRoleMod->getRoleAuth($roleIds);
                }
                
                //独立权限、角色权限重组成人员权限
                $authList = array();
                
                //独立权限
                if(is_array($auth)) {
                    foreach ($auth as $key=>$val) {
                        $authList[$key][] = $val;
                    }
                }
                
                //角色权限
                if(is_array($roleAuth)) {
                    foreach ($roleAuth as $kt=>$vt) {
                        $authList[$kt][] = $vt;
                    }
                }
                $result = array();
                foreach ($authList as $key=>$val) {
                    if(!in_array($key, array_keys($result))) {
                        $result[$key] = array();
                    }
                    foreach ($val as $vt) {
                        foreach ($vt as $v) {
                            if(!in_array($v, $result[$key])) {
                                $result[$key][] = $v;
                            }
                        }
                    }
                }
                $info['adminAuth'] = $result;
            }
            
        }
        return $info;
    }
    
    /**
     * 获取所有人员
     *
     * @author zongjl
     * @date 2018-07-12
     */
    function getAll() {
        $data = $this->getCache("adminAll");
        if(!$data) {
            $result = $this->where(['status'=>1,'mark'=>1])->getField("id,realname,gender");
            $this->setCache("adminAll", $result);
        }
        return $data;
    }
    
}