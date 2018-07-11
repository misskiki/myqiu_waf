<?php
$getfilter="select|(and|or)\\b.+?(>|<|=|in|like)|\\/\\*.+?\\*\\/|<\\s*script\\b|\\bEXEC\\b|UNION.+?SELECT|UPDATE.+?SET|INSERT\\s+INTO.+?VALUES|(SELECT|DELETE).+?FROM|(CREATE|ALTER|DROP|TRUNCATE)\\s+(TABLE|DATABASE)";
$postfilter="\\b(and|or)\\b.{1,6}?(=|>|<|\\bin\\b|\\blike\\b)|\\/\\*.+?\\*\\/|<\\s*script\\b|\\bEXEC\\b|UNION.+?SELECT|UPDATE.+?SET|INSERT\\s+INTO.+?VALUES|(SELECT|DELETE).+?FROM|(CREATE|ALTER|DROP|TRUNCATE)\\s+(TABLE|DATABASE)";
$cookiefilter="\\b(and|or)\\b.{1,6}?(=|>|<|\\bin\\b|\\blike\\b)|\\/\\*.+?\\*\\/|<\\s*script\\b|\\bEXEC\\b|UNION.+?SELECT|UPDATE.+?SET|INSERT\\s+INTO.+?VALUES|(SELECT|DELETE).+?FROM|(CREATE|ALTER|DROP|TRUNCATE)\\s+(TABLE|DATABASE)";
function Codepage($strgets,$strgetsq,$strgetsql){
	if(preg_match("/".$strgetsql."/is",$strgetsq)==1){
	$url=$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'];
        
	echo '<br>You have triggered the WAF protection rules';
        echo '<br>你已经触发waf防护规则';
        echo '<br>提交地址危险地址'.$url;
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
