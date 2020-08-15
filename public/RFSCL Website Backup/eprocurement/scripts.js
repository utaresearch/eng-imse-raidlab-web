
var VPartA = "@", VPartB = "iasta.com", VSalesPart = "sales", 
	VSupportPart = "support", VInfoPart = "info", VSMSPart = "sms"
	VCareersPart = "careers";
var VSales = VSalesPart + VPartA + VPartB;
var VSupport = VSupportPart + VPartA + VPartB;
var VInfo = VInfoPart + VPartA + VPartB;
var VSMS = VSMSPart + VPartA + VPartB;
var VCareers = VCareersPart + VPartA + VPartB;

function colorOn(i){
	if (document.getElementById) {
		document.getElementById("td"+i).style.backgroundColor="#e5e5e5";
		document.getElementById("td"+i).style.cursor = "pointer";
		document.getElementById("link"+i).style.color = "#282827";
	}
	else if (document.all) {
		TTData = eval("document.all['td"+i+"']");
		TTLink = eval("document.all['link"+i+"']");
		TTData.style.backgroundColor="#282827";
		TTData.style.cursor = "hand";
		TTLink.style.color = "#FFFFFF";
	}
}

function colorOut(i){
	if(document.getElementById) {
		document.getElementById("td"+i).style.backgroundColor="#cecece";
		document.getElementById("link"+i).style.color = "#0C42B1";           	
	}
	else if (document.all) {
		TTData = eval("document.all['td"+i+"']");
		TTLink = eval("document.all['link"+i+"']");
		TTData.style.backgroundColor="#E5E5E5";
		TTLink.style.color = "#0C42B1";
	}
}

function isCheckAssessment() {  	
	if (document.regAssessment.regName.value == "") {
		alert("Please enter your Name");
		return false;
	}	
	else  if (document.regAssessment.regCompanyName.value == "") {
		alert("Please enter your Company Name");
		return false;
	}	
	else if (document.regAssessment.regPhone.value == "") {
		alert("Please enter your Phone number");
		return false;
	}	
	else  if (document.regAssessment.regEMail.value == "") {
		alert("Please enter your E-mail Address");
		return false;
	}		
	else if (document.regAssessment.regItem.value == "") {
		alert("Please enter your Item");
		return false;
	}	
	else {
		return true;
	}
}

function doLoginForward(URL) {
	if (document.loginForm.UserName.value == "") {
		alert("Please enter your Username");
		return false;
	}
	else if (document.loginForm.Password.value == "") {
		alert("Please enter your Password");
		return false;
	}
	else {
		if (document.loginForm.Subdomain.value == "") {
			document.loginForm.Subdomain.value = "default";
			document.loginForm.Cobrand.value = "iasta";
			SubdomainName = "iasta";		
		}
		else {
			document.loginForm.Cobrand.value = document.loginForm.Subdomain.value;
			SubdomainName = document.loginForm.Subdomain.value;
		}
		VActURL = URL.replace("XXXX", SubdomainName);
		document.loginForm.action = VActURL;		
		document.loginForm.submit();
	}
}

function doLoginFormSubmit() {
	setTimeout("document.loginForm.reset()", "1000");
}

function echeck(str) {
	var aResult = true
	var filter=/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i
	if (str != "") {
		if (filter.test(str))
			aResult=true
		else {
			alert("Please enter a valid E-mail Address")
			aResult=false
		}
	}
	return (aResult)
}	

function checkNewsletterSignup() {
	if (document.aNewsletterSignup.aEmail.value == "") {
		alert("Please enter your E-mail Address");
		return false;
	}
	else if (!echeck(document.aNewsletterSignup.aEmail.value)) {
		return false;
	}
	else {
		return true;
	}
}


function checkUnsubscribeForm() {
	if (document.formUnsubscribe.formEmailAddress.value == "") {
		alert("Please enter your E-mail Address");
		return false;
	}
	else if (!echeck(document.formUnsubscribe.formEmailAddress.value)) {
		return false;
	}
	else {
		return true;
	}
}


function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_findObj(n, d) { //v3.0
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("^/default.htm.htm"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document); return x;
}

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}


function aCheckCheckout()
{
	aChkValue = "no";	
	
	if (document.BestPracticesManual.aFirstName.value == "")
		{
			alert("Please enter your First Name ");
			return false;
		}
	else if (document.BestPracticesManual.aLastName.value == "")
		{
			alert("Please enter your Last Name");
			return false;
		}
	else if (document.BestPracticesManual.aTitle.value == "")
		{
			alert("Please enter your Title");
			return false;
		}
	else if (document.BestPracticesManual.aCompany.value == "")
		{
			alert("Please enter a Company name");
			return false;
		}
	else if (document.BestPracticesManual.aAddress.value == "")
		{
			alert("Please enter an Address");
			return false;
		}
	else if (document.BestPracticesManual.aCity.value == "")
		{
			alert("Please enter a City");
			return false;
		}
	else if (document.BestPracticesManual.aState.value == "")
		{
			alert("Please select a State");
			return false;
		}		
	else if (document.BestPracticesManual.aZip.value == "")
		{
			alert("Please enter the zip code");
			return false;
		}
	else if (document.BestPracticesManual.aCountry.value == "")
		{
			alert("Please enter your Country");
			return false;
		}
	else if (document.BestPracticesManual.aEmail.value == "")
		{
			alert("Please enter an email address");
			return false;
		}
	else if (document.BestPracticesManual.aPhone.value == "")
		{
			alert("Please enter a phone number");
			return false;
		}
	else if (document.BestPracticesManual.aDayPreference.value == "")
		{
			alert("Please select a Day");
			return false;
		}		
	else if (!(document.BestPracticesManual.aCurrentlySearching[0].checked || document.BestPracticesManual.aCurrentlySearching[1].checked)) 
		{
			alert("Please select \"yes\" or \"no\" if you are currently searching for and e-Sourcing solution.");
			return false;
		}				
	else
		{
			aChkValue = "yes";
		}	   
		
	if (aChkValue == "yes")
		{
			return true;
		}
	else
		{
			return false;
		}
	 
}

var crip = null;
function NewPopupWindow(url)
{
	if((crip == null) || (crip.closed)) 
	{
		crip = window.open(url, 'popupwindow', 'toolbar=yes,directories=no,status=no,location=no,menubar=no,scrollbars=yes,width=750,height=600,left=20,top=20,resizable=yes');
		crip.focus();
	}
	else
	{
		crip.location = url;
		crip.focus();
	}
}