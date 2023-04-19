$(document).ready(function () {
  $("#userRegisterForm").on("submit", function () {
    let firstName = $("#firstName").val();
    let userName = $("#userName").val();
    let lastName = $("#lastName").val();
    let email = $("#email").val();
    let password = $("#password").val();
    let confirmPassword = $("#confirmPassword").val();

    if (!isNaN(userName) || userName === "") {
      Swal.fire({
        icon: "error",
        title: "ERROR",
        text: "Please Provide Proper Username",
      });
      return false;
    }

    if (!isNaN(firstName) || firstName === "") {
      Swal.fire({
        icon: "error",
        title: "ERROR",
        text: "Please Provide Proper First Name",
      });
      return false;
    }

    if (email === "") {
      Swal.fire({
        icon: "error",
        title: "ERROR",
        text: "Please Provide Proper Email",
      });
      return false;
    }

    if (!isNaN(lastName) || lastName === "") {
      Swal.fire({
        icon: "error",
        title: "ERROR",
        text: "Please Provide Proper Last Name",
      });
      return false;
    }

    if ($("input[type=radio][name=gender]:checked").length == 0) {
      Swal.fire({
        icon: "warning",
        title: "Required",
        text: "Please Select Your Gender",
      });
      return false;
    }

    if (password.length < 8) {
      Swal.fire({
        icon: "error",
        title: "ERROR",
        text: "Password length must be atleast 8 Characters",
      });
      return false;
    }

    if (!/[a-z]/g.test(password)) {
      Swal.fire({
        icon: "error",
        title: "ERROR",
        text: "Password must contain at least one Lowercase Letter (a-z)",
      });
      return false;
    }

    if (!/[A-Z]/g.test(password)) {
      Swal.fire({
        icon: "error",
        title: "ERROR",
        text: "Password must contain at least one Uppercase Letter (A-Z).",
      });
      return false;
    }

    if (!/\d/g.test(password)) {
      Swal.fire({
        icon: "error",
        title: "ERROR",
        text: "Password must contain at least one number (0-9)",
      });
      return false;
    }

    if (!/[-!$%^&*()_+|~=`{}[:;<>?,.@#\]]/g.test(password)) {
      Swal.fire({
        icon: "error",
        title: "ERROR",
        text:
          "Password must contain at least one Special Character. ([-!$%^&*()_+|~=`{}[:;<>?,.@#])",
      });
      return false;
    }

    if (password !== confirmPassword) {
      Swal.fire({
        icon: "error",
        title: "ERROR",
        text: "Password & Confirm password field are not Same",
      });
      return false;
    }
  });
});
