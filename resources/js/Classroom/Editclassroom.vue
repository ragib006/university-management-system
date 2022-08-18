<template>
    <div>



            <Mybackendheader></Mybackendheader>

            <MyBackendsidebar></MyBackendsidebar>

 <div class="card card-primary" style="width:550px;margin-top:25px;margin-left:40px;margin-bottom:200px;width:84%;margin-left:16%">


<!-- {{this.$route.params.id}} -->
<div class="card-header">
  <h3 class="card-title">Edit Classroom</h3>

</div>

<form enctype="multipart/form-data" role="form" @submit.prevent = "updateprofession()">

<div class="card-body">


          <div class="form-group">
          <label>Classroom Name</label>
          <input v-model="form.classroom_name" type="text" name="classroom_name"
          class="form-control" :class="{ 'is-invalid': form.errors.has('classroom_name') }" placeholder="Enater Classroom Name" required>
          <has-error :form="form" field="classroom_name"></has-error>
          </div>


          <div class="form-group">
          <label>Classroom No</label>
          <input v-model="form.classroom_no" type="text" name="classroom_no"
          class="form-control" :class="{ 'is-invalid': form.errors.has('classroom_no') }" placeholder="Enater Classroom No" required>
          <has-error :form="form" field="classroom_no"></has-error>
          </div>





          <div class="form-group">
          <label>Class Room Flour</label>
          <input v-model="form.classroom_flour" type="number" name="classroom_flour"
          class="form-control" :class="{ 'is-invalid': form.errors.has('classroom_flour') }" placeholder="Enter Classroom Flour" required>
          <has-error :form="form" field="classroom_flour"></has-error>
          </div>



  <div class="form-group">
  <label>Profession Added Date</label>
  <input v-model="form.classroom_added_date" type="text" name="classroom_added_date"
  class="form-control" :class="{ 'is-invalid': form.errors.has('classroom_added_date') }" placeholder="07-02-2010">
  <has-error :form="form" field="classroom_added_date"></has-error>
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


            classroom_id: '',
            classroom_name: '',
            classroom_no:'',
            classroom_flour:'',
            classroom_added_date:'',


          })
        }
      },


      components: {
         MyBackendsidebar,
         Mybackendheader,
         Mybackendfooter,
       },


methods:{






     updateprofession(){

     this.form.post('/update_classroom/'+this.$route.params.classroom_id)
        .then((response)=>{
         this.$router.push('/add_class_room')

          Toast.fire({
          icon: 'success',
          title: 'Classroom Update Successfully'
          })

          })
          .catch(()=>{

            console.log('error');

          })



    },







},




        mounted() {


        axios.get('/edit_classroomplaceholder_value/'+this.$route.params.classroom_id)
        .then((response)=>{

        this.form.fill(response.data)

        })



        },



    }
</script>
