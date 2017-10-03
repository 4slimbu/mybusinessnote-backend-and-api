<template>
    <div style="position:relative">
        <input class="form-control" type="text" @input = 'change'>
        <ul class="" style="width:100%">

            <li>asdfads</li>

        </ul>
    </div>
</template>


<script>
export default {

   data: function () {
       return {
         suggestions: {},
         greetings: 'Hello'
        }
     },
    mounted() {

        console.log(this.suggestions);

     },
     methods: {


        change: function() {


               axios({

                 method:'get',
                 url:'/admin/partners',
                 responseType:'json'

               }).then(function (response) {


                 // this.suggestions = response.data;
                  console.log(this.suggestions);

                 }).catch(function (error) {

                   console.log(error);

                 });

        }

     }
}
</script>