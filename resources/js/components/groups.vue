<template>
<div>
    <table class="table table-striped justify-content-center" style="font-family: Arial !important;">
  <thead>
    <tr class="">
      <th scope="col">#</th>
      <th scope="col">Group Name</th>
      <th scope="col">Description</th>
      <th scope="col">Amount Contributed</th>
    </tr>
  </thead>
  <tbody v-for="group, index in groups" :key="group.id">
    <tr>
      <th scope="row">{{index+1}}</th>
      <td>{{group.name}}</td>
      <td>{{group.decription}}</td>
      <td>$<b>{{group.amount}}</b></td>
      <td><button @click="joinGroup(group.id)" class="btn btn-success btn-block" >Join</button></td>
    </tr>
    <!-- Modal -->
<!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure you want to join this group? 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary">Confirm</button>
      </div>
    </div>
  </div>
</div> -->

  </tbody>
</table>
<br>
<nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
    <li class="page-item"  v-bind:class="{'disabled' : next}"  ><button class="page-link" @click.prevent="paginate(currentPage - 1)" >
      <span aria-hidden="true">&laquo;</span>Previous
      </button></li>
    <li class="page-item" v-bind:class="{'disabled' : prev}" ><button class="page-link" @click.prevent="paginate(currentPage + 1)" >
      Next<span aria-hidden="true">&raquo;</span>
      </button>
      </li>
  </ul>
</nav>

</div>
</template>

 

<script>
    export default {
        data(){
            return{
                groups:[],
                currentPage: "",
                totalPages: "",
                
            }
        },
        props:{
            user: '',
        },
        mounted() {
            console.log(this.user);
            axios.get(`api/groups`)
            .then((res)=>{this.groups = res.data.data;
                          this.totalPages = res.data.last_page;
                          this.currentPage = res.data.current_page;
                        
            console.log(res)})
            .catch((error)=>{});
        },
        methods:{
            joinGroup(id){
            confirm(`Are you sure you want to join this group? ${id}`);
            axios.put(`api/join/${id}/${this.user}`)
            .then((res)=>{console.log(res.data)})
            .catch((error)=>{console.log(error)});
            },
            paginate(no){
               axios.get(`api/groups?page=${no}`)
            .then((res)=>{this.groups = res.data.data;
                          this.totalPages = res.data.last_page;
                          this.currentPage = res.data.current_page;
            })
            .catch((error)=>{});
            }
        },
        computed: {
            next(){
              if(this.currentPage == 1){
              return true;
              }
            },
            prev(){
              if(this.currentPage == this.totalPages){
              return true;
              }
            },
        },
    }
</script>
