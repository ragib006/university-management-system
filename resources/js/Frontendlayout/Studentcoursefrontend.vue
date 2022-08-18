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



          <p style="font-size:20px;">Course</p> 


                            <div class="row">



<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">SL</th>
      <th scope="col">Level</th>
      <th scope="col">Code</th>
     <!----- <th scope="col">Department</th>--->
      <th scope="col">Title</th>
     <!------- <th scope="col">Image</th>--->
      <th scope="col">Type</th>
       <th scope="col">Credit</th>
        <th scope="col">Class Number</th>
      <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>


    <tr v-for="(v_showteacher,index) in displaymydepartmentcourse">
      <th scope="row">{{index+1}}</th>
      <th scope="row">{{v_showteacher.level_name}}</th>

      <th scope="row">{{v_showteacher.course_code}}</th>
    


            <th scope="row">{{v_showteacher.course_title}}</th>
    

            <th scope="row">{{v_showteacher.course_type}}</th>




      <th scope="row">{{v_showteacher.course_credit}}</th>

            <th scope="row">{{v_showteacher.course_class_number}}</th>


      <th scope="row">


      <router-link :to="`/student_course_ct_mark_frontend/${v_showteacher.addstuent_courseid}`" class="btn btn-primary btn-sm" style="margin-top:17px;"><i class="fa fa-plus" aria-hidden="true"></i></router-link>

          <router-link :to ="`/student_course_semester_final_mark_frontend/${v_showteacher.addstuent_courseid}`"class="btn btn-danger btn-sm" style="margin-top:17px;"><i class="fas fa-newspaper" style="color:white;" aria-hidden="true"></i></router-link>

            <router-link :to ="`/student_course_attentdance_frontend/${v_showteacher.addstuent_courseid}`"class="btn btn-success btn-sm" style="margin-top:17px;"><i class="fas fa-school" style="color:white;" aria-hidden="true"></i></router-link>


    </th>


  
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

        //  student:{},
        //  information:{},

       // semesterfee:{},


       displaymydepartmentcourse:{},
       stuinfo:{},


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

    axios.get('/frontend_student_course').then((res) => {

      //console.log(res.data)

   this.displaymydepartmentcourse = res.data.displaymydepartmentcourse,
   this.stuinfo = res.data.stuinfo






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
