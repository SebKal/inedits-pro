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
			<tr><td align="center"><!--

				Item --><div class="mob_center_bl" style="display: inline-block; width: 115px;">
					<table class="mob_center" width="115" border="0" cellspacing="0" cellpadding="0" align="center" style="border-collapse: collapse;">
						<tr><td align="center" valign="middle">
							<!-- padding --><div style="height: 20px; line-height: 20px; font-size: 10px;">&nbsp;</div>
							<table width="115" border="0" cellspacing="0" cellpadding="0" >
								<tr><td align="center" valign="top" class="mob_center">
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
			<tr><td align="left">
				<!-- padding --><div style="height: 30px; line-height: 50px; font-size: 10px;">&nbsp;</div>
				<div style="line-height: 44px;">
					<font face="Arial, Helvetica, sans-serif" size="5" color="#57697e" style="font-size: 34px;">
					<span style="font-family: Arial, Helvetica, sans-serif; font-size: 34px; color: #57697e;">
						Désolé :(
					</span></font>
				</div>
				<!-- padding --><div style="height: 30px; line-height: 30px; font-size: 10px;">&nbsp;</div>
			</td></tr>
			<tr><td align="left">
				<div style="line-height: 30px;">
					<font face="Arial, Helvetica, sans-serif" size="5" color="#4db3a4" style="font-size: 17px;">
					<span style="font-family: Arial, Helvetica, sans-serif; font-size: 17px; color: #4db3a4; text-align: left!important;">
						Bonjour
						<span style="text-transform: capitalize;"><?php echo $author.', '; ?></span><br/>
						nous vous informons que votre contribution, <?php echo $participation ?>, n'a pas été retenue pour figurer sur notre site. <br/>
						Que ce refus ne vous décourage pas !<br/>
						Nous vous invitons à retravailler votre texte ou à proposer une nouvelle contribution.
						En vous remerciant vivement de votre participation,<br/>

						Les éditions INEDITS
					</span></font>
				</div>
				<!-- padding --><div style="height: 35px; line-height: 35px; font-size: 10px;">&nbsp;</div>
			</td></tr>
			<tr><td align="left">
				<table width="80%" align="left" border="0" cellspacing="0" cellpadding="0">
					<tr><td align="left">
						<div style="line-height: 24px; padding-bottom: 20px;">
							<font face="Arial, Helvetica, sans-serif" size="4" color="#57697e" style="font-size: 16px;">
							<?php if ($message) : ?>
								<span style="font-style: italic;">Commentaire de l'équipe : </span><br/>
								<span style="font-family: Arial, Helvetica, sans-serif; font-size: 15px; color: #57697e;">
									<?php echo $message ?>
								</span></font>
							<?php endif; ?>
						</div>
					</td></tr>
				</table>
				<!-- padding --><div style="height: 45px; line-height: 45px; font-size: 10px;">&nbsp;</div>
			</td></tr>
		</table>
	</td></tr>
	<!--content 1 END-->


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
