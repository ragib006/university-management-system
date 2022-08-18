<template>
    <div>
          <!-- Main content -->
  <section class="content" style="margin-top:20px;">
    <div class="container-fluid">
       <div class="row">
         <div class="col-12">



  <div class="card" style="padding-bottom:20px;">
  <div class="card-header">
  <div class="main">
           <div class="title" style="width:1000px;float:left">
             <h3 class="card-title">All Profession</h3>
           </div>

  <div class="but">
         <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
          Add Profession
         </button>
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
  <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="color:green">Add Profession</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>
  <div class="modal-body">

  <form enctype="multipart/form-data" role="form" @submit.prevent = "addprofession()">





        <div class="form-group">
        <label>Profession Name</label>
        <input v-model="form.Profession_name" type="text" name="Profession_name"
        class="form-control" :class="{ 'is-invalid': form.errors.has('Profession_name') }" placeholder="Enater Profesion Name">
        <has-error :form="form" field="Profession_name"></has-error>
        </div>


        <div class="form-group">
             <label for="exampleFormControlSelect1">Select Department</label>
               <select  v-model="form.pro_department_id" class="form-control" id="exampleFormControlSelect1" name="pro_department_id" :class="{ 'is-invalid': form.errors.has('pro_department_id') }" style="" required>
                 <option value="" disable>Select</option>
                 <!-- <option style="color:black;font-weight:bold;" disable>Select</option> -->
                 <option style="color:green;font-weight:bold;" v-for="selectdept in alldepartment" :value="selectdept.department_id">{{selectdept.department_name }}</option>

               </select>
               <has-error :form="form" field="pro_department_id"></has-error>
        </div>

        <div class="form-group">
        <label>Profession Salary</label>
        <input v-model="form.profession_salary" type="number" name="profession_salary"
        class="form-control" :class="{ 'is-invalid': form.errors.has('profession_salary') }" placeholder="Enater Profesion Salary">
        <has-error :form="form" field="profession_salary"></has-error>
        </div>



        <!-- <div class="form-group">
             <label for="exampleFormControlSelect1">Department Dean</label>
               <select  v-model="form.department_dean" class="form-control" id="exampleFormControlSelect1" name="department_dean" :class="{ 'is-invalid': form.errors.has('department_dean') }" style="" required>
                 <option value="" disable>Select</option>

                 <option style="color:green;font-weight:bold;" v-for="selectteacher in allteacher" :value="selectteacher.teacher_id">{{selectteacher.teacher_name}}</option>

               </select>
               <has-error :form="form" field="department_dean"></has-error>
        </div> -->

<!--
        <div class="form-group">dd
             <label for="exampleFormControlSelect1">Department Head</label>
               <select  v-model="form.department_head" class="form-control" id="exampleFormControlSelect1" name="department_head" :class="{ 'is-invalid': form.errors.has('department_head') }" style="" required>
                 <option value="" disable>Select</option>

                 <option style="color:green;font-weight:bold;" v-for="selectteacher in allteacher" :value="selectteacher.teacher_id">{{selectteacher.teacher_name}}</option>

               </select>
               <has-error :form="form" field="department_head"></has-error>
        </div> -->







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
    <th style="text-align:center;">Profession Id</th>
    <th style="text-align:center;">Proffession Name</th>
    <th style="text-align:center;">Department</th>
    <!-- <th style="text-align:center;">Department Dean</th>
    <th style="text-align:center;">Department Head</th> -->

    <th style="text-align:center;">Salary</th>
    <th style="text-align:center;">Added Date</th>
    <!-- <th style="text-align:center;">Status</th>
    <th style="text-align:center;">ON/OFF</th> -->
    <th style="text-align:center;">Action</th>
</tr>




</thead>

<tbody>

 <tr v-for="v_department in showallprofession">

   <!-- <tr> -->

    <td style="text-align:center;padding-top:30px">{{v_department.profession_id}}</td>
    <td style="text-align:center;padding-top:30px;">{{v_department.Profession_name}}</td>
    <td style="text-align:center;padding-top:30px;color:blue;">{{v_department.department_name}}</td>
    <td style="text-align:center;padding-top:30px;">{{v_department.profession_salary}} TK</td>
    <td style="text-align:center;padding-top:30px;color:blue;">{{v_department.profession_added_date}}</td>

    <!-- <td>

    <div v-if="v_department.semester_added_status == 1">
     <p style="text-align:center;color:blue;padding-top:17px">Active</p>
    </div>
    <div v-else="v_department.semester_added_status == 0">
     <p style="text-align:center;color:red;padding-top:17px">Unactive</p>
    </div>


    </td> -->

    <!-- <td>
   <center>
    <div v-if="v_department.semester_added_status == 1">
    <a class="btn btn-primary btn-sm" style="margin-top:15px;color:white;" @click.prevent = "activedepartmentoff(v_department.semester_id)" >OFF</a>
    </div>

    <div v-else="v_department.semester_added_status == 0">
    <a class="btn btn-success btn-sm" style="margin-top:15px;color:white;" @click.prevent = "activedepartmenton(v_department.semester_id)" >ON</a>
    </div>
  </center>


  </td> -->

  <td>

     <center>


  <!-- <router-link :to="`/view_category/${v_showcategory.id}`" class="btn btn-primary btn-sm" style="margin-top:17px;"><i class="fa fa-eye" aria-hidden="true"></i></router-link>
  <router-link :to="`/edit_category/${v_showcategory.id}`" class="btn btn-success btn-sm" style="margin-top:17px;" ><i class="fa fa-edit" aria-hidden="true"></i></router-link>
 <a class="btn btn-warning btn-sm" style="margin-top:17px;" @click.prevent = "deletecategory(v_showcategory.id)"><i class="fa fa-trash" aria-hidden="true"></i></a> -->


 <!-- <router-link :to="`/view_category/${v_showcategory.id}`" class="btn btn-primary btn-sm" style="margin-top:17px;"><i class="fa fa-eye" aria-hidden="true"></i></router-link>
 <router-link :to="`/edit_category/${v_showcategory.id}`" class="btn btn-success btn-sm" style="margin-top:17px;" ><i class="fa fa-edit" aria-hidden="true"></i></router-link> -->
   <router-link :to="`/edit_profession/${v_department.profession_id}`" class="btn btn-success btn-sm" style="margin-top:17px;" ><i class="fa fa-edit" aria-hidden="true"></i></router-link>
 <!-- <a class="btn btn-warning btn-sm" style="margin-top:17px;" @click.prevent = "deletesemester(v_department.profession_id)"><i class="fa fa-trash" aria-hidden="true"></i></a> -->

<!-- <a class="btn btn-warning btn-sm" style="margin-top:17px;" @click.prevent = ""><i class="fa fa-trash" aria-hidden="true"></i></a>
<a class="btn btn-warning btn-sm" style="margin-top:17px;" @click.prevent = ""><i class="fa fa-trash" aria-hidden="true"></i></a>
<a class="btn btn-warning btn-sm" style="margin-top:17px;" @click.prevent = ""><i class="fa fa-trash" aria-hidden="true"></i></a> -->
     </center>

     </td>
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



    </div>
</template>

<script>
import _ from 'lodash'

// import Vue from 'vue'
// import axios from 'axios'
// import VueAxios from 'vue-axios'
    export default {


      data () {
        return {


          alldepartment:{},

          showallprofession:{},

          // Create a new form instance
          form: new Form({

                profession_id: '',
             	  pro_department_id: '',
             	  Profession_name: '',
                profession_salary:'',
                profession_added_date:''
                //cat_status: '',


          })
        }
      },




    methods:{


      showalldepartmentinform(){


     axios.get('/show_all_department_in_form').then(({data}) => (this.alldepartment = data));


   },

      //showalldepartmentinform
      myallprofession(){


     axios.get('/show_all_profession').then(({data}) => (this.showallprofession = data));


   },


    addprofession(){
    this.form.post('/addprofession_formaction')
   .then((response)=>{


         this.myallprofession();

        $('#exampleModal').modal('hide')

         this.form.reset();

         if(response.data==0){

            Swal.fire({

                 icon: 'error',
                 title: 'Oops...',
                 text: 'Sorry This Profession Allready Exist !!',

                 })

               }else if(response.data==1){

                Toast.fire({
                icon: 'success',
                title: 'Profession Added Successfully'

                 })

               }else{

                console.log(response.data)

               }









        //



         })
         .catch(()=>{
         console.log('oppp fail');
         })

         },

       //show all category in add category form
        // displayalldepartment(){
        // //this.$store.dispatch("allCategory")
        // axios.get('/show_all_department').then(({data}) => (this.showalldepartment = data));
        //
        //  },

      //active category off

    //   activedepartmentoff(department_id){
    //
    //   axios.get('/active_department_unactive/'+department_id)
    //   .then((response)=>{
    //     Toast.fire({
    //     icon: 'success',
    //     title: 'Department Unactive Successfully'
    //    })
    //
    // //  this.$store.dispatch("allCategory",this.currentPage)
    //       // this.displayalldepartment();
    //         this.myallsemester();
    //
    //
    //
    //    })
    //
    //    },

    //unactive category on
      // activedepartmenton(department_id){
      //
      //   axios.get('/unactive_department_active/'+department_id)
      //   .then((response)=>{
      //
      //     Toast.fire({
      //     icon: 'success',
      //     title: 'Department Active Successfully'
      //    })
      //
      //     // this.displayalldepartment();
      //         this.myallsemester();
      //
      //
      //    })
      //
      //  },



//delete category

// deletesemester(semester_id){
//   axios.get('/delate_semester/'+semester_id)
//   .then((response)=>{
//
//
//     Toast.fire({
//     icon: 'success',
//     title: 'Semester delate Successfully'
//      })
//
//     // this.displayalldepartment();
//     this.myallsemester();
//
//
//       })
//    .catch(()=>{
//    console.log('fail');
//
//     })
//
// },



},





        mounted() {

        //  this.displayalldepartment();
            this.myallprofession();

            this.showalldepartmentinform();

        //  this.showallteacherinform();



        }
    }
</script>
