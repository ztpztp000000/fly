<div class="channel box">
      {dede:type}
	  <div class="channel_tit">
	      <div class="l"><h4><a href="[field:typelink /]" target="_blank">[field:typename /]</a></h4></div>
		  <div class="r"><span><a href="[field:typelink /]" target="_blank"><img src="/templets/img_v4/more.gif" alt="更多" /></a></span></div>
	  </div>
	  {/dede:type}
	  <div class="channel_img">
	    {dede:arclist type='image' type='commend' typeid="0" row='1' att='0' imgwidth='52' imgheight='40' titlelen='20' infolen='30'}
		<div class="p">[field:imglink /]</div>
		<div class="t"><a href="[field:filename/]" target="_blank">[field:title/]</a><p>[field:info/]</p></div>
		{/dede:arclist}
	  <div class="clear"></div></div>
	  <ol class="links_1">
		      {dede:arclist row=10 att=0 titlelen=40 orderby=pubdate orderby=ID}
			  <li><a href="[field:arcurl /]" target="_blank">[field:title /]</a></li>
			  {/dede:arclist}
	 </ol>
  </div>