<template>
        <VueNestable v-model="nestableItems">
            <VueNestableHandle
                slot-scope="{ item }"
                :item="item"
            >
                <input type="checkbox">
                {{ item.name }}
                <button type="submit" class="pull-right">Delete</button>
            </VueNestableHandle>
        </VueNestable>
</template>

<script type= "text/babel">
import ComponentExample from './ComponentExample.vue'
import Vue from 'vue'
import { VueNestable, VueNestableHandle } from 'vue-nestable'
import axios from "axios";
Vue.use(VueNestable)
Vue.use(VueNestableHandle)
export default {
    components: {
        ComponentExample,
        VueNestable,
        VueNestableHandle
    },
    data () {
        return {
            nestableItems: [
                {
                    "id":1,
                    "name":"Task to test",
                    "status":"0",
                    "user_id":3,
                    "deleted_at":null,
                    "created_at":"2021-09-10T19:21:16.000000Z",
                    "updated_at":"2021-09-12T06:32:45.000000Z"
                },
                {
                    "id":5,
                    "name":"Task1",
                    "status":"0",
                    "user_id":3,
                    "deleted_at":null,
                    "created_at":"2021-09-10T19:21:16.000000Z",
                    "updated_at":"2021-09-12T06:32:45.000000Z"
                },
                {
                    "id":6,
                    "name":"Task2","status":"0",
                    "user_id":3,
                    "deleted_at":null,
                    "created_at":"2021-09-10T19:23:10.000000Z",
                    "updated_at":"2021-09-11T06:40:53.000000Z"
                },
                {
                    "id":7,"name":"Task3",
                    "status":"0","user_id":3,
                    "deleted_at":null,
                    "created_at":"2021-09-10T19:23:53.000000Z",
                    "updated_at":"2021-09-12T06:33:24.000000Z",
                    children: [{
                        "id":23,"name":"Task to test2",
                        "status":"0","user_id":3,
                        "deleted_at":null,
                        "created_at":"2021-09-10T19:23:53.000000Z",
                        "updated_at":"2021-09-12T06:33:24.000000Z",
                    }]
                },
                {
                    "id":12,
                    "name":"Task9",
                    "status":"1",
                    "user_id":3,
                    "deleted_at":null,
                    "created_at":"2021-09-11T05:28:31.000000Z",
                    "updated_at":"2021-09-12T06:32:50.000000Z"
                }
                ]
        }
    },
    mounted() {
        this.getAllTask();
    },
    methods: {
        getAllTask(){
            axios.get("/gettasks")
                .then(response => {
                    console.log(response.data);
                    this.nestableItems = response.data;
                });
        },
    }
}
</script>

<style scoped>
@import 'assets/tasks.css';
</style>
