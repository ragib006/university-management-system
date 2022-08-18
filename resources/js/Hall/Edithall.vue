<template>
    <div>



            <Mybackendheader></Mybackendheader>

            <MyBackendsidebar></MyBackendsidebar>


 <div class="card card-primary" style="width:550px;margin-top:25px;margin-left:40px;margin-bottom:400px;">


<!-- {{this.$route.params.id}} -->
<div class="card-header">
  <h3 class="card-title">Edit hall</h3>

</div>

<form enctype="multipart/form-data" role="form" @submit.prevent = "updatehall()">

<div class="card-body">

  <div class="form-group">
  <label>Hall Name</label>
  <input v-model="form.hall_name" type="text" name="hall_name"
  class="form-control" :class="{ 'is-invalid': form.errors.has('hall_name') }" placeholder="Enater Hall Name">
  <has-error :form="form" field="hall_name"></has-error>
  </div>

  <div class="form-group">
       <label for="exampleFormControlSelect1">Hall Type</label>
         <select  v-model="form.hall_type" class="form-control" id="exampleFormControlSelect1" name="hall_type" :class="{ 'is-invalid': form.errors.has('hall_type') }" style="" required>
           <option value="" disable>Select</option>
              <option style="color:green;font-weight:bold;" value="Nohall">No Hall</option>
           <option style="color:green;font-weight:bold;" value="Male">Male</option>
           <option style="color:green;font-weight:bold;" value="Female">Female</option>

         </select>
         <has-error :form="form" field="hall_type"></has-error>
  </div>

  <div class="form-group">
  <label>Hall Added Date</label>
  <input v-model="form.hall_added_date" type="text" name="hall_added_date"
  class="form-control" :class="{ 'is-invalid': form.errors.has('hall_added_date') }" placeholder="12-07-2021">
  <has-error :form="form" field="hall_added_date"></has-error>
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

                    // allmydepartment:{},
                    // allmysemester:{},
                    // allmyteacher:{},

                  //  allmydepartment:{},

          // Create a new form instance
          form: new Form({


            hall_id:'',
            hall_name: '',
            hall_type: '',
            hall_added_date: '',
            hall_status:'',

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



//   showalldepartmentincourse(){
//
// axios.get('/show_all_department_in_add_course_form').then(({data}) => (this.allmydepartment = data));
//
//   },


    //update category
     updatehall(){

     this.form.post('/update_hall/'+this.$route.params.hall_id)
        .then((response)=>{
         this.$router.push('/add_hall')

          Toast.fire({
          icon: 'success',
          title: 'Hall Update Successfully'
          })

          })
          .catch(()=>{

            console.log('error');

          })



    },







},




        mounted() {



        axios.get('/edit_hallplaceholder_value/'+this.$route.params.hall_id)
        .then((response)=>{

        this.form.fill(response.data)

        })



        },



    }
</script>
