<?
###########################################################
# Product:   EZ FormMail                                  #
# Author:    Sensation Designs                            #
# Version:   1.0                                          #
# Released:  March 10, 2003                               #
# Website:   http://www.sensationdesigns.com              #
# Copyright: Sensation Designs. All rights reserved.      #
###########################################################

###########################################################
# NOTE:                                                   #
#                                                         #
# All copyright information, credit, and links to any     #
# pages from Sensation Designs MAY NOT be modified,       #
# removied, or altered in any other fashhion.             #
###########################################################

###########################################################
# This program is free software; you can redistribute it  #
# and/ormodify it under the terms of the GNU General      #
# Public License as published by the Free Software        #
# Foundation; either version 2 of the License, or (at     #
# your option) any later version.                         #
#                                                         #
# This program is distributed in the hope that it will be #
# useful, but WITHOUT ANY WARRANTY; without even the      #
# implied warranty of MERCHANTABILITY or FITNESS FOR A    #
# PARTICULAR PURPOSE. See the GNU General Public          #
# License for more details.                               #
#                                                         #
# You should have received a copy of the GNU General      #
# Public License along with this program; if not, write   #
# to the Free Software Foundation, Inc., 675 Mass Ave,    #
# Cambridge, MA 02139, USA.                               #
###########################################################


###########################################################
# CONFIGURE THE FOLLOWING VARIABLES                       #
###########################################################

// Recipient of message (This can be changed via the form itself)
$recipient = 'info@zumro.com';

// Subject of message (This can be changed via the form itself)
$subject = 'Website Response';

// This is a list of domains that can run EZ FormMail. Do not include
// www, just the actual domain/ip address!
$referers = array('zumro.com');

// This is the page that users will be redirected to after the form is
// processed successfully.
$success_url = 'thanks.html';

// Your site URL
$siteurl = 'http://www.zumro.com';

###########################################################
# DO NOT EDIT BELOW THIS LINE                             #
###########################################################

function Print_Footer() {
	echo '<p><center>Powered by EZ FormMail. Get it <b>free</b> from <a href="http://www.sensationdesigns.com">http://www.sensationdesigns.com</a>!</center>';
}

function Check_Referer() {
	global $referers;
	$temp = explode('/', $_SERVER['HTTP_REFERER']);
	$referer = $temp[2];
	$found = false;
	foreach ($referers as $domain) {
		if (stristr($referer, $domain)) { $found = true; }
	}
	return $found;
}

if ($_POST) {
	if (Check_Referer() == false) {
		echo '<font size="+1" color="#FF0000">Error: Invalid Referer</font><BR>';
		echo 'You are accessing this script from an unauthorized domain!';
		Print_Footer();
		die();
	}
	$ctr = 0;
	
	$isrealname = 0;
	$isemail = 0;
	
	foreach ($_POST as $key => $val) {
		if ($key == 'realname') { $isrealname = 1; }
		if ($key == 'email') { $isemail = 1; }
		if (substr($key, 0, 4) == 'req_' || $key == 'realname' || $key == 'email') {
			if ($val == '') {
				if ($ctr == 0) {
					echo '<font size="+1" color="#FF0000">Error: Missing Field(s)</font><BR>';
					echo 'The following <i>required</i> field(s) were not filled out:<BR>';
				}
				echo '<BR>- <b>'.substr($key, 4).'</b>';
				$ctr++;
			}
		}
	}
	if ($ctr > 0) {
		echo '<p>Click <a href="javascript:history.go(-1)">here</a> to go back';
		Print_Footer();
		die();
	}
	else {
		if ($isrealname == 0) {
			echo '<font size="+1" color="#FF0000">Error: Missing Field</font><BR>';
			echo 'No "realname" field found.<p><a href="'.$siteurl.'">here</a> to return to the home page.';
			Print_Footer();
			die();
		}
		elseif ($isemail == 0) {
			echo '<font size="+1" color="#FF0000">Error: Missing Field</font><BR>';
			echo 'No "email" field found.<p><a href="'.$siteurl.'">here</a> to return to the home page.';
			Print_Footer();
			die();
		}
	}
	
	if (!(preg_match("/^.{2,}?@.{2,}\./", $_POST['email']))) {
			echo '<font size="+1" color="#FF0000">Error: Invalid E-mail</font><BR>';
			echo 'The e-mail address you entered (<i>'.$_POST['email'].'</i>) is invalid.';
			Print_Footer();
			die();
	}
	
	$body = "Below is the result of your feedback form. It was submitted on:\n".date('l, F jS, Y').' at '.date('g:ia').".\n";
	
	foreach ($_POST as $key => $val) {
		if ($key == 'recipient') { $recipient = $val; }
		elseif ($key == 'subject') { $subject = $val; }
		else {
			if ($key != 'realname' && $key != 'email') {
				$body .= "\n".str_replace('req_', '', $key).": $val";
			}
		}
	}
	$body .= "\n\n-------- Submission Details --------\n";
	$body .= "Remote Address: ".getenv('REMOTE_ADDR')."\n";
	$body .= "HTTP User Agent: ".getenv('HTTP_USER_AGENT')."\n\n";
	
	$mailheaders = "From: ".$_POST['realname']." <".$_POST['email'].">\n";
	$mailheaders .= "Reply-To: ".$_POST['email'];
	
	mail($recipient, $subject, $body, $mailheaders);
	header("Location: $success_url");
}
else {
	echo '<center>You have accessed this page from an invalid location. Please click <a href="'.$siteurl.'">here</a> to go to '.$siteurl.'.</center>';
}

Print_Footer();
?>