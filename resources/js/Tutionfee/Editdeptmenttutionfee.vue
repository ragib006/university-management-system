<template>
    <div>

                  <Mybackendheader></Mybackendheader>

                  <MyBackendsidebar></MyBackendsidebar>

 <div class="card card-primary" style="width:550px;margin-top:25px;margin-left:40px;margin-bottom:500px;width:84%;">


<div class="card-header">
  <h3 class="card-title">Edit Department Tution Fee</h3>

</div>

<form enctype="multipart/form-data" style="width:500px" role="form" @submit.prevent = "updatedepartmenttutionfee()">


                <div class="form-group" style="margin-left:20px;margin-top:20px">
                     <label for="exampleFormControlSelect1">Select Department</label>
                       <select  v-model="form.dep_tutionfee_dep_id" class="form-control" id="exampleFormControlSelect1" name="dep_tutionfee_dep_id" :class="{ 'is-invalid': form.errors.has('dep_tutionfee_dep_id') }" style="" required>
                         <option value="" disabled>Select</option>

                         <option style="color:green;font-weight:bold;" v-for="selectdept in alldepartment" :value="selectdept.department_id">{{selectdept.department_name }}</option>

                       </select>
                       <has-error :form="form" field="dep_tutionfee_dep_id"></has-error>
                </div>


                <div class="form-group" style="margin-left:20px;margin-top:20px">
                     <label for="exampleFormControlSelect1">Select Level</label>
                       <select  v-model="form.dep_tutionfee_level_id" class="form-control" id="exampleFormControlSelect1" name=" 	dep_tutionfee_level_id" :class="{ 'is-invalid': form.errors.has(' 	dep_tutionfee_level_id') }" style="" required>
                         <option value="" disabled>Select</option>

                         <option style="color:green;font-weight:bold;" v-for="selectdept in alllevel" :value="selectdept.level_id">{{selectdept.level_name}}</option>

                       </select>
                       <has-error :form="form" field="dep_tutionfee_level_id"></has-error>
                </div>


                <div class="form-group" style="margin-left:20px;margin-top:20px">
                     <label for="exampleFormControlSelect1">Tution Fee Type</label>
                       <select  v-model="form.department_tution_fee_type" class="form-control" id="exampleFormControlSelect1" name="department_tution_fee_type" :class="{ 'is-invalid': form.errors.has('department_tution_fee_type') }" style="" required>
                         <option value="" disabled>Select</option>
                         <option value="regular" style="color:green;font-weight:bold;">Regular</option>
                          <option value="departmentfast">Department 1st</option>
                          <option value="departmentsecond">Department 2nd</option>
                          <option value="departmentthird">Department 3rd</option>




                       </select>
                       <has-error :form="form" field="department_tution_fee_type"></has-error>
                </div>


                <div class="form-group" style="margin-left:20px;margin-top:20px">
                <label>Tution Fee Amount</label>
                <input v-model="form.department_tution_fee_amount" type="number" min="0" name="department_tution_fee_amount"
                class="form-control" :class="{ 'is-invalid': form.errors.has('department_tution_fee_amount') }" placeholder="Enter Tution Fee Amount">
                <has-error :form="form" field="department_tution_fee_amount"></has-error>
                </div>






              <div class="form-group" style="margin-left:20px;margin-top:20px">
               <label>Tution Fee Added Date</label>
               <input v-model="form.department_tution_fee_added_date" type="date" name="department_tution_fee_added_date"
               class="form-control" :class="{ 'is-invalid': form.errors.has('department_tution_fee_added_date') }" placeholder="Enter Tution Fee Amount">
               <has-error :form="form" field="department_tution_fee_added_date"></has-error>
               </div>


              <div class="form-group" style="margin-left:20px;margin-top:20px">
              <label>Tution Fee Last Date</label>
              <input v-model="form.department_tution_fee_last_date" type="date" name="department_tution_fee_last_date"
              class="form-control" :class="{ 'is-invalid': form.errors.has('department_tution_fee_last_date') }" placeholder="Enter Tution Fee Amount">
              <has-error :form="form" field="department_tution_fee_last_date"></has-error>
              </div>









              <button type="submit" class="btn btn-primary" style="margin-top:20px;margin-left:20px;margin-bottom:20px">Update</button>



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
          // allcatandubcatshowinaddproductform:{},
          // place:{},

            alldepartment:{},
            alllevel:{},

          // allcategoryshowinform:{},

          // Create a new form instance
          form: new Form({


            department_tution_fee_added_date:'',
            department_tution_fee_amount:'',
            dep_tutionfee_dep_id:'',
            department_tution_fee_type:'',
            dep_tutionfee_level_id:'',
            department_tution_fee_last_date:'',




          })
        }
      },



      components: {
         MyBackendsidebar,
         Mybackendheader,
         Mybackendfooter,
       },



methods:{

  showalllevelintutionfee(){

        axios.get('/all_level_show_in_tution_fee').then((res) => {

         this.alllevel = res.data.alllevel


  })

  },

  showalldepartmentinform(){

    axios.get('/show_all_department_in_from').then((res) => {

     this.alldepartment = res.data.alldepartment


    })


  },









    //update category
     updatedepartmenttutionfee(){

     this.form.post('/update_department_tution_fee/'+this.$route.params.department_tution_fee_id)
        .then((response)=>{
         this.$router.push('/add_department_tution_fee')

          Toast.fire({
          icon: 'success',
          title: 'Department Tution Fee Update Successfully'
          })



          //  console.log(response.data);

          })
          .catch(()=>{

            console.log('error');

          })



    },


// placeholder(){
//
// axios.get('/edit_productplaceholder_value/'+this.$route.params.id).then(({data}) => (this.place = data));
//
// },






},




        mounted() {


         this.showalldepartmentinform();
         this.showalllevelintutionfee();

        //  this.placeholder();



       axios.get('/edit_departmenttutionfeeplaceholder_value/'+this.$route.params.department_tution_fee_id)
       .then((response)=>{

       this.form.fill(response.data)

       })


        },



    }
</script>
