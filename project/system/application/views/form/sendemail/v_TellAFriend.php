<?php
$row = (isset($qry)) ? $qry->row() : null;
$row2 = (isset($qry1)) ? $qry1->row() : null;
?>
<?=form_open_multipart('/tellfriends/sendEmail/'.$row->pro_code); ?>

<table width="518" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="2"><legend>แนะนำสินค้าต่อ</legend></td>
  </tr>
  <tr>
    <td width="124">ชื่อของคุณ : </td>
    <td width="394"><label>
      <input name="cust_name" type="text" id="cust_name" value="<?=getval('cust_name',$row2); ?>" size="50" />
      <?php  echo form_error('cust_name'); 
	  $dis=$row->pro_sell - ($row->pro_sell*$row->pro_dis_list/100) ?>
      <input name="text" type="hidden" id="text" value="<?php echo "ชื่อสินค้า".$row->pro_name."<br><img src='".base_url()."uploads/".$row->pro_picture."' width='150' ><br><span class='style23'>".$dis."</span>"; ?>฿" />
    </label></td>
  </tr>
  <tr>
    <td>อีเมล์ของคุณ : </td>
    <td><label>
      <input name="cust_email" type="text" id="cust_email" value="<?=getval('cust_email',$row2); ?>" size="50" /><?php  echo form_error('cust_email');  ?>
    </label></td>
  </tr>
  <tr>
    <td>ชื่อผู้รับ : </td>
    <td><label>
      <input name="name" type="text" value="<?php echo set_value('name'); ?>" size="50" />
    </label></td>
  </tr>
  <tr>
    <td>อีเมล์ผู้รับ : </td>
    <td><label>
      <input name="email" type="text" value="<?php echo set_value('email'); ?>" size="50" />
    </label></td>
  </tr>
  <tr>
    <td>ข้อความของคุณ : </td>
    <td><label></label></td>
  </tr>
  <tr>
    <td colspan="2">ชื่อสินค้า&nbsp;<?php echo $row->pro_name; ?><br /><img src="<?php echo base_url() ?>uploads/<?php echo $row->pro_picture; ?>" width='150'  ><br />
      <?php if($row->pro_dis_list!="0.00"){ ?>
&nbsp;<span class="style20"><? echo $row->pro_sell; ?>฿</span><br />
<? } ?>
<br />
&nbsp;<span class="style21"><? echo $row->pro_sell - ($row->pro_sell*$row->pro_dis_list/100); ?>฿</span></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right"><label>
      <div align="center">
        <input type="submit" name="Submit" value="send" />
        <br />
      </div>
    </label></td>
  </tr>
  <tr>
    <td colspan="2"><div class="styte2" id="tellAFriendAdvisory"><strong>คำแนะนำ : </strong>กรุณากรอกข้อมูลให้ถูกต้องเพื่อให้ข้อความถึงผู้รับ</div></td>
  </tr>
</table>

<?=form_close();?>
 <?
function getval($varname,$rw,$v=''){
	if(set_value($varname) <> '')
		$v = set_value($varname);
	elseif(!is_null($rw))
		$v = @$rw->$varname;
	return $v;
}
?>