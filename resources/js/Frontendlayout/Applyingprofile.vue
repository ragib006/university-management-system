<template>
    <span>
        <Websiteheader></Websiteheader>
<!---
      <div class="slider">
        
        
<div class="container" style="margin-bottom:50px;background:#333333;margin-top:20px;margin-bottom:80px;">

<div class="bb" style="height:150px;width:100%;background:">

<h2 style="color:white;font-family:tahoma;font-weight:bold;margin-left:450px;padding-top:56px;display:block;font-size:27px;">Online Apply</h2>

</div>

</div>


    </div>


----->

<div class="rurrr" style="margin-top:30px;margin-bottom:200px">

<div class="container">
     
     <div class="row">

       <div class="col-md-12">



      

<!-------
<span  v-for="(v_showteacher,index) in information">


    <div v-if="v_showteacher.apply_student_status == 1">
           <p style="text-align:center;color:blue;margin-top:20px;padding:2px 2px 2px 2px" class="bg-success">Success</p>
          </div>
          <div v-else>
             
             <p>Application Process Successfully, After Payment varifying process</p>

          </div>


</span>

------->













     <div class="card" v-for="(v_showteacher,index) in information">



   <div v-if="v_showteacher.apply_student_status == 1">
           

        

      <div class="admit">

             <center>
             <p style="font-weight:bold;font-size:22px;margin-top:20px;margin-bottom:10px">Admit card</p>
             </center>


     <div class="dhbfd">
         <div class="row">  
             <div class="col-md-9">  
               <p style="font-weight:bold;font-size:20px;margin-left:50px">ERP SYSTEM</p>

         </div>

         <div class="col-md-3">
            
               <img :src="ourimage(v_showteacher.apply_student_image)" alt="" style="height:150px;width:120px;border:2px solid pink">
         </div>


      </div>   
  

  </div>



<div class="djf" style="padding-bottom:40px">

                    <div class="row"style="padding-bottom:40px">

                          <div class="col-md-3">

                                  <p style="margin-left: 50px;font-size:15px;font-weight:bold">Admission Exam Name </p>
                                  <p style="margin-left: 50px;font-size:15px;font-weight:bold">Applicants Name </p>
                                   <p style="margin-left: 50px;font-size:15px;font-weight:bold">Roll Number</p>


                                          <p style="margin-left: 50px;font-size:15px;font-weight:bold">Exam Date</p>

                                              <p style="margin-left: 50px;font-size:15px;font-weight:bold">Exam Time </p>

                                          



                          </div>


                            <div class="col-md-4">

                                    <p style="font-size:15px;"> : {{v_showteacher.admissionexam_name}}</p>

                                    <p style="font-size:15px;"> : {{v_showteacher.apply_student_name}}</p>  
                                  
                                      <p style="font-size:15px;"> : {{v_showteacher.apply_student_roll}}</p> 

                                          <p style="font-size:15px;"> : {{v_showteacher.admission_test_date}}</p> 

                                              <p style="font-size:15px;"> : 10.00 AM</p> 
                                            
                              </div>




                    </div>




                    <div class="uhjb" style="margin-top:80px,padding-bottom:20px">

            

                      <p style="font-weight:bold;margin-left:20px">Exam Instruction :</p>

                      <span style="margin-left:30px">1. Use black pen only.</span></br>
                      <span style="margin-left:30px">2. Use of cell phone , programmable calculator , watch and other electronic devices in examination hall is strictly prohibited.</span></br>
                      <span style="margin-left:30px">3. With out Admit card examination not allow.</span></br>
                      <span style="margin-left:30px">4. You must wear a face mask before entering examination venue.</span></br>
                     


                    </div>


    </div>




      
    <button onclick="window.print()" type="button" class="btn btn-primary float-right" style="margin-right: 5px;margin-top:107px;margin-bottom:20px;margin-right:20px">
          Downlode
        </button>


</div>










          </div>
          <div style="" v-else>
             
             <p style="padding:50px 10px 00px 50px;font-size:20px">Application Process Successfull, Processing For Verification.....</p>

             <p style="padding:0px 0px 0px 50px;font-weight:bold">Admit Card Will Be Issued Three Days Before The Exam</p>

              <div class="sdhbf" style="padding-bottom:100px">

             <span style="margin-left:50px;font-weight:bold;font-size:17px;color:green">Application ID :</span>     <span style="font-weight:bold;font-size:17px">{{v_showteacher.apply_student_id}}</span></br>

                 <span style="margin-left:50px;font-weight:bold;font-size:17px;color:green">Exam Name :</span>     <span style="font-weight:bold;font-size:17px">{{v_showteacher.admissionexam_name}}</span></br>

              <span style="margin-left:50px;font-weight:bold;font-size:17px;color:green">Applicant Name :</span>     <span style="font-weight:bold;font-size:17px">{{v_showteacher.apply_student_name}}</span></br>


              <span style="margin-left:50px;font-weight:bold;font-size:17px;color:green">Application Date :</span>     <span style="font-weight:bold;font-size:17px">{{v_showteacher.apply_student_date}}</span></br>

              <span style="margin-left:50px;font-weight:bold;font-size:17px;color:green">Transation ID :</span>     <span style="font-weight:bold;font-size:17px">{{v_showteacher.apply_payment_tax_id}}</span></br>


              <button onclick="window.print()" type="button" class="btn btn-primary float-right" style="margin-right: 5px;margin-top:107px;margin-right:20px;margin-bottom:20px">
          Downlode
        </button>


           </div>

          </div>







 










</div>




 </div>
  
</div>





<!-----

      <router-link :to="`/view_exam_result/${v_department.admissionexam_id}`" class="btn btn-danger btn-sm" style="margin-top:17px;" ><i class="fas fa-users" style="color:white;"></i></router-link>

==----->







<!---<a href="#">result</a>-->



<!---
  <router-link  class="btn btn-danger btn-sm" style="margin-top:17px;" ><i class="fas fa-users" style="color:white;"></i></router-link>
---->

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



      //   displayalladmissionexam(){
           

           


             //console.log('id is......................................',id)

   //  axios.get('/show_all_admission_exam').then(({data}) => (this.alladmission = data));


  //  },











  profile(){


    const myid = localStorage.getItem('User');

    console.log('...........',myid)

    axios.get('/apply_user_information').then((res) => {

      console.log(res.data)

   this.information = res.data.information
   this.studentsemesterfinalcoursemark = res.data.studentsemesterfinalcoursemark






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
