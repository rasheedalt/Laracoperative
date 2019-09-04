<template>
    <div>
        <div class="card">
                <div class="card-header"><h4>Edit Profile</h4></div>
                <div class="text-center">
                    <img :src="/img/+picture" alt="profile Picture" class="img-rounded" style="height : 150px;
    width: 150px;">
                </div>
                <hr>
             <form  @submit.prevent="upload" enctype="multipart/form-data" >
                <div class="form-group ml-3">
                     <label for="file">Change Profile Picture</label>
                    <input type="file" 
                            accept="image/*" 
                            ref="file"  
                            class="form-control w-50" 
                            @change="change"><br>
                    <img v-if="file" 
                        :src="avatar" 
                        alt="image" 
                        class="img-thumbnail" 
                        style="width:60px; height:60px;">
                </div>
                <button class="btn btn-success ml-3 mb-3">Upload</button>
            </form>
        </div>
    </div>
</template>
<script>
export default {
    data(){
        return{
            file: "",
            avatar: null,
            picture: '',
        }
    },
    props:{
        user:'',
    },
    mounted(){
        axios.post(`api/image`,{ id: this.user})
        .then((response)=>{ this.picture = response.data})
    },
    methods:{
        change(e){
            this.file = e.target.files[0];
            //this.file = this.$refs.file.files[0];
            let reader = new FileReader();
            reader.readAsDataURL(this.file);
            reader.onload = e => {
                this.avatar = e.target.result
            }

           // console.log(this.file);
        },
        upload(){
            const formData = new FormData();
            //formData.append('name', 'my-file');
            formData.append('file', this.file);
            formData.append('userid', this.user);
            //console.log(this.file);
            // const config = { 
            //     headers:{'Content-Type' : 'multipart/form-data'}
            //     };
            
          axios.post(`api/upload`,formData)
          //.then((res)=>{console.log(res.data)})
          //.catch((error)=>{console.log(error)});
            // //console.log(fd);
            
        }

    }
}
</script>

<style>
imgs{
    height : 100px;
    width: 100px;
}

</style>