<template>
    <v-card class="pa-4" width="800" outlined>

        <div v-for="banner in banners" :key="banner.id">
            <v-form ref="form" @submit.prevent="onUpload" method="POST" enctype="multipart/form-data">

                <v-text-field v-model="banner.title" label="Name" required></v-text-field>
                <v-textarea v-model="banner.description" label="Desctiption" required></v-textarea>
                <v-img max-height="150" max-width="250" :src="'/storage/images/banner/'+banner.image"></v-img>
                <!-- <input  type="file" @change="handleImageSelect" /> -->

                <v-file-input v-model="banner.image" @change="handleImageSelect" show-size label="File input"
                    type="file">
                </v-file-input>
                <!-- <v-file-input v-model="banner.image" @change="handleImageSelect"  type="file">
            </v-file-input> -->
                <v-card-actions>
                    <v-btn type="submit" value="Save Information" outlined rounded text>Save</v-btn>
                </v-card-actions>
            </v-form>
        </div>
    </v-card>
</template>

<script>
    import axios from 'axios';
    export default {
        data() {
            return {
                props: ["bannerId"],
                csrf: document.head.querySelector('meta[name="csrf-token"]').content,
                bannerId: this.$route.query.bannerid,
                banners: [{
                    title: "",
                    description: "",
                    image: null,
                }],
                selectedImage: null,
                edit: true,
            }
        },
        methods: {
            handleImageSelect(e) {
                this.selectedImage = e;
            },
            onUpload() {
                const formData = new FormData();
                formData.append('description', this.banners[0].description);
                formData.append('title', this.banners[0].title);
                formData.append('image', this.selectedImage, this.selectedImage.name);

                axios.post('api/banner/update/' + this.bannerId, formData, {
                        timeout: 120000,
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    })
                    .then(response => {
                        console.log(response.data)
                    })

            }
        },
        mounted() {
            window.axios.get('api/banner/edit/' + this.bannerId).then(res => {
                console.log(res.data);
                this.banners = res.data
            })
        },
    }

</script>
