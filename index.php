<?php
error_reporting(0);
$tpl = 'tpl';

$page = 'index'; if(isset($_GET['p'])){ $page=htmlspecialchars($_GET['p']); }

$html = ''; $m=array();

if($page=='auth'){
  $m[1][]='%CSS%'; $m[2][] = '';
  $m[1][]='%SCRIPT%'; $m[2][] = '';
  $html .= get_shablon($tpl.'/head.html',$m);
  $html = str_replace('%TITLE%',$page,$html);
  $html .= '<body class="pg'.$page.'">';
  $html .= '<div class="wrapper">';
  $html .= get_shablon($tpl.'/head_nav.html');
  $html .= get_shablon($tpl.'/'.$page.'.html');
  $html .= '</div>';
}
if($page=='payments'){
  $m[1][]='%CSS%'; $m[2][] = '';
  $m[1][]='%SCRIPT%'; $m[2][] = '';
  $html .= get_shablon($tpl.'/head.html',$m);
  $html = str_replace('%TITLE%',$page,$html);
  $html .= '<body class="pg'.$page.'">';
  $html .= '<div class="wrapper">';
  $html .= get_shablon($tpl.'/head_nav.html');
  $html .= get_shablon($tpl.'/'.$page.'.html');
  $html .= '</div>';
}

if($page=='index'){
  $m[1][]='%CSS%'; $m[2][] = '<link rel="stylesheet" href="css/pg_index.css">';
  $html .= get_shablon($tpl.'/head.html',$m);
  $html = str_replace('%TITLE%',$page,$html);
  $html .= '<body class="pgindex">';
  $html .= '<div class="wrapper">';
  $html .= get_shablon($tpl.'/head_nav.html');
  $html .= get_shablon($tpl.'/index.html');
  $html .= '</div>';
  $m[1][]='%SCRIPT%'; $m[2][] = get_shablon($tpl.'/program_agent.js');
}

if($page=='accounts'){
  $m[1][]='%CSS%'; $m[2][] = '<link rel="stylesheet" href="css/pg_accounts.css">';
  $m[1][]='%SCRIPT%'; $m[2][]='';
  $html .= get_shablon($tpl.'/head.html',$m);
  $html = str_replace('%TITLE%',$page,$html);
  $html .= '<body class="pgaccounts">';
  $html .= '<div class="wrapper">';
  $html .= get_shablon($tpl.'/head_nav.html');
  $html .= get_shablon($tpl.'/accounts.html');
  $html .= get_shablon($tpl.'/footer.html');
  $html .= '</div>';
}
if($page=='bonus'||$page=='bonus_get'||$page=='bonus_withdrawal'||$page=='bonus_rules'||$page=='bonus_activation'){
  $m[1][]='%CSS%';
  if($page=='bonus') $m[2][] = '<link rel="stylesheet" href="css/pg_bonus.css">';
  if($page=='bonus_get'||$page=='bonus_withdrawal'||$page=='bonus_rules'||$page=='bonus_activation') $m[2][] = '<link rel="stylesheet" href="css/pg_bonus_get.css">';

  $html .= get_shablon($tpl.'/head.html',$m);
  $html = str_replace('%TITLE%',$page,$html);
  if($page=='bonus_withdrawal'||$page=='bonus_rules'||$page=='bonus_activation') $class="bonus_get"; else $class=$page;
  $html .= '<body class="pg'.$class.'">';
  $html .= '<div class="wrapper">';
  $html .= get_shablon($tpl.'/head_nav.html');
  $html .= get_shablon($tpl.'/'.$page.'.html');
  $html .= get_shablon($tpl.'/footer.html');
  $html .= '</div>';
  if($page=='bonus'){ $m[1][]='%SCRIPT%'; $m[2][] = get_shablon($tpl.'/bonus.js'); }else{
    $m[1][]='%SCRIPT%'; $m[2][]='';
  }
}
if($page=='bonuses'){
  $m[1][]='%CSS%'; $m[2][] = '<link rel="stylesheet" href="css/pg_bonuses.css">';
  $m[1][]='%SCRIPT%'; $m[2][]='';
  $html .= get_shablon($tpl.'/head.html',$m);
  $html = str_replace('%TITLE%',$page,$html);
  $html .= '<body class="pgbonuses">';
  $html .= '<div class="wrapper">';
  $html .= get_shablon($tpl.'/head_nav.html');
  $html .= get_shablon($tpl.'/bonuses.html');
  //$html .= get_shablon($tpl.'/footer.html');
  $html .= '</div>';
}
if($page=='bonus_01'){
  $m[1][]='%CSS%'; $m[2][] = '';
  $m[1][]='%SCRIPT%'; $m[2][]='';
  $html .= get_shablon($tpl.'/head.html',$m);
  $html = str_replace('%TITLE%',$page,$html);
  $html .= '<body class="pgbonus_01">';
  $html .= '<div class="wrapper">';
  $html .= get_shablon($tpl.'/head_nav.html');
  $html .= get_shablon($tpl.'/bonus_01.html');
  $html .= get_shablon($tpl.'/footer.html');
  $html .= '</div>';
}
if($page=='contracts'||$page=='contracts_c6'||$page=='contracts_c8'||$page=='contracts_cfd'||$page=='contracts_zs'||$page=='contracts_m7'||$page=='contracts_m8'||$page=='contracts_m9'){
  $m[1][]='%CSS%'; $m[2][] = '<link rel="stylesheet" href="css/pg_contracts.css">';
  $m[1][]='%SCRIPT%'; $m[2][]='';
  $html .= get_shablon($tpl.'/head.html',$m);

  $html = str_replace('%TITLE%',$page,$html);
  $html .= '<body class="pgcontracts">';
  $html .= '<div class="wrapper">';
  $html .= get_shablon($tpl.'/head_nav.html');
  $html .= get_shablon($tpl.'/'.$page.'.html');
  //$html .= get_shablon($tpl.'/footer.html');
  $html .= '</div>';
}

if($page=='partners'){
  $m[1][]='%CSS%'; $m[2][] = '<link rel="stylesheet" href="css/pg_partners.css">';
  $html .= get_shablon($tpl.'/head.html',$m);

  $html = str_replace('%TITLE%',$page,$html);
  $html .= '<body class="pgpartners">';
  $html .= '<div class="wrapper">';
  $html .= get_shablon($tpl.'/head_nav.html');
  $html .= get_shablon($tpl.'/partners.html');
  $html = str_replace('%FOOTER%',get_shablon($tpl.'/footer.html'),$html);
  $m[1][]='%SCRIPT%'; $m[2][] = get_shablon($tpl.'/partners.js');
  $html .= '</div>';
}
if($page=='partners_internet'){
  $m[1][]='%CSS%'; $m[2][] = '';
  //<link rel="stylesheet" href="css/pg_partners_internet.css">
  $html .= get_shablon($tpl.'/head.html',$m);

  $html = str_replace('%TITLE%',$page,$html);
  $html .= '<body class="pgpartners_internet">';
  $html .= '<div class="wrapper">';
  $html .= get_shablon($tpl.'/head_nav.html');
  $html .= get_shablon($tpl.'/partners_internet.html');

  $html .= get_shablon($tpl.'/footer.html');
  $m[1][]='%SCRIPT%'; $m[2][] = get_shablon($tpl.'/partners_internet.js');
  $html .= '</div>';
}
if($page=='partners_reward'){
  $m[1][]='%CSS%'; $m[2][] = '<link rel="stylesheet" href="css/pg_partners_reward.css">';
  $html .= get_shablon($tpl.'/head.html',$m);

  $html = str_replace('%TITLE%',$page,$html);
  $html .= '<body class="pgpartners_reward">';
  $html .= '<div class="wrapper">';
  $html .= get_shablon($tpl.'/head_nav.html');
  $html .= get_shablon($tpl.'/partners_reward.html');
  $html .= get_shablon($tpl.'/footer.html');
  $html .= '</div>';
  $m[1][]='%SCRIPT%'; $m[2][] = get_shablon($tpl.'/partners_internet.js');
}
if($page=='partners_vidy'){
  $m[1][]='%CSS%'; $m[2][] = '<link rel="stylesheet" href="css/pg_partners_reward.css">';
  $m[1][]='%SCRIPT%'; $m[2][]='';
  $html .= get_shablon($tpl.'/head.html',$m);

  $html = str_replace('%TITLE%',$page,$html);
  $html .= '<body class="pgpartners_vidy">';
  $html .= '<div class="wrapper">';
  $html .= get_shablon($tpl.'/head_nav.html');
  $html .= get_shablon($tpl.'/partners_vidy.html');
  $html .= get_shablon($tpl.'/footer.html');
  $html .= '</div>';
}
if($page=='partners_net'){
  $m[1][]='%CSS%'; $m[2][] = '<link rel="stylesheet" href="css/pg_partners_reward.css">';
  $html .= get_shablon($tpl.'/head.html',$m);

  $html = str_replace('%TITLE%',$page,$html);
  $html .= '<body class="pgpartners_net">';
  $html .= '<div class="wrapper">';
  $html .= get_shablon($tpl.'/head_nav.html');
  $html .= get_shablon($tpl.'/partners_net.html');
  $html .= get_shablon($tpl.'/footer.html');
  $html .= '</div>';
  $m[1][]='%SCRIPT%'; $m[2][] = get_shablon($tpl.'/partners.js');
}
if($page=='partners_rules'){
  $m[1][]='%CSS%'; $m[2][] = '<link rel="stylesheet" href="css/pg_partners_reward.css">';
  $m[1][]='%SCRIPT%'; $m[2][]='';
  $html .= get_shablon($tpl.'/head.html',$m);

  $html = str_replace('%TITLE%',$page,$html);
  $html .= '<body class="pgpartners_rules">';
  $html .= '<div class="wrapper">';
  $html .= get_shablon($tpl.'/head_nav.html');
  $html .= get_shablon($tpl.'/partners_rules.html');
  $html .= get_shablon($tpl.'/footer.html');
  $html .= '</div>';
}

if($page=='program_cpa'){
  $m[1][]='%CSS%'; $m[2][] = '<link rel="stylesheet" href="css/pg_programagent.css">';
  $html .= get_shablon($tpl.'/head.html',$m);

  $html = str_replace('%TITLE%',$page,$html);
  $html .= '<body class="pgprogram_cpa">';
  $html .= '<div class="wrapper">';
  $html .= get_shablon($tpl.'/head_nav.html');
  $html .= get_shablon($tpl.'/program_cpa.html');
  $html .= get_shablon($tpl.'/footer.html');
  $html .= '</div>';
  $m[1][]='%SCRIPT%'; $m[2][] = get_shablon($tpl.'/program_agent.js');
}
if($page=='program_region'){
  $m[1][]='%CSS%'; $m[2][] = '<link rel="stylesheet" href="css/pg_programagent.css">';
  $html .= get_shablon($tpl.'/head.html',$m);

  $html = str_replace('%TITLE%',$page,$html);
  $html .= '<body class="pgprogram_region">';
  $html .= '<div class="wrapper">';
  $html .= get_shablon($tpl.'/head_nav.html');
  $html .= get_shablon($tpl.'/program_region.html');
  $html .= get_shablon($tpl.'/footer.html');
  $html .= '</div>';
  $m[1][]='%SCRIPT%'; $m[2][] = get_shablon($tpl.'/program_agent.js');
}
if($page=='program_region_reward'){
  $m[1][]='%CSS%'; $m[2][] = '<link rel="stylesheet" href="css/pg_program_agent_reward.css">';
  $m[1][]='%SCRIPT%'; $m[2][]='';
  $html .= get_shablon($tpl.'/head.html',$m);

  $html = str_replace('%TITLE%',$page,$html);
  $html .= '<body class="pgprogram_agent_reward">';
  $html .= '<div class="wrapper">';
  $html .= get_shablon($tpl.'/head_nav.html');
  $html .= get_shablon($tpl.'/program_region_reward.html');
  $html .= get_shablon($tpl.'/footer.html');
  $html .= '</div>';
}

if($page=='program_agent'){/*переделано на новый*/
  $m[1][]='%CSS%'; $m[2][] = '';
  //<link rel="stylesheet" href="css/pg_programagent.css">
  $html .= get_shablon($tpl.'/head.html',$m);
  $html = str_replace('%TITLE%',$page,$html);
  $html .= '<body class="pgprogramagent">';
  $html .= '<div class="wrapper">';
  $html .= get_shablon($tpl.'/head_nav.html');
  $html .= get_shablon($tpl.'/program_agent.html');
  $html .= get_shablon($tpl.'/footer.html');
  $html .= '</div>';
  $m[1][]='%SCRIPT%'; $m[2][] = get_shablon($tpl.'/program_agent.js');
}
if($page=='program_agent_partners'){
  $m[1][]='%CSS%'; $m[2][] = '<link rel="stylesheet" href="css/pg_program_agent_partners.css">';
  $html .= get_shablon($tpl.'/head.html',$m);

  $html = str_replace('%TITLE%',$page,$html);
  $html .= '<body class="pgprogram_agent_partners">';
  $html .= '<div class="wrapper">';
  $html .= get_shablon($tpl.'/head_nav.html');
  $html .= get_shablon($tpl.'/program_agent_partners.html');
  $html .= get_shablon($tpl.'/footer.html');
  $html .= '</div>';
  $m[1][]='%SCRIPT%'; $m[2][] = get_shablon($tpl.'/partners.js');
}
if($page=='program_agent_reward'){
  $m[1][]='%CSS%'; $m[2][] = '<link rel="stylesheet" href="css/pg_program_agent_reward.css">';
  $m[1][]='%SCRIPT%'; $m[2][]='';
  $html .= get_shablon($tpl.'/head.html',$m);

  $html = str_replace('%TITLE%',$page,$html);
  $html .= '<body class="pgprogram_agent_reward">';
  $html .= '<div class="wrapper">';
  $html .= get_shablon($tpl.'/head_nav.html');
  $html .= get_shablon($tpl.'/program_agent_reward.html');
  $html .= get_shablon($tpl.'/footer.html');
  $html .= '</div>';
}
if($page=='program_agent_rules'){
  $m[1][]='%CSS%'; $m[2][] = '<link rel="stylesheet" href="css/pg_program_agent_reward.css">';
  $m[1][]='%SCRIPT%'; $m[2][]='';
  $html .= get_shablon($tpl.'/head.html',$m);

  $html = str_replace('%TITLE%',$page,$html);
  $html .= '<body class="pgprogram_agent_rules">';
  $html .= '<div class="wrapper">';
  $html .= get_shablon($tpl.'/head_nav.html');
  $html .= get_shablon($tpl.'/program_agent_rules.html');
  $html .= get_shablon($tpl.'/footer.html');
  $html .= '</div>';
}

if($page=='about'){/*переделано на новый*/
  $m[1][]='%CSS%'; $m[2][] = '';
  //<link rel="stylesheet" href="css/pg_programagent.css">
  $html .= get_shablon($tpl.'/head.html',$m);

  $html = str_replace('%TITLE%',$page,$html);
  $html .= '<body class="pgabout">';
  $html .= '<div class="wrapper">';
  $html .= get_shablon($tpl.'/head_nav.html');
  $html .= get_shablon($tpl.'/about.html');
  $html .= '</div>';
  $m[1][]='%SCRIPT%'; $m[2][] = get_shablon($tpl.'/program_agent.js');
  $html .= get_shablon($tpl.'/footer.html');
}
if($page=='about_inworld'){
  $m[1][]='%CSS%'; $m[2][] = '<link rel="stylesheet" href="css/pg_about_inworld.css">';
  $m[1][]='%SCRIPT%'; $m[2][]='';
  $html .= get_shablon($tpl.'/head.html',$m);

  $html = str_replace('%TITLE%',$page,$html);
  $html .= '<body class="pgabout_inworld">';
  $html .= '<div class="wrapper">';
  $html .= get_shablon($tpl.'/head_nav.html');
  $html .= get_shablon($tpl.'/about_inworld.html');
  $html .= get_shablon($tpl.'/footer.html');
  $html .= '</div>';
}
if($page=='about_buisness'){
  $m[1][]='%CSS%'; $m[2][] = '<link rel="stylesheet" href="css/pg_about_inworld.css">';
  $m[1][]='%SCRIPT%'; $m[2][]='';
  $html .= get_shablon($tpl.'/head.html',$m);

  $html = str_replace('%TITLE%',$page,$html);
  $html .= '<body class="pgabout_buisness">';
  $html .= '<div class="wrapper">';
  $html .= get_shablon($tpl.'/head_nav.html');
  $html .= get_shablon($tpl.'/about_buisness.html');
  $html .= get_shablon($tpl.'/footer.html');
  $html .= '</div>';
}

if($page=='analytics_articles'||$page=='analytics_article'||$page=='analytics_calendar'||$page=='analytics_video'){
  $m[1][]='%CSS%'; $m[2][] = '<link rel="stylesheet" href="css/pg_analytics.css">';
  $m[1][]='%SCRIPT%'; $m[2][]='';
  $html .= get_shablon($tpl.'/head.html',$m);

  $html = str_replace('%TITLE%',$page,$html);
  $html .= '<body class="pg'.$page.'">';
  $html .= '<div class="wrapper_page">';
  $html .= get_shablon($tpl.'/head_nav.html');
  $html .= get_shablon($tpl.'/'.$page.'.html');
  $html .= get_shablon($tpl.'/footer.html');
  $html .= '</div>';
}
if($page=='news_all'||$page=='news_one'){
  $m[1][]='%CSS%'; $m[2][] = '<link rel="stylesheet" href="css/pg_analytics.css">';
  $m[1][]='%SCRIPT%'; $m[2][]='';
  $html .= get_shablon($tpl.'/head.html',$m);

  $html = str_replace('%TITLE%',$page,$html);
  $html .= '<body class="pg'.$page.'">';
  $html .= '<div class="wrapper_page">';
  $html .= get_shablon($tpl.'/head_nav.html');
  $html .= get_shablon($tpl.'/'.$page.'.html');
  $html .= get_shablon($tpl.'/footer.html');
  $html .= '</div>';
}
if($page=='webinars'){
  $m[1][]='%CSS%'; $m[2][] = '<link rel="stylesheet" href="css/pg_analytics.css">';
  $m[1][]='%SCRIPT%'; $m[2][]='';
  $html .= get_shablon($tpl.'/head.html',$m);

  $html = str_replace('%TITLE%',$page,$html);
  $html .= '<body class="pg'.$page.'">';
  $html .= '<div class="wrapper_page">';
  $html .= get_shablon($tpl.'/head_nav.html');
  $html .= get_shablon($tpl.'/'.$page.'.html');
  $html .= get_shablon($tpl.'/footer.html');
  $html .= '</div>';
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

 ?>
