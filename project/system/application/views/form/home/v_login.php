<style type="text/css">
<!--
.style1 {color: #FF0000}
-->
</style>
<p><br />
  ยินต้อนรับ, กรุณาเข้าสู่ระบบ</p>
<?=form_open('/customer/checkLogCust');?>
<?php 
$subscribe_msg = $this->session->userdata('subscribe_msg');
$username = $this->session->userdata('username');
if($subscribe_msg!=""){
	echo "<script>alert('".$subscribe_msg."')</script>";
	$this->session->set_userdata('subscribe_msg', "");
}
if($username!=""){
	echo "<script>alert('".$username."')</script>";
	$this->session->set_userdata('username', "");
}
?>
<table width="700" height="140" border="0">
<?php
$login = $this->session->userdata('login');
		if(!empty($login))
		{
?>
<tr><td align="center" valign="middle">Welcome to&nbsp;<?php echo $login; ?><br /><a href="<? echo base_url() ?>index.php/main/logOut">LogOut</a></td>
</tr>
<?php }else{  ?>
  <tr>
    <td colspan="3"> &nbsp;&nbsp;Returning Customers : Please Log In </td>
  </tr>
  <tr>
    <td width="81">&nbsp;</td>
    <td width="195" align="left"><label>Username: </label></td>
    <td width="410"><input name="cust_login1" type="text" id="cust_login1" value="<?=set_value('cust_login1'); ?>" />
    <?php  echo form_error('cust_login1');  ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="left"><label>Password: </label></td>
    <td><input name="cust_password1" type="password" id="cust_password1" />
    <?php  echo form_error('cust_password1');  ?></td>
  </tr>
  <tr>
    <td><A href="http://localhost/zencart/index.php?main_page=password_forgotten"></A></td>
    <td align="left"><label>
    <a href="<?php echo base_url() ?>index.php/main/resentPass">ลืมรหัสผ่าน?</a></label></td>
    <td align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="image" src="<?php echo base_url() ?>image/button_login.gif" border="0" name="submit" alt="login"/></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right">&nbsp;</td>
    <td align="right">&nbsp;</td>
  </tr>
    <?php } ?>
</table>
<?=form_close();?>
 <?
 if(empty($login))
		{
if ($this->session->flashdata('subscribe_msg')){
	echo "<div class='message'><h2>";
	echo $this->session->flashdata('subscribe_msg');
	echo "</h2></div>";
}
	?>
 <?=form_open('/customer/doaddCust');
  $row = (isset($qry)) ? $qry->row() : null;?>
 <?php form_fieldset('Subscribe To Our Newsletter'); ?><br />
 <table width="700" height="773" border="0">
   <tr>
      <td height="29" colspan="3">&nbsp;สมัครสมาชิก</td>
   </tr>
    
    <tr>
      <td width="3">&nbsp;</td>
      <td width="102">&nbsp;</td>
      <td><?=(is_null($row)) ? '' : '' ; ?>
        <input name="cust_id" type="hidden" id="cust_id" value="<?=getval('cust_id',$row); ?>" />
        <label></label>
      <?=form_error('CustomerID'); ?></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td valign="top"><span class="style2">usename</span></td>
      <td width="481" ><input type="text" id = "cust_login" name="cust_login" size = "35" maxlength ="30" class="" value="<?=getval('cust_login',$row); ?>" />
          <?=form_error('cust_login'); ?></td>
   </tr>
    <tr>
      <td>&nbsp;</td>
      <td valign="top"><span class="style2">Password</span></td>
      <td background="<?php echo base_url() ?>image/login222.jpg"><input type="password" id = "cust_password" name="cust_password" size = "35" maxlength ="30" class="" value="<?=getval('cust_password',$row); ?>" />
          <?=form_error('cust_password'); ?></td>
  </tr>
    <tr>
      <td>&nbsp;</td>
      <td valign="top"><span class="style2">Confirm Password</span></td>
      <td background="<?php echo base_url() ?>image/login222.jpg"><input type="password" id = "cust_password2" name="cust_password2" size = "35" maxlength ="30" class="" value="<?=getval('cust_password2',$row); ?>" />
          <?=form_error('cust_password2'); ?></td>
  </tr>
    <tr>
      <td>&nbsp;</td>
      <td valign="top"><span class="style2">ชื่อ</span></td>
      <td background="<?php echo base_url() ?>image/login222.jpg"><input type="text" id = "cust_name" name="cust_name" size = "35" maxlength ="30" class="" value="<?=getval('cust_name',$row); ?>" />
          <?=form_error('cust_name'); ?></td>
  </tr>
    <tr>
      <td>&nbsp;</td>
      <td valign="top"><span class="style2">นามสกุล</span></td>
      <td background="<?php echo base_url() ?>image/login222.jpg"><input type="text" id = "cust_lname" name="cust_lname" size = "35" maxlength ="30" class="" value="<?=getval('cust_lname',$row); ?>" />
          <?=form_error('cust_lname'); ?></td>
  </tr>
    <tr>
      <td>&nbsp;</td>
      <td valign="top"><span class="style2">เพศ</span></td>
      <td background="<?php echo base_url() ?>image/login222.jpg"><?=form_radio('cust_sex','M',( getval('cust_sex',$row) != 'M' ) ? true : false ) ?>
        ชาย
        <?=form_radio('cust_sex','F',( getval('cust_sex',$row) == 'F' ) ? true : false ) ?>
        หญิง
  <?=form_error('cust_sex'); ?></td>
  </tr>
    <tr>
      <td>&nbsp;</td>
      <td valign="top"><span class="style2">บ้านเลขที่</span></td>
      <td background="<?php echo base_url() ?>image/login222.jpg"><input type="text" id = "cust_address" name="cust_address" size = "35" maxlength ="30" class="" value="<?=getval('cust_address',$row); ?>" />
          <?php echo form_error('cust_address'); ?></td>
  </tr>
    <tr>
      <td>&nbsp;</td>
      <td valign="top"><span class="style2">ตำบล</span></td>
      <td background="<?php echo base_url() ?>image/login222.jpg"><input type="text" id = "cust_district" name="cust_district" size = "35" maxlength ="30" class="" value="<?=getval('cust_district',$row); ?>" />
          <?=form_error('cust_district'); ?></td>
  </tr>
    <tr>
      <td>&nbsp;</td>
      <td valign="top"><span class="style2">อำเภอ</span></td>
      <td background="<?php echo base_url() ?>image/login222.jpg"><input type="text" id = "cust_canton" name="cust_canton" size = "35" maxlength ="30" class="" value="<?=getval('cust_canton',$row); ?>" />
          <?=form_error('cust_canton'); ?></td>
  </tr>
    <tr>
      <td>&nbsp;</td>
      <td valign="top"><span class="style2">จังหวัด</span></td>
      <td background="<?php echo base_url() ?>image/login222.jpg"><?=form_dropdown('cust_prv_id',$cust_prv,getval('cust_prv_id',$row))?>
          <?=form_error('cust_prv_id'); ?>      </td>
  </tr>
    <tr>
      <td>&nbsp;</td>
      <td valign="top"><span class="style2">รหัสไปรษณีย์</span></td>
      <td background="<?php echo base_url() ?>image/login222.jpg"><input type="text" id = "cust_postcode" name="cust_postcode" size = "35" maxlength ="30" class="" value="<?=getval('cust_postcode',$row); ?>" />
          <?=form_error('cust_postcode'); ?></td>
  </tr>
    <tr>
      <td>&nbsp;</td>
      <td valign="top"><span class="style2">Email</span></td>
      <td background="<?php echo base_url() ?>image/login222.jpg"><input type="text" id = "cust_email" name="cust_email" size = "35" maxlength ="30" class="" value="<?=getval('cust_email',$row); ?>" />
          <?=form_error('cust_email'); ?></td>
  </tr>
    <tr>
      <td>&nbsp;</td>
      <td valign="top"><span class="style2">โทรศัพท์บ้าน (038123456)</span></td>
      <td background="<?php echo base_url() ?>image/login222.jpg"><input type="text" id = "cust_tel" name="cust_tel" size = "35" maxlength ="30" class="" value="<?=getval('cust_tel',$row); ?>" />
          <?=form_error('cust_tel'); ?> </td>
  </tr>
    <tr>
      <td>&nbsp;</td>
      <td valign="top"><span class="style2">โทรศัพท์มือถือ (0871485064)</span></td>
      <td background="<?php echo base_url() ?>image/login222.jpg"><input type="text"  id = "cust_phone" name="cust_phone" size = "35" maxlength ="30" class="" value="<?=getval('cust_phone',$row); ?>" />
          <?=form_error('cust_phone'); ?></td>
  </tr>
    
    <tr>
      <td>&nbsp;</td>
      <td valign="top"><span class="style2">รายได้</span></td>
      <td background="<?php echo base_url() ?>image/login222.jpg"><?=form_dropdown('cust_inc_id', $cust_inc, getval('cust_inc_id',$row))?>
          <?=form_error('cust_inc_id'); ?>      </td>
  </tr>
    <tr>
      <td>&nbsp;</td>
      <td valign="top"><span class="style2">อาชีพ</span></td>
      <td background="<?php echo base_url() ?>image/login222.jpg"><?=form_dropdown('cust_job_id',$cust_job,getval('cust_job_id',$row))?>
          <?=form_error('cust_job_id'); ?>      </td>
  </tr>
    <tr>
      <td>&nbsp;</td>
      <td valign="top"><span class="style2">การศึกษา</span></span></td>
      <td background="<?php echo base_url() ?>image/login222.jpg"><?=form_dropdown('cust_edu_id',$cust_edu,getval('cust_edu_id',$row))?>
          <?=form_error('cust_edu_id'); ?>      </td>
  </tr>
    <tr>
      <td>&nbsp;</td>
      <td valign="top"><span class="style2">สถานภาพ</span></span></td>
      <td background="<?php echo base_url() ?>image/login222.jpg"><?=form_dropdown('cust_sta_mar_id',$cust_sta_mar,getval('cust_sta_mar_id',$row))?>
          <?=form_error('cust_sta_mar_id'); ?>      </td>
  </tr>
    <tr>
      <td>&nbsp;</td>
      <td valign="top"><span class="style2">คำถาม</span></td>
      <td background="<?php echo base_url() ?>image/login222.jpg"><?=form_dropdown('cust_quest_id',$cust_quest,getval('cust_quest_id',$row))?>
          <?=form_error('cust_quest_id'); ?>      </td>
  </tr>
    <tr>
      <td>&nbsp;</td>
      <td valign="top"><span class="style2">คำตอบ</span></span></td>
      <td background="<?php echo base_url() ?>image/login222.jpg"><input type="text" id = "cust_answer" name="cust_answer" size = "30" maxlength ="30" class="" value="<?=getval('cust_answer',$row); ?>" />
          <?php echo form_error('cust_answer'); ?></td>
  </tr>
    <tr>
      <td>&nbsp;</td>
      <td align="right"></td>
      <td background="<?php echo base_url() ?>image/login222.jpg"><label></label>        &nbsp;
      <?php  echo "$cap_img"; ?>
      <input name="submit2" type="image" id="submit2" src="<?php echo base_url() ?>image/refresh.gif" alt="refresh" border="0"/></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td align="right">&nbsp;</td>
      <td background="<?php echo base_url() ?>image/login222.jpg"><input name="captcha" type="text" value="" size="30" />
      <?php //echo form_error('cust_answer'); ?></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
       <td colspan="2" align="right"><div align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	   <span class="style1"><?php echo $error; ?></span></div></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td align="right">&nbsp;</td>
      <td align="center" background="<?php echo base_url() ?>image/login222.jpg">
        <input type="image" src="<?php echo base_url() ?>image/button_submit.gif" border="0" name="submit" alt="submit"/>&nbsp;&nbsp;&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
</table>
  <?=form_close();?>
  <?php } ?>
  <?
function getval($varname,$rw,$v=''){
	if(set_value($varname) <> '')
		$v = set_value($varname);
	elseif(!is_null($rw))
		$v = @$rw->$varname;
	return $v;
}
?>
</p>
