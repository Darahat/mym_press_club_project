<template>
 <v-container grid-list-md offset-sm3 >
    <v-layout row wrap>
      <carousel></carousel>
       asfdasds
    </v-layout>
  </v-container>
</template>

<script>
 
export default {
    
    //  mounted() {
    //     window.axios.get('/api/articles').then(res => {
    //           console.log(res.data);
    //         this.posts = res.data
    //     })
    //  },
    methods:{
      deletedata(id){
if(confirm("Are you sure to Delete this data ?")){
                window.axios.put(`/api/delete/${id}`).then(response=>{
                   console.log(response);
                }).catch(error=>{
                    console.log(error)
                })
            }
      },
       details(id){
            if(confirm("Are you sure to see details this data ?")){
                window.axios.get(`/api/category/${id}`).then(response=>{
                   console.log(response);
                }).catch(error=>{
                    console.log(error)
                })
            }
        }
    }
}
</script>


 
