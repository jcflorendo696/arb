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


/*-----------------------------------------
/   Update Roles - AJAX
/-----------------------------------------*/
let btnUpdateRole = document.getElementsByClassName('btnUpdateRole');
let btnUpdateRoleArr = Array.from(btnUpdateRole);
let csrf_token = $('meta[name="csrf-token"]').attr('content');

btnUpdateRoleArr.map( item => {
    let btn = document.getElementById(item.id);
    btn.addEventListener('click', function(e){
        e.preventDefault();
        ajaxUpdateRole(item.value, csrf_token);
    });
});


function ajaxUpdateRole(role_id, csrf_token){    
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

    //console.log( JSON.stringify(data) ); 

    xhr.send( JSON.stringify(data) );
}


/*-----------------------------------------
/   Update User - AJAX
/-----------------------------------------*/
let btnUpdateUser = document.getElementsByClassName('btnUpdateUser');
let btnUpdateArr = Array.from(btnUpdateUser);



btnUpdateArr.map( item => {
    let btn = document.getElementById(item.id);
    btn.addEventListener('click', function(e){
        e.preventDefault();
        ajaxUpdateUser(item.value, csrf_token);


    });

});

function ajaxUpdateUser(user_id, csrf_token){
    let name    =   document.getElementById('modal_name_' + user_id);
    let email   =   document.getElementById('modal_email_' + user_id);
    let role    =   document.getElementById('modal_roleDropdown_' + user_id);
    

    let xhr = new XMLHttpRequest();

    xhr.open('POST','/user/update', true);
    
    xhr.setRequestHeader('Content-type','application/json');
    xhr.setRequestHeader('X-CSRF-TOKEN', csrf_token);

    xhr.onload = function(){
        if( this.status == 200 ){
            let data = JSON.parse(this.responseText);
            
            console.log(data);

            let updatedName = document.getElementById('name_' + user_id);
            updatedName.innerHTML =  data.name;
            let updatedEmail = document.getElementById('email_' + user_id);
            updatedEmail.innerHTML =  "<a href='#'>" + data.email + "</a>";
            let updatedRole = document.getElementById('role_' + user_id);
            updatedRole.innerHTML =  data.role_name;


            $('#update-modal' + user_id).modal('hide');
        }
    };

    let data = {
        'id' : user_id,
        'name' : name.value,
        'email' : email.value,
        'role' : role.value,
        'role_name' : role.options[role.selectedIndex].text
    }

    xhr.send( JSON.stringify(data) );
}