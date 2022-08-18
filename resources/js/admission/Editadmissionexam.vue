<template>
    <div>


<Mybackendheader/>

<MyBackendsidebar/>

 <div class="card card-primary" style="width:550px;margin-top:25px;margin-left:40px;margin-bottom:500px;width:80%;margin-left:18%">


<!-- {{this.$route.params.id}} -->
<div class="card-header">
  <h3 class="card-title">Edit Admission Exam</h3>

</div>

<form enctype="multipart/form-data" role="form" @submit.prevent = "updatedepartment()">

<div class="card-body">




   <div class="form-group">
        <label>Admission Test Name</label>
        <input v-model="form.admissionexam_name" type="text" name="admissionexam_name"
        class="form-control" :class="{ 'is-invalid': form.errors.has('admissionexam_name') }" placeholder="Enter Admission Name" style="width:500px">
        <has-error :form="form" field="admissionexam_name"></has-error>
        </div>

        <div class="form-group">
        <label>Admission Test Date</label>
        <input v-model="form.admission_test_date" type="text" name="admission_test_date"
        class="form-control" :class="{ 'is-invalid': form.errors.has('admission_test_date') }" placeholder="Enter Admission Test Date" style="width:500px">
        <has-error :form="form" field="admission_test_date"></has-error>
        </div>

            <div class="form-group">
        <label>Admission Exam Mark</label>
        <input v-model="form.admission_exam_mark" type="number" name="admission_exam_mark" style="width:500px"
        class="form-control" :class="{ 'is-invalid': form.errors.has('admission_exam_mark') }" placeholder="Enter Admission Exam Mark">
        <has-error :form="form" field="admission_exam_mark"></has-error>
        </div>

        <div class="form-group">
        <label>Applying Last Date</label>
        <input v-model="form.admission_applying_last_date" type="text" name="admission_applying_last_date"
        class="form-control" :class="{ 'is-invalid': form.errors.has('admission_applying_last_date') }" placeholder="Enter Applying Last Date" style="width:500px">
        <has-error :form="form" field="admission_applying_last_date"></has-error>
        </div>

       <div class="form-group">
        <label>Admission Test Year</label>
        <input v-model="form.admission_test_year" type="text" name="admission_applying_last_date"
        class="form-control" :class="{ 'is-invalid': form.errors.has('admission_test_year') }" placeholder="Admission Test Year" style="width:500px">
        <has-error :form="form" field="admission_test_year"></has-error>
        </div>













      <button type="submit" class="btn btn-primary">Update</button>

</div>

</form>


</div>




<Mybackendfooter/>


    </div>
</template>

<script>

import Mybackendheader from "../backendlayout/Adminheader.vue"
import MyBackendsidebar from "../backendlayout/Adminsidebar.vue"
import Mybackendfooter from "../backendlayout/Adminfooter.vue"


    export default {


      data () {
        return {


          // Create a new form instance
          form: new Form({


                admissionexam_id: '',
                admissionexam_name : '',
                admission_test_date: '',
                admission_applying_last_date:'',
                admission_exam_mark:'',
                admission_test_year:'',




          })
        }
      },

      components: {
         MyBackendsidebar,
         Mybackendheader,
         Mybackendfooter,
       },





methods:{



    //update category
     updatedepartment(){

     this.form.post('/update_admission_exam/'+this.$route.params.admissionexam_id)
        .then((response)=>{




            this.$router.push('/add_admission_exam')

             Toast.fire({
             icon: 'success',
             title: 'Admission Exam Update Successfully'
             })


             })

            .catch(()=>{

               console.log('error');

             })









    },







},




        mounted() {




        axios.get('/edit_admissionexamplaceholder_value/'+this.$route.params.admissionexam_id)
        .then((response)=>{

        this.form.fill(response.data)

        })



        },



    }
</script>
