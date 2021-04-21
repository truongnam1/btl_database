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
                // table.row.add(rowItem).draw();
                table.row.add(rowItem);
                // table.draw();
            });
            table.draw();
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
            var arrayID = chunkArray(JSON.parse(result), 100);
            console.log(arrayID);
            // console.log(JSON.parse(result).length);

            $.each(arrayID, function(key, idForm) {
                postQueryRowForm(idForm);
            });

        }
    });
}

function setDataFormCustomer(data) {
    $("#fullName").val(data.fullName);
    $("#email").val(data.email);
    $("#phoneNumber").val(data.phoneNumber);
    $("#amountPeople").val(data.amountPeople);
    $("#branch").val(data.branch);
    $("#tables").val(data.tables.toString());
    // $("#timestampComeTo").val(timestampComeTo);
    // 2018-06-12 11:30PM
    // 2018-06-12T18:30"
    $("#datetimeToCome").attr("value", data.dateToCome + "T" + data.timeToCome);
    console.log(data.dateToCome + "T" + data.timeToCome)
    $("#dateOrder").val(data.dateOrder);
    $("#note").val(data.note);
    $("#status option").each(function(index, val) {
        // console.log("inner:" + val.innerText)
        if (data.status.toLowerCase() == val.innerText.toLowerCase()) {
            // console.log("status:" + val.innerText)
            val.setAttribute("selected", "");
        }
    })
}

function disabledInput() {
    $("#fullName").prop('disabled', true);
    $("#email").prop('disabled', true);
    $("#phoneNumber").prop('disabled', true);
    $("#amountPeople").prop('disabled', true);
    $("#branch").prop('disabled', true);
    $("#tables").prop('disabled', true);
    $("#datetimeToCome").prop('disabled', true);
    $("#dateOrder").prop('disabled', true);
    $("#note").prop('disabled', true);
    // $("#status option")
}

function updateDataFormCustomerDB(dataRow) {
    // console.log(dataRow);
    $.ajax({
        url: "..\\back_end\\dashboard\\table-customer.php",
        type: "post",
        dataType: "text",
        data: { "update-row": dataRow },
        success: function(result) {

        }
    });
}

function updateDataFormCustomerTable() {
    var element = $('#dataTable tbody tr.selected')
    var elementRow = element[0];
    var dataRowOld = table.row(elementRow).data();

    var dataRowNew = dataRowOld;
    dataRowNew.status = $("#status").val();
    table.row(elementRow).data(dataRowNew);

    console.log("data update");
    console.log(dataRowNew);
    updateDataFormCustomerDB(dataRowNew);
}

$(document).ready(function() {
    table = $('#dataTable').DataTable({
        select: true,
        columns: [
            { data: 'fullName' },
            { data: 'email' },
            { data: 'phoneNumber' },
            { data: 'amountPeople' },
            { data: 'branch' },
            { data: 'tables' },
            {
                data: null,
                render: function(data, type, row) {
                    return data.dateToCome + ' ' + data.timeToCome;
                }
            },

            { data: 'dateOrder' },
            { data: 'note' },
            { data: 'status' },
        ]

    });

    $(document).ajaxStart(function() {
        $("#btn-query").addClass("disabled");
        $("#btn-query").html('<span class="spinner-border spinner-border-sm"></span> Loading');
    });

    $(document).ajaxComplete(function() {
        $("#btn-query").removeClass("disabled");
        $("#btn-query").html('Truy vấn');
    });

    $("#toggle-form-edit").prop("disabled", true);
    $("#toggle-form-edit").click(function() {
        console.log("toggle")
        disabledInput();
    })

    $('#dataTable tbody').on('click', 'tr', function() {

        var rowClicked = this;

        $("#dataTable tbody tr").each(function(index, val) {
            // val.classList.remove("selected");
            if (rowClicked !== val) {
                val.classList.remove("selected");
                // this.removeClass("selected");
            }
        })

        var data = table.row(this).data();
        $(this).toggleClass('selected');
        if ($(this).attr("class").search("selected") >= 0) {
            $("#toggle-form-edit").prop("disabled", false);
        } else {
            $("#toggle-form-edit").prop("disabled", true);
        }
        console.log("click ", this);
        console.log("data row clicked");
        console.log(data);

        setDataFormCustomer(data);
    });

    $("#btn-query").click(function() {
        $("#toggle-form-edit").prop("disabled", true);
        dataForm = {
            dateForm: $("#dateForm").val(),
            dateTo: $("#dateTo").val(),
            "type-status": $("#type-status").val()
        }
        table.clear();
        postQueryArrayIdForm();


    })

    $("#btn-update").click(function() {
        updateDataFormCustomerTable()
    })
});