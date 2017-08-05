<?php
ini_set("memory_limit", "1024M");
require dirname(__FILE__).'/../core/init.php';

/* Do NOT delete this comment */
/* 不要删除这段注释 */

$configs = array(
    'name' => '中学',
    'log_show' => false,
    'tasknum' => 1,
    //'save_running_state' => true,
    'domains' => array(
        'school.aoshu.com',
    ),
    'scan_urls' => array(
        'http://school.aoshu.com/province/2223/'
    ),
    'list_url_regexes' => array(
        "http://school.aoshu.com/province/2223/2224/p\d+/"
    ),
    'content_url_regexes' => array(
        "http://school.aoshu.com/school/\d+/",
    ),
    'max_try' => 5,
    //'export' => array(
        //'type' => 'csv',
        //'file' => PATH_DATA.'/qiushibaike.csv',
    //),
    //'export' => array(
        //'type'  => 'sql',
        //'file'  => PATH_DATA.'/qiushibaike.sql',
        //'table' => 'content',
    //),
    'export' => array(
        'type' => 'db', 
        'table' => 'zhongxue',
    ),
    'fields' => array(
        array(
            'name' => "name",
            'selector' => "//div[contains(@class,'address')]/span[2]",
            'required' => true,
        ),
        array(
            'name' => "tel",
            'selector' => "//article[contains(@class,'schoolintro')]/dl/dd/table/tbody/tr[4]/td[2]",
            'required' => true,
        ),
        array(
            'name' => "addr",
            'selector' => "//div[contains(@class,'author')]//a[1]",
            'required' => true,
        ),
    ),
);

$spider = new phpspider($configs);

// $spider->on_handle_img = function($fieldname, $img) 
// {
//     $regex = '/src="(https?:\/\/.*?)"/i';
//     preg_match($regex, $img, $rs);
//     if (!$rs) 
//     {
//         return $img;
//     }

//     $url = $rs[1];
//     $img = $url;

//     //$pathinfo = pathinfo($url);
//     //$fileext = $pathinfo['extension'];
//     //if (strtolower($fileext) == 'jpeg') 
//     //{
//         //$fileext = 'jpg';
//     //}
//     //// 以纳秒为单位生成随机数
//     //$filename = uniqid().".".$fileext;
//     //// 在data目录下生成图片
//     //$filepath = PATH_ROOT."/images/{$filename}";
//     //// 用系统自带的下载器wget下载
//     //exec("wget -q {$url} -O {$filepath}");

//     //// 替换成真是图片url
//     //$img = str_replace($url, $filename, $img);
//     return $img;
// };

// $spider->on_extract_field = function($fieldname, $data, $page) 
// {
//     $encoding = util::get_encoding($page['raw']);
//     if ($encoding == 'iso-8859-1') 
//     {
//         //$data = mb_convert_encoding($data, "LATIN1", "UTF-8");
//         //用 UTF-8 编码的数据解码为 ISO-8859-1 编码
//         $data = utf8_decode($data);
//     }

//     if ($fieldname == 'article_title') 
//     {
//         if (strlen($data) > 10) 
//         {
//             // 下面方法截取中文会有异常
//             //$data = substr($data, 0, 10)."...";
//             $data = mb_substr($data, 0, 10, 'UTF-8')."...";
//             $data = trim($data);
//         }
//     }
//     elseif ($fieldname == 'article_publish_time') 
//     {
//         // 用当前采集时间戳作为发布时间
//         $data = time();
//     }
//     // 把当前内容页URL替换上面的field
//     elseif ($fieldname == 'url') 
//     {
//         $data = $page['url'];
//     }
//     return $data;
// };

$spider->start();


