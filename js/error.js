// JavaScript Document
function errCheck()
{
	var url = document.URL;
	unescape(url);
	if(url.search('\\?type=err')>0)
	{
		document.getElementById('errmsg').innerHTML="Please Enter Valid NAME and EMAIL ID";
	}
	else
	{
		document.getElementById('errmsg').innerHTML="";
	}

}
