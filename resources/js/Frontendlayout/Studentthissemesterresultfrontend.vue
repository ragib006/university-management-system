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


   
           <span style="font-size:16px;margin-left:0px;font-weight:bold;margin-right:20px">Mark Sheet</span>

<!------------------
        <div class="sdfsd" style="margin:0px 10px 20px 0px">

           <span style="font-size:16px;margin-left:0px;font-weight:bold;margin-right:20px">Semester Final Mark</span>
         <span style="font-size:16px;">Course Code :</span>   <span style="font-size:16px;">{{courseinfo.course_code}}</span> 

          <span style="font-size:16px;margin-left:20px">Course Title :</span>   <span style="font-size:16px;">{{courseinfo.course_title}}</span> 

 <span style="font-size:16px;margin-left:20px">Credit :</span>   <span style="font-size:16px;">{{courseinfo.course_credit}}</span>

 <span style="font-size:16px;margin-left:20px">Course :</span>   <span style="font-size:16px;">{{courseinfo.level_name}}</span>





         </div>---------------->

          
    
 
                            <div class="row">



<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">SL</th>
      <th scope="col">Name</th>
      <th scope="col">Roll</th>
     <!----- <th scope="col">Department</th>--->
      <th scope="col">Code</th>
     <!------- <th scope="col">Image</th>--->
      <th scope="col">Credit</th>
            <th scope="col">Level</th>
  
        <th scope="col">CT</th>
         <th scope="col">Attentdance</th>
          <th scope="col">Exam</th>
           <th scope="col">Total Mark</th>

                    <th scope="col">CGPA</th>
          <th scope="col">Grade</th>
 <th scope="col">Credit*Cgpa</th>

           
    

    </tr>
  </thead>





  <tbody>




    <tr v-for="(v_showteacher,index) in allsemesterfinalresult">
      <th scope="row">{{index+1}}</th>
      <th scope="row">{{v_showteacher.student_name}}</th>

      <th scope="row">{{v_showteacher.student_roll}}</th>
    


            <th scope="row">{{v_showteacher.course_code}}</th>
    

            <th scope="row">{{v_showteacher.course_credit}}</th>


         
      <th scope="row">{{v_showteacher.level_name}}</th>

      <th scope="row">{{v_showteacher.semester_final_ct_mark}}</th>

            <th scope="row">{{v_showteacher.semester_final_attentdance_mark}}</th>

               <th scope="row">{{v_showteacher.semester_final_exam_mark}}</th>
                  <th scope="row">{{v_showteacher.semester_final_total_course_mark}}</th>



           <th scope="row">{{v_showteacher.semester_final_course_cgpa}}</th>

                      <th scope="row">{{v_showteacher.semester_final_course_grade}}</th>

                                 <th scope="row">{{v_showteacher.semester_final_coursecredit_gun_course_cgpa}}</th>

                                    


  
    </tr>

  </tbody>



</table>






                
                             

                    



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

  import  Studentprofilesidebar from "../Frontendlayout/Studentprofilesidebar.vue"


  //import Mybackendfooter from "../backendlayout/Adminfooter.vue"




     export default {


         data() {
         return {

        //  student:{},
        //  information:{},

       // semesterfee:{},


      // allctmarks:{},
    //   courseinfo:{},
      // studentsemesterfinalcoursemark:{},


            allsemesterfinalresult:{},
            studentinfo:{},
            maincgpa:{},
            totalcredit:{},
            studentgiveexamtotalcredit:{},


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




   axios.get('/frontend_this_thissemester_final_result').then((res) => {

      /// this.studentsemesterfinalcoursemark = res.data.studentsemesterfinalcoursemark,
      // this.courseinfo = res.data.courseinfo



     // courseinfo this.averagectmark = res.data.averagectmark
     // this.allctcount = res.data.allctcount


      this.allsemesterfinalresult = res.data.allsemesterfinalresult,
      this.studentinfo = res.data.studentinfo,



      this.totalcredit =  res.data.totalcredit,
      this.studentgiveexamtotalcredit = res.data.studentgiveexamtotalcredit






       console.log(res.data)



    })


    //const myid = localStorage.getItem('User');

   // console.log('...........',myid)

   // axios.get('/frontend_student_course_ct_mark').then((res) => {

     // console.log(res.data)

 //  this.displaymydepartmentcourse = res.data.displaymydepartmentcourse,
  // this.stuinfo = res.data.stuinfo






   // })

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
