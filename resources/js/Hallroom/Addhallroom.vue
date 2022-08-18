<template>
    <div>


      <Mybackendheader></Mybackendheader>

      <MyBackendsidebar></MyBackendsidebar>

          <!-- Main content -->
  <section class="content" style="margin-top:20px;margin-bottom:500px;">
    <div class="container-fluid">
       <div class="row">
         <div class="col-12">


  <div class="card" style="padding-bottom:20px;">
  <div class="card-header">
  <div class="main">
           <div class="title" style="width:1000px;float:left">
             <h3 class="card-title">All Hall Room</h3>
           </div>

  <div class="but">
         <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
          Add Hall Room
         </button>
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
  <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="color:green">Add Hall Room</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>
  <div class="modal-body">

  <form enctype="multipart/form-data" role="form" @submit.prevent = "addhallroom()">





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



      <button type="submit" class="btn btn-primary">Submit</button>

 </form>

 </div>
 </div>
 </div>
 </div>
 </div>
 </div>
 </div>



 <div class="card-body">



 <table id="section" class="table table-bordered table-striped">




 <thead>

 <tr>
    <th style="text-align:center;">Sl</th>
   <th style="text-align:center;"> Room Id</th>
    <th style="text-align:center;">Hall Name</th>
    <th style="text-align:center;">Room Name</th>
    <th style="text-align:center;">Room No</th>
    <th style="text-align:center;">Floor</th>

    <th style="text-align:center;">Sit</th>
    <th style="text-align:center;">Sit Fee</th>
      <th style="text-align:center;">Status</th>
    <th style="text-align:center;">ON/OFF</th>
    <th style="text-align:center;">Action</th>
</tr>




</thead>

<tbody>

 <tr v-for="(v_department,index) in showallhallroom">


    <td style="text-align:center;padding-top:30px;">{{index+1}}</td>
    <td style="text-align:center;padding-top:30px;">{{v_department.hall_room_id}}</td>
    <td style="text-align:center;padding-top:30px;color:blue;">{{v_department.hall_name}}</td>
    <td style="text-align:center;padding-top:30px;">{{v_department.hall_room_name}}</td>
    <td style="text-align:center;padding-top:30px;color:blue;">{{v_department.hall_room_number}}</td>
    <td style="text-align:center;padding-top:30px;">{{v_department.hall_room_floor}}</td>
    <td style="text-align:center;padding-top:30px;color:blue;">{{v_department.hall_room_sit_number}}</td>
    <td style="text-align:center;padding-top:30px;;">{{v_department.hall_room_sit_fee}} TK</td>

    <td>

    <div v-if="v_department.hall_room_status == 1">
     <p style="text-align:center;color:blue;padding-top:17px">Active</p>
    </div>
    <div v-else="v_department.hall_room_status == 0">
     <p style="text-align:center;color:red;padding-top:17px">Unactive</p>
    </div>


    </td>

    <td>
   <center>
    <div v-if="v_department.hall_room_status == 1">
    <a class="btn btn-primary btn-sm" style="margin-top:15px;color:white;" @click.prevent = "myactivehallroomoff(v_department.hall_room_id)">OFF</a>
    </div>

    <div v-else="v_department.hall_room_status == 0">
    <a class="btn btn-success btn-sm" style="margin-top:15px;color:white;" @click.prevent = "myunactivehallroomon(v_department.hall_room_id)">ON</a>
    </div>
  </center>


  </td>

  <td>

     <center>


 <router-link :to="`/edit_hall_room/${v_department.hall_room_id}`" class="btn btn-success btn-sm" style="margin-top:17px;" ><i class="fa fa-edit" aria-hidden="true"></i></router-link>
 <a class="btn btn-warning btn-sm" style="margin-top:17px;" @click.prevent = "deletemyhallroom(v_department.hall_room_id)"><i class="fa fa-trash" aria-hidden="true"></i></a>

     </center>

     </td>
     </tr>

 </tbody>





 </table>
 </div>




  </div>

                </div>

              </div>

            </div>

          </section>

 <Mybackendfooter></Mybackendfooter>

    </div>
</template>

<script>
import _ from 'lodash'

import Mybackendheader from "../backendlayout/Adminheader.vue"
import MyBackendsidebar from "../backendlayout/Adminsidebar.vue"
import Mybackendfooter from "../backendlayout/Adminfooter.vue"

    export default {


      data () {
        return {


          showallhallroom:{},
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

                //cat_status: '',


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

   myallhallroom(){


  axios.get('/show_myall_hallroom').then((res) => {

 this.showallhallroom = res.data.showallhallroom




})



},


    addhallroom(){


    this.form.post('/addhall_room_formaction')


   .then((response)=>{

     $('#exampleModal').modal('hide')

          this.form.reset();

     this. myallhallroom();

    if(response.data==1){

      Toast.fire({
      icon: 'success',
      title: 'Room Added Successfully'

       })



    }else if(response.data==0){

      Swal.fire({

           icon: 'error',
           title: 'Oops...',
           text: 'Sorry This Hall Room Allready Exist !!',

           })
         }else{

            console.log('nothing found');

         }




         })

         .catch(()=>{
         console.log('oppp fail');
         })

         },


      //active category off

      myactivehallroomoff(hall_room_id){

     axios.get('/my_active_hallroom_unactive/'+hall_room_id)


       .then((response)=>{

         // console.log(response.data)
        Toast.fire({
        icon: 'success',
        title: 'Room Unactive Successfully'
       })

    this. myallhallroom();


        })

        },

    //unactive category on
      myunactivehallroomon(hall_room_id){

        axios.get('/my_unactive_hallroom_active/'+hall_room_id)
        .then((response)=>{

          Toast.fire({
          icon: 'success',
          title: 'Room Active Successfully'
         })


              this. myallhallroom();


         })

       },



//delete category

deletemyhallroom(hall_room_id){
  axios.get('/delate_hall_room/'+hall_room_id)
  .then((response)=>{


    Toast.fire({
    icon: 'success',
    title: 'Room delate Successfully'
     })

    // this.displayalldepartment();
    // this.myalllevel();
    this. myallhallroom();


      })
   .catch(()=>{
   console.log('fail');

    })

},



},





        mounted() {

            // this.myalllevel();
            this. myallhallroom();

            this.allhallinaddroomform();



        }
    }
</script>
