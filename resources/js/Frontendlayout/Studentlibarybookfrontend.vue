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








   <div v-if="allpendingbook == '' ">




       <p style="padding-top:20px;font-weight:bold;font-size:20px">No Pending Book</p>





   </div>
 <div v-else>




     <div class="sdfsd" style="margin:0px 10px 20px 0px">
           <span style="font-size:16px;margin-left:0px;font-weight:bold;margin-right:20px">Libary Book</span>
</div>

    
 
                            <div class="row">









<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">SL</th>
        <th scope="col">Name</th>
      <th scope="col">Roll</th>
      <th scope="col">Image</th>
            <th scope="col">Department</th>
      <th scope="col">Level</th>
      <th scope="col">Book Name</th>
  
        <th scope="col">Book Image</th>
         <th scope="col">Book Take Date</th>

          <th scope="col">Book Return Date</th>

                    <th scope="col">Status</th>


          <th scope="col">Action</th>
 
           
    

    </tr>
  </thead>





  <tbody>




    <tr v-for="(v_showteacher,index) in allpendingbook">
      <th scope="row">{{index+1}}</th>
            <th scope="row">{{v_showteacher.student_name}}</th>
      <th scope="row">{{v_showteacher.student_roll}}</th>

      <th scope="row"><img :src="ourimage(v_showteacher.student_image)" alt="" style="height:70px;width:70px;"></th>
    


            <th scope="row">{{v_showteacher.department_name}}</th>
    

            <th scope="row">{{v_showteacher.level_name}}</th>


         
      <th scope="row">{{v_showteacher.libary_book_name}}</th>

      <th scope="row"><img :src="ourimage(v_showteacher.libary_book_image)" alt="" style="height:70px;width:70px;"></th>

            <th scope="row">{{v_showteacher.studenttake_libary_book_take_date}}</th>

               <th scope="row">{{v_showteacher.studenttake_libary_book_return_date}}</th>
                  <th scope="row">



      


           <center>
  <div v-if="v_showteacher.studenttake_libary_book_status == 1" style="margin-top:20px;">
  <span class="bg-danger" style="color:white;padding:5px 5px 5px 5px">Pending</span>
  </div>

  <div v-else="v_showteacher.studenttake_libary_book_status == 0" style="margin-top:20px;">
  <span class="bg-success"style="margin-top:30px;color:white;padding:5px 5px 5px 5px">Success</span>
  </div>
</center>


          


                </th>



    

<th>

          <center>



<router-link :to="`/view_libary_book_frontend/${v_showteacher.studenttake_libary_book_id}`" class="btn btn-danger btn-sm" style="margin-top:17px;" ><i class="fa fa-eye" aria-hidden="true" style="color:white;"></i></router-link>


           </center>

           </th>
                                    


  
    </tr>

  

  </tbody>



</table>





                             

                    



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
      

            allpendingbook:{},


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




  showstudenttakelibrybook(){



     axios.get('/show_student_libary_book_frontend').then((res) => {


     console.log(res.data)

    this.allpendingbook = res.data.allpendingbook
  //   this.today = res.data.today



     })

  //   this.showstuentwhotakebook();

   },










 },


 computed:{


 },




         mounted() {


               //  this.displayalladmissionexam();

                // this.userinformation();

             this.showstudenttakelibrybook();


         }
     }
</script>
