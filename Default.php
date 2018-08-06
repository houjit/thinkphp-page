<?php
namespace hou\page;
use think\Request;
/**
 * 自定义扩展分页操作类
 * Created by Houjit.com.
 * User: Chen
 * Date: 2018/5/14 0014
 * Time: 13:00
 * 自定义扩展分页操作类
 * $total 总记录数  $limit 一页显示多少条
 * 数组调用：
    \cocolait\bootstrap\page\Send::instance(['total' => 10, 'limit' => 10])->render($pages,$pageNums,$this->request->param());
 * 参数介绍：
    $page 分页参数 $pageNums  总页数  第三参数是 分页额外参数 字符串或者数组
 *
 * 字符串传参数调用：
    $pageinfo = $pages->render($page,$pageNums, "/keyword/$keyword");
 *
 * Class Send
 * @package cbootstrap\page
 */
class Default{
    public function switchs(){
    	$param = request()->param();
	$type = !empty($param['type'])?$param['type']:'layui';
    }	    
}
	
