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
             <span style="font-weight:bold;color:black;font-size:22px;margin-right:10px;">Name : {{stuinfo.student_name}}</span>
             <span style="font-weight:bold;color:black;font-size:22px;margin-right:10px;margin-left:20px;">Roll : {{stuinfo.student_roll}}</span>
             <span style="font-weight:bold;color:black;font-size:22px;margin-right:10px;margin-left:20px;">Level : {{stuinfo.level_name}}</span>
                <span style="font-weight:bold;color:black;font-size:22px;margin-right:10px;margin-left:20px;">Batch : {{stuinfo.batch_name}}</span>
           </div>

  <div class="but">
         <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
          Add Course
         </button>


  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
  <div class="modal-content"  style="width:1550px;margin-left:-515px;">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="color:green">Add Semester Course<span style="margin-left:50px;">{{studentinformation.level_name}}</span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>
  <div class="modal-body">

  <form enctype="multipart/form-data" role="form" @submit.prevent = "addmystudentcourse()">

        <div class="form-group">

           <!-- <span v-for="selectteacher in allstucourse">
           <input type="checkbox" style="margin-right:10px;" name="semester_courseid" v-model="semester_courseid" :value="selectteacher.course_id"><span style="margin-left:5px;font-weight:bold;">{{selectteacher.course_code}}</span><span style="padding-left:10px;color:green;font-weight:bold;">{{selectteacher.course_title}}</span></br>

         </span> -->


          <div class="conss" style="margin-left:20">

            <div class="row">




               <div class="col-md-12">

                 <span style="font-weight:bold;color:blue;font-size:22px;margin-bottom:2px;display:block;">Regular Course</span></br>



                 <span v-for="selectteacher in departmentregularcourse">
                 <input type="checkbox" style="margin-right:10px;" name="semester_courseid" v-model="semester_courseid" :value="selectteacher.course_id"><span style="margin-left:5px;font-weight:bold;">{{selectteacher.course_code}}</span><span style="padding-left:10px;color:green;font-weight:bold;">{{selectteacher.course_title}}</span></br>
                 </span>


               </div>
            </div>


              <div class="row" style="margin-top:50px;margin-bottom:100px;">
                 <div class="col-md-3">

                   <span style="font-weight:bold;color:blue;font-size:22px;margin-bottom:2px;display:block;">Option I</span></br>

                   <span v-for="selectteacher in thesisoptionI">
                   <input type="checkbox" style="margin-right:10px;" name="semester_courseid" v-model="semester_courseid" :value="selectteacher.course_id"><span style="margin-left:5px;font-weight:bold;">{{selectteacher.course_code}}</span><span style="padding-left:10px;color:green;font-weight:bold;">{{selectteacher.course_title}}</span></br>
                   </span>

                 </div>

                 <div class="col-md-3">



                 <span style="font-weight:bold;color:blue;font-size:22px;margin-bottom:2px;display:block;">Option I Sessional</span></br>



                 <span v-for="selectteacher in opsessionalI">

                  <input type="checkbox" style="margin-right:10px;" name="semester_courseid" v-model="semester_courseid" :value="selectteacher.course_id"><span style="margin-left:5px;font-weight:bold;">{{selectteacher.course_code}}</span><span style="padding-left:10px;color:green;font-weight:bold;">{{selectteacher.course_title}}</span></br>

                </span>



                 </div>



                 <div class="col-md-3">
                  <span style="font-weight:bold;color:blue;font-size:22px;margin-bottom:2px;display:block;">Option II</span></br>

                  <span v-for="selectteacher in thesisoptionII">
                   <input type="checkbox" style="margin-right:10px;" name="semester_courseid" v-model="semester_courseid" :value="selectteacher.course_id"><span style="margin-left:5px;font-weight:bold;">{{selectteacher.course_code}}</span><span style="padding-left:10px;color:green;font-weight:bold;">{{selectteacher.course_title}}</span></br>
                 </span>
                 </div>



                 <div class="col-md-3">
                  <span style="font-weight:bold;color:blue;font-size:22px;margin-bottom:2px;display:block;">Option II Sessional</span></br>

                <span v-for="selectteacher in thesisoptionIISessional">

                   <input type="checkbox" style="margin-right:10px;" name="semester_courseid" v-model="semester_courseid" :value="selectteacher.course_id"><span style="margin-left:5px;font-weight:bold;">{{selectteacher.course_code}}</span><span style="padding-left:10px;color:green;font-weight:bold;">{{selectteacher.course_title}}</span></br>
              </span>





                 </div>

            </div>



























          </div>








        </div>

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
    <th style="text-align:center;">Sl No</th>
    <th style="text-align:center;">Course Level</th>
    <th style="text-align:center;">Course Code</th>
    <th style="text-align:center;width:300px;">Course Title</th>
    <th style="text-align:center;">Course Type</th>
    <th style="text-align:center;">Course Credit</th>
    <th style="text-align:center;">Course Total Class</th>

    <th style="text-align:center;">Action</th>
</tr>




</thead>

<tbody>

 <tr v-for="(v_department,index) in displaymydepartmentcourse">

<!-- <tr> -->

    <td style="text-align:center;padding-top:30px">{{index+1}}</td>

    <td style="text-align:center;padding-top:30px;color:blue;">{{v_department.level_name}}</td>
    <td style="text-align:center;padding-top:30px">{{v_department.course_code}}</td>
    <td style="text-align:center;padding-top:30px;color:blue;">{{v_department.course_title}}</td>
    <td style="text-align:center;padding-top:30px">{{v_department.course_type}}</td>
    <td style="text-align:center;padding-top:30px;color:blue;">{{v_department.course_credit}}</td>
    <td style="text-align:center;padding-top:30px">{{v_department.course_class_number}}</td>




  <td>

     <center>

  <!-- <router-link :to="`/add_student_course_mark/${v_department.addstuent_courseid}`" class="btn btn-primary btn-sm" style="margin-top:17px;"><i class="fa fa-plus" aria-hidden="true"></i></router-link>
  <router-link :to ="`/add_course_semester_final_mark/${v_department.addstuent_courseid}`"class="btn btn-danger btn-sm" style="margin-top:17px;"><i class="fas fa-newspaper" style="color:white;" aria-hidden="true"></i></router-link>
  <router-link :to ="`/view_student_course_attentdance/${v_department.addstuent_courseid}`"class="btn btn-success btn-sm" style="margin-top:17px;"><i class="fas fa-school" style="color:white;" aria-hidden="true"></i></router-link> -->

  <router-link :to="`/add_student_coursect_mark/${v_department.addstuent_courseid}`" class="btn btn-primary btn-sm" style="margin-top:17px;"><i class="fa fa-plus" aria-hidden="true"></i></router-link>
    <router-link :to ="`/add_course_semester_final_mark/${v_department.addstuent_courseid}`"class="btn btn-danger btn-sm" style="margin-top:17px;"><i class="fas fa-newspaper" style="color:white;" aria-hidden="true"></i></router-link>
  <router-link :to ="`/view_student_course_attentdance/${v_department.addstuent_courseid}`"class="btn btn-success btn-sm" style="margin-top:17px;"><i class="fas fa-school" style="color:white;" aria-hidden="true"></i></router-link>
  <a class="btn btn-warning btn-sm" style="margin-top:17px;" @click.prevent = "deletestudentdeptcourse(v_department.addstuent_courseid)"><i class="fa fa-trash" aria-hidden="true"></i></a>


     </center>

     </td>
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
import _ from 'lodash'

import Mybackendheader from "../backendlayout/Adminheader.vue"
import MyBackendsidebar from "../backendlayout/Adminsidebar.vue"
import Mybackendfooter from "../backendlayout/Adminfooter.vue"
    export default {


      data () {
        return {


        departmentregularcourse:{},
        thesisoptionI:{},
        thesisoptionII:{},
        thesisoptionIISessional:{},
        opsessionalI:{},
        studentinformation:{},

        semester_courseid:[],



        displaymydepartmentcourse:{},
        stuinfo:{},

          form: new Form({


                 	addstuent_courseid:'',
                  course_stu_id :'',
                  semester_courseid :'',
                  stuentcourseadded_date:'',
                  studentlevelid:''



          })
        }
      },

      components: {
         MyBackendsidebar,
         Mybackendheader,
         Mybackendfooter,
       },


    methods:{



    deletestudentdeptcourse(addstuent_courseid){

      axios.get('/delete_student_department_course/'+addstuent_courseid)
      .then((response)=>{
        Toast.fire({
        icon: 'success',
        title: 'Student Department Course Delete Successfully'
       })

        //  this.showallteacher();
          //  this.$store.dispatch("allStudent")

            this.displaymydptcourse();


       })

       },



      showmyragiballdepartment(){

          axios.get('/showmy_student_all_course/'+this.$route.params.student_id).then((res) => {

          // console.log(res.data);

  this.opsessionalI = res.data.opsessionalI,



           this.departmentregularcourse = res.data.departmentregularcourse,
           this.thesisoptionI = res.data.thesisoptionI,
            this.thesisoptionII = res.data.thesisoptionII,
          // this.Optionsessional = res.Optionsessional,
          //
             this.thesisoptionIISessional = res.data.thesisoptionIISessional,
                this.studentinformation = res.data.studentinformation








          })

      },





      displaymydptcourse(){

          axios.get('/display_my_dpt_course/'+this.$route.params.student_id).then((res) => {



            //  console.log(res.data)
           this.displaymydepartmentcourse = res.data.displaymydepartmentcourse,
           this.stuinfo = res.data.stuinfo

        //   $stuinfo
        //  displaymydepartmentcourse


          })

        },






      showstudentlevel(){

          axios.get('/student_level_show/'+this.$route.params.student_id).then((res) => {

          this.studentlevelshow = res.data.studentlevelshow


          })





      },




addmystudentcourse(){

  axios.post('/my_select_course/'+this.$route.params.student_id,{semester_courseid:this.semester_courseid})
       .then((response)=>{



        //  console.log(response.data)

    this.displaymydptcourse();

         $('#exampleModal').modal('hide')

              this.form.reset();


              Toast.fire({
                icon: 'success',
                title: 'Department Course Added Successfully'
                })




//
//
//
//          if(response.data==0){
//
//            Swal.fire({
//
//                 icon: 'error',
//                 title: 'Oops...',
//                 text: 'Sorry This Student Allready Take this Course !!',
//
//                 })
//
//          }else if(response.data==1){
//
//             Toast.fire({
//             icon: 'success',
//             title: 'Course Added Successfully'
//             })
//
//
//          }else{
//
//  console.log(response.data)
//
//          }




        })
        .catch(()=>{
         console.log('oppp fail');
          })




},



   allsemestercourseinform(){

       axios.get('/show_student_semester_course/'+this.$route.params.student_id).then(({data}) => (this.allstucourse = data));

   },

//    addstudentcourse(){
//
//    this.form.post('/add_student_course_formaction/'+this.$route.params.student_id)
//       .then((response)=>{
//
//         this.displaystudentallsemestercourse();
//
//         $('#exampleModal').modal('hide')
//
//              this.form.reset();
//
//
//
//         if(response.data==0){
//
//           Swal.fire({
//
//                icon: 'error',
//                title: 'Oops...',
//                text: 'Sorry This Student Allready Take this Course !!',
//
//                })
//
//
//
//
//         }else if(response.data==1){
//
//           //this.$router.push('/add_student')
//
//            Toast.fire({
//            icon: 'success',
//            title: 'Course Added Successfully'
//            })
//
//
//
//
//
//         }else{
//
// console.log('hi ragib');
//
//         }
//
//
//         })
//         .catch(()=>{
//
//           console.log('error');
//
//         })
//
//
//
//   },


  displaystudentallsemestercourse(){

      axios.get('/display_student__all_semester_course/'+this.$route.params.student_id).then(({data}) => (this.allsemestercourse = data));

  },

// studentcourselevel(){
//
//
//   axios.get('/my_student_course_level').then(({data}) => (this.studentcourselevel = data));
//
//
//
// }







},





        mounted() {

    this.displaymydptcourse();

    this.showmyragiballdepartment();



        ///  this.allsemestercourseinform();
        ///  this.displaystudentallsemestercourse();
        //  this.showstudentlevel();

          // this.studentcourselevel();

        //  this.displayalldepartment();
          //  this.myallhall();


        //  this.showallteacherinform();



        }
    }
</script>
