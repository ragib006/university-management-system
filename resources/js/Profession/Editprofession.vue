<template>
    <div>



            <Mybackendheader></Mybackendheader>

            <MyBackendsidebar></MyBackendsidebar>

 <div class="card card-primary" style="width:550px;margin-top:25px;margin-left:40px;margin-bottom:500px;width:80%;margin-left:18%">


<!-- {{this.$route.params.id}} -->
<div class="card-header">
  <h3 class="card-title">Edit Designation</h3>

</div>

<form enctype="multipart/form-data" role="form" @submit.prevent = "updateprofession()">

<div class="card-body">


  <div class="form-group">
  <label>Designation Name</label>
  <input v-model="form.Profession_name" type="text" name="Profession_name"
  class="form-control" :class="{ 'is-invalid': form.errors.has('Profession_name')}" placeholder="Enter Designation Name" style="width:500px">
  <has-error :form="form" field="Profession_name"></has-error>
  </div>


  <div class="form-group">
       <label for="exampleFormControlSelect1">Select Department</label>
         <select  v-model="form.pro_department_id" class="form-control" id="exampleFormControlSelect1" name="pro_department_id" :class="{ 'is-invalid': form.errors.has('pro_department_id') }" style="" required style="width:500px">
           <option value="" disabled>Select</option>
           <!-- <option style="color:black;font-weight:bold;" disable>Select</option> -->
           <option style="color:green;font-weight:bold;" v-for="selectdept in alldepartment" :value="selectdept.department_id">{{selectdept.department_name }}</option>

         </select>
         <has-error :form="form" field="pro_department_id"></has-error>
  </div>






  <div class="form-group">
  <label>Designation Salary</label>
  <input v-model="form.profession_salary" type="number" name="profession_salary"
  class="form-control" :class="{ 'is-invalid': form.errors.has('profession_salary') }" placeholder="Enter Designation Salary" style="width:500px">
  <has-error :form="form" field="profession_salary"></has-error>
  </div>


  <div class="form-group">
  <label>Designation Added Date</label>
  <input v-model="form.profession_added_date" type="text" name="profession_added_date"
  class="form-control" :class="{ 'is-invalid': form.errors.has('profession_added_date') }" placeholder="07-02-2010" style="width:500px">
  <has-error :form="form" field="profession_added_date"></has-error>
  </div>



      <button type="submit" class="btn btn-primary">Update</button>

</div>

</form>


</div>



 <Mybackendfooter></Mybackendfooter>



    </div>
</template>

<script>

import Mybackendheader from "../backendlayout/Adminheader.vue"
import MyBackendsidebar from "../backendlayout/Adminsidebar.vue"
import Mybackendfooter from "../backendlayout/Adminfooter.vue"
    export default {


      data () {
        return {

         alldepartment:{},

          form: new Form({


            profession_id: '',
            pro_department_id: '',
            Profession_name: '',
            profession_salary:'',
            profession_added_date:''



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


 // axios.get('/show_all_department_in_form').then(({data}) => (this.alldepartment = data));
 axios.get('/show_all_department_in_form').then(({data}) => (this.alldepartment = data));


},




     updateprofession(){

     this.form.post('/update_profession/'+this.$route.params.profession_id)
        .then((response)=>{
         this.$router.push('/add_profession')

          Toast.fire({
          icon: 'success',
          title: 'Profession Update Successfully'
          })

          })
          .catch(()=>{

            console.log('error');

          })



    },







},




        mounted() {

         this.showalldepartmentinform();


        axios.get('/edit_professionplaceholder_value/'+this.$route.params.profession_id)
        .then((response)=>{

        this.form.fill(response.data)

        })



        },



    }
</script>
