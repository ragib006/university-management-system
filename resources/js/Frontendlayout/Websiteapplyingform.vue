<template>
    <span>
        <Websiteheader></Websiteheader>

      <div class="slider">
        
        
<div class="container" style="margin-bottom:50px;background:#333333;margin-top:20px;margin-bottom:80px;">

<div class="bb" style="height:150px;width:100%;background:">

<h2 style="color:white;font-family:tahoma;font-weight:bold;margin-left:450px;padding-top:56px;display:block;font-size:27px;">Online Apply</h2>

</div>

</div>


    </div>



<div class="rurrr">

<div class="container">
     
     <div class="row" style="margin-bottom:60px">

          <div class="col-md-6">






         <div className="admissionform">



          <p style="font-family:tahoma;font-weight:bold;font-size:22px">Create a New Admission </p>

                  
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
              <input v-model="form.apply_student_ssc_roll" type="number" name="apply_student_ssc_roll"
              class="form-control" :class="{ 'is-invalid': form.errors.has('apply_student_ssc_roll') }" placeholder="Enter SSC" style="width:500px">
              <has-error :form="form" field="apply_student_ssc_roll"></has-error>
              </div>





                <div class="form-group">
                     <label for="exampleFormControlSelect1">SSC Pass Year</label>
                       <select  v-model="form.apply_student_ssc_pass_year" class="form-control" id="exampleFormControlSelect1" name="apply_student_ssc_pass_year" :class="{ 'is-invalid': form.errors.has('apply_student_ssc_pass_year') }" required style="width:500px">
                         <option value="" disabled>Select</option>
                         <option value="2018" style="color:green;font-weight:bold;">2018</option>
                          <option value="2019">2019</option>
                           <option value="2020">2020</option>
                            <option value="2021">2021</option>
                          <option value="2022">2022</option>
                          <option value="2023">2023</option>
                          <option value="2024">2024</option>                

                       </select>
                       <has-error :form="form" field="apply_student_ssc_pass_year"></has-error>
                </div>



            
                <div class="form-group">
              <label>HSC Roll</label>
              <input v-model="form.apply_student_hsc_roll" type="number" name="apply_student_hsc_roll"
              class="form-control" :class="{ 'is-invalid': form.errors.has('apply_student_hsc_roll') }" placeholder="Enter HSC Roll" style="width:500px">
              <has-error :form="form" field="apply_student_hsc_roll"></has-error>
              </div>


                 <div class="form-group">
                     <label for="exampleFormControlSelect1">HSC Pass Year</label>
                       <select  v-model="form.apply_student_hsc_pass_year" class="form-control" id="exampleFormControlSelect1" name="apply_student_hsc_pass_year" :class="{ 'is-invalid': form.errors.has('apply_student_hsc_pass_year') }" required style="width:500px">
                         <option value="" disabled>Select</option>
                         <option value="2018" style="color:green;font-weight:bold;">2018</option>
                             <option value="2019">2019</option>
                           <option value="2020">2020</option>
                            <option value="2021">2021</option>
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
                <input v-model="form.apply_student_password" type="password" name="apply_student_password"
                class="form-control" :class="{ 'is-invalid': form.errors.has('apply_student_password') }" placeholder="Enter Passwoard" style="width:500px">
                <has-error :form="form" field="apply_student_password"></has-error>
                </div>

           



               <p style="font-weight:bold;color:blue;font-size:23px;margin-top:60px">Payment Info</p>

                     
                 <div class="form-group">
                     <label for="exampleFormControlSelect1">Payment Type</label>
       <select  v-model="form.apply_student_payment_type" class="form-control" id="exampleFormControlSelect1" name="apply_student_payment_type" :class="{ 'is-invalid': form.errors.has('apply_student_payment_type') }" required style="width:500px">
                         <option value="" disabled>Select</option>
                      
                          <option value="Bkash">Bkash</option>
                                       

                       </select>
                       <has-error :form="form" field="apply_student_payment_type"></has-error>
                </div>


             <p style="font-weight:bold;color:green">Bkash Payment - Send 500TK This Number (+880177963880). After Payment Put Transaction ID</p>

                  <div class="form-group">
                <label>Transaction Id</label>
                <input v-model="form.apply_payment_tax_id" type="Text" name="apply_payment_tax_id"
                class="form-control" :class="{ 'is-invalid': form.errors.has('apply_payment_tax_id') }" placeholder="Tax Id" style="width:500px">
                <has-error :form="form" field="apply_payment_tax_id"></has-error>
                </div>
                 




            <button type="submit" class="btn btn-primary">Submit</button>

       </form>







         </div>







          </div>


        <div class="col-md-6">


                   




         <div className="admissionform">


             <p style="font-family:tahoma;font-weight:bold;font-size:22px">Login</p>

                  
                          <form enctype="multipart/form-data" role="form" @submit.prevent = "loginaction()">





              <div class="form-group">
              <label>Student Email</label>
              <input v-model="form.apply_students_email" type="text" name="apply_students_email"
              class="form-control" :class="{ 'is-invalid': form.errors.has('apply_students_email') }" placeholder="Enter Student Email" style="width:500px">
              <has-error :form="form" field="apply_students_email"></has-error>
              </div>

              <div class="form-group">
              <label>Student Password</label>
              <input v-model="form.apply_students_password" type="password" name="apply_students_password"
              class="form-control" :class="{ 'is-invalid': form.errors.has('apply_students_password') }" placeholder="Enter Student Password" style="width:500px">
              <has-error :form="form" field="apply_students_password"></has-error>
              </div>




























            <button type="submit" class="btn btn-primary" style="">Submit</button>

       </form>







         </div>







        </div>




















































       
      </div>

     </div>
</div>


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


            apply_students_email:'',
            apply_students_password:'',

                   apply_student_id: '',
                   admission_exam_id:'',

                   apply_student_email: '',
                   apply_student_password: '',
                   apply_student_name:'',
                 //  applying_unit:'',
                   apply_student_ssc_pass_year:'',
                   apply_student_hsc_pass_year:'',
                   apply_student_ssc_roll:'',
                   apply_student_hsc_roll:'',
                   apply_student_image:'',
                   apply_student_payment_type:'',
                   apply_payment_tax_id:''

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








      ourimage(img){

              return "/images/"+img;

          },

//change photo
      changephoto(event){

           let file = event.target.files[0];
           let reader = new FileReader();
           reader.onload = event => {
           this.form.apply_student_image = event.target.result
           console.log(event.target.result)
           };
           reader.readAsDataURL(file);

           },



         displayalladmissionexam(){


     axios.get('/show_all_admission_exam').then(({data}) => (this.alladmission = data));


    },













    loginaction(){
    this.form.post('/my_addmission_login_form_action')
   .then((response)=>{



    console.log(response.data)





       if(response.data==11){

          
             this.$router.push('/apply_profile')


                Toast.fire({
                icon: 'success',
                title: 'Login Successfully'
                })


        }else if(response.data==12){


                Toast.fire({
                icon: 'error',
                title: 'Invalid Email or Password'
                })




        }else{


            //    localStorage.setItem('User',response.data)


                Toast.fire({
                icon: 'success',
                title: 'Information Take Successfully'
                })

      }










       // this.displayalldepartment();
       //  this.myalllevel();

   // $('#exampleModal').modal('hide')

      //   this.form.reset();


        // if(response.data==0){

        //      Toast.fire({
        //      icon: 'error',
        //         text: 'Sorry This Level Allready Exist !!',

       //          })

       //       }else if(response.data==1){

       //         Toast.fire({
       //         icon: 'success',
       //         title: 'Level Added Successfully'

       //          })

       //        }else{

       //         console.log(response.data)

       //        }


         })
         .catch(()=>{
         console.log('oppp fail');
         })

         },




//loginaction(){





//},













        applyingformaction(){
    this.form.post('/addmission_apply_form_action')
   .then((response)=>{


      


     
        console.log(response.data)

      // this.displayalladmissionexam();

   // $('#exampleModal').modal('hide')

           // this.form.reset();


       if(response.data==-1){



                Toast.fire({
                icon: 'error',
                title: 'Can Not Be Allow Two Time For Admission Test'
                })


        }else if(response.data==-2){


                Toast.fire({
                icon: 'error',
                title: 'Expire Admission Apply Date'
                })




        }else{


                localStorage.setItem('User',response.data)

             this.$router.push('/apply_profile')


                Toast.fire({
                icon: 'success',
                title: 'Information Take Successfully'
                })

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


                 this.displayalladmissionexam();


         }
     }
</script>
