<template>
  
<span>

     <Websiteheader></Websiteheader>






  <div class="main" style="margin-top:20px;">


    
       <div class="submain">
            
            <div class="row">

               <div class="col-md-2" style="">
                   
               


                     <Studentprofilesidebar></Studentprofilesidebar>


               </div>

               <div class="col-md-9">


                       <div class="card" style="height:80%" v-for="(v_department,index) in student">


                            <div class="row">

                                 <div class="col-md-4">



           


                                           <!---
                                               <div class="ima" style="width:500px;float:left;height:650px;">
                                                   <img :src="mypostimage(student.student_image)" alt="" style="height:400px;width:400px;">
                                               </div>
                                           --->


                                
                                              <div class="ima" style="margin-left:20px;margin-top:20px;margin-bottom:20px">
                                                   <img :src="ourimage(v_department.student_image)"  alt="dsfsdf" style="height:250px;width:250px;">
                                               </div>


                                 </div>

                                  <div class="col-md-8">

                                        <div class="sdvhjfkds" style="margin-top:20px" >
                                          
                              
                                    <span style="font-weight:bold;font-size:16px;color:green">Student Name : </span> <span  style="font-weight:bold;font-size:16px;color:black">{{v_department.student_name}}</span></br>
                              
                                   
                                    <span style="font-weight:bold;font-size:16px;color:green">Student Roll : </span> <span  style="font-weight:bold;font-size:16px;color:black">{{v_department.student_roll}}</span></br>

                             


                                    <span style="font-weight:bold;font-size:16px;color:green">Student Department : </span> <span  style="font-weight:bold;font-size:16px;color:black">{{v_department.department_name}}</span></br>



                                    <span style="font-weight:bold;font-size:16px;color:green">Student Level : </span> <span  style="font-weight:bold;font-size:16px;color:black">{{v_department.level_name}}</span></br>




                                    <span style="font-weight:bold;font-size:16px;color:green">Student Batch : </span> <span  style="font-weight:bold;font-size:16px;color:black">{{v_department.batch_name}}</span></br>




                                    <span style="font-weight:bold;font-size:16px;color:green">Student Email : </span> <span  style="font-weight:bold;font-size:16px;color:black">{{v_department.student_email}}</span></br>




                                    <span style="font-weight:bold;font-size:16px;color:green">Student Address : </span> <span  style="font-weight:bold;font-size:16px;color:black">{{v_department.student_address}}</span></br>




                                    <span style="font-weight:bold;font-size:16px;color:green">Student District : </span> <span  style="font-weight:bold;font-size:16px;color:black">{{v_department.student_district}}</span></br>

                                    



                                    <span style="font-weight:bold;font-size:16px;color:green">Student Mobile Number : </span> <span  style="font-weight:bold;font-size:16px;color:black">{{v_department.student_mobile_number}}</span></br>


                               

                                    <span style="font-weight:bold;font-size:16px;color:green">Student Admission Date : </span> <span  style="font-weight:bold;font-size:16px;color:black">{{v_department.student_added_date}}</span></br>






                                        </div>




                                      
                                 </div>

                           </div>



                       </div>





               </div>


            </div>

       </div>




<!-------
         <div class="container">

          <div class="card">


               <center>

                  <p style="padding-top:10px">Admission Result</p>
               </center>


                      <div class="main-sub">
                         
                         <div class="row">

                             <div class="col-md-3">

                              <p>ssssssssssssssssssssssssssss</p>

                             </div>



                             <div class="col-md-3">

                              <p>ssssssssssssssssssssssssssss</p>

                             </div>




                         </div>

                       </div>



          </div>
             </div>-------->




        </div>


 

















        <Websitefooter></Websitefooter>

</span>
</template>

<script>


  import  Websiteheader from "../Frontendlayout/Websiteheader.vue"
  import  Websitefooter from "../Frontendlayout/Websitefooter.vue"

  import  Studentprofilesidebar from "../Frontendlayout/Studentprofilesidebar.vue"


  //import Mybackendfooter from "../backendlayout/Adminfooter.vue"




     export default {


         data() {
         return {

          student:{},
        //  information:{},


           // Create a new form instance
           form: new Form({

             
             myid:'',


           })
         }
       },




       components: {
          Websiteheader,
          Websitefooter,
          Studentprofilesidebar,
          //Mybackendfooter,
        },



     methods:{






   mypostimage(img){

       return "/images/"+img;

   },





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



      //   displayalladmissionexam(){
           

           


             //console.log('id is......................................',id)

   //  axios.get('/show_all_admission_exam').then(({data}) => (this.alladmission = data));


  //  },











  profile(){


    //const myid = localStorage.getItem('User');

   // console.log('...........',myid)

    axios.get('/frontend_student_profile').then((res) => {

      console.log(res.data)

     this.student = res.data.student
  // this.studentsemesterfinalcoursemark = res.data.studentsemesterfinalcoursemark






    })

  },

       
         


         // userinformation(){


             //  const myid = localStorage.getItem('User');


   //  this.form.post('/update_course/'+this.$route.params.course_id)
                // var myid = localStorage.getItem('User')
     

          //     const id = JSON.parse(myid)




   //  axios.get('/apply_user_information')
      // axios.get('/apply_user_information/'+my_id)
   //  .then((res) => {
    //  console.log('...................',res.data)
       // this.allcolor = res.data.allcolor

    // })

   //}
           //   const my = 5;

          //     console.log(myid)


         //   axios.get('/apply_user_information/'+this.$route.params.myid)

       // .then((response)=>{

      //   console.log(response.data)
        

      //   })
      //     .catch(()=>{

      //      console.log('error');

     //     })



   // },











 },


 computed:{


 },




         mounted() {


               //  this.displayalladmissionexam();

                // this.userinformation();

               this.profile();


         }
     }
</script>
