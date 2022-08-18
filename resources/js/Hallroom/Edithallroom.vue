<template>
    <div>


      <Mybackendheader></Mybackendheader>

      <MyBackendsidebar></MyBackendsidebar>

 <div class="card card-primary" style="width:550px;margin-top:25px;margin-left:40px;margin-bottom:500px;">


<!-- {{this.$route.params.id}} -->
<div class="card-header">
  <h3 class="card-title">Edit Room</h3>

</div>

<form enctype="multipart/form-data" role="form" @submit.prevent = "updatemyhallroom()">

<div class="card-body">


          <div class="form-group">
          <label>Room Name</label>
          <input v-model="form.hall_room_name" type="text" name="hall_room_name"
          class="form-control" :class="{ 'is-invalid': form.errors.has('hall_room_name') }" placeholder="Enter Room Name">
          <has-error :form="form" field="hall_room_name"></has-error>
          </div>

          <div class="form-group">
          <label>Room Number</label>
          <input v-model="form.hall_room_number" type="text" name="hall_room_number"
          class="form-control" :class="{ 'is-invalid': form.errors.has('hall_room_number')}" placeholder="Enter Room Number">
          <has-error :form="form" field="hall_room_number"></has-error>
          </div>

          <div class="form-group">
               <label for="exampleFormControlSelect1">Hall Name</label>
                 <select  v-model="form.myhall_id" class="form-control" id="exampleFormControlSelect1" name="myhall_id" :class="{ 'is-invalid': form.errors.has('myhall_id') }" style="" required>
                   <option value="" disabled>Select</option>

                   <option style="color:green;font-weight:bold;" v-for="selectteacher in allhall" :value="selectteacher.hall_id">{{selectteacher.hall_name}}</option>

                 </select>
                 <has-error :form="form" field="myhall_id"></has-error>
          </div>

          <div class="form-group">
          <label>Room Floor</label>
          <input v-model="form.hall_room_floor" type="text" name="hall_room_floor"
          class="form-control" :class="{ 'is-invalid': form.errors.has('hall_room_floor') }" placeholder="Enter Hall Room Floor Example = 1st">
          <has-error :form="form" field="hall_room_floor"></has-error>
          </div>

          <div class="form-group">
          <label>How Many Sit In This Room</label>
          <input v-model="form.hall_room_sit_number" type="text" name="hall_room_sit_number"
          class="form-control" :class="{ 'is-invalid': form.errors.has('hall_room_sit_number') }" placeholder="Enter Room Sit Number Example  = 4">
          <has-error :form="form" field="hall_room_sit_number"></has-error>
          </div>

          <div class="form-group">
          <label>Room Sit Fee</label>
          <input v-model="form.hall_room_sit_fee" type="text" name="hall_room_sit_fee"
          class="form-control" :class="{ 'is-invalid': form.errors.has('hall_room_sit_fee') }" placeholder="Enter Room Sit Fee">
          <has-error :form="form" field="hall_room_sit_fee"></has-error>
          </div>




  <div class="form-group">
  <label>Room Added Date</label>
  <input v-model="form.hall_room_added_date" type="text" name="hall_room_added_date"
  class="form-control" :class="{ 'is-invalid': form.errors.has('hall_room_added_date') }" placeholder="12-07-2021">
  <has-error :form="form" field="hall_room_added_date"></has-error>
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

                  allhall:{},

          // Create a new form instance
          form: new Form({


            hall_room_id: '',
            myhall_id: '',
            hall_room_name: '',
            // hall_room_number:'',
            hall_room_number:'',
            hall_room_floor:'',
            hall_room_sit_number:'',
            hall_room_sit_fee:'',
            hall_room_added_date:'',
            hall_room_status:''



          })
        }
      },


      components: {
         MyBackendsidebar,
         Mybackendheader,
         Mybackendfooter,
       },



methods:{

  allhallinaddroomform(){

   axios.get('/show_hall_in_select_form').then(({data}) => (this.allhall = data));

  },


    //update category
  updatemyhallroom(){

     this.form.post('/update_hall_room/'+this.$route.params.hall_room_id)
        .then((response)=>{

         this.$router.push('/add_hall_room')

          Toast.fire({
          icon: 'success',
          title: 'Hall Room Update Successfully'
          })

          })
          .catch(()=>{

            console.log('error');

          })


  //  console.log('hi')


    },







},




        mounted() {

         this.allhallinaddroomform();

        axios.get('/edit_hall_roomplaceholder_value/'+this.$route.params.hall_room_id)
        .then((response)=>{

        this.form.fill(response.data)

        })



        },



    }
</script>
