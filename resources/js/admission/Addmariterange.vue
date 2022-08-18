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
             <h3 class="card-title">All</h3>
           </div>

  <div class="but">
         <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
          Add Range
         </button>
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
  <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="color:green">Add Range</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>
  <div class="modal-body">

  <form enctype="multipart/form-data" role="form" @submit.prevent = "addmaritrange()">

      

      <!---

                 <div class="form-group" style="width:500px">
                   <label for="exampleFormControlSelect1">Select Admission</label>
                     <select  v-model="form.admission_exam_id" class="form-control" id="exampleFormControlSelect1" name="admission_exam_id" :class="{ 'is-invalid': form.errors.has('admission_exam_id') }" style="" required>
                       <option value="" disabled>Select</option>

                       <option style="color:green;font-weight:bold;" v-for="selectdept in alladmission" :value="selectdept.admissionexam_id">{{selectdept.admissionexam_name}}</option>

                     </select>
                     <has-error :form="form" field="admission_exam_id"></has-error>
              </div>
-------->



     <div class="form-group">
                   <label for="exampleFormControlSelect1">Select Exam</label>
                     <select  v-model="form.marit_range_exam_id" class="form-control" id="exampleFormControlSelect1" name="marit_range_exam_id" :class="{ 'is-invalid': form.errors.has('marit_range_exam_id') }" style="" required>
                       <option value="" disabled>Select</option>

                       <option style="color:green;font-weight:bold;" v-for="selectdept in alladmission" :value="selectdept.admissionexam_id">{{selectdept.admissionexam_name}}</option>

                     </select>
                     <has-error :form="form" field="marit_range_exam_id"></has-error>
              </div>




<div class="form-group">
                     <label for="exampleFormControlSelect1">Select Type</label>
                       <select  v-model="form.marite_type" class="form-control" id="exampleFormControlSelect1" name="marite_type" :class="{ 'is-invalid': form.errors.has('marite_type') }" style="" required>
                         <option value="" disabled>Select</option>
                      
                          <option value="Merit">Merit</option>
                          <option value="Waiting">Waiting</option>
                          <option value="None">None</option>
       </select>
                       <has-error :form="form" field="marite_type"></has-error>
                </div>









        <div class="form-group">
        <label>Range</label>
        <input v-model="form.marite_range" type="number" name="marite_range"
        class="form-control" :class="{ 'is-invalid': form.errors.has('marite_range') }" placeholder="Enter Marit Range">
        <has-error :form="form" field="marite_range"></has-error>
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
    <th style="text-align:center;">Marit Id</th>
    <th style="text-align:center;">Admission Exam Name</th>

    <th style="text-align:center;">Type</th>
    <th style="text-align:center;">Range</th>
    <th style="text-align:center;">Action</th>
</tr>




</thead>

<tbody>





 <tr v-for="(v_department,index) in maritrange">

   

    <td style="text-align:center;padding-top:30px">{{index+1}}</td>
    <td style="text-align:center;padding-top:30px">{{v_department.marit_id}}</td>
    <td style="text-align:center;padding-top:30px;color:blue;">{{v_department.admissionexam_name}}</td>
    <td style="text-align:center;padding-top:30px;">{{v_department.marite_type}}</td>
    <td style="text-align:center;padding-top:30px;">{{v_department.marite_range}}</td>
  





  <td>

     <center>

<!---
  <router-link :to="`/edit_admission_exam/${v_department.admissionexam_id}`" class="btn btn-success btn-sm" style="margin-top:17px;" ><i class="fa fa-edit" aria-hidden="true"></i></router-link>


  <router-link :to="`/all_appicant/${v_department.admissionexam_id}`" class="btn btn-danger btn-sm" style="margin-top:17px;" ><i class="fa fa-eye" aria-hidden="true" style="color:white;"></i></router-link>


  <router-link :to="`/view_exam_result/${v_department.admissionexam_id}`" class="btn btn-danger btn-sm" style="margin-top:17px;" ><i class="fas fa-users" style="color:white;"></i></router-link>

 -->

    <a class="btn btn-warning btn-sm" style="margin-top:17px;" @click.prevent = "deletemarit(v_department.marit_id)"><i class="fa fa-trash" aria-hidden="true"></i></a>


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

         // alladmission:{},

          alladmission:{},

          maritrange:{},


          // Create a new form instance
          form: new Form({

               // admissionexam_id: '',
                //admission_exam_id:'',
                marit_range_exam_id:'',

                marite_type:'',

                marite_range:'',
              
      


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


    addmaritrange(){
    this.form.post('/add_admission_exam_marit_range')

     .then((response)=>{



            //    console.log(response.data);

        //  this.displaystudentallsemestercourse();
        //  this.this.showallctmark();
          $('#exampleModal').modal('hide')


          this.form.reset();

         this.showallmaritrange();

         if(response.data==1){


           Toast.fire({
           icon: 'success',
           title: 'Marite Type Added Successfully'
           })


         }else{


           Swal.fire({

                icon: 'error',
                title: 'Oops...',
                text: 'This Allready Exist !!',

                })



         }


          })
          .catch(()=>{

            console.log('error');

          })
   

         },







      showallmaritrange(){

     axios.get('/exam_show_all_marit_range').then((res) => {

     this.maritrange = res.data.maritrange



     })

   },



deletemarit(marit_id){
  axios.get('/delate_merit_id/'+marit_id)
  .then((response)=>{


    Toast.fire({
    icon: 'success',
    title: ' Delate Successfully'
     })


       this.showallmaritrange();


      })
   .catch(()=>{
   console.log('fail');

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



        mounted(){

              this.showallmaritrange();


         this.displayalladmissionexam();

     

       //   this.showallteacherinform();

          // this.showcategoryinselectform();
          // this.$store.dispatch("allCategory",this.currentPage);
          // this.RealSerchcategory();


        }
    }
</script>
