<style type="text/css">
<!--
.style1 {color: #c02f22}
-->
</style>
<span class="style10">
<p>&nbsp;&nbsp;<img src="<?php echo base_url() ?>image/coquette_part2_013.png" width="26" height="27" />&nbsp;<u>สินค้า</u></p>
</span>
<span class="style10"></span>
<table width="200" border="0">
<?php
  foreach ($query->result() as $row) 
  {
  ?>
  <tr>
    <td width="43" align="center" valign="middle"><img src="<?php echo base_url() ?>image/bou.gif" width="13" height="11" /></td>
    <td width="147"><a href="<?php echo base_url() ?>index.php/product/showProType/<?php echo $row->pro_type_id; ?>"><?php  echo $row->pro_type_list; ?></a></td>
  </tr>
  <?php } ?>
</table>
  </p>
  <p>&nbsp;</p>
