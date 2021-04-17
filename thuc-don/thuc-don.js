var elementConceptType = document.querySelector("#concept-type");
var elementComboBuffet = document.querySelector("#combo-buffet");
var elementPriceRange = document.querySelector("#price-range");

var conceptSelected;
var typeBuffet;
var minPrice;
var maxPrice;

var arrayName = [];
if (window.location.href.split("?").length > 1) {
    arrayName = decodeURI(window.location.href).split("?")[1].split("&");
}

elementConceptType.querySelectorAll("input").forEach((element) => {
    if (element.checked) {
        conceptSelected = element.value;
        // break;
    }
});

elementComboBuffet.querySelectorAll("input").forEach((element) => {
    if (element.checked) {
        typeBuffet = element.value;
        // break;
    }
});

function showURL(array) {
    var url = window.location.href.split("?")[0];
    if (array.length >= 1) {
        url += "?";

        array.forEach(function(val, index) {
            if (index > 0) {
                // console.log('index url:' + index);
                url += "&";
            }
            url += val;
            // console.log("index = " + index + " url = " + encodeURI(url));
        });
    }
    console.log("url = " + encodeURI(url));
    window.location.assign(encodeURI(url));
}

// nếu trùng trả về true
function checkDuplicateArr(array, item) {
    console.log("tim trung lap");
    var indexItem = -1;
    array.find(function(value, index) {
        console.log("index:" + index + "value:" + value);
        if (value.search(item) >= 0) {
            indexItem = index;
        }
        return value.search(item) >= 0;
    });
    return indexItem;
}

console.log(elementPriceRange.querySelector("#minPrice").value);
minPrice =
    elementPriceRange.querySelector("#minPrice").value == null ?
    "" :
    elementPriceRange.querySelector("#minPrice").value;
maxPrice =
    elementPriceRange.querySelector("#maxPrice").value == null ?
    "" :
    elementPriceRange.querySelector("#maxPrice").value;

elementConceptType.querySelectorAll("input").forEach((eleInput) => {
    eleInput.addEventListener("change", function() {
        var indexName = checkDuplicateArr(arrayName, eleInput.name);

        console.log("index1 = " + indexName + "  inputname = " + eleInput.name);
        // nếu k có thì cần thêm vào
        if (eleInput.checked && indexName < 0) {
            console.log("them");
            arrayName.push(eleInput.name + "=" + eleInput.value);
        } else if (eleInput.checked && indexName >= 0) {
            // nếu có và cần sửa lại value
            console.log("sua cu " + conceptSelected + "    moi: " + eleInput.value);
            arrayName[indexName] = arrayName[indexName].replace(
                conceptSelected,
                eleInput.value
            );
        }
        console.log(arrayName);
        showURL(arrayName);
    });
});



elementComboBuffet.querySelectorAll("input").forEach((eleInput) => {
    eleInput.addEventListener("change", function() {
        console.log(arrayName);
        var indexName = checkDuplicateArr(arrayName, eleInput.name);
        console.log("index2 = " + indexName);
        if (eleInput.checked && indexName < 0) {
            arrayName.push(eleInput.name + "=" + eleInput.value);
        } else if (eleInput.checked && indexName >= 0) {
            arrayName[indexName] = arrayName[indexName].replace(
                typeBuffet,
                eleInput.value
            );
        }
        showURL(arrayName);
    });
});

elementPriceRange.querySelector("button").onclick = function() {
    var eleMinPrice = elementPriceRange.querySelector("#minPrice");
    var eleMaxPrice = elementPriceRange.querySelector("#maxPrice");
    var indexMinPrice = checkDuplicateArr(arrayName, eleMinPrice.name);
    // console.log(arrayName);
    // console.log('indexMin = ' + indexMinPrice);

    var indexMaxPrice = checkDuplicateArr(arrayName, eleMaxPrice.name);
    // console.log(arrayName);
    // console.log('indexMax = ' + indexMaxPrice);

    // min
    if (indexMinPrice < 0 && !(eleMinPrice.value == "")) {
        arrayName.push(eleMinPrice.name + "=" + eleMinPrice.value);
    } else if (indexMinPrice >= 0) {
        arrayName[indexMinPrice] = arrayName[indexMinPrice].replace(
            minPrice,
            eleMinPrice.value
        );
    }
    // showURL(arrayName);

    // max
    if (indexMaxPrice < 0 && !(eleMaxPrice.value == "")) {
        arrayName.push(eleMaxPrice.name + "=" + eleMaxPrice.value);
    } else if (indexMaxPrice >= 0) {
        arrayName[indexMaxPrice] = arrayName[indexMaxPrice].replace(
            maxPrice,
            eleMaxPrice.value
        );
    }
    showURL(arrayName);
};