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

if($page=='accounts'||$page=='indicators'||$page=='indicator'){
  $m[1][]='%CSS%'; $m[2][] = '<link rel="stylesheet" href="css/pg_accounts.css">';
  $m[1][]='%SCRIPT%'; $m[2][]='';
  $html .= get_shablon($tpl.'/head.html',$m);
  $html = str_replace('%TITLE%',$page,$html);
  $html .= '<body class="pgaccounts pgindicators">';
  $html .= '<div class="wrapper">';
  $html .= get_shablon($tpl.'/head_nav.html');
  $html .= get_shablon($tpl.'/'.$page.'.html');
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
  $html .= get_shablon($tpl.'/contracts.html');
  $html = str_replace('%TABLE_DIV%', contracts_table($page),$html);
  $html .= '</div>';
}

function contracts_table($page){
  $mas=array(
    'contracts'=>array(
      'head'=>array(
        0=>array('n'=>'СИМВОЛ','w'=>'colwp10'),
        1=>array('n'=>'НАИМЕНОВАНИЕ','w'=>'colwp40'),
        2=>array('n'=>'ВЕЛИЧИНА','w'=>'colwp10'),
        3=>array('n'=>'СПРЕД<br>в пунктах','w'=>'colwp10'),
        4=>array('n'=>'УРОВЕНЬ<br>LIMIT & STOP','w'=>'colwp10'),
        5=>array('n'=>'SWAP SHORT<br>PIPS','w'=>'colwp10'),
        6=>array('n'=>'SWAP LONG<br>PIPS','w'=>'colwp10'),
      ),
      'body'=>array(
        0=>array('AUDCAD','Австралийский доллар к канадскому доллару','0.0001','8','8','-0.710','0.200'),
        array('AUDCHF','Австралийский доллар к швейцарскому франку','0.0001','6','6','-0.860','0.400'),
        array('AUDJPY','Австралийский доллар к японской иене','0.0001','6','6','-0.950','0.410'),
        array('AUDNZD','Австралийский доллар к новозеландскому доллару','0.01','7','7','-0.313','-0.128'),
        array('AUDCAD','Австралийский доллар к канадскому доллару','0.0001','8','8','-0.710','0.200'),
        array('AUDCHF','Австралийский доллар к швейцарскому франку','0.0001','6','6','-0.860','0.400'),
        array('AUDJPY','Австралийский доллар к японской иене','0.0001','6','6','-0.950','0.410'),
        array('AUDNZD','Австралийский доллар к новозеландскому доллару','0.01','7','7','-0.313','-0.128'),
        array('AUDCAD','Австралийский доллар к канадскому доллару','0.0001','8','8','-0.710','0.200'),
        array('AUDCHF','Австралийский доллар к швейцарскому франку','0.0001','6','6','-0.860','0.400'),
        array('AUDJPY','Австралийский доллар к японской иене','0.0001','6','6','-0.950','0.410'),
        array('AUDNZD','Австралийский доллар к новозеландскому доллару','0.01','7','7','-0.313','-0.128'),
      ),
    ),
    'contracts_c6'=>array(
      'head'=>array(
        0=>array('n'=>'СИМВОЛ','w'=>'colwp10'),
        array('n'=>'НАИМЕНОВАНИЕ','w'=>'colwp50'),
        array('n'=>'ВЕЛИЧИНА','w'=>'colwp10'),
        array('n'=>'СПРЕД<br>в пунктах','w'=>'colwp10'),
        array('n'=>'SWAP SHORT<br>PIPS','w'=>'colwp10'),
        array('n'=>'SWAP LONG<br>PIPS','w'=>'colwp10'),
      ),
      'body'=>array(
        0=>array('AUDCAD','Австралийский доллар к канадскому доллару','0.0001','8','-0.710','0.200'),
        array('AUDCHF','Австралийский доллар к швейцарскому франку','0.0001','6','-0.860','0.400'),
        array('AUDJPY','Австралийский доллар к японской иене','0.0001','6','-0.950','0.410'),
        array('AUDNZD','Австралийский доллар к новозеландскому доллару','0.01','7','-0.313','-0.128'),
        array('AUDCAD','Австралийский доллар к канадскому доллару','0.0001','8','-0.710','0.200'),
        array('AUDCHF','Австралийский доллар к швейцарскому франку','0.0001','6','-0.860','0.400'),
        array('AUDJPY','Австралийский доллар к японской иене','0.0001','6','-0.950','0.410'),
        array('AUDNZD','Австралийский доллар к новозеландскому доллару','0.01','7','-0.313','-0.128'),
        array('AUDCAD','Австралийский доллар к канадскому доллару','0.0001','8','-0.710','0.200'),
        array('AUDCHF','Австралийский доллар к швейцарскому франку','0.0001','6','-0.860','0.400'),
        array('AUDJPY','Австралийский доллар к японской иене','0.0001','6','-0.950','0.410'),
        array('AUDNZD','Австралийский доллар к новозеландскому доллару','0.01','7','-0.313','-0.128'),
      ),
    ),
    'contracts_c8'=>array(
      'head'=>array(
        0=>array('n'=>'СИМВОЛ','w'=>'colwp10'),
        array('n'=>'НАИМЕНОВАНИЕ','w'=>'colwp30'),
        array('n'=>'ВЕЛИЧИНА<br>1 ПУНКТА<br>PIP','w'=>'colwp10'),
        array('n'=>'МИН.<br>СПРЕД<br>в пунктах','w'=>'colwp10'),
        array('n'=>'СРЕДНИЙ<br>СПРЕД<br>в пунктах','w'=>'colwp10'),
        array('n'=>'УРОВЕНЬ<br>LIMIT &<br>STOP','w'=>'colwp10'),
        array('n'=>'SWAP SHORT<br>PIPS','w'=>'colwp10'),
        array('n'=>'SWAP LONG<br>PIPS','w'=>'colwp10'),
      ),
      'body'=>array(
        0=>array('AUDCAD','Австралийский доллар к канадскому доллару','0.0001','8','8','8','-0.710','0.200'),
        array('AUDCHF','Австралийский доллар к швейцарскому франку','0.0001','6','6','6','-0.860','0.400'),
        array('AUDJPY','Австралийский доллар к японской иене','0.0001','6','6','6','-0.950','0.410'),
        array('AUDNZD','Австралийский доллар к новозеландскому доллару','0.01','7','7','7','-0.313','-0.128'),
        array('AUDCAD','Австралийский доллар к канадскому доллару','0.0001','8','8','8','-0.710','0.200'),
        array('AUDCHF','Австралийский доллар к швейцарскому франку','0.0001','6','6','6','-0.860','0.400'),
        array('AUDJPY','Австралийский доллар к японской иене','0.0001','6','6','6','-0.950','0.410'),
        array('AUDNZD','Австралийский доллар к новозеландскому доллару','0.01','7','7','7','-0.313','-0.128'),
        array('AUDCAD','Австралийский доллар к канадскому доллару','0.0001','8','8','8','-0.710','0.200'),
        array('AUDCHF','Австралийский доллар к швейцарскому франку','0.0001','6','6','6','-0.860','0.400'),
        array('AUDJPY','Австралийский доллар к японской иене','0.0001','6','6','6','-0.950','0.410'),
        array('AUDNZD','Австралийский доллар к новозеландскому доллару','0.01','7','7','7','-0.313','-0.128'),

      ),
    ),
    'contracts_cfd'=>array(
      'head'=>array(
        0=>array('n'=>'СИМВОЛ','w'=>'colwp10'),
        array('n'=>'НАИМЕНОВАНИЕ','w'=>'colwp30'),
        array('n'=>'ВЕЛИЧИНА<br>1 ПУНКТА<br>PIP','w'=>'colwp10'),
        array('n'=>'МИН.<br>СПРЕД<br>в пунктах','w'=>'colwp10'),
        array('n'=>'СРЕДНИЙ<br>СПРЕД<br>в пунктах','w'=>'colwp10'),
        array('n'=>'УРОВЕНЬ<br>LIMIT &<br>STOP','w'=>'colwp10'),
        array('n'=>'SWAP SHORT<br>PIPS','w'=>'colwp10'),
        array('n'=>'SWAP LONG<br>PIPS','w'=>'colwp10'),
      ),
      'body'=>array(
        0=>array('DE30Cash','DE 30 Index Cash','1','8','0.8*','-3.000','-6.000','0.005%'),
        array('UK100Cash','UK 100 Index Cash','2','8','0.9*','-3.400','-1.000','0.015%'),
        array('US500Cash','US 500 Index Cash','1','8','0.7*','-3.000','-6.000','0.007%'),
        array('USTECHCash','US Nasdaq Index Cash','1','7','0.8*','-4.000','-6.000','0.005%'),
        array('US30Cash','US Dow Jones Index Cash','1','7','0.8*','-4.000','-6.000','0.005%'),
        array('UK100Cash','UK 100 Index Cash','2','8','0.9*','-3.400','-1.000','0.015%'),
        array('US500Cash','US 500 Index Cash','1','8','0.7*','-3.000','-6.000','0.007%'),
        array('USTECHCash','US Nasdaq Index Cash','1','7','0.8*','-4.000','-6.000','0.005%'),
        array('US30Cash','US Dow Jones Index Cash','1','7','0.8*','-4.000','-6.000','0.005%'),
        array('UK100Cash','UK 100 Index Cash','2','8','0.9*','-3.400','-1.000','0.015%'),
        array('US500Cash','US 500 Index Cash','1','8','0.7*','-3.000','-6.000','0.007%'),
        array('USTECHCash','US Nasdaq Index Cash','1','7','0.8*','-4.000','-6.000','0.005%'),
        array('US30Cash','US Dow Jones Index Cash','1','7','0.8*','-4.000','-6.000','0.005%'),


      ),
    ),
    'contracts_zs'=>array(
      'head'=>array(
        0=>array('n'=>'СИМВОЛ','w'=>'colwp20'),
        array('n'=>'НАИМЕНОВАНИЕ','w'=>'colwp40'),
        array('n'=>'ВЕЛИЧИНА<br>1 ПУНКТА<br>PIP','w'=>'colwp20'),
        array('n'=>'Размер<br>1 ЛОТА','w'=>'colwp20'),
      ),
      'body'=>array(
        0=>array('EURUSD.z','Евро к доллару США','0.0001','100 000 EUR'),
        array('USDCAD.z','Доллар США к канадскому доллару','0.0001','100 000 USD'),
        array('EURJPY.z','Евро к японской иене','0.01','100 000 EUR'),
        array('USDJPY.z','Доллар США к японской иене','0.0001','100 000 USD'),
        array('USDCAD.z','Доллар США к канадскому доллару','0.0001','100 000 USD'),
        array('EURJPY.z','Евро к японской иене','0.01','100 000 EUR'),
        array('USDJPY.z','Доллар США к японской иене','0.0001','100 000 USD'),
        array('USDCAD.z','Доллар США к канадскому доллару','0.0001','100 000 USD'),
        array('EURJPY.z','Евро к японской иене','0.01','100 000 EUR'),
        array('USDJPY.z','Доллар США к японской иене','0.0001','100 000 USD'),
        array('USDCAD.z','Доллар США к канадскому доллару','0.0001','100 000 USD'),
        array('EURJPY.z','Евро к японской иене','0.01','100 000 EUR'),
        array('USDJPY.z','Доллар США к японской иене','0.0001','100 000 USD'),
      ),
    ),
    'contracts_m7'=>array(
      'head'=>array(
        0=>array('n'=>'СИМВОЛ','w'=>'colwp10'),
        array('n'=>'НАИМЕНОВАНИЕ','w'=>'colwp40'),
        array('n'=>'ВЕЛИЧИНА<br>1 ПУНКТА<br>PIP','w'=>'colwp10'),
        array('n'=>'РАЗМЕР<br>1 ЛОТА','w'=>'colwp10'),
        array('n'=>'СПРЕД<br>В ПУНКТАХ','w'=>'colwp10'),
        array('n'=>'SWAP SHORT<br>PIPS','w'=>'colwp10'),
        array('n'=>'SWAP LONG<br>PIPS','w'=>'colwp10'),
      ),
      'body'=>array(
        0=>array('XAGUSD','Cеребро в долларах США','0.1','5000 oz.','2.6','-0.009','-0.005'),
        array('XAUUSD','Золото в долларах США','0.1','100 oz.','70','-0.506','-0.282'),
        array('XAGUSD','Cеребро в долларах США','0.2','140 oz.','80','-0.556','-0.582'),
        array('XAUUSD','Золото в долларах США','0.1','100 oz.','70','-0.506','-0.282'),
        array('XAGUSD','Cеребро в долларах США','0.2','140 oz.','80','-0.556','-0.582'),
        array('XAUUSD','Золото в долларах США','0.1','100 oz.','70','-0.506','-0.282'),
        array('XAGUSD','Cеребро в долларах США','0.2','140 oz.','80','-0.556','-0.582'),
        array('XAUUSD','Золото в долларах США','0.1','100 oz.','70','-0.506','-0.282'),
        array('XAGUSD','Cеребро в долларах США','0.2','140 oz.','80','-0.556','-0.582'),


      ),
    ),
    'contracts_m8'=>array(
      'head'=>array(
        0=>array('n'=>'СИМВОЛ','w'=>'colwp10'),
        array('n'=>'НАИМЕНОВАНИЕ','w'=>'colwp50'),
        array('n'=>'ВЕЛИЧИНА<br>1 ПУНКТА<br>PIP','w'=>'colwp10'),
        array('n'=>'РАЗМЕР<br>1 ЛОТА','w'=>'colwp10'),
        array('n'=>'СРЕДНИЙ<br>СПРЕД<br>в пунктах','w'=>'colwp10'),
        array('n'=>'УРОВЕНЬ<br>LIMIT &<br>STOP','w'=>'colwp10'),
      ),
      'body'=>array(
        0=>array('XAUUSD','Cеребро в долларах США','0.1','5000 oz.','-0.009','-0.005'),
        array('XAGUSD','Золото в долларах США','0.1','5000 oz.','-0.009','-0.005'),
        array('XAUUSD','Cеребро в долларах США','0.1','5000 oz.','-0.009','-0.005'),
        array('XAGUSD','Золото в долларах США','0.5','5500 oz.','-0.109','-0.035'),
        array('XAGUSD','Золото в долларах США','0.1','5000 oz.','-0.009','-0.005'),
        array('XAUUSD','Cеребро в долларах США','0.1','5000 oz.','-0.009','-0.005'),
        array('XAGUSD','Золото в долларах США','0.5','5500 oz.','-0.109','-0.035'),
        array('XAGUSD','Золото в долларах США','0.1','5000 oz.','-0.009','-0.005'),
        array('XAUUSD','Cеребро в долларах США','0.1','5000 oz.','-0.009','-0.005'),
        array('XAGUSD','Золото в долларах США','0.5','5500 oz.','-0.109','-0.035'),

      ),
    ),
    'contracts_m9'=>array(
      'head'=>array(
        0=>array('n'=>'СИМВОЛ','w'=>'colwp10'),
        array('n'=>'НАИМЕНОВАНИЕ','w'=>'colwp30'),
        array('n'=>'ВЕЛИЧИНА<br>1 ПУНКТА<br>PIP','w'=>'colwp10'),
        array('n'=>'РАЗМЕР<br>1 ЛОТА','w'=>'colwp10'),
        array('n'=>'МИН.<br>СПРЕД<br>в пунктах','w'=>'colwp10'),
        array('n'=>'СРЕДНИЙ<br>СПРЕД<br>в пунктах','w'=>'colwp10'),
        array('n'=>'SWAP SHORT<br>PIPS','w'=>'colwp10'),
        array('n'=>'SWAP LONG<br>PIPS','w'=>'colwp10'),
      ),
      'body'=>array(
        0=>array('XAGUSD','Cеребро в долларах США','0.01','5000 oz.','2.4','2.85','3','-0.009'),
        array('XAUUSD','Золото в долларах США','0.01','5000 oz.','2.4','2.85','3','-0.009'),
        array('XAGUSD','Cеребро в долларах США','0.01','5000 oz.','2.4','2.85','3','-0.009'),
        array('XAUUSD','Золото в долларах США','0.01','5000 oz.','2.4','2.85','3','-0.009'),
        array('XAUUSD','Золото в долларах США','0.21','6000 oz.','2.4','2.85','3','-0.009'),
        array('XAGUSD','Cеребро в долларах США','0.01','5000 oz.','2.4','2.85','3','-0.019'),
        array('XAUUSD','Золото в долларах США','0.45','3000 oz.','2.4','2.85','3','-0.049'),
        array('XAUUSD','Золото в долларах США','0.06','5000 oz.','2.4','2.85','3','-0.029'),
        array('XAGUSD','Cеребро в долларах США','0.07','8000 oz.','2.4','2.85','3','-0.039'),
        array('XAUUSD','Золото в долларах США','0.01','5000 oz.','2.4','2.85','3','-0.059'),

      ),
    ),
  );
  $tab = $mas[$page];
  $out='<div class="table_div">
    <div class="row_head">';
      foreach($tab['head'] as $k => $v)
      $out .= '<div class="col '.$v['w'].'">'.$v['n'].'</div>';
  $out.='</div>';
  foreach($tab['body'] as $k0 => $v0){
    $out.='  <div class="row">';
    foreach($v0 as $k => $v){
      $out .= '<div class="col '.$tab['head'][$k]['w'].'"><div class="rc_title">'.str_replace('<br>','',$tab['head'][$k]['n']).'</div>'.$v.'</div>';
    }
    $out .= '</div>';
  }
  $out .= '</div>';
  return $out;
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

if($page=='about'||$page=='about2'){/*переделано на новый*/
  $m[1][]='%CSS%'; $m[2][] = '';
  //<link rel="stylesheet" href="css/pg_programagent.css">
  $html .= get_shablon($tpl.'/head.html',$m);

  $html = str_replace('%TITLE%',$page,$html);
  $html .= '<body class="pgabout">';
  $html .= '<div class="wrapper">';
  $html .= get_shablon($tpl.'/head_nav.html');
  $m[1][]='%inFOOTER%'; $m[2][] = get_shablon($tpl.'/footer.html');
  $html .= get_shablon($tpl.'/'.$page.'.html',$m);
  $html .= '</div>';
  $m[1][]='%SCRIPT%'; $m[2][] = get_shablon($tpl.'/program_agent.js');
  //$html .= get_shablon($tpl.'/footer.html');
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
  if($file=='tpl/head_nav.html'&&isset($_GET['client'])&&$_GET['client']==1){
    $out = str_replace('%hn_client%','',$out);
  }else $out = str_replace('%hn_client%','hn_clhide',$out);
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
