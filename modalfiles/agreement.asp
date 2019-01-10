<!--#include file="connection.asp"-->
<%

	x_pg = request("pg")
	x_page = request("ppg")
	if x_pg = 2 then
	
	
	fname = request.Form("fname")
	cname = request.Form("cname")
	mobile = request.Form("no")
	email = request.Form("email")
	msg = request.Form("msg")
	mtype = request.Form("mtype")
	
	set rsmap= server.CreateObject("adodb.recordset")
		xpost = "select * from msg2"
		rsmap.open xpost, con, 1, 3

			rsmap.addnew
			
				rsmap("fname") = trim(fname)
				rsmap("cname") = trim(cname)
				rsmap("number") = trim(mobile)
				rsmap("email") = trim(email)
				rsmap("msg") = trim(msg)
				rsmap("mtype") = trim(mtype)
				rsmap("xdate") = date()
				
			rsmap.update
			
				strMsg = "Operation was Sucessful. Message Sent"
				response.redirect "agreement.asp?ppg=3&strMsg=" & Trim(strMsg)	
			
	rsmap.close
		
	end if

	
%>


<html>
<head>
<title>ANNOUNCEMENT</title>
</head>

<script type="text/javascript">
function Toggle(item) {
   obj=document.getElementById(item);
   visible=(obj.style.display!="none")
   key=document.getElementById("x" + item);
   if (visible) {
     obj.style.display="none";
     //key.innerHTML="<img src='folder.gif' width='16' height='16' hspace='0' vspace='0' border='0'>";
   } else {
      obj.style.display="block";
      //key.innerHTML="<img src='textfolder.gif' width='16' height='16' hspace='0' vspace='0' border='0'>";
   }
}

function Expand() {
   divs=document.getElementsByTagName("DIV");
   for (i=0;i<divs.length;i++) {
     divs[i].style.display="block";
     //key=document.getElementById("x" + divs[i].id);
     //key.innerHTML="<img src='textfolder.gif' width='16' height='16' hspace='0' vspace='0' border='0'>";
   }

}

function Collapse() {
   divs=document.getElementsByTagName("DIV");
   for (i=0;i<divs.length;i++) {
     divs[i].style.display="none";
     //key=document.getElementById("x" + divs[i].id);
     //key.innerHTML="<img src='folder.gif' width='16' height='16' hspace='0' vspace='0' border='0'>";
   }
}

</script>

<style>
.under a:hover {text-decoration: underline;}
</style>


<body style="padding: 10px; background: #ffffff;font-size:11px;font-family:Verdana, Arial, Helvetica, sans-serif">
<%
	if x_page <> 3 then
%>


<h3 style="margin-top: 0">ANNOUNCEMENT</h3>
<h3 style="margin-top: 0">THE LION HAS ROARED – ISPON MOURNS</h3>
<table align="left">
	<tr>
		<td valign="top"><img  style="margin-right:2px;" src="../images/lion.jpg"></td>
	</tr>
</table>
It is with tremendous shock, heavy hearts and great sense of loss that we received and now officially announce the sad demise of, <b>Engr. Chijioke Simeon Agu</b>, the founding President of the Institute of Software Practitioners of FUTO (ISPON), a distinguished IT practitioner, Software Industry pioneer  and Fellow of the FUTO Computer Society who passed-on on Sunday July 8th, 2012. 

<p>
On behalf of the members of the <b>National Executive Council and Members of Institute of Software Practitioners of FUTO (ISPON)</b>, I write to solicit for your written Condolences or Tribute to the entire family of our late President.
</p>
<p> 
For the records, Engr. Simeon Agu was the Great Lion of ICT-FUTO, at whose words alone awakened an entire IT industry; whose presence inspired confidence in a fledgling industry to go forth and claim its due; a fiercely loyal friend and a competitor respected by all. Engr. Agu was a former Council Member of <b>Computer Professionals (Registration) Council of FUTO (CPN), FUTO Computer Society (NCS)</b> and other reputable ICT Bodies at home and abroad. His roar will be missed by us all, as will his sure guidance and sagacity. 

</p>
<p>
Our target is to collate 1milion Tributes on his Professional engagements and accomplishments. It will be highly appreciated if you can submit your Tribute today.
Details of the Funeral Programme will be communicated to you as soon as it is released by the family. We will expect your cooperation and support through the trying days ahead, and in the future as his legacy lives on. 
</p>
<p>
Once more, please accept our assurances of the President and ISPON NEC.
</p>
<p> 
Sincerely,
</p>
<p>
Chris Uwaje FNCS<br>
President ISPON
</p>
<p>
	<fieldset>
			<legend><!--<a style="color:#FF0000" href="javascript:Toggle('menuMoreInfo1');"> -->
				<span style="color:#FF0000;font-size:14px"><b>Send a Condolence Message</b><!--</a> --></span>
		</legend>

		<!--<div style="display: none;" id="menuMoreInfo1">  -->
<form id="frmReg" name="frmReg" method="post" action="agreement.asp?pg=2"  onsubmit="return Check()">

			<table style="font-family:Verdana, Arial, Helvetica, sans-serif;font-size:12px;">
				<tr>
					<td  colspan="1">Message Type</td>
					<td valign="top" colspan="3">
						<input type="radio" name="mtype" value="Tribute" checked="checked">Tribute
						<input type="radio" name="mtype" value="Condolence">Condolence
					</td>
				</tr>
				<tr>
					<td valign="top">Name</td>
					<td valign="top"><input type="text" name="fname"></td>
					<td valign="top">Company Name</td>
					<td valign="top"><input type="text" name="cname"></td>
				</tr>
				<tr>
					<td valign="top">Mobile Number</td>
					<td valign="top"><input type="text" name="no"></td>
					<td valign="top">Email Address</td>
					<td valign="top"><input type="text" name="email"></td>
				</tr>
				<tr>
					<td valign="top" colspan="4">
						Message<br>
						<textarea style="width:600px;height:80px;" name="msg"></textarea>
					</td>
				</tr>
				<tr>
					<td valign="top" colspan="4">
						<input type="Submit" name="Submit" value="Submit" style="BORDER: #666666 1px solid; FONT-WEIGHT: normal; FONT-SIZE: 11px; COLOR: #000000; LINE-HEIGHT: 1.4em; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif; height: 20px; width: 100px">
					</td>
				</tr>
			</table>
</form>


	<!--</div> -->
	</fieldset>	
</p>
<%else%>

<h3 style="margin-top: 0">ANNOUNCEMENT</h3>
<h3 style="margin-top: 0">THE LION HAS ROARED – ISPON MOURNS</h3>
<table align="left">
	<tr>
		<td valign="top"><img  style="margin-right:2px;" src="../images/lion.jpg"></td>
	</tr>
</table>

			<p  style="padding-top:10px;font-family:Arial, Helvetica, sans-serif;font-size:12px;width:400px">
				Your Message has been sent successfully
			</p>
			<p style="padding-top:10px;font-family:Arial, Helvetica, sans-serif;font-size:12px;width:560px">
				We know you have been mightily blessed on our website and we pray you will continue to increase and abound in God's Grace, everyday.
			</p>
			<p style="padding-top:20px;color:#df2e0c;FONT-FAMILY:Arial, Helvetica, sans-serif;font-size:12px;font-weight:bold;width:400px">
				God bless you.
			</p>
			<p style="padding-top:10px;">&nbsp;</p>
			<p style="padding-top:10px;">&nbsp;</p>
			
			<p align="right" style="400px">
				<a href="../index.asp" target="_parent">
					<img border="0"  style="margin-right:2px;" src="../images/house.jpg" title="Back to Home Page">
				</a>
			</p>


<%
end if
%>
</body>
</html>


<script language="javascript">
function Check() {

if(document.frmReg.fname.value == "") {
alert ("Please enter your Name")
document.frmReg.fname.focus();
return false
}
else if(document.frmReg.cname.value == "") {
alert ("Enter enter your Company Name")
document.frmReg.cname.focus();
return false
}
else if(document.frmReg.no.value == "") {
alert ("Enter enter Your Mobile Number")
document.frmReg.no.focus();
return false
}
else if(document.email.no.value == "") {
alert ("Enter enter Email Address")
document.frmReg.email.focus();
return false
}

else if(document.frmReg.msg.value == "") {
alert ("Enter enter Message Content")
document.frmReg.msg.focus();
return false
}

else {
return true
}

}
</script>
