<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        I'm an example component.
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default { 
        mounted() { 
      console.log('component mounted'); 
        window.Echo.channel('user-channel') 
         .listen('.UserEvent', (data) => {
          console.log(data);  
        });

        },
        created () {
        window.Echo.channel('user-channel') 
         .listen('.UserEvent', (data) => {
          console.log(data);
        });
    }

    }
</script>
