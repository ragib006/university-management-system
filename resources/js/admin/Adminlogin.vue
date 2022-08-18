<template>
    <span>
        

    


<div class="rurrr" style="margin-bottom:150px">

<div class="container">
     
     <div class="row">



          

         <div class="card" style="width:50%;margin:10px auto;margin-top:150px">



        <form enctype="multipart/form-data" role="form" @submit.prevent = "adminloginformaction()">

                   <center>
                     
                       <p style="margin-top:30px;margin-bottom:30px;font-weight:bold;font-size:22px;font-family:tahoma;color:green" >Admin Login</p>

                   </center>


                <div class="form-group" style="margin-left:80px;">  
          
                  <span style="font-weight:bold;">Email :</span>
                   <input v-model="form.admin_email" type="email" name="admin_email"
                   class="form-control" :class="{ 'is-invalid': form.errors.has('admin_email') }" placeholder="Enter Email" style="width:400px;margin-top:10px" required="">
                   <has-error :form="form" field="admin_email"></has-error>
        
               </div>



              

                <div class="form-group" style="margin-left:80px;">  
          
                   <span style="font-weight:bold;">Password :</span>
                   <input v-model="form.admin_password" type="password" name="admin_password"
                   class="form-control" :class="{ 'is-invalid': form.errors.has('admin_password') }" placeholder="Enter Password" style="width:400px;margin-top:10px" required="">
                   <has-error :form="form" field="admin_password"></has-error>
        
               </div>




                  <button type="submit" class="btn btn-primary" style="width:200px;margin-left:180px;margin-bottom:20px;margin-top:20px">Login</button>

       </form>


           </div>
  

    

     </div>
</div>


</div>

    

</span>
</template>

<script>



  //import Mybackendfooter from "../backendlayout/Adminfooter.vue"




     export default {


         data() {
         return {

          alladmission:{},


           // Create a new form instance
           form: new Form({


      

                
                   admin_email:'',
                   admin_password:'',

              
                   //apply_payment_tax_id:''

                   //apply_student_department:'',
                    // category_status:'',
                 //cat_status: '',


           })
         }
       },




       components: {
         // Websiteheader,
         // Websitefooter,
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








    adminloginformaction(){


    this.form.post('/admin_login_form_action')
   .then((response)=>{


      


     
      //  console.log(response.data)

      // this.displayalladmissionexam();

   // $('#exampleModal').modal('hide')

           // this.form.reset();


       if(response.data==11){

           
             this.$router.push('/admin_dashboard')

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


            //  this.displayalladmissionexam();


         }
     }
</script>
