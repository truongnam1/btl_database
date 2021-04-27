var formDatBan = document.querySelector('.form-datban');


function getKhuVuc() {
    var elementSelectKV = formDatBan.querySelector("#inputState");
    return elementSelectKV.value;
}
document.onload = function() { changeBranch(getKhuVuc()); };

function changeBranch(khu_vuc) {
    var elementInputBr = formDatBan.querySelectorAll('#inputBranch option')
    elementInputBr.forEach(branch => {
        if (branch.value.search(khu_vuc) == -1) {
            branch.setAttribute('hidden', '');
        } else {
            branch.removeAttribute("hidden");

        }
        branch.removeAttribute("selected");
    });
    formDatBan.querySelector("#inputBranch :not([hidden])").setAttribute("selected", "");
}

formDatBan.querySelector('#inputState').onchange = function() {
    changeBranch(getKhuVuc());

}

document.onload = function() {
    document.querySelector("#submit-form").addEventListener("click", function() {})
};


var eleInputFullName = document.querySelector("#inputfullname-down");

function validateName() {
    console.log("name:" + eleInputFullName.value);
    var name_regex = "^([a-zA-Z\xC0-\uFFFF]{1,10}[ \-\']{0,1}){1,8}$";
    var patt = new RegExp(name_regex);
    var res = patt.test(eleInputFullName.value);
    console.log("res: " + res);
    if (!res) {
        eleInputFullName.setCustomValidity("Tên người chỉ bao gồm các chữ cái");

    } else {
        eleInputFullName.setCustomValidity('');
    }


}
eleInputFullName.oninput = validateName;