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
                        <div >
                            <div><input  v-model="form.name" type="text" class="form-control add-task" name="name" placeholder="New Task..."></div>

                            <br>
                            <button type="submit" class="btn btn-info"  @click="create">Create</button>
                        </div>

                        <ul class="todo-list">
                            <div v-for="task in value">
                                <div v-if="task.status == 0">
                            <li class="todo-item" style="list-style: none">
                                <div class="checker"><span class=""><input type="checkbox" @click="complete(task.id)"></span></div>
                                <span>{{task.name}}</span>
                                <span class="pull-right"><a v-bind:href="'/softdelete/'+ task.id" class="btn btn-danger">Delete</a></span>
                            </li>
                                </div>
                                <div v-else-if="task.status == 1">
                                    <li class="todo-item" style="list-style: none">
                                        <div class="checker"><span class=""><input type="checkbox"  @click="pending(task.id)" checked></span></div>
                                        <span>{{task.name}}</span>
                                        <span class="pull-right"><a v-bind:href="'/softdelete/'+ task.id" class="btn btn-danger">Delete</a></span>
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
            value: this.apiData
        }
    },
    methods: {
        complete(id) {
            let url = "completetask/"+id;
            document.location.href=url;
        },
        pending(id) {
            let url = "pendingtask/"+id;
            document.location.href=url;
        },
        create () {
            axios.post('/createtask',{name: this.form.name})
                .then(( response ) => {
                    window.location.assign('/alltasks');
                })
        },
    }
}
</script>
