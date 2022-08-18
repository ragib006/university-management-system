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

             <h3 class="card-title"></h3>

            <span style="font-weight:bold;color:blue;font-size:19px;margin-right:10px;">Semester Final Result {{totalcredit}}</span>

             <span style="font-weight:bold;color:green;font-size:19px;margin-right:10px;">Student Name :</span>
             <span style="font-weight:bold;color:black;font-size:19px;margin-right:10px;">{{studentinfo.student_name}}</span>

              <span style="font-weight:bold;color:green;font-size:19px;margin-right:5px;">Student Roll :</span>
             <span style="font-weight:bold;color:black;font-size:19px;margin-left:5px;">{{studentinfo.student_roll}}</span>

             <span style="font-weight:bold;color:green;font-size:19px;margin-left:17px;">Level Name :</span>
             <span style="font-weight:bold;color:black;font-size:19px;margin-left:10px;">{{studentinfo.level_name}}</span>

             <span style="font-weight:bold;color:green;font-size:19px;margin-left:17px;">Total Credit :</span>
             <span style="font-weight:bold;color:black;font-size:19px;margin-left:10px;">{{totalcredit}}</span>



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


  <tr v-for="(v_department,index) in allsemesterfinalresult">


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

 <span style="margin-left:350px;margin-top:20px;display:block;">
      <span style="font-weight:bold;color:green;font-size:22px;">Exam Credit = </span><span style="margin-left:10px;font-weight:bold;color:blue;font-size:22px;">{{studentgiveexamtotalcredit }}</span>
   <span style="font-weight:bold;color:green;font-size:22px;margin-left:100px;">CGPA = </span><span style="margin-left:10px;font-weight:bold;color:blue;font-size:22px;">{{maincgpa}}</span>
 </span>


 <form enctype="multipart/form-data" role="form" @submit.prevent = "resultpublish()">
  
  <span style="margin-left:1200px;margin-top:20px;display:block;">
   <button type="submit" class="btn btn-primary" style="margin-top:17px;float:right;">Publish Result</button>
 </span>
 </form>




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
            maincgpa:{},
            totalcredit:{},
            studentgiveexamtotalcredit:{},


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
  resultpublish(){

  this.form.post('/result_publish_formction/'+this.$route.params.student_id)
     .then((response)=>{


     console.log('the.............................................',response.data)


     this.$router.push('/add_student')

          if(response.data==1){

           // this.$router.push('/add_student')

           Toast.fire({
           icon: 'success',
           title: 'All Subject Pass And Semester Promoted'
          })

         }else if(response.data==2){


          Toast.fire({
           icon: 'success',
           title: '1 Subject Fail And Semester Promoted'
          })


        }else if(response.data==3){


           Toast.fire({
           icon: 'success',
           title: '2 Subject Fail And Semester Promoted'
          })


         }

         else if(response.data==4){


           Toast.fire({
           icon: 'success',
           title: 'OPPS !! 3 Or More then Three Subject fail and Semester Drop'
          })


         }


          else if(response.data==9){


           Toast.fire({
           icon: 'success',
           title: 'Running 1 And Previous 1 Subject Fail, Semester Promoted'
          })


         }

         else if(response.data==10){


           Toast.fire({
           icon: 'success',
           title: 'Running 1 And Previous 2 Subject Fail, Need Referred or Backlog'
          })


         }

           else if(response.data==11){


           Toast.fire({
           icon: 'success',
           title: 'Running 2 And Previous 1 Subject Fail, Need Referred or Backlog'
          })


         }

         else if(response.data==12){


           Toast.fire({
           icon: 'success',
           title: 'Previous 2 Subject Fail, Semester Promoted'
          })


         }

          else if(response.data==13){


           Toast.fire({
           icon: 'success',
           title: 'Previous 1 Subject Fail, Semester Promoted'
          })


         }

          else if(response.data==14){


           Toast.fire({
           icon: 'success',
           title: 'Running 2 And Previous 2 subject Fail, eed Referred or Backlog'
          })


         }

     else if(response.data==15){


           Toast.fire({
           icon: 'success',
           title: 'All Subject Pass And Semester Promoted'
          })


         }



           else if(response.data==29){


           Toast.fire({
           icon: 'success',
          // title: 'After Referred or Backlog Exam,Running 1 and Previous 1 Subject Fail and Semester Promoted'

          // title: 'After Referred or Backlog Exam,Running 1 and Previous 1 Subject Fail and Semester Promoted'

              title: 'Referred or Backlog Exam Result Publish Successfully'
          })


         }

        else if(response.data==30){


           Toast.fire({
           icon: 'success',
         //  title: 'After Referred or Backlog Exam,Running 1 and Previous 2 Subject Fail and Semester Pro'

              title: 'Referred or Backlog Exam Result Publish Successfully'
          })


         }


           else if(response.data==31){


           Toast.fire({
           icon: 'success',
           title: 'After Referred or Backlog Exam,Running 2 and Previous 1 Subject Fail and Semester Drop'
          })


         }


           else if(response.data==32){


           Toast.fire({
           icon: 'success',
           // title: 'After Referred or Backlog Exam,Running 0 and Previous 2 Subject Fail and Promoted New Semester'

              title: 'Referred or Backlog Exam Result Publish Successfully'
          })


         }


           else if(response.data==33){


           Toast.fire({
           icon: 'success',
          // title: 'After Referred or Backlog Exam,Running 0 and Previous 1 Subject Fail and Promoted New Semester'

              title: 'Referred or Backlog Exam Result Publish Successfully'
          })


         }


           else if(response.data==34){


           Toast.fire({
           icon: 'success',
           title: 'After Referred or Backlog Exam,Running 2 and Previous 2 Subject Fail and Semester Drop'
          })


         }


          else if(response.data==35){


           Toast.fire({
           icon: 'success',
           title: 'After Referred or Backlog Exam, Successfully All Subject Pass'
          })


         }



 else if(response.data==36){


           Toast.fire({
           icon: 'success',
          // title: 'After Referred or Backlog Exam,Running 1 Subject Fail and Semester Promoted'

              title: 'Referred or Backlog Exam Result Publish Successfully'
          })


         }



 else if(response.data==37){


           Toast.fire({
           icon: 'success',
          
          // title: 'After Referred or Backlog Exam,Running 2 Subject Fail and Semester Promoted'

              title: 'Referred or Backlog Exam Result Publish Successfully'
          })


         }



 else if(response.data==40){


           Toast.fire({
           icon: 'success',
          
           //title: 'After Referred or Backlog Exam, Fail More Then 3 and Semester Promoted'


              title: 'Referred or Backlog Exam Result Publish Successfully'
          })


         }


 else if(response.data==201){


           Toast.fire({
           icon: 'success',
          
           title: 'Running Semester Fail 3 or 3+ ,Previous Semester Fail 2 and Semester Drop'

            //  title: 'Referred or Backlog Exam Result Publish Successfully'
          })


         }


 else if(response.data==202){


           Toast.fire({
           icon: 'success',
          
           title: 'Running Semester Fail 3 or 3+ ,Previous Semester Fail 1 and Semester Drop'
          })


         }

     else if(response.data==203){


           Toast.fire({
           icon: 'success',
          
           title: 'Running Semester Fail 3 or 3+ ,Previous Semester Fail 0 and Semester Drop'
          })


         }


            else if(response.data==500){


           Toast.fire({
           icon: 'success',
          
           title: 'Running 1,Previous Semester Fail 3 and Semester Drop'
          })


         }



         else if(response.data==603){


           Toast.fire({
           icon: 'success',
          
           title: 'Running 0,Previous Semester Fail 3 and Semester Promoted'
          })


         }


         else if(response.data==0){


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


   //console.log(res.data)
   this.maincgpa = res.data.maincgpa
 //
 // this.semesterfinalcgpa = res.data.semesterfinalcgpa






  })

},






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









  // showcourseinfoinmark(){
  //
  //   axios.get('/course_info_in_add_marks/'+this.$route.params.addstuent_courseid).then((res) => {
  //
  //   this.courseinfo = res.data.courseinfo
  //
  //
  //   })
  //
  // },


  showsemesterfinalcourseresult(){

    axios.get('/show_student_all_semester_final_course_result/'+this.$route.params.student_id).then((res) => {

    console.log(res.data)

      this.allsemesterfinalresult = res.data.allsemesterfinalresult,
      this.studentinfo = res.data.studentinfo,
      this.totalcredit =  res.data.totalcredit,
      this.studentgiveexamtotalcredit = res.data.studentgiveexamtotalcredit




    })

  },



     addsemesterfinlmarks(){

     this.form.post('/add_semester_final_mark_form_action/'+this.$route.params.addstuent_courseid)



        .then((response)=>{




        $('#exampleModal').modal('hide')


          this.form.reset();


                   //  console.log(response.data)

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

           this.showsemesterfinalcourseresult();
           this.studentsemesterfinlcgpa();

        //  this.showsemesterfinalcoursemark()

          //  this.showcourseinfoinmark();
          //  this.showsemesterfinalcoursemark();


          //this.showcourseinfoinmark();
           //this.showallctmark();


        // axios.get('/edit_busplaceholder_value/'+this.$route.params.bus_id)
        // .then((response)=>{
        //
        // this.form.fill(response.data)
        //
        // })



        },



    }
</script>
