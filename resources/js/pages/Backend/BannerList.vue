<template>
<v-card class="pa-4" width="800" outlined>

<v-card-title class="text-h5">
              <v-btn class="btn btn-primary">
                            <router-link style="text-decoration:none;margin:2px" data-toggle="collapse" :to="{
                path: '/bannerform',
                 }">
                                New Banner Add
                            </router-link>
                        </v-btn>
        </v-card-title>
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
                    <td>
                        <v-img max-height="150" max-width="250" :src="'/storage/images/banner/'+banner.image"></v-img>
                    </td>
                    <td>
                        <!-- <router-link style="text-decoration: none;" data-toggle="collapse" :to="{ name: item.route }">
                            <v-btn text color="grey">Edit</v-btn>
                        </router-link> -->
                        <v-btn class="btn btn-primary">
                            <router-link style="text-decoration:none;margin:2px" data-toggle="collapse" :to="{
                path: '/bannerEditForm',
                params: bannerid, // <-- changed 'props' to 'params'
                query: { bannerid: banner.id},}">
                                Edit
                            </router-link>
                        </v-btn>
                    </td>
                    <td>
                        <v-btn elevation="2">Delete</v-btn>
                    </td>
                </tr>
            </tbody>
        </template>
    </v-simple-table>
</v-card>
</template>
<script>
    export default {
        data() {
            return {
                banners: [],
                postid:'',
                bannerid:'',
            }
        },
        created() {
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
