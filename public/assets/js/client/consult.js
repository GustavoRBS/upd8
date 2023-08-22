function initial(appUrl) {
    $.ajax({
        url: appUrl + 'api/clients',
        type: 'GET',
        success: function (response) {
            $('#data-table tbody').empty();
            response.data.forEach(function (item) {
                var row = $('<tr>');
                route = appUrl + "client/register/edit/" + item.id;
                row.append($('<td class="text-center align-middle">').html('<a href="' + route + '"><button class="btn btn-success" type="button">Editar</button></a>'));
                row.append($('<td class="text-center align-middle">').html('<button class="btn btn-danger" onclick="deleteId(' + item.id + ',\'' + appUrl + '\')" type="button">Excluir</button>'));
                row.append($('<td>').text(item.name));
                row.append($('<td>').text(item.cpf));
                row.append($('<td>').text(item.date_of_birth));
                row.append($('<td>').text(item.state));
                row.append($('<td>').text(item.city));
                row.append($('<td>').text(item.gender));
                $('#data-table tbody').append(row);
            });

            var paginationLinks = '';
            for (var i = 1; i <= response.last_page; i++) {
                var activeClass = (response.current_page === i) ? 'active' : '';
                paginationLinks += '<li class="page-item ' + activeClass + '"><a class="page-link" href="#" onclick="pag(\'' + response.path + '?page=' + i + '\', \'GET\',\'' + appUrl + '\')">' + i + '</a></li>';
            }
            $('#pagination-links').html(paginationLinks);
        },
        error: function (xhr, status, error) {
            console.log(error);
        }
    });
}

function pag(route, type, appUrl) {
    var formData = $('#form').serialize();
    $.ajax({
        url: route,
        type: type,
        data: formData,
        success: function (response) {
            $('#data-table tbody').empty();
            response.data.forEach(function (item) {
                var row = $('<tr>');
                route = appUrl + "client/register/edit/" + item.id;
                row.append($('<td class="text-center align-middle">').html('<a href="' + route + '"><button class="btn btn-success" type="button">Editar</button></a>'));
                row.append($('<td class="text-center align-middle">').html('<button class="btn btn-danger" onclick="deleteId(' + item.id + ',\'' + appUrl + '\')" type="button">Excluir</button>'));
                row.append($('<td>').text(item.name));
                row.append($('<td>').text(item.cpf));
                row.append($('<td>').text(item.date_of_birth));
                row.append($('<td>').text(item.state));
                row.append($('<td>').text(item.city));
                row.append($('<td>').text(item.gender));
                $('#data-table tbody').append(row);
            });

            var paginationLinks = '';
            for (var i = 1; i <= response.last_page; i++) {
                var activeClass = (response.current_page === i) ? 'active' : '';
                paginationLinks += '<li class="page-item ' + activeClass + '"><a class="page-link" href="#" onclick="pag(\'' + response.path + '?page=' + i + '\',\'' + type + '\',\'' + appUrl + '\')">' + i + '</a></li>';
            }
            $('#pagination-links').html(paginationLinks);
        },
        error: function (xhr, status, error) {
            console.log(error);
        }
    });
}

function deleteId(id, appUrl) {
    Swal.fire({
        title: 'Você tem certeza que deseja deletar?',
        showDenyButton: true,
        denyButtonText: `Cancelar`,
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: appUrl + 'api/clients/' + id,
                type: 'DELETE',
                beforeSend: function (xhr) {
                    xhr.setRequestHeader('Authorization', 'Basic ' + btoa('gu.bailon@hotmail.com:Gu102030#'));
                },
                success: function (response) {
                    initial();
                    Swal.fire('Deletado!', '', 'success')
                },
                error: function (xhr, status, error) {
                    console.log(error);
                }
            });
        }
    })
}

function click(formData, appUrl) {
    $.ajax({
        url: appUrl + 'api/clients/search',
        type: 'POST',
        data: formData,
        success: function (response) {
            $('#data-table tbody').empty();
            response.data.forEach(function (item) {
                var row = $('<tr>');
                route = appUrl + "client/register/edit/" + item.id;
                row.append($('<td class="text-center align-middle">').html('<a href="' + route + '"><button class="btn btn-success" type="button">Editar</button></a>'));
                row.append($('<td class="text-center align-middle">').html('<button class="btn btn-danger" onclick="deleteId(' + item.id + ',\'' + appUrl + '\')" type="button">Excluir</button>'));
                row.append($('<td>').text(item.name));
                row.append($('<td>').text(item.cpf));
                row.append($('<td>').text(item.date_of_birth));
                row.append($('<td>').text(item.state));
                row.append($('<td>').text(item.city));
                row.append($('<td>').text(item.gender));
                $('#data-table tbody').append(row);
            });
            var paginationLinks = '';
            for (var i = 1; i <= response.last_page; i++) {
                var activeClass = (response.current_page === i) ? 'active' : '';
                paginationLinks += '<li class="page-item ' + activeClass + '"><a class="page-link" href="#" onclick="pag(\'' + response.path + '?page=' + i + '\', \'POST\',\'' + appUrl + '\')">' + i + '</a></li>';
            }
            $('#pagination-links').html(paginationLinks);
        },
        error: function (xhr, status, error) {
            console.log(error);
        }
    });
}