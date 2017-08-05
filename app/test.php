<?php
ini_set("memory_limit", "1024M");
require dirname(__FILE__).'/../core/init.php';

/* Do NOT delete this comment */
/* 不要删除这段注释 */
$url = "http://school.aoshu.com/school/249753/";
$html = requests::get($url);

// 选择器规则
$selector = "//div[contains(@class,'address')]/span[2]";
// 提取结果
$result = selector::select($html, $selector);
echo $result . 'ok';