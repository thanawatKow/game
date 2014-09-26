<?php $row2=$qry2->row();  ?>
<style type="text/css">
<!--
.style1 {color: #FFFFFF}
-->
</style>

<p><A href="<?php echo base_url() ?>index.php/main">หน้าหลัก</A> ::  <A href="<?php echo base_url() ?>index.php/myaccount/MyAccount">บัญชีของฉัน</A> ::  <A href="<?php echo base_url() ?>">ประวัติ</A> ::    ใบสั่งซื้อ #&nbsp;<?php echo $row2->orders_id; ?></p>

<table width="533" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="3" align="right">วันที่ซื้อ<?php echo $row2->orders_date; ?></td>
  </tr>
  <tr>
    <td colspan="3" align="center">รายละเอียดคำสั่งซื้อ-คำสั่งซื้อ # <?php echo $row2->orders_id; ?></td>
  </tr>
  <tr>
    <td width="89" bgcolor="#CCCCCC"><div align="center">จำนวนสินค้า</div></td>
    <td width="323" bgcolor="#CCCCCC"><div align="center">สินค้า</div></td>
    <td width="99" bgcolor="#CCCCCC"><div align="center">รวม</div></td>
  </tr>
 <?php 	foreach ($qry->result() as $row) { ?>
  <tr>
    <td><?php echo $row->orders_pro_qty; ?></td>
    <td><?php echo $row->pro_name; ?></td>
    <td><?php echo $row->orders_pro_toSell; ?></td>
  </tr>
  <?php } ?>
</table>
<br />
<hr  width="533" align="left"/>
<br />
<table width="533" border="0" cellpadding="0" cellspacing="0">
 <?php 	foreach ($qry1->result() as $row1) { ?>
  <tr>
    <td width="419" align="right"><?php echo $row1->orders_total_title; ?></td>
    <td width="98" align="right"><?php echo $row1->orders_total_value; ?></td>
  </tr>
 <?php } ?>
</table>
<table width="534" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td height="22" colspan="3"><H2 align="center" id="orderHistoryStatus">ประวัติสถานะ &amp; ความคิดเห็น </H2></td>
  </tr>
  <tr>
    <td width="89" bgcolor="#CCCCCC">วันที่</td>
    <td width="191" bgcolor="#CCCCCC">สถานะการสั่งซื้อ</td>
    <td width="232" bgcolor="#CCCCCC">คำวิจารณ์การสั่งซื้อ</td>
  </tr>
  <tr>
    <td><?php echo $row2->orders_sta_id; ?></td>
    <td><?php echo $row2->orders_sta_list; ?></td>
    <td><?php echo $row2->orders_history_comments; ?></td>
  </tr>
</table>
<br />
<hr  align="left" width="533"/>
<br />
<table width="535" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="258"><strong>สถานที่จัดส่ง</strong></td>
    <td width="261"><strong>สถานที่เรียกเก็บเงิน</strong></td>
  </tr>
  <tr>
    <td>คุณ&nbsp;<?php echo $row2->cust_shipp_name."&nbsp;&nbsp;".$row2->cust_shipp_lname; ?><br />
บ้านเลขที่&nbsp;<?php echo $row2->cust_shipp_address."&nbsp;ตำบล&nbsp;".$row2->cust_shipp_district; ?><br />
อำเภอ&nbsp;<?php echo $row2->cust_shipp_canton."&nbsp;จังหวัด&nbsp;".$row2->cust_shipp_postcode; ?><br />
<?php echo $row2->cust_shipp_postcode; ?></td>
    <td>คุณ&nbsp;<?php echo $row2->cust_pay_name."&nbsp;&nbsp;".$row2->cust_pay_lname; ?><br />
บ้านเลขที่&nbsp;<?php echo $row2->cust_pay_address."&nbsp;ตำบล&nbsp;".$row2->cust_pay_district; ?><br />
อำเภอ&nbsp;<?php echo $row2->cust_pay_canton."&nbsp;จังหวัด&nbsp;".$row2->cust_pay_province; ?><br />
<?php echo $row2->cust_pay_postcode; ?></td>
  </tr>
</table>
<?php 
$pay="";
$payid="";

if($row2->payment_method=="bank"){
					$pay="ธนาคาร";
					$payid="bank";
			  }
			  else if($row2->payment_method=="Check/Money Order")
			  {
			  		$pay="ชำระเงินภายหลัง";
			  		$payid="Check/Money Order";
			  }
			  else
			  {
			  		$pay="paysbuy";
			  		$payid="paysbuy";
			  }
			 ?>
<table width="535" border="0" align="left" cellpadding="0" cellspacing="0">
  <tr>
    <td width="264"><strong>ค่าจัดส่ง</strong></td>
    <td width="271"><strong>วิธีการชำระเงิน</strong></td>
  </tr>
  <tr>
    <td><?php echo $row2->orders_shipp_value; ?></td>
    <td><?php echo $pay; ?></td>
  </tr>
</table>
<p>
<p><span class="style1"><?php echo $row2->orders_sta_id; ?>
<?php 
if($row2->orders_sta_id=="2" || $row2->orders_sta_id=="1") { 

?>
  <?=form_open_multipart('/myaccount/updatePay/'.$row2->orders_id); ?>
</p>
<table width="533" border="0" cellpadding="0" cellspacing="0">
	
  <tr>
  	<td width="262">&nbsp;</td>
    <td width="271"><strong>เปลี่ยนวิธีการชำระเงิน</strong></td>
  </tr>
  <tr>
  	<td>&nbsp;</td>
    <td height="28" valign="top">
        
        <select name="pay" id="pay">
          <option value="<?php echo $payid; ?>">&lt;?php echo $pay; ?&gt;</option>
          <option value="bank">ธนาคาร</option>
          <option value="Check/Money Order">ชำระเงินภายหลัง</option>
          <option value="paysbuy">เพย์สบาย</option>
        </select>
    </td>
  </tr>
  <tr>
  	<td>&nbsp;</td>
    <td><label>
    <input type="submit" name="Submit" value="update" />
    </label></td>
  </tr>
</table>
<?php } ?>
<?=form_close();?>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>


