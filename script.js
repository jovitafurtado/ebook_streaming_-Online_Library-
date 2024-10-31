
function validate() {
    var uname = document.getElementById("uname").value;
    var pass = document.getElementById("password").value;

    // Validate username
    if (uname.trim() === "" || !isNaN(uname)) {
        alert("Please enter a valid username (it cannot be just numbers).");
        return false;
    }

    // Check for minimum length for the username
    if (uname.length < 2) {
        alert("Username must be at least 3 characters long.");
        return false;
    }

    // Validate password
    if (pass.trim() === "") {
        alert("Please enter your password.");
        return false;
    }

    // If all validations pass
    return true;
}
