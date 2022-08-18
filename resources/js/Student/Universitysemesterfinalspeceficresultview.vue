<template>
    <div>


      <Mybackendheader></Mybackendheader>

      <MyBackendsidebar></MyBackendsidebar>
    




  <section class="content" style="margin-top:20px;margin-bottom:500px;width:84%;margin-left:16%">
    <div class="container-fluid">
       <div class="row">
         <div class="col-12">

  <div class="card" style="padding-bottom:20px;">
  <div class="card-header">
  <div class="main">
           <div class="title" style="width:1175px;float:left">

             <h3 class="card-title">Mark Sheet</h3>

             <!--

            <span style="font-weight:bold;color:blue;font-size:19px;margin-right:10px;">Semester Final Result {{totalcredit}}</span>

             <span style="font-weight:bold;color:green;font-size:19px;margin-right:10px;">Student Name :</span>
             <span style="font-weight:bold;color:black;font-size:19px;margin-right:10px;">{{studentinfo.student_name}}</span>

              <span style="font-weight:bold;color:green;font-size:19px;margin-right:5px;">Student Roll :</span>
             <span style="font-weight:bold;color:black;font-size:19px;margin-left:5px;">{{studentinfo.student_roll}}</span>

             <span style="font-weight:bold;color:green;font-size:19px;margin-left:17px;">Level Name :</span>
             <span style="font-weight:bold;color:black;font-size:19px;margin-left:10px;">{{studentinfo.level_name}}</span>

             <span style="font-weight:bold;color:green;font-size:19px;margin-left:17px;">Total Credit :</span>
             <span style="font-weight:bold;color:black;font-size:19px;margin-left:10px;">{{totalcredit}}</span>


------>
           </div>




 </div>
 </div>



 <div class="card-body">



 <table id="section" class="table table-bordered table-striped">




 <thead>

 <tr>
    <th style="text-align:center;">Sl</th>
    <th style="text-align:center;">Name</th>
    <th style="text-align:center;">Roll</th>
    <th style="text-align:center;">Image</th>
    <th style="text-align:center;">Code</th>
    <th style="text-align:center;">Credit</th>
    <th style="text-align:center;">Level</th>
    <th style="text-align:center;">CT</th>
    <th style="text-align:center;">Attentdance</th>
    <th style="text-align:center;">Exam</th>
    <th style="text-align:center;">Total Mark</th>
    <th style="text-align:center;">CGPA</th>
    <th style="text-align:center;">Grade</th>
    <th style="text-align:center;">Credit*Cgpa</th>



</tr>




</thead>

<tbody>



  <tr v-for="(v_department,index) in viewresult">


    <td style="text-align:center;padding-top:30px">{{index+1}}</td>
  <td style="text-align:center;padding-top:30px">{{v_department.student_name}}</td>
  <td style="text-align:center;padding-top:30px">{{v_department.student_roll}}</td>
  <td style="text-align:center"><img :src="ourimage(v_department.student_image)" alt="" style="height:70px;width:70px;"></td>



    <td style="text-align:center;padding-top:30px">{{v_department.course_code}}</td>
    <td style="text-align:center;padding-top:30px">{{v_department.course_credit}}</td>
    <td style="text-align:center;padding-top:30px">{{v_department.level_name}}</td>
      <td style="text-align:center;padding-top:30px">{{v_department.semester_final_ct_mark}}</td>
      <td style="text-align:center;padding-top:30px">{{v_department.semester_final_attentdance_mark}}</td>

  <td style="text-align:center;padding-top:30px;color:blue;font-weight:bold">{{v_department.semester_final_exam_mark}}</td>
  <td style="text-align:center;padding-top:30px;color:blue;font-weight:bold">{{v_department.semester_final_total_course_mark}}</td>
  <td style="text-align:center;padding-top:30px;color:blue;font-weight:bold">{{v_department.semester_final_course_cgpa}}</td>

<td style="text-align:center;padding-top:30px;color:blue;font-weight:bold">{{v_department.semester_final_course_grade}}</td>


<td style="text-align:center;padding-top:30px;color:blue;font-weight:bold">{{v_department.semester_final_coursecredit_gun_course_cgpa}}</td>




     </tr>

 </tbody>



 </table>





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


            viewresult:{},


          // Create a new form instance
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
  






  ourimage(img){

          return "/images/"+img;

      },










  showuniversitysemesterfinalspeceficresultview(){

    axios.get('/show_universitysemester_final_specefic_result/'+this.$route.params.university_semesterfinal_result_id).then((res) => {

    console.log(res.data)

    this.viewresult = res.data.viewresult





    })

  },








},




        mounted() {


          this.showuniversitysemesterfinalspeceficresultview();

         //  this.showsemesterfinalcourseresult();
         //  this.studentsemesterfinlcgpa();




        },



    }
</script>
