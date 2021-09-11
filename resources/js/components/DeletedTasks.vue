<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-white">
                    <div class="card-body">

                        <ul class="nav nav-pills todo-nav">
                            <li role="presentation" class="nav-item all-task "><a href="/alltasks" class="nav-link">All</a></li>
                            <li role="presentation" class="nav-item completed-task"><a href="/deletedtaskslist" class="nav-link">Deleted</a></li>
                            <li role="presentation" class="nav-item"><a href="/download" class="nav-link">Download Tasks</a></li>
                            <li role="presentation" class="nav-item pull-right"><a href="/logout" class="nav-link">LogOut</a></li>
                        </ul>

                        <div class="todo-list">
                            <div v-for="task in value">
                                <div v-if="task.status == 0">
                                    <div class="todo-item">
                                        <div class="checker"><span class=""><input type="checkbox" ></span></div>
                                        <span>{{task.name}}</span>
                                        <span class="pull-right"><a  @click="restore(task.id)" class="btn btn-success">Restore</a></span>
                                    </div>
                                </div>
                                <div v-else-if="task.status == 1">
                                    <div class="todo-item">
                                        <div class="checker"><span class=""><input type="checkbox"  checked></span></div>
                                        <span>{{task.name}}</span>
                                        <span class="pull-right"><a  @click="restore(task.id)" class="btn btn-success">Restore</a></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'DeletedTasks',
    props: ['apiData'],
    data(){
        return {
            value: this.apiData
        }
    },
    mounted() {

    },
    methods: {
        restore(id) {
            let url = "retrivedeletedtask/"+id;
            document.location.href=url;
        },
    }
}
</script>
