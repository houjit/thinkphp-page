#thinkphp-page

分页使用案例

<?php
引入命名空间：
use houjit\page\Default;

//在控制器用使用
$newPage = new Default();
$param = array();
$param['model'] = model("User);
$page = $newPage->switchs($param);
