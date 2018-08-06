<?php
namespace hou\page;

/**
 * 自定义扩展分页操作类
 * Created by Houjit.com.
 * User: Amos
 * Date: 2018-08-06 14:40
 * Param: Array $type:分页类型（layui,bootstrap...）  $model:查询的模型，必传项
 * 自定义扩展分页操作类
 * $total 总记录数  $limit 一页显示多少条
 * 参数介绍：
    $page 分页参数 $pageNums  总页数  第三参数是 分页额外参数 字符串或者数组
 *
 * @package hou\page
 */
class Default extend \think\Controller {
    public function switchs($param=''){
    	$param = empty($param)?request()->param():$param;
	if(empty($param['model'])){
		$this->error('模型名称不能为空');
	}
	$type = !empty($param['type'])?$param['type']:'layui';
	    switch ($type)
{
case 'layui':
  return $this->layui($param);
  break;
default:
  return $this->layui($param);
  break;
}
    }	  
	private function layui($param){
$page = !empty($param['page'])?intval($param['page']):1;//获取分页上的page参数
$start = 0;
$limit = 10;//默认显示多少条
$where[] = !empty($param['map'])?$param['map']:[];
if ($page != 1) {
    $start = ($page-1) * $limit;
}
// 根据筛选条件查询数据
$data = $param['model']->where($where)->limit($start,$limit)->field('id')->select()->toArray();
// 查询总记录数
$total = $param['model']->where($where)->count();
$pageNum = 0;
// 计算总页数
if ($total > 0) {
    $pageNum = ceil($total/$limit);
}

// 分页输出显示 不管有没有查询条件写法都是一致的 只需要把请求体放到第三个参数就行
$pageShow =  \hou\page\layui::instance(['total'=>$total,'limit' => $limit])->render($page,$pageNum,request()->param());

        $res['data'] = $datas;
        $res['page'] = $pageShow;
        $res['count'] = $total;
		return $res;
	}
}
	
