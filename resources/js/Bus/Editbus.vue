<template>
    <div>



            <Mybackendheader></Mybackendheader>

            <MyBackendsidebar></MyBackendsidebar>

 <div class="card card-primary" style="width:550px;margin-top:25px;margin-left:40px;margin-bottom:400px;">


<div class="card-header">
  <h3 class="card-title">Edit Bus</h3>

</div>

<form enctype="multipart/form-data" role="form" @submit.prevent = "updatebus()">

<div class="card-body">
          <div class="form-group">
          <label>Bus Number</label>
          <input v-model="form.bus_number" type="text" name="bus_number"
          class="form-control" :class="{ 'is-invalid': form.errors.has('bus_number') }" placeholder="Enter Bus Number">
          <has-error :form="form" field="bus_number"></has-error>
          </div>

          <div class="form-group">
          <label>Bus Name</label>
          <input v-model="form.bus_name" type="text" name="bus_name"
          class="form-control" :class="{ 'is-invalid': form.errors.has('bus_name')}" placeholder="Enter Room Number">
          <has-error :form="form" field="bus_name"></has-error>
          </div>


          <div class="form-group">
          <label>Total Sit </label>
          <input v-model="form.bus_sit_number" type="text" name="bus_sit_number"
          class="form-control" :class="{ 'is-invalid': form.errors.has('bus_sit_number') }" placeholder="Enter Total Sits">
          <has-error :form="form" field="bus_sit_number"></has-error>
          </div>

          <div class="form-group">
          <label>Bus Fee</label>
          <input v-model="form.bus_fee" type="text" name="bus_fee"
          class="form-control" :class="{ 'is-invalid': form.errors.has('bus_fee') }" placeholder="Enter Bus Fee">
          <has-error :form="form" field="bus_fee"></has-error>
          </div>

          <div class="form-group">
          <label>Bus Rote</label>
          <input v-model="form.bus_route" type="text" name="bus_route"
          class="form-control" :class="{ 'is-invalid': form.errors.has('bus_route') }" placeholder="Enter Bus Route">
          <has-error :form="form" field="bus_route"></has-error>
          </div>



  <div class="form-group">
  <label>Bus Added Date</label>
  <input v-model="form.bus_added_date" type="text" name="bus_added_date"
  class="form-control" :class="{ 'is-invalid': form.errors.has('bus_added_date') }" placeholder="12-07-2021">
  <has-error :form="form" field="bus_added_date"></has-error>
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

            bus_id: '',
            bus_number: '',
            bus_name: '',
            bus_sit_number:'',
            bus_fee:'',
            bus_route:'',
            bus_added_date:'',
            bus_status:'',



          })
        }
      },


      components: {
         MyBackendsidebar,
         Mybackendheader,
         Mybackendfooter,
       },


methods:{


     updatebus(){

     this.form.post('/update_bus/'+this.$route.params.bus_id)
        .then((response)=>{
         this.$router.push('/add_bus')

          Toast.fire({
          icon: 'success',
          title: 'Bus Update Successfully'
          })

          })
          .catch(()=>{

            console.log('error');

          })



    },







},




        mounted() {



        axios.get('/edit_busplaceholder_value/'+this.$route.params.bus_id)
        .then((response)=>{

        this.form.fill(response.data)

        })



        },



    }
</script>
