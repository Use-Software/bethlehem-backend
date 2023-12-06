<!--
=========================================================
 Paper Dashboard - v2.0.0
=========================================================

 Product Page: https://www.creative-tim.com/product/paper-dashboard
 Copyright 2019 Creative Tim (https://www.creative-tim.com)
 UPDIVISION (https://updivision.com)
 Licensed under MIT (https://github.com/creativetimofficial/paper-dashboard/blob/master/LICENSE)

 Coded by Creative Tim

=========================================================

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('paper') }}/img/apple-icon.png">
    <link rel="icon" type="image/png" href="{{ asset('paper') }}/img/logo-ib.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">


    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <!-- CSS Files -->
    <link href="{{ asset('paper') }}/css/bootstrap.min.css" rel="stylesheet" />
    <link href="{{ asset('paper') }}/css/paper-dashboard.css?v=2.0.0" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{ asset('paper') }}/demo/demo.css" rel="stylesheet" />
    <link href="{{ asset('paper') }}/css/style_emails.css" rel="stylesheet" />


    <!-- End Google Tag Manager -->

    @extends('layouts.app', [
        'class' => '',
        'elementActive' => 'GerenEventos',
    ])


    @include('pages.edit-membro')
    @include('pages.ver-membro')




<body>





    <div class="main-panel">

        <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
            <div class="container-fluid">

                <div class="collapse navbar-collapse justify-content-end" id="navigation">

                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link btn-magnify">
                                <i class="nc-icon nc-button-power"
                                    onclick="document.getElementById('formLogOut').submit();"></i>
                                <form class="dropdown-item" action="{{ route('logout') }}" id="formLogOut"
                                    method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </a>
                        </li>


                    </ul>
                </div>
            </div>
        </nav>
        <!-- Button trigger modal -->


        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">E-mails selecionados</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div id="boxselectemails">


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="container-fluid mt--7">
                <div class="row">
                    <div class="col">
                        <div class="card shadow">
                            <div class="card-header border-0">
                                <div
                                    class="container align-items-center d-flex flex-column justify-content-center justify-content-center align-items-center">
                                    <div class="container text-center">
                                        <h4>Envie e-mails, faça comunicados !</h4>
                                        <div
                                            class="d-flex justify-content-center flex-column container align-items-center">
                                            <div class="d-flex flex-column container">
                                                <label for="search">Digite o E-mail / Nome</label>
                                                <input type="text" class="mb-3" id="search"
                                                    placeholder="Digite o E-mail / Nome">
                                            </div>
                                            <div id="toolbar"
                                                class="d-flex flex-row justify-content-center align-items-center">
                                                <div id="act_adicionaremail" class="d-flex flex-column-reverse boxfer">
                                                    <p>Adicionar<br>E-mail</p>
                                                    <i class="nc-icon nc-email-85"></i>
                                                </div>
                                                <div id="act_inserirtodos" class="d-flex flex-column-reverse boxfer">
                                                    <p>Inserir<br>todos</p>
                                                    <i class="nc-icon nc-cloud-upload-94"></i>
                                                </div>
                                                <div id="act_limpartodos" class="d-flex flex-column-reverse boxfer">
                                                    <p>Limpar<br>todos</p>
                                                    <i class="nc-icon nc-simple-remove"></i>
                                                </div>
                                                <div class="d-flex flex-column-reverse boxfer">
                                                    <p>Criar<br>Lista</p>
                                                    <i class="nc-icon nc-simple-add"></i>
                                                </div>
                                                <div id="act_verlistas"class="d-flex flex-column-reverse boxfer">
                                                    <p>Ver<br>Listas</p>
                                                    <i class="nc-icon nc-single-copy-04"></i>
                                                </div>

                                            </div>


                                            <div id="profile-container" class="d-flex"></div>

                                            <div class="d-flex" onclick="Atualizaeabremodal()" data-toggle="modal"
                                                data-target="#exampleModalCenter">
                                                <p id="countemail" style="border-radius: 5px 0px 0px 5px;"
                                                    class="see">0 E-mails adicionados</p>
                                                <p class="see seehover"
                                                    style="border-radius:0px 5px 5px 0px; background: #59595994; cursor: pointer;">
                                                    <img style="width:20px;" src="images/eye.png" alt="">
                                                </p>
                                            </div>
                                            <div id="selectedemails" style="    flex-wrap: wrap;"
                                                class="d-flex container">
                                            </div>


                                        </div>
                                    </div>
                                    <textarea style="border-radius: 5px;" class="mt-3" name="" id="" cols="50" rows="10"></textarea>

                                    <button class="mt-5 mb-5 btn" onclick="submitemail();">Enviar</button>
                                </div>
                            </div>



                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
    </div>


    <script>
        // Função para exibir notificação
        function notify(data) {
            // Extrai o primeiro elemento do array (se houver)
            data = data[0];

            // Variáveis de elementos da notificação
            var toast = document.querySelector(".toast");
            var closeIcon = document.querySelector(".close");
            var progress = document.querySelector(".progress");
            var statustext = document.querySelector(".statustext");
            var contenttext = document.querySelector(".contenttext");

            // Define o conteúdo da notificação
            contenttext.innerHTML = data.texto;
            statustext.innerHTML = data.sucesso ? 'Sucesso' : 'Erro';

            // Temporizadores para ocultar a notificação após alguns segundos
            var timer1 = setTimeout(() => {
                toast.classList.remove("active");
            }, 5000);

            var timer2 = setTimeout(() => {
                progress.classList.remove("active");
            }, 5300);

            // Console.log para depuração
            console.log(data);
        }

        // Variáveis globais
        var act_adicionaremail = $('#act_adicionaremail');
        var act_inserirtodos = $('#act_inserirtodos');
        var act_limpartodos = $('#act_limpartodos');
        var act_criarlista = $('#act_criarlista');
        var act_verlistas = $('#act_verlistas');
        var countemail = $('#countemail');
        var searchValue = $('#search').val();

        var emails = [];
        var sem_emails = [];
        // Função para adicionar emails à lista
        function addEmailToList(user) {
            if (!emails.includes(user.email)) {
                emails.push(user.email);
            }
        }

        // Função para atualizar a contagem de emails
        function updateEmailCount() {
            countemail.text(emails.length + ' E-mails adicionados');
        }

        // Evento de clique no botão "Inserir Todos"
        act_inserirtodos.on('click', function() {
            $.get('/getemailsall', function(data) {
                data.forEach(function(user) {
                    addtolist(user.email);
                });
                updateEmailCount();
            });
        });






        // Evento de clique no botão "Limpar Todos"
        act_limpartodos.on('click', function() {
            emails = [];
            $('.cardemails').remove();
            updateEmailCount();
        });



        act_adicionaremail.on('click', function() {
            var searchValue = $('#search').val();
            if (isValidEmail(searchValue) && !emails.includes(searchValue)) {
                var user = {
                    "nome_completo": null,
                    "email": searchValue,
                    "imagem": null
                };
                emails.push(searchValue);
                sem_emails.push(user);
                updateEmailCount();
                addSelectedCard(user);

            } else {
                alert('O valor não é um e-mail válido.');
            }
        });
        $(document).ready(function() {
            var searchInput = $('#search');
            var usersSelect = $('#usersSelect');
            var selectedemails = $('#selectedemails');

            searchInput.on('input', function() {
                var searchValue = $(this).val();
                $('.profile-card').remove();

                $.get('/getemails?search=' + searchValue, function(data) {
                    data.forEach(function(user) {
                        $('.profile-card').remove();

                        // Adiciona os novos perfis
                        data.forEach(function(user) {
                            addProfileCard(user);
                            if (searchValue == '') {
                                $('.profile-card').remove();

                            }
                        });
                    });
                });
            });

            usersSelect.on('change', function() {
                // Obtém o valor selecionado
                var selectedValue = usersSelect.val();

                // Verifica se o valor já está no array
                if (!emails.includes(selectedValue) && selectedValue.trim() !== '') {
                    // Adiciona o valor ao array de emails
                    emails.push(selectedValue);

                    // Registra no console.log
                    console.log('Seleção do usuário:', emails);

                    // Criação de elementos HTML
                    var divElement = $('<div>').addClass('cardemails');
                    var removeButton = $('<span>').addClass('nc-icon nc-simple-remove').css({
                        'color': 'red',
                        'cursor': 'pointer'
                    });

                    // Adiciona evento de clique ao botão de remoção
                    removeButton.on('click', function() {
                        divElement.remove();
                        var index = emails.indexOf(selectedValue);
                        if (index !== -1) {
                            // Remove o email do array
                            emails.splice(index, 1);
                        }
                        updateEmailCount();
                        console.log('E-mail removido:', selectedValue);
                    });

                    // Listar na tela
                    selectedemails.append(divElement.text(selectedValue).append(removeButton));
                    updateEmailCount();
                } else {
                    console.log('O valor já está no array:', selectedValue);
                }
            });

            // Função para atualizar a contagem de emails

        });


        ////////////// FUNÇÕES DE SUPORTE /////////////////////

        function isValidEmail(email) {
            // Expressão regular para verificar se o valor é um e-mail
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailRegex.test(email);
        }

        function addtolist(email) {
            if (!emails.includes(email)) {
                emails.push(email);
                updateEmailCount();
            }
        }

        function removetolist(email) {
            var index = emails.indexOf(email);
            console.log(email);
            if (index !== -1) {
                // Remove o email do array
                emails.splice(index, 1);
                sem_emails.splice(index, 1);

                // Remove o elemento correspondente pelo ID escapado
                $("#profile-" + $.escapeSelector(email)).remove();
            }
            updateEmailCount();
        }

        function addProfileCard(user) {
            // Código HTML que você deseja adicionar
            var profileCardHTML = ` <div class="profile-card" onclick="addtolist('${user.email}')">
        <div class="profile">
            <div class="avatar">
                <img src="fotos/${user.imagem}" alt="">
            </div>
            <div class="profile-info">
                <span>${user.nome_completo}</span>
                <p>${user.email}</p>
            </div>
        </div>
    </div>`;
            // Adiciona o conteúdo HTML ao container
            document.getElementById("profile-container").insertAdjacentHTML('beforeend', profileCardHTML);

        }


        function Atualizaeabremodal() {
            $('#boxselectemails .profile').remove();
            $.get('/getemailsall', function(data) {
                data.forEach(function(user) {
                    if (emails.includes(user.email)) {
                        addSelectedCard(user);
                    }
                });
                sem_emails.forEach(function(user) {
                    addSelectedCard(user);

                });
                console.log(emails);
                console.log(sem_emails);


            });
        }

        function addSelectedCard(user) {
            // Cria o elemento jQuery com o HTML desejado
            if (user.imagem == null) {
                user.imagem = 'not-user.png';
            } else if (user.nome_completo == null) {
                user.nome_completo = 'Não cadastrado';

            }

            console.log(user);
            var $selectedCard = $(
                `
        <div class="profile d-flex justify-content-between" id="profile-${user.email}">
            <div class="d-flex justify-content-center align-items-center">
                <div class="avatar">
                    <img src="fotos/${user.imagem}" alt="">
                </div>
                <div class="profile-info">
                    <span>${user.nome_completo}</span>
                    <p>${user.email}</p>
                </div>
            </div>
            <div onclick="removetolist('${user.email}')">
                <h1 style="margin: 0px;" >X</h1>
            </div>    
        </div>
    `
            );

            // Adiciona o elemento ao container
            $("#boxselectemails").append($selectedCard);
        }



        function submitemail() {
            $.ajax({
                url: '{{ route('enviarEmail') }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}', // Adicione o token CSRF aqui
                    emails: emails
                },
                success: function(response) {
                    console.log(response);
                    // Faça algo com a resposta, se necessário
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }
    </script>

    <!--   Core JS Files   -->
    <script src="{{ asset('paper') }}/js/core/jquery.min.js"></script>
    <script src="{{ asset('paper') }}/js/core/popper.min.js"></script>
    <script src="{{ asset('paper') }}/js/core/bootstrap.min.js"></script>
    <script src="{{ asset('paper') }}/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <!--  Google Maps Plugin    -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <!-- Chart JS -->
    <script src="{{ asset('paper') }}/js/plugins/chartjs.min.js"></script>
    <!--  Notifications Plugin    -->
    <script src="{{ asset('paper') }}/js/plugins/bootstrap-notify.js"></script>
    <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('paper') }}/js/paper-dashboard.min.js?v=2.0.0" type="text/javascript"></script>
    <!-- Paper Dashboard DEMO methods, don't include it in your project! -->
    <script src="{{ asset('paper') }}/demo/demo.js"></script>
    <!-- Sharrre libray -->


</body>

</html>
