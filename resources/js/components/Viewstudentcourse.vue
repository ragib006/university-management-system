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
             <h3 class="card-title">All Course</h3>
           </div>



<!--
  <div class="but">
         <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
          Add Hall
         </button>
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
  <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="color:green">AddHall</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>
  <div class="modal-body">

  <form enctype="multipart/form-data" role="form" @submit.prevent = "addhall()">


        <div class="form-group">
        <label>Hall Name</label>
        <input v-model="form.hall_name" type="text" name="hall_name"
        class="form-control" :class="{ 'is-invalid': form.errors.has('hall_name') }" placeholder="Enater Hall Name">
        <has-error :form="form" field="hall_name"></has-error>
        </div>

        <div class="form-group">
             <label for="exampleFormControlSelect1">Hall Type</label>
               <select  v-model="form.hall_type" class="form-control" id="exampleFormControlSelect1" name="hall_type" :class="{ 'is-invalid': form.errors.has('hall_type') }" style="" required>
                 <option value="" disable>Select</option>

                 <option style="color:green;font-weight:bold;" value="Male">Male</option>
                 <option style="color:green;font-weight:bold;" value="Female">Female</option>

               </select>
               <has-error :form="form" field="hall_type"></has-error>
        </div>


      <button type="submit" class="btn btn-primary">Submit</button>

 </form>

 </div>
 </div>
 </div>
 </div>
 </div> -->



 </div>
 </div>



 <div class="card-body">



 <table id="section" class="table table-bordered table-striped">




 <thead>

 <tr>
    <th style="text-align:center;">Course Id</th>
    <th style="text-align:center;">Course Code</th>
    <th style="text-align:center;">Course Tittle</th>
    <!-- <th style="text-align:center;">Department Dean</th>
    <th style="text-align:center;">Department Head</th> -->

    <th style="text-align:center;">Course Type</th>
    <th style="text-align:center;">Course Credit</th>
    <th style="text-align:center;">Course Teacher</th>
    <th style="text-align:center;">Action</th>
    <!-- <th style="text-align:center;">Action</th>
    <th style="text-align:center;">Action</th> -->
</tr>




</thead>

<tbody>

 <tr v-for="v_department in course">

   <!-- <tr> -->
     <td style="text-align:center;padding-top:30px">{{v_department.course_id}}</td>
     <td style="text-align:center;padding-top:30px;color:blue">{{v_department.course_code}}</td>
     <td style="text-align:center;padding-top:30px">{{v_department.course_title}}</td>
     <td style="text-align:center;padding-top:30px;color:blue">{{v_department.course_type}}</td>
     <!-- <td style="text-align:center;padding-top:30px">{{v_department.course_type}}</td> -->
     <!-- <td style="text-align:center;padding-top:30px">{{v_department.course_credit}}</td> -->

    <td style="text-align:center;padding-top:30px">{{v_department.course_credit}}</td>
    <td style="text-align:center;padding-top:30px;color:blue">{{v_department.teacher_name}}</td>


  <td>

     <center>


  <!-- <router-link :to="`/view_category/${v_showcategory.id}`" class="btn btn-primary btn-sm" style="margin-top:17px;"><i class="fa fa-eye" aria-hidden="true"></i></router-link>

 <a class="btn btn-warning btn-sm" style="margin-top:17px;" @click.prevent = "deletecategory(v_showcategory.id)"><i class="fa fa-trash" aria-hidden="true"></i></a> -->


 <!-- <router-link :to="`/view_category/${v_showcategory.id}`" class="btn btn-primary btn-sm" style="margin-top:17px;"><i class="fa fa-eye" aria-hidden="true"></i></router-link>
 <router-link :to="`/edit_category/${v_showcategory.id}`" class="btn btn-success btn-sm" style="margin-top:17px;" ><i class="fa fa-edit" aria-hidden="true"></i></router-link> -->
   <!-- <router-link :to="`/edit_hall/${v_department.hall_id}`" class="btn btn-success btn-sm" style="margin-top:17px;" ><i class="fa fa-edit" aria-hidden="true"></i></router-link>
   <a class="btn btn-warning btn-sm" style="margin-top:17px;" @click.prevent = "deletehall(v_department.hall_id)"><i class="fa fa-trash" aria-hidden="true"></i></a> -->

<router-link :to="`/add_student_marks/${v_department.course_id}`" class="btn btn-primary btn-sm" style="margin-top:17px;"><i class="fa fa-eye" aria-hidden="true"></i></router-link>
<a class="btn btn-warning btn-sm" style="margin-top:17px;" @click.prevent = ""><i class="fa fa-trash" aria-hidden="true"></i></a>
<a class="btn btn-warning btn-sm" style="margin-top:17px;" @click.prevent = ""><i class="fa fa-trash" aria-hidden="true"></i></a>
<a class="btn btn-warning btn-sm" style="margin-top:17px;" @click.prevent = ""><i class="fa fa-trash" aria-hidden="true"></i></a>





































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

          // posts: {},
          // allcategoryshowinform:[],
          // currentPage: 1,
          // searchallcategory:'',
          //search:'',
          //showsearch:false,
          //caris:[],
        //  allteacher:{},
        //  showallhall:{},

      course:{},
        //mycourse:{},

          // Create a new form instance
          form: new Form({

                // hall_id:'',
                // hall_name: '',
             	  // hall_type: '',
             	  // hall_added_date: '',
                // hall_status:'',
                //cat_status: '',


          })
        }
      },




    methods:{


      // Viewmystudentcourse(){
      //
      //     axios.get('/view_my_student_coure_match_semester/'+this.$route.params.student_id).then(({data}) => (this.mycourse = data));
      //
      // },




      Viewmystudentcourse(){

     axios.get('/view_my_student_coure_match_semester/'+this.$route.params.student_id).then((res) => {

     this.course = res.data.course
    //console.log(res.data)

     })

   },

      //showalldepartmentinform
   //    myallhall(){
   //
   //
   //   axios.get('/show_all_hall').then(({data}) => (this.showallhall = data));
   //
   //
   // },


    addhall(){
    this.form.post('/addhall_formaction')
   .then((response)=>{

       // this.displayalldepartment();
         this.myallhall();

    $('#exampleModal').modal('hide')

         this.form.reset();
         Toast.fire({
         icon: 'success',
         title: 'Hall Added Successfully'
         })




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

      activehalloff(hall_id){

      axios.get('/active_hall_unactive/'+hall_id)
      .then((response)=>{
        Toast.fire({
        icon: 'success',
        title: 'Hall Unactive Successfully'
       })

    //  this.$store.dispatch("allCategory",this.currentPage)
          // this.displayalldepartment();

            this.myallhall();



       })

       },

    //unactive category on
      activehallon(hall_id){

        axios.get('/unactive_hall_active/'+hall_id)
        .then((response)=>{

          Toast.fire({
          icon: 'success',
          title: 'Hall Active Successfully'
         })

          this.myallhall();
          // this.displayalldepartment();
              // this.myallsemester();


         })

       },



//delete category

deletehall(hall_id){
  axios.get('/delate_hall/'+hall_id)
  .then((response)=>{


    Toast.fire({
    icon: 'success',
    title: 'Hall delate Successfully'
     })

    // this.displayalldepartment();
    //this.myallsemester();
    this.myallhall();


      })
   .catch(()=>{
   console.log('fail');

    })

},



},





        mounted() {

          this.Viewmystudentcourse();

        //  this.displayalldepartment();
          //  this.myallhall();


        //  this.showallteacherinform();



        }
    }
</script>
