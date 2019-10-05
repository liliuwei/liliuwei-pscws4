<?php

namespace liliuwei\pscws4;

$text = 'GitHub是一个面向开源及私有软件项目的托管平台，因为只支持git 作为唯一的版本库格式进行托管，故名GitHub。';
$o = new \liliuwei\pscws4\PSCWS4API();
return $o->PSCWS4($text);
?>