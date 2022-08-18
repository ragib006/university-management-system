<template>
    <div>


      <Mybackendheader></Mybackendheader>

      <MyBackendsidebar></MyBackendsidebar>
  <section class="content" style="margin-top:20px;margin-bottom:500px;width:80%;margin-left:18%">
    <div class="container-fluid">
       <div class="row">
         <div class="col-12">



  <div class="card" style="padding-bottom:20px;">
  <div class="card-header">
  <div class="main">
           <div class="title" style="width:1000px;float:left">
             <h3 class="card-title">All Designation</h3>
           </div>

  <div class="but">
         <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
          Add Designation
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
        <label>Designation Name</label>
        <input v-model="form.Profession_name" type="text" name="Profession_name"
        class="form-control" :class="{ 'is-invalid': form.errors.has('Profession_name') }" placeholder="Enter Designation Name">
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
        <label>Designation Salary</label>
        <input v-model="form.profession_salary" type="number" name="profession_salary"
        class="form-control" :class="{ 'is-invalid': form.errors.has('profession_salary') }" placeholder="Enter Designation Salary">
        <has-error :form="form" field="profession_salary"></has-error>
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
    <th style="text-align:center;">Designation Id</th>
    <th style="text-align:center;">Designation Name</th>
    <th style="text-align:center;">Department</th>

    <th style="text-align:center;">Salary</th>
    <th style="text-align:center;">Added Date</th>

    <th style="text-align:center;">Action</th>
</tr>




</thead>

<tbody>

 <tr v-for="(v_department,index) in showallprofession">

   <!-- <tr> -->
    <td style="text-align:center;padding-top:30px">{{index+1}}</td>
    <td style="text-align:center;padding-top:30px">{{v_department.profession_id}}</td>
    <td style="text-align:center;padding-top:30px;">{{v_department.Profession_name}}</td>
    <td style="text-align:center;padding-top:30px;color:blue;">{{v_department.department_name}}</td>
    <td style="text-align:center;padding-top:30px;">{{v_department.profession_salary}} TK</td>
    <td style="text-align:center;padding-top:30px;color:blue;">{{v_department.profession_added_date}}</td>



  <td>

     <center>

   <router-link :to="`/edit_profession/${v_department.profession_id}`" class="btn btn-success btn-sm" style="margin-top:17px;" ><i class="fa fa-edit" aria-hidden="true"></i></router-link>

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

      components: {
         MyBackendsidebar,
         Mybackendheader,
         Mybackendfooter,
       },




    methods:{


      showalldepartmentinform(){


     axios.get('/show_all_department_in_form').then(({data}) => (this.alldepartment = data));


   },

      //showalldepartmentinform
      myallprofession(){


        axios.get('/show_all_profession').then((res) => {
    //  console.log(res.data)
this.showallprofession = res.data.showallprofession


})






    // axios.get('/show_all_profession').then(({data}) => (this.showallprofession = data));


   },


    addprofession(){
    this.form.post('/addprofession_formaction')
   .then((response)=>{


         this.myallprofession();

        $('#exampleModal').modal('hide')

         this.form.reset();

         if(response.data==0){

           Toast.fire({
           icon: 'error',
           title: 'Sorry This Designation Alreay Exist'

            })

               }else if(response.data==1){

                Toast.fire({
                icon: 'success',
                title: 'Designation Added Successfully'

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




},





        mounted() {

        //  this.displayalldepartment();
            this.myallprofession();

            this.showalldepartmentinform();

        //  this.showallteacherinform();



        }
    }
</script>
