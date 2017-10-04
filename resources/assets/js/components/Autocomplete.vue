<template>
    <div style="position:relative">
     <input  class="form-control" type="text" v-model="selected_user_name" v-on:keyup="getPartners($event)"  > 
        <input type="hidden" name="partner_id" :value="selected_user_id" >
        <div class="panel-footer" v-if="users.length">
          <ul class="list-group">
            <li style="cursor:pointer" class="list-group-item"   v-for="user in users">
                <span v-on:click="getItem(user.id,user.first_name,user.last_name)"  :data-id="user.id">{{ user.first_name }} {{ user.last_name }}</span>
            </li>
          </ul>
        </div> 

    </div>
</template>

<script>
          
  export default{
  data(){
  return{
    users: [],
    selected_user_name:"",
    selected_user_id:''
  }
  },
  methods:{
  getPartners: function(e)
  {
e.preventDefault();
    this.users = [];

    axios.get('/newmbj/public/admin/suggest/',{params: {suggestString: this.selected_user_name}}).then(response => {
     
      if(response.data.status=="empty"){
        this.users=[];
      }else{
        response.data.forEach((user)=>{
        this.users.push(user);
      })
      }
      
    });
  },

  getItem : function(id,first_name,last_name)
  {
    this.selected_user_name=first_name+" " + last_name;
    this.selected_user_id=id;
    this.users=[];
  }

  }
  }

</script>