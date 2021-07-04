<template>
    <div>
        <h2>This is vuex com user</h2>
        <h3>This is counter - {{ $store.state.counter }} </h3><br>

        <compA ></compA> <br>
        <compB ></compB> <br>
        <compC ></compC>


    </div>

</template>

<script>
import compA from './comA.vue';
import compB from './comB.vue';
import compC from './comC.vue';

    export default {
        data(){
            return {

            }
        },
        components:{
            compA,
            compB,
            compC
        }
    }
</script>

<style lang="scss" scoped>

</style>
