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
           <div class="title" style="width:1000px;float:left">
             <h3 class="card-title">All Batch</h3>
           </div>

  <div class="but">
         <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
          Add Batch
         </button>
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
  <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="color:green">Add Batch</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>
  <div class="modal-body">

  <form enctype="multipart/form-data" role="form" @submit.prevent = "addbatch()">





        <div class="form-group">
        <label>Batch Name</label>
        <input v-model="form.batch_name" type="text" name="batch_name"
        class="form-control" :class="{ 'is-invalid': form.errors.has('batch_name') }" placeholder="Enter Batch Name Example CSE-1ST" required>
        <has-error :form="form" field="batch_name"></has-error>
        </div>



        <div class="form-group">
             <label for="exampleFormControlSelect1">Select Department</label>
               <select  v-model="form.mydept_id" class="form-control" id="exampleFormControlSelect1" name="mydept_id" :class="{ 'is-invalid': form.errors.has('mydept_id') }" style="" required>
                 <option value="" disabled>Select</option>

                 <option style="color:green;font-weight:bold;" v-for="selectteacher in allmydepartment" :value="selectteacher.department_id">{{selectteacher.department_name}}</option>

               </select>
               <has-error :form="form" field="mydept_id"></has-error>
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
    <th style="text-align:center;">Batch Id</th>
    <th style="text-align:center;">Batch Name</th>
    <th style="text-align:center;">Batch Department</th>
    <th style="text-align:center;">Batch Added Date</th>


    <th style="text-align:center;">Batch Status</th>
    <th style="text-align:center;">Stay/Not</th>

    <th style="text-align:center;">Action</th>
</tr>




</thead>

<tbody>

 <tr v-for="v_department in showallbatch">

   <!-- <tr> -->

    <td style="text-align:center;padding-top:30px">{{v_department.batch_id}}</td>
    <td style="text-align:center;padding-top:30px;color:blue;">{{v_department.batch_name}}</td>
      <td style="text-align:center;padding-top:30px;">{{v_department.department_name}}</td>
    <td style="text-align:center;padding-top:30px;">{{v_department.batch_added_date}}</td>

    <td>

    <div v-if="v_department.batch_added_status == 1">
     <p style="text-align:center;color:blue;padding-top:17px">Active</p>
    </div>
    <div v-else="v_department.batch_added_status == 0">
     <p style="text-align:center;color:red;padding-top:17px">Unactive</p>
    </div>

    <!-- <div>
     <p style="text-align:center;color:red;padding-top:17px">Unactive</p>
    </div> -->


    </td>

    <td>
   <center>
    <div v-if="v_department.batch_added_status == 1">
    <a class="btn btn-primary btn-sm" style="margin-top:15px;color:white;" @click.prevent = "activebatchoff(v_department.batch_id)" >OFF</a>
    </div>

    <div v-else="v_department.batch_added_status == 0">
    <a class="btn btn-success btn-sm" style="margin-top:15px;color:white;" @click.prevent = "activebatchon(v_department.batch_id)" >ON</a>
    </div>

    <!-- <div>
    <a class="btn btn-success btn-sm" style="margin-top:15px;color:white;" @click.prevent = "" >ON</a>
    </div> -->





  </center>


  </td>

  <td>

  <center>



<!-- <router-link :to="`/view_teacher/${v_showteacher.teacher_id}`" class="btn btn-primary btn-sm" style="margin-top:17px;"><i class="fa fa-eye" aria-hidden="true"></i></router-link> -->
<!-- <a class="btn btn-warning btn-sm" style="margin-top:17px;" @click.prevent = "deleteteacher(v_showteacher.teacher_id)"><i class="fa fa-trash" aria-hidden="true"></i></a> -->
<router-link :to="`/edit_batch/${v_department.batch_id}`" class="btn btn-success btn-sm" style="margin-top:17px;" ><i class="fa fa-edit" aria-hidden="true"></i></router-link>

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

 <Mybackendfooter></Mybackendfooter>

    </div>
</template>

<script>
import _ from 'lodash'

import Mybackendheader from "../backendlayout/Adminheader.vue"
import MyBackendsidebar from "../backendlayout/Adminsidebar.vue"
import Mybackendfooter from "../backendlayout/Adminfooter.vue"

// import Vue from 'vue'
// import axios from 'axios'
// import VueAxios from 'vue-axios'
    export default {


      data () {
        return {


          showallbatch:{},

          allmydepartment:{},

          form: new Form({

                batch_id: '',
             	  mydept_id: '',
                batch_name :'',
             	  batch_added_date : '',
                batch_added_status :'',


                // course_code:'',
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

      //showallbatch
      myallbatch(){


  //   axios.get('/show_all_batch').then(({data}) => (this.showallbatch = data));

     axios.get('/show_all_batch').then((res) => {

    this.showallbatch = res.data.showallbatch


})







   },





   showalldepartmentincourse(){

axios.get('/show_all_department_in_add_batch').then(({data}) => (this.allmydepartment = data));

   },



    addbatch(){
    this.form.post('/add_batch_formaction')
   .then((response)=>{

     $('#exampleModal').modal('hide')

          this.form.reset();

          this.myallbatch();

          if(response.data==0){

             Swal.fire({

                  icon: 'error',
                  title: 'Oops...',
                  text: 'Sorry This Batch Allready Exist !!',

                  })

                }else if(response.data==1){

                 Toast.fire({
                 icon: 'success',
                 title: 'Batch Added Successfully'

                  })

                }else{

                 console.log(response.data)

                }









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

      activebatchoff(batch_id){

      axios.get('/active_batch_unactive/'+batch_id)
      .then((response)=>{
        Toast.fire({
        icon: 'success',
        title: 'Batch Unactive Successfully'
       })


            this.myallbatch();



       })

       },

  //  unactive category on
      activebatchon(batch_id){

        axios.get('/unactive_batch_active/'+batch_id)
        .then((response)=>{

          Toast.fire({
          icon: 'success',
          title: 'Batch Active Successfully'
         })


              this.myallbatch();


         })

       },



//delete category

deletecourse(course_id){
  axios.get('/delate_course/'+course_id)
  .then((response)=>{


    Toast.fire({
    icon: 'success',
    title: 'Course delate Successfully'
     })


    this.myallcourse();


      })
   .catch(()=>{
   console.log('fail');

    })

},



},





        mounted() {


          this.myallbatch();
        //  this.displayalldepartment();
            // this.myallcourse();
          this.showalldepartmentincourse();
            // this.showallsemeterincourse();
            // // this.showalltecheruncourse();
            // this.showalltecheruncourse();
          //  this.myallsemester();

        //  this.showallteacherinform();



        }
    }
</script>
