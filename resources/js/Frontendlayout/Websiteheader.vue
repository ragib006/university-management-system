
<template>
  <span style="">


<nav class="navbar navbar-expand-lg bg-primary">


  <div class="container">
    <router-link to="/" class="navbar-brand" href="#" style="color:white;font-weight:bold">Enterprise Resource Planning</router-link>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>


<div class="aaaa">

    <div class="collapse navbar-collapse" id="navbarScroll">
      <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
        <li class="nav-item">
     <router-link to="/" class="nav-link active" aria-current="page" href="#" style="color:white;margin-right:20px">Home</router-link>
        </li>
        <li class="nav-item">
        
          <router-link to="/student_login" class="nav-link" style="color:white;margin-right:20px">Student Login</router-link>
          
        </li>
       
        <li class="nav-item">
          <router-link to="/apply_student_result_form" class="nav-link" style="color:white;margin-right:20px">Admission Result</router-link>
        </li>
      </ul>


    
      
        <router-link  to="/website_admession" class="btn btn-outline-success"  style="color:white">Apply Online</router-link>
    </div>

</div>



  </div>
</nav>



  </span>
</template>

<script>

 import Mybackendheader from "../backendlayout/Adminheader.vue"
  import MyBackendsidebar from "../backendlayout/Adminsidebar.vue"

  import Mybackendfooter from "../backendlayout/Adminfooter.vue"



    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>


