var formDatBan = document.querySelector('.form-datban');

function getKhuVuc() {
    var elementSelectKV = formDatBan.querySelector("#inputState");
    return elementSelectKV.value;
}
console.log(getKhuVuc());
changeBranch(getKhuVuc());
console.log(formDatBan.querySelector("#inputBranch :not([hidden])"));

function changeBranch(khu_vuc) {
    var elementInputBr = formDatBan.querySelectorAll('#inputBranch option')
        // console.log(elementInputBr);
    elementInputBr.forEach(branch => {
        if (branch.value.search(khu_vuc) == -1) {
            branch.setAttribute('hidden', '');
        } else {
            branch.removeAttribute("hidden");

        }
        branch.removeAttribute("selected");
    });
    console.log(formDatBan.querySelector("#inputBranch :not([hidden])"));
    formDatBan.querySelector("#inputBranch :not([hidden])").setAttribute("selected", "");
}

formDatBan.querySelector('#inputState').onchange = function() {
    changeBranch(getKhuVuc());

}


document.querySelector("#submit-form").addEventListener("click", function() {
    console.log("click submit")
})