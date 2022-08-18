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


   
           

<!------------------
        <div class="sdfsd" style="margin:0px 10px 20px 0px">

           <span style="font-size:16px;margin-left:0px;font-weight:bold;margin-right:20px">Semester Final Mark</span>
         <span style="font-size:16px;">Course Code :</span>   <span style="font-size:16px;">{{courseinfo.course_code}}</span> 

          <span style="font-size:16px;margin-left:20px">Course Title :</span>   <span style="font-size:16px;">{{courseinfo.course_title}}</span> 

 <span style="font-size:16px;margin-left:20px">Credit :</span>   <span style="font-size:16px;">{{courseinfo.course_credit}}</span>

 <span style="font-size:16px;margin-left:20px">Course :</span>   <span style="font-size:16px;">{{courseinfo.level_name}}</span>





         </div>---------------->

          
    
 
                            <div class="row">

   <div class="col-md-5">

        <div class="ima" style="width:500px;float:left;height:500px;margin-left:23px;">
      <img :src="mypostimage(studenttakebookinfo.libary_book_image)" alt="" style="height:400px;width:400px;">
      </div>


      </div>


      <div class="col-md-7">


       <span class="username" style="margin-bottom:3px;">
         <span style="font-size:18px;font-weight:bold">Book Name : </span> <span style="font-size:18px;color:green;font-weight:bold">{{studenttakebookinfo.libary_book_name}}</span>
       </span></br>

       <span class="username" style="margin-bottom:3px;">
        <span style="font-size:18px;font-weight:bold">Book Take Date : </span> <span style="font-size:18px;color:green;font-weight:bold">{{studenttakebookinfo.studenttake_libary_book_take_date}}</span>
       </span></br>

       <span class="username" style="margin-bottom:3px;">
       <span style="font-size:18px;font-weight:bold">Book Return Last Date: </span> <span style="font-size:18px;color:green;font-weight:bold">{{studenttakebookinfo.studenttake_libary_book_return_date }}</span>
       </span></br>


       <span class="username" style="margin-bottom:3px;">
       <span style="font-size:18px;font-weight:bold">Fine Status: </span>

       <span style="font-size:18px;color:white;font-weight:bold;background:green;padding:3px 3px 3px 3px" v-if="mylibarybookfinestatus == 0">Not Fine  </span>

       <span style="font-size:18px;color:white;font-weight:bold;background:red;padding:3px 3px 3px 3px" v-else> Fine  </span>

       </span></br>

       <span class="username" style="margin-bottom:3px;">
       <span style="font-size:18px;font-weight:bold">Fine Day: </span> <span style="font-size:18px;color:green;font-weight:bold">{{mylibarybookfineday}}</span>
       </span></br>

       <span class="username" style="margin-bottom:3px;">
       <span style="font-size:18px;font-weight:bold">Fine Amount: </span> <span style="font-size:18px;color:green;font-weight:bold">{{mylibarybookfine}} TK</span>
      </span></br>




      </div>

            






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
   import _ from 'lodash'


  import  Websiteheader from "../Frontendlayout/Websiteheader.vue"
  import  Websitefooter from "../Frontendlayout/Websitefooter.vue"

  import  Studentprofilesidebar from "../Frontendlayout/Studentprofilesidebar.vue"

    export default {


      data () {
        return {

           //
           // alldepartment:{},
           // alllevel:{},
          // allpendingbook:{},
        //   today:{},
          // allhallroom:{},
          // allbus:{},
          // allbatch:{},
           //keyword:'',

         //showmyallteachers:{},

      //   allpendingbook:{},



studenttakebookinfo:{},
mylibarybookfine:{},
mylibarybookfineday:{},
mylibarybookfinestatus:{},


          // Create a new form instance
          form: new Form({

                 	// studenttake_libary_book_id: '',
             	   	// studenttake_libary_book_roll: '',
             	    // libary_book_my_id: '',
                  // studenttake_libary_book_department:'',
                 	// studenttake_libary_book_level:'',
                  // studenttake_libary_book_take_date:'',
                  // studenttake_libary_book_take_date:'',
                  // studenttake_libary_book_return_date:'',





          })
        }
      },


      components: {
          Websiteheader,
          Websitefooter,
          Studentprofilesidebar,
       },




    methods:{

      showstudenttakelibrybook(){



     axios.get('/student_view_libary_book_fine_frontend/'+this.$route.params.studenttake_libary_book_id).then((res) => {



      this.studenttakebookinfo = res.data.studenttakebookinfo
       this.mylibarybookfine = res.data.mylibarybookfine,
       this.mylibarybookfineday = res.data.mylibarybookfineday,
       this.mylibarybookfinestatus = res.data.mylibarybookfinestatus

     console.log(res.data)

    //this.allpendingbook = res.data.allpendingbook
  //   this.today = res.data.today



     })

  //   this.showstuentwhotakebook();

   },






  mypostimage(img){

          return "/images/"+img;

      },









},


computed:{

// getallLibryBook(){
//
// return this.$store.getters.getLibarybook
// }


},




        mounted() {


         this.showstudenttakelibrybook();


        }
    }
</script>
