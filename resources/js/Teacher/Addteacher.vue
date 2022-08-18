
<template>
    <div>


      <Mybackendheader></Mybackendheader>

      <MyBackendsidebar></MyBackendsidebar>


        <section class="content" style="margin-top:20px;margin-bottom:500px;width:80%;margin-left:18%">
          <div class="container-fluid">
             <div class="row">
               <div class="col-12">




        <div class="card" style="padding-bottom:20px;">
        <div class="card-header">
        <div class="main">
                 <div class="title" style="width:1000px;float:left">
                   <h3 class="card-title">All Techer</h3>
                 </div>

        <div class="but">
               <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Add Techer
               </button>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
                      <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel" style="color:green">Add Techer</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                      </button>
                      </div>
        <div class="modal-body">

        <form enctype="multipart/form-data" role="form" @submit.prevent = "addteacher()">





              <div class="form-group">
              <label>Techer Name</label>
              <input v-model="form.teacher_name " type="text" name="teacher_name "
              class="form-control" :class="{ 'is-invalid': form.errors.has('teacher_name ') }" placeholder="Enater Techer Name">
              <has-error :form="form" field="teacher_name "></has-error>
              </div>

              <!-- <div class="form-group">
                   <label for="exampleFormControlSelect1">Select Category</label>
                     <select  v-model="form.parent_id" class="form-control" id="exampleFormControlSelect1" name="parent_id" :class="{ 'is-invalid': form.errors.has('parent_id') }" style="width:420px;" required>
                       <option value="" disable>Select</option>
                       <option style="color:black;font-weight:bold;" value="0">Main Category</option>
                       <option style="color:green;font-weight:bold;" v-for="selectcategory in allcategoryshowinform" :value="selectcategory.id">{{selectcategory.cat_name}}</option>
                     </select>
                     <has-error :form="form" field="parent_id"></has-error>
              </div> -->



              <div class="form-group">
                   <label for="exampleFormControlSelect1">Select Department</label>
                     <select  v-model="form.dep_id" class="form-control" id="exampleFormControlSelect1" name="dep_id" :class="{ 'is-invalid': form.errors.has('dep_id') }" style="" required>
                       <option value="" disable>Select</option>
                       <!-- <option style="color:black;font-weight:bold;" disable>Select</option> -->
                       <option style="color:green;font-weight:bold;" v-for="selectdept in alldepartment" :value="selectdept.department_id">{{selectdept.department_name }}</option>

                     </select>
                     <has-error :form="form" field="dep_id"></has-error>
              </div>







              <div class="form-group">
              <label>Techer Email</label>
              <input v-model="form.teacher_email" type="email" name="teacher_email"
              class="form-control" :class="{ 'is-invalid': form.errors.has('teacher_email') }" placeholder="Enater Techer Email">
              <has-error :form="form" field="teacher_email"></has-error>
              </div>







  <div class="form-group">
       <label for="exampleFormControlSelect1">Select Profession</label>
         <select  v-model="form.proffe_id" class="form-control" id="exampleFormControlSelect1" name="proffe_id" :class="{ 'is-invalid': form.errors.has('proffe_id') }" style="" required>
           <option value="" disabled>Selecet</option>
           <!-- <option style="color:black;font-weight:bold;" disable>Select</option> -->
           <option style="color:green;font-weight:bold;" v-for="selectdept in allprofession" :value="selectdept.profession_id">{{selectdept.Profession_name}}</option>

         </select>
         <has-error :form="form" field="proffe_id"></has-error>
  </div>


















  <div class="form-group">
  <label for="exampleInputFile">Teacher Image</label>
  <div class="ass" style="margin-bottom:10px;">
  <img :src="form.teacher_image" alt="" style="height:70px;width:70px;">
  </div>

  <div class="input-group">
  <div class="custom-file">
  <input @change="changephoto($event)" type="file" class="custom-file-input" id="exampleInputFile" name="teacher_image" :class="{ 'is-invalid': form.errors.has('teacher_image') }" required>
  <label class="custom-file-label" for="exampleInputFile">Choose file</label>
  <has-error :form="form" field="teacher_image"></has-error>
  </div>
  </div>
  </div>


  <div class="form-group">
       <label for="exampleFormControlSelect1">Teacher District</label>
         <select  v-model="form.teacher_district" class="form-control" id="exampleFormControlSelect1" name="teacher_district" :class="{ 'is-invalid': form.errors.has('teacher_district') }" style="" required>
           <option value="" disable>Select</option>
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
         <has-error :form="form" field="teacher_district"></has-error>
  </div>







                <div class="form-group">
                <label>Teacher Address</label>
                <input v-model="form.teacher_address" type="text" name="teacher_address"
                class="form-control" :class="{ 'is-invalid': form.errors.has('teacher_address') }" placeholder="Enater Teacher Address">
                <has-error :form="form" field="teacher_address"></has-error>
                </div>

                <div class="form-group">
                <label>Teacher Mobile Number</label>
                <input v-model="form.teacher_mobile_number" type="text" name="teacher_mobile_number"
                class="form-control" :class="{ 'is-invalid': form.errors.has('teacher_mobile_number') }" placeholder="Enater Teacher Experience">
                <has-error :form="form" field="teacher_mobile_number"></has-error>
                </div>

                <div class="form-group">
                <label>Teacher Experience</label>
                <input v-model="form.teacher_experience" type="number" name="teacher_experience"
                class="form-control" :class="{ 'is-invalid': form.errors.has('teacher_experience') }" placeholder="Enater Product Quntity">
                <has-error :form="form" field="teacher_experience"></has-error>
                </div>


                <div class="form-group">
                <label>Teacher Password</label>
                <input v-model="form.teacher_passwoard" type="password" name="teacher_passwoard"
                class="form-control" :class="{ 'is-invalid': form.errors.has('teacher_passwoard') }" placeholder="Enater Teacher Passwoard">
                <has-error :form="form" field="teacher_passwoard"></has-error>
                </div>




                <div class="form-group">
                    <label>Teacher Description</label>
                    <textarea v-model="form.teacher_description" type="text" name="teacher_description"
                      class="form-control" :class="{ 'is-invalid': form.errors.has('teacher_description') }" placeholder="Enter Product Description" required></textarea>
                    <has-error :form="form" field="teacher_description"></has-error>
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
          <th style="text-align:center;">Teacher Id</th>
          <th style="text-align:center;">Teacher Name</th>
          <th style="text-align:center;">Department</th>



            <th style="text-align:center;">Profession</th>
              <th style="text-align:center;">Salary</th>
              <!-- <th style="text-align:center;">Image</th> -->
          <th style="text-align:center;">Image</th>
          <th style="text-align:center;">Action</th>
          <th style="text-align:center;">ON/OFF</th>
          <th style="text-align:center;">Action</th>
      </tr>
      </tr>




      </thead>

      <tbody>

       <tr v-for="(v_showteacher,index) in showmyallteachers">


            <td style="text-align:center;padding-top:30px;">{{index+1}}</td>
          <td style="text-align:center;padding-top:30px;">{{v_showteacher.teacher_id}}</td>

          <!-- <td style="text-align:center;padding-top:30px;color:blue;" v-if="v_showteacher.teacher_name == 'null'">{{v_showteacher.teacher_name}}</td> -->
            <td style="text-align:center;padding-top:30px;color:blue;">{{v_showteacher.teacher_name}}</td>

              <td style="text-align:center;padding-top:30px;">{{v_showteacher.department_name}}</td>

                <td style="text-align:center;padding-top:30px;">{{v_showteacher.Profession_name}}</td>

          <td style="text-align:center;padding-top:30px;">{{v_showteacher.profession_salary}} TK</td>

            <!-- <td style="text-align:center;padding-top:30px;">{{v_showteacher.teacher_mobile_number}}</td> -->
            <td style="text-align:center"><img :src="ourimage(v_showteacher.teacher_image)" alt="" style="height:70px;width:70px;"></td>




          <td>

          <div v-if="v_showteacher.teacher_status == 1">
           <p style="text-align:center;color:blue;padding-top:18px">Active</p>
          </div>
          <div v-else="v_showteacher.teacher_status == 0">
           <p style="text-align:center;color:red;padding-top:18px">Unactive</p>
          </div>

          <!-- <div>
           <p style="text-align:center;color:blue;padding-top:18px">Active</p>
          </div> -->



          </td>

          <td style="">

          <div v-if="v_showteacher.teacher_status == 1">
          <a class="btn btn-primary btn-sm" style="margin-top:20px;color:white;margin-left:35px;" @click.prevent = "activeteacheroff(v_showteacher.teacher_id)" >OFF</a>
          </div>

          <div v-else="v_showteacher.teacher_status == 0">
          <a class="btn btn-success btn-sm" style="margin-top:20px;color:white;margin-left:35px;" @click.prevent = "unactiveteacheron(v_showteacher.teacher_id)" >ON</a>
          </div>

          <!-- <div >
          <a class="btn btn-primary btn-sm" style="margin-top:17px;color:white;margin-left:7px;">OFF</a>
          </div> -->



        </td>

           <td>

           <center>


    <router-link :to="`/view_teacher/${v_showteacher.teacher_id}`" class="btn btn-primary btn-sm" style="margin-top:17px;"><i class="fa fa-eye" aria-hidden="true"></i></router-link>
    <!-- <a class="btn btn-warning btn-sm" style="margin-top:17px;" @click.prevent = "deleteteacher(v_showteacher.teacher_id)"><i class="fa fa-trash" aria-hidden="true"></i></a> -->
    <router-link :to="`/edit_teacher/${v_showteacher.teacher_id}`" class="btn btn-success btn-sm" style="margin-top:17px;" ><i class="fa fa-edit" aria-hidden="true"></i></router-link>

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
          allprofession:{},

         showmyallteachers:{},



          // Create a new form instance
          form: new Form({

                teacher_id: '',
             	  dep_id: '',
             	  teacher_name : '',
                proffe_id:'',
                teacher_email:'',
                teacher_image :'',
                teacher_address :'',
                teacher_district :'',
                teacher_mobile_number :'',
                teacher_description :'',
                teacher_added_date :'',
                teacher_passwoard :'',
                teacher_experience :'' ,
                teacher_status :'',


          })
        }
      },


      components: {
         MyBackendsidebar,
         Mybackendheader,
         Mybackendfooter,
       },




    methods:{

deleteteacher(teacher_id){
  axios.get('/delate_teacher/'+teacher_id)
  .then((response)=>{


    Toast.fire({
    icon: 'success',
    title: 'Teacher delate Successfully'
     })

    // this.displayalldepartment();
    // this.myallcourse();
    this.showallteacher();


      })
   .catch(()=>{
   console.log('fail');

    })


},



showallteacher(){


        axios.get('/show_my_all_teacher').then((res) => {

       this.showmyallteachers = res.data.showmyallteachers


})







},


showallteacherprofesion(){

axios.get('/show_my_all_profession_addteacher').then(({data}) => (this.allprofession = data));


},





      ourimage(img){

              return "/images/"+img;

          },

//change photo
      changephoto(event){

           let file = event.target.files[0];
           let reader = new FileReader();
           reader.onload = event => {
           this.form.teacher_image  = event.target.result
           console.log(event.target.result)
           };
           reader.readAsDataURL(file);

           },


           showalldepartmentinform(){


          axios.get('/show_all_department_in_add_teacher').then(({data}) => (this.alldepartment = data));


        },

       //add category
       addteacher(){

        this.form.post('/addteacher_formaction')
        .then((response)=>{

          $('#exampleModal').modal('hide')
          this.form.reset();

          if(response.data==0){

               Toast.fire({
               icon: 'error',
               title: 'This Teacher Alredy Exist'
                })



          }else{



               Toast.fire({
               icon: 'success',
               title: 'Teacher Added Successfully'
                })

                  this.showallteacher();





           }

            // console.log(response.data)




           })
           .catch(()=>{
           console.log('fail');
           })

           },


      activeteacheroff(teacher_id){

      axios.get('/active_teacher_unactive/'+teacher_id)
      .then((response)=>{
        Toast.fire({
        icon: 'success',
        title: 'Teacher Unactive Successfully'
       })

          this.showallteacher();


       })

       },

    //unactive category on
      unactiveteacheron(teacher_id){

        axios.get('/unactive_teacher_active/'+teacher_id)
        .then((response)=>{

          Toast.fire({
          icon: 'success',
          title: 'Teacher Active Successfully'
         })

           this.showallteacher();



         })

       },



deleteproduct(teacher_id){
  axios.get('/delate_product/'+teacher_id)
  .then((response)=>{

    Toast.fire({
    icon: 'success',
    title: 'Product delate Successfully'
     })

      this.showallteacher();

      })
   .catch(()=>{
   console.log('fail');

    })

},



},


computed:{

// getallteacher(){
//
// return this.$store.getters.getTeacher
// }

},




        mounted() {

          this.showallteacher();
          this.showalldepartmentinform();
          this.showallteacherprofesion();
        //  this.$store.dispatch("allTeacher");


          //setInterval(() => this.showalldepartmentinform(),4000);

            // this.showallcategoryandsubinselectaddform();
          // this.showcategoryinselectform();
        //  this.$store.dispatch("allProduct",this.currentPage);
          // this.RealSerchcategory();
        //  this.RealSerchproduct();


        }
    }
</script>
