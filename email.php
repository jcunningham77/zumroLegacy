<?php
require_once "Mail.php";


$name = $_POST['realname'];
$emailaddress = $_POST['email'];
$phone = $_POST['phone'];

$comments = "Message from: " . $name . "\nEmail Address: " . $emailaddress . "\nPhone: " . $phone . "\nComments: " . $_POST['comments'];




$subject = 'Website Feedback';


$to = "<jcunningham77@gmail.com>,<chrissy@zumro.com>,<christinemgagliardi@gmail.com>";

$host = "localhost";
$username = "zumrocom";
$password = "smugtemp123";
$from = "contactus@zumro.com";

$headers = array ('From' => $from,
  'To' => $to,
  'Subject' => $subject);
$smtp = Mail::factory('smtp',
  array ('host' => $host,
    'auth' => false,
    'username' => $username,
    'password' => $password));

$mail = $smtp->send($to, $headers, $comments);

//echo("<p>Message successfully sent!</p>");

if (PEAR::isError($mail)) {
  //echo("<p>" . $mail->getMessage() . "</p>");
 } else {
  //echo("<p>Message successfully sent!</p>");
 }
 
?>


<html>
<head>
<title>Zumro, Inc :: The Right Choice for all Emergency Services</title>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-color: E3E3E3;
}
-->
</style>
<link href="styles/zumroStylee.css" rel="stylesheet" type="text/css" />
<link REL="SHORTCUT ICON" HREF="http://www.zumro.com/images/favicon.ico">
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1"></head>

<body onLoad="goforit()">
<table width="825" border="0" align="center" cellpadding="0" cellspacing="0" background="images/BGshadow01.png">
  <tr>
    <td><table width="800" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td height="123" valign="top"><img src="images/header03b.jpg" width="800" height="123" /></td>
      </tr>
      <tr>
        <td height="30" valign="top"><table width="100%" height="30" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
            <tr bgcolor="#FFFFFF">
              <td width="10" valign="middle">&nbsp;</td>
              <td width="700" align="center" valign="middle" class="topNavText"><a href="index.html" >HOME</a>&nbsp; |&nbsp; <a href="links.html" >LINKS</a>&nbsp; | <a href="newProducts.html" >ZUMRO News</a>&nbsp; |&nbsp;<a href="about.html">ABOUT</a>&nbsp; |&nbsp; <a href="products.html">PRODUCTS</a>&nbsp; | &nbsp;<a href="specs.html">TECHNICAL SPECS</a>&nbsp; | &nbsp;<a href="downloads.html">DOWNLOADS</a>&nbsp;|&nbsp; <a href="ourFactory.html">OUR FACTORY</a> |&nbsp; <a href="videoClips.html">VIDEO CLIPS</a> |&nbsp; <a href="contact.html">CONTACT</a></td>
              
              <td width="10">&nbsp;</td>
            </tr>
        </table></td>
      </tr>
      <tr>
        <td height="8" valign="top"><img src="images/spacerBlack.jpg" width="800" height="8" /></td>
      </tr>
      <tr>
        <td valign="top"><img src="images/middle06.jpg" width="800" height="130" /></td>
      </tr>
      <tr>
        <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td valign="top"><img src="images/spacerBlack.jpg" width="500" height="5" /></td>
            <td width="300" valign="top"><img src="images/columnTop09.jpg" width="300" height="25"></td>
          </tr>
          <tr>
            <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="10">
              <tr>
                <td align="left" valign="top"><p><span class="medBlackText">Thank you for your feedback!<br>
                </span><span class="mainBodyText"></span></p>
                  <hr size="1" class="mainBodyText">
                 </td>
              </tr>
            </table></td>
            <td valign="top"><iframe src="cocontact.html" width="300" height="650" frameborder="0">&nbsp;</iframe></td>
          </tr>
        </table>
          </td>
      </tr>
      <tr>
        <td height="25" valign="top"><table width="100%" height="25" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr bgcolor="#000000">
            <td width="300">&nbsp;</td>
            <td align="right" valign="bottom"><img src="images/footerBox02.jpg" width="500" height="25" border="0" usemap="#Map" /></td>
          </tr>
        </table></td>
        </tr>
    </table></td>
  </tr>
</table>

<map name="Map" id="Map"><area shape="rect" coords="413,4,473,19" href="http://www.inkoperated.com" target="_blank" />
</map></body>
</html>