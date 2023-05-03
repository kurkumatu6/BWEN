let selectStatus = document.querySelector("[name = status]");
document.addEventListener("click", (event) => {
let status = selectStatus.value;
let reason_cancel = document.querySelector("[name = reason_cancel]").value;
let btn = document.querySelector("[name = saveBtn]");
console.log(status)
if(status == 3 && reason_cancel == "") {
btn.disabled = true;
} else{
btn.disabled = false;
}

})