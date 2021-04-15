function showPassword() {
    var x = document.getElementById("pass");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}

function enableUsername() {
    var disabled = document.getElementById("user").disabled;
    if (disabled) {
        document.getElementById("user").disabled = false;
    } else {
        document.getElementById("user").disabled = true;
    }
}

function enableEmail() {
    var disabled = document.getElementById("email").disabled;
    if (disabled) {
        document.getElementById("email").disabled = false;
    } else {
        document.getElementById("email").disabled = true;
    }
}

function enablePassword() {
    var disabled = document.getElementById("pass").disabled;
    if (disabled) {
        document.getElementById("pass").disabled = false;
    } else {
        document.getElementById("pass").disabled = true;
    }
}
