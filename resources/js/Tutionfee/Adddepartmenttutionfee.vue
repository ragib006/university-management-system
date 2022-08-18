
<template>
    <div>


      <Mybackendheader></Mybackendheader>

      <MyBackendsidebar></MyBackendsidebar>


        <section class="content" style="margin-top:20px;margin-bottom:500px;width:84%;margin-left:250px">
          <div class="container-fluid">
             <div class="row">
               <div class="col-12">




        <div class="card" style="padding-bottom:20px;">
        <div class="card-header">
        <div class="main">
                 <div class="title" style="width:900px;float:left">
                   <h3 class="card-title">All Department Tution Fee</h3>
                 </div>

        <div class="but">
               <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Add Department Tution Fee
               </button>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
                      <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel" style="color:green">Add Department Tution Fee</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                      </button>
                      </div>
        <div class="modal-body">

        <form enctype="multipart/form-data" role="form" @submit.prevent = "adddepartmenttutionfee()">









              <div class="form-group">
                   <label for="exampleFormControlSelect1">Select Department</label>
                     <select  v-model="form.dep_tutionfee_dep_id" class="form-control" id="exampleFormControlSelect1" name="dep_tutionfee_dep_id" :class="{ 'is-invalid': form.errors.has('dep_tutionfee_dep_id') }" style="" required>
                       <option value="" disabled>Select</option>
                       <!-- <option style="color:black;font-weight:bold;" disable>Select</option> -->
                       <option style="color:green;font-weight:bold;" v-for="selectdept in alldepartment" :value="selectdept.department_id">{{selectdept.department_name }}</option>

                     </select>
                     <has-error :form="form" field="dep_tutionfee_dep_id"></has-error>
              </div>


              <div class="form-group">
                   <label for="exampleFormControlSelect1">Select Level</label>
                     <select  v-model="form.dep_tutionfee_level_id" class="form-control" id="exampleFormControlSelect1" name=" 	dep_tutionfee_level_id" :class="{ 'is-invalid': form.errors.has(' 	dep_tutionfee_level_id') }" style="" required>
                       <option value="" disabled>Select</option>

                       <option style="color:green;font-weight:bold;" v-for="selectdept in alllevel" :value="selectdept.level_id">{{selectdept.level_name}}</option>

                     </select>
                     <has-error :form="form" field="dep_tutionfee_level_id"></has-error>
              </div>


              <div class="form-group">
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


               <div class="form-group">
              <label>Tution Fee Amount</label>
              <input v-model="form.department_tution_fee_amount" type="number" min="0" name="department_tution_fee_amount"
              class="form-control" :class="{ 'is-invalid': form.errors.has('department_tution_fee_amount') }" placeholder="Enter Tution Fee Amount">
              <has-error :form="form" field="department_tution_fee_amount"></has-error>
              </div>






              <div class="form-group">
             <label>Tution Fee Added Date</label>
             <input v-model="form.department_tution_fee_added_date" type="date" name="department_tution_fee_added_date"
             class="form-control" :class="{ 'is-invalid': form.errors.has('department_tution_fee_added_date') }" placeholder="Enter Tution Fee Amount">
             <has-error :form="form" field="department_tution_fee_added_date"></has-error>
             </div>


             <div class="form-group">
            <label>Tution Fee Last Date</label>
            <input v-model="form.department_tution_fee_last_date" type="date" name="department_tution_fee_last_date"
            class="form-control" :class="{ 'is-invalid': form.errors.has('department_tution_fee_last_date') }" placeholder="Enter Tution Fee Amount">
            <has-error :form="form" field="department_tution_fee_last_date"></has-error>
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
           <th style="text-align:center;">Department</th>
           <th style="text-align:center;">Level</th>
           <th style="text-align:center;">Tution Fee</th>
           <th style="text-align:center;">Tution Fee Type</th>
          <th style="text-align:center;">Tution Fee Added Date</th>
          <th style="text-align:center;">Tution Fee Last Date</th>
          <th style="text-align:center;">Action</th>
      </tr>
      </tr>




      </thead>

      <tbody>








          <tr v-for="(v_showteacher,index) in gettutionfeeall">

           <td style="text-align:center;padding-top:30px;">{{index+1}}</td>
                   <td style="text-align:center;padding-top:30px;">{{v_showteacher.department_name}}</td>
           <td style="text-align:center;padding-top:30px;">{{v_showteacher.level_name}}</td>


              <td style="text-align:center;padding-top:30px;">{{v_showteacher.department_tution_fee_amount }} TK</td>
            <td style="text-align:center;padding-top:30px;">{{v_showteacher.department_tution_fee_type}}</td>
            <td style="text-align:center;padding-top:30px;">{{v_showteacher.department_tution_fee_added_date}}</td>
            <td style="text-align:center;padding-top:30px;">{{v_showteacher.department_tution_fee_last_date}}</td>




           <center>

<!--

              <a class="btn btn-warning btn-sm" style="margin-top:17px;"><i class="fa fa-trash" aria-hidden="true"></i></a>
 -->


    <!-- <router-link :to="`/view_teacher/${v_showteacher.teacher_id}`" class="btn btn-primary btn-sm" style="margin-top:17px;"><i class="fa fa-eye" aria-hidden="true"></i></router-link>
     -->
    <!-- <a class="btn btn-warning btn-sm" style="margin-top:17px;" @click.prevent = "deleteteacher(v_showteacher.teacher_id)"><i class="fa fa-trash" aria-hidden="true"></i></a> -->

    <router-link :to="`/edit_department_tution_fee/${v_showteacher.department_tution_fee_id}`" class="btn btn-success btn-sm" style="margin-top:17px;" ><i class="fa fa-edit" aria-hidden="true"></i></router-link>

        </center>


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
          alllevel:{},
          gettutionfeeall:{},
        //  allprofession:{},

      //   showmyallteachers:{},



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

deleteteacher(teacher_id){
  axios.get('/delate_teacher/'+teacher_id)
  .then((response)=>{


    Toast.fire({
    icon: 'success',
    title: 'Teacher delate Successfully'
     })

    // this.displayalldepartment();
    // this.myallcourse();
    this.showallteacher();


      })
   .catch(()=>{
   console.log('fail');

    })


},



showalllevelintutionfee(){

      axios.get('/all_level_show_in_tution_fee').then((res) => {

       this.alllevel = res.data.alllevel


})

},


showdepartmenttutionfeeall(){

axios.get('/show_all_department_tution_fee').then((res) => {

 this.gettutionfeeall = res.data.gettutionfeeall


})

},

showalldepartmentinform(){

  axios.get('/show_all_department_in_from').then((res) => {

   this.alldepartment = res.data.alldepartment


  })


},





       //add category
       adddepartmenttutionfee(){

        this.form.post('/adddepartment_tution_fee_formaction')
        .then((response)=>{

          $('#exampleModal').modal('hide')
          this.form.reset();
          //
          if(response.data==0){

               Toast.fire({
               icon: 'error',
               title: 'This Tution Fee Alredy Exist'
                })



          }else{



               Toast.fire({
               icon: 'success',
               title: 'Tution Fee Added Successfully'
                })

                this.showdepartmenttutionfeeall();





           }

          //   console.log(response.data)




           })
           .catch(()=>{
           console.log('fail');
           })

           },









deleteproduct(teacher_id){
  axios.get('/delate_product/'+teacher_id)
  .then((response)=>{

    Toast.fire({
    icon: 'success',
    title: 'Product delate Successfully'
     })

      this.showallteacher();

      })
   .catch(()=>{
   console.log('fail');

    })

},



},


computed:{

// getallteacher(){
//
// return this.$store.getters.getTeacher
// }

},




        mounted() {

        //  this.showallteacher();
          this.showalldepartmentinform();
          this.showalllevelintutionfee();
          this.showdepartmenttutionfeeall();
        //  this.showallteacherprofesion();
        //  this.$store.dispatch("allTeacher");


          //setInterval(() => this.showalldepartmentinform(),4000);

            // this.showallcategoryandsubinselectaddform();
          // this.showcategoryinselectform();
        //  this.$store.dispatch("allProduct",this.currentPage);
          // this.RealSerchcategory();
        //  this.RealSerchproduct();


        }
    }
</script>
