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

             <h3 class="card-title"></h3><span style="font-weight:bold;color:black;font-size:19px;margin-right:10px;">{{courseinfo.course_code}}</span><span style="font-weight:bold;color:green;font-size:19px;margin-left:17px;">{{courseinfo.course_title}}</span>
             <span style="font-weight:bold;color:black;font-size:19px;margin-left:17px;">Course Credit :</span>
             <span style="font-weight:bold;color:green;font-size:19px;margin-left:10px;">{{courseinfo.course_credit}}</span>
             <span style="font-weight:bold;color:black;font-size:19px;margin-left:17px;">Level :</span>
             <span style="font-weight:bold;color:green;font-size:19px;margin-left:10px;">{{courseinfo.level_name}}</span>

             <!-- <h3 class="card-title"></h3><span style="font-weight:bold;color:black;font-size:19px;margin-right:10px;">fdgfhfg</span><span style="font-weight:bold;color:green;font-size:19px;margin-left:17px;">fgdfgfdg</span> -->




           </div>

  <div class="but">
         <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
          Add Semester Final Marks
         </button>
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
  <div class="modal-content"  style="width:700px;">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="color:green">Add Semester Final Marks</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>
  <div class="modal-body">

  <form enctype="multipart/form-data" role="form" @submit.prevent = "addsemesterfinlmarks()">





                <div class="form-group">
                     <label for="exampleFormControlSelect1">Select Exam</label>
  <select  v-model="form.semester_final_exam_id" class="form-control" id="exampleFormControlSelect1" name="semester_final_exam_id" :class="{ 'is-invalid': form.errors.has('semester_final_exam_id') }" style="" required>
                         <option value="" disabled>Select</option>

                         <option style="color:green;font-weight:bold;" v-for="selectdept in examination" :value="selectdept.exm_id">{{selectdept.exm_name}}</option>

                       </select>
                       <has-error :form="form" field="semester_final_exam_id"></has-error>
                </div>







    <div class="form-group">
    <label>Enter Semeter Final Marks</label>
    <input v-model="form.semester_final_exam_mark" type="number" name="semester_final_exam_mark"
    class="form-control" :class="{ 'is-invalid': form.errors.has('semester_final_exam_mark') }" placeholder="Enter Semeter Final Marks">
    <has-error :form="form" field="semester_final_exam_mark"></has-error>
    </div>






<!--

   <div class="form-group">
      <label for="exampleFormControlSelect1">Exam Name</label>
        <select  v-model="form.semester_final_exam_mark" class="form-control" id="exampleFormControlSelect1" name="semester_final_exam_id" :class="{ 'is-invalid': form.errors.has('semester_final_exam_id') }" style="" required>
          <option value="" disabled>Select</option>
          <option style="color:green;font-weight:bold;" v-for="selectdept in examination" :value="selectdept.exm_id">{{selectdept.exm_name }}</option>
         </select>
        <has-error :form="form" field="semester_final_exam_id"></has-error>
    </div>

-->











      <button type="submit" class="btn btn-primary">Submit</button>

 </form>

 </div>
 </div>
 </div>
 </div>
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
    <!-- <th style="text-align:center;">Date</th> -->
    <th style="text-align:center;">Action</th>
    <!-- <th style="text-align:center;">Course Teacher</th> -->






</tr>




</thead>

<tbody>

  <tr v-for="(v_department,index) in studentsemesterfinalcoursemark">


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





<td>
  <center>
<a class="btn btn-warning btn-sm" style="margin-top:17px;" @click.prevent = "deletesemesterfinalmark(v_department.semesterfinal_id)"><i class="fa fa-trash" aria-hidden="true"></i></a>


<!--
<a class="btn btn-warning btn-sm" style="margin-top:17px;" @click.prevent = ""><i class="fa fa-trash" aria-hidden="true"></i></a> -->


</center>
</td>

      <!-- <td style="text-align:center;padding-top:30px">dfgvdfgdf</td>
      <td style="text-align:center;padding-top:30px">dfgvdfgdf</td>
      <td style="text-align:center;padding-top:30px">dfgvdfgdf</td>
      <td style="text-align:center;padding-top:30px">dfgvdfgdf</td>
      <td style="text-align:center;padding-top:30px">dfgvdfgdf</td> -->

    <!-- <td style="text-align:center;padding-top:30px">{{v_department.level_name}}</td>
    <td style="text-align:center;padding-top:30px">{{v_department.course_code}}</td>
    <td style="text-align:center;padding-top:30px">{{v_department.course_title}}</td>
    <td style="text-align:center;padding-top:30px">{{v_department.course_type}}</td>
    <td style="text-align:center;padding-top:30px">{{v_department.course_credit}}</td>
      <td style="text-align:center;padding-top:30px">{{v_department.course_class_number}}</td> -->






     </tr>

 </tbody>





 </table>
 </div>

              <!-- <div style="margin-left:43%;">
               <pagination :data="posts" @pagination-change-page="getResults"></pagination>
             </div> -->

             <!-- <center>
             <el-pagination
               background

                  @current-change="handleCurrentChange"
                  :current-page.sync="currentPage"
                  :page-size="getallcategory.per_page"
               layout="prev, pager, next"
               :total="getallcategory.total">
             </el-pagination>

             </center> -->


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

                    // allmydepartment:{},
                    // allmysemester:{},
                    // allmyteacher:{},

                  //  allmydepartment:{},

                courseinfo:{},
                studentsemesterfinalcoursemark:{},
                examination:{},
                //  allctmarks:{},
                  // teachername:{},

          // Create a new form instance
          form: new Form({


              semesterfinal_id:'',
              semester_final_student_id:'',
              semester_final_course_id:'',
              semester_final_level_id:'',
              semester_final_department_id:'',
              semester_final_exam_id:'',
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



  ourimage(img){

          return "/images/"+img;

      },




  deletesemesterfinalmark(semesterfinal_id){
    axios.get('/delate_course_femester_final_mark/'+semesterfinal_id)
    .then((response)=>{

      Toast.fire({
      icon: 'success',
      title: 'Semester Final Mark Delate Successfully'
       })

        this.showsemesterfinalcoursemark();


        })
     .catch(()=>{
     console.log('fail');

      })

  },









   showexamname(){
  
     axios.get('/show_exam_name_in_form/'+this.$route.params.addstuent_courseid).then((res) => {


     // console.log(res.data)
  
      this.examination = res.data.examination
  
  //
    })
  //
    },





  showsemesterfinalcoursemark(){

    axios.get('/show_semester_final_course_mark/'+this.$route.params.addstuent_courseid).then((res) => {

      //console.log(res.data)

   this.courseinfo = res.data.courseinfo,
   this.studentsemesterfinalcoursemark = res.data.studentsemesterfinalcoursemark






    })

  },



     addsemesterfinlmarks(){

     this.form.post('/add_semester_final_mark_form_action/'+this.$route.params.addstuent_courseid)



        .then((response)=>{

           console.log(response.data)


        $('#exampleModal').modal('hide')


          this.form.reset();

          this.showsemesterfinalcoursemark();



         if(response.data==11){


           Toast.fire({
           icon: 'error',
           title: 'You Already Take Semester Final This Course'
           })


         }else if(response.data==12){


              Toast.fire({
              icon: 'error',
              title: 'Please Take Four CT Then You Can Take Semester Final'
              })


            }else if(response.data==1){


                 Toast.fire({
                 icon: 'success',
                 title: 'Semester Final Mark Added Successfully'
                 })


               }




         else{

           console.log(response.data)

         }




          })
          .catch(()=>{

            console.log('error');

          })



    },







},




        mounted() {


          this.showsemesterfinalcoursemark();

          this.showexamname();





        },



    }
</script>
