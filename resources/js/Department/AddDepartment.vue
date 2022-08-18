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
           <div class="title" style="width:1000px;float:left">
             <h3 class="card-title">All Department</h3>
           </div>

  <div class="but">
         <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
          Add Department
         </button>
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
  <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="color:green">Add Deprtment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>
  <div class="modal-body">

  <form enctype="multipart/form-data" role="form" @submit.prevent = "adddepartment()">





        <div class="form-group">
        <label>Department Name</label>
        <input v-model="form.department_name" type="text" name="department_name"
        class="form-control" :class="{ 'is-invalid': form.errors.has('department_name') }" placeholder="Enater Department Name">
        <has-error :form="form" field="department_name"></has-error>
        </div>

        <div class="form-group">
        <label>Department Dean</label>
        <input v-model="form.department_dean" type="text" name="department_dean"
        class="form-control" :class="{ 'is-invalid': form.errors.has('department_dean') }" placeholder="Enater Department Dean">
        <has-error :form="form" field="department_dean"></has-error>
        </div>

        <div class="form-group">
        <label>Department Head</label>
        <input v-model="form.deprtment_head" type="text" name="deprtment_head"
        class="form-control" :class="{ 'is-invalid': form.errors.has('deprtment_head') }" placeholder="Enater Department Head">
        <has-error :form="form" field="deprtment_head"></has-error>
        </div>

        <div class="form-group">
        <label>Department Tuition Fees</label>
        <input v-model="form.department_semester_fee" type="number" name="department_semester_fee"
        class="form-control" :class="{ 'is-invalid': form.errors.has('department_semester_fee') }" placeholder="Enater Department Tuition">
        <has-error :form="form" field="department_semester_fee"></has-error>
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
    <th style="text-align:center;">Department Id</th>
    <th style="text-align:center;">Department Name</th>
    <th style="text-align:center;">Department Dean</th>
    <th style="text-align:center;">Department Head</th>
    <th style="text-align:center;">Tution Fee</th>
    <th style="text-align:center;">Publish Date</th>
    <th style="text-align:center;">Status</th>
    <th style="text-align:center;">ON/OFF</th>
    <th style="text-align:center;">Action</th>
</tr>




</thead>

<tbody>

 <tr v-for="(v_department,index) in showalldepartment">

   <!-- <tr> -->

    <td style="text-align:center;padding-top:30px">{{index+1}}</td>
    <td style="text-align:center;padding-top:30px">{{v_department.department_id}}</td>
    <td style="text-align:center;padding-top:30px;color:blue;">{{v_department.department_name}}</td>
    <td style="text-align:center;padding-top:30px;">{{v_department.department_dean }}</td>
    <td style="text-align:center;padding-top:30px;">{{v_department.deprtment_head }}</td>
    <td style="text-align:center;padding-top:30px;">{{v_department.department_semester_fee }} TK</td>


    <!-- <td style="text-align:center;padding-top:30px;">{{v_department.teacher_name}}</td> -->

    <!-- <td style="text-align:center;padding-top:30px;">{{v_department.teacher_name}}</td>
    <td style="text-align:center;padding-top:30px;">{{v_department.teacher_name}}</td> -->
      <td style="text-align:center;padding-top:30px;color:blue;">{{v_department.department_added_date}}</td>

    <td>

    <div v-if="v_department.department_added_date_status == 1">
     <p style="text-align:center;color:blue;padding-top:17px">Active</p>
    </div>
    <div v-else="v_department.department_added_date_status == 0">
     <p style="text-align:center;color:red;padding-top:17px">Unactive</p>
    </div>


    </td>

    <td>

    <div v-if="v_department.department_added_date_status == 1">
    <a class="btn btn-primary btn-sm" style="margin-top:15px;color:white;margin-left:30px;" @click.prevent = "activedepartmentoff(v_department.department_id)" >OFF</a>
    </div>

    <div v-else="v_department.department_added_date_status == 0">
    <a class="btn btn-success btn-sm" style="margin-top:15px;color:white;margin-left:30px;" @click.prevent = "activedepartmenton(v_department.department_id)" >ON</a>
    </div>



  </td>

  <td>

     <center>


  <router-link :to="`/edit_deprtment/${v_department.department_id}`" class="btn btn-success btn-sm" style="margin-top:17px;" ><i class="fa fa-edit" aria-hidden="true"></i></router-link>
 <a class="btn btn-warning btn-sm" style="margin-top:17px;" @click.prevent = "deletedepartment(v_department.department_id)"><i class="fa fa-trash" aria-hidden="true"></i></a>

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

          showalldepartment:{},

          // Create a new form instance
          form: new Form({

                department_id: '',
             	  department_name : '',
                // department_head :'',
                 	// department_dean:'',
             	  department_added_date : '',
                department_semester_fee:'',
                deprtment_head :'',
                department_dean :'',
                department_added_date_status :'',
                //cat_status: '',


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
      showallteacherinform(){


     axios.get('/show_all_teacher_in_form').then(({data}) => (this.allteacher = data));


   },


    adddepartment(){
    this.form.post('/adddepartment_formaction')
   .then((response)=>{

       this.displayalldepartment();

    $('#exampleModal').modal('hide')

         this.form.reset();


      if(response.data==0){



                Toast.fire({
                icon: 'error',
                title: 'This Department Already Exist'
                })


      }else{





        Toast.fire({
        icon: 'success',
        title: 'Department Added Successfully'
        })



      }










         })
         .catch(()=>{
         console.log('oppp fail');
         })

         },

       //show all category in add category form
        displayalldepartment(){
        //this.$store.dispatch("allCategory")
        axios.get('/show_all_department').then(({data}) => (this.showalldepartment = data));

         },

      //active category off

      activedepartmentoff(department_id){

      axios.get('/active_department_unactive/'+department_id)
      .then((response)=>{
        Toast.fire({
        icon: 'success',
        title: 'Department Unactive Successfully'
       })

    //  this.$store.dispatch("allCategory",this.currentPage)
          this.displayalldepartment();



       })

       },

    //unactive category on
      activedepartmenton(department_id){

        axios.get('/unactive_department_active/'+department_id)
        .then((response)=>{

          Toast.fire({
          icon: 'success',
          title: 'Department Active Successfully'
         })

          this.displayalldepartment();


         })

       },



//delete category

deletedepartment(department_id){
  axios.get('/delatedepartment/'+department_id)
  .then((response)=>{


    Toast.fire({
    icon: 'success',
    title: 'Department delate Successfully'
     })

    this.displayalldepartment();

  //  this.$store.dispatch("allCategory")
    //this.$store.dispatch("allCategory",this.currentPage)

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




        mounted() {

          this.displayalldepartment();


          this.showallteacherinform();

          // this.showcategoryinselectform();
          // this.$store.dispatch("allCategory",this.currentPage);
          // this.RealSerchcategory();


        }
    }
</script>
