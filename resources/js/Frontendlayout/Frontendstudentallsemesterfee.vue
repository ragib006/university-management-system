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



          <p style="font-size:20px;">All Semester Fee</p> 


                            <div class="row">



<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">SL</th>
      <th scope="col">Roll</th>
      <th scope="col">Name</th>
     <!----- <th scope="col">Department</th>--->
      <th scope="col">Level</th>
     <!------- <th scope="col">Image</th>--->
      <th scope="col">Semester Fee</th>
       <th scope="col">Fine</th>
        <th scope="col">Total</th>
        <th scope="col">Student Gives</th>
        <th scope="col">Extra Money</th>

          <th scope="col">Due</th>
             <th scope="col">Given Date</th>

                      <th scope="col">Expire Date</th>

    </tr>
  </thead>
  <tbody>



    <tr v-for="(v_showteacher,index) in semesterfee">
      <th scope="row">{{index+1}}</th>
      <th scope="row">{{v_showteacher.student_givesemesterfee_studentroll}}</th>

      <th scope="row">{{v_showteacher.student_name}}</th>
     <!------- <th scope="row">{{v_showteacher.department_name}}</th>------>


            <th scope="row">{{v_showteacher.level_name}}</th>
    <!---  <th scope="row"><img :src="ourimage(v_showteacher.student_image)" alt="" style="height:70px;width:70px;"></th>----->

            <th scope="row">{{v_showteacher.main_semester_fee}} TK</th>




      <th scope="row">{{v_showteacher.student_givesemesterfee_fine}} TK</th>

            <th scope="row">{{v_showteacher.student_givesemesterfee_fine_plus_total_amount}} TK</th>
      <th scope="row">{{v_showteacher.student_givesemesterfee_amount}} TK</th>

            <th scope="row">{{v_showteacher.student_givesemesterfee_extra_money}} TK</th>
           <th scope="row">{{v_showteacher.student_givesemesterfee_loss_blance}} TK</th>
           <th scope="row">{{v_showteacher.student_givesemesterfee_added_date}}</th>
          <th scope="row">{{v_showteacher.student_givesemesterfee_expire_date}}</th>
  
    </tr>

  </tbody>
</table>












                          
                             

                    



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

        semesterfee:{},


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











  allsemesterfee(){


    //const myid = localStorage.getItem('User');

   // console.log('...........',myid)

    axios.get('/frontend_student_all_semester_fee').then((res) => {

      //console.log(res.data)

   this.semesterfee = res.data.semesterfee
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

               this.allsemesterfee();


         }
     }
</script>
