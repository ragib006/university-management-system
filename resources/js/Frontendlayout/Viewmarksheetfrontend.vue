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



    <span style="font-size:16px;margin-left:0px;font-weight:bold;margin-right:20px;margin-bottom:20px">Mark Sheet</span>





          
    
 
                            <div class="row">



<table class="table table-striped" style="margin-left:20px">
  <thead>
    <tr>
      <th scope="col">SL</th>
      <th scope="col">Name</th>
      <th scope="col">Roll</th>
     
      <th scope="col">Code</th>
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



    <tr v-for="(v_showteacher,index) in viewresult">
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


<!--------

        <div class="sdfsd" style="margin:0px 10px 20px 0px">

           <span style="font-size:16px;margin-left:0px;font-weight:bold;margin-right:20px">Semester Final Mark</span>
         <span style="font-size:16px;">Course Code :</span>   <span style="font-size:16px;">{{courseinfo.course_code}}</span> 

          <span style="font-size:16px;margin-left:20px">Course Title :</span>   <span style="font-size:16px;">{{courseinfo.course_title}}</span> 

 <span style="font-size:16px;margin-left:20px">Credit :</span>   <span style="font-size:16px;">{{courseinfo.course_credit}}</span>

 <span style="font-size:16px;margin-left:20px">Course :</span>   <span style="font-size:16px;">{{courseinfo.level_name}}</span>

-------------->



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
   //    courseinfo:{},
    //   studentsemesterfinalcoursemark:{},

       viewresult:{},


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









  allsemesterfee(){




   axios.get('/frontend_semester_mark_sheet/'+this.$route.params.university_semesterfinal_result_id).then((res) => {

     //  this.studentsemesterfinalcoursemark = res.data.studentsemesterfinalcoursemark,
       this.viewresult = res.data.viewresult





       console.log(res.data)



    })




  },

       
         










 },


 computed:{


 },




         mounted() {


    

             this.allsemesterfee();


         }
     }
</script>
