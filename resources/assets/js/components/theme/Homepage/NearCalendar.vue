<template>
<div class="col-md-12">
    <section class="panel tasks-widget">
        <header class="panel-heading">
            Agendamentos próximos
        </header>
        <div class="panel-body">

            <div class="task-content">

                <ul class="task-list">
                    <li>
                        <div class="task-checkbox">
                            <!-- <input type="checkbox" class="list-child" value=""  /> -->
                            <input type="checkbox" class="flat-grey list-child"/>
                            <!-- <input type="checkbox" class="square-grey"/> -->
                        </div>
                        <div class="task-title">
                            <span class="task-title-sp">Profilaxia de Alberto Farias</span>
                            <span class="label label-danger">HOJE</span>
                            <div class="pull-right hidden-phone">
                                <button class="btn btn-default btn-xs"><i class="fa fa-check"></i></button>
                                <button class="btn btn-default btn-xs"><i class="fa fa-pencil"></i></button>
                                <button class="btn btn-default btn-xs"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="task-checkbox">
                            <!-- <input type="checkbox" class="list-child" value=""  /> -->
                            <input type="checkbox" class="flat-grey"/>
                        </div>
                        <div class="task-title">
                            <span class="task-title-sp">Prótese dentária de Arthur Venturin</span>
                            <span class="label label-warning"> Amanhã</span>
                            <div class="pull-right hidden-phone">
                                <button class="btn btn-default btn-xs"><i class="fa fa-check"></i></button>
                                <button class="btn btn-default btn-xs"><i class="fa fa-pencil"></i></button>
                                <button class="btn btn-default btn-xs"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="task-checkbox">
                            <!-- <input type="checkbox" class="list-child" value=""  /> -->
                            <input type="checkbox" class="flat-grey"/>
                        </div>
                        <div class="task-title">
                            <span class="task-title-sp">Retirada do aparelho de Bruno da Luz</span>
                            <span class="label label-warning">2 dias</span>
                            <div class="pull-right hidden-phone">
                                <button class="btn btn-default btn-xs"><i class="fa fa-check"></i></button>
                                <button class="btn btn-default btn-xs"><i class="fa fa-pencil"></i></button>
                                <button class="btn btn-default btn-xs"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                    </li>

                </ul>
            </div>

            <div class=" add-task-row">
                <a class="btn btn-success btn-sm pull-left" href="#">Novo Agendamento</a>
            </div>
        </div>
    </section>
</div>
</template>
<script>
    export default {
        mounted() {
            console.log('Component NearCalendar mounted.')
        }

    }
    
</script>
