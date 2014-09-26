<?=form_open('/myaccount/SaveditAddress'); 
  $row = (isset($qry)) ? $qry->row() : null;  ?>
<p><a href="<?php echo base_url(); ?>index.php/main">หน้าหลัก</a> ::  <a href="<?php echo base_url() ?>index.php/myaccount/MyAccount">บัญชีของฉัน</a>  ::    <a href="<?php echo base_url() ?>index.php/myaccount/addressBook">สมุดที่อยู่</a> :: แก้ไขที่อยู่</p>
<p>แก้ไขที่อยู่ </p>
<table width="650" height="270" border="0" background="<?php echo base_url() ?>image/login3333.jpg">
  <tr>
    <td height="20" colspan="4">&nbsp;&nbsp;รายละเอียดที่อยู่</td>
  </tr>
  <tr>
    <td height="24">&nbsp;</td>
    <td><span class="style2">ชื่อ</span></td>
    <td colspan="2"><input name="cust_pay_name" type="text" class="" id = "cust_name" value="<?=getval('cust_pay_name',$row); ?>" size = "35" maxlength ="30" />
        <?=form_error('cust_pay_name'); ?>
        <input name="cust_addr_pay_id" type="hidden" id="cust_addr_pay_id" value="<?=getval('cust_addr_pay_id',$row); ?>" /></td>
  </tr>
  <tr>
    <td height="24">&nbsp;</td>
    <td><span class="style2">นามสกุล</span></td>
    <td colspan="2" ><input name="cust_pay_lname" type="text" class="" id = "cust_lname" value="<?=getval('cust_pay_lname',$row); ?>" size = "35" maxlength ="30" />
        <?=form_error('cust_pay_lname'); ?></td>
  </tr>
  <tr>
    <td height="24">&nbsp;</td>
    <td><span class="style2">บ้านเลขที่</span></td>
    <td colspan="2"><input name="cust_pay_address" type="text" class="" id = "cust_address" value="<?=getval('cust_pay_address',$row); ?>" size = "35" maxlength ="30" />
        <?php echo form_error('cust_pay_address'); ?></td>
  </tr>
  <tr>
    <td height="24">&nbsp;</td>
    <td><span class="style2">ตำบล</span></td>
    <td colspan="2" ><input name="cust_pay_district" type="text" class="" id = "cust_district" value="<?=getval('cust_pay_district',$row); ?>" size = "35" maxlength ="30" />
        <?=form_error('cust_pay_district'); ?></td>
  </tr>
  <tr>
    <td height="24">&nbsp;</td>
    <td><span class="style2">อำเภอ</span></td>
    <td colspan="2"><input name="cust_pay_canton" type="text" class="" id = "cust_canton" value="<?=getval('cust_pay_canton',$row); ?>" size = "35" maxlength ="30" />
        <?=form_error('cust_pay_canton'); ?></td>
  </tr>
  <tr>
    <td height="20">&nbsp;</td>
    <td><span class="style2">จังหวัด</span></td>
    <td colspan="2"><?=form_dropdown('cust_prv_id',$cust_prv,getval('cust_prv_id',$row))?>
      <?=form_error('cust_prv_id'); ?></td>
  </tr>
  <tr>
    <td height="24">&nbsp;</td>
    <td><span class="style2">รหัสไปรษณีย์</span></td>
    <td colspan="2"><input name="cust_pay_postcode" type="text" class="" id = "cust_postcode" value="<?=getval('cust_pay_postcode',$row); ?>" size = "35" maxlength ="30" />
        <?=form_error('cust_pay_postcode'); ?></td>
  </tr>
  <tr>
    <td height="41">&nbsp;</td>
    <td><a href="<?php echo base_url() ?>index.php/myaccount/addressBook"><img src="<?php echo base_url() ?>image/button_back.gif" width="59" height="20" border="0" /></a></td>
    <td width="204" align="right" >&nbsp;</td>
    <td width="323" align="right" ><div align="left">
      <input type="image" src="<?php echo base_url() ?>image/button_update.gif" border="0" name="submit" alt="update"/>
</div></td>
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