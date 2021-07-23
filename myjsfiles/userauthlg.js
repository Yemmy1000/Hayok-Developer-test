// VALIDATE HEALTH WORKERS LOGIN
$(document).ready(function() {

    $('.hworkerlogin').click(function(e) {
        var emailusername = $("#emailusername").val();
        var password = $("#password").val();
        var usertype = $("#usertype").val();

        $("#logform").addClass("was-validated");
        if (password == '' || emailusername == '') {
            alert("No fields should be empty!!")
            return false;
        } else {
            $.ajax({
                type: "POST",
                url: "functs/log.php",
                data: { emailusername: emailusername, password: password, usertype: usertype },
                beforeSend: function() {
                    $('#hworkerlogin').addClass("btn-progress", "disabled");
                },
                success: function(response) {
                    if (response.trim() == "success") {
                        $('#hworkerlogin').attr("disabled", false);
                        setTimeout(function() {
                            window.location.href = "hworker/";
                        }, 1000);

                    } else if (response.trim() == "fail") {
                        $('.alert').css('display', 'block');
                        $('#hworkerlogin').attr("disabled", false);
                        $('#hworkerlogin').text("Try Again");
                        return false;
                    } else if (response.trim() == "error") {
                        $('#hworkerlogin').attr("disabled", false);
                        $('.alert').css('display', 'block');
                        $('#hworkerlogin').text("Try Again");
                        iziToast.error({
                            title: 'Error',
                            message: "Invalid Login Details",
                            position: 'center',
                        });
                        return false;
                    }


                }

            });
            return false;
        }
        return false;

    });

    // VALIDATE PATIENT LOGIN

    $('.patientlogin').click(function(e) {
        var username = $("#phone").val();
        var password = $("#password").val();
        var usertype = $("#usertype").val();


        $("#logform").addClass("was-validated");
        // console.log(emailusername);
        if (password == '' || username == '') {
            console.log(username);
            alert("No fields should be empty!!")
            return false;
        } else {
            $.ajax({
                type: "POST",
                url: "functs/log.php",
                data: { usertype: usertype, username: username, password: password },
                beforeSend: function() {
                    $('#patientlogin').addClass("btn-progress", "disabled");
                },
                success: function(response) {
                    if (response.trim() == "success") {
                        $('#patientlogin').attr("disabled", false);

                        setTimeout(function() {
                            window.location.href = "patient/";
                        }, 1000);

                    } else if (response.trim() == "fail") {
                        $('#patientlogin').attr("disabled", false);
                        $('.alert').css('display', 'block');
                        $('#patientlogin').text("No! Try Again");
                        return false;
                    } else if (response.trim() == "error") {
                        $('#patientlogin').attr("disabled", false);
                        $('#patientlogin').text("Try Again");
                        iziToast.error({
                            title: 'Error',
                            message: "Invalid Login Details",
                            position: 'center',
                        });
                        return false;
                    }


                }

            });
            return false;
        }
        return false;

    });

    return false;
});