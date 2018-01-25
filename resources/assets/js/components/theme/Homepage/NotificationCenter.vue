<template>
    <div class="col-lg-3">
        <!--chat start-->
        <section class="panel">
            <header class="panel-heading">
                Notificações
            </header>
            <div class="panel-body" id="noti-box">

                <div class="alert alert-block alert-danger">
                    <button data-dismiss="alert" class="close close-sm" type="button">
                        <i class="fa fa-times"></i>
                    </button>
                    <strong>Consulta desmarcada</strong> Consulta desmarcada para as <strong>15:00</strong>.
                </div>
                <div class="alert alert-success">
                    <button data-dismiss="alert" class="close close-sm" type="button">
                        <i class="fa fa-times"></i>
                    </button>
                    <strong>Bom trabalho!</strong> Voce acabou de cumprir 1000 consultas.
                </div>
                <div class="alert alert-info">
                    <button data-dismiss="alert" class="close close-sm" type="button">
                        <i class="fa fa-times"></i>
                    </button>
                    <strong>Aviso!</strong> Hoje Marco está de férias por isso não pode receber agendamentos.
                </div>
                <div class="alert alert-warning">
                    <button data-dismiss="alert" class="close close-sm" type="button">
                        <i class="fa fa-times"></i>
                    </button>
                    <strong>Cuidado!</strong> Marco antonio informou que não poderá comparecer hoje.
                </div>
            </div>
        </section>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component NotificationCenter mounted.')
        }
    }
</script>


