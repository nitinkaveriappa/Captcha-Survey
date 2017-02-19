// JavaScript Document
function errCheck()
{
	var url = document.URL;
	unescape(url);
	if(url.search('\\?type=err')>0)
	{
		document.getElementById('errmsg').innerHTML="Please Enter Valid NAME and EMAIL ID";
	}
	else if(url.search('\\?type=bot')>0)
	{
		document.getElementById('errmsg').innerHTML="Solve the captcha's or be deemed as a bot";
	}
	else
	{
		document.getElementById('errmsg').innerHTML="";
	}

}
