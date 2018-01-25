<template>
    <div class="user-panel">
        <div class="pull-left image">
            <img :src="userImageSrc" class="img-circle" alt="User Image" />
        </div>
        <div class="pull-left info">
            <p>Olá, Marco</p>

            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
    </div>
</template>
<script>
    export default {
        props: ['user-image-src'],
        mounted(){
        }


    }

</script>