<template>
    <div>


      <Mybackendheader></Mybackendheader>

      <MyBackendsidebar></MyBackendsidebar>

<div class="col-md-12" style="margin-top:25px;margin-bottom:300px;width:83%;margin-left:17%">
<div class="card">
<div class="card-header p-2">
<ul class="nav nav-pills">
<li class="nav-item"><p data-toggle="tab" style="color:black;font-weight:bold;font-size:23px;margin-top:10px;">{{student.student_name}}</p></li>

</ul>
</div>



<div class="card-body" style="margin-bottom:100px;">
<div class="tab-content">
<div class="active tab-pane" id="activity">
<!-- Post -->
<div class="post">
 <div class="user-block">
     <div class="ima" style="width:500px;float:left;height:650px;">
   <img :src="mypostimage(student.student_image)" alt="" style="height:400px;width:400px;">
 </div>

 <!-- <img :src="'/images/'+stuent.product_image"/> -->
   <span class="username" style="margin-left:50px;margin-bottom:3px;">
    <span style="font-size:18px;">Student Name : </span> <span style="font-size:18px;color:green;">{{student.student_name}}</span>
   </span>
   <span class="username" style="margin-left:50px;margin-bottom:3px;">
    <span style="font-size:18px;">Student Roll  : </span> <span style="font-size:18px;color:green;">{{student.student_roll}}</span>
   </span>
   <span class="username" style="margin-left:50px;margin-bottom:3px;">
    <span style="font-size:18px;">Student Department: </span> <span style="font-size:18px;color:green;">{{student.department_name}}</span>
   </span>
   <span class="username" style="margin-left:50px;margin-bottom:3px;">
    <span style="font-size:18px;">Student Level : </span> <span style="font-size:18px;color:green;">{{student.level_name}}</span>
   </span>

   <span class="username" style="margin-left:50px;margin-bottom:3px;">
    <span style="font-size:18px;">Student Batch : </span> <span style="font-size:18px;color:green;">{{student.batch_name}}</span>
   </span>

   <span class="username" style="margin-left:50px;margin-bottom:3px;">
    <span style="font-size:18px;">Student Email: </span> <span style="font-size:18px;color:green;">{{student.student_email}}</span>
   </span>
   <span class="username" style="margin-left:50px;margin-bottom:3px;">
    <span style="font-size:18px;">Student Address : </span> <span style="font-size:18px;color:green;">{{student.student_address}}</span>
   </span>
   <span class="username" style="margin-left:50px;margin-bottom:3px;">
    <span style="font-size:18px;">Student District : </span> <span style="font-size:18px;color:green;">{{student.student_district}}</span>
   </span>

   <span class="username" style="margin-left:50px;margin-bottom:3px;">
    <span style="font-size:18px;">Student Mobile Number : </span> <span style="font-size:18px;color:green;">{{student.student_mobile_number}}</span>
   </span>



   <span class="username" style="margin-left:50px;margin-bottom:3px;">
    <span style="font-size:18px;">Student Father Name : </span> <span style="font-size:18px;color:green;">{{student.student_father_name}}</span>
   </span>
   <span class="username" style="margin-left:50px;margin-bottom:3px;">
    <span style="font-size:18px;">Student Mother Name: </span> <span style="font-size:18px;color:green;">{{student.student_mother_name}}</span>
   </span>
   <span class="username" style="margin-left:50px;margin-bottom:3px;">
    <span style="font-size:18px;">Student Father Mobile Number : </span> <span style="font-size:18px;color:green;">{{student.student_father_mobile_number}}</span>
   </span>
   <span class="username" style="margin-left:50px;margin-bottom:3px;">
    <span style="font-size:18px;">Student Mother Mobile Number : </span> <span style="font-size:18px;color:green;">{{student.student_mother_mobile_number}}</span>
   </span>

   <span class="username" style="margin-left:50px;margin-bottom:3px;">
    <span style="font-size:18px;">Student Semester Fee : </span> <span style="font-size:18px;color:green;">{{student.level_dpt_tution_free}}TK</span>
   </span>


   <span class="username" style="margin-left:50px;margin-bottom:3px;">
    <span style="font-size:18px;">Student Added Date : </span> <span style="font-size:18px;color:green;">{{student.student_added_date}}</span>
   </span>




 </div>
 


 <h3 style="font-weight:bold;color:black;margin-bottom:20px;">Student Description</h3>
 <p style="text-align:justify;color:black;font-family:tahoma;">
{{student.student_description }}
 </p>

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

          // posts: {},
          // allcategoryshowinform:[],
          // currentPage: 1,
          // searchallcategory:'',
          //search:'',
          //showsearch:false,
          //caris:[],
        //  allteacher:{},
        //  showallhall:{},

      student:{},
      hallname:{},
        //mycourse:{},

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

      components: {
         MyBackendsidebar,
         Mybackendheader,
         Mybackendfooter,
       },



    methods:{



      Viewmystudentinformation(){

     axios.get('/view_my_student_details/'+this.$route.params.student_id).then((res) => {

     this.student = res.data.student
    // this.hallname = res.data.hallname



     })

   },

   mypostimage(img){

       return "/images/"+img;

   },







},





        mounted() {

          // this.Viewmystudentcourse();
          this.Viewmystudentinformation();




        }
    }
</script>
