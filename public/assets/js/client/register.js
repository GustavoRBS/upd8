function form(formData, appUrl) {
    $.ajax({
        url: appUrl + 'api/clients',
        type: 'POST',
        data: formData,
        success: function (response) {
            Swal.fire(
                'Sucesso!',
                'Cliente cadastrado com sucesso!',
                'success'
            )
        },
        error: function (xhr, status, error) {
            console.log(error);
        }
    });
}

function getId(id, appUrl) {
    $.ajax({
        url: appUrl + 'api/clients/' + id,
        type: 'GET',
        success: function (response) {
            $('#cpf').val(response.data.id);
            $('#name').val(response.data.name);
            $('#date_of_birth').val(response.data.date_of_birth);
            $('#address').val(response.data.state);
            $('#state').val(response.data.state);
            $('#city').val(response.data.city);
            if (response.data.gender == 'M') {
                document.getElementById("genderM").checked = true;
            } else {
                document.getElementById("genderF").checked = true;
            }
        },
        error: function (xhr, status, error) {
            console.log(error);
        }
    });
}