function phonenumber(inputtxt)
{
    var phoneno = /^\d{10}$/;
    if((inputtxt.value.match(phoneno)))
    {
        return true;
    }
    else
    {
        alert("enter valid phonenumber");
        return false;
    }
}