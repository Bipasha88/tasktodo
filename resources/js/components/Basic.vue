<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        I'm an example component.
                    </div>
                    <p>{{apiData}}</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Basic',
    props: ['apiData','apiData2'],
    data(){
        return {
            value: this.apiData
        }
    },
    mounted() {
        console.log(this.value);
        console.log(this.apiData2);
    }
}
</script>
