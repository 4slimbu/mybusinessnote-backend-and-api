<template>
    <div style="position:relative">
        <input class="form-control" type="text" @input = 'change' v-model='searchQuery'>
        <input class="form-control" name="user_id" type="hidden" v-model='selectedId'>
        <div class="auto-suggest-wrapper" v-if="showSuggestion === true">
            <ul class="list-group auto-suggest">

                <li v-on:click="selectItem(item)" class="list-group-item" v-for="(item, index) in suggestions">
                  {{ item.company }}
                </li>

            </ul>
        </div>
    </div>
</template>


<script>
export default {

   data: function () {
       return {
         suggestions: [],
         showSuggestion: false,
         searchQuery: '',
         selectedId: ''
        }
     },
    mounted() {

       // console.log(this.suggestions);

     },
     methods: {

        change: function() {

           var self = this;
           var searchQuery = this.searchQuery;
           if(searchQuery) {
                axios({

                 method:'get',
                 url:'/admin/partners?q='+this.searchQuery,
                 responseType:'json',

                }).then(function (response) {

                  self.showSuggestion = true;
                  self.suggestions = response.data;
                  console.log(self.suggestions);

                }).catch(function (error) {

                   console.log(error);

                });

           }

        },

        selectItem: function(item) {

            this.searchQuery = item.company;
            this.selectedId = item.id;
            this.showSuggestion = false;

        }

     }
}
</script>