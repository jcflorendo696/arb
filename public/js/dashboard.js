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



let btnUpdateRole = document.getElementsByClassName('btnUpdateRole');
let btnUpdateRoleArr = Array.from(btnUpdateRole);

btnUpdateRoleArr.map( item => {
    let btn = document.getElementById(item.id);
    btn.addEventListener('click', function(e){
        e.preventDefault();
        ajaxUpdateRole(item.value);
    });
});


function ajaxUpdateRole(role_id){
    let csrf_token = $('meta[name="csrf-token"]').attr('content');
    let role = document.getElementById('name_' + role_id);
    let desc = document.getElementById('desc_' + role_id);

    let xhr = new XMLHttpRequest();

    xhr.open('POST','/role/update', true);
    
    //xhr.setRequestHeader('Content-type','application/x-www-form-urlencoded');
    xhr.setRequestHeader('Content-type','application/json');
    xhr.setRequestHeader('X-CSRF-TOKEN', csrf_token);

    xhr.onload = function(){
        if( this.status == 200 ){
            let data = JSON.parse(this.responseText);
            
            let updatedRole = document.getElementById('role_' + role_id);
            let updatedDesc = document.getElementById('description_' + role_id);

            updatedRole.innerHTML = data.name;
            updatedDesc.innerHTML = data.desc;

            $('#update-modal' + role_id).modal('hide');  //jquery yuck!
            
        }
    }

    let data = {
        status : 'success',
        'name' : role.value,
        'desc' : desc.value,
        'id' : role_id
    }

    console.log( JSON.stringify(data) ); 

    xhr.send( JSON.stringify(data) );
}

