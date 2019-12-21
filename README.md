# liliuwei-pscws4

词库官方网址：http://www.xunsearch.com/scws/

这是用纯 PHP 代码实现的 C 版 Libscws 的全部功能，即第四版的 PSCWS

PSCWS4 使用文档：http://www.xunsearch.com/scws/docs.php#pscws4

## 安装

~~~php
composer require liliuwei/liliuwei-pscws4
~~~

## 用法示例

~~~php
<?php
namespace liliuwei\pscws4;

$text = 'GitHub是一个面向开源及私有软件项目的托管平台，因为只支持git 作为唯一的版本库格式进行托管，故名GitHub。';

$o= new \liliuwei\pscws4\PSCWS4API();
$o->PSCWS4($text); //获取所有分词
$o->PSCWS4_TOP($text); //返回分词结果的词语按权重统计的前 N 个词
?>
~~~
