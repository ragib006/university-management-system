<template>
    <span>
        <Websiteheader></Websiteheader>

      <div class="slider">
        
        <img style="width:100%;" src="https://res.cloudinary.com/ragibhasan006/image/upload/v1659438690/slider1_o3fzu1.jpg" alt="nothing" />

    </div>



<div class="ddd" style="margin-bottom:50px">

   <div class="container">

    <div class="row">

         <div class="col-md-6">

           <p style="font-weight:bold;font-size:20px;padding-top:30px;padding-bottom:20px;width:200px;margin:10px auto;">Life Of University</p>

          
              
       <img style="width:500px;height:415px" src="https://res.cloudinary.com/ragibhasan006/image/upload/v1659440828/cub3_yx5tvu.jpg"  alt="sfbsdfds">

      

         </div>


         <div class="col-md-6">


              <div class="card" style="margin-top:30px">


             <p style="font-weight:bold;font-size:20px;width:100px;margin:20px auto;">Notice</p>
                 
             
       
                 <div class="sfhvewj" v-for="(v_showteacher,index) in allnotice">
                    <router-link :to="`/view_notice_frontend/${v_showteacher.notice_id}`" style="text-decoration:none">
              
                 <p style="margin-left:40px;font-weight:bold;margin-top:10px;text-decoration:none;color:black">{{v_showteacher.notice_title}}</p>

                      </router-link>

                 <span class="bg-success" style="margin-left:40px;width:100px;border-radius:4px;color:black;padding:5px 5px 5px 7px">{{v_showteacher.notice_date}}</span>

            

                  

               </div>
        




                 <!---------allnotice



              <router-link :to="`/view_notice_frontend/${v_showteacher.notice_id}`" class="btn btn-danger btn-sm" style="margin-top:17px;" ><i class="fa fa-eye" aria-hidden="true" style="color:white;"></i></router-link>

                              <p style="margin-left:40px;font-weight:bold;margin-top:10px">Semester Final Exam 2022 </p>
                 <span class="bg-info" style="margin-left:40px;width:100px;border-radius:4px;color:black;padding:5px 5px 5px 7px">07-02-2022</span>


                              <p style="margin-left:40px;font-weight:bold;margin-top:10px">Bangabandhu Sheikh Mujib Fellowship Program 2022 </p>
                 <span class="bg-info" style="margin-left:40px;width:100px;border-radius:4px;color:black;padding:5px 5px 5px 7px">07-02-2022</span>



                              <p style="margin-left:40px;font-weight:bold;margin-top:10px">Bangabandhu Sheikh Mujib Fellowship Program 2022 </p>
                 <span class="bg-info" style="margin-left:40px;width:100px;border-radius:4px;color:black;padding:5px 5px 5px 7px">07-02-2022</span>----------->


       <router-link to="/all_notice_frontend" style="margin-top:60px;width:200px;margin:10px auto;margin-bottom:30px" class="btn btn-primary">View More</router-link>

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

           allnotice:{},


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



showallnotice(){

axios.get('/show_letest_notice_frontend').then(({data}) => (this.allnotice = data));


},





 },


 computed:{


 },




         mounted() {


         this.showallnotice();


         }
     }
</script>
