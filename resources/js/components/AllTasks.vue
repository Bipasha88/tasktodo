<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-white">
                    <div class="card-body">
                        <ul class="nav nav-pills todo-nav">
                            <li role="presentation" class="nav-item all-task "><a href="/alltasks" class="nav-link">All</a></li>
                            <li role="presentation" class="nav-item deleted-task"><a href="/deletedtaskslist" class="nav-link">Deleted</a></li>
                            <li role="presentation" class="nav-item"><a href="/download" class="nav-link">Download Tasks</a></li>
                            <li role="presentation" class="nav-item pull-right"><a href="/logout" class="nav-link">LogOut</a></li>
                        </ul>

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
                </div>
            </div>
        </div>
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
