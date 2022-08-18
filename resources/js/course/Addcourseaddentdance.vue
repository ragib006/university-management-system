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
           <div class="title">
            <span style="font-size:18px;font-weight:bold;">Course Code : </span><span style="font-size:18px;font-weight:bold;color:green;">{{courseinfo.course_code}}</span>
            <span style="font-size:18px;font-weight:bold;margin-left:20px;">Course Title : </span><span style="font-size:18px;font-weight:bold;color:green">{{courseinfo.course_title}}</span>
            <span style="font-size:18px;font-weight:bold;margin-left:20px;">Course Type : </span><span style="font-size:18px;font-weight:bold;color:green">{{courseinfo.course_type}}</span>
              <span style="font-size:18px;font-weight:bold;margin-left:20px;">Course Creadit : </span><span style="font-size:18px;font-weight:bold;color:green">{{courseinfo.course_credit}}</span>

              <span style="font-size:18px;font-weight:bold;margin-left:20px;">Course Level : </span><span style="font-size:18px;font-weight:bold;color:green">{{courseinfo.level_name}}</span>
                  <!-- <h3 class="card-title">fdgfgf</h3> -->
           </div>

  <!-- <div class="but">

   <h3 class="card-title">{{courseinfo.course_title}}</h3>

 </div> -->


 </div>
 </div>




<form enctype="multipart/form-data" role="form" @submit.prevent = "mycourseattentdance()">
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
    <th style="text-align:center;">Batch</th>

    <th style="text-align:center;">Attentdance</th>
</tr>




</thead>

<tbody>

 <tr v-for="(v_department,index) in studentcourse">

   <!-- <tr> -->
      <td style="text-align:center;padding-top:30px">{{index+1}}</td>
    <td style="text-align:center;padding-top:30px;">{{v_department.student_id}}</td>
    <td style="text-align:center;padding-top:30px;color:blue;">{{v_department.student_roll}}</td>
    <td style="text-align:center"><img :src="ourimage(v_department.student_image)" alt="" style="height:70px;width:70px;"></td>

    <td style="text-align:center;padding-top:30px;">{{v_department.student_name}}</td>

      <td style="text-align:center;padding-top:30px;color:blue;">{{v_department.department_name}}</td>
      <td style="text-align:center;padding-top:30px;color:blue;">{{v_department.level_name}}</td>
      <td style="text-align:center;padding-top:30px;color:blue;">{{v_department.batch_name}}</td>




    <td>
   <center>


     <input style="margin-top:30px;color:blue;" type="checkbox" name="course_attent_studentid" v-model="course_attent_studentid" :value="v_department.student_id">

      <!-- <input v-show="false" name="course_id" v-model="courseinfo.course_id"> -->


      <!-- <input type="checkbox"> -->



  </center>


  </td>


     </tr>

 </tbody>





 </table>

 <button type="submit" class="btn btn-success" style="float:right;margin-top:30px;">
              Take Attentdance
            </button>

 </div>

</form>



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

          course_attent_studentid:[],

          // course_attent_pre_or_abs:1,
          //
          // course_attent_studentid:[],




          coursename:{},

          //allcoursestudent:{},

          studentcourse:{},

          course_id:'',
          courseinfo:{},

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


      ourimage(img){

              return "/images/"+img;

          },

      ragibcoursenameshow(){

     axios.get('/ragib_course_name_show/'+this.$route.params.course_id).then((res) => {

     this.coursename = res.data.coursename


     })

   },


   allcourseaddentdancetake(){

  axios.get('/show_all_course_attentdance_taker_student/'+this.$route.params.course_id).then((res) => {

    this.studentcourse = res.data.studentcourse,
    this.courseinfo = res.data.courseinfo



  //console.log(res.data)


  })

},

// addcourseattantance(){
//
//  this.form.post('/add_course_attentdance_form_action/'+this.course_attent_studentid)
//
//      .then((response)=>{
//
//         this.$router.push('/add_course')
//
//        Toast.fire({
//        icon: 'success',
//        title: 'Attentdance Take Successfully'
//
//         })
//
//       })
//       .catch(()=>{
//        console.log('oppp fail');
//         })
//
// },


mycourseattentdance(){

   axios.post('/my_course_attendance_form_action/'+this.$route.params.course_id,{course_attent_studentid:this.course_attent_studentid})

       .then((response)=>{

    //  console.log(response.data)

         // this.$router.push('/add_course')
         //
         //      Toast.fire({
         //      icon: 'success',
         //      title: 'Attentdance Take Successfully'
         //
         //       })




      if(response.data==0){

         Swal.fire({

              icon: 'error',
              title: 'Oops...',
              text: 'Sorry You Allready Take Attentdance This Course Today !!',

              })

            }else if(response.data==1){

             Toast.fire({
             icon: 'success',
             title: 'Attentdance Take Successfully This Course'

              })

            this.$router.push('/add_course')

            }else{

             console.log(response.data)

            }













        })
        .catch(()=>{
         console.log('oppp fail');
          })



},







},





        mounted() {

          //
          // this.ragibcoursenameshow();
         this.allcourseaddentdancetake();




        }
    }
</script>
