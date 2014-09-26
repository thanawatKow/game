<?=form_open('/myaccount/SaveChangeCust'); 
  $row = (isset($qry)) ? $qry->row() : null;  ?>
<p><a href="<?php echo base_url(); ?>index.php/main">หน้าหลัก</a> ::  <a href="<?php echo base_url() ?>index.php/myaccount/MyAccount">บัญชีของฉัน</a> ::    แก้ไขบัญชี </p>
<table width="393" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="2"><legend>ข้อมูลบัญชีของฉัน</legend></td>
  </tr>
  <tr>
    <td width="119">ชื่อ</td>
    <td width="258"><label>
      <input name="cust_name" type="text" id="cust_name" value="<?=getval('cust_name',$row); ?>">
      <?=form_error('cust_name'); ?>
      <input name="cust_id" type="hidden" id="cust_id" value="<?=getval('cust_id',$row); ?>">
    </label></td>
  </tr>
  <tr>
    <td>นามสกุล</td>
    <td><label>
      <input name="cust_lname" type="text" id="cust_lname" value="<?=getval('cust_lname',$row); ?>">
      <?=form_error('cust_lname'); ?>
    </label></td>
  </tr>
  <tr>
    <td>อีเมล์</td>
    <td><label>
      <input name="cust_email" type="text" id="cust_email" value="<?=getval('cust_email',$row); ?>">
      <?=form_error('cust_email'); ?>
    </label></td>
  </tr>
  <tr>
    <td>เบอร์โทรศัพท์บ้าน</td>
    <td><label>
      <input name="cust_tel" type="text" id="cust_tel" value="<?=getval('cust_tel',$row); ?>">
      <?=form_error('cust_tel'); ?>
    </label></td>
  </tr>
  <tr>
    <td>เบอร์โทรศัพท์มือถือ</td>
    <td><label>
      <input name="cust_phone" type="text" id="cust_phone" value="<?=getval('cust_phone',$row); ?>">
      <?=form_error('cust_phone'); ?>
    </label></td>
  </tr>
</table>
<table width="399" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="195"><a href="<?php echo base_url() ?>index.php/myaccount/MyAccount"><img src="<?php echo base_url() ?>image/button_back.gif" width="59" height="20" border="0"></a></td>
    <td width="188" align="right"><label>
    <input type="image" src="<?php echo base_url() ?>image/button_update.gif" border="0" name="submit" alt="update"/>
    </label></td>
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
<p>&nbsp;</p>

