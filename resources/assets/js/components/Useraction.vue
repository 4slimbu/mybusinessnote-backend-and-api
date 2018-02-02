<template>
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3">
	    <h1 class="h2">{{ title }}</h1>
	    <div class="btn-toolbar mb-2 mb-md-0">
	      <div class="btn-group mr-2">


	        <a v-for="action in actions" :href=action.link class="btn btn-sm btn-outline-secondary">
	        	{{ action.label }}
	        </a>


	      </div>
	    </div>
	</div>
</template>

<script>
    export default {
       data () {

	       	return {

	       		actions: []

	       	}
	
       },
       props: {

	       	title: { required: true },
	       	useractions: { required: true }
       
       },
	   beforeMount() {

			this.actions = JSON.parse(this.useractions);;

	    }

    }
</script>