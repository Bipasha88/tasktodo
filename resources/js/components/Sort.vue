<template>
    <VueNestable v-model="nestableItems" @input="input" >
        <VueNestableHandle slot-scope="{ item }" :item="item" @change="change">
            <input type="checkbox" checked>
            {{ item.name }}
            <button type="submit" class="pull-right">Delete</button>
        </VueNestableHandle>
    </VueNestable>
</template>

<script type="text/babel">
import ComponentExample from "./ComponentExample.vue";
import Vue from "vue";
import {VueNestable, VueNestableHandle} from "vue-nestable";
import axios from "axios";

Vue.use(VueNestable);
Vue.use(VueNestableHandle);
export default {
    components: {
        ComponentExample,
        VueNestable,
        VueNestableHandle,
    },
    props: {
        apiData: {
            type: Array,
        },
    },
    data() {
        return {
            nestableItems: this.apiData,
        };
    },
    mounted() {
    },
    methods: {
        input(value){
            console.log("Abc");
            axios.post('/nested',{nested: value})
                .then(( response ) => {

                })
        },
        change(value, options){
            console.log(value);
            console.log(options);
        }
    },
};
</script>

<style scoped>
@import "assets/tasks.css";
</style>
