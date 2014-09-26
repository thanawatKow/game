<?php echo $msg; ?>
<?=form_open('/myaccount/SaveChangePassword');  
  $row = (isset($qry)) ? $qry->row() : null;  ?>
<p><a href="<?php echo base_url(); ?>index.php/main">หน้าหลัก</a> ::  <a href="<?php echo base_url() ?>index.php/myaccount/MyAccount">บัญชีของฉัน</a> ::    เปลี่ยนรหัสผ่าน </p>
<table width="527" height="140" border="0" cellpadding="0" cellspacing="0" background="<?php echo base_url() ?>image/userresentpass1.jpg">
  <tr>
    <td height="25" colspan="2" valign="bottom"><legend>&nbsp;&nbsp;รหัสผ่านของฉัน</legend></td>
  </tr>
  <tr>
    <td width="153" height="27">&nbsp;&nbsp;รหัสผ่านเดิม: </td>
    <td width="374"><label>
      <input name="CurrentPass" type="password" id="CurrentPass" value="<?php echo set_value('CurrentPass'); ?>" />
      <?=form_error('CurrentPass'); ?>
      <input name="CurrentPass2" type="hidden" id="CurrentPass2" value="<?=getval('cust_password',$row); ?>" />
    </label></td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;รหัสผ่านใหม่ : </td>
    <td><label>
      <input name="NewPass" type="password" id="NewPass" value="<?php echo set_value('NewPass'); ?>" />
      <?=form_error('NewPass'); ?>
    </label></td>
  </tr>
  <tr>
    <td height="22">&nbsp;&nbsp;ยืนยันรหัสผ่านใหม่ : </td>
    <td><label>
      <input name="ConfirmPass" type="password" id="ConfirmPass" value="<?php echo set_value('ConfirmPass'); ?>" />
      <?=form_error('ConfirmPass'); ?>
    </label></td>
  </tr>
  <tr>
    <td height="31" valign="top"><a href="<?php echo base_url() ?>index.php/myaccount/MyAccount">&nbsp;&nbsp;<img src="<?php echo base_url() ?>image/button_back.gif" width="59" height="20" border="0" /></a></td>
    <td align="right" valign="top"><label>
    <div align="center">
  <input type="image" src="<?php echo base_url() ?>image/button_update.gif" border="0" name="submit" alt="update"/>
  &nbsp;&nbsp; </div>
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