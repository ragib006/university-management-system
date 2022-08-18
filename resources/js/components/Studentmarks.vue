<template>
    <div>




 <div class="card card-primary" style="width:550px;margin-top:25px;margin-left:40px;">


<!-- {{this.$route.params.bus_id}} -->
<div class="card-header">
  <h3 class="card-title">{{coursecode.course_code}}   <span style="margin-left:20px;font-weight:bold;">{{coursecode.course_title}}</span></h3>

</div>

<form enctype="multipart/form-data" role="form" @submit.prevent = "addmarkes()">

<div class="card-body">

  <div class="form-group">
  <label>First CT Marks</label>
  <input v-model="form.first_ct_mark" type="text" name="first_ct_mark"
  class="form-control" :class="{ 'is-invalid': form.errors.has('first_ct_mark') }" placeholder="Enter First CT Marks">
  <has-error :form="form" field="first_ct_mark"></has-error>
  </div>


  <div class="form-group">
  <label>Second CT Marks</label>
  <input v-model="form.second_ct_mark" type="text" name="second_ct_mark"
  class="form-control" :class="{ 'is-invalid': form.errors.has('second_ct_mark') }" placeholder="Enter Second CT Marks">
  <has-error :form="form" field="second_ct_mark"></has-error>
  </div>


  <div class="form-group">
  <label>Third CT Marks</label>
  <input v-model="form.third_ct_mark" type="text" name="third_ct_mark"
  class="form-control" :class="{ 'is-invalid': form.errors.has('third_ct_mark') }" placeholder="Enter Third CT Marks">
  <has-error :form="form" field="third_ct_mark"></has-error>
  </div>


  <div class="form-group">
  <label>Third CT Marks</label>
  <input v-model="form.fourth_ct_mark" type="text" name="fourth_ct_mark"
  class="form-control" :class="{ 'is-invalid': form.errors.has('fourth_ct_mark') }" placeholder="Enter Fourth CT Marks">
  <has-error :form="form" field="fourth_ct_mark"></has-error>
  </div>

  <div class="form-group">
  <label>Final Exam Marks</label>
  <input v-model="form.final_exem_mark" type="text" name="final_exem_mark"
  class="form-control" :class="{ 'is-invalid': form.errors.has('final_exem_mark') }" placeholder="Final Exam Marks">
  <has-error :form="form" field="final_exem_mark"></has-error>
  </div>







      <button type="submit" class="btn btn-primary">Update</button>

</div>

</form>


</div>







    </div>
</template>

<script>
    export default {


      data () {
        return {

                    // allmydepartment:{},
                    // allmysemester:{},


             coursecode:{},

          // Create a new form instance
          form: new Form({

            mark_id: '',
            stud_id: '',
            stud_course_id: '',
            first_ct_mark:'',
            second_ct_mark:'',
            third_ct_mark:'',
            fourth_ct_mark:'',
            final_exem_mark:'',
            mark_added_date:'',
            mark_status:'',



          })
        }
      },


methods:{

mycoursecode(){


  axios.get('/show_my_course_code/'+this.$route.params.course_id).then((res) => {

  this.coursecode = res.data.coursecode
 //console.log(res.data)

  })


},



     addmarkes(){

     //this.form.post('/update_bus/'+this.$route.params.bus_id)

     this.form.post('/add_student_markes/'+this.$route.params.course_id)
        .then((response)=>{

          console.log(response.data)
         // this.$router.push('/add_student')
         //
         //  Toast.fire({
         //  icon: 'success',
         //  title: 'Markes Update Successfully'
         //  })

          })
          .catch(()=>{

            console.log('error');

          })

    },


},




        mounted() {


           this.mycoursecode();
        // axios.get('/edit_busplaceholder_value/'+this.$route.params.bus_id)
        // .then((response)=>{
        //
        // this.form.fill(response.data)
        //
        // })



        },



    }
</script>
