<template>
    <div>



                  <Mybackendheader></Mybackendheader>

                  <MyBackendsidebar></MyBackendsidebar>

 <div class="card card-primary" style="width:550px;margin-top:25px;margin-left:40px;margin-bottom:500px;width:80%;margin-left:18%">


<!-- {{this.$route.params.id}} -->
<div class="card-header">
  <h3 class="card-title">Teacher Edit</h3>

</div>

<form enctype="multipart/form-data" role="form" @submit.prevent = "updateteacher()">

<div class="card-body">

    <!-- <img :src="`images/${form.product_image}`" alt="" style="height:70px;width:70px;"> -->

    <div class="form-group">
    <label>Techer Name</label>
    <input v-model="form.teacher_name " type="text" name="teacher_name "
    class="form-control" :class="{ 'is-invalid': form.errors.has('teacher_name') }" placeholder="Enater Techer Name" style="width:500px">
    <has-error :form="form" field="teacher_name "></has-error>
    </div>


    <div class="form-group">
         <label for="exampleFormControlSelect1">Select Department</label>
           <select  v-model="form.dep_id" class="form-control" id="exampleFormControlSelect1" name="dep_id" :class="{ 'is-invalid': form.errors.has('dep_id') }" style="" required  style="width:500px">
             <option value="" disable>Select</option>
             <!-- <option style="color:black;font-weight:bold;" disable>Select</option> -->
             <option style="color:green;font-weight:bold;" v-for="selectdept in alldepartment" :value="selectdept.department_id">{{selectdept.department_name }}</option>

           </select>
           <has-error :form="form" field="dep_id"></has-error>
    </div>



                  <div class="form-group">
                  <label>Techer Email</label>
                  <input v-model="form.teacher_email" type="email" name="teacher_email"
                  class="form-control" :class="{ 'is-invalid': form.errors.has('teacher_email') }" placeholder="Enater Techer Email"  style="width:500px">
                  <has-error :form="form" field="teacher_email"></has-error>
                  </div>


                  <!-- <div class="form-group">
                       <label for="exampleFormControlSelect1">Teacher Type</label>
                         <select  v-model="form.teacher_type" class="form-control" id="exampleFormControlSelect1" name="teacher_type" :class="{ 'is-invalid': form.errors.has('teacher_type') }" style="" required>
                           <option value="" disabled>Select</option>

                              <option value="Dean" style="color:black;font-weight:bold;">Dean</option>
                              <option value="Head" style="color:black;font-weight:bold;">Head</option>
                              <option value="Professor" style="color:black;font-weight:bold;">Professor</option>
                              <option value="Assistant Professor" style="color:black;font-weight:bold;">Assistant Professor</option>
                              <option value="Lecturer" style="color:black;font-weight:bold;">Lecturer</option>
                              <option value="Assistant Teacher" style="color:black;font-weight:bold;">Assistant Teacher</option>
                              <option value="Lab Assistant" style="color:black;font-weight:bold;">Lab Assistant</option>

                         </select>
                         <has-error :form="form" field="teacher_type"></has-error>
                  </div> -->


                  <div class="form-group">
                       <label for="exampleFormControlSelect1">Select Profession</label>
                         <select  v-model="form.proffe_id" class="form-control" id="exampleFormControlSelect1" name="proffe_id" :class="{ 'is-invalid': form.errors.has('proffe_id') }" style="" required  style="width:500px">
                           <option value="" disable>Select</option>
                           <!-- <option style="color:black;font-weight:bold;" disable>Select</option> -->
                           <option style="color:green;font-weight:bold;" v-for="selectdept in allprofession" :value="selectdept.profession_id">{{selectdept.Profession_name}}</option>

                         </select>
                         <has-error :form="form" field="proffe_id"></has-error>
                  </div>






                  <div class="form-group">
                  <label for="exampleInputFile">  Teacher Image</label>
                  <div class="ass" style="margin-bottom:10px;">
                  <!-- <img :src="`images/${form.product_image}`" alt="" style="height:70px;width:70px;"> -->
                  <img :src="updateimage()" alt="" style="height:70px;width:70px;">
                  </div>

                  <div class="input-group" style="width:500px" >
                  <div class="custom-file">
                  <input  @change="changephoto($event)" type="file" class="custom-file-input" id="exampleInputFile" name="teacher_image" :class="{ 'is-invalid': form.errors.has('teacher_image') }">
                  <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                  <has-error :form="form" field="teacher_image"></has-error>
                  </div>
                  </div>
                  </div>



                    <div class="form-group">
                         <label for="exampleFormControlSelect1">Teacher District</label>
                           <select  v-model="form.teacher_district" class="form-control" id="exampleFormControlSelect1" name="teacher_district" :class="{ 'is-invalid': form.errors.has('teacher_district') }"  required  style="width:500px">
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
                  <input v-model="form.teacher_address" type="text" name="teacher_address"  style="width:500px"
                  class="form-control" :class="{ 'is-invalid': form.errors.has('teacher_address') }" placeholder="Enater Teacher Address">
                  <has-error :form="form" field="teacher_address"></has-error>
                  </div>

                  <div class="form-group">
                  <label>Teacher Mobile Number</label>
                  <input v-model="form.teacher_mobile_number" type="text" name="teacher_mobile_number"  style="width:500px"
                  class="form-control" :class="{ 'is-invalid': form.errors.has('teacher_mobile_number') }" placeholder="Enater Teacher Experience">
                  <has-error :form="form" field="teacher_mobile_number"></has-error>
                  </div>

                  <div class="form-group">
                  <label>Teacher Experience</label>
                  <input v-model="form.teacher_experience" type="number" name="teacher_experience"  style="width:500px"
                  class="form-control" :class="{ 'is-invalid': form.errors.has('teacher_experience') }" placeholder="Enater Product Quntity">
                  <has-error :form="form" field="teacher_experience"></has-error>
                  </div>


                  <div class="form-group">
                  <label>Teacher Password</label>
                  <input v-model="form.teacher_passwoard" type="password" name="teacher_passwoard"  style="width:500px"
                  class="form-control" :class="{ 'is-invalid': form.errors.has('teacher_passwoard') }" placeholder="Enater Teacher Passwoard">
                  <has-error :form="form" field="teacher_passwoard"></has-error>
                  </div>


                  <div class="form-group">
                  <label>Added Date</label>
                  <input v-model="form.teacher_added_date" type="text" name="teacher_added_date"  style="width:500px"
                  class="form-control" :class="{ 'is-invalid': form.errors.has('teacher_added_date') }" placeholder="Formate 07-02-2021">
                  <has-error :form="form" field="teacher_added_date"></has-error>
                  </div>





                  <div class="form-group">
                      <label>Teacher Description</label>
                      <textarea v-model="form.teacher_description" type="text" name="teacher_description"  style="width:500px"
                        class="form-control" :class="{ 'is-invalid': form.errors.has('teacher_description') }" placeholder="Enter Product Description" required></textarea>
                      <has-error :form="form" field="teacher_description"></has-error>
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
          // allcatandubcatshowinaddproductform:{},
          // place:{},

          alldepartment:{},
          allprofession:{},

          // allcategoryshowinform:{},

          // Create a new form instance
          form: new Form({


            teacher_id: '',
            dep_id: '',
            proffe_id:'',
            teacher_name : '',
            // teacher_type :'',
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




  showallteacherprofesion(){

  axios.get('/show_my_all_profession_addteacher').then(({data}) => (this.allprofession = data));


  },






  showalldepartmentinform(){


 axios.get('/show_all_department_in_form').then(({data}) => (this.alldepartment = data));


},




 changephoto(event){

      let file = event.target.files[0];
      let reader = new FileReader();
      reader.onload = event => {
      this.form.teacher_image  = event.target.result
      console.log(event.target.result)
      };
      reader.readAsDataURL(file);

      },


      updateimage(){

       let img = this.form.teacher_image;
       if(img.length>100){

          return  this.form.teacher_image

       }else {


          return "/images/"+this.form.teacher_image

       }

    },

    //update category
     updateteacher(){

     this.form.post('/update_teacher/'+this.$route.params.teacher_id)
        .then((response)=>{
         this.$router.push('/add_teacher')

          Toast.fire({
          icon: 'success',
          title: 'Teacher Update Successfully'
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






},




        mounted() {


          this.showalldepartmentinform();
            this.showallteacherprofesion();

        //  this.placeholder();



        axios.get('/edit_teacherplaceholder_value/'+this.$route.params.teacher_id)
        .then((response)=>{

        this.form.fill(response.data)

        })


        },



    }
</script>
