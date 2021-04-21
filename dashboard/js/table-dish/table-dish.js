var data;
var table;


function postQueryRowDish(idDish) {
    var array;
    $.ajax({
        url: "..\\back_end\\dashboard\\table-dish.php",
        type: "post",
        dataType: "text",
        data: { idDish: idDish },
        success: function(result) {
            // console.log(result)
            var objRows = JSON.parse(result);

            // console.log(objRows)
            $.each(objRows, function(keyRow, rowItem) {
                // array.push(rowItem);
                table.row.add(rowItem);
            });
            table.draw();
        }
    });
    // return array;

}

function postQueryArrayIdDish() {
    $.ajax({
        url: "..\\back_end\\dashboard\\table-dish.php",
        type: "post",
        dataType: "text",
        data: { dataDish: "all" },
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
            // console.log(arrayID);
            // console.log(JSON.parse(result).length);
            $.each(arrayID, function(key, idDish) {
                postQueryRowDish(idDish);
            });
        }
    });
}

function setDataFormDish(data) {
    // Tên món ăn Loại concept Loại combo Mô tả Link ảnh
    $("#dish-name").val(data.dishName);
    $("#concept-name option").each(function(index, val) {
        // console.log(val.innerText.toLowerCase() + "\t" + data.conceptName.toLowerCase())
        // console.log(val.innerText.toLowerCase() == data.conceptName.toLowerCase())
        if (val.innerText.toLowerCase() == data.conceptName.toLowerCase()) {
            val.setAttribute("selected", "");
        }
    })

    if (data.comboName == "no") {
        $("#combo-name option[value=no]").prop("selected", true);
    } else {
        $("#combo-name option").each(function(index, val) {
            // console.log(val.innerText.toLowerCase() + "\t" + data.comboName.toLowerCase())
            // console.log(val.innerText.toLowerCase() == data.comboName.toLowerCase())
            if (val.innerText.toLowerCase() == data.comboName.toLowerCase()) {
                val.setAttribute("selected", "");
            }
        })
    }
    $("#describe").val(data.describe);
    $("#image-link").val(data.imageLink);
}

function updateDataFormDishTable(dataForm) {
    var element = $('#data-table-dish tbody tr.selected')
    var elementRow = element[0];
    var dataRowOld = table.row(elementRow).data();
    // console.log(table.row(elementRow).data());
    dataForm.push({
        "name": "id-dish",
        "value": dataRowOld.idDish,
    });
    console.log(dataForm);

    $.ajax({
        url: "..\\back_end\\dashboard\\table-dish.php",
        type: "post",
        dataType: "text",
        data: { updateDish: dataForm },
        success: function(result) {
            var objRow = JSON.parse(result);
            console.log("data tra ve");

            console.log(objRow);
            table.row(elementRow).data(objRow);
        }
    });
}





$(document).ready(function() {

    table = $('#data-table-dish').DataTable({
        // autoFill: true,
        columns: [
            { data: 'dishName' },
            { data: 'conceptName' },
            { data: 'comboName' },
            { data: 'describe' },
            { data: 'imageLink' },
            { data: 'price' }
        ]
    });

    $(document).ajaxStart(function() {
        $("#btn-update-table").addClass("disabled");
        $("#btn-update-table").html('<span class="spinner-border spinner-border-sm"></span> Loading');
    });

    $(document).ajaxComplete(function() {
        $("#btn-update-table").removeClass("disabled");
        $("#btn-update-table").html('Cập nhật');
    });
    postQueryArrayIdDish();

    $("#btn-update-table").click(function() {
        $("#btn-toggle-edit").prop("disabled", true);
        console.log("click update")
        table.clear();
        postQueryArrayIdDish();
    })

    $("#btn-toggle-edit").prop("disabled", true);

    $('#data-table-dish tbody').on('click', 'tr', function() {
        var rowClicked = this;

        $("#data-table-dish tbody tr").each(function(index, val) {
            // val.classList.remove("selected");
            if (rowClicked !== val) {
                val.classList.remove("selected");
                // this.removeClass("selected");
            }
        })

        var data = table.row(this).data();
        $(this).toggleClass('selected');
        if ($(this).attr("class").search("selected") >= 0) {
            $("#btn-toggle-edit").prop("disabled", false);
        } else {
            $("#btn-toggle-edit").prop("disabled", true);
        }
        console.log("click ", this);
        console.log("data row clicked");
        console.log(data);

        setDataFormDish(data);
    });

    $("#btn-toggle-edit").click(function() {

    })

    $("#btn-update-dish").click(function() {
        console.log("update dish");
        // form-dish
        var dataFormDish = $('#form-dish form').serializeArray();
        // console.log(dataFormDish);
        // console.log("data day len");
        updateDataFormDishTable(dataFormDish);

    })



});