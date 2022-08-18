<template>
    <span class="hold-transition login-page" style="background:#F8FAFC">

      <div class="login-box" style="margin-left:-280PX;">
  <div class="login-logo">
    <a href="../../index2.html"><b>Admin</b>LTE</a>
  </div>
  <!-- /.login-logo -  hold-transition login-page-->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form enctype="multipart/form-data" role="form" @submit.prevent = "loginadmin()">
        <div class="input-group mb-3">
          <input type="email" class="form-control" v-model="admin_email" name="admin_email" placeholder="Enter Email" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" v-model="admin_password" name="admin_password" placeholder="Enter Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">

          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Login</button>
          </div>

        </div>
      </form>


    </div>

  </div>
</div>


    </span>
</template>

<script>
// import Vue from 'vue'
// import axios from 'axios'
// import VueAxios from 'vue-axios'
    export default {

            data () {
              return {

                admin_email: '',
                admin_password: '',
              }

            },

        methods:{



     loginadmin(){



     axios.post('/adminlogin_formaction',{admin_email:this.admin_email,admin_password:this.admin_password })
        .then((response)=>{
            this.admin_email = "";
            this.admin_password = "";

         if(response.data==1){

            Toast.fire({
            icon: 'success',
            title: 'Successfully Login'

             })

            this.$router.push('/admin_dashboard')

             }else{

            Swal.fire({

            icon: 'error',
            title: 'Oops...',
            text: 'Email and password not valid!',

             })

           }
        })
        .catch(()=>{
         console.log('fail');
          })

       },






        },



        mounted() {
            console.log('Component mounted.')
        },



    }
</script>
