var dataForm;
var table;

function postQueryRowForm(idForm) {
    $.ajax({
        url: "..\\back_end\\dashboard\\table-customer.php",
        type: "post",
        dataType: "text",
        data: { idForm: idForm },
        success: function(result) {
            // console.log(result)
            var objRows = JSON.parse(result);

            // console.log(objRows)
            $.each(objRows, function(keyRow, rowItem) {
                // row.append($("<td></td>").text(val));

                var row = $("<tr></ttr>");
                $.each(rowItem, function(keyTD, val) {
                    if (keyTD != "idForm") {
                        row.append($("<td></td>").text(val));
                    }

                });
                table.row.add(row).draw();

            });
        }
    });
}

function postQueryArrayIdForm() {
    $.ajax({
        url: "..\\back_end\\dashboard\\table-customer.php",
        type: "post",
        dataType: "text",
        data: dataForm,
        success: function(result) {
            var arrayID = [];

            function chunkArray(myArray, chunk_size) {
                var index = 0;
                var arrayLength = myArray.length;
                var tempArray = [];

                for (index = 0; index < arrayLength; index += chunk_size) {
                    myChunk = myArray.slice(index, index + chunk_size);
                    // Do something if you want with the group
                    tempArray.push(myChunk);
                }

                return tempArray;
            }

            // cái này để chia nhỏ dữ liệu post lên, nhiều quá post bị lỗi
            var arrayID = chunkArray(result.split(','), 100);

            $.each(arrayID, function(key, idForm) {
                postQueryRowForm(idForm);
            });
        }
    });
}



$(document).ready(function() {
    table = $('#dataTable').DataTable({

    });

    $("#btn-query").click(function() {

        // var nameDateForm = $("#dateForm").attr('dateForm');
        // var nameDateTo = $("#dateTo").attr('dateTo');
        // var nameTypeStatus = $("#type-status").attr('type-status');
        dataForm = {
            dateForm: $("#dateForm").val(),
            dateTo: $("#dateForm").val(),
            "type-status": $("#type-status").val()

        }
        table.clear();

        postQueryArrayIdForm()
    })





});