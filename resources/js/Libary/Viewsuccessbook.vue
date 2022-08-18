<template>
    <div>



      <Mybackendheader></Mybackendheader>

      <MyBackendsidebar></MyBackendsidebar>


  <div class="col-md-12" style="margin-top:25px;margin-bottom:70px;width:80%;margin-left:270px">
<div class="card">
<div class="card-header p-2">
<ul class="nav nav-pills">
<li class="nav-item"><p data-toggle="tab" style="color:black;font-weight:bold;font-size:23px;margin-top:10px;">Libary Book Information</p></li>

</ul>
</div>



<div class="card-body" style="margin-bottom:100px;">
<div class="tab-content">
<div class="active tab-pane" id="activity">




 <div class="post">
 <div class="user-block">
     <div class="ima" style="width:500px;float:left;height:650px;">
   <img :src="mypostimage(studenttakebookinfo.student_image)" alt="" style="height:400px;width:400px;">
 </div>

   <span class="username" style="margin-left:50px;margin-bottom:3px;">
    <span style="font-size:18px;">Student Name : </span> <span style="font-size:18px;color:green;">{{studenttakebookinfo.student_name}}</span>
   </span>
   <span class="username" style="margin-left:50px;margin-bottom:3px;">
    <span style="font-size:18px;">Student Roll  : </span> <span style="font-size:18px;color:green;">{{studenttakebookinfo.student_roll}}</span>
   </span>
   <span class="username" style="margin-left:50px;margin-bottom:3px;">
    <span style="font-size:18px;">Student Department: </span> <span style="font-size:18px;color:green;">{{studenttakebookinfo.department_name}}</span>
   </span>
   <span class="username" style="margin-left:50px;margin-bottom:3px;">
    <span style="font-size:18px;">Student Level : </span> <span style="font-size:18px;color:green;">{{studenttakebookinfo.level_name}}</span>
   </span>

   <span class="username" style="margin-left:50px;margin-bottom:3px;">
    <span style="font-size:18px;">Student Email: </span> <span style="font-size:18px;color:green;">{{studenttakebookinfo.student_email}}</span>
   </span>
   <span class="username" style="margin-left:50px;margin-bottom:3px;">
    <span style="font-size:18px;">Student Address : </span> <span style="font-size:18px;color:green;">{{studenttakebookinfo.student_address}}</span>
   </span>
   <span class="username" style="margin-left:50px;margin-bottom:3px;">
    <span style="font-size:18px;">Student District : </span> <span style="font-size:18px;color:green;">{{studenttakebookinfo.student_district}}</span>
   </span>

   <span class="username" style="margin-left:50px;margin-bottom:3px;">
    <span style="font-size:18px;">Student Mobile Number : </span> <span style="font-size:18px;color:green;">{{studenttakebookinfo.student_mobile_number}}</span>
   </span>


   <span class="username" style="margin-left:50px;margin-bottom:3px;">
    <span style="font-size:18px;">Student Father Name : </span> <span style="font-size:18px;color:green;">{{studenttakebookinfo.student_father_name}}</span>
   </span>
   <span class="username" style="margin-left:50px;margin-bottom:3px;">
    <span style="font-size:18px;">Student Mother Name: </span> <span style="font-size:18px;color:green;">{{studenttakebookinfo.student_mother_name}}</span>
   </span>
   <span class="username" style="margin-left:50px;margin-bottom:3px;">
    <span style="font-size:18px;">Student Father Mobile Number : </span> <span style="font-size:18px;color:green;">{{studenttakebookinfo.student_father_mobile_number}}</span>
   </span>
   <span class="username" style="margin-left:50px;margin-bottom:3px;">
    <span style="font-size:18px;">Student Mother Mobile Number : </span> <span style="font-size:18px;color:green;">{{studenttakebookinfo.student_mother_mobile_number}}</span>
   </span>

   <span class="username" style="margin-left:50px;margin-bottom:3px;">
    <span style="font-size:18px;">Student Semester Fee : </span> <span style="font-size:18px;color:green;">{{studenttakebookinfo.level_dpt_tution_free}}TK</span>
   </span>

 </div>

</div>





</div>

</div>



</div>


<div class="second" style="margin-top:-190px;">
   <div class="row">

      <div class="col-md-5">

        <div class="ima" style="width:500px;float:left;height:500px;margin-left:23px;">
      <img :src="mypostimage(studenttakebookinfo.libary_book_image)" alt="" style="height:400px;width:400px;">
      </div>


      </div>


      <div class="col-md-7">


       <span class="username" style="margin-bottom:3px;">
         <span style="font-size:18px;font-weight:bold">Book Name : </span> <span style="font-size:18px;color:green;font-weight:bold">{{studenttakebookinfo.libary_book_name}}</span>
       </span></br>

       <span class="username" style="margin-bottom:3px;">
        <span style="font-size:18px;font-weight:bold">Book Take Date : </span> <span style="font-size:18px;color:green;font-weight:bold">{{studenttakebookinfo.studenttake_libary_book_take_date}}</span>
       </span></br>

       <span class="username" style="margin-bottom:3px;">
       <span style="font-size:18px;font-weight:bold">Book Return Last Date: </span> <span style="font-size:18px;color:green;font-weight:bold">{{studenttakebookinfo.studenttake_libary_book_return_date }}</span>
       </span></br>


       <span class="username" style="margin-bottom:3px;">
       <span style="font-size:18px;font-weight:bold">Fine Day: </span> <span style="font-size:18px;color:green;font-weight:bold">{{successbookinformation.stu_fine_libary_book_total_day}}</span>
       </span></br>

       <span class="username" style="margin-bottom:3px;">
       <span style="font-size:18px;font-weight:bold">Fine: </span> <span style="font-size:18px;color:green;font-weight:bold">{{successbookinformation.stu_fine_libary_book_money}} TK</span>
       </span></br>




       <span class="username" style="margin-bottom:3px;">
       <span style="font-size:18px;font-weight:bold">Book Successfully Return Date: </span> <span style="font-size:18px;color:green;font-weight:bold">{{successbookinformation.libarybook_fine_taka_date}}</span>
       </span></br>


       <span class="username" style="margin-bottom:3px;margin-top:5px;display:block;">
       <span style="font-size:18px;font-weight:bold">Status: </span>
       <span style="font-size:18px;color:green;font-weight:bold;padding:5px 5px 5px 5px;" v-if="successbookinformation.libarybook_fine_taka_status==1" class="bg-success">Successfully Return This Book</span>
        <span style="font-size:18px;color:green;font-weight:bold" v-else>Unsuccess</span>
       </span></br>



















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

       successbookinformation:{},
        studenttakebookinfo:{},
        mylibarybookfine:{},
        mylibarybookfineday:{},
        mylibarybookfinestatus:{},

        libarybook_fine_taka_id:'',
        fine_stu_take_libary_book_id:'',
        stu_fine_libary_book_id:'',
        stu_fine_libary_book_roll:'',
        stu_fine_libary_book_department:'',
        stu_fine_libary_book_level:'',
        stu_fine_libary_book_take_date:'',
        stu_fine_libary_book_return_date:'',


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



      // libaryfinemoney(studenttakebookinfo){
      //
      // axios.post('/libart_book_return',{stu_fine_libary_book_id:studenttakebookinfo.libary_book_my_id,stu_fine_libary_book_roll:studenttakebookinfo.studenttake_libary_book_roll,stu_fine_libary_book_department:studenttakebookinfo.studenttake_libary_book_department,stu_fine_libary_book_level:studenttakebookinfo.studenttake_libary_book_level,stu_fine_libary_book_take_date:studenttakebookinfo.studenttake_libary_book_take_date,
      //   stu_fine_libary_book_return_date:studenttakebookinfo.studenttake_libary_book_return_date,fine_stu_take_libary_book_id:studenttakebookinfo.studenttake_libary_book_id})
      //
      //    .then((response)=>{
      //
      //      console.log(response.data)
      //
      //      })
      //      .catch(()=>{
      //
      //        console.log('error');
      //
      //      })
      //
      //
      //
      // },











      Viewstudentsuccessbook(){

     axios.get('/viewstudent_return_success_libary_book/'+this.$route.params.studenttake_libary_book_id).then((res) => {

       // console.log(res.data)

          this.studenttakebookinfo = res.data.studenttakebookinfo,
          this.successbookinformation = res.data.successbookinformation
      //  this.mylibarybookfineday = res.data.mylibarybookfineday,
      //  this.mylibarybookfinestatus = res.data.mylibarybookfinestatus



     })

  },

   mypostimage(img){

       return "/images/"+img;

   },







},





        mounted() {

          this.Viewstudentsuccessbook();

          // this.Viewmystudentcourse();
        //  this.Viewmystudentinformation();




        }
    }
</script>
