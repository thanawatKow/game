<style type="text/css">
<!--
.style1 {color: #c02f22}
.style3 {color: #000000}
-->
</style>
<span class="style10">&nbsp;&nbsp;&nbsp;<u>สินค้าใหม่</u></span> <span class="style10"><img src="<?php echo base_url() ?>image/coquette_part2_020.png" width="26" height="27" align="middle" /></span><br />
<br />
</span>
<?php
	$num=1;
  foreach ($qry->result() as $row) 
  {
  	if($num>2){
		break;
	}
  ?>
<table width="300" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="52"><div align="center">
      <a href="<?php echo base_url() ?>index.php/product/showDetail/<?php echo $row->pro_code; ?>">
      <?
		echo "<div align='center'><img src='".base_url()."uploads/".$row->pro_picture."' width='50' border='0'></div>";
		?>
      </a></div>    </td>
    <td width="165" valign="top"><p><a href="<?php echo base_url() ?>index.php/product/showDetail/<?php echo $row->pro_code; ?>"><strong>ชื่อสินค้า</strong>&nbsp;&nbsp;<? echo $row->pro_name; ?><br />
        <?php if($row->pro_dis_list!="0.00"){ ?>
&nbsp;<strong>ราคา</strong>&nbsp;&nbsp;:<span class="style22"><? echo $row->pro_sell; ?>฿</span><br />
<? } ?>
&nbsp;&nbsp;<strong>ราคา</strong> : <span class="style23"><? echo $row->pro_sell - ($row->pro_price*$row->pro_dis_list/100); ?>฿</span></a></p>    </td>
  </tr>
</table>
<br>
<? 
	$num++;
	} ?>
<span class="style10">
<p>&nbsp;</p>
</span>