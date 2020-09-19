$(document).ready(function() {
    $("#sendDBName").click(function(e) {
        console.log("error");
        $.ajax({
            type: "POST",
            url: "./Database/Databases/createDatabase.php",
            data: { dbname: $("#dbInputCreate").val() },
            dataType: "html",
            success: function(response) {
                document.getElementById('result').innerHTML = response;
                document.getElementById('dbInputCreate').value = '';
            },
            error: function() {
                document.getElementById('result').innerHTML = "error";
                document.getElementById('dbInputCreate').value = '';
            }
        });
    });

    $("#sendDeleteDB").click(function(e) {
        $.ajax({
            type: "POST",
            url: "./Database/Databases/dropDatabase.php",
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
            url: "./Database/Databases/renameDatabase.php",
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
        // dbnamee = document.getElementById('dbInputStats').innerHTML;
        $.ajax({
            type: "GET",
            url: "./Database/Databases/statsDatabase.php",
            data: { dbname: $("#dbInputStats").val() },
            dataType: 'html'
        }).done(function(data) {
            var result = $.parseJSON(data);
            document.getElementById('result').innerHTML = result;
        });
    });

    $("#sendRenameTable").click(function(e) {
        console.log("error");
        // $.ajax({
        //     type: "POST",
        //     url: "./Database/Tables/renameTable.php",
        //     data: {
        //         dbname: $("#dbNameRenameTable").val(),
        //         tablenameOld: $("#tableNameOld").val(),
        //         tablenameNew: $("#tableNameNew").val()
        //     },
        //     dataType: "html",
        //     success: function(response) {
        //         document.getElementById('result').innerHTML = response;
        //     },
        //     error: function() {
        //         document.getElementById('result').innerHTML = "error";
        //     }
        // });
    });

});