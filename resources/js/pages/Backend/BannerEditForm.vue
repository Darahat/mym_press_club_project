<template>
    <v-card class="pa-4" width="800" outlined>
        <div v-for="banner in banners" :key="banner.id">
            <v-form ref="form" lazy-validation @submit.prevent="submit">
                <input type="hidden" name="_token" :value="csrf">
                <v-text-field v-model="banner.title" label="Name" required></v-text-field>
                <v-textarea v-model="banner.description" label="Desctiption" required></v-textarea>
                <v-card-actions>
                    <v-btn type="submit" value="Save Information" outlined rounded text>Save</v-btn>
                </v-card-actions>
            </v-form>


        </div>
    </v-card>
</template>

<script>
    export default {
        data() {
            return {
                props: ["banner"],
                csrf: document.head.querySelector('meta[name="csrf-token"]').content,
                post: this.$route.query.postid,
                banners: [],
                title: "",
                description: "",
                edit: true,

            }
        },
        methods: {
            submit(e) {
                let currentObj = this;
                alert(JSON.stringify(this.banners[0].title));
                axios.put('api/update/' + this.post, {
                        title: this.banners[0].title,
                        description: this.banners[0].description,
                    }).then(response => this.$emit("update", response))
                    .catch(error => console.log(error))
                //  alert(JSON.stringify(this.banner));
                //  let currentObj = this;  
                //  axios.post('api/update/'+this.post, this.banner)  
                // .then(function (response) {  
                //     currentObj.output = response.data;  
                //     console.log(response.data);
                // }).catch(function (error) {  
                //     currentObj.output = error;  
                //     console.log(response.data);

                // }); 
                // console.log(this.banner)

            }
        },
        mounted() {
            window.axios.get('api/edit/' + this.post).then(res => {
                console.log(res.data);

                this.banners = res.data
            })
        },
    }
</script>
