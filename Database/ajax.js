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
        $.ajax({
            type: "GET",
            url: "./Database/Databases/statsDatabase.php",
            data: {
                dbname: $("#dbInputStats").val()
            },
            success: function(response) {
                document.getElementById('result').innerHTML = response;
            },
            error: function() {
                document.getElementById('result').innerHTML = "error";
            }
        })
    });

    $("#sendDisplayTable").click(function(e) {
        $.ajax({
            type: "GET",
            url: "./Database/Tables/displayTables.php",
            data: {
                dbname: $("#dbNameDisplayTable").val()
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

    // $("#sendCreateTable").click(function(e) {
    //     $.ajax({
    //         type: "POST",
    //         url: "./Database/Tables/createTable.php",
    //         data: {
    //             dbname: $("#dbNameCreateTable").val(),
    //             tableNameCreate: $("#tableNameCreate").val()
    //         },
    //         dataType: "html",
    //         success: function(response) {
    //             document.getElementById('result').innerHTML = response;
    //         },
    //         error: function() {
    //             document.getElementById('result').innerHTML = "error";
    //         }
    //     });
    // });

    $("#sendRenameTable").click(function(e) {
        $.ajax({
            type: "POST",
            url: "./Database/Tables/renameTable.php",
            data: {
                dbname: $("#dbNameRenameTable").val(),
                tableNameOld: $("#tableNameRenameNew").val(),
                tableNameNew: $("#tableNameRenameNew").val()
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

    $("#sendAddToTable").click(function(e) {
        $.ajax({
            type: "POST",
            url: "./Database/Tables/addToTable.php",
            data: {
                dbname: $("#dbNameAddToTable").val(),
                tableName: $("#tableNameAddToTable").val(),
                columnName: $("#columnAddToTable").val(),
                columnType: $("#columnTypeAddToTable").val(),
                columnSize: $("#columnSizeAddToTable").val()
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

    $("#sendDeleteColumn").click(function(e) {
        $.ajax({
            type: "POST",
            url: "./Database/Tables/deleteColumn.php",
            data: {
                dbname: $("#dbNameDeleteColumn").val(),
                tableName: $("#tableNameDeleteColumn").val(),
                columnName: $("#columnNameDeleteColumn").val()
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

    $("#sendRenameColumn").click(function(e) {
        $.ajax({
            type: "POST",
            url: "./Database/Tables/renameColumn.php",
            data: {
                dbname: $("#dbNameRenameColumn").val(),
                tableName: $("#tableNameRenameColumn").val(),
                columnNameOld: $("#columnNameRenameColumnOld").val(),
                columnNameNew: $("#columnNameRenameColumnNew").val(),
                columnType: $("#columnRenameColumn").val(),
                columnSize: $("#columnSizeRenameColumn").val()
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

    $("#sendStatsTable").click(function(e) {
        $.ajax({
            type: "GET",
            url: "./Database/Tables/statsTable.php",
            data: {
                dbname: $("#dbInputStatsTable").val(),
                tableName: $("#tableInputStatsTable").val()
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

});