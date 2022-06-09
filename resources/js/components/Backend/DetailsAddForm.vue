<template>
    <div>
        <v-snackbar v-model="snackbar">
            {{message}}
        </v-snackbar>

        <v-card>

            <v-card-title class="text-h5">
                {{title}}
            </v-card-title>
            <v-card-subtitle>{{subTitle}}</v-card-subtitle>
            <form ref="form" lazy-validation @submit.prevent="submit" enctype="multipart/form-data">
                <v-container class="grey lighten-5">
                    <v-row no-gutters>
                        <v-col   cols="12" sm="6" class="px-2" >
                            <div>
                                <VueEditor v-model="data.Document1" />
                            </div><br>
                            <div>
                                <VueEditor v-model="data.Document2" />
                            </div><br>
                            <div>
                                <VueEditor v-model="data.Document3" />
                            </div><br>
                        </v-col>
                        <v-col  cols="12" sm="6" class="px-2">
                            <v-text-field v-model="data.name" label="Name" required></v-text-field>
                            <v-select :items="['Foo', 'Bar']" label="Items" v-if="isSubmenuForm"></v-select>
                            <p>Has Child menu?</p>
                            <v-radio-group v-model="data.hasChildMenu">
                                <v-radio value="1" label="Yes"></v-radio>
                                <v-radio value="0" label="No"></v-radio>
                            </v-radio-group>
                            <p>Has External Link?</p>
                            
                            <v-radio-group v-model="data.externalLink">
                                <v-radio value="1" label="Yes"></v-radio>
                                <v-radio value="0" label="No"></v-radio>
                            </v-radio-group>
                           <p>Document Top Image</p>
                            <v-file-input v-model="data.image" @change="handleImageSelect" show-size label="File input"
                                type="file">
                            </v-file-input>
                        </v-col>
                    </v-row>
                </v-container>

                <v-card-actions>
                    <v-btn type="submit" outlined rounded text>Save</v-btn>
                </v-card-actions>
            </form>
        </v-card>
    </div>
</template>
<script>
    export default {
        name: 'RichTextEditPanel',

        props: {
            title: "",
            subTitle: "",
            isMenuForm: Boolean,
            isBlogForm: Boolean,
            isSubmenuForm: Boolean,
            data: Object,
        },
        methods: {
            onUpdate(text) {
                this.text = text
            }
        },
        data() {
            return {
                snackbar: false,
                text: '',
                csrf: document.head.querySelector('meta[name="csrf-token"]').content,
                
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
                          console.log(this.data.hasChildMenu);
                          console.log(this.data.externalLink);
                           console.log(this.data.Document1);
                            console.log(this.data.Document2);
                             console.log(this.data.Document3);
                              console.log(this.data.image.name);
                                  console.log(this.data.name);
                          formData.append('image', this.data.image,this.data.image.name);
                          formData.append('hasChildMenu',this.data.hasChildMenu);
                          formData.append('externalLink', this.data.externalLink);
                          formData.append('Document1', this.data.Document1);
                          formData.append('Document2',this.data.Document2);
                          formData.append('Document3', this.data.Document3);
                          formData.append('name', this.data.name);
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
                 

            }
        }
    }

</script>
