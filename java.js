var data = {
	log : function()
	{
		var first = document.getElementById("log").value;
		var second = document.getElementById("password").value;
		var input = document.getElementById("password");
		var b = 0;
		first = first.replace(/^\s+|\s+$/g, '');
		second  = second.replace(/^\s+|\s+$/g, '');
		var prof1=document.getElementById("error_user");
		var prof2=document.getElementById("error_pass");
		if(!first)
		{
			prof1.innerHTML="You must enter data";
			document.getElementsByTagName('form')[0].setAttribute('onsubmit', 'event.preventDefault()');
			b=1;
		}
		else prof1.innerHTML="";
		if(!second)
		{
			prof2.innerHTML="You must enter data";
			document.getElementsByTagName('form')[0].setAttribute('onsubmit', 'event.preventDefault()');
			b=1;
		}
		else prof2.innerHTML="";
		if(b==0) document.getElementsByTagName('form')[0].setAttribute('onsubmit', '');
	},
	change : function()
	{
		window.location = "http://localhost/web6_r/controllers/change.php";

	},
	logout : function()
	{
		window.location = "http://localhost/web6_6/controllers/login.php?logout";
	},
}