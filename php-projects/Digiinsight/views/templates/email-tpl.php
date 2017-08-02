<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>DigiInsight - Welcome</title>
</head>
<body>
<br /> <br />
<table width="80%" align="center" cellspacing="0" cellpadding="0" border="0" style="font-family: Arial,Helvetica,sans-serif;">
  <tbody>
    <tr valign="top">
      <td valign="top"><table width="100%" cellspacing="0" cellpadding="0" border="0" style="border:0px solid #999999;">
          <tbody>
          	<tr valign="top">
			              <td valign="top">
			              	<div style="background-color: #ffffff;">
			                  <table width="100%" cellspacing="0" cellpadding="0" border="0" style="background-color: #ffffff; padding: 0px; margin: 0px; width: 100%; height: 60px;">
			                    <tbody>
			                      <tr valign="top">
			                      	<td style="padding-left:0px;"><a href="<?=base_url()?>" target="_blank" style="text-decoration: none;"> <img width="150" height="60" border="0" alt="DigiInsight" src="<?php echo base_url()?>_static/assets/img/logo.png" /> </a></td>
			                      </tr>
			                    </tbody>
			                  </table>
			                </div>
			              </td>
            </tr>
            <tr valign="top">
              <td valign="top">
              	<div style="background-color: #aed6f1;">
                  <table width="100%" cellspacing="0" cellpadding="0" border="0" style="background-color: #aed6f1; padding: 0px; margin: 0px; width: 100%; height: 60px;">
                    <tbody>
                      <tr valign="top">
                      	<td style="padding-left:15px;">
                      	<h1 style="color:#ffffff"><?= $query ?></h1>
                      	</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </td>
            </tr>
            <tr valign="top">
              <td valign="top">
              	<table width="100%" cellspacing="0" cellpadding="0" border="0" style="font-family: Arial,Helvetica,sans-serif;">
                  <tbody>
                    <tr valign="top">
                      <td style="padding: 0px 20px 40px 20px; font-family: Arial,Helvetica,sans-serif;background: #f0f0f0;">
                       <p style="font-family: Arial,Helvetica,sans-serif; font-size: 16px; color: #777777; ext-align: left; padding:5px;">
                       		<table width="100%" cellspacing="0" cellpadding="0" border="0" style="font-family: Arial,Helvetica,sans-serif;">
                       		  	<?php if($name!=null){?>
                       		 		<tr valign="top">
	                     				 <td style="padding: 0px 20px 40px 20px; font-family: Arial,Helvetica,sans-serif;background: #f0f0f0;">
	                     				 	<strong>Name :</strong>
	                     				 </td>
	                     				 <td style="padding: 0px 20px 40px 20px; font-family: Arial,Helvetica,sans-serif;background: #f0f0f0;">
	                     				 	<?=$name ?>
	                     				 </td>
                     				</tr>
                     			 <?php }?>	 
                     			 <?php if($email!=null){?>
                       		 		<tr valign="top">
	                     				 <td style="padding: 0px 20px 40px 20px; font-family: Arial,Helvetica,sans-serif;background: #f0f0f0;">
	                     				 	<strong>Email :</strong>
	                     				 </td>
	                     				 <td style="padding: 0px 20px 40px 20px; font-family: Arial,Helvetica,sans-serif;background: #f0f0f0;">
	                     				 	<?=$email ?>
	                     				 </td>
                     				</tr>
                     			 <?php }?>	
                     			 <?php if($mobile!=null){?>
                       		 		<tr valign="top">
	                     				 <td style="padding: 0px 20px 40px 20px; font-family: Arial,Helvetica,sans-serif;background: #f0f0f0;">
	                     				 	<strong>Mobile :</strong>
	                     				 </td>
	                     				 <td style="padding: 0px 20px 40px 20px; font-family: Arial,Helvetica,sans-serif;background: #f0f0f0;">
	                     				 	<?=$mobile ?>
	                     				 </td>
                     				</tr>
                     			 <?php }?>	 
                     			 <?php if($from!=null){?>
                       		 		<tr valign="top">
	                     				 <td style="padding: 0px 20px 40px 20px; font-family: Arial,Helvetica,sans-serif;background: #f0f0f0;">
	                     				 	<strong>Enquire training:</strong>
	                     				 </td>
	                     				 <td style="padding: 0px 20px 40px 20px; font-family: Arial,Helvetica,sans-serif;background: #f0f0f0;">
	                     				 	between date <?=$from ?> to <?=$to ?>
	                     				 </td>
                     				</tr>
                     			 <?php }?>	 
                     			 <?php if($msg!=null){?>
                       		 		<tr valign="top">
	                     				 <td style="padding: 0px 20px 40px 20px; font-family: Arial,Helvetica,sans-serif;background: #f0f0f0;">
	                     				 </td>
	                     				 <td style="padding: 0px 20px 40px 20px; font-family: Arial,Helvetica,sans-serif;background: #f0f0f0;">
	                     				 	<?=$msg ?>
	                     				 </td>
                     				</tr>
                     			 <?php }?>	 
                       		</table>
                       </p>
                       	</td>
                    </tr>
                  </tbody>
                </table>
                <p style="height:1px;padding:0;margin:0"> </p>
                <table width="100%" cellspacing="0" cellpadding="0" align="center" border="0" style="font-family: Arial,Helvetica,sans-serif;">
				               <tbody>
				                    <tr valign="top">
				                      <td style="padding: 10px 20px; font-family: Arial,Helvetica,sans-serif;background: #ffffff;">
											<p style="color:#777;text-align:center;font-size:10px">
											   Digiinsight - A PeopleConnext Company
											</p>
											<p style="text-align:center">
											  <a href="https://www.linkedin.com/company/digiinsight" style="padding: 5px; text-decoration:none;">
											  		<img src="<?=base_url()?>_static/assets/img/linkedin.png" alt="LinkedIn"  style="width: 20px;"/>
											  </a> &nbsp;
											  <a href="#" style="padding: 5px; text-decoration:none;">
											  		<img src="<?=base_url()?>_static/assets/img/gplus.png" alt="Google+"  style="width: 20px;"/>
											  </a> &nbsp;
											  <a href="#" style="padding: 5px; text-decoration:none;">
											  		<img src="<?=base_url()?>_static/assets/img/gbg.png" alt="blog"  style="width: 20px;"/>
											  </a> &nbsp;
											  <a href="https://www.facebook.com/digiinsight/" style="padding: 5px; text-decoration:none;">
											  		<img src="<?=base_url()?>_static/assets/img/facebook.png" alt="Facebook"  style="width: 20px;"/>
											  </a> &nbsp;
											  <a href="https://twitter.com/InsightDigi" style="padding: 5px; text-decoration:none;">
											  		<img src="<?=base_url()?>_static/assets/img/twitter.png" alt="Twitter" style="width: 20px;"/>
											  </a> &nbsp;
											</p>
				                       </td>
				                    </tr>
				            </tbody>
                </table>
              </td>
            </tr>
          </tbody>
        </table>
      </td>
    </tr>
  </tbody>
</table>
</body>
</html>