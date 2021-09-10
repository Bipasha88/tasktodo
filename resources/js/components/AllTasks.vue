<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-white">
                    <div class="card-body">
                        <form action="">
                            <div><input type="text" class="form-control add-task" placeholder="New Task..."></div>
                            <br>
                            <span><button type="submit" class="btn btn-info">Create</button></span>
                        </form>
                        <ul class="nav nav-pills todo-nav">
                            <li role="presentation" class="nav-item all-task active"><a href="#" class="nav-link">All</a></li>
                            <li role="presentation" class="nav-item active-task"><a href="#" class="nav-link">Active</a></li>
                            <li role="presentation" class="nav-item completed-task"><a href="#" class="nav-link">Completed</a></li>
                        </ul>
                        <div class="todo-list">
                            <div v-for="task in value">
                                <div v-if="task.status == 0">
                            <div class="todo-item">
                                <div class="checker"><span class=""><input type="checkbox" ></span></div>
                                <span>{{task.name}}</span>
                                <span class="pull-right"><a href="#" class="btn btn-danger">Delete</a></span>
                            </div>
                                </div>
                                <div v-else-if="task.status == 1">
                                    <div class="todo-item">
                                        <div class="checker"><span class=""><input type="checkbox" checked></span></div>
                                        <span>{{task.name}}</span>
                                        <span class="pull-right"><a href="#" class="btn btn-danger">Delete</a></span>
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
    name: 'Tasks',
    props: ['apiData'],
    data(){
        return {
            value: this.apiData
        }
    },
    mounted() {
        console.log(this.value);
    }
}
</script>
