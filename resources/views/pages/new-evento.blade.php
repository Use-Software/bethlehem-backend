
<style>
    /* Estilos para o modal */
    .modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.7);
        z-index: 1;
    }

    .modal-content {
        max-width: 500px;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #a02424;
        border-radius: 5px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
    }
    .formulario-section2 {
            display: none;
        }
</style>


<div id="meuModal" class="modal">
    <div class="modal-content">
        <form id="eventoForm" action="{{ route('salvarEvento') }}" method="POST">
            @csrf
        <section class="formulario-section" id="secao-pessoal">
           
            <div class="card" style="margin-bottom: 0px !important;">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="title">Adicionar evento</h5>
                    <span data-notify="icon" onclick="fecharModal()" class="nc-icon nc-simple-remove"></span>

                </div>
                <div class="card-body">
                    <div class="row">
                        <label class="col-md-3 col-form-label">Titulo</label>
                        <div class="col-md-9">
                            <div class="form-group">
                                <input type="text" name="titulo" class="form-control" placeholder="Culto de oração" value="" required="">
                            </div>
                                                            </div>
                    </div>
                    <div class="row">
                        <label class="col-md-3 col-form-label">Tipo</label>
                        <div class="col-md-9">
                            <div class="form-group">
                                <select name="tipo_evento" class="form-control">
                                    <option value="culto_manha"></option>
                                    <option value="culto_manha">Culto da Manhã</option>
                                    <option value="culto_noite">Culto da Noite</option>
                                    <option value="culto_oracao">Culto de Oração</option>
                                    <option value="culto_jovens">Culto de Jovens</option>
                                    <option value="culto_especial">Culto Especial</option>
                                    <!-- Adicione mais opções conforme necessário -->
                                </select>                            </div>
                                                            </div>
                    </div>
                    <div class="row">
                        <label class="col-md-3 col-form-label">Mediador</label>
                        <div class="col-md-9">
                            <div class="form-group">
                                <select name="mediador" class="form-control" id="mediador-select">
                                    <option value="">Selecione um Mediador</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    
                    <div class="row">
                        <label class="col-md-3 col-form-label">Descrição</label>
                        <div class="col-md-9">
                            <div class="form-group">
                                <input type="text" name="descricao" class="form-control" placeholder="Um culto feito para a familía e irmãos" value="" required="">
                            </div>
                                                            </div>
                    </div>
                    <div class="row">
                        <label class="col-md-3 col-form-label">Data</label>
                        <div class="col-md-9">
                            <div class="form-group">
                                <input type="datetime-local" name="horario" class="form-control" required>
                            </div>
                                                            </div>
                    </div>
                    <div class="row">
                        <label class="col-md-3 col-form-label">local</label>
                        <div class="col-md-9">
                            <div class="form-group">
                                <input type="text" name="local" class="form-control" placeholder="Um culto feito para a familía e irmãos" value="" required="">
                            </div>
                                                            </div>
                    </div>
                </div>
                <div class="card-footer ">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-info btn-round">Criar</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>

    
        <section class="formulario-section2" id="secao-segunda-etapa">
            <input type="text" name="" id="" value="abcd">
            <button onclick="mostrarProximaSecao('secao-pessoal')">Anterior</button>
        </section>
    
        <script>
            function mostrarProximaSecao(secaoId) {
                document.getElementById('secao-pessoal').style.display = 'none';
                document.getElementById('secao-segunda-etapa').style.display = 'none';
                document.getElementById(secaoId).style.display = 'block';
            }
        </script>     
        <script>
            function abrirModal() {
                document.getElementById('meuModal').style.display = 'block';
            }
        
            function fecharModal() {
                document.getElementById('meuModal').style.display = 'none';
            }
        </script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <script>
            $(document).ready(function () {
                // Quando a página carrega, faça uma solicitação Ajax para obter os mediadores
                $.get('/get-mediadores', function (data) {
                    var select = $('#mediador-select');
                    console.log(data);
                    // Preencha o select com as opções dos mediadores
                    $.each(data, function (key, value) {
                        select.append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                });
            });
        </script>
           
    </div>
</div>