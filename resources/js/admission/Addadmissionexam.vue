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
             <h3 class="card-title">All Admission Exam</h3>
           </div>

  <div class="but">
         <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
          Add Admission Exam
         </button>
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
  <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="color:green">Add Admission Exam</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>
  <div class="modal-body">

  <form enctype="multipart/form-data" role="form" @submit.prevent = "adddepartment()">





        <div class="form-group">
        <label>Admission Test Name</label>
        <input v-model="form.admissionexam_name" type="text" name="admissionexam_name"
        class="form-control" :class="{ 'is-invalid': form.errors.has('admissionexam_name') }" placeholder="Enter Admission Name">
        <has-error :form="form" field="admissionexam_name"></has-error>
        </div>



      <div class="form-group">
        <label>Admission Exam Mark</label>
        <input v-model="form.admission_exam_mark" type="number" name="admission_exam_mark"
        class="form-control" :class="{ 'is-invalid': form.errors.has('admission_exam_mark') }" placeholder="Enter Admission Exam Mark">
        <has-error :form="form" field="admission_exam_mark"></has-error>
        </div>









        <div class="form-group">
        <label>Admission Test Date</label>
        <input v-model="form.admission_test_date" type="text" name="admission_test_date"
        class="form-control" :class="{ 'is-invalid': form.errors.has('admission_test_date') }" placeholder="Enter Admission Test Date">
        <has-error :form="form" field="admission_test_date"></has-error>
        </div>

        <div class="form-group">
        <label>Applying Last Date</label>
        <input v-model="form.admission_applying_last_date" type="text" name="admission_applying_last_date"
        class="form-control" :class="{ 'is-invalid': form.errors.has('admission_applying_last_date') }" placeholder="Enter Applying Last Date">
        <has-error :form="form" field="admission_applying_last_date"></has-error>
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
   <th style="text-align:center;">Sl</th>
  
    <th style="text-align:center;">Admission Exam Name</th>

    <th style="text-align:center;">Admission Exam Mark</th>

    <th style="text-align:center;">Admission Exam Date</th>
    <th style="text-align:center;">Applying Last Date</th>
    <th style="text-align:center;">Admission Test Year</th>
    <th style="text-align:center;">Action</th>
</tr>




</thead>

<tbody>


 <tr v-for="(v_department,index) in alladmission">

   

    <td style="text-align:center;padding-top:30px">{{index+1}}</td>
  
    <td style="text-align:center;padding-top:30px;color:blue;">{{v_department.admissionexam_name}}</td>

    <td style="text-align:center;padding-top:30px">{{v_department.admission_exam_mark}}</td>

    <td style="text-align:center;padding-top:30px;">{{v_department.admission_test_date}}</td>
    <td style="text-align:center;padding-top:30px;">{{v_department.admission_applying_last_date}}</td>
    <td style="text-align:center;padding-top:30px;">{{v_department.admission_test_year}}</td>





  <td>

     <center>


  <router-link :to="`/edit_admission_exam/${v_department.admissionexam_id}`" class="btn btn-success btn-sm" style="margin-top:17px;" ><i class="fa fa-edit" aria-hidden="true"></i></router-link>


  <router-link :to="`/all_appicant/${v_department.admissionexam_id}`" class="btn btn-danger btn-sm" style="margin-top:17px;" ><i class="fa fa-eye" aria-hidden="true" style="color:white;"></i></router-link>


  <router-link :to="`/view_exam_result/${v_department.admissionexam_id}`" class="btn btn-danger btn-sm" style="margin-top:17px;" ><i class="fas fa-users" style="color:white;"></i></router-link>

 

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

          alladmission:{},

          // Create a new form instance
          form: new Form({

                admissionexam_id: '',
                admissionexam_name : '',
                admission_test_date: '',
                admission_applying_last_date:'',
                admission_exam_mark:'',
                admission_test_year:'',
      


          })
        }
      },

      components: {
         MyBackendsidebar,
         Mybackendheader,
         Mybackendfooter,
       },



    methods:{


      //showalldepartmentinform
     displayalladmissionexam(){


     axios.get('/show_all_admission_exam').then(({data}) => (this.alladmission = data));


    },


    adddepartment(){
    this.form.post('/add_admin_admission_exam')
   .then((response)=>{

       this.displayalladmissionexam();

    $('#exampleModal').modal('hide')

         this.form.reset();


      if(response.data==0){



                Toast.fire({
                icon: 'error',
                title: 'This Admission Exam Already Exist'
                })


      }else{





        Toast.fire({
        icon: 'success',
        title: 'Admission Exam Added Successfully'
        })



      }



         })
         .catch(()=>{
         console.log('oppp fail');
         })

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

         this.displayalladmissionexam();


       //   this.showallteacherinform();

          // this.showcategoryinselectform();
          // this.$store.dispatch("allCategory",this.currentPage);
          // this.RealSerchcategory();


        }
    }
</script>
