function validation(form) {
    if (form.username.value.length == 0 || form.password.value.length == 0) {
        document.getElementById("error").innerHTML = "Please fill out the fields";

        form.username.focus();
        return false;
    } else {
        document.frmlogin.submit();
    }
}

function additemValidation(form) {
    //alert("test");
    ;

    if (form.code.value.length == 0 || form.name.value.length == 0 || form.price.value.length == 0 || form.quantity.value.length == 0) {
        //alert("Please fill");
        document.getElementById("error").innerHTML = "Please fill the empty fields";
        form.code.focus();
        return false;
    }
    if (document.getElementById("image").value == "") {
        document.getElementById("error").innerHTML = "please select an Image";
        form.image.focus();
        return false;
    }
    document.form.submit();

}




