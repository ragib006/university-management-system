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



          <p style="font-size:20px;">Current Semester Fee</p> 



                  <div class="card">
                            <div class="row">


<!---------
            <div class="sejkbfsd" style="padding-top:20px;padding-left:20px">

   <span style="font-weight:bold;font-size:16px;color:green;margin-left:40px">Main Semester Fee : </span> <span style="margin-left:40px">{{stumainsemesterfee}}</span></br>

   <span style="font-weight:bold;font-size:16px;color:green;margin-left:40px">Student Give : </span> <span style="margin-left:40px">{{stugiveamount}}</span></br>

   <span style="font-weight:bold;font-size:16px;color:green;margin-left:40px">Fine : </span> <span style="margin-left:40px">{{stufine}}</span></br>

    <span style="font-weight:bold;font-size:16px;color:green;margin-left:40px">Fine Days : </span> <span style="margin-left:40px">{{fineduration}}</span></br>





        <span style="font-weight:bold;font-size:16px;color:green;margin-left:40px">Total Semester Fee : </span> <span style="margin-left:40px">{{stufineplustotalamount}}</span></br>


     <span style="font-weight:bold;font-size:16px;color:green;margin-left:40px">Due : </span> <span style="margin-left:40px">{{duebalance}}</span></br>

     <span style="font-weight:bold;font-size:16px;color:green;margin-left:40px">Extra Money : </span> <span style="margin-left:40px">{{stugiveextra}}</span></br>

     <span style="font-weight:bold;font-size:16px;color:green;margin-left:40px">Semester Fee Given Date : </span> <span style="margin-left:40px">{{givendate}}</span></br>

     <span style="font-weight:bold;font-size:16px;color:green;margin-left:40px">Semester Fee Expire Date : </span> <span style="margin-left:40px">{{expiredate}}</span></br>

     <span style="font-weight:bold;font-size:16px;color:green;margin-left:40px">Due Status : </span> <span style="margin-left:40px">{{studue}}</span></br>

             </div>

------------>

                                         

                      

                             <div class="col-md-3" style="padding-top:20px;">

                              <p style="margin-left:40px;font-weight:bold;font-size:16px">Main Semester Fee : </p>

                              <p style="margin-left:40px;font-weight:bold;font-size:16px">Student Give : </p>

                              <p style="margin-left:40px;font-weight:bold;font-size:16px">Fine : </p>

                           <!---   <p style="margin-left:40px;font-weight:bold;font-size:16px">Fine Days : </p>--->

                              <p style="margin-left:40px;font-weight:bold;font-size:16px">Total Semester Fee : </p>

                              <p style="margin-left:40px;font-weight:bold;font-size:16px">Due : </p>

                                <p style="margin-left:40px;font-weight:bold;font-size:16px">Extra Money : </p>

                                  <p style="margin-left:40px;font-weight:bold;font-size:16px">Semester Fee Given Date : </p>

                                 <p style="margin-left:40px;font-weight:bold;font-size:16px">Semester Fee Expire Date : </p>

                                  <p style="margin-left:40px;font-weight:bold;font-size:16px">Due Status : </p>

                  

                             </div>



                             <div class="col-md-3" style="padding-top:20px;">

                              <p style="font-size:16px">{{stumainsemesterfee}} TK</p>
                              <p style="font-size:16px">{{stugiveamount}} TK</p>
                              <p style="font-size:16px">{{stufine}} TK</p>

                            <!---  <p style="font-size:16px">{{fineduration}} Days</p>----->
                              <p style="font-size:16px">{{stufineplustotalamount}} TK</p>

                               <p style="font-size:16px">{{duebalance}} TK</p>
                               <p style="font-size:16px">{{stugiveextra}} TK</p>
                               <p style="font-size:16px">{{givendate}}</p>
                               <p style="font-size:16px">{{expiredate}}</p>
                                <p style="font-size:16px">{{studue}}</p>
                                        


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

        //  student:{},
        //  information:{},

       // semesterfee:{},
    stumainsemesterfee:{},
            stugiveamount:{},
            stufine:{},
            stufineplustotalamount:{},
            stugiveextra:{},
            duebalance:{},
            givendate:{},
            expiredate:{},
            studue:{},
            my_student_info:{},
            fineduration:{},


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











  semesterfeedue(){


    //const myid = localStorage.getItem('User');

   // console.log('...........',myid)

    axios.get('/frontend_mystudent_semester_fee_due').then((res) => {

      console.log(res.data)

     this.stumainsemesterfee = res.data.stumainsemesterfee,
     this.stugiveamount = res.data.stugiveamount,
     this.stufine = res.data.stufine,
     this.stufineplustotalamount = res.data.stufineplustotalamount,
     this.stugiveextra = res.data.stugiveextra,
     this.duebalance = res.data.duebalance,
     this.givendate = res.data.givendate,
     this.expiredate = res.data.expiredate,
     this.studue = res.data.studue,
     this.my_student_info = res.data.my_student_info,
     this.fineduration = res.data.fineduration



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

               this.semesterfeedue();


         }
     }
</script>
