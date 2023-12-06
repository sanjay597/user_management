// const base_url = $('#base_url').val();

function ajaxCall(url, data) {
    return new Promise((resolve, reject) => {
        $.ajax({
            type: "POST",
            url: url,
            data: data,
            dataType: 'JSON',
            beforeSend: function () {},
            complete: function () {},
            success: function (data) {
                return resolve(data);
            },
            error: function (e) {
                console.error(e);
            }
        });
    });
}

let login = async () => {
    let email = $('#email').val();
    if(email.trim() == '') {
        alert('Please enter email');
        return;
    }
    let password = $('#password').val();
    if(password.trim() == '') {
        alert('Please enter password');
        return;
    }

    let url = 'login';
    let data = { email : email, password : password };
    let ajaxData = await ajaxCall(url, data);
    if(ajaxData.success == 1) {
        window.location = ajaxData.data['dashboard_page'];
    } else {
        alert(ajaxData.message);
    }
}