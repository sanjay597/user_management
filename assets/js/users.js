const base_url = $('#base_url').val();
function ajaxCall(url, data) {
    return new Promise((resolve, reject) => {
        $.ajax({
            type: "POST",
            url: base_url + url,
            data: data,
            dataType: 'JSON',
            beforeSend: function () { },
            complete: function () { },
            success: function (data) {
                return resolve(data);
            },
            error: function (e) {
                console.error(e);
            }
        });
    });
}

$(document).ready(function () {
    getUsers();
});

let getUsers = async () => {
    let url = 'getUsers';
    let data = {};
    let ajaxData = await ajaxCall(url, data);
    if (ajaxData.success == 1) {
        let tbodyData = ``;
        let k = 1;
        for (let i = 0; i < ajaxData.data.length; i++) {
            let userData = ajaxData.data[i];
            let editUserBtn = ajaxData.can_edit ? `<input type="button" class="btn btn-info" value="Edit" onclick="editUser(` + userData.id + `)"/>` : '';
            let deleteUserBtn = ajaxData.can_delete ? `<input type="button" class="btn btn-` + (userData.status == 1 ? 'success' : 'danger') + `" value="` + (userData.status == 1 ? 'Active' : 'Inactive') + `" onclick="deleteUser(` + userData.id + ',' + userData.status + `)"/>` : '';
            tbodyData += `<tr>`;
            tbodyData += `<td>` + k + `</td>`;
            tbodyData += `<td>` + userData.name + `</td>`;
            tbodyData += `<td>` + userData.mobile + `</td>`;
            tbodyData += `<td>` + userData.email + `</td>`;
            tbodyData += `<td>` + userData.address + `</td>`;
            tbodyData += `<td>` + userData.gender + `</td>`;
            tbodyData += `<td>` + userData.dob + `</td>`;
            tbodyData += `<td>` + (userData.status == 1 ? 'Active' : 'Inactive') + `</td>`;
            tbodyData += `<td>` + editUserBtn + ' | ' + deleteUserBtn + `</td>`;
            k++;
        }
        $('#users_data').html(tbodyData);
    }
}

let addUser = async () => {
    let name = $('#name').val();
    if (name.trim() == '') {
        alert('Please enter name');
        return;
    }
    let mobile = $('#mobile').val();
    if (mobile.trim() == '') {
        alert('Please enter mobile number');
        return;
    }
    let email = $('#email').val();
    if (email.trim() == '') {
        alert('Please enter email');
        return;
    }
    let address = $('#address').val();
    if (address.trim() == '') {
        alert('Please enter address');
        return;
    }
    let gender = $('#gender').val();
    if (gender.trim() == '') {
        alert('Please enter gender');
        return;
    }
    let dob = $('#dob').val();
    if (dob.trim() == '') {
        alert('Please enter dob');
        return;
    }
    let profile_pic = document.querySelector('#profile_pic').files[0];
    if (profile_pic == undefined) {
        alert('Please upload profile pic');
        return;
    }
    let signature = document.querySelector('#signature').files[0];
    if (signature == undefined) {
        alert('Please upload signature');
        return;
    }
    profile_pic_baseimg = await getBase64(profile_pic);
    signature_baseimg = await getBase64(signature);

    let url = 'addUser';
    let data = { name: name, mobile: mobile, email: email, address: address, gender: gender, dob: dob, profile_pic: profile_pic_baseimg, signature: signature_baseimg };
    let ajaxData = await ajaxCall(url, data);
    alert(ajaxData.message);
    window.location = base_url + ajaxData.page_url;
}

function getBase64(file) {
    return new Promise((resolve, reject) => {
        var reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onload = function () {
            return resolve(reader.result);
        };
        reader.onerror = function (error) {
            return reject('Error: ', error);
        };
    });
}

function editUser(id) {

}

let deleteUser = async (id, status) => {
    if (confirm('Are you sure, you want to ' + (status == 1 ? ' inactive ' : ' active ') + ' this user?')) {
        let url = 'deleteUser';
        let data = { id: id };
        let ajaxData = await ajaxCall(url, data);
        getUsers();
        alert(ajaxData.message);
    }
}