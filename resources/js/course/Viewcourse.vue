



<template>
    <div>

            <Mybackendheader></Mybackendheader>

            <MyBackendsidebar></MyBackendsidebar>

<div class="col-md-12" style="margin-top:25px;margin-bottom:70px;margin-bottom:500px;width:84%;margin-left:16%">
<div class="card">
<div class="card-header p-2">
<ul class="nav nav-pills">
<li class="nav-item"><p data-toggle="tab" style="color:black;font-weight:bold;font-size:23px;margin-top:10px;">{{courseinformation.course_code}}</p></li>

</ul>
</div>



<div class="card-body" style="margin-bottom:300px;">
<div class="tab-content">
<div class="active tab-pane" id="activity">

<div class="post">
 <div class="user-block">

   <span class="username" style="margin-left:50px;margin-bottom:3px;">
    <span style="font-size:18px;">Course Code : </span> <span style="font-size:18px;color:green;">{{courseinformation.course_code}}</span>
   </span>

   <span class="username" style="margin-left:50px;margin-bottom:3px;">
    <span style="font-size:18px;">Course Title : </span> <span style="font-size:18px;color:green;">{{courseinformation.course_title}}</span>

   </span>

   <span class="username" style="margin-left:50px;margin-bottom:3px;">
    <span style="font-size:18px;">Course Type : </span> <span style="font-size:18px;color:green;">{{courseinformation.course_type}}</span>
   </span>

   <span class="username" style="margin-left:50px;margin-bottom:3px;">
    <span style="font-size:18px;">Course Credit : </span> <span style="font-size:18px;color:green;">{{courseinformation.course_credit}}</span>
   </span>


   <span class="username" style="margin-left:50px;margin-bottom:3px;">
    <span style="font-size:18px;">Course Departmente : </span> <span style="font-size:18px;color:green;">{{courseinformation.department_name}}</span>
   </span>
   <span class="username" style="margin-left:50px;margin-bottom:3px;">
    <span style="font-size:18px;">Course Level : </span> <span style="font-size:18px;color:green;">{{courseinformation.level_name}}</span>
   </span>

   <span class="username" style="margin-left:50px;margin-bottom:3px;">
    <span style="font-size:18px;">Course Classroom : </span> <span style="font-size:18px;color:green;">{{courseinformation.classroom_name}}</span>
   </span>


   <span class="username" style="margin-left:50px;margin-bottom:3px;">
    <span style="font-size:18px;">Course Teacher Name : </span> <span style="font-size:18px;color:green;">{{courseinformation.teacher_name}}</span>
   </span>

   <span class="username" style="margin-left:50px;margin-bottom:3px;">
    <span style="font-size:18px;">Course Teacher Email : </span> <span style="font-size:18px;color:green;">{{courseinformation.teacher_email}}</span>
   </span>
   <span class="username" style="margin-left:50px;margin-bottom:3px;">
    <span style="font-size:18px;">Course Teacher Mobile : </span> <span style="font-size:18px;color:green;">{{courseinformation.teacher_mobile_number}}</span>
   </span>



 </div>

</div>

</div>

</div>

</div>

</div>

</div>

 <Mybackendfooter></Mybackendfooter>

  </div>
</template>

<script>
   import _ from 'lodash'

   import Mybackendheader from "../backendlayout/Adminheader.vue"
   import MyBackendsidebar from "../backendlayout/Adminsidebar.vue"
   import Mybackendfooter from "../backendlayout/Adminfooter.vue"

    export default {


      data () {
        return {



          courseinformation:{},



          form: new Form({


          })
        }
      },


      components: {
         MyBackendsidebar,
         Mybackendheader,
         Mybackendfooter,
       },


    methods:{


           Viewcourse(){

          axios.get('/view_course_details/'+this.$route.params.course_id).then((res) => {

          this.courseinformation = res.data.courseinformation


          })



        },








},





        mounted() {

          this.Viewcourse();


        }
    }
</script>
