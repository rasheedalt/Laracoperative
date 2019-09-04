<template>
<div>
    <div class="card">
        <div class="card-head text-left bg-secondary">
            <h4 class="mt-2 ml-2"><b>Groups:</b></h4>
        </div>
                       
        <div v-for="group in groups" class="card-body">
        <table class="table table-striped justify-content-center text-center" style="font-family: Arial !important;">
            <tbody>
            
            <tr>
                <td>{{group.name}}</td>
                <td>{{group.decription}}</td>
                <td>$<b>{{group.amount}}</b></td>
                <td><button class="btn btn-danger btn-block" >Exit</button></td>
        </tr>
        </tbody>
        </table>
            
        </div>
  </div>
</div>
</template>

 

<script>
    export default {
        data(){
            return{
                roles: [],
                groups: [],
            }
        },
        props:{
            user: '',
        },
        mounted() {
            //console.log(this.user);
            axios.get(`api/role/${this.user}`)
            .then((res)=>{this.roles = res.data})
            .catch((error)=>{});

            axios.get(`api/group/${this.user}`)
            .then((res)=>{this.groups = res.data})
            .catch((error)=>{});
        },
        methods:{
            joinGroup(id){
            confirm('Are you sure you want to join this group?')

            }
        },
    }
</script>
