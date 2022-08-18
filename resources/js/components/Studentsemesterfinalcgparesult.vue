

<template>
    <div>


<div class="col-md-12" style="margin-top:25px;margin-bottom:70px;">
<div class="card">
<div class="card-header p-2">
<ul class="nav nav-pills">

<li class="nav-item">

<span data-toggle="tab" style="color:black;font-weight:bold;font-size:23px;margin-top:10px;"><span style="color:green;">Name</span> : {{studentinfo.student_name}}</span>

<span data-toggle="tab" style="color:black;font-weight:bold;font-size:23px;margin-top:10px;margin-left:20px;"><span style="color:green;">Roll </span> : {{studentinfo.student_roll}}</span>

<span data-toggle="tab" style="color:black;font-weight:bold;font-size:23px;margin-top:10px;margin-left:20px;"><span style="color:green;">Department </span> : {{studentinfo.department_name}}</span>

<span data-toggle="tab" style="color:black;font-weight:bold;font-size:23px;margin-top:10px;margin-left:20px;"><span style="color:green;">Batch </span> : {{studentinfo.batch_name}}</span>

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
      <th style="text-align:center;">Image</th>
      <th style="text-align:center;">Course</th>
      <th style="text-align:center;">Credit</th>
      <th style="text-align:center;">Level</th>
      <th style="text-align:center;">CT</th>
      <th style="text-align:center;">Attentdance</th>
        <th style="text-align:center;">Final Exam</th>
      <th style="text-align:center;">Total Mark</th>
      <th style="text-align:center;">CGPA</th>
      <th style="text-align:center;">Grade</th>
      <th style="text-align:center;">Credit*Cgpa</th>
      <!-- <th style="text-align:center;">C</th> -->
      <!-- <th style="text-align:center;">Exam</th> -->
      <!-- <th style="text-align:center;">Totl Mark</th> -->
      <!-- <th style="text-align:center;">Grade</th>
      <th style="text-align:center;">CGPA</th> -->
      <!-- <th style="text-align:center;">Action</th> -->
  </tr>




  </thead>

  <tbody>

   <!-- <tr v-for="v_department in showalldepartment"> -->

     <tr  v-for="(semester_result,index) in semesterfinalcgpa">

    <td style="text-align:center;padding-top:30px">{{index+1}}</td>
    <td style="text-align:center;padding-top:30px">{{semester_result.student_name}}</td>
    <td style="text-align:center;padding-top:30px">{{semester_result.student_roll}}</td>
    <td style="text-align:center">
        <center>
        <img :src="ourimage(semester_result.student_image)" alt="" style="height:70px;width:70px;margin-left:20px;">
      </center>
    </td>
    <td style="text-align:center;padding-top:30px">{{semester_result.course_code}}</td>
    <td style="text-align:center;padding-top:30px">{{semester_result.course_credit}}</td>

    <td style="text-align:center;padding-top:30px">{{semester_result.level_name}}</td>
      <td style="text-align:center;padding-top:30px">{{semester_result.semester_final_ct_mark}}</td>
      <td style="text-align:center;padding-top:30px">{{semester_result.semester_final_attentdance_mark}}</td>

  <td style="text-align:center;padding-top:30px;color:blue;font-weight:bold">{{semester_result.semester_final_exam_mark}}</td>
  <td style="text-align:center;padding-top:30px;color:blue;font-weight:bold">{{semester_result.semester_final_total_course_mark}}</td>
  <td style="text-align:center;padding-top:30px;color:blue;font-weight:bold">{{semester_result.semester_final_course_cgpa}}</td>

<td style="text-align:center;padding-top:30px;color:blue;font-weight:bold">{{semester_result.semester_final_course_grade}}</td>

<td style="text-align:center;padding-top:30px;color:blue;font-weight:bold">{{semester_result.semester_final_coursecredit_gun_course_cgpa}}</td>
<!-- <td style="text-align:center;padding-top:30px;color:blue;font-weight:bold">{{semester_result.semester_final_course_added_date}}</td> -->




    <!-- <td style="text-align:center;padding-top:30px">ewfwef</td>
    <td style="text-align:center;padding-top:30px">ewfwef</td> -->
      <!-- <td style="text-align:center;padding-top:30px;color:blue;">{{v_department.department_name}}</td>
      <td style="text-align:center;padding-top:30px;">{{v_department.department_dean }}</td>
      <td style="text-align:center;padding-top:30px;">{{v_department.deprtment_head }}</td>
      <td style="text-align:center;padding-top:30px;">{{v_department.department_semester_fee }} TK</td> -->


      <!-- <td style="text-align:center;padding-top:30px;">{{v_department.teacher_name}}</td> -->

      <!-- <td style="text-align:center;padding-top:30px;">{{v_department.teacher_name}}</td>
      <td style="text-align:center;padding-top:30px;">{{v_department.teacher_name}}</td> -->
        <!-- <td style="text-align:center;padding-top:30px;color:blue;">{{v_department.department_added_date}}</td> -->

      <!-- <td>


      <div>
       <p style="text-align:center;color:red;padding-top:17px">Unactive</p>
      </div>


      </td> -->

      <!-- <td>

      <div>
      <a class="btn btn-success btn-sm" style="margin-top:15px;color:white;margin-left:30px;">ON</a>
      </div>


    </td> -->

    <!-- <td>

       <center>

  <a class="btn btn-warning btn-sm" style="margin-top:17px;" @click.prevent = ""><i class="fa fa-trash" aria-hidden="true"></i></a>
  <a class="btn btn-warning btn-sm" style="margin-top:17px;" @click.prevent = ""><i class="fa fa-trash" aria-hidden="true"></i></a>
  <a class="btn btn-warning btn-sm" style="margin-top:17px;" @click.prevent = ""><i class="fa fa-trash" aria-hidden="true"></i></a>
       </center>

       </td> -->
       </tr>

   </tbody>




   </table>

  <form enctype="multipart/form-data" role="form" @submit.prevent = "resultpublish()">
     <!-- <a class="btn btn-success" style="margin-top:17px;float:right;" @click.prevent = "deletestudent(v_showteacher.student_id)">Result Publish</a> -->
<button type="submit" class="btn btn-primary" style="margin-top:17px;float:right;">Publish Result</button>
  </form>
   </div>























   <!-- <span class="username" style="margin-left:50px;margin-bottom:3px;">
    <span style="font-size:18px;">Course Code : </span> <span style="font-size:18px;color:green;">sdfsdgfdgfd</span>
   </span> -->

   <!-- <span class="username" style="margin-left:50px;margin-bottom:3px;">
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
    <span style="font-size:18px;">Course Teacher Name : </span> <span style="font-size:18px;color:green;">{{courseinformation.teacher_name}}</span>
   </span>

   <span class="username" style="margin-left:50px;margin-bottom:3px;">
    <span style="font-size:18px;">Course Teacher Email : </span> <span style="font-size:18px;color:green;">{{courseinformation.teacher_email}}</span>
   </span>
   <span class="username" style="margin-left:50px;margin-bottom:3px;">
    <span style="font-size:18px;">Course Teacher Mobile : </span> <span style="font-size:18px;color:green;">{{courseinformation.teacher_mobile_number}}</span>
   </span> -->



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

        semesterfinalcgpa:{},
        studentinfo:{},
      //  studentaveragecgpa:{},
      //  myresultpublishbuttonshowornot:{},



          form: new Form({


          })
        }
      },




    methods:{


//resultpublish

resultpublish(){

this.form.post('/result_publish_formction/'+this.$route.params.student_id)
   .then((response)=>{

     if(response.data==1){

       this.$router.push('/add_student')

       Toast.fire({
       icon: 'success',
       title: 'Result Publish Successfully'
       })

     }else if(response.data==0){


       Swal.fire({

            icon: 'error',
            title: 'Oops...',
            text: 'Sorry This Result Already Publish !!',

            })

     }else{


       console.log('sorry ragib')

     }


     })
     .catch(()=>{

       console.log('error');

     })



},



          studentsemesterfinlcgpa(){

          axios.get('/student_semesterfinal_cgpa/'+this.$route.params.student_id).then((res) => {

         this.studentinfo = res.data.studentinfo

         this.semesterfinalcgpa = res.data.semesterfinalcgpa






          })

        },


      ourimage(img){

      return "/images/"+img;

        },

  //  resultpubsishbuttonshowornot(){
  //
  //    axios.get('/result_pubsish_button_showornot/'+this.$route.params.student_id).then((res) => {
  //
  //     console.log(res.data)
  //   //this.studentinfo = res.data.studentinfo
  //
  // //  this.semesterfinalcgpa = res.data.semesterfinalcgpa
  //
  //
  //    })
  //
  //
  //  }





},





        mounted() {

          this.studentsemesterfinlcgpa();

        //  this.resultpubsishbuttonshowornot();

          //this.Viewcourse();


        }
    }
</script>
