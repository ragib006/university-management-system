<template>
    <span>

<Mybackendheader></Mybackendheader>

<MyBackendsidebar></MyBackendsidebar>



          <!-- Main content -->
  <section class="content" style="margin-top:20px;margin-bottom:500px;width:80%;margin-left:18%">
    <div class="container-fluid">
       <div class="row">
         <div class="col-12">


  <div class="card" style="padding-bottom:20px;">
  <div class="card-header">
  <div class="main">
           <div class="title" style="width:900px;float:left">
             <h3 class="card-title" style="width:200px;float:left">Exam Result</h3>
             
             <span style="font-size:16px">{{examinfo.admissionexam_name}}</span>

           </div>





 </div>
 </div>



 <div class="card-body">



 <table id="section" class="table table-bordered table-striped">




 <thead>

 <tr>
   <th style="text-align:center;">Marit SL</th>
    <th style="text-align:center;">Result Id</th>

    <th style="text-align:center;">Applicant Roll</th>
    <th style="text-align:center;">Admission Exam Name</th>
        <th style="text-align:center;">Admission Mark</th>
    <th style="text-align:center;">Student Admission Exam Mark</th>

    <!---
    <th style="text-align:center;">Action</th>--->
</tr>




</thead>



<tbody>


 <tr v-for="(v_department,index) in examresult">

   
    <td style="text-align:center;padding-top:30px">{{index+1}}</td>


    
    <td style="text-align:center;padding-top:30px">{{v_department.admission_result_id}}</td>
    <td style="text-align:center;padding-top:30px;color:blue;">{{v_department.stu_roll}}</td>
    <td style="text-align:center;padding-top:30px;">{{v_department.admissionexam_name}}</td>
        <td style="text-align:center;padding-top:30px">{{v_department.admission_exam_mark}}</td>
    <td style="text-align:center;padding-top:30px;">{{v_department.stu_exm_mark}}</td>



    <!---
  
    <td>

      <a class="btn btn-warning btn-sm" style="margin-top:17px;" @click.prevent = "deletestudentadmissionresult(v_department.admission_result_id)"><i class="fa fa-trash" aria-hidden="true"></i></a>

    </td>-->


     </tr>

 </tbody>





 </table>
 </div>




  </div>


<!---

      <a class="btn btn-warning btn-sm" style="margin-top:17px;" @click.prevent = "addlevel()">publish</a>

--->


                </div>

              </div>

            </div>

          </section>

       <Mybackendfooter></Mybackendfooter>

    </span>
</template>



<script>
import _ from 'lodash'

import Mybackendheader from "../backendlayout/Adminheader.vue"
import MyBackendsidebar from "../backendlayout/Adminsidebar.vue"
import Mybackendfooter from "../backendlayout/Adminfooter.vue"

    export default {


      data () {
        return {

         // showalldepartment:{},

          examresult:{},
          examinfo:{},

          // Create a new form instance
          form: new Form({

             //   admissionexam_id: '',
             //   admissionexam_name : '',
             //   admission_test_date: '',
             //   admission_applying_last_date:'',
             //   admission_test_year:'',
      


          })
        }
      },

      components: {
         MyBackendsidebar,
         Mybackendheader,
         Mybackendfooter,
       },



    methods:{





          addlevel(){
    this.form.post('/my',{rag:4})
   .then((response)=>{


    console.log(response.data)

       // this.displayalldepartment();
        // this.myalllevel();

    //$('#exampleModal').modal('hide')

      //   this.form.reset();


        //if(response.data==0){

          //    Toast.fire({
          //   icon: 'error',
          //      text: 'Sorry This Level Allready Exist !!',

          //       })

          //     }else if(response.data==1){

          //      Toast.fire({
          //      icon: 'success',
           //     title: 'Level Added Successfully'

            //     })

           //    }else{

           //     console.log(response.data)

           //    }


         })
         .catch(()=>{
         console.log('oppp fail');
         })

         },


      //showalldepartmentinform
    // result(){


   //  axios.get('/show_all_admission_exam').then(({data}) => (this.alladmission = data));


   // },



   


      result(){

    axios.get('/view_my_specefic_exam_result/'+this.$route.params.admissionexam_id).then((res) => {


     // console.log(res.data)

        this.examinfo = res.data.examinfo,
       this.examresult = res.data.examresult



      })


    console.log('hellow.............................');

   },





},


// computed:{
//
// // getallcategory(){
// //
// // return this.$store.getters.getCategory
// // }
//
// },




        mounted() {

       //  this.displayalladmissionexam();

       this.result();


       //   this.showallteacherinform();

          // this.showcategoryinselectform();
          // this.$store.dispatch("allCategory",this.currentPage);
          // this.RealSerchcategory();


        }
    }
</script>
