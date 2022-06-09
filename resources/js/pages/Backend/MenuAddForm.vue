<template>
    <div>
         <detailsAddForm 
            :title="title"
            :subTitle="subTitle"
            :isMenuForm="isMenuForm"
            :isBlogForm="isBlogForm"
            :isSubmenuForm="isSubmenuForm"
            :data="data"
            />
    </div>
</template>
<script>

    export default {
        data() {
            return {
                title:"Add Menu Form",
                subTitle:'Add A New Menu ',
                isMenuForm: true,
                isBlogForm:false,
                isSubmenuForm:false,
                snackbar: false,
                data:{
                    image: {},
                    hasChildMenu: 0,
                    externalLink: 0,
                    Document1: '',
                    Document2: '',
                    Document3: '',
                    name: '',
                },
                props: {
                    route: String
                },
                csrf: document.head.querySelector('meta[name="csrf-token"]').content,
                 menu: {
                    title: '',
                    Document: '',
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
           
        }
    }
</script>
