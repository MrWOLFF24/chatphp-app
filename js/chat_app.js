$(document).ready(function () {
    $('#envoi').click(function (e) {
        e.preventDefault();

        var pseudo = encodeURIComponent($('#pseudo').val());
        var message;
        message = encodeURIComponent($('#message').val());

        if (pseudo !== "" && message !== "") {
            $.ajax({
                url : "envoibdd.php",
                type : "POST",
                data : "pseudo=" + pseudo + "&message=" + message
            });

            $('#message').append("<p>" + pseudo + "dit :" + message + "</p>");
        }
    });
});
