<template>
    <div>




 <div class="card card-primary" style="width:550px;margin-top:25px;margin-left:40px;">


<!-- {{this.$route.params.id}} -->
<div class="card-header">
  <h3 class="card-title">Edit Student Semester Fee</h3>

</div>

<form enctype="multipart/form-data" role="form" @submit.prevent = "updatestudentsemesterfee()">

<div class="card-body">


                <div class="form-group">
                <label>Student Roll</label>
                <input v-model="form.student_givesemesterfee_studentroll" type="number" name="student_givesemesterfee_studentroll"
                class="form-control" :class="{ 'is-invalid': form.errors.has('student_givesemesterfee_studentroll') }" placeholder="Enater Student Roll">
                <has-error :form="form" field="student_givesemesterfee_studentroll"></has-error>
                </div>




                <div class="form-group">
                     <label for="exampleFormControlSelect1">Select Department</label>
                       <select  v-model="form.student_givesemesterfee_stuentdepartment" class="form-control" id="exampleFormControlSelect1" name="student_givesemesterfee_stuentdepartment" :class="{ 'is-invalid': form.errors.has('student_givesemesterfee_stuentdepartment') }" style="" required>
                         <option value="" disabled>Select</option>

                         <option style="color:green;font-weight:bold;" v-for="selectdept in alldepartment" :value="selectdept.department_id">{{selectdept.department_name }}</option>

                       </select>
                       <has-error :form="form" field="student_givesemesterfee_stuentdepartment"></has-error>
                </div>







                <div class="form-group">
                     <label for="exampleFormControlSelect1">Select Level</label>
                       <select  v-model="form.student_givesemesterfee_stuentlevel" class="form-control" id="exampleFormControlSelect1" name="student_givesemesterfee_stuentlevel" :class="{ 'is-invalid': form.errors.has('student_givesemesterfee_stuentlevel') }" style="" required>
                         <option value="" disabled>Select</option>

                         <option style="color:green;font-weight:bold;" v-for="selectdept in alllevel" :value="selectdept.level_id">{{selectdept.level_name}}</option>

                       </select>
                       <has-error :form="form" field="student_givesemesterfee_stuentlevel"></has-error>
                </div>





                <div class="form-group">
                <label>Student Give Semester Fee Amount</label>
                <input v-model="form.student_givesemesterfee_amount" type="number" name="student_givesemesterfee_amount"
                class="form-control" :class="{ 'is-invalid': form.errors.has('student_givesemesterfee_amount') }" placeholder="Enter Student Gives Semester Fee Amount">
                <has-error :form="form" field="student_givesemesterfee_amount"></has-error>
                </div>


                <div class="form-group">
                <label>Main Semester Fee</label>
                <input v-model="form.main_semester_fee" type="number" name="main_semester_fee"
                class="form-control" :class="{ 'is-invalid': form.errors.has('main_semester_fee') }" placeholder="Enter Main Semester Fee">
                <has-error :form="form" field="main_semester_fee"></has-error>
                </div>

                <div class="form-group">
                <label>Semester Fee Fine</label>
                <input v-model="form.student_givesemesterfee_fine" type="number" name="student_givesemesterfee_fine"
                class="form-control" :class="{ 'is-invalid': form.errors.has('student_givesemesterfee_fine') }" placeholder="Enter Semeter Fee Fine">
                <has-error :form="form" field="student_givesemesterfee_fine"></has-error>
                </div>

                <div class="form-group">
                <label>Semester Fee Fine Day</label>
                <input v-model="form.student_givesemesterfee_fine_day" type="number" name="student_givesemesterfee_fine_day"
                class="form-control" :class="{ 'is-invalid': form.errors.has('student_givesemesterfee_fine_day') }" placeholder="Enter Semester Fee Fine Day">
                <has-error :form="form" field="student_givesemesterfee_fine_day"></has-error>
                </div>


                <div class="form-group">
                <label>Fine + Semeter Fee</label>
                <input v-model="form.student_givesemesterfee_fine_plus_total_amount" type="number" name="student_givesemesterfee_fine_plus_total_amount"
                class="form-control" :class="{ 'is-invalid': form.errors.has('student_givesemesterfee_fine_plus_total_amount') }" placeholder="Enter Fine + Semester Fee">
                <has-error :form="form" field="student_givesemesterfee_fine_plus_total_amount"></has-error>
                </div>

                <div class="form-group">
                <label>Student Extra Money</label>
                <input v-model="form.student_givesemesterfee_extra_money" type="number" name="student_givesemesterfee_extra_money"
                class="form-control" :class="{ 'is-invalid': form.errors.has('student_givesemesterfee_extra_money') }" placeholder="Enter Student Extra Money">
                <has-error :form="form" field="student_givesemesterfee_extra_money"></has-error>
                </div>

                <div class="form-group">
                <label>Semeter Fee Loss Money</label>
                <input v-model="form.student_givesemesterfee_loss_blance" type="number" name="student_givesemesterfee_loss_blance"
                class="form-control" :class="{ 'is-invalid': form.errors.has('student_givesemesterfee_loss_blance') }" placeholder="Enter Student Extra Mone">
                <has-error :form="form" field="student_givesemesterfee_loss_blance"></has-error>
                </div>




                <div class="form-group">
                <label>Student Give Semester Fee Added Date</label>
                <input v-model="form.student_givesemesterfee_added_date" type="text" name="student_givesemesterfee_added_date"
                class="form-control" :class="{ 'is-invalid': form.errors.has('student_givesemesterfee_added_date') }" placeholder="Enter Student Give Semester Fee Date">
                <has-error :form="form" field="student_givesemesterfee_added_date"></has-error>
                </div>




              <button type="submit" class="btn btn-primary">Submit</button>

</div>

</form>


</div>







    </div>
</template>

<script>
    export default {


      data () {
        return {
          alldepartment:{},
          alllevel:{},
        //  allhallroom:{},
        //  allbus:{},
        //  allbatch:{},

          // Create a new form instance
          form: new Form({

            student_givesemesterfee_id: '',
            student_givesemesterfee_studentroll: '',
            student_givesemesterfee_stuentlevel: '',
            student_givesemesterfee_stuentdepartment:'',

            student_givesemesterfee_amount:'',


             main_semester_fee:'',

              student_givesemesterfee_fine:'',
              student_givesemesterfee_fine_day:'',
             student_givesemesterfee_fine_plus_total_amount:'',
             student_givesemesterfee_extra_money:'',
             student_givesemesterfee_loss_blance:'',
             student_givesemesterfee_added_date:'',
            //



          })
        }
      },


methods:{






  showalllevelinstudentform(){

  axios.get('/show_all_level_student_form').then(({data}) => (this.alllevel = data));


  },




showalldepartmentinform(){

 axios.get('/show_all_department_in_addstudent_form').then(({data}) => (this.alldepartment = data));

},










    //update category
     updatestudentsemesterfee(){

     this.form.post('/update_student_semester_fee/'+this.$route.params.student_givesemesterfee_id)
        .then((response)=>{

             if(response.data==1){


               this.$router.push('/add_student_give_semester_fee')

                Toast.fire({
                icon: 'success',
                title: 'SemesterFee Update Successfully'
                })




             }else{


               Toast.fire({
               icon: 'error',
               title: 'Sorry Student Information Wrong'
               })



             }







          //  console.log(response.data);

          })
          .catch(()=>{

            console.log('error');

          })



    },





},




        mounted() {


        this.showalldepartmentinform();
        this.showalllevelinstudentform();





        axios.get('/edit_student_all_semesterfee_placeholder_value/'+this.$route.params.student_givesemesterfee_id)
        .then((response)=>{

        this.form.fill(response.data)

        })



        },



    }
</script>
