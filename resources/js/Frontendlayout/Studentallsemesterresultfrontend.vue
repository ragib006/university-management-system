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



     <div class="sdfsd" style="margin:0px 10px 20px 0px">
           <span style="font-size:16px;margin-left:0px;font-weight:bold;margin-right:20px">All Semester Final Result</span>
</div>
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
        <th scope="col">Exam</th>
      <th scope="col">Name</th>
      <th scope="col">Roll</th>
      <th scope="col">Department</th>
      <th scope="col">Level</th>
  
        <th scope="col">Credit</th>
         <th scope="col">Mark </th>

          <th scope="col">Grate</th>

                    <th scope="col">CGPA</th>


          <th scope="col">Result</th>
 <th scope="col">Judgment</th>

 <th scope="col">Publish</th>
    
 <th scope="col">Action</th>
           
    

    </tr>
  </thead>





  <tbody>




    <tr v-for="(v_showteacher,index) in allresult">
      <th scope="row">{{index+1}}</th>
            <th scope="row">{{v_showteacher.exm_name}}</th>
      <th scope="row">{{v_showteacher.student_name}}</th>

      <th scope="row">{{v_showteacher.student_roll}}</th>
    


            <th scope="row">{{v_showteacher.department_name}}</th>
    

            <th scope="row">{{v_showteacher.level_name}}</th>


         
      <th scope="row">{{v_showteacher.university_semesterfinal_total_course_credit}}</th>

      <th scope="row">{{v_showteacher.university_semesterfinal_total_mark}}</th>

            <th scope="row">{{v_showteacher.university_semesterfinal_student_earn_total}}</th>

               <th scope="row">{{v_showteacher.university_semesterfinal_student_cgpa}}</th>
                  <th scope="row">



          <div v-if="v_showteacher.university_semesterfinal_mark_status == 'Fail'">
           <p style="text-align:center;color:white;background-color:red;border-radius:2px;padding-top:1px">Fail</p>
          </div>
          <div v-else="v_showteacher.university_semesterfinal_mark_status == 'Pass'">
            <p style="text-align:center;color:white;background-color:green;border-radius:2px;padding-top:1px">Pass</p>
          </div>


          


                </th>



           <th scope="row">{{v_showteacher.university_semesterfinal_main_status}}</th>

                      <th scope="row">{{v_showteacher.university_semesterfinal_mark_addeddate}}</th>

                                 
           <th scope="row">







<router-link :to="`/view_mark_sheet_frontend/${v_showteacher.university_semesterfinal_result_id}`" class="btn btn-primary btn-sm" style="margin-top:5px;" ><i class="fas fa-graduation-cap" aria-hidden="true" style="color:white;"></i></router-link>


           </th>
                                    


  
    </tr>

  </tbody>



</table>




                
 <span style="width:30%;margin:10px auto;display:block;">
   <span style="font-weight:bold;color:green;font-size:22px;">Average CGPA = </span><span style="margin-left:10px;font-weight:bold;color:blue;font-size:22px;">{{averagecpga}}</span>
 </span>

                             

                    



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
      // courseinfo:{},
     //  studentsemesterfinalcoursemark:{},


        // allsemesterfinalresult:{},
        allresult:{},
            studentinfo:{},
            averagecpga:{},


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




   axios.get('/frontend_all_semester_final_result').then((res) => {

      /// this.studentsemesterfinalcoursemark = res.data.studentsemesterfinalcoursemark,
      // this.courseinfo = res.data.courseinfo



     // courseinfo this.averagectmark = res.data.averagectmark
     // this.allctcount = res.data.allctcount

      this.studentinfo = res.data.studentinfo,
      this.allresult = res.data.allresult,
      this.averagecpga = res.data.averagecpga




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
