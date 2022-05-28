<template>
    <v-simple-table>
        <template v-slot:default>
            <thead>
                <tr>
                    <th class="text-left">
                        Title
                    </th>
                    <th class="text-left">
                        Description
                    </th>
                    <th class="text-left">
                        Image
                    </th>
                    <th class="text-left">
                        Edit
                    </th>
                     <th class="text-left">
                        Delete
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="banner in banners" :key="banner.id">
                    <td>{{ banner.title }}</td>
                    <td>{{ banner.description }}</td>
                     <td><v-img   max-height="150"
  max-width="250" :src="'/storage/images/banner/'+banner.image"></v-img></td>
  <td><v-btn
  elevation="2"
>Edit</v-btn></td>
   <td><v-btn
  elevation="2"
>Delete</v-btn></td>
                </tr>
            </tbody>
        </template>
    </v-simple-table>
</template>
<script>
    export default {
        data() {
            return {
                banners: [],
                
            }
        },
        created(){
               window.axios.get('/api/banners').then(res => {
                console.log(res.data);
                this.banners = res.data
                 
            })
        },
        mounted() {
            
        },
        methods: {
            deletedata(id) {
                if (confirm("Are you sure to Delete this data ?")) {
                    window.axios.put(`/api/delete/${id}`).then(response => {
                        console.log(response);
                    }).catch(error => {
                        console.log(error)
                    })
                }
            },
            details(id) {
                if (confirm("Are you sure to see details this data ?")) {
                    window.axios.get(`/api/show/${id}`).then(response => {
                        console.log(id);
                    }).catch(error => {
                        console.log(error)
                    })
                }
            }
        }
    }
</script>