<template>
    <div>
    <form @submit.prevent="create">
        <div >
            <div><input  v-model="form.name" type="text" class="form-control add-task" name="name" placeholder="New Task..."></div>

            <br>
            <button type="submit" class="btn btn-info">Create</button>
        </div>
    </form>

    <ul class="todo-list">
        <div v-for="task in tasks">
            <div v-if="task.status == 0">
                <li class="todo-item" style="list-style: none">
                    <div class="checker"><span class=""><input type="checkbox" @click="complete(task.id)"></span></div>
                    <span>{{task.name}}</span>
                    <span class="pull-right"><a @click="deleteTask(task.id)" class="btn btn-danger">Delete</a></span>
                </li>
            </div>
            <div v-else-if="task.status == 1">
                <li class="todo-item" style="list-style: none">
                    <div class="checker"><span class=""><input type="checkbox"  @click="pending(task.id)" checked></span></div>
                    <span>{{task.name}}</span>
                    <span class="pull-right"><a @click="deleteTask(task.id)" class="btn btn-danger">Delete</a></span>
                </li>
            </div>
        </div>
    </ul>
    </div>
</template>

<script>
import axios from 'axios';
export default {
    name: 'Tasks',
    props: ['apiData'],

    data () {
        return {
            form: {
                name: '',
            },
            tasks: '',
        }
    },
    mounted() {
        this.getAllTask();
    },
    methods: {
        complete(id) {
            axios.post('completetask/' + id)
                .then(response => {
                    this.getAllTask();
                });
        },
        pending(id) {
            axios.post('pendingtask/' + id)
                .then(response => {
                    this.getAllTask();
                });
        },
        create () {
            axios.post('/createtask',{name: this.form.name})
                .then(( response ) => {
                    this.form.name="";
                    this.getAllTask();
                })
        },
        getAllTask(){
            axios.get("/gettasks")
                .then(response => {
                    console.log(response.data.api_data);
                    this.tasks = response.data.api_data;
                });
        },
        deleteTask(id){
            axios.delete('softdelete/' + id)
                .then(response => {
                    this.getAllTask();
                });
        }
    }
}
</script>
