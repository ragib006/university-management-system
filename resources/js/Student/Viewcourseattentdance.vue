<template>
    <div>


      <Mybackendheader></Mybackendheader>

      <MyBackendsidebar></MyBackendsidebar>
          <!-- Main content -->
  <section class="content" style="margin-top:20px;margin-bottom:500px;width:84%;margin-left:16%">
    <div class="container-fluid">
       <div class="row">
         <div class="col-12">










  <div class="card" style="padding-bottom:20px;margin-bottom:500px;">
  <div class="card-header">
  <div class="main">


           <div class="title" style="float:left">
             <!-- <h3 class="card-title">sdfvdsfvs {{this.$route.params.addstuent_courseid}}</h3> -->
             <span style="color:black;font-weight:bold;font-size:17px;">Course Code : </span><span style="color:green;font-weight:bold;font-size:17px;">{{studentcourseinfo.course_code}}</span>

             <span style="color:black;font-weight:bold;font-size:17px;margin-left:20px;">Course Title : </span><span style="color:green;font-weight:bold;font-size:17px;">{{studentcourseinfo.course_title}}</span>

             <span style="color:black;font-weight:bold;font-size:17px;margin-left:20px;">Course Level : </span><span style="color:green;font-weight:bold;font-size:17px;">{{studentcourseinfo.level_name}}</span>

             <span style="color:black;font-weight:bold;font-size:17px;margin-left:20px;">Course Credit : </span><span style="color:green;font-weight:bold;font-size:17px;">{{studentcourseinfo.course_credit}}</span>

            <span style="color:black;font-weight:bold;font-size:17px;margin-left:20px;">Course Type : </span><span style="color:green;font-weight:bold;font-size:17px;">{{studentcourseinfo.course_type}}</span>

            <span style="color:black;font-weight:bold;font-size:17px;margin-left:20px;">Total Class : </span><span style="color:green;font-weight:bold;font-size:17px;">{{studentcourseinfo.course_class_number}}</span>

           </div>

  <!-- <div class="but">

   <h3 class="card-title">dfgvgvf</h3>

 </div> -->
 </div>
 </div>




  <!-- <form enctype="multipart/form-data" role="form" @submit.prevent = "addcourseattantance()"> -->


 <div class="card-body">

 <table id="section" class="table table-bordered table-striped">




 <thead>

 <tr>
   <th style="text-align:center;">SL</th>
    <th style="text-align:center;">Student Id</th>
    <th style="text-align:center;">Student Roll</th>
    <th style="text-align:center;">Image</th>
    <th style="text-align:center;">Student Name</th>
    <th style="text-align:center;">Department</th>
    <th style="text-align:center;">Level</th>
    <th style="text-align:center;">Date</th>

    <th style="text-align:center;">Month</th>

    <th style="text-align:center;">Attentdance</th>
    <th style="text-align:center;">Action</th>
</tr>




</thead>

<tbody>

 <tr v-for="(v_department,index) in allpresentattentdance">


    <td style="text-align:center;padding-top:30px">{{index+1}}</td>
    <td style="text-align:center;padding-top:30px">{{v_department.student_id}}</td>
    <td style="text-align:center;padding-top:30px;color:blue;">{{v_department.student_roll}}</td>
    <td style="text-align:center"><img :src="ourimage(v_department.student_image)" alt="" style="height:70px;width:70px;"></td>



    <td style="text-align:center;padding-top:30px;">{{v_department.student_name}}</td>
    <td style="text-align:center;padding-top:30px;color:blue;">{{v_department.department_name}}</td>
    <td style="text-align:center;padding-top:30px;">{{v_department.level_name}}</td>
        <td style="text-align:center;padding-top:30px;">{{v_department.course_attent_date}}</td>
    <td style="text-align:center;padding-top:30px;color:blue;">{{v_department.course_attent_month}}</td>


      <td style="text-align:center;padding-top:15px;color:blue;">

         <a class="btn btn-success btn-sm" style="margin-top:17px;color:white;" >Present</a>

      </td>



    <td>
   <center>


     <a class="btn btn-warning btn-sm" style="margin-top:17px;" @click.prevent = "deletestudentsttentdance(v_department.course_atten_id)"><i class="fa fa-trash" aria-hidden="true"></i></a>



  </center>


  </td>


     </tr>

 </tbody>





 </table>


 <div style="margin-top:30px;margin-left:250px;">

 <span style="color:black;font-weight:bold;font-size:20px;">Total Attentdance : </span><span style="color:green;font-weight:bold;font-size:20px;">{{totalattentdance}}</span>

 <span style="color:black;font-weight:bold;font-size:20px;margin-left:30px;">Attentdance Parcentage : </span><span style="color:green;font-weight:bold;font-size:20px;">{{attentdanceparcentage}} %</span>

 <span style="color:black;font-weight:bold;font-size:20px;margin-left:30px;">Attentdance Mark : </span><span style="color:green;font-weight:bold;font-size:20px;">{{attentdancemark}}</span>

</div>

 </div>






  </div>



                </div>

              </div>

            </div>

          </section>

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

        //  course_attent_studentid:[],

          // course_attent_pre_or_abs:1,
          //
          // course_attent_studentid:[],


// course_attent_pre_or_abs:'',

      //    coursename:{},
      viewcoursedateattentdnce:{},
      allpresentattentdance:{},
      studentcourseinfo:{},

      totalattentdance:{},
      attentdanceparcentage:{},
      attentdancemark:{},



          // Create a new form instance
          form: new Form({

                // hall_id:'',
                // hall_name: '',
             	  // hall_type: '',
             	  // hall_added_date: '',
                // hall_status:'',
                // //cat_status: '',


          })
        }
      },


      components: {
         MyBackendsidebar,
         Mybackendheader,
         Mybackendfooter,
       },

    methods:{


      deletestudentsttentdance(course_atten_id){
        axios.get('/delate_student_present_attentdance/'+course_atten_id)
        .then((response)=>{

          Toast.fire({
          icon: 'success',
          title: 'Student Addentdance Delate Successfully'
           })

            //this.showallteacher();
            //this.$store.dispatch("allStudent")
            this.viewcoursattendaance();

            })
         .catch(()=>{
         console.log('fail');

          })

      },


      ourimage(img){

              return "/images/"+img;

          },

      viewcoursattendaance(){

     axios.get('/view_my_course_attentdance/'+this.$route.params.addstuent_courseid).then((res) => {

     this.allpresentattentdance = res.data.allpresentattentdance,
     this.studentcourseinfo = res.data.studentcourseinfo,
     this.totalattentdance = res.data.totalattentdance,
     this.attentdanceparcentage = res.data.attentdanceparcentage,
     this.attentdancemark = res.data.attentdancemark

    // console.log(res.data)


     })

   },









},





        mounted() {

          this.viewcoursattendaance();



        }
    }
</script>
