<template>
    <div>


            <Mybackendheader></Mybackendheader>

            <MyBackendsidebar></MyBackendsidebar>


 <div class="card card-primary" style="width:550px;margin-top:25px;margin-left:40px;margin-bottom:500px;width:84%;margin-left:16%">


<!-- {{this.$route.params.id}} -->
<div class="card-header">
  <h3 class="card-title">Edit Batch</h3>

</div>

<form enctype="multipart/form-data" role="form" @submit.prevent = "updatebatch()">

<div class="card-body">


  <div class="form-group">
  <label>Batch Name</label>
  <input v-model="form.batch_name" type="text" name="batch_name"
  class="form-control" :class="{ 'is-invalid': form.errors.has('batch_name') }" placeholder="Enter Batch Name Example CSE-1ST" required>
  <has-error :form="form" field="batch_name"></has-error>
  </div>




          <div class="form-group">
               <label for="exampleFormControlSelect1">Select Department</label>
                 <select  v-model="form.mydept_id" class="form-control" id="exampleFormControlSelect1" name="mydept_id" :class="{ 'is-invalid': form.errors.has('mydept_id') }" style="" required>
                   <option value="" disabled>Select</option>

                   <option style="color:green;font-weight:bold;" v-for="selectteacher in allmydepartment" :value="selectteacher.department_id">{{selectteacher.department_name}}</option>

                 </select>
                 <has-error :form="form" field="mydept_id"></has-error>
          </div>


          <div class="form-group">
          <label>Batch Added Date</label>
          <input v-model="form.batch_added_date" type="text" name="batch_added_date"
          class="form-control" :class="{ 'is-invalid': form.errors.has('batch_added_date') }" placeholder="07-02-2010">
          <has-error :form="form" field="batch_added_date"></has-error>
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

                    allmydepartment:{},

          // Create a new form instance
          form: new Form({


            batch_id: '',
            mydept_id: '',
            batch_name :'',
            batch_added_date : '',
            batch_added_status :'',



          })
        }
      },

      components: {
         MyBackendsidebar,
         Mybackendheader,
         Mybackendfooter,
       },




methods:{


  showalldepartmentincourse(){

axios.get('/show_all_department_in_add_batch').then(({data}) => (this.allmydepartment = data));

  },





    //update category
     updatebatch(){

     this.form.post('/updatebatch/'+this.$route.params.batch_id)
        .then((response)=>{
         this.$router.push('/add_batch')

          Toast.fire({
          icon: 'success',
          title: 'Batch Update Successfully'
          })

          })
          .catch(()=>{

            console.log('error');

          })



    },







},




        mounted() {


        //  this.showalldepartmentinform();

        //  this.placeholder();

        // this.showalldepartmentincourse();
        // this.showallsemeterincourse();
        // // this.showalltecheruncourse();
        // this.showalltecheruncourse();

        this.showalldepartmentincourse();

        axios.get('/edit_batchplaceholder_value/'+this.$route.params.batch_id)
        .then((response)=>{

        this.form.fill(response.data)

        })



        },



    }
</script>
