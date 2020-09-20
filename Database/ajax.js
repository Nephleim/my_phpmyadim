$(document).ready(function() {
    showDB();
    $("#sendDBName").click(function(e) {
        console.log("error");
        $.ajax({
            type: "POST",
            url: "./Database/Databases/createDatabase.php",
            data: {
                dbname: $("#dbInputCreate").val()
            },
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
            data: {
                dbname: $("#selectDB").val()
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

    $("#sendRenameDB").click(function(e) {
        $.ajax({
            type: "POST",
            url: "./Database/Databases/renameDatabase.php",
            data: {
                dbnameOld: $("#selectDB").val(),
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
                dbname: $("#selectDB").val()
            },
            success: function(response) {
                document.getElementById('result').innerHTML = response;
            },
            error: function() {
                document.getElementById('result').innerHTML = "error";
            }
        })
    });

    $("#sendRenameTable").click(function(e) {
        $.ajax({
            type: "POST",
            url: "./Database/Tables/renameTable.php",
            data: {
                dbname: $("#selectDB").val(),
                tableNameOld: $("#selectTable").val(),
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
                dbname: $("#selectDB").val(),
                tableName: $("#selectTable").val(),
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
                dbname: $("#selectDB").val(),
                tableName: $("#selectTable").val(),
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
                dbname: $("#selectDB").val(),
                tableName: $("#selectTable").val(),
                columnNameOld: $("#columnNameRenameColumnOld").val(),
                columnNameNew: $("#columnNameRenameColumnNew").val(),
                columnType: $("#columnTypeRenameColumn").val(),
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
                dbname: $("#selectDB").val(),
                tableName: $("#selectTable").val()
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

    $("#sendAddRow").click(function(e) {
        $.ajax({
            type: "POST",
            url: "./Database/Data/AddRow.php",
            data: {
                dbname: $("#selectDB").val(),
                tableName: $("#selectTable").val(),
                columnName: $("#columnNameAddRow").val(),
                value: $("#valueRowAddRow").val()
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

    $("#sendDeleteRow").click(function(e) {
        $.ajax({
            type: "POST",
            url: "./Database/Data/DeleteRow.php",
            data: {
                dbname: $("#selectDB").val(),
                tableName: $("#selectTable").val(),
                columnName: $("#columnNameDeleteRow").val(),
                value: $("#valueRowDeleteRow").val()
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

function showData() {
    $.ajax({
        type: "GET",
        url: "./Database/Tables/getData.php",
        data: {
            dbname: $("#selectDB").val(),
            tableName: $("#selectTable").val()
        },
        dataType: "html",
        success: function(response) {
            // console.log(response);
            result = JSON.parse(response);
            $(".lineData").remove();

            $.each(result, function(i, line) {
                if (i > 50) {
                    $("#result").html("Too many data in " + $("#selectDB").val() + "." + $("#selectTable").val() + ", 50 firsts only are prompted");
                    return;
                }
                $("#tableData").append("<tr class='lineData' id='line" + i + "'>");

                $.each(line, function(j, data) {
                    if ($.isNumeric(j)) {
                        $("#line" + i + "").append("<th>" + data + "</th>");
                        j++;
                    }
                });

                $("#trColumn ").append("</tr>");
                i++;
            });

            if (response == "[]") {
                $("#result").html("Table " + $("#selectDB").val() + "." + $("#selectTable").val() + " has no data");
            } else {
                //$("#result").html("");
            }
        },

        error: function() {
            console.log(response);
            $("#result").html(response);
        }
    });


}

function showColumns() {
    $.ajax({
        type: "GET",
        url: "./Database/Tables/getColumns.php",
        data: {
            dbname: $("#selectDB").val(),
            tableName: $("#selectTable").val()
        },
        dataType: "html",
        success: function(response) {
            // console.log(response);
            result = JSON.parse(response);



            $("#trColumn th").remove();
            $.each(result, function(i, column) {
                $("#trColumn ").append("<th>" + column.COLUMN_NAME + "<br>[" + column.DATA_TYPE + "]</th>");
            });

            if (response == "[]") {
                $("#result").html("La table " + $("#selectTable").val() + " n'a aucune colonne");
            } else {
                $("#result").html("");
                showData();
            }
        },

        error: function() {
            $("#trColumn th").remove();
            console.log(response);
            $("#result").html(response);
        }
    });

}



function showTables() {
    $.ajax({
        type: "GET",
        url: "./Database/Tables/showTables.php",
        data: {
            dbname: $("#selectDB").val()
        },
        dataType: "html",
        success: function(response) {
            // console.log(response);
            $("#selectTable").empty();
            $.each(JSON.parse(response), function(i, table) {
                $("#selectTable").append("<option value='" + table + "'>" + table + "</option>");
            });
            showColumns();
        },
        error: function() {
            console.log(response);
            $("#result").html(response);
        }
    });
}

function showDB() {
    $.ajax({
        type: "GET",
        url: "./Database/Databases/showDatabase.php",

        success: function(response) {
            $("#selectDB").empty();
            $.each(JSON.parse(response), function(i, db) {
                $("#selectDB").append("<option value='" + db + "'>" + db + "</option>");
            });
            showTables();
        },
        error: function() {
            console.log(response);
            $("#result").html(response);
        }
    });
}