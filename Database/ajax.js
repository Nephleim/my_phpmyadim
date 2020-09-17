$(document).ready(function() {
    $("#sendDBName").click(function(e) {
        $.ajax({
            type: "POST",
            url: "../Database/createDatabase.php",
            data: { dbname: $("#dbInputCreate").val() },
            dataType: "html",
            success: function() {
                document.getElementById('result').innerHTML = "Success creating the database!";
            },
            error: function() {
                document.getElementById('result').innerHTML = "Error while creating the database";
            }
        });
    });

    $("#sendDeleteDB").click(function(e) {
        $.ajax({
            type: "POST",
            url: "../Database/dropDatabase.php",
            data: { dbname: $("#dbInputDelete").val() },
            dataType: "html",
            success: function() {
                document.getElementById('result').innerHTML = "Success deleting the database!";
            },
            error: function() {
                document.getElementById('result').innerHTML = "Error while deleting the database";
            }
        });
    });

});