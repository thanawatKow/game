<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>style.css" />
<title>Untitled Document</title>
</head>

<body>
<?php 
$row2=$qry2->row(); 
$row6=$qry6->row(); 
?>
<table width="1000" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="499"><span id="result_box"><span title="" closure_uid_bwunc0="30" kc="Store Name" lc="ชื่อร้าน  "><strong>ชื่อร้าน</strong> &nbsp;&nbsp;&nbsp;PJ.FURNIURE<br />
    </span><span title="" closure_uid_bwunc0="31" kc="Address" lc="ที่อยู่  "><strong>ที่อยู่ </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;64/524 หมู่ 6 ต.เสม็ด อ.เมือง จ. ชลบุรี <br />
    </span><span title="" closure_uid_bwunc0="32" kc="Country" lc="ประเทศ  "><strong>ประเทศ </strong>&nbsp;&nbsp;ไทย<br />
    </span><span title="" closure_uid_bwunc0="33" kc="Phone" lc="โทรศัพท์"><strong>โทรศัพท</strong>์ 085-7777777</span></span></td>
    <td width="501"><div align="right"><img src="<?php echo base_url() ?>image/logo.jpg" width="285" height="110" /></div></td>
  </tr>
</table>
<br />
<hr  width="1000" align="left"/>
<br />
<table width="1000" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="86"><strong>ลูกค้า : </strong></td>
    <td width="196" rowspan="4">คุณ&nbsp;<?php echo $row6->cust_shipp_name."&nbsp;&nbsp;".$row6->cust_shipp_lname; ?><br />
บ้านเลขที่&nbsp;<?php echo $row6->cust_shipp_address."&nbsp;ตำบล&nbsp;".$row6->cust_shipp_district; ?><br />
อำเภอ&nbsp;<?php echo $row6->cust_shipp_canton."&nbsp;จังหวัด&nbsp;".$row6->cust_prv_list; ?><br />
<?php echo $row6->cust_shipp_postcode; ?></td>
    <td width="116"><strong>ที่อยู่การจัดส่ง :</strong><br /></td>
    <td width="215" rowspan="4">คุณ&nbsp;<?php echo $row2->cust_shipp_name."&nbsp;&nbsp;".$row2->cust_shipp_lname; ?><br />
บ้านเลขที่&nbsp;<?php echo $row2->cust_shipp_address."&nbsp;ตำบล&nbsp;".$row2->cust_shipp_district; ?><br />
อำเภอ&nbsp;<?php echo $row2->cust_shipp_canton."&nbsp;จังหวัด&nbsp;".$row2->cust_shipp_postcode; ?><br />
<?php echo $row2->cust_shipp_postcode; ?></td>
    <td width="114"><strong>ที่อยู่เรียกเก็บ :</strong></td>
    <td width="273" rowspan="4">คุณ&nbsp;<?php echo $row2->cust_pay_name."&nbsp;&nbsp;".$row2->cust_pay_lname; ?><br />
บ้านเลขที่&nbsp;<?php echo $row2->cust_pay_address."&nbsp;ตำบล&nbsp;".$row2->cust_pay_district; ?><br />
อำเภอ&nbsp;<?php echo $row2->cust_pay_canton."&nbsp;จังหวัด&nbsp;".$row2->cust_pay_postcode; ?><br />
<?php echo $row2->cust_pay_postcode; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<table width="414" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="208"><strong>โทรศัพท์ : </strong></td>
    <td width="190"><?php echo $row2->cust_tel; ?></td>
  </tr>
  <tr>
    <td><strong>E-mail Address : </strong></td>
    <td><?php echo $row2->cust_email ; ?></td>
  </tr>
</table>
<table width="396" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="172"><strong>รหัสใบสั่งซื้อ : </strong></td>
    <td width="208"><?php echo $row2->orders_id; ?></td>
  </tr>
  <tr>
    <td><strong>วันที่</strong></td>
    <td><?php echo $row2->orders_date; ?></td>
  </tr>
  <tr>
    <td><strong>วิธีการชำระเงิน</strong></td>
    <td><?php echo $row2->payment_method; ?></td>
  </tr>
</table>
<table width="1000" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="2" bgcolor="#d5d5d5"><div align="left"><strong>สินค้า</strong></div></td>
    <td width="191" bgcolor="#d5d5d5"><div align="left"><strong>ราคา</strong></div></td>
    <td width="139" bgcolor="#d5d5d5"><div align="left"><strong>จำนวน</strong></div></td>
    <td width="141" bgcolor="#d5d5d5"><div align="left"><strong>รวม</strong></div></td>
  </tr>
  <?php 	foreach ($qry->result() as $row88 ) { ?>
  <tr>
    <td width="86" bgcolor="#e5e5e5"><?php echo $row88->orders_id; ?></td>
    <td width="435" bgcolor="#e5e5e5"><?php echo $row88->pro_name; ?></td>
    <td bgcolor="#e5e5e5"><?php echo $row88->orders_pro_sell; ?></td>
    <td bgcolor="#e5e5e5"><?php echo $row88->orders_pro_qty; ?></td>
    <td bgcolor="#e5e5e5"><div align="right"><?php echo $row88->orders_pro_toSell; ?></div>    </td>
  </tr>
    <?php } ?>
</table>
<table width="1000" border="0" cellpadding="0" cellspacing="0">
<?php 	foreach ($qry1->result() as $row1) { ?>
  <tr>
    <td width="845" height="23"><div align="right"><?php echo $row1->orders_total_title; ?>&nbsp;&nbsp;</div>    </td>
    <td width="139"><div align="right"><?php echo $row1->orders_total_value; ?></div>    </td>
  </tr>
   <?php } ?>
</table>
<p>&nbsp;</p>
<table width="373" border="1" cellpadding="0" cellspacing="0">
  <tr>
    <td><div align="center"><strong><span id="result_box"><span title="" closure_uid_bwunc0="20" kc="Customer Notified" lc="แจ้งลูกค้า">แจ้งลูกค้า</span></span></strong></div></td>
    <td><div align="center"><strong>สถานะ</strong></div></td>
  </tr>
  <tr>
    <td><div align="center"><img src="<?php echo base_url() ?>image/tick.gif" width="16" height="16" /></div></td>
    <td><div align="center"><?php echo $row2->orders_sta_list; ?></div></td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>
