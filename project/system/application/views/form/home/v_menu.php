<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script type="text/JavaScript">
<!--
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
//-->
</script>
</head>

<body onload="MM_preloadImages('<?php echo base_url() ?>image/home1.gif','<?php echo base_url() ?>image/t_home1.gif','<?php echo base_url() ?>image/home2.jpg','<?php echo base_url() ?>image/member3.jpg','<?php echo base_url() ?>image/t_categories1.jpg','<?php echo base_url() ?>image/t_payment1.jpg','<?php base_url() ?>image/catalogsom.jpg','<?php echo base_url() ?>image/t_pro1.jpg')">
<p>&nbsp;</p>
<table width="200" height="84" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td><div align="center"><span class='style6'><a href="<?php echo base_url() ?>index.php/main"></a><a href="<?php echo base_url() ?>index.php/main">หนัาหลัก</a><a href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image1','','<?php echo base_url() ?>image/t_home1.gif',1)"></a><a href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image1','','<?php echo base_url() ?>image/home1.gif',1)"></a></span></div></td>
  </tr>
  <tr>
    <td><div align="center"><a href="<?php echo base_url() ?>index.php/main/login">สมัครสมาชิก</a></div></td>
  </tr>
</table>
</body>
</html>
