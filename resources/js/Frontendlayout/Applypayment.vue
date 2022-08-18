<template>
    <span>
        <Websiteheader></Websiteheader>

      <div class="slider">
        
        
<div class="container" style="margin-bottom:50px;background:#333333;margin-top:20px;margin-bottom:80px;">

<div class="bb" style="height:150px;width:100%;background:">

<h2 style="color:white;font-family:tahoma;font-weight:bold;margin-left:450px;padding-top:56px;display:block;font-size:27px;">Payment</h2>

</div>

</div>


    </div>





  <div className="container">

                           <form enctype="multipart/form-data" role="form" @submit.prevent = "applyingformaction()">


              


              <div class="form-group">
              <label>Student Name</label>
              <input v-model="form.apply_student_name" type="text" name="apply_student_name"
              class="form-control" :class="{ 'is-invalid': form.errors.has('apply_student_name') }" placeholder="Enter Student Name" style="width:500px">
              <has-error :form="form" field="apply_student_name"></has-error>
              </div>

              <div class="form-group">
              <label>Student email</label>
              <input v-model="form.apply_student_email" type="email" name="apply_student_email"
              class="form-control" :class="{ 'is-invalid': form.errors.has('apply_student_email') }" placeholder="Enter Student Email" style="width:500px">
              <has-error :form="form" field="apply_student_email"></has-error>
              </div>



                 <div class="form-group" style="width:500px">
                   <label for="exampleFormControlSelect1">Select Admission</label>
                     <select  v-model="form.admission_exam_id" class="form-control" id="exampleFormControlSelect1" name="admission_exam_id" :class="{ 'is-invalid': form.errors.has('admission_exam_id') }" style="" required>
                       <option value="" disabled>Select</option>

                       <option style="color:green;font-weight:bold;" v-for="selectdept in alladmission" :value="selectdept.admissionexam_id">{{selectdept.admissionexam_name}}</option>

                     </select>
                     <has-error :form="form" field="admission_exam_id"></has-error>
              </div>






              <div class="form-group">
              <label>SSC Roll</label>
              <input v-model="form.apply_student_ssc_roll" type="text" name="apply_student_ssc_roll"
              class="form-control" :class="{ 'is-invalid': form.errors.has('apply_student_ssc_roll') }" placeholder="Enter Student Email" style="width:500px">
              <has-error :form="form" field="apply_student_ssc_roll"></has-error>
              </div>





                <div class="form-group">
                     <label for="exampleFormControlSelect1">SSC Pass Year</label>
                       <select  v-model="form.apply_student_ssc_pass_year" class="form-control" id="exampleFormControlSelect1" name="apply_student_ssc_pass_year" :class="{ 'is-invalid': form.errors.has('apply_student_ssc_pass_year') }" required style="width:500px">
                         <option value="" disabled>Select</option>
                         <option value="2018" style="color:green;font-weight:bold;">2018</option>
                          <option value="2022">2022</option>
                          <option value="2023">2023</option>
                          <option value="2024">2024</option>                

                       </select>
                       <has-error :form="form" field="apply_student_ssc_pass_year"></has-error>
                </div>



            
                <div class="form-group">
              <label>HSC Roll</label>
              <input v-model="form.apply_student_hsc_roll" type="text" name="apply_student_hsc_roll"
              class="form-control" :class="{ 'is-invalid': form.errors.has('apply_student_hsc_roll') }" placeholder="Enter Student Email" style="width:500px">
              <has-error :form="form" field="apply_student_hsc_roll"></has-error>
              </div>


                 <div class="form-group">
                     <label for="exampleFormControlSelect1">HSC Pass Year</label>
                       <select  v-model="form.apply_student_hsc_pass_year" class="form-control" id="exampleFormControlSelect1" name="apply_student_hsc_pass_year" :class="{ 'is-invalid': form.errors.has('apply_student_hsc_pass_year') }" required style="width:500px">
                         <option value="" disabled>Select</option>
                         <option value="2018" style="color:green;font-weight:bold;">2018</option>
                          <option value="2022">2022</option>
                          <option value="2023">2023</option>
                          <option value="2024">2024</option>                

                       </select>
                       <has-error :form="form" field="apply_student_hsc_pass_year"></has-error>
                </div>






              <div class="form-group">
              <label for="exampleInputFile">Student Image</label>
              <div class="ass" style="margin-bottom:10px;">
              <img :src="form.apply_student_image" alt="" style="height:70px;width:70px;">
              </div>

              <div class="input-group" style="width:500px">
              <div class="custom-file">
              <input @change="changephoto($event)" type="file" class="custom-file-input" id="exampleInputFile" name="apply_student_image" :class="{ 'is-invalid': form.errors.has('apply_student_image') }" required style="width:500px">
              <label class="custom-file-label" for="exampleInputFile">Choose file</label>
              <has-error :form="form" field="apply_student_image"></has-error>
              </div>
              </div>
              </div>



                <div class="form-group">
                <label>Student Password</label>
                <input v-model="form.apply_student_password" type="apply_student_password" name="student_password"
                class="form-control" :class="{ 'is-invalid': form.errors.has('apply_student_password') }" placeholder="Enter Passwoard" style="width:500px">
                <has-error :form="form" field="apply_student_password"></has-error>
                </div>






            <button type="submit" class="btn btn-primary">Submit</button>

       </form>


</div>




      





      


        <Websitefooter></Websitefooter>

</span>
</template>

<script>


  import  Websiteheader from "../Frontendlayout/Websiteheader.vue"
  import  Websitefooter from "../Frontendlayout/Websitefooter.vue"

  //import Mybackendfooter from "../backendlayout/Adminfooter.vue"




     export default {


         data() {
         return {

          alladmission:{},


           // Create a new form instance
           form: new Form({

                   payment_id: '',
                   apply_id:'',

                   apply_exam_id: '',
                   payment_method : '',
                   tax_id:'',
                 //  applying_unit:'',
                   payment_date:'',
                

                   //apply_student_department:'',
                    // category_status:'',
                 //cat_status: '',


           })
         }
       },




       components: {
          Websiteheader,
          Websitefooter,
          //Mybackendfooter,
        },



     methods:{



      //   displayalladmissionexam(){


    // axios.get('/show_all_admission_exam').then(({data}) => (this.alladmission = data));


   // },




        applyingformaction(){
    this.form.post('/addmission_apply_form_action')
   .then((response)=>{



    console.log(response.data)

      // this.displayalladmissionexam();

   // $('#exampleModal').modal('hide')

          this.form.reset();


       if(response.data== -1 ){



                Toast.fire({
                icon: 'error',
                title: 'Can Not Be Allow Two Time For Admission Test'
                })


        }else if(response.data == -2 ){


                Toast.fire({
                icon: 'error',
                title: 'Expire Admission Apply Date'
                })




        }else if(response.data==11){


             this.$router.push('/apply_profile')


                Toast.fire({
                icon: 'success',
                title: 'Information Take Successfully'
                })




        }else{



    //    Toast.fire({
    //    icon: 'success',
    //    title: 'Admission Exam Added Successfully'
    //    })



      }



         })
         .catch(()=>{
         console.log('oppp fail');
         })

   },







 },


 computed:{


 },




         mounted() {


              //   this.displayalladmissionexam();


         }
     }
</script>
