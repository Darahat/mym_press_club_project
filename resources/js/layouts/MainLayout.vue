<template>
    <v-app>
      
  <div id="app">
     <AdminLayout v-if="this.$route.meta.layout" >
     </AdminLayout>
    <ClientLayout v-else    >
     </ClientLayout>
    
  </div>
 
       
    </v-app>
</template>

<script>
    export default {
        watch: {
            $route() {
                $("#navbarCollapse").collapse("hide");
            },
        },
    };
</script>