<template>
    <v-carousel cycle height="400" hide-delimiter-background show-arrows-on-hover>
        <v-carousel-item v-for="(slide, i) in banners" :key="i" :src="'/storage/images/banner/'+slide.image"
      reverse-transition="fade-transition"
      transition="fade-transition">
        </v-carousel-item>
    </v-carousel>
</template>
<script>
 

 export default {
        data() {
            return {
                banners: [],
            }
        },
        mounted() {
            window.axios.get('/api/banners').then(res => {
                console.log(res.data);
                this.banners = res.data
                 
            })
        },
}
</script>
