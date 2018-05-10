<title>管理首页</title>
</head>
<body>
<div class="pd-20" style="padding-top:20px;">
<style>
.tbtitle td{border: 1px solid #dadada;}
</style>
<table align="center" width="98%" class="table">
  <tr>
    <td width="50%" style="padding-right:13px" valign="top"><table width="100%" border="0"  cellpadding="1" cellspacing="1" class="tbtitle" style="margin-left:1%;">
        <tr>
          <td bgcolor="#F2F4F6"><strong>登陆信息</strong></td>
        </tr>
	<tr>
          <td bgcolor="#FFFFFF" >&nbsp;&nbsp;<?=$admin->nichen?> ,上次登录时间:<?=$_SESSION['admin_logtime']?> 上次登录IP:<?=$_SESSION['admin_logip']?></td>
        </tr>
        <tr>
          <td bgcolor="#F2F4F6" style="padding:6px 6px 8px 8px;"><strong>视频统计</strong></td>
        </tr>
        <tr>
          <td bgcolor="#FFFFFF" >今日数量:<?=$count[0];?>个&nbsp;&nbsp;昨日数量:<?=$count[1];?>个&nbsp;&nbsp;本月数量:<?=$count[2];?>个&nbsp;&nbsp;上月数量:<?=$count[3];?>个&nbsp;&nbsp;总数量:<?=$count[4];?>个&nbsp;&nbsp;</td>
        </tr>
	</table>
        <table width="100%" border="0"  cellpadding="1" cellspacing="1" class="tbtitle" style="margin-left:1%;">
        <tr>
          <td bgcolor="#F2F4F6"><strong>系统信息</strong>&nbsp;&nbsp;&nbsp; </td>
        </tr>		
        <br>
        <tr>
          <td bgcolor="#FFFFFF" >当前版本: <span id="yver">v<?=Ct_Version?></span><span id="xver"></span></td>
        </tr>
        <tr>
          <td bgcolor="#FFFFFF" >操作系统：<?php $os = explode(" ", php_uname()); echo $os[0];?></td>
        </tr>
        <tr>
          <td bgcolor="#FFFFFF" >主 机 名：<?=$_SERVER["HTTP_HOST"]?></td>
        </tr>
        <tr>
          <td bgcolor="#FFFFFF" >内核版本：<?php if('/'==DIRECTORY_SEPARATOR){echo $os[2];}else{echo $os[1];} ?> /   <?php echo $_SERVER['SERVER_SOFTWARE'];?></td>
        </tr>
        <tr>
          <td bgcolor="#FFFFFF" >系统时间：<?=date('Y-m-d H:i:s')?></td>
        </tr>
        <tr>
          <td bgcolor="#FFFFFF" >服务器IP：<?=GetHostByName($_SERVER['SERVER_NAME'])?></td>
        </tr>
        <tr>
          <td bgcolor="#FFFFFF" >PHP版本：<?=PHP_VERSION?></td>
        </tr>
        <tr>
          <td bgcolor="#FFFFFF" >Mysql版本：<?=$this->db->version()?></td>
        </tr>
      </table>
      </td>
      <td width="50%" height="100%" valign="top">
      <br>

      </td>
  </tr>
</table>
</div>
<footer class="footer">
  <p>Copyright &copy;2016 Ctcms All Rights Reserved.<br></p>
</footer>
<script>
var VER = '<?=Ct_Version?>';
var WEB_MODE = <?=Web_Mode?>;
var SELF_PATH='<?=Web_Path.SELF?>';
</script>
<script type="text/javascript" src="<?=Base_Path?>jquery/jquery.min.js"></script> 
<script type="text/javascript" src="<?=Base_Path?>admin/js/H-ui.js"></script>
<script type="text/javascript" src="<?=Ct_Upurl?>"></script>
</body>
</html>