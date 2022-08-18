<template>
    <div>


<Mybackendheader/>

<MyBackendsidebar/>

 <div class="card card-primary" style="width:550px;margin-top:25px;margin-left:40px;margin-bottom:500px;width:80%;margin-left:18%">


<!-- {{this.$route.params.id}} -->
<div class="card-header">
  <h3 class="card-title">Edit Department</h3>

</div>

<form enctype="multipart/form-data" role="form" @submit.prevent = "updatedepartment()">

<div class="card-body">



          <div class="form-group">
          <label>Department Name</label>
          <input v-model="form.department_name" type="text" name="department_name"
          class="form-control" :class="{ 'is-invalid': form.errors.has('department_name') }" placeholder="Enater Department Name" required style="width:500px">
          <has-error :form="form" field="department_name"></has-error>
          </div>

          <div class="form-group">
          <label>Department Dean</label>
          <input v-model="form.department_dean" type="text" name="department_dean"
          class="form-control" :class="{ 'is-invalid': form.errors.has('department_dean') }" placeholder="Enater Department Dean" required style="width:500px">
          <has-error :form="form" field="department_dean"></has-error>
          </div>

          <div class="form-group">
          <label>Department Head</label>
          <input v-model="form.deprtment_head" type="text" name="deprtment_head"
          class="form-control" :class="{ 'is-invalid': form.errors.has('deprtment_head') }" placeholder="Enater Department Head" required style="width:500px">
          <has-error :form="form" field="deprtment_head"></has-error>
          </div>

          <div class="form-group">
          <label>Department Tuition Fees</label>
          <input v-model="form.department_semester_fee" type="number" name="department_semester_fee"
          class="form-control" :class="{ 'is-invalid': form.errors.has('department_semester_fee') }" placeholder="Enater Department Tuition" required style="width:500px">
          <has-error :form="form" field="department_semester_fee"></has-error>
          </div>


          <div class="form-group">
          <label>Department Added Date</label>
          <input v-model="form.department_added_date" type="text" name="department_added_date"
          class="form-control" :class="{ 'is-invalid': form.errors.has('department_added_date') }" placeholder="07-02-2010" style="width:500px">
          <has-error :form="form" field="department_added_date"></has-error>
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


            department_id: '',
            department_name : '',
            department_added_date : '',
            department_semester_fee:'',
            deprtment_head :'',
            department_dean :'',
            department_added_date_status :'',



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

     this.form.post('/update_department/'+this.$route.params.department_id)
        .then((response)=>{




            this.$router.push('/add_department')

             Toast.fire({
             icon: 'success',
             title: 'Department Update Successfully'
             })


             })

            .catch(()=>{

               console.log('error');

             })









    },







},




        mounted() {




        axios.get('/edit_departmentplaceholder_value/'+this.$route.params.department_id)
        .then((response)=>{

        this.form.fill(response.data)

        })



        },



    }
</script>
