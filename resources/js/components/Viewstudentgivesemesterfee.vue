<template>
    <div>


<div class="col-md-12" style="margin-top:25px;margin-bottom:70px;">
<div class="card">
<div class="card-header p-2">
<ul class="nav nav-pills">
<li class="nav-item"><p data-toggle="tab" style="color:black;font-weight:bold;font-size:23px;margin-top:10px;">{{studentallsemesterfee.student_name}}</p></li>

</ul>
</div><!-- /.card-header -->



<div class="card-body" style="margin-bottom:100px;">
<div class="tab-content">
<div class="active tab-pane" id="activity">
<!-- Post -->
<div class="post">
 <div class="user-block">
     <div class="ima" style="width:500px;float:left;height:650px;">
   <img :src="mypostimage(studentallsemesterfee.student_image)" alt="" style="height:400px;width:400px;">
 </div>

 <!-- <img :src="'/images/'+stuent.product_image"/> -->
   <span class="username" style="margin-left:50px;margin-bottom:3px;">
    <span style="font-size:18px;">Student Name : </span> <span style="font-size:18px;color:green;">{{studentallsemesterfee.student_name}}</span>
   </span>
   <span class="username" style="margin-left:50px;margin-bottom:3px;">
    <span style="font-size:18px;">Student Roll  : </span> <span style="font-size:18px;color:green;">{{studentallsemesterfee.student_roll}}</span>
   </span>
   <span class="username" style="margin-left:50px;margin-bottom:3px;">
    <span style="font-size:18px;">Student Department: </span> <span style="font-size:18px;color:green;">{{studentallsemesterfee.department_name}}</span>
   </span>
   <span class="username" style="margin-left:50px;margin-bottom:3px;">
    <span style="font-size:18px;">Student Level : </span> <span style="font-size:18px;color:green;">{{studentallsemesterfee.level_name}}</span>
   </span>


   <span class="username" style="margin-left:50px;margin-bottom:3px;">
    <span style="font-size:18px;">Student Email: </span> <span style="font-size:18px;color:green;">{{studentallsemesterfee.student_email}}</span>
   </span>

   <span class="username" style="margin-left:50px;margin-bottom:3px;">
    <span style="font-size:18px;">Student Mobile Number : </span> <span style="font-size:18px;color:green;">{{studentallsemesterfee.student_mobile_number}}</span>
   </span>



   <span class="username" style="margin-left:50px;margin-bottom:3px;">
    <span style="font-size:18px;">Main SemesterFee Amount: </span> <span style="font-size:18px;color:green;">{{studentallsemesterfee.main_semester_fee}} TK</span>
   </span>
   <span class="username" style="margin-left:50px;margin-bottom:3px;">
    <span style="font-size:18px;">SemesterFee Fine: </span> <span style="font-size:18px;color:green;">{{studentallsemesterfee.student_givesemesterfee_fine}} TK</span>
   </span>
   <span class="username" style="margin-left:50px;margin-bottom:3px;">
    <span style="font-size:18px;">SemesterFee Fine Day : </span> <span style="font-size:18px;color:green;">{{studentallsemesterfee.student_givesemesterfee_fine_day}}</span>
   </span>

   <span class="username" style="margin-left:50px;margin-bottom:3px;">
    <span style="font-size:18px;">Fine + Semester Fee : </span> <span style="font-size:18px;color:green;">{{studentallsemesterfee.student_givesemesterfee_fine_plus_total_amount}} TK</span>
   </span>


   <span class="username" style="margin-left:50px;margin-bottom:3px;">
    <span style="font-size:18px;">Student Gives Semester Fee : </span> <span style="font-size:18px;color:green;">{{studentallsemesterfee.student_givesemesterfee_amount}} TK</span>
   </span>

   <span class="username" style="margin-left:50px;margin-bottom:3px;">
    <span style="font-size:18px;">Student Extra Money : </span> <span style="font-size:18px;color:green;">{{studentallsemesterfee.student_givesemesterfee_extra_money}} TK</span>
   </span>

   <span class="username" style="margin-left:50px;margin-bottom:3px;">
    <span style="font-size:18px;">Semester Fee Loss Money : </span> <span style="font-size:18px;color:green;">{{studentallsemesterfee.student_givesemesterfee_loss_blance}} TK</span>
   </span>

   <span class="username" style="margin-left:50px;margin-bottom:3px;">
    <span style="font-size:18px;">Last Date Of Semester Fee : </span> <span style="font-size:18px;color:green;">{{studentallsemesterfee.level_expire_date}}</span>
   </span>

   <span class="username" style="margin-left:50px;margin-bottom:3px;">
    <span style="font-size:18px;">Student Give Semester Fee Date : </span> <span style="font-size:18px;color:green;">{{studentallsemesterfee.student_givesemesterfee_added_date}}</span>
   </span>













 </div>




</div>

</div>

</div>

</div>

</div>
<!-- /.card -->
</div>



  </div>
</template>



<script>
import _ from 'lodash'

// import Vue from 'vue'
// import axios from 'axios'
// import VueAxios from 'vue-axios'
    export default {


      data () {
        return {


        studentallsemesterfee:{},

          // Create a new form instance
          form: new Form({

                // hall_id:'',
                // hall_name: '',
             	  // hall_type: '',
             	  // hall_added_date: '',
                // hall_status:'',
                //cat_status: '',


          })
        }
      },




    methods:{



      Viewstuentallsemesterfee(){

     axios.get('/view_my_all_student_semesterfee_details/'+this.$route.params.student_givesemesterfee_id).then((res) => {

     this.studentallsemesterfee = res.data.studentallsemesterfee
    // this.hallname = res.data.hallname



     })

   },

   mypostimage(img){

       return "/images/"+img;

   },







},





        mounted() {

          // this.Viewmystudentcourse();
          this.Viewstuentallsemesterfee();




        }
    }
</script>
