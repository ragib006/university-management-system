
<template>
    <div>



            <Mybackendheader></Mybackendheader>

            <MyBackendsidebar></MyBackendsidebar>

        <section class="content" style="margin-top:20px; margin-bottom:500px;width:82%;margin-left:260px">
          <div class="container-fluid">
             <div class="row">
               <div class="col-12">




        <div class="card" style="padding-bottom:20px;">
        <div class="card-header">
        <div class="main">
                 <div class="title" style="width:1000px;float:left">
                   <h3 class="card-title">All Student - CSE-3/2</h3>
                 </div>

        <div class="but">
               <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Add Student
               </button>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
                      <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel" style="color:green">Add Student</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                      </button>
                      </div>
        <div class="modal-body">

        <form enctype="multipart/form-data" role="form" @submit.prevent = "addstudent()">





              <div class="form-group">
              <label>Student Name</label>
              <input v-model="form.student_name" type="text" name="student_name"
              class="form-control" :class="{ 'is-invalid': form.errors.has('student_name') }" placeholder="Enater Student Name">
              <has-error :form="form" field="student_name"></has-error>
              </div>

              <div class="form-group">
              <label>Student Roll</label>
              <input v-model="form.student_roll" type="text" name="student_roll"
              class="form-control" :class="{ 'is-invalid': form.errors.has('student_roll') }" placeholder="Enater Student Roll">
              <has-error :form="form" field="student_roll"></has-error>
              </div>


              <div class="form-group">
                   <label for="exampleFormControlSelect1">Select Department</label>
                     <select  v-model="form.student_department_id" class="form-control" id="exampleFormControlSelect1" name="student_department_id" :class="{ 'is-invalid': form.errors.has('student_department_id') }" style="" required>
                       <option value="" disabled>Select</option>

                       <option style="color:green;font-weight:bold;" v-for="selectdept in alldepartment" :value="selectdept.department_id">{{selectdept.department_name }}</option>

                     </select>
                     <has-error :form="form" field="student_department_id"></has-error>
              </div>

              <div class="form-group">
                   <label for="exampleFormControlSelect1">Select Batch</label>
                     <select  v-model="form.student_batch_id" class="form-control" id="exampleFormControlSelect1" name="student_batch_id" :class="{ 'is-invalid': form.errors.has('student_batch_id') }" style="" required>
                       <option value="" disabled>Select</option>

                       <option style="color:green;font-weight:bold;" v-for="selectdept in allbatch" :value="selectdept.batch_id">{{selectdept.batch_name}}</option>

                     </select>
                     <has-error :form="form" field="student_batch_id"></has-error>
              </div>






              <div class="form-group">
                   <label for="exampleFormControlSelect1">Select Level</label>
                     <select  v-model="form.student_level_id" class="form-control" id="exampleFormControlSelect1" name="student_level_id" :class="{ 'is-invalid': form.errors.has('student_level_id') }" style="" required>
                       <option value="" disabled>Select</option>

                       <option style="color:green;font-weight:bold;" v-for="selectdept in alllevel" :value="selectdept.level_id">{{selectdept.level_name}}</option>

                     </select>
                     <has-error :form="form" field="student_level_id"></has-error>
              </div>


<!---------
              <div class="form-group">
                   <label for="exampleFormControlSelect1">Select Hallroom</label>
                     <select  v-model="form.student_hallroom_id" class="form-control" id="exampleFormControlSelect1" name="student_hallroom_id" :class="{ 'is-invalid': form.errors.has('student_hallroom_id') }" style="" required>
                
                        <option value="" disabled>Select</option>
          

                       <option style="color:green;;" v-for="selectdept in allhallroom" :value="selectdept.hall_room_id">{{selectdept.hall_room_name}}</option>

                     </select>
                     <has-error :form="form" field="student_hallroom_id"></has-error>
              </div>

---------------->
            


              <div class="form-group">
              <label>Student Email</label>
              <input v-model="form.student_email" type="email" name="student_email"
              class="form-control" :class="{ 'is-invalid': form.errors.has('student_email') }" placeholder="Enater Student Email">
              <has-error :form="form" field="student_email"></has-error>
              </div>


                <div class="form-group">
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
              class="form-control" :class="{ 'is-invalid': form.errors.has('student_address') }" placeholder="Enter Student Addresss">
              <has-error :form="form" field="student_address"></has-error>
              </div>

              <div class="form-group">
              <label>Student Mobile Number</label>
              <input v-model="form.student_mobile_number" type="text" name="student_mobile_number"
              class="form-control" :class="{ 'is-invalid': form.errors.has('student_mobile_number') }" placeholder="Enter Student Mobile Number">
              <has-error :form="form" field="student_mobile_number"></has-error>
              </div>


              <div class="form-group">
              <label>Student Father Name</label>
              <input v-model="form.student_father_name" type="text" name="student_father_name"
              class="form-control" :class="{ 'is-invalid': form.errors.has('student_father_name') }" placeholder="Enter Student Father's Name">
              <has-error :form="form" field="student_father_name"></has-error>
              </div>


              <div class="form-group">
              <label>Student Mother Name</label>
              <input v-model="form.student_mother_name" type="text" name="student_mother_name"
              class="form-control" :class="{ 'is-invalid': form.errors.has('student_mother_name') }" placeholder="Enter Student Mother's Name">
              <has-error :form="form" field="student_mother_name"></has-error>
              </div>

              <div class="form-group">
              <label>Student Father's Mobile Number</label>
              <input v-model="form.student_father_mobile_number" type="text" name="student_father_mobile_number"
              class="form-control" :class="{ 'is-invalid': form.errors.has('student_father_mobile_number') }" placeholder="Enter Student Father's Mobile Number">
              <has-error :form="form" field="student_father_mobile_number"></has-error>
              </div>

              <div class="form-group">
              <label>Student Mother's Mobile Number</label>
              <input v-model="form.student_mother_mobile_number" type="text" name="student_mother_mobile_number"
              class="form-control" :class="{ 'is-invalid': form.errors.has('student_mother_mobile_number') }" placeholder="Enter Student Mother's Mobile Number">
              <has-error :form="form" field="student_mother_mobile_number"></has-error>
              </div>


              <div class="form-group">
              <label for="exampleInputFile">Student Image</label>
              <div class="ass" style="margin-bottom:10px;">
              <img :src="form.student_image" alt="" style="height:70px;width:70px;">
              </div>

              <div class="input-group">
              <div class="custom-file">
              <input @change="changephoto($event)" type="file" class="custom-file-input" id="exampleInputFile" name="student_image" :class="{ 'is-invalid': form.errors.has('student_image') }" required>
              <label class="custom-file-label" for="exampleInputFile">Choose file</label>
              <has-error :form="form" field="student_image"></has-error>
              </div>
              </div>
              </div>



                <div class="form-group">
                <label>Student Password</label>
                <input v-model="form.student_password" type="password" name="student_password"
                class="form-control" :class="{ 'is-invalid': form.errors.has('student_password') }" placeholder="Enter Student Passwoard">
                <has-error :form="form" field="student_password"></has-error>
                </div>




                <div class="form-group">
                    <label>Student Description</label>
                    <textarea v-model="form.student_description" type="text" name="student_description"
                      class="form-control" :class="{ 'is-invalid': form.errors.has('student_description') }" placeholder="Enter Student Description" required></textarea>
                    <has-error :form="form" field="student_description"></has-error>
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


<!---
         <div class="input-group input-group-sm" style="width:20%;padding-bottom:20px;float:right;">
           <input class="form-control form-control-navbar" type="search" @keyup="RealSerchstudent" v-model="keyword" placeholder="Search" aria-label="Search">
           <div class="input-group-append">
             <button @click.prevent="RealSerchstudent" class="btn btn-navbar" style="color:green">
               <i class="fas fa-search"></i>
             </button>
           </div>
         </div>------->


       <table id="section" class="table table-bordered table-striped">




       <thead>

       <tr>
          <th style="text-align:center;">Sl</th>
          <!-- <th style="text-align:center;">Id</th> -->
          <th style="text-align:center;">Roll</th>
          <th style="text-align:center;">Name</th>
          <th style="text-align:center;width:50px;">Department</th>

          <th style="text-align:center;">Batch</th>
          <th style="text-align:center;">Level</th>
        
        
              <th style="text-align:center;">Image</th>
          <!-- <th style="text-align:center;">Image</th> -->
          <th style="text-align:center;">Action</th>
          <th style="text-align:center;">ON/OFF</th>
          <th style="text-align:center;width:400px;">Action</th>
      </tr>
      </tr>




      </thead>

      <tbody>

       <tr v-for="(v_showteacher,index) in alloneonestudent">

   <!-- <tr> -->
           <td style="text-align:center;padding-top:30px;">{{index+1}}</td>
           <!-- <td style="text-align:center;padding-top:30px;">{{v_showteacher.student_id}}</td> -->
           <td style="text-align:center;padding-top:30px;">{{v_showteacher.student_roll}}</td>
           <td style="text-align:center;padding-top:30px;">{{v_showteacher.student_name}}</td>
           <td style="text-align:center;padding-top:30px;">{{v_showteacher.department_name}}</td>

           <td style="text-align:center;padding-top:30px;width:90px">{{v_showteacher.batch_name}}</td>
           <td style="text-align:center;padding-top:30px;width:90px">{{v_showteacher.level_name}}</td>
          
          
           <td style="text-align:center"><img :src="ourimage(v_showteacher.student_image)" alt="" style="height:70px;width:70px;"></td>



          <td>

          <div v-if="v_showteacher.student_status == 1">
           <p style="text-align:center;color:blue;padding-top:18px">Active</p>
          </div>
          <div v-else="v_showteacher.student_status == 0">
           <p style="text-align:center;color:red;padding-top:18px">Unactive</p>
          </div>


          </td>

          <td style="">
         <center>
          <div v-if="v_showteacher.student_status == 1">
          <a class="btn btn-primary btn-sm" style="margin-top:17px;color:white;" @click.prevent = "activestudentoff(v_showteacher.student_id)" >OFF</a>
          </div>

          <div v-else="v_showteacher.student_status == 0">
          <a class="btn btn-success btn-sm" style="margin-top:17px;color:white;" @click.prevent = "unactivestudenton(v_showteacher.student_id)" >ON</a>
          </div>
        </center>



        </td>

           <td>

           <center>

<router-link :to="`/view_stuent/${v_showteacher.student_id}`" class="btn btn-danger btn-sm" style="margin-top:17px;" ><i class="fa fa-eye" aria-hidden="true" style="color:white;"></i></router-link>

<router-link :to="`/edit_student/${v_showteacher.student_id}`" class="btn btn-success btn-sm" style="margin-top:17px;" ><i class="fa fa-edit" aria-hidden="true" style="color:white;"></i></router-link>

<router-link :to="`/all_libary_book_take_student/${v_showteacher.student_id}`" class="btn btn-primary btn-sm" style="margin-top:17px;" ><i class="fas fa-book" aria-hidden="true" style="color:white;"></i></router-link>

<router-link :to="`/add_student_department_course/${v_showteacher.student_id}`" class="btn btn-info btn-sm" style="margin-top:17px;" ><i class="fas fa-book-open" aria-hidden="true" style="color:white;"></i></router-link>



<router-link :to="`/view_student_semester_final_all_course_result/${v_showteacher.student_id}`" class="btn btn-primary btn-sm" style="margin-top:17px;" ><i class="fas fa-graduation-cap" aria-hidden="true" style="color:white;"></i></router-link>




<router-link :to="`/view_student_all_semesterfinal_result/${v_showteacher.student_id}`" class="btn btn-success btn-sm" style="margin-top:17px;" ><i class="fas fa-list-alt" aria-hidden="true" style="color:white;"></i></router-link>


<router-link :to="`/view_specefic_student_semesterfee/${v_showteacher.student_id}`" class="btn btn-primary btn-sm" style="margin-top:17px;" ><i class="fas fa-dollar-sign" aria-hidden="true" style="color:white;"></i></router-link>



<router-link :to="`/view_student_semesterfee_due/${v_showteacher.student_id}`" class="btn btn-primary btn-sm" style="margin-top:17px;" ><i class="fas fa-money-bill-wave" aria-hidden="true" style="color:white;"></i></router-link>




<!-- view_student_semester_final_all_course_result/:addstuent_courseid -->


<!-- <router-link :to="`/edit_student/${v_showteacher.student_id}`" class="btn btn-success btn-sm" style="margin-top:17px;" ><i class="fas fa-book" aria-hidden="true"></i></router-link> -->
<!--
<router-link :to="`/view_student_course/${v_showteacher.student_id}`" class="btn btn-primary btn-sm" style="margin-top:17px;" ><i class="fas fa-book" aria-hidden="true" style="color:white;"></i></router-link>


<router-link :to="`/add_student_course/${v_showteacher.student_id}`" class="btn btn-info btn-sm" style="margin-top:17px;" ><i class="fas fa-book-open" aria-hidden="true" style="color:white;"></i></router-link>


<router-link :to="`/student_semester_final_cgpa_result/${v_showteacher.student_id}`" class="btn btn-success btn-sm" style="margin-top:17px;" ><i class="fa fa-list-alt" aria-hidden="true" style="color:white;"></i></router-link>

<router-link :to="`/view_student_all_semester_result/${v_showteacher.student_id}`" class="btn btn-secondary btn-sm" style="margin-top:17px;" ><i class="fas fa-graduation-cap" aria-hidden="true" style="color:white;"></i></router-link>



<router-link :to="`/view_specefic_student_semesterfee/${v_showteacher.student_id}`" class="btn btn-primary btn-sm" style="margin-top:17px;" ><i class="fas fa-dollar-sign" aria-hidden="true" style="color:white;"></i></router-link>

<router-link :to="`/show_all_libary_book_add_student/${v_showteacher.student_id}`" class="btn btn-primary btn-sm" style="margin-top:17px;" ><i class="fab fa-accusoft" aria-hidden="true" style="color:white;"></i></router-link>
 -->
<a class="btn btn-warning btn-sm" style="margin-top:17px;" @click.prevent = "deletestudent(v_showteacher.student_id)"><i class="fa fa-trash" aria-hidden="true"></i></a>
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


          alldepartment:{},
          alllevel:{},
          allhallroom:{},
          allbus:{},
          allbatch:{},
         // keyword:'',


         alloneonestudent:{},

         //showmyallteachers:{},



          // Create a new form instance
          form: new Form({

                student_id: '',
             	  student_department_id: '',
             	  student_level_id: '',
              //  student_hallroom_id:'',
                //student_bus_id:'',
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

//search category
//RealSerchstudent:_.debounce(function(){

//this.$store.dispatch('Searchstudent',this.keyword);

//},1000),alloneonestudent


showoneonetwo(){


axios.get('/show_three_two_student').then(({data}) => (this.alloneonestudent = data));

},



showalllevelinstudentform(){

axios.get('/show_all_level_student_form').then(({data}) => (this.alllevel = data));


},

showallbatchinstudentform(){

axios.get('/show_all_batch_student_form').then(({data}) => (this.allbatch = data));


},




showallbusinstudentform(){

axios.get('/show_all_bus_student_form').then(({data}) => (this.allbus = data));


},


showallhallroominstudentform(){

axios.get('/show_all_hallroom_student_form').then(({data}) => (this.allhallroom = data));


},



     showalldepartmentinform(){


    axios.get('/show_all_department_in_addstudent_form').then(({data}) => (this.alldepartment = data));


  },





      ourimage(img){

              return "/images/"+img;

          },

//change photo
      changephoto(event){

           let file = event.target.files[0];
           let reader = new FileReader();
           reader.onload = event => {
           this.form.student_image = event.target.result
           console.log(event.target.result)
           };
           reader.readAsDataURL(file);

           },



       //add category
       addstudent(){

        this.form.post('/add_student_formaction')
        .then((response)=>{

        //  console.log(response.data)


          $('#exampleModal').modal('hide')

               this.form.reset();

                  this.$store.dispatch("allStudent")


               if(response.data==0){

                  Swal.fire({

                       icon: 'error',
                       title: 'Oops...',
                       text: 'Sorry This Student Allready Exist !!',

                       })

                     }else if(response.data==1){

                      Toast.fire({
                      icon: 'success',
                      title: 'Student Added Successfully'

                       })

                     }else if(response.data==11){

                      Toast.fire({
                      icon: 'error',
                      title: 'Sorry Not Any Sit In This Hallroom'

                       })

                     }

                     //else if(response.data==12){

                    //  Toast.fire({
                     // icon: 'error',
                    //  title: 'Sorry Not Any Sit In This Bus'

                     //  })

                    // }
                     else{

                      console.log(response.data)

                     }




           })
           .catch(()=>{
           console.log('fail');
           })

           },


      activestudentoff(student_id){

      axios.get('/active_student_unactive/'+student_id)
      .then((response)=>{
        Toast.fire({
        icon: 'success',
        title: 'Student Unactive Successfully'
       })

        //  this.showallteacher();
            this.$store.dispatch("allStudent")


       })

       },

    //unactive category on
      unactivestudenton(student_id){

        axios.get('/unactive_student_active/'+student_id)
        .then((response)=>{

          Toast.fire({
          icon: 'success',
          title: 'Student Active Successfully'
         })

           //this.showallteacher();
                this.$store.dispatch("allStudent")



         })

       },



deletestudent(teacher_id){
  axios.get('/delate_student/'+teacher_id)
  .then((response)=>{

    Toast.fire({
    icon: 'success',
    title: 'Student delate Successfully'
     })

      //this.showallteacher();
      this.$store.dispatch("allStudent")

      })
   .catch(()=>{
   console.log('fail');

    })

},



},


computed:{

getallstudent(){

return this.$store.getters.getStudent
}

},




        mounted() {

        //  this.showallteacher();
          this.showalldepartmentinform();
          this.showalllevelinstudentform();
          this.showallhallroominstudentform();
          

          this.showoneonetwo();

         // this.showallbusinstudentform();
      //    this.showallbatchinstudentform();
        //  this.RealSerchstudent();
          //
      //   this.$store.dispatch("allStudent")


        }
    }
</script>
