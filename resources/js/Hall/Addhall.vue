<template>
    <div>


      <Mybackendheader></Mybackendheader>

      <MyBackendsidebar></MyBackendsidebar>


  <section class="content" style="margin-top:20px;margin-bottom:300px;">
    <div class="container-fluid">
       <div class="row">
         <div class="col-12">

  <div class="card" style="padding-bottom:20px;">
  <div class="card-header">
  <div class="main">
           <div class="title" style="width:1000px;float:left">
             <h3 class="card-title">All Hall</h3>
           </div>

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
                 <option value="" disabled>Select</option>

                 <option style="color:green;font-weight:bold;" value="Nohall">No Hall</option>
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
 </div>
 </div>
 </div>



 <div class="card-body">



 <table id="section" class="table table-bordered table-striped">




 <thead>

 <tr>
   <th style="text-align:center;">Sl</th>
    <th style="text-align:center;">Hall Id</th>
    <th style="text-align:center;">Hall Name</th>
    <th style="text-align:center;">Hall Type</th>
    <!-- <th style="text-align:center;">Department Dean</th>
    <th style="text-align:center;">Department Head</th> -->

    <th style="text-align:center;">Publish Date</th>
    <th style="text-align:center;">Status</th>
    <th style="text-align:center;">ON/OFF</th>
    <th style="text-align:center;">Action</th>
</tr>




</thead>

<tbody>

 <tr v-for="(v_department,index) in showallhall">

   <!-- <tr> -->

    <td style="text-align:center;padding-top:30px">{{index+1}}</td>
    <td style="text-align:center;padding-top:30px">{{v_department.hall_id}}</td>
    <td style="text-align:center;padding-top:30px;color:blue;">{{v_department.hall_name}}</td>
    <td style="text-align:center;padding-top:30px;color:blue;">{{v_department.hall_type}}</td>

      <td style="text-align:center;padding-top:30px;color:blue;">{{v_department.hall_added_date}}</td>

    <td>

    <div v-if="v_department.hall_status == 1">
     <p style="text-align:center;color:blue;padding-top:17px">Active</p>
    </div>
    <div v-else="v_department.hall_status == 0">
     <p style="text-align:center;color:red;padding-top:17px">Unactive</p>
    </div>


    </td>

    <td>
   <center>
    <div v-if="v_department.hall_status == 1">
    <a class="btn btn-primary btn-sm" style="margin-top:15px;color:white;" @click.prevent = "activehalloff(v_department.hall_id)" >OFF</a>
    </div>

    <div v-else="v_department.hall_status == 0">
    <a class="btn btn-success btn-sm" style="margin-top:15px;color:white;" @click.prevent = "activehallon(v_department.hall_id)" >ON</a>
    </div>
  </center>


  </td>

  <td>

     <center>
   <router-link :to="`/edit_hall/${v_department.hall_id}`" class="btn btn-success btn-sm" style="margin-top:17px;" ><i class="fa fa-edit" aria-hidden="true"></i></router-link>
   <a class="btn btn-warning btn-sm" style="margin-top:17px;" @click.prevent = "deletehall(v_department.hall_id)"><i class="fa fa-trash" aria-hidden="true"></i></a>

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

          // posts: {},
          // allcategoryshowinform:[],
          // currentPage: 1,
          // searchallcategory:'',
          //search:'',
          //showsearch:false,
          //caris:[],
        //  allteacher:{},
          showallhall:{},

          // Create a new form instance
          form: new Form({

                hall_id:'',
                hall_name: '',
             	  hall_type: '',
             	  hall_added_date: '',
                hall_status:'',
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
      myallhall(){


     axios.get('/show_all_hall').then(({data}) => (this.showallhall = data));


   },


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
  axios.get('/delate_my_hall/'+hall_id)
  .then((response)=>{


    Toast.fire({
    icon: 'success',
    title: 'Hall delate Successfully'
     })


    this.myallhall();


      })
   .catch(()=>{
   console.log('fail');

    })

},



},





        mounted() {

        //  this.displayalldepartment();
            this.myallhall();


        //  this.showallteacherinform();



        }
    }
</script>
