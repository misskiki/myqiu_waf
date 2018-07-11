<?php
/*
myqiu_waf.php 1.0
www.myqiu.org
*/
$getfilter="select|(and|or)\\b.+?(>|<|=|in|like)|\\/\\*.+?\\*\\/|<\\s*script\\b|\\bEXEC\\b|UNION.+?SELECT|UPDATE.+?SET|INSERT\\s+INTO.+?VALUES|(SELECT|DELETE).+?FROM|(CREATE|ALTER|DROP|TRUNCATE)\\s+(TABLE|DATABASE)";
$postfilter="\\b(and|or)\\b.{1,6}?(=|>|<|\\bin\\b|\\blike\\b)|\\/\\*.+?\\*\\/|<\\s*script\\b|\\bEXEC\\b|UNION.+?SELECT|UPDATE.+?SET|INSERT\\s+INTO.+?VALUES|(SELECT|DELETE).+?FROM|(CREATE|ALTER|DROP|TRUNCATE)\\s+(TABLE|DATABASE)";
$cookiefilter="\\b(and|or)\\b.{1,6}?(=|>|<|\\bin\\b|\\blike\\b)|\\/\\*.+?\\*\\/|<\\s*script\\b|\\bEXEC\\b|UNION.+?SELECT|UPDATE.+?SET|INSERT\\s+INTO.+?VALUES|(SELECT|DELETE).+?FROM|(CREATE|ALTER|DROP|TRUNCATE)\\s+(TABLE|DATABASE)";
function Codepage($strgets,$strgetsq,$strgetsql){
	if(preg_match("/".$strgetsql."/is",$strgetsq)==1){
	$url='http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'];
	echo '<br>You have triggered the WAF protection rules';
        echo '<br>你已经触发waf防护规则';
        echo '<br>提交地址危险地址'.$url;
        $sqlfile='log.txt';
        $content='$url\r\n';
        if($sqlfile_url=file_put_contents($sqlfile,$content,FILE_APPEND)){
        echo '你的操作记录已经被记录';

}
        //echo '<script>window.close();</script>';
	exit();	
}
}
foreach($_GET as $key=>$value){
	Codepage($key,$value,$getfilter);
}
foreach($_POST as $key=>$value){
	Codepage($key,$value,$postfilter);
}
foreach($_COOKIE as $key=>$value){
	Codepage($key,$value,$cookiefilter);
}
?>
