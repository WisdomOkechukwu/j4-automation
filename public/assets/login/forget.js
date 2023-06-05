function showUserData() {
    var id = $(`#id_number`).val();
    $(`#no-loading-spinner`).removeClass("d-block").addClass("d-none");
    $(`#loading-spinner`).removeClass("d-none").addClass("d-block");

    $.get(`/search/${id}`, function (data) {
        $("#confirm-user-email").modal("show");
        if (data.success === true) {
            $("#forgot-email-text").text(
                `Is this your email ${data.user.masked}`
            );
            $(`#forgot-email`).val(data.user.email);
            $(`#forgot-email-button`).removeClass("d-none").addClass("d-block");

            $(`#no-loading-spinner`).removeClass("d-none").addClass("d-block");
            $(`#loading-spinner`).removeClass("d-block").addClass("d-none");s
        } else {
            $("#forgot-email-text").text(
                "User not found please check your ID NUMBER"
            );
            $(`#no-loading-spinner`).removeClass("d-none").addClass("d-block");
            $(`#loading-spinner`).removeClass("d-block").addClass("d-none");
        }
    });
}
