

<template>
    <div>


<div class="col-md-12" style="margin-top:25px;margin-bottom:70px;">
<div class="card">
<div class="card-header p-2">
<ul class="nav nav-pills">

<li class="nav-item">

<span data-toggle="tab" style="color:black;font-weight:bold;font-size:23px;margin-top:10px;"><span style="color:green;">Name</span> : {{studentinformation.student_name}}</span>

<span data-toggle="tab" style="color:black;font-weight:bold;font-size:23px;margin-top:10px;margin-left:20px;"><span style="color:green;">Roll </span> : {{studentinformation.student_roll}}</span>

<span data-toggle="tab" style="color:black;font-weight:bold;font-size:23px;margin-top:10px;margin-left:20px;"><span style="color:green;">Department </span> : {{studentinformation.department_name}}</span>

<span data-toggle="tab" style="color:black;font-weight:bold;font-size:23px;margin-top:10px;margin-left:20px;"><span style="color:green;">Batch </span> : {{studentinformation.batch_name}}</span>

<!-- <span data-toggle="tab" style="color:black;font-weight:bold;font-size:23px;margin-top:10px;margin-left:20px;"><span style="color:green;">Batch </span> :fgsgfdgh</span> -->
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
      <th style="text-align:center;">Course</th>
      <th style="text-align:center;">Attentdance</th>
            <th style="text-align:center;">Month</th>
      <th style="text-align:center;">Date</th>

      <!-- <th style="text-align:center;">CT</th>
      <th style="text-align:center;">Attentdance</th>
        <th style="text-align:center;">Final Exam</th>
      <th style="text-align:center;">Total Mark</th>
      <th style="text-align:center;">CGPA</th>
      <th style="text-align:center;">Grade</th>
      <th style="text-align:center;">Credit*Cgpa</th> -->
      <!-- <th style="text-align:center;">C</th> -->
      <!-- <th style="text-align:center;">Exam</th> -->
      <!-- <th style="text-align:center;">Totl Mark</th> -->
      <!-- <th style="text-align:center;">Grade</th>
      <th style="text-align:center;">CGPA</th> -->
      <!-- <th style="text-align:center;">Action</th> -->
  </tr>




  </thead>

  <tbody>

<tr>

<tr  v-for="(v_attentdance,index) in studentcourseattentdance">

<td style="text-align:center;padding-top:30px">{{index+1}}</td>
<td style="text-align:center;padding-top:30px">{{v_attentdance.student_name}}</td>
<td style="text-align:center;padding-top:30px">{{v_attentdance.student_roll}}</td>
<td style="text-align:center;padding-top:30px">{{v_attentdance.course_code}}</td>

<td style="text-align:center;padding-top:30px">{{v_attentdance.course_attent_pre_or_abs}}</td>
<td style="text-align:center;padding-top:30px">{{v_attentdance.course_attent_month}}</td>
<td style="text-align:center;padding-top:30px">{{v_attentdance.course_attent_date}}</td>
<!-- <td style="text-align:center;padding-top:30px">

  <div v-if="v_attentdance.course_attent_pre_or_ab === 1">
   <p style="text-align:center;color:blue;padding-top:18px">Active</p>
  </div>
  <div v-else>
   <p style="text-align:center;color:red;padding-top:18px">Unactive</p>
  </div>




</td> -->





</tr>

   </tbody>




   </table>

   <center style="margin-top:30px;">

     <span style="font-weight:bold;color:green;font-size:20px;margin-right:10px;">Total Attentdance = </span><span style="font-weight:bold;color:blue;font-size:20px">{{totalcourseattentdance}}</span>

    <span style="font-weight:bold;color:green;font-size:20px;margin-left:30px;">Attentdance Mark = </span><span style="font-weight:bold;color:blue;font-size:20px">{{courseavarageatteatdancemark}}</span>

         <span style="font-weight:bold;color:green;font-size:20px;margin-left:30px;">Attentdance Percentage = </span><span style="font-weight:bold;color:blue;font-size:20px">{{coursettentdancepercentage}} %</span>
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

        // semesterfinalcgpa:{},
        // studentinfo:{},
      //  studentaveragecgpa:{},
      //  myresultpublishbuttonshowornot:{},
      studentinformation:{},
      studentcourseattentdance:{},
      totalcourseattentdance:{},
      courseavarageatteatdancemark:{},
      coursettentdancepercentage:{},



          form: new Form({


          })
        }
      },




    methods:{



  Seestudentspecificcourseattentdnce(){

          axios.get('/see_student_sprcefic_course_attentdance/'+this.$route.params.addstuent_courseid).then((res) => {

        this.studentinformation = res.data.studentinformation

         this.studentcourseattentdance = res.data.studentcourseattentdance
         this.totalcourseattentdance = res.data.totalcourseattentdance
         this.courseavarageatteatdancemark = res.data.courseavarageatteatdancemark
         this.coursettentdancepercentage = res.data.coursettentdancepercentage



      //   console.log(res.data)






          })

        },


      ourimage(img){

      return "/images/"+img;

        },






},





        mounted(){

          this.Seestudentspecificcourseattentdnce();


          //this.studentsemesterfinlcgpa();

        //  this.resultpubsishbuttonshowornot();

          //this.Viewcourse();


        }
    }
</script>
