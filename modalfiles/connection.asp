<%
set con= Server.CreateObject("ADODB.Connection")	
'Connectionstring = "Provider=MSDASQL;driver={SQL Server};server=(local);uid=sa;pwd=;database=ispon"
Connectionstring = "Driver={SQL Server}; Server=mssql.ispon.org,1500; Database=isponsurvey; Uid=adminsec; Pwd=Isponsec1$;"
con.Open Connectionstring
%>