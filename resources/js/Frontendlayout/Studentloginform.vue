<template>
    <span>
        <Websiteheader></Websiteheader>

      <div class="slider">
        
        
<div class="container" style="margin-bottom:50px;background:#333333;margin-top:20px;margin-bottom:80px;">

<div class="bb" style="height:150px;width:100%;background:">

<h2 style="color:white;font-family:tahoma;font-weight:bold;margin-left:450px;padding-top:56px;display:block;font-size:27px;">Student Login</h2>

</div>

</div>


    </div>



<div class="rurrr" style="margin-bottom:150px">

<div class="container">
     
     <div class="row">



          

         <div class="card" style="width:50%;margin:10px auto">



        <form enctype="multipart/form-data" role="form" @submit.prevent = "studentloginformaction()">

                   <center>
                     
                       <p style="margin-top:30px;margin-bottom:30px;font-weight:bold;font-size:22px;font-family:tahoma;color:green" >Student Login</p>

                   </center>


                <div class="form-group" style="margin-left:80px;">  
          
                  <span style="font-weight:bold;">Student Email :</span>
                   <input v-model="form.student_email" type="email" name="student_email"
                   class="form-control" :class="{ 'is-invalid': form.errors.has('student_email') }" placeholder="Enter Student Email" style="width:400px;margin-top:10px" required="">
                   <has-error :form="form" field="student_email"></has-error>
        
               </div>



              

                <div class="form-group" style="margin-left:80px;">  
          
                   <span style="font-weight:bold;">Student Password :</span>
                   <input v-model="form.student_password" type="password" name="student_password"
                   class="form-control" :class="{ 'is-invalid': form.errors.has('student_password') }" placeholder="Enter Student Password" style="width:400px;margin-top:10px" required="">
                   <has-error :form="form" field="student_password"></has-error>
        
               </div>




                  <button type="submit" class="btn btn-primary" style="width:200px;margin-left:180px;margin-bottom:20px;margin-top:20px">Login</button>

       </form>


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


      

                
                   student_email:'',
                   student_password:'',

              
                   //apply_payment_tax_id:''

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








    studentloginformaction(){


    this.form.post('/student_login_form_action')
   .then((response)=>{


      


     
        console.log(response.data)

      // this.displayalladmissionexam();

   // $('#exampleModal').modal('hide')

           // this.form.reset();


      if(response.data==11){

           
        this.$router.push('/student_profile')

                Toast.fire({
                icon:  'success',
                title: 'Student Login Successfully'
                })


        }else if(response.data==12){


                  Toast.fire({
                  icon: 'error',
                  title: 'Invalid Email Or Password'
                  })




       }else{

                   Toast.fire({
                   icon: 'error',
                   title: 'something'
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
