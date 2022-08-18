<template>
    <div>


      <Mybackendheader></Mybackendheader>

      <MyBackendsidebar></MyBackendsidebar>
          <!-- Main content -->
  <section class="content" style="margin-top:20px;margin-bottom:500px;width:84%;margin-left:16%">
    <div class="container-fluid">
       <div class="row">
         <div class="col-12">

  <div class="card" style="padding-bottom:20px;">
  <div class="card-header">
  <div class="main">
           <div class="title" style="width:1000px;float:left">

             <h3 class="card-title"></h3>

            <span style="font-weight:bold;color:blue;font-size:19px;margin-right:20px;">All Semester Final Result</span>

             <span style="font-weight:bold;color:green;font-size:19px;margin-right:10px;">Student Name :</span>
             <span style="font-weight:bold;color:black;font-size:19px;margin-right:10px;">{{studentinfo.student_name}}</span>

              <span style="font-weight:bold;color:green;font-size:19px;margin-right:10px;margin-left:14px;">Student Roll :</span>
             <span style="font-weight:bold;color:black;font-size:19px;">{{studentinfo.student_roll}}</span>

             <!-- <span style="font-weight:bold;color:green;font-size:19px;margin-left:17px;">Level Name :</span>
             <span style="font-weight:bold;color:black;font-size:19px;margin-left:10px;">{{studentinfo.level_name}}</span>
 -->


           </div>




 </div>
 </div>



 <div class="card-body">



 <table id="section" class="table table-bordered table-striped">




 <thead>

 <tr>
    <th style="text-align:center;">Sl</th>
      <th style="text-align:center;">Exm</th>
    <th style="text-align:center;">Name</th>
    <th style="text-align:center;">Roll</th>
    <th style="text-align:center;">Image</th>
    <th style="text-align:center;">Dpt</th>
      <th style="text-align:center;">Level</th>
    <th style="text-align:center;">Credit</th>

    <th style="text-align:center;">Mark</th>
    <th style="text-align:center;">Grate</th>
      <th style="text-align:center;">CGPA</th>

      <!---
    <th style="text-align:center;">Grate*Credit</th>
    --->
      <th style="text-align:center;">Result</th>
   <!-- <th style="text-align:center;">Status</th>-->
       <th style="text-align:center;">Judgment</th>

    

    <th style="text-align:center;">Action</th>


</tr>




</thead>

<tbody>

  




  <tr v-for="(v_department,index) in allresult">


    <td style="text-align:center;padding-top:30px">{{index+1}}</td>

    <td style="text-align:center;padding-top:30px;width:200px">{{v_department.exm_name}}</td>
  <td style="text-align:center;padding-top:30px">{{v_department.student_name}}</td>
  <td style="text-align:center;padding-top:30px">{{v_department.student_roll}}</td>
  <td style="text-align:center"><img :src="ourimage(v_department.student_image)" alt="" style="height:70px;width:70px;"></td>

    <td style="text-align:center;padding-top:30px">{{v_department.department_name}}</td>

    <td style="text-align:center;padding-top:30px">{{v_department.level_name}}</td>
      <td style="text-align:center;padding-top:30px">{{v_department.university_semesterfinal_total_course_credit}}</td>
      <td style="text-align:center;padding-top:30px">{{v_department.university_semesterfinal_total_mark }}</td>

  <td style="text-align:center;padding-top:30px;color:blue;font-weight:bold">{{v_department.university_semesterfinal_student_earn_total}}</td>

  <td style="text-align:center;padding-top:30px;color:blue;font-weight:bold">{{v_department.university_semesterfinal_student_cgpa}}</td>

<!--
  <td style="text-align:center;padding-top:30px;color:blue;font-weight:bold">{{v_department.sumof_total_coursecredit_gun_student_earn_cgpa}}</td>

 -->


   <td style="">

          <div v-if="v_department.university_semesterfinal_mark_status == 'Fail'">
           <p style="text-align:center;color:white;background-color:red;margin-top:17px;border-radius:2px;padding-top:1px">Fail</p>
          </div>
          <div v-else="v_department.university_semesterfinal_mark_status == 'Pass'">
            <p style="text-align:center;color:white;background-color:green;margin-top:17px;border-radius:2px;padding-top:1px">Pass</p>
          </div>

  </td>


<!---
<td style="text-align:center;padding-top:10px;color:blue;font-weight:bold">{{v_department.university_semesterfinal_description}}</td>-->

<td style="text-align:center;padding-top:22px;color:blue;font-weight:bold">{{v_department.university_semesterfinal_main_status}}</td>







<td style="width:100px">
<router-link :to="`/university_semesterfinal_specefic_result_view/${v_department.university_semesterfinal_result_id}`" class="btn btn-primary btn-sm" style="margin-top:17px;" ><i class="fas fa-graduation-cap" aria-hidden="true" style="color:white;"></i></router-link>


<a class="btn btn-warning btn-sm" style="margin-top:17px;" @click.prevent = "deleteresult(v_department.university_semesterfinal_result_id)"><i class="fa fa-trash" aria-hidden="true"></i></a>


</td>



<!--
<td style="text-align:center;padding-top:30px;color:blue;font-weight:bold">{{v_department.semester_final_coursecredit_gun_course_cgpa}}</td>








 -->




<!-- <td>
  <center>


<a class="btn btn-warning btn-sm" style="margin-top:17px;" @click.prevent = ""><i class="fa fa-trash" aria-hidden="true"></i></a>


</center>
</td> -->



     </tr>

 </tbody>



 </table>

 <span style="margin-left:550px;margin-top:20px;display:block;">
   <span style="font-weight:bold;color:green;font-size:22px;">Average CGPA = </span><span style="margin-left:10px;font-weight:bold;color:blue;font-size:22px;">{{averagecpga}}</span>
 </span>





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

import Mybackendheader from "../backendlayout/Adminheader.vue"
import MyBackendsidebar from "../backendlayout/Adminsidebar.vue"
import Mybackendfooter from "../backendlayout/Adminfooter.vue"


    export default {


      data () {
        return {

            allsemesterfinalresult:{},
            studentinfo:{},
            averagecpga:{},

            allresult:{},

          // Create a new form instance
          form: new Form({


              semesterfinal_id:'',
              semester_final_student_id:'',
              semester_final_course_id:'',
              semester_final_level_id:'',
              semester_final_department_id:'',
              semester_final_ct_mark:'',
              semester_final_attentdance_mark:'',
              semester_final_exam_mark:'',
              semester_final_total_course_mark:'',
              semester_final_course_grade:'',
              semester_final_course_cgpa:'',
              semester_final_publich_status:'',

          })
        }
      },


      components: {
         MyBackendsidebar,
         Mybackendheader,
         Mybackendfooter,
       },



methods:{


//   studentsemesterfinlcgpa(){
//
//   axios.get('/student_semesterfinal_cgpa/'+this.$route.params.student_id).then((res) => {
//
//
//    //console.log(res.data)
//    this.maincgpa = res.data.maincgpa
//  //
//  // this.semesterfinalcgpa = res.data.semesterfinalcgpa
//
//
//
//
//
//
//   })
//
// },






  ourimage(img){

          return "/images/"+img;

      },




    deleteresult(university_semesterfinal_result_id){
     axios.get('/delete_admin_semester_final_result/'+university_semesterfinal_result_id)
      .then((response)=>{
  


       console.log(response.data)

    this.viewstudentallsemesterfinalresult();


       Toast.fire({
       icon: 'success',
        title: 'Semester Final Result Delete Successfully'
        })
  
         
  
  
         })
      .catch(()=>{
      console.log('fail');
  
       })
  
   },





  viewstudentallsemesterfinalresult(){

    axios.get('/show_student_allsemester_final_result_and_cgpa/'+this.$route.params.student_id).then((res) => {

      // console.log(res.data)

      this.studentinfo = res.data.studentinfo,
      this.allresult = res.data.allresult,
      this.averagecpga = res.data.averagecpga





   // this.studentsemesterfinalcoursemark = res.data.studentsemesterfinalcoursemark
   //





    })

  },










},




        mounted() {


          this.viewstudentallsemesterfinalresult();

     



        },



    }
</script>
