<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" >
<title>Bienvenue sur Inedits | La première plateforme d'écriture collaborative</title>
<style type="text/css">
html { -webkit-text-size-adjust:none; -ms-text-size-adjust: none;}
@media only screen and (max-device-width: 680px), only screen and (max-width: 680px) {
	*[class="table_width_100"] {
		width: 96% !important;
	}
	*[class="border-right_mob"] {
		border-right: 1px solid #dddddd;
	}
	*[class="mob_100"] {
		width: 100% !important;
	}
	*[class="mob_center"] {
		text-align: center !important;
	}
	*[class="mob_center_bl"] {
		float: none !important;
		display: block !important;
		margin: 0px auto;
	}
	.iage_footer a {
		text-decoration: none;
		color: #929ca8;
	}
	img.mob_display_none {
		width: 0px !important;
		height: 0px !important;
		display: none !important;
	}
	img.mob_width_50 {
		width: 40% !important;
		height: auto !important;
	}
}
.table_width_100 {
	width: 680px;
}
</style>
</head>

<body style="padding: 0px; margin: 0px;">
<div id="mailsub" class="notification" align="center">

<table width="100%" border="0" cellspacing="0" cellpadding="0" style="min-width: 320px;"><tr><td align="center" bgcolor="#eff3f8">


<!--[if gte mso 10]>
<table width="680" border="0" cellspacing="0" cellpadding="0">
<tr><td>
<![endif]-->

<table border="0" cellspacing="0" cellpadding="0" class="table_width_100" width="100%" style="max-width: 680px; min-width: 300px;">
	<!--header -->
	<tr><td align="center" bgcolor="#eff3f8">
		<!-- padding --><div style="height: 20px; line-height: 20px; font-size: 10px;">&nbsp;</div>
		<table width="96%" border="0" cellspacing="0" cellpadding="0">
			<tr><td align="left"><!--

				Item --><div class="mob_center_bl" style="float: left; display: inline-block; width: 115px;">
					<table class="mob_center" width="115" border="0" cellspacing="0" cellpadding="0" align="left" style="border-collapse: collapse;">
						<tr><td align="left" valign="middle">
							<!-- padding --><div style="height: 20px; line-height: 20px; font-size: 10px;">&nbsp;</div>
							<table width="115" border="0" cellspacing="0" cellpadding="0" >
								<tr><td align="left" valign="top" class="mob_center">
									<a href="#" target="_blank" style="color: #596167; font-family: Arial, Helvetica, sans-serif; font-size: 13px;">
									<font face="Arial, Helvetica, sans-seri; font-size: 13px;" size="3" color="#596167">

									<?php echo $this->Element('emails/logo') ?>
								</td></tr>
							</table>
						</td></tr>
					</table></div><!-- Item END--><!--[if gte mso 10]>
					</td>
					<td align="right">
				<![endif]-->
			</tr>
		</table>
		<!-- padding --><div style="height: 30px; line-height: 30px; font-size: 10px;">&nbsp;</div>
	</td></tr>
	<!--header END-->

	<!--content 1 -->
	<tr><td align="center" bgcolor="#ffffff">
		<table width="90%" border="0" cellspacing="0" cellpadding="0">
			<tr><td align="center">
				<!-- padding --><div style="height: 30px; line-height: 100px; font-size: 10px;">&nbsp;</div>
				<div style="line-height: 44px;">
					<font face="Arial, Helvetica, sans-serif" size="5" color="#57697e" style="font-size: 34px;">
					<span style="font-family: Arial, Helvetica, sans-serif; font-size: 34px; color: #57697e;">
						Vous avez du talent !
					</span></font>
				</div>
				<!-- padding --><div style="height: 30px; line-height: 30px; font-size: 10px;">&nbsp;</div>
			</td></tr>
			<tr><td align="center">
				<div style="line-height: 30px;">
					<font face="Arial, Helvetica, sans-serif" size="5" color="#4db3a4" style="font-size: 17px;">
					<span style="font-family: Arial, Helvetica, sans-serif; font-size: 17px; color: #4db3a4;">
						Bonjour
						<span style="text-transform: capitalize;"><?php echo $author.', '; ?></span>
						nous vous informons que votre contribution "<?php echo $title ?>", a été très appréciée par notre équipe. Découvrez-la en cliquant sur le bouton ci-dessous.
					</span></font>
				</div>
				<!-- padding --><div style="height: 35px; line-height: 35px; font-size: 10px;">&nbsp;</div>
			</td></tr>
      <tr><td align="center">
        <div style="line-height:24px;">

        <div><!--[if mso]>
          <v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="http://" style="height:60px;v-text-anchor:middle;width:300px;" arcsize="9%" stroke="f" fillcolor="#e66700">
            <w:anchorlock/>
            <center>
          <![endif]-->
              <?php echo $this->Html->link('Voir ma contribution', array('controller' => 'contributions', 'action' => 'view', 'title' => $treeSlug, 'slug' => $contribSlug, 'full_base' => true, 'admin' => false ), array('style' => 'background-color:#e66700;border-radius:5px;color:#ffffff;display:inline-block;font-family:sans-serif;font-size:13px;font-weight:bold;line-height:60px;text-align:center;text-decoration:none;width:300px;-webkit-text-size-adjust:none;')); ?>
          <!--[if mso]>
            </center>
          </v:roundrect>
        <![endif]--></div>
        </div>
        <!-- padding --><div style="height: 100px; line-height: 100px; font-size: 10px;">&nbsp;</div>
      </td></tr>
		</table>
	</td></tr>
	<!--content 1 END-->

	<?php echo $this->element('emails/links') ?>

  <?php echo $this->element('emails/footer') ?>
</table>
<!--[if gte mso 10]>
</td></tr>
</table>
<![endif]-->

</td></tr>
</table>

</div>
</body>
</html>
