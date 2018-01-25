<template>
    <div class="col-md-12">
        <section class="panel">
            <header class="panel-heading">
                Próximas consultas
            </header>
            <div class="panel-body table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Paciente</th>
                        <th>Procedimento</th>
                        <th>Agendado para</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td>Aberto Farias</td>
                        <td>Profilaxia</td>
                        <!-- <td>Steve</td> -->
                        <td>21/05/2017</td>
                        <!-- <td>$1500</td> -->
                        <td><span class="label label-danger">DESMARCADA</span></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Arthur Venturin</td>
                        <td>Prótese dentária</td>
                        <!-- <td>Darren</td> -->
                        <td>22/05/2017</td>
                        <!-- <td>$1500</td> -->
                        <td><span class="label label-info">MARCADA</span></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Bruno da Luz</td>
                        <td>Retirada do aparelho</td>
                        <!-- <td>Nick</td> -->
                        <td>23/05/2017</td>
                        <!-- <td>$2000</td> -->
                        <td><span class="label label-warning">NÃO CONFIRMADA</span></td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Dolores Ambridge</td>
                        <td>Procedimento X</td>
                        <td>17/05/2017</td>
                        <td><span class="label label-success">CONCLUÍDO</span></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component WorkInProgress mounted.')
        }
    }
</script>
