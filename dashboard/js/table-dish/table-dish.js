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
            var arrayID = chunkArray(JSON.parse(result), 10);
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

    try {
        // var arrayEleOption = $("#combo-name option");
        // console.log("length combo: " + data.comboName.length);
        // console.log(data.comboName[0]);

        if (data.comboName.indexOf("no") != -1) {
            console.log("check no");
            $("#combo-name option[value=no]")[0].setAttribute("selected", "");
            // $('#combo-name').selectpicker('val', 'no');
        } else {
            console.log("check else");

            data.comboName.forEach(itemNameCombo => {
                $("#combo-name option").each(function(index, val) {
                    if (val.innerText.toLowerCase() == itemNameCombo.toLowerCase()) {
                        val.setAttribute("selected", "");
                    }
                })
            });


        }
        $('#combo-name').selectpicker('render');
        // checkSelectedCombo();
    } catch (error) {
        console.log(error);
    }


    $("#describe").val(data.describe);
    $("#image-link").val(data.imageLink);
    $("#dish-price").val(data.price);
}

function updateDataFormDishTable(dataForm) {
    var element = $('#data-table-dish tbody tr.selected')
    var elementRow = element[0];
    var dataRowOld = table.row(elementRow).data();
    // console.log(table.row(elementRow).data());

    var data = {
        "dish-name": $("#dish-name").val(),
        "concept-name": $("#concept-name").val(),
        "combo-id": $("#combo-name").val(),
        "describe": $("#describe").val(),
        "image-link": $("#image-link").val(),
        "dish-price": $("#dish-price").val(),
        "id-dish": dataRowOld.idDish
    }


    // dataForm.push({
    //     "name": "id-dish",
    //     "value": dataRowOld.idDish,
    // });

    console.log(data);

    $.ajax({
        url: "..\\back_end\\dashboard\\table-dish.php",
        type: "post",
        dataType: "text",
        data: { updateDish: data },
        success: function(result) {
            var objRow = JSON.parse(result);
            console.log("data tra ve");

            console.log(objRow);
            table.row(elementRow).data(objRow);
        }
    });
}

function checkSelectedCombo() {
    console.log("length option: " + $("#combo-name option[selected]").length)
    console.log("name option: " + $("#combo-name option[selected]"));
    $("#combo-name option[selected]").each(function(index, val) {
        console.log(val.value);
    })

    var lenOptionselected = $("#combo-name option[selected]").length;
    var elesOptionselected = $("#combo-name option[selected]");

    if (lenOptionselected == 1 && $(elesOptionselected)[0].getAttribute("value") == "no") {
        console.log("check no")
        $("#combo-name option").each(function(index, val) {
                // console.log(val);
                if (val.getAttribute("value") != "no") {
                    val.setAttribute("disabled", "");
                    val.removeAttribute("selected");
                }
            })
            // $('#combo-name').selectpicker('val', ['101', '102']);
            // $('#combo-name').selectpicker('val', '102');


    } else if (lenOptionselected == 0) {
        $("#combo-name option").removeAttr("disabled");
    }


    // $('#combo-name').selectpicker('render');
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

        // reset selected
        $("#combo-name option").each(function(index, val) {
            val.removeAttribute("selected");
        })
        $("#combo-name").selectpicker('deselectAll');
        setDataFormDish(data);
    });

    $("#btn-toggle-edit").click(function() {

    })

    $("#btn-update-dish").click(function() {
        console.log("update dish");
        // form-dish
        var dataFormDish = $('#form-dish form').serializeArray();
        console.log(dataFormDish);
        console.log("data day len");


        updateDataFormDishTable(dataFormDish);

    })

    $(function() {
        $('#combo-name').selectpicker();

    });
    if (/Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent)) {
        $('.selectpicker').selectpicker('mobile');
    }


    // $(".dropdown-menu.show").click(function() {
    //     console.log("click combo name");
    //     checkSelectedCombo();
    // })

    $('#combo-name').on('changed.bs.select', function(e, clickedIndex, isSelected, previousValue) {

        // console.log(e)
        // console.log(clickedIndex)

        // console.log(isSelected)

        // console.log(previousValue)
        // checkSelectedCombo();

    });






});