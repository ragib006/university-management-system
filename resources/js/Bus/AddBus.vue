<template>
    <div>


      <Mybackendheader></Mybackendheader>

      <MyBackendsidebar></MyBackendsidebar>


  <section class="content" style="margin-top:20px;margin-bottom:400px;">
    <div class="container-fluid">
       <div class="row">
         <div class="col-12">



  <div class="card" style="padding-bottom:20px;">
  <div class="card-header">
  <div class="main">
           <div class="title" style="width:1000px;float:left">
             <h3 class="card-title">All Bus</h3>
           </div>

  <div class="but">
         <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
          Add Bus
         </button>
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
  <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="color:green">AddBus</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>
  <div class="modal-body">

  <form enctype="multipart/form-data" role="form" @submit.prevent = "addbus()">





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
   <th style="text-align:center;">Bus Id</th>
    <th style="text-align:center;">Bus Number</th>
    <th style="text-align:center;">Bus Name</th>
    <th style="text-align:center;">Route</th>
    <th style="text-align:center;">Total Sit</th>


    <th style="text-align:center;">Fee</th>
    <th style="text-align:center;">Added Date</th>
      <th style="text-align:center;">Status</th>
    <th style="text-align:center;">ON/OFF</th>
    <th style="text-align:center;">Action</th>
</tr>




</thead>

<tbody>

 <tr v-for="(v_department,index) in allbus">
 <!-- <tr> -->

     <td style="text-align:center;padding-top:30px;">{{index+1}}</td>
    <td style="text-align:center;padding-top:30px;">{{v_department.bus_id}}</td>
    <td style="text-align:center;padding-top:30px;color:blue;">{{v_department.bus_number}}</td>
    <td style="text-align:center;padding-top:30px;">{{v_department.bus_name}}</td>
      <td style="text-align:center;padding-top:30px;">{{v_department.bus_route}}</td>
    <td style="text-align:center;padding-top:30px;">{{v_department.bus_sit_number}}</td>
    <td style="text-align:center;padding-top:30px;">{{v_department.bus_fee}} Tk</td>

    <td style="text-align:center;padding-top:30px;">{{v_department.bus_added_date }}</td>

    <td>

    <div v-if="v_department.bus_status == 1">
     <p style="text-align:center;color:blue;padding-top:17px">Active</p>
    </div>
    <div v-else="v_department.bus_status == 0">
     <p style="text-align:center;color:red;padding-top:17px">Unactive</p>
    </div>

    <!-- <div>
     <p style="text-align:center;color:red;padding-top:17px">Unactive</p>
    </div> -->



    </td>

    <td>
   <center>
    <div v-if="v_department.bus_status == 1">
    <a class="btn btn-primary btn-sm" style="margin-top:15px;color:white;" @click.prevent = "myactivebusff(v_department.bus_id)">OFF</a>
    </div>

    <div v-else="v_department.bus_status == 0">
    <a class="btn btn-success btn-sm" style="margin-top:15px;color:white;" @click.prevent = "myunactivebuson(v_department.bus_id)">ON</a>
    </div>

  </center>


  </td>

  <td>

     <center>



 <router-link :to="`/edit_bus/${v_department.bus_id}`" class="btn btn-success btn-sm" style="margin-top:17px;" ><i class="fa fa-edit" aria-hidden="true"></i></router-link>

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


          // showallhallroom:{},
           allbus:{},

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
                // hall_room_status:''

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



   allbusshow(){

axios.get('/show_all_bus').then(({data}) => (this.allbus = data));

},


    addbus(){


    this.form.post('/add_bus_formaction')


   .then((response)=>{

     $('#exampleModal').modal('hide')

          this.form.reset();

    this.allbusshow();

    if(response.data==1){

      Toast.fire({
      icon: 'success',
      title: 'Bus Added Successfully'

       })



    }else if(response.data==0){

      Swal.fire({

           icon: 'error',
           title: 'Oops...',
           text: 'This Route Room Allready Exist !!',

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

      myactivebusff(bus_id){

     axios.get('/my_active_bus_unactive/'+bus_id)


       .then((response)=>{

         // console.log(response.data)
        Toast.fire({
        icon: 'success',
        title: 'Bus Unactive Successfully'
       })

    this.allbusshow();


        })

        },

    //unactive category on
      myunactivebuson(bus_id){

        axios.get('/my_unactive_bus_active/'+bus_id)
        .then((response)=>{

          Toast.fire({
          icon: 'success',
          title: 'Bus Active Successfully'
         })


              this.allbusshow();


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
    this.allhallroomshow();


      })
   .catch(()=>{
   console.log('fail');

    })

},



},





        mounted() {

          this.allbusshow();
            // this.myalllevel();
          //  this.allhallroomshow();

          //  this.allhallinaddroomform();



        }
    }
</script>
