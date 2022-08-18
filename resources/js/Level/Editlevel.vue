<template>
    <div>


      <Mybackendheader></Mybackendheader>

      <MyBackendsidebar></MyBackendsidebar>

 <div class="card card-primary" style="width:550px;margin-top:25px;margin-left:40px;margin-bottom:150px;width:80%;margin-left:18%">


<!-- {{this.$route.params.id}} -->
<div class="card-header">
  <h3 class="card-title">Edit Level</h3>

</div>

<form enctype="multipart/form-data" role="form" @submit.prevent = "updatelevel()">

<div class="card-body">


  <div class="form-group">
  <label>Level Name</label>
  <input v-model="form.level_name" type="text" name="level_name"
  class="form-control" :class="{ 'is-invalid': form.errors.has('level_name') }" placeholder="Enater Level Example CSE-2/1" required>
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
          allmyteacher:{},
          allmyclassroom:{},

                    // allmydepartment:{},
                    // allmysemester:{},
                    // allmyteacher:{},

                  //  allmydepartment:{},

          // Create a new form instance
          form: new Form({


            level_id: '',
            level_name: '',
            dpt_myid:'',
            level_class_room:'',
            level_dpt_tution_free:'',
            tec_id_level_addvisor:'',
            level_added_date: '',
            level_expire_date:'',
            level_added_status:'',

            // batch_id: '',
            // mydept_id: '',
            // batch_name :'',
            // batch_added_date : '',
            // batch_added_status :'',



          })
        }
      },


      components: {
         MyBackendsidebar,
         Mybackendheader,
         Mybackendfooter,
       },



methods:{

  showallclassroominlevel(){

axios.get('/show_all_classroom_in_add_level').then(({data}) => (this.allmyclassroom = data));

  },


     showalltecheruncourse(){

  axios.get('/show_all_teacher_in_add_level').then(({data}) => (this.allmyteacher = data));

     },

     showalldepartmentincourse(){

  axios.get('/show_all_department_in_add_level').then(({data}) => (this.alldepartment = data));

     },






//   showalldepartmentincourse(){
//
// axios.get('/show_all_department_in_add_course_form').then(({data}) => (this.allmydepartment = data));
//
//   },


    //update category
     updatelevel(){

     this.form.post('/update_level/'+this.$route.params.level_id)
        .then((response)=>{
         this.$router.push('/add_level')

          Toast.fire({
          icon: 'success',
          title: 'Level Update Successfully'
          })

          })
          .catch(()=>{

            console.log('error');

          })



    },







},




        mounted() {

          this.showalltecheruncourse();
          this.showalldepartmentincourse();
          this.showallclassroominlevel();


        axios.get('/edit_levelplaceholder_value/'+this.$route.params.level_id)
        .then((response)=>{

        this.form.fill(response.data)

        })



        },



    }
</script>
