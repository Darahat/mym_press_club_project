<template>
<v-app>
     <v-card>
            <navbar ></navbar>
        </v-card>
        <v-container>
            <v-main>
                <v-card class="  pa-6">
                    
                    <router-view></router-view>
                </v-card>
            </v-main>
        </v-container>
        <v-footer class="caption" app inset>
            <div class="px-2">
              
        Created with <span style="color:red">❤</span> by  Didarul Alam Rahat (Web & Mobile App Developer)
           
            </div>
        </v-footer>
</v-app>
</template>