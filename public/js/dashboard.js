/*-----------------------------------------
/   Custom Javascript
/-----------------------------------------*/
let membersPassField  = document.getElementById("memberPassField");
let btnUpdate = document.getElementById("btnUpdatePass");
function isEditable(){
    let isPasswordEditable = document.getElementById('txtPwEditable').checked;
    if( isPasswordEditable == true ){
        membersPassField.disabled   = false;
        btnUpdate.disabled = false;
    }else{
        membersPassField.disabled   = true;
        btnUpdate.disabled = true;
    }
}