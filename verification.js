//the client-side checking goes here....
verify=function()
{
//  alert("Yo!! Shwishore 5ever");
//var email=document.getElementById("emailid").value;
var email = document.forms["signup"]["emailid"].value;
//alert("This is what I got"+email);
var email_valid=email.search(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/);
if(email_valid!=0)
{
  alert("Invalid Email ID!! >:\( )");
  return false;
}

var email = document.forms["signup"]["phone"].value;
if(phone.length>0){
var phone_valid=phone.search(/[0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]/);
if(phone_valid!=0)
  {
    alert("Invalid phone!!");
    return false;
  }
  return true;
}

}
