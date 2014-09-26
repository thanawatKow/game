<script type="text/JavaScript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>


<p><a href="<?php echo base_url() ?>index.php/main">หน้าหลัก</a> ::  บัญชีของฉัน </p>
<table width="801" border="0" cellpadding="0" cellspacing="0">
  
  <tr>
    <td colspan="9"><h2 align="center">คำสั่งซื้อก่อนหน้า</h2></td>
  </tr>
  <tr>
    <td width="116" height="25" bgcolor="#CCCCCC"><div align="center"><strong>วันที่</strong></div></td>
    <td width="104" bgcolor="#CCCCCC"><div align="center"><strong>เลขที่ใบสั่งซื้อ</strong></div></td>
    <td width="88" bgcolor="#CCCCCC"><div align="center"><strong>ส่งถึง</strong></div></td>
    <td width="70" bgcolor="#CCCCCC"><div align="center"><strong>รวม</strong></div></td>
    <td width="79" bgcolor="#CCCCCC"><div align="center"><strong>มุมมอง</strong></div></td>
    <td width="114" bgcolor="#CCCCCC"><div align="center"><strong>ใบกำกับสินค้า</strong></div></td>
    <td width="65" bgcolor="#CCCCCC"><div align="center"><strong>สถานะ</strong></div></td>
    <td width="84" bgcolor="#CCCCCC"><div align="center"><strong>แจ้งชำระ</strong></div></td>
    <td width="86" bgcolor="#CCCCCC"><div align="center"></div></td>
  </tr>
  <?php foreach ($qry->result() as $row) { ?>
  <tr>
    <td><div align="center"><?php echo $row->orders_date; ?></div></td>
    <td><div align="center"><?php echo $row->orders_id; ?></div></td>
    <td><div align="center"><?php echo $row->cust_pay_name."&nbsp;".$row->cust_pay_lname; ?></div></td>
    <td><div align="center"><?php echo $row->orders_total_value; ?></div></td>
    <td><div align="center"><a href="<?php echo base_url() ?>index.php/myaccount/ViewOrders/<?php echo $row->orders_id; ?>"><img src="<?php echo base_url() ?>image/button_view.gif" width="39" height="15" border="0" /></a></div></td>
    <td><div align="center"><img src="<?php echo base_url() ?>image/botton_invoice.jpg" width="51" height="15" onclick="MM_openBrWindow('<?php echo base_url() ?>index.php/myaccount/invoice/<?php echo $row->orders_id; ?>','invoiceuser','menubar=yes,width=1020,height=700')" /></div></td>
    <td><div align="center"><?php echo $row->orders_sta_list; ?></div></td>
    <td><div align="center">
      <?php if($row->orders_sta_id=="2" || $row->orders_sta_id=="1" || $row->orders_sta_id=="6") { ?>
      <a href="<?php echo base_url() ?>index.php/payment/confimPayment/<?php echo $row->orders_id; ?>"><img src="<?php echo base_url() ?>image/payment5.JPG" width="75" height="27" border="0" /></a> 
      <?php }
	else 
	{
	echo "แจ้งชำระเงินแล้ว";
	}
	 ?>    
    </div></td>
    <td><div align="center">
      <?php if($row->orders_sta_id=="2" || $row->orders_sta_id=="1" || $row->orders_sta_id=="6") { ?>
    <a href="<?php echo base_url() ?>index.php/myaccount/updateStaCancel/<?php echo $row->orders_id; ?>" onclick="return confirm('คุณต้องการยกเลิกใบสั่งซื้อ<?php echo "&nbsp;".$row->orders_id."&nbsp;"; ?>?')"> <img src="<?php echo base_url() ?>image/button_delete_small.gif" width="40" height="16" border="0" /> </a></div></td>
    <?php  }?>
  </tr>
  <?php } ?>
</table>
<H2>บัญชีของฉัน</H2>
<UL id="myAccountGen">
  <LI><A href="<?php echo base_url() ?>index.php/myaccount/ChangeCust">ดูหรือเปลี่ยนข้อมูลบัญชีของฉัน</A></LI>
  <LI><A href="<?php echo base_url() ?>index.php/myaccount/addressBook">ดูหรือเปลี่ยนข้อมูลในสมุดที่อยู่ของฉัน</A></LI>
  <LI><A href="<?php echo base_url() ?>index.php/myaccount/ChangePassword">เปลี่ยนรหัสผ่านของฉัน</A></LI>
</UL>
<H2>&nbsp;</H2>
<p>&nbsp;</p>
<p>&nbsp;</p>
