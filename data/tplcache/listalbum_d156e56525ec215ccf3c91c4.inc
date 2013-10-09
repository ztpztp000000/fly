<?php
if(!isset($GLOBALS['_vars'])) $GLOBALS['_vars'] = array(); 
$fields = array();
 include $this->CompilerInclude("header.htm");
 ?>
<div class="wrapper mT10">
  <div class="west">
  <?php include $this->CompilerInclude("side_icon.htm");
  include $this->CompilerInclude("side_class.htm");
  include $this->CompilerInclude("side_search.htm");
 ?>
  </div>
  <div class="east">
    <dl class="border">
      <dt class="caption"><strong>相册</strong></dt>
      <dd class="body">
        <ul id="album">
        <?php
$atts = array();
$atts['tagname'] = 'datalist';
$atts['titlelen'] = '20';
$blockValue = $this->refObj->GetArcList($atts,$this->refObj,$fields); 
if(is_array($blockValue)){
foreach( $blockValue as $key=>$fields )
{
?>
          <li>
            <dl>
              <dt><a href="<?php echo $fields['arcurl']; ?>"><img src='<?php echo $fields['litpic']; ?>' /></a></dt>
              <dd class="textCenter" ><strong><a href="<?php echo $fields['arcurl']; ?>"><?php echo $fields['title']; ?></a></strong></dd>
            </dl>
          </li>
          <?php
}
}?>
        </ul>
        <div class="fRight mTB10 pd10"><?php
$atts = array();
$atts['tagname'] = 'pagelist';
 echo $this->refObj->GetPageList($atts,$this->refObj,$fields); 
?>
</div>
        <div class="clearfix"></div>
      </dd>
    </dl>
  </div>
</div>
<?php include $this->CompilerInclude("footer.htm");
 ?>
</body>
</html>