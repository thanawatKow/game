<?=form_open_multipart('/product/search');  ?>
<span class="style10"> &nbsp;<img src="<?php echo base_url() ?>image/search1.jpg" width="21" height="25" />&nbsp;<u>ค้นหาสินค้า</u></span><br />
<table>
  <tr>
<td>ชื่อสินค้า&nbsp;</td>
<td><label>
  <input name="pro_name" type="text" id="pro_name" />
</label></td>
  </tr>
  <tr>
    <td colspan="2"><div align="right">
      <input type="image" src="<?php echo base_url() ?>image/search-button.jpg" name="Submit" value="Submit" />
    </div></td>
    </tr>
</table>
<?=form_close();?>