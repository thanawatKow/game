<a href="<?php echo base_url() ?>index.php/main">หน้าหลัก</a> || ลืมรหัสผ่าน <br />
<p>
  <?=form_open('/sendEmail_admin/resentPass/');
  $row = (isset($qry)) ? $qry->row() : null;
  	if($error!=""){
  		echo "<script>alert('".$error."')</script>";
	}
  ?>
</p>
<table width="570" height="110" border="0" align="center" background="<?php echo base_url() ?>image/userresentpass.jpg">
  <tr>
    <td height="37" colspan="5" align="left" valign="bottom">&nbsp;&nbsp;&nbsp;Resent Password </td>
  </tr>
  <tr>
      <td>&nbsp;</td>
      <td valign="top"><span class="style2">คำถาม</span></td>
      <td background="<?php echo base_url() ?>image/login222.jpg"><?=form_dropdown('cust_quest_id',$cust_quest,getval('cust_quest_id',$row))?></td>
	<td colspan="2"><?=form_error('cust_quest_id'); ?></td>
  </tr>
    <tr>
      <td>&nbsp;</td>
      <td valign="top"><span class="style2">คำตอบ</span></span></td>
      <td background="<?php echo base_url() ?>image/login222.jpg"><input type="text" id = "cust_answer" name="cust_answer" size = "30" maxlength ="30" class="" value="<?=getval('cust_answer',$row); ?>" /></td>
	<td colspan="2"><?php echo form_error('cust_answer'); ?></td>
  </tr>
  <tr>
    <td width="4" height="40">&nbsp;</td>
    <td width="77"><label>Email</label></td>
    <td width="184"><label>
      <input name="cust_email" type="text" id="email" value="<?=getval('cust_email',$row); ?>" />
    </label></td>
    <td colspan="2"><?php echo form_error('cust_email'); ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td width="79"><input type="submit" name="Submit" value="send" /></td>
    <td width="204"><input type="reset" name="Submit2" value="cancel" /></td>
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