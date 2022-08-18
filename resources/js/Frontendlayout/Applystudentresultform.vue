<template>
    <span>
        <Websiteheader></Websiteheader>

      <div class="slider">
        
        
<div class="container" style="margin-bottom:50px;background:#333333;margin-top:20px;margin-bottom:80px;">

<div class="bb" style="height:150px;width:100%;background:">

<h2 style="color:white;font-family:tahoma;font-weight:bold;margin-left:450px;padding-top:56px;display:block;font-size:27px;">Admission Result</h2>

</div>

</div>


    </div>



<div class="rurrr" style="margin-bottom:210px">

<div class="container">
     
     <div class="row">



          

         <div class="card" style="width:50%;margin:10px auto;">



        <form enctype="multipart/form-data" role="form" @submit.prevent = "resultsearchformaction()">



                <div class="form-group" style="margin-left:80px;margin-top:50px">  
          
            
              <input v-model="form.apply_student_roll" type="number" name="apply_student_roll"
              class="form-control" :class="{ 'is-invalid': form.errors.has('apply_student_roll ') }" placeholder="Enter Admission Roll" style="width:400px" required="">
              <has-error :form="form" field="apply_student_roll"></has-error>
        
  </div>



                <div class="form-group" style="margin-left:80px;margin-top:5px">  
              
                  
                     <select  v-model="form.admission_exam_id" class="form-control" id="exampleFormControlSelect1" name="admission_exam_id" :class="{ 'is-invalid': form.errors.has('admission_exam_id') }" style="width:400px" required>
                       <option value="" disabled>Select</option>

                       <option style="color:green;font-weight:bold;" v-for="selectdept in alladmission" :value="selectdept.admissionexam_id">{{selectdept.admissionexam_name}}</option>

                     </select>
                     <has-error :form="form" field="admission_exam_id"></has-error>
          
  </div>

                  
                  <button type="submit" class="btn btn-primary" style="width:200px;margin-left:180px;margin-bottom:20px">Search Result</button>
            

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


      

                
                   admission_exam_id:'',
                   apply_student_roll:''

              
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








        resultsearchformaction(){
    this.form.post('/addmission_search_result_form_action')
   .then((response)=>{


      


     
        console.log(response.data)

      // this.displayalladmissionexam();

   // $('#exampleModal').modal('hide')

           // this.form.reset();


     if(response.data==11){

           
            this.$router.push('/view_applystudent_result')

              Toast.fire({
               icon: 'success',
               title: 'Successfully Login Proile'
                })


        }else if(response.data==12){


               Toast.fire({
                icon: 'error',
                 title: 'Information Not Right'
                })




        }else{


              //  localStorage.setItem('User',response.data)

   //          this.$router.push('/apply_profile')


                 Toast.fire({
                 icon: 'error',
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
