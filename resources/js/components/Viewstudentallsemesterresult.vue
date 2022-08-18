























<template>
    <div>


<div class="col-md-12" style="margin-top:25px;margin-bottom:70px;">
<div class="card">
<div class="card-header p-2">
<ul class="nav nav-pills">

  <li class="nav-item">


    <span data-toggle="tab" style="color:black;font-weight:bold;font-size:23px;margin-top:10px;margin-left:20px;color:blue;">Student All Semester Final Result </span>

  <span data-toggle="tab" style="color:black;font-weight:bold;font-size:23px;margin-top:10px;"><span style="color:green;margin-left:50px;">Name</span> : {{studentinformation.student_name}}</span>

  <span data-toggle="tab" style="color:black;font-weight:bold;font-size:23px;margin-top:10px;margin-left:20px;"><span style="color:green;">Roll </span> : {{studentinformation.student_roll}}</span>

  <span data-toggle="tab" style="color:black;font-weight:bold;font-size:23px;margin-top:10px;margin-left:20px;"><span style="color:green;">Department </span> : {{studentinformation.department_name}}</span>

  <span data-toggle="tab" style="color:black;font-weight:bold;font-size:23px;margin-top:10px;margin-left:20px;"><span style="color:green;">Batch </span> : {{studentinformation.batch_name}}</span>


  </li>





</ul>
</div>



<div class="card-body" style="margin-bottom:100px;">
<div class="tab-content">
<div class="active tab-pane" id="activity">

<div class="post">
 <div class="user-block">



      <div class="card-body">



      <table id="section" class="table table-bordered table-striped">




      <thead>

      <tr>
         <th style="text-align:center;">SL</th>
         <th style="text-align:center;">Name</th>
         <th style="text-align:center;">Roll</th>
         <th style="text-align:center;">Department</th>
         <th style="text-align:center;">Level</th>
         <th style="text-align:center;">Total Credit</th>
         <th style="text-align:center;">Total Mark</th>
         <!-- <th style="text-align:center;">Earn CGPA</th> -->



         <th style="text-align:center;">CGPA</th>
         <th style="text-align:center;">Credit*Cgpa</th>
         <th style="text-align:center;">Date</th>

     </tr>




     </thead>

     <tbody>

       <tr>

      <tr v-for="(v_result,index) in allsemesterresult">


        <td style="text-align:center;padding-top:30px">{{index+1}}</td>

        <td style="text-align:center;padding-top:30px">{{v_result.student_name}}</td>
        <td style="text-align:center;padding-top:30px">{{v_result.student_roll}}</td>
        <td style="text-align:center;padding-top:30px">{{v_result.department_name}}</td>

        <td style="text-align:center;padding-top:30px;color:blue;font-weight:bold;">{{v_result.level_name}}</td>
        <td style="text-align:center;padding-top:30px">{{v_result.university_semesterfinal_total_course_credit}}</td>

        <td style="text-align:center;padding-top:30px">{{v_result.university_semesterfinal_total_mark}}</td>
      <!-- <td style="text-align:center;padding-top:30px">{{v_result.university_semesterfinal_student_earn_total_cgpa}}</td> -->

         <td style="text-align:center;padding-top:30px;color:blue;font-weight:bold;">{{v_result.university_semesterfinal_student_cgpa}}</td>

        <td style="text-align:center;padding-top:30px">{{v_result.sumof_total_coursecredit_gun_student_earn_cgpa}}</td>


        <td style="text-align:center;padding-top:30px">{{v_result.university_semesterfinal_mark_addeddate}}</td>




          </tr>

      </tbody>




      </table>

       <center style="margin-top:30px;">

         <span style="font-weight:bold;color:green;font-size:20px;margin-right:10px;">Average CGPA = </span><span style="font-weight:bold;color:blue;font-size:20px">{{studentaveragecgpa}}</span>

       </center>
      </div>



 </div>

</div>

</div>

</div>

</div>

</div>

</div>



  </div>
</template>

<script>
   import _ from 'lodash'

    export default {


      data () {
        return {



        //  courseinformation:{},

          studentinformation:{},
          allsemesterresult:{},
          studentaveragecgpa:{},



          form: new Form({


          })
        }
      },




    methods:{


           Viewstudentallsemesterresult(){

          axios.get('/view_studentall_semester_result/'+this.$route.params.student_id).then((res) => {

          this.studentinformation = res.data.studentinformation,
          this.allsemesterresult = res.data.allsemesterresult
          this.studentaveragecgpa = res.data.studentaveragecgpa

        //  console.log(res.data)


          })



       },








},


        mounted() {

        //  this.Viewcourse();

        this.Viewstudentallsemesterresult();


        }
    }
</script>
