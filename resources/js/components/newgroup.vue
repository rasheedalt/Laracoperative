<template>
    <div>
        <div class="alert alert-success" v-if="submitted" role="alert" >Created Successfully</div>
        <div class="card">
            <div class="card-head text-center bg-primary h-100">
                <h4>Create New Group</h4>
            </div>
            <div class="card-body">
                <form @submit.prevent="create">
                    <div class="form-group">
                        <label for="name">Group Name</label>
                        <input type="text"  id="name" class="form-control" v-model="name" >
                    </div>
                    <div class="form-group">
                        <label for="desc">Description</label>
                        <input type="text"  id="desc" class="form-control" v-model="description" >
                    </div>
                    <div class="form-group">
                        <label for="amount">Amount</label>
                        <input type="number"  id="amount" class="form-control" v-model="amount" >
                    </div>
                    <div class="form-group">
                        <input v-if="name && description && amount" type="submit"  value="Create" class="btn btn-success">
                    </div>
                </form>
            </div>

        </div>
    </div>
</template>
<script>
export default {
    data(){
        return{
            name:null,
            description:null,
            amount:null,
            submitted: null,
        }
    },
    methods:{
        create(){
            const formData = new FormData();
            formData.append('name', this.name);
            formData.append('description', this.description);
            formData.append('amount', this.amount);
            axios.post(`api/create`, formData)
            .then((res)=>{
                console.log(res.data)
                this.name=this.description=this.amount="";
                this.submitted = true;});
                setTimeout(()=>{this.submitted = null}, 7000);

        }
    }
}
</script>