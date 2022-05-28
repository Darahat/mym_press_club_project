<template>
<v-app>
    
 <v-snackbar
      v-model="snackbar"
    >
       {{message}}

      
    </v-snackbar>
    <v-card class="pa-4" width="800" outlined>
        <v-card-title class="text-h5">
            Add Banner
        </v-card-title>
        <v-card-subtitle>Add new Banner</v-card-subtitle>
        <form ref="form" lazy-validation @submit.prevent="submit" enctype="multipart/form-data">
             <v-text-field v-model="banner.title" label="Name" required></v-text-field>
            <v-textarea v-model="banner.description" label="Desctiption" required></v-textarea>
            <v-file-input v-model="banner.image" @change="handleImageSelect" show-size label="File input" type="file">
            </v-file-input>
            <v-card-actions>
                <v-btn type="submit" outlined rounded text>Save</v-btn>
            </v-card-actions>
        </form>
    </v-card>
    </v-app>
</template>
<script>
import router from '../../router';


    export default {


        data() {
            return {
                snackbar: false,
                props: {
                    route: String
                },
                csrf: document.head.querySelector('meta[name="csrf-token"]').content,
                 banner: {
                    title: '',
                    description: '',
                    image: {},
                },
                edit: false,
                message: 'Lorem ipsum dolor sit amet',

            }
        },

        methods: {
            handleImageSelect(e) {
                console.log(e);
 
            },
             submit(e) {
                          e.preventDefault();
                          let currentObj = this;
                          var formData = new FormData();
                          formData.append('image', this.banner.image);
                          formData.append('description',this.banner.description);
                          formData.append('title', this.banner.title);
                          axios.post('api/banner/store', formData)
                              .then((response) => {
                                  currentObj.output = response.data;
                                  console.log(response.data);
                                   this.snackbar = true;
                                   this.message = "Submitted";
                                  console.log(this.snackbar);
                                 }).catch(function (error) {
                                   currentObj.output = error;
                                   alert(error);
                                 });
                //  if(success){
                //      alert("Success");
                //  }else{
                //      alert("failed");
                //  }

            }
        }
    }
</script>
