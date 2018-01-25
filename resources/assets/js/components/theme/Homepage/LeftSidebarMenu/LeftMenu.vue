<template>

</template>
<script>
    export default {
        props: ['calendar-uri','collaborator-uri',  'active'],
        methods:{
            isActive:function(menuItem){
                return menuItem === this.active;
            }
        },
        mounted() {
            console.log('Component LeftMenu mounted.')
        }

    }
</script>