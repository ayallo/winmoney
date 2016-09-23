<?php
error_reporting(0);
$tpl = 'tpl_lk';

$page = 'dashboard'; if(isset($_GET['p'])){ $page=htmlspecialchars($_GET['p']); }

$html = ''; $m=array();

if($page=='registration'){
  $html .= get_shablon($tpl.'/lk_'.$page.'.html');
}
if($page=='dashboard'||$page=='account'||$page=='payments'||$page=='advertising'||$page=='advertising_one'||$page=='documents'){
  $m[1][]='%CSS%'; $m[2][] = '';
  $m[1][]='%SCRIPT%'; $m[2][] = '';
  $m[1][]='%DATE%'; $m[2][] = date_rus();
  $html .= get_shablon($tpl.'/head.html',$m);
  $html = str_replace('%TITLE%',$page,$html);
  $html .= '<body class="lk_'.$page.'">';
  $html .= get_shablon($tpl.'/head_nav.html',$m);
  $html .= get_shablon($tpl.'/lk_'.$page.'.html');
  $html .= get_shablon($tpl.'/footer.html');
}

if(!count($m)){ $m[1][]='%SCRIPT%'; $m[2][]=''; $m[1][]='%CSS%'; $m[2][]='';}
$html .= get_shablon($tpl.'/javascripts.html',$m);

echo $html;

function get_shablon($file,$m=array()){
  $out = file_get_contents($file);
  if(count($m)) $out = str_replace($m[1],$m[2],$out);
  return $out;
}
function count_proj($dir,$what){
  $out = array();
  $files = scandir($dir);
  foreach($files as $key =>$val)if($val!='.'&&$val!='..'){
    if(!is_dir($dir.$val)){
      $pt = pathinfo($val);
      if($pt['extension']=='html') {
        $out['files_html']++;
        $tmp = file($dir.'/'.$val); //echo $dir.$val.'<br>'; //./tplaccounts.html
        $out['files_html_words'] += str_word_count(file_get_contents($dir.'/'.$val));
        $out['files_html_row'] += count($tmp);
      }
      if($pt['extension']=='css') {
        $out['files_css']++;
        $out['files_css_words'] += str_word_count(file_get_contents($dir.'/'.$val));
      }
      if($pt['extension']=='js'){
        $out['files_js']++;
        $tmp = file($dir.$val);
        $out['files_js_words'] += str_word_count(file_get_contents($dir.'/'.$val));
        $out['files_js_row'] += count($tmp);
      }
    }else{
      $tmp = count_proj($dir.$val,$what);
      $out['files_html'] += $tmp['files_html'];
      $out['files_html_row'] += $tmp['files_html_row'];
      $out['files_html_words'] += $tmp['files_html_words'];
      $out['files_css'] += $tmp['files_css'];
      $out['files_css_words'] += $tmp['files_css_words'];
      $out['files_js'] += $tmp['files_js'];
      $out['files_js_row'] += $tmp['files_js_row'];
      $out['files_js_words'] += $tmp['files_js_words'];
    }
  }
  return $out;
}

function date_rus($timestamp=0){
  $mesa = array('01'=>'января','02'=>'февраля','03'=>'марта','04'=>'апреля','05'=>'мая','06'=>'июня','07'=>'июля','08'=>'августа','09'=>'сентября','10'=>'октября','11'=>'ноября','12'=>'декабря');
  if(!$timestamp) $timestamp=time();
  $day = date('d',$timestamp);
  $mes = date('m',$timestamp);
  $god = date('Y',$timestamp);
  return $day .' '. $mesa[$mes] .' '. $god;
}
?>
