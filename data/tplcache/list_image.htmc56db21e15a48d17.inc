<?php
$z[0]=Array("global","",233,261);
$z[0][4]['name']="cfg_soft_lang";
$z[1]=Array("field","",273,292);
$z[1][4]['name']="title";
$z[2]=Array("global","",293,319);
$z[2][4]['name']="cfg_webname";
$z[3]=Array("field","",359,388);
$z[3][4]['name']="keywords";
$z[4]=Array("field","",427,485);
$z[4][4]['name']="description";
$z[4][4]['function']="html2text(@me)";
$z[5]=Array("global","",502,534);
$z[5][4]['name']="cfg_templets_skin";
$z[6]=Array("include","",647,682);
$z[6][4]['filename']="head.htm";
$z[7]=Array("field","",813,842);
$z[7][4]['name']="position";
$z[8]=Array("list","\n				<li>\n					<a href=\"[field:arcurl/]\" class=\"pic\"><img src=\"[field:litpic/]\" alt=\"[field:title function='html2text(@me)'/]\"/></a>\n					<a href=\"[field:arcurl/]\" class=\"title\">[field:title/]</a>\n					<span class=\"date\"><small>最后更新：</small>[field:pubdate function=\"GetDateMK(@me)\"/]</span>\n				</li>\n          ",921,1279);
$z[8][4]['pagesize']="12";
$z[9]=Array("pagelist","",1371,1442);
$z[9][4]['listitem']="info,index,end,pre,next,pageno";
$z[9][4]['listsize']="5";
$z[10]=Array("channel","\n		<li><a href='[field:typeurl/]'>[field:typename/]</a></li>",1660,1838);
$z[10][4]['type']="son";
$z[10][4]['currentstyle']="<li><a href='~typelink~' class='thisclass'>~typename~</a></li>";
$z[11]=Array("myad","",1939,1970);
$z[11][4]['name']="listRtPicAD";
$z[12]=Array("arclist","\n						<li>\n							<a href=\"[field:arcurl/]\" class=\"preview\"><img src=\"[field:litpic/]\" alt=\"[field:title function='html2text(@me)'/]\"/></a>\n							<a href=\"[field:arcurl/]\" class=\"title\">[field:title/]</a>\n							<span class=\"intro\">更新:[field:pubdate function=\"GetDateMK(@me)\"/]</span>\n						</li>\n                     ",2111,2500);
$z[12][4]['row']="5";
$z[12][4]['type']="image.";
$z[12][4]['orderby']="click";
$z[13]=Array("arclist","\n						<li><a href=\"[field:arcurl/]\"><img src=\"[field:litpic/]\" alt=\"[field:title function='html2text(@me)'/]\"/><span class=\"title\">[field:title/]</span></a></li>\n                    ",2675,2917);
$z[13][4]['row']="8";
$z[13][4]['type']="image.commend.";
$z[14]=Array("myad","",3013,3045);
$z[14][4]['name']="listRtPicAD2";
$z[15]=Array("myad","",3145,3178);
$z[15][4]['name']="innerfooterAD";
$z[16]=Array("include","",3185,3222);
$z[16][4]['filename']="footer.htm";

?>