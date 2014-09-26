<table width="980" height="158" border="0" align="left" cellpadding="0" cellspacing="0" background="<?php echo base_url() ?>image/header.jpg">
  <tr>
    <td height="135" valign="bottom">
	<?php $login = $this->session->userdata('login'); 
	if(!empty($login))
	{?>
	<span class="style4"><a href="<?php echo base_url() ?>index.php/myaccount/MyAccount">บัญชีของฉัน</a>
	<?php 
	}
	else 
	{
	 ?>
	 <span class="style11">
	 <?php } ?>
	<a href="<? echo base_url() ?>index.php/main"><img src="<?php echo base_url() ?>image/home.gif" alt="Home" width="30" height="28" border="0" /></a>
<?php 	$login = $this->session->userdata('login');
		if(empty($login))
		{
?>
	<a href="<? echo base_url() ?>index.php/main/login"><img src="<?php echo base_url() ?>image/button_login.gif" alt="Log In" width="40" height="28" border="0" />&nbsp;</a>
<?php }else { ?>
<a href="<? echo base_url() ?>index.php/main/logOut"><img src="<?php echo base_url() ?>image/button_logoff.gif" alt="Log Out" width="40" height="28" border="0" />&nbsp;</a>
<?php } ?>
	</span></td>
  </tr>
  <tr>
    <td valign="top"> </td>
  </tr>
</table>
