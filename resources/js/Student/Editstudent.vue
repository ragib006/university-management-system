<template>
    <div>

      <Mybackendheader></Mybackendheader>

      <MyBackendsidebar></MyBackendsidebar>


 <div class="card card-primary" style="width:550px;margin-top:25px;margin-left:40px;margin-bottom:300px;width:80%;margin-left:18%">


<!-- {{this.$route.params.id}} -->
<div class="card-header">
  <h3 class="card-title">Student Edit</h3>

</div>

<form enctype="multipart/form-data" role="form" @submit.prevent = "updatestudent()">

<div class="card-body">



                <div class="form-group">
                <label>Student Name</label>
                <input v-model="form.student_name" type="text" name="student_name"
                class="form-control" :class="{ 'is-invalid': form.errors.has('student_name') }" placeholder="Enater Student Name" style="width:500px">
                <has-error :form="form" field="student_name"></has-error>
                </div>

                <div class="form-group">
                <label>Student Roll</label>
                <input v-model="form.student_roll" type="text" name="student_roll"
                class="form-control" :class="{ 'is-invalid': form.errors.has('student_roll') }" placeholder="Enater Student Roll" style="width:500px">
                <has-error :form="form" field="student_roll"></has-error>
                </div>




                <div class="form-group">
                     <label for="exampleFormControlSelect1">Select Department</label>
                       <select  v-model="form.student_department_id" class="form-control" id="exampleFormControlSelect1" name="student_department_id" :class="{ 'is-invalid': form.errors.has('student_department_id') }" style="width:500px" required>
                         <option value="" disabled>Select</option>

                         <option style="color:green;font-weight:bold;" v-for="selectdept in alldepartment" :value="selectdept.department_id">{{selectdept.department_name }}</option>

                       </select>
                       <has-error :form="form" field="student_department_id"></has-error>
                </div>

                <div class="form-group">
                     <label for="exampleFormControlSelect1">Select Batch</label>
                       <select  v-model="form.student_batch_id" class="form-control" id="exampleFormControlSelect1" name="student_batch_id" :class="{ 'is-invalid': form.errors.has('student_batch_id') }" style="width:500px" required>
                         <option value="" disabled>Select</option>

                         <option style="color:green;font-weight:bold;" v-for="selectdept in allbatch" :value="selectdept.batch_id">{{selectdept.batch_name}}</option>

                       </select>
                       <has-error :form="form" field="student_batch_id"></has-error>
                </div>






                <div class="form-group">
                     <label for="exampleFormControlSelect1">Select Level</label>
                       <select  v-model="form.student_level_id" class="form-control" id="exampleFormControlSelect1" name="student_level_id" :class="{ 'is-invalid': form.errors.has('student_level_id') }" style="width:500px" required>
                         <option value="" disabled>Select</option>

                         <option style="color:green;font-weight:bold;" v-for="selectdept in alllevel" :value="selectdept.level_id">{{selectdept.level_name}}</option>

                       </select>
                       <has-error :form="form" field="student_level_id"></has-error>
                </div>



<!---------------
                <div class="form-group">
                     <label for="exampleFormControlSelect1">Select Hallroom</label>
                       <select  v-model="form.student_hallroom_id" class="form-control" id="exampleFormControlSelect1" name="student_hallroom_id" :class="{ 'is-invalid': form.errors.has('student_hallroom_id') }" style="width:500px" required>
          
                          <option value="" disabled>Select</option>
                          <!>

                         <option style="color:green;;" v-for="selectdept in allhallroom" :value="selectdept.hall_room_id">{{selectdept.hall_room_name}}</option>

                       </select>
                       <has-error :form="form" field="student_hallroom_id"></has-error>
                </div>

                        ------------>
              

                <div class="form-group">
                <label>Student Email</label>
                <input v-model="form.student_email" type="email" name="student_email"
                class="form-control" :class="{ 'is-invalid': form.errors.has('student_email') }" placeholder="Enater Student Email" style="width:500px">
                <has-error :form="form" field="student_email"></has-error>
                </div>


                  <div class="form-group" style="width:500px">
                       <label for="exampleFormControlSelect1">Student District</label>
                         <select  v-model="form.student_district" class="form-control" id="exampleFormControlSelect1" name="student_district" :class="{ 'is-invalid': form.errors.has('student_district') }" style="" required>
                           <option value="" disabled>Select</option>
                           <option value="Mymensing" style="color:green;font-weight:bold;">Mymensing</option>
                            <option value="Jamalpur">Jamalpur</option>
                            <option value="Netrokona">Netrokona</option>
                            <option value="Sherpur">Sherpur</option>


                            <option value="Rajshahi" style="color:green;font-weight:bold;">Rajshahi</option>
                            <option value="Jaipurhat">Jaipurhat</option>
                            <option value="Bogura">Bogura</option>
                            <option value="Naogaon">Naogaon</option>
                            <option value="Natore">Natore</option>
                            <option value="Nawabganj">Nawabganj</option>
                            <option value="Pabna">Pabna</option>
                            <option value="Sirajganj">Sirajganj</option>


                            <option value="Rangpur" style="color:green;font-weight:bold;">Rangpur</option>
                            <option value="Gaibandha">Gaibandha</option>
                            <option value="Kurigram">Kurigram</option>
                            <option value="Lalmonirhat">Lalmonirhat</option>
                            <option value="Dinajpur">Dinajpur</option>
                            <option value="Panchagarh">Panchagarh</option>
                            <option value="Nilphamari">Nilphamari</option>
                            <option value="Thakurgaon">Thakurgaon</option>


                            <option value="Sylhet" style="color:green;font-weight:bold;">Sylhet</option>
                            <option value="Habiganj">Habiganj</option>
                            <option value="Moulvibazar">Moulvibazar</option>
                            <option value="Sunamganj">Sunamganj</option>


                            <option value="Barishal" style="color:green;font-weight:bold;">Barishal</option>
                            <option value="Barguna">Barguna</option>
                            <option value="Bhola">Bhola</option>
                            <option value="Jhalokati">Jhalokati</option>
                            <option value="Patuakhali">Patuakhali</option>
                            <option value="Pirojpur">Pirojpur</option>

                            <option value="Chattogram" style="color:green;font-weight:bold;">Chattogram</option>
                            <option value="Bandarban">Bandarban</option>
                            <option value="Brahmanbaria">Brahmanbaria</option>
                            <option value="Chandpur">Chandpur</option>
                            <option value="Cox's Bazar">Cox's Bazar</option>
                            <option value="Cumilla">Cumilla</option>
                            <option value="Feni">Feni</option>
                            <option value="Khagrachhari">Khagrachhari</option>
                            <option value="Lakshmipur">Lakshmipur</option>
                            <option value="Noakhali">Noakhali</option>
                            <option value="Rangamati">Rangamati</option>


                            <option value="Dhaka" style="color:green;font-weight:bold;">Dhaka</option>
                            <option value="Faridpur">Faridpur</option>
                            <option value="Gazipur">Gazipur</option>
                            <option value="Gopalganj">Gopalganj</option>
                            <option value="Kishoreganj">Kishoreganj</option>
                            <option value="Madaripur">Madaripur</option>
                            <option value="Manikganj">Manikganj</option>
                            <option value="Munshiganj">Munshiganj</option>
                            <option value="Narayanganj">Narayanganj</option>
                            <option value="Narsingdi">Narsingdi</option>
                            <option value="Rajbari">Rajbari</option>
                            <option value="Shariatpur">Shariatpur</option>
                            <option value="Tangail">Tangail</option>


                            <option value="Khulna" style="color:green;font-weight:bold;">Khulna</option>
                            <option value="Bagerhat">Bagerhat</option>
                            <option value="Chuadanga">Chuadanga</option>
                            <option value="Jashore">Jashore</option>
                            <option value="Jhenaidah">Jhenaidah</option>
                            <option value="Kushtia">Kushtia</option>
                            <option value="Magura">Magura</option>
                            <option value="Meherpur">Meherpur</option>
                            <option value="Narail">Narail</option>
                            <option value="Satkhira">Satkhira</option>

                         </select>
                         <has-error :form="form" field="student_district"></has-error>
                  </div>


                  <div class="form-group">
                  <label>Student Address</label>
                  <input v-model="form.student_address" type="text" name="student_address"
                  class="form-control" :class="{ 'is-invalid': form.errors.has('student_address') }" placeholder="Enter Student Addresss" style="width:500px">
                  <has-error :form="form" field="student_address"></has-error>
                  </div>

                  <div class="form-group">
                  <label>Student Mobile Number</label>
                  <input v-model="form.student_mobile_number" type="text" name="student_mobile_number"
                  class="form-control" :class="{ 'is-invalid': form.errors.has('student_mobile_number') }" placeholder="Enter Student Mobile Number" style="width:500px">
                  <has-error :form="form" field="student_mobile_number"></has-error>
                  </div>


                  <div class="form-group">
                  <label>Student Father Name</label>
                  <input v-model="form.student_father_name" type="text" name="student_father_name"
                  class="form-control" :class="{ 'is-invalid': form.errors.has('student_father_name') }" placeholder="Enter Student Father's Name" style="width:500px">
                  <has-error :form="form" field="student_father_name"></has-error>
                  </div>


                  <div class="form-group">
                  <label>Student Mother Name</label>
                  <input v-model="form.student_mother_name" type="text" name="student_mother_name"
                  class="form-control" :class="{ 'is-invalid': form.errors.has('student_mother_name') }" placeholder="Enter Student Mother's Name" style="width:500px" >
                  <has-error :form="form" field="student_mother_name"></has-error>
                  </div>

                  <div class="form-group">
                  <label>Student Father's Mobile Number</label>
                  <input v-model="form.student_father_mobile_number" type="text" name="student_father_mobile_number" style="width:500px"
                  class="form-control" :class="{ 'is-invalid': form.errors.has('student_father_mobile_number') }" placeholder="Enter Student Father's Mobile Number">
                  <has-error :form="form" field="student_father_mobile_number"></has-error>
                  </div>

                  <div class="form-group">
                  <label>Student Mother's Mobile Number</label>
                  <input v-model="form.student_mother_mobile_number" type="text" name="student_mother_mobile_number" style="width:500px"
                  class="form-control" :class="{ 'is-invalid': form.errors.has('student_mother_mobile_number') }" placeholder="Enter Student Mother's Mobile Number">
                  <has-error :form="form" field="student_mother_mobile_number"></has-error>
                  </div>





                  <div class="form-group" style="width:500px">
                  <label for="exampleInputFile">  Student Image</label>
                  <div class="ass" style="margin-bottom:10px;">
                  <!-- <img :src="`images/${form.product_image}`" alt="" style="height:70px;width:70px;"> -->
                  <img :src="updateimage()" alt="" style="height:70px;width:70px;">
                  </div>

                  <div class="input-group">
                  <div class="custom-file">
                  <input @change="changephoto($event)" type="file" class="custom-file-input" id="exampleInputFile" name="student_image" :class="{ 'is-invalid': form.errors.has('student_image') }" style="width:500px">
                  <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                  <has-error :form="form" field="student_image"></has-error>
                  </div>
                  </div>
                  </div>


                  <div class="form-group">
                  <label>Student Password</label>
                  <input v-model="form.student_password" type="password" name="student_password" style="width:500px"
                  class="form-control" :class="{ 'is-invalid': form.errors.has('student_password') }" placeholder="Enter Student Passwoard">
                  <has-error :form="form" field="student_password"></has-error>
                  </div>




                  <div class="form-group">
                      <label>Student Description</label>
                      <textarea v-model="form.student_description" type="text" name="student_description" style="width:500px"
                        class="form-control" :class="{ 'is-invalid': form.errors.has('student_description') }" placeholder="Enter Student Description" required></textarea>
                      <has-error :form="form" field="student_description"></has-error>
                    </div>



                    <div class="form-group">
                    <label>Student Added Date</label>
                    <input v-model="form.student_added_date" type="text" name="student_added_date" style="width:500px"
                    class="form-control" :class="{ 'is-invalid': form.errors.has('student_added_date') }" placeholder="Example 02-08-2021">
                    <has-error :form="form" field="student_added_date"></has-error>
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
          alllevel:{},
          allhallroom:{},
      
          allbatch:{},

          // Create a new form instance
          form: new Form({

            student_id: '',
            student_department_id: '',
            student_level_id: '',
            student_hallroom_id:'',
          
            student_batch_id:'',
            student_name:'',
            student_roll:'',
            student_email:'',
            student_address:'',
            student_district:'',
            student_mobile_number:'',
            student_father_name:'',
            student_mother_name:'' ,
            student_father_mobile_number:'',
            student_mother_mobile_number:'',
            student_image:'',
            student_description:'',
            student_password:'',
            student_added_date:'',
            student_status:'',


          })
        }
      },


      components: {
         MyBackendsidebar,
         Mybackendheader,
         Mybackendfooter,
       },





methods:{



  showalllevelinstudentform(){

  axios.get('/show_all_level_student_form').then(({data}) => (this.alllevel = data));


  },

  showallbatchinstudentform(){

  axios.get('/show_all_batch_student_form').then(({data}) => (this.allbatch = data));


  },




  //showallbusinstudentform(){

  //axios.get('/show_all_bus_student_form').then(({data}) => (this.allbus = data));


 // },


  showallhallroominstudentform(){

  axios.get('/show_all_hallroom_student_form').then(({data}) => (this.allhallroom = data));


  },



       showalldepartmentinform(){


      axios.get('/show_all_department_in_addstudent_form').then(({data}) => (this.alldepartment = data));


    },







 changephoto(event){

      let file = event.target.files[0];
      let reader = new FileReader();
      reader.onload = event => {
      this.form.student_image  = event.target.result
      console.log(event.target.result)
      };
      reader.readAsDataURL(file);

      },


      updateimage(){

       let img = this.form.student_image;
       if(img.length>100){

          return  this.form.student_image

       }else {


          return "/images/"+this.form.student_image

       }

    },

    //update category
     updatestudent(){

     this.form.post('/update_student/'+this.$route.params.student_id)
        .then((response)=>{
         this.$router.push('/add_student')

          Toast.fire({
          icon: 'success',
          title: 'Student Update Successfully'
          })



          //  console.log(response.data);

          })
          .catch(()=>{

            console.log('error');

          })



    },


// placeholder(){
//
// axios.get('/edit_productplaceholder_value/'+this.$route.params.id).then(({data}) => (this.place = data));
//
// },

// hiragib(){
//
//
//   console.log('ragibbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb')
//
// }




},




        mounted() {


        this.showalldepartmentinform();
        this.showalllevelinstudentform();
        this.showallhallroominstudentform();
       // this.showallbusinstudentform();
        this.showallbatchinstudentform();
        // this.RealSerchstudent();
        // this.hiragib();



        axios.get('/edit_studentplaceholder_value/'+this.$route.params.student_id)
        .then((response)=>{

        this.form.fill(response.data)

        })



        },



    }
</script>
