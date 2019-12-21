<?php

namespace liliuwei\pscws4;

class PSCWS4API
{
    //获取所有分词
    public function PSCWS4($text)
    {
        $cws = new PSCWS4('utf8');
        $cws->set_dict(__DIR__ . '/etc/dict.utf8.xdb');
        $cws->set_rule(__DIR__ . '/etc/rules.utf8.ini');
        $cws->send_text($text);
        $tags = [];
        while ($words = $cws->get_result()) {
            foreach ((array)$words as $val) {
                if (preg_match("/['.,:;*?~`!@#$%^&+=)(<>{}]|\]|\[|\/|\\\|\"|\|/", $val['word'])) continue;
                $tags[] = trim($val['word']);
            }
        }
        $cws->close();
        return $tags;
    }

   //返回分词结果的词语按权重统计的前 N 个词
    public function PSCWS4_TOP($text, $limit = 4)
    {
        $cws = new PSCWS4('utf8');
        $cws->set_dict(__DIR__ . '/etc/dict.utf8.xdb');
        $cws->set_rule(__DIR__ . '/etc/rules.utf8.ini');
        $cws->send_text($text);
        $words = $cws->get_tops($limit);
        $cws->close();
        $tags = [];
        foreach ((array)$words as $val) {
            if (preg_match("/['.,:;*?~`!@#$%^&+=)(<>{}]|\]|\[|\/|\\\|\"|\|/", $val['word'])) continue;
            $tags[] = trim($val['word']);
        }
        return $tags;
    }

    //提取中文
    public function get_chianese($text)
    {
        preg_match_all("/([\x{4e00}-\x{9fa5}]+)/u", $text, $match);
        $result = implode(' ', $match[0]);
        return $result;
    }


}
