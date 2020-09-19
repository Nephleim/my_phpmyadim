$(document).ready(function() {
    $("#sendDBName").click(function(e) {
        $.ajax({
            type: "POST",
            url: "../Database/createDatabase.php",
            data: { dbname: $("#dbInputCreate").val() },
            dataType: "html",
            success: function(response) {
                document.getElementById('result').innerHTML = response;
            },
            error: function() {
                document.getElementById('result').innerHTML = "error";
            }
        });
    });

    $("#sendDeleteDB").click(function(e) {
        $.ajax({
            type: "POST",
            url: "../Database/dropDatabase.php",
            data: { dbname: $("#dbInputDelete").val() },
            dataType: "html",
            success: function(response) {
                document.getElementById('result').innerHTML = response;
            },
            error: function() {
                document.getElementById('result').innerHTML = "error";
            }
        });
    });

    $("#sendRenameDB").click(function(e) {
        $.ajax({
            type: "POST",
            url: "../Database/renameDatabase.php",
            data: {
                dbnameOld: $("#dbInputRenameOld").val(),
                dbnameNew: $("#dbInputRenameNew").val()
            },
            dataType: "html",
            success: function(response) {
                document.getElementById('result').innerHTML = response;
            },
            error: function() {
                document.getElementById('result').innerHTML = "error";
            }
        });
    });

    $("#sendStatsDB").click(function(e) {
        dbname = document.getElementById('dbInputStats').innerHTML;
        $.ajax({
            type: "GET",
            url: "../Database/statsDatabase.php",
            data: 'dbname=' + dbname,
            dataType: 'html'
        }).done(function(data) {
            var result = $.parseJSON(data);
            document.getElementById('result').innerHTML = result;
        });
    });

});