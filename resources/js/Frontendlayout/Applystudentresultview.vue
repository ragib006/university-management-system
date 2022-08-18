<template>
  
<span>

     <Websiteheader></Websiteheader>







        <div class="main" style="margin-top:20px;">


         <div class="container">

          <div class="card" style="height:650px">


               <center>

                  <p style="padding-top:18px;font-weight:bold;font-size:22px;padding-bottom:60px">Admission Result</p>
               </center>


                      <div class="main-sub">
                         
                         <div class="row">


                  

                             <div class="col-md-3">


                              <p style="margin-left:60px;font-size:16px">Exam Name</p>

                              <p style="margin-left:60px;font-size:16px">Student Name</p>

                                 <p style="margin-left:60px;font-size:16px">Student Admission Roll</p>

                                    <p style="margin-left:60px;font-size:16px">Admission Test Mark</p>

                                       <p style="margin-left:60px;font-size:16px">Result Status</p>

                                  

                             </div>



                             <div class="col-md-3">
                                   <p style="font-size:16px"> : {{examinfo.admissionexam_name}}</p>


                              <p style="font-size:16px">: {{applyinginfo.apply_student_name}}</p>
                              
                              <p style="font-size:16px"> : {{applyinginfo.apply_student_roll}}</p>

                              <p style="font-size:16px"> : {{studentgetmarkinadmission}}</p>

                                           <p style="font-size:16px;font-weight:bold"> : {{meritstatus}}</p>




      
                              



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

          alladmission:{},
          information:{},


          applyinginfo:{},
          meritstatus:{},
          studentmark:{},
          examinfo:{},

          studentgetmarkinadmission:{},




           // Create a new form instance
           form: new Form({

             
             myid:'',


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










  profile(){


    //const myid = localStorage.getItem('User');

   // console.log('...........',myid)

    axios.get('/applicant_result_profile').then((res) => {

  console.log('sdhfvds fdsuhfsd fuhsdf ',res.data)

    this.applyinginfo = res.data.applyinginfo,

    this.meritstatus = res.data.meritstatus,

   this.studentgetmarkinadmission = res.data.studentgetmarkinadmission,

    this.examinfo = res.data.examinfo

  // this.studentsemesterfinalcoursemark = res.data.studentsemesterfinalcoursemark






    })

  },

       
         





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
