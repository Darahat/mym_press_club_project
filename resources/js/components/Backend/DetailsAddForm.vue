<template>
<v-app>
    
     
    <v-snackbar v-model="snackbar">
       {{message}}
    </v-snackbar>
    <v-card class="pa-4" width="800" outlined>
        <v-card-title class="text-h5">
            {{title}} 
        </v-card-title>
        <v-card-subtitle>{{subTitle}}</v-card-subtitle>
        <form ref="form" lazy-validation @submit.prevent="submit" enctype="multipart/form-data">
            <v-text-field v-model="data.name" label="Name" required></v-text-field>
            <v-select :items="['Foo', 'Bar']" label="Items"  v-if="isSubmenuForm" ></v-select>
            <v-radio-group  v-model="data.hasChildMenu">
                <v-radio
                    value="1"
                    label="Yes"
                ></v-radio>
                <v-radio
                    value="0"
                    label="No"
                ></v-radio>
            </v-radio-group>
            <v-radio-group  v-model="data.externalLink">
                <v-radio
                    value="1"
                    label="Yes"
                ></v-radio>
                <v-radio
                    value="0"
                    label="No"
                ></v-radio>
            </v-radio-group>
              <rich-text-editor @update="onUpdate"/>

            <v-file-input v-model="data.image" @change="handleImageSelect" show-size label="File input" type="file">
            </v-file-input>
            <v-card-actions>
                <v-btn type="submit" outlined rounded text>Save</v-btn>
            </v-card-actions>
        </form>
    </v-card>
    </v-app>
</template>
<script>
      
    export default {
          name: 'RichTextEditPanel',

         props: {
                    title:"",
                    subTitle:"",
                    isMenuForm: Boolean,
                    isBlogForm:Boolean,
                    isSubmenuForm:Boolean,
                    data:Object,
                },
                 methods: {
    onUpdate (text) {
      this.text = text
    }
  },
        data() {
            return {
                snackbar: false,
               
                csrf: document.head.querySelector('meta[name="csrf-token"]').content,
                 menu: {
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
                          formData.append('image', this.menu.image);
                          formData.append('description',this.menu.description);
                          formData.append('title', this.menu.title);
                          axios.post('api/menu/store', formData)
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
