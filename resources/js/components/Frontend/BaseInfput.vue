<template>
   <div>
         <v-text-field :value="modelValue" v-model="banner.title" :label="label" required></v-text-field>
   </div>
    
</template>
<script>
 
export default ({
     props:{
        modelValue:{
            type: [String, Number],
            default:'',
        }
     }
})
</script>
