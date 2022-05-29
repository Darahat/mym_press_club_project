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
                'name':'',
                'hasChildMenu':'',
                'externalLink':'',
                'Document1':'',
                'Document2':'',
                'Document3':'',
                },
                props: {
                    route: String
                },
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
