<template>
    <span>
        <Websiteheader></Websiteheader>

      <div class="slider">
        
        
<div class="container" style="margin-bottom:50px;background:#333333;margin-top:20px;margin-bottom:80px;">

<div class="bb" style="height:150px;width:100%;background:">

<h2 style="color:white;font-family:tahoma;font-weight:bold;margin-left:390px;padding-top:56px;display:block;font-size:27px;">Applying for Admission</h2>

</div>

</div>


    </div>



<div class="rurrr">

<div class="container">
     
     <div class="row">
         <div class="col-md-6">
           <div class="oiuh">
             
             <img style="width:400px;height:400px;" src="https://res.cloudinary.com/ragibhasan006/image/upload/v1659440828/cub3_yx5tvu.jpg" alt="fgvdfh"/>

           </div>
         </div>

         <div class="col-md-6" style="font-family:tahoma">
            <div class="usdh">

               <p style="font-size:22px;font-weight:bold">Admission Requirements</p>

               <p style="font-size:15px;text-align:justify;">1. The candidate must have a minimum of GPA 2.50 individually in both SSC and HSC. Alternatively, if the candidate fails to achieve the minimum GPA of 2.50 in either SSC or HSC, then he must have a total GPA of 6.00</p>

               <p style="font-size:15px;text-align:justify;">2. For the admission of Science & Engineering related subjects, Candidate must have Mathematics in HSC with minimum GPA 2.00</p>

               <p style="font-size:15px;text-align:justify;">3. Minimum GPA of 2.5 in O-Levels in five subjects and A-Levels in two subjects and total GPA 6.0 according to Bangladesh University scale (A=5, B=4, C=3 and D=2). Subjects with E Grade will not be considered.</p>

               <p style="font-size:15px;text-align:justify;">4. Minimum GPA of 2.5 in O-Levels in five subjects and A-Levels in two subjects and total GPA 6.0 according to Bangladesh University scale (A=5, B=4, C=3 and D=2). Subjects with E Grade will not be considered.</p>
               
                 <div class="aplybutton" style="margin-bottom:150px">
                   
                   <router-link style="margin-top:30px;" to="/admission_form" class="btn btn-success" >Apply</router-link>

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


           // Create a new form instance
           form: new Form({

                    // category_id: '',
                    // category_name: '',
                    // category_type: '',
                    // category_added_date:'',
                    // category_url:'',
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






 },


 computed:{


 },




         mounted() {


         }
     }
</script>
