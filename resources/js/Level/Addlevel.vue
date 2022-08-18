<template>
    <div>


      <Mybackendheader></Mybackendheader>

      <MyBackendsidebar></MyBackendsidebar>

          <!-- Main content -->
  <section class="content" style="margin-top:20px;width:80%;margin-left:18%">
    <div class="container-fluid">
       <div class="row">
         <div class="col-12">




  <div class="card" style="padding-bottom:20px;">
  <div class="card-header">
  <div class="main">
           <div class="title" style="width:1000px;float:left">
             <h3 class="card-title">All Level</h3>
           </div>

  <div class="but">
         <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
          Add Level
         </button>
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
  <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="color:green">AddLevel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>
  <div class="modal-body">

  <form enctype="multipart/form-data" role="form" @submit.prevent = "addlevel()">





        <div class="form-group">
        <label>Level Name</label>
        <input v-model="form.level_name" type="text" name="level_name"
        class="form-control" :class="{ 'is-invalid': form.errors.has('level_name') }" placeholder="Enater Level Example  CSE-2/1" required>
        <has-error :form="form" field="level_name"></has-error>
        </div>

        <div class="form-group">
             <label for="exampleFormControlSelect1">Department</label>
               <select  v-model="form.dpt_myid" class="form-control" id="exampleFormControlSelect1" name="dpt_myid" :class="{ 'is-invalid': form.errors.has('dpt_myid') }" style="" required>
                 <option value="" disabled>Select</option>

                 <option style="color:green;font-weight:bold;" v-for="selectteacher in alldepartment" :value="selectteacher.department_id">{{selectteacher.department_name}}</option>

               </select>
               <has-error :form="form" field="dpt_myid"></has-error>
        </div>



        <div class="form-group">
             <label for="exampleFormControlSelect1">Select Classroom</label>
               <select  v-model="form.level_class_room" class="form-control" id="exampleFormControlSelect1" name="level_class_room" :class="{ 'is-invalid': form.errors.has('level_class_room') }" style="" required>
                 <option value="" disabled>Select</option>

                 <option style="color:green;font-weight:bold;" v-for="selectteacher in allmyclassroom" :value="selectteacher.classroom_id">{{selectteacher.classroom_name}}</option>

               </select>
               <has-error :form="form" field="level_class_room"></has-error>
        </div>
















        <div class="form-group">
             <label for="exampleFormControlSelect1">Level Advisor</label>
               <select  v-model="form.tec_id_level_addvisor" class="form-control" id="exampleFormControlSelect1" name="tec_id_level_addvisor" :class="{ 'is-invalid': form.errors.has('tec_id_level_addvisor') }" style="" required>
                 <option value="" disabled>Select</option>

                 <option style="color:green;font-weight:bold;" v-for="selectteacher in allmyteacher" :value="selectteacher.teacher_id">{{selectteacher.teacher_name}}</option>

               </select>
               <has-error :form="form" field="tec_id_level_addvisor"></has-error>
        </div>


        <div class="form-group">
        <label>Tution Fee</label>
        <input v-model="form.level_dpt_tution_free" type="number" name="level_dpt_tution_free"
        class="form-control" :class="{ 'is-invalid': form.errors.has('level_dpt_tution_free') }" placeholder="Enater Level Tution Fee" required>
        <has-error :form="form" field="level_dpt_tution_free"></has-error>
        </div>


        <div class="form-group">
        <label>Semester Fee Added Date</label>
        <input v-model="form.level_added_date" type="text" name="level_added_date"
        class="form-control" :class="{ 'is-invalid': form.errors.has('level_added_date') }" placeholder="Semester Fee Added Date = 07-02-2021" required>
        <has-error :form="form" field="level_added_date"></has-error>
        </div>


        <div class="form-group">
        <label>Semester Fee Expire Date</label>
        <input v-model="form.level_expire_date" type="text" name="level_expire_date"
        class="form-control" :class="{ 'is-invalid': form.errors.has('level_expire_date') }" placeholder="Semester Fee Expire Date = 07-02-2021" required>
        <has-error :form="form" field="level_expire_date"></has-error>
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
   <th style="text-align:center;">SL</th>
    <th style="text-align:center;">Level Id</th>
    <th style="text-align:center;">Level Name</th>
    <th style="text-align:center;">Department</th>
    <th style="text-align:center;">Course Advisor</th>
      <th style="text-align:center;">Classroom</th>
    <th style="text-align:center;">Tution Fee</th>

    <th style="text-align:center;">Semester Fee Added Date</th>
      <th style="text-align:center;">Semester Fee Last Date</th>
    <!-- <th style="text-align:center;">Status</th>
    <th style="text-align:center;">ON/OFF</th> -->
    <th style="text-align:center;">Action</th>
</tr>




</thead>

<tbody>

 <tr v-for="(v_department,index) in showalllevel">

   <!-- <tr> -->
      <td style="text-align:center;padding-top:30px">{{index+1}}</td>
    <td style="text-align:center;padding-top:30px">{{v_department.level_id}}</td>
    <td style="text-align:center;padding-top:30px;color:blue;">{{v_department.level_name}}</td>
    <td style="text-align:center;padding-top:30px;">{{v_department.department_name}}</td>
      <td style="text-align:center;padding-top:30px;color:blue;">{{v_department.teacher_name}}</td>
        <td style="text-align:center;padding-top:30px;color:blue;">{{v_department.classroom_name}}</td>
        <td style="text-align:center;padding-top:30px;">{{v_department.level_dpt_tution_free}} TK</td>

      <td style="text-align:center;padding-top:30px;color:blue;">{{v_department.level_added_date}}</td>
      <td style="text-align:center;padding-top:30px;color:blue;">{{v_department.level_expire_date}}</td>



  <td>

     <center>


  <!-- <router-link :to="`/view_category/${v_showcategory.id}`" class="btn btn-primary btn-sm" style="margin-top:17px;"><i class="fa fa-eye" aria-hidden="true"></i></router-link>
  <router-link :to="`/edit_category/${v_showcategory.id}`" class="btn btn-success btn-sm" style="margin-top:17px;" ><i class="fa fa-edit" aria-hidden="true"></i></router-link>
 <a class="btn btn-warning btn-sm" style="margin-top:17px;" @click.prevent = "deletecategory(v_showcategory.id)"><i class="fa fa-trash" aria-hidden="true"></i></a> -->


 <!-- <router-link :to="`/view_category/${v_showcategory.id}`" class="btn btn-primary btn-sm" style="margin-top:17px;"><i class="fa fa-eye" aria-hidden="true"></i></router-link>
 <router-link :to="`/edit_category/${v_showcategory.id}`" class="btn btn-success btn-sm" style="margin-top:17px;" ><i class="fa fa-edit" aria-hidden="true"></i></router-link> -->
 <router-link :to="`/edit_level/${v_department.level_id}`" class="btn btn-success btn-sm" style="margin-top:17px;" ><i class="fa fa-edit" aria-hidden="true"></i></router-link>
 <!-- <a class="btn btn-warning btn-sm" style="margin-top:17px;" @click.prevent = "deletesemester(v_department.level_id)"><i class="fa fa-trash" aria-hidden="true"></i></a> -->
<a class="btn btn-warning btn-sm" style="margin-top:17px;" @click.prevent = "deletelevel(v_department.level_id)"><i class="fa fa-trash" aria-hidden="true"></i></a>
<!-- <a class="btn btn-warning btn-sm" style="margin-top:17px;" @click.prevent = ""><i class="fa fa-trash" aria-hidden="true"></i></a>
<a class="btn btn-warning btn-sm" style="margin-top:17px;" @click.prevent = ""><i class="fa fa-trash" aria-hidden="true"></i></a>
<a class="btn btn-warning btn-sm" style="margin-top:17px;" @click.prevent = ""><i class="fa fa-trash" aria-hidden="true"></i></a> -->
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

          showalllevel:{},
          alldepartment:{},
          allmyteacher:{},
          allmyclassroom:{},

          // Create a new form instance
          form: new Form({

                level_id: '',
             	  level_name: '',
                dpt_myid:'',
                level_dpt_tution_free:'',
                level_class_room:'',
                tec_id_level_addvisor:'',
             	  level_added_date: '',
                level_expire_date:'',
                level_status:'',
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
      myalllevel(){


     // axios.get('/show_all_level').then(({data}) => (this.showalllevel = data));

     axios.get('/show_all_level').then((res) => {

    this.showalllevel = res.data.showalllevel


})





   },



   showalltecheruncourse(){

axios.get('/show_all_teacher_in_add_level').then(({data}) => (this.allmyteacher = data));

   },


   showallclassroominlevel(){

axios.get('/show_all_classroom_in_add_level').then(({data}) => (this.allmyclassroom = data));

   },

   showalldepartmentincourse(){

axios.get('/show_all_department_in_add_level').then(({data}) => (this.alldepartment = data));

   },


    addlevel(){
    this.form.post('/addlevel_formaction')
   .then((response)=>{

       // this.displayalldepartment();
         this.myalllevel();

    $('#exampleModal').modal('hide')

         this.form.reset();


         if(response.data==0){

              Toast.fire({
              icon: 'error',
                 text: 'Sorry This Level Allready Exist !!',

                 })

               }else if(response.data==1){

                Toast.fire({
                icon: 'success',
                title: 'Level Added Successfully'

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

deletelevel(level_id){
  axios.get('/delate_level/'+level_id)
  .then((response)=>{


    Toast.fire({
    icon: 'success',
    title: 'Level delate Successfully'
     })

    // this.displayalldepartment();
    this.myalllevel();


      })
   .catch(()=>{
   console.log('fail');

    })

},



},





        mounted() {

            this.myalllevel();
            this.showalltecheruncourse();
            this.showalldepartmentincourse();
            this.showallclassroominlevel();
        //  this.displayalldepartment();
            //this.myallsemester();

        //  this.showallteacherinform();



        }
    }
</script>
