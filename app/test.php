<?php
ini_set("memory_limit", "1024M");
require dirname(__FILE__).'/../core/init.php';

/* Do NOT delete this comment */
/* 不要删除这段注释 */
$url = "http://school.aoshu.com/school/249753/";
$html = requests::get($url);

// 选择器规则
$name = "//article[contains(@class,'schoolintro')]/h2/a[1]";
$tel = "//dl//tr[4]/td[2]";
$addr = "//dl//tr[5]/td[2]";
// 提取结果
//$name = selector::select($html, $name);
$tel = selector::select($html, $tel);
$addr = selector::select($html, $addr);
echo '电话：' . $tel . " 地址" . $addr;
