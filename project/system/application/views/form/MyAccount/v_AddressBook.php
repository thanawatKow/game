<p><a href="<?php echo base_url(); ?>index.php/main">หน้าหลัก</a> ::  <a href="<?php echo base_url() ?>index.php/myaccount/MyAccount">บัญชีของฉัน</a> ::    สมุดที่อยู่ <br />
  สมุดที่อยู่ส่วนตัวของฉัน
  <?php
 	$row =$qry->row(); 
	?>
</p>
<table width="698" border="0">
  <tr>
    <td width="278" height="110" valign="top">ที่อยู่หลัก<br />
      คุณ&nbsp;<?php echo $row->cust_pay_name."&nbsp;&nbsp;".$row->cust_pay_lname; ?><br />
      บ้านเลขที่&nbsp;<?php echo $row->cust_pay_address."&nbsp;ตำบล&nbsp;".$row->cust_pay_district; ?><br />
      อำเภอ&nbsp;<?php echo $row->cust_pay_canton."&nbsp;จังหวัด&nbsp;".$row->cust_prv_list; ?><br />
    <?php echo $row->cust_pay_postcode; ?></td>
    <td width="410" valign="top">ที่อยู่ที่ถูกเลือกเอาไว้ข้างต้นจะใช้เพื่อจัดส่งสินค้าและเรียกเก็บค่าสินค้า   ในกรณีที่มีการสั่งซื้อสินค้าในร้านนี้<br />
      <br />
นอกจากนี้   ที่อยู่ดังกล่าวจะใช้เพื่อเป็นฐานในการคำนวณภาษีสินค้าและภาษีบริการอีกด้วย</td>
  </tr>
</table>
<br />
<br />
  <table width="701" border="1">
    <tr>
      <td colspan="2" ><legend>การบรรจุสมุดที่อยู่</legend></td>
    </tr>
	<tr>
		<td colspan="2" align="right">&nbsp;</td>
	</tr>
		<?php
	  foreach ($qry1->result() as $row1) 
  { 
   if($row1->cust_addr_pay_id==$row->cust_addr_pay_id)
   {
  	$address="(ที่อยู่หลัก)";
   }
   else
   {
  	$address="";
   }
	?>
    <tr>
      <td colspan="2">คุณ&nbsp;<?php echo $row1->cust_pay_name."&nbsp;&nbsp;".$row1->cust_pay_lname."&nbsp;".$address; ?><br />
บ้านเลขที่&nbsp;<?php echo $row1->cust_pay_address."&nbsp;ตำบล&nbsp;".$row1->cust_pay_district; ?><br />
อำเภอ&nbsp;<?php echo $row1->cust_pay_canton."&nbsp;จังหวัด&nbsp;".$row1->cust_prv_list; ?><br />
<?php echo $row1->cust_pay_postcode; ?></td>
    </tr>
    <tr>
      <td width="343" align="right"><div align="left"><a href="<?php echo base_url() ?>index.php/myaccount/MyAccount"><img src="<?php echo base_url() ?>image/button_back.gif" width="52" height="18" border="0" /></a><a href="<?php echo base_url() ?>index.php/myaccount/MyAccount"></a></div></td>
      <td width="342" align="right"><a href="<?php echo base_url() ?>index.php/myaccount/editAddress/<?php echo $row1->cust_addr_pay_id; ?>"><img src="<?php echo base_url() ?>image/small_edit.gif" width="40" height="16" border="0" /></a>&nbsp;
        <?php   if($row1->cust_addr_pay_id!=$row->cust_addr_pay_id) { ?>
        <a href="<?php echo base_url() ?>index.php/myaccount/deleteAddress/<?php echo $row1->cust_addr_pay_id; ?>" onclick="return confirm('คุณต้องการลบที่อยู่ของคุณ<?php echo "&nbsp;".$row->cust_pay_name."&nbsp;"; ?>?')"> <img src="<?php echo base_url() ?>image/button_delete_small.gif" width="40" height="16" /> </a>
        <?php } ?></td>
    </tr>
	<?php } ?>
</table>
  <p>&nbsp;    </p>
</p>