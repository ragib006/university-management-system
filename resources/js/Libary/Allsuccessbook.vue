
<template>
    <div>


      <Mybackendheader></Mybackendheader>

      <MyBackendsidebar></MyBackendsidebar>



        <section class="content" style="margin-top:20px;margin-bottom:400px;width:80%;margin-left:270px">
          <div class="container-fluid">
             <div class="row">
               <div class="col-12">




        <div class="card" style="padding-bottom:20px;">
        <div class="card-header">
        <div class="main">
                 <div class="title" style="width:1000px;float:left">
                   <h3 class="card-title">All Success Book</h3>
                 </div>


       </div>
       </div>



       <div class="card-body">



         <!-- <div class="input-group input-group-sm" style="width:20%;padding-bottom:20px;float:right;">
           <input class="form-control form-control-navbar" type="search" @keyup="RealSerchstudent" v-model="keyword" placeholder="Search" aria-label="Search">
           <div class="input-group-append">
             <button @click.prevent="RealSerchstudent" class="btn btn-navbar" style="color:green">
               <i class="fas fa-search"></i>
             </button>
           </div>
         </div> -->

         <!-- <div class="input-group input-group-sm" style="width:20%;padding-bottom:20px;float:right;">
           <input class="form-control form-control-navbar" type="search"  placeholder="Search" aria-label="Search">
           <div class="input-group-append">
             <button class="btn btn-navbar" style="color:green">
               <i class="fas fa-search"></i>
             </button>
           </div>
         </div> -->



       <table id="section" class="table table-bordered table-striped">




       <thead>

       <tr>
          <th style="text-align:center;">SL</th>
          <th style="text-align:center;">Student Name</th>
          <th style="text-align:center;">Roll</th>
          <th style="text-align:center;">Image</th>
          <th style="text-align:center;">Department</th>
          <th style="text-align:center;">Level</th>
          <th style="text-align:center;">Book Name</th>

          <th style="text-align:center;">Book Image</th>

          <th style="text-align:center;">Book Take Date</th>
          <th style="text-align:center;">Book Return Date</th>
          <th style="text-align:center;">Status</th>
          <th style="text-align:center;width:100px;">Action</th>

      </tr>
      <!-- </tr> -->




      </thead>

      <tbody>

       <tr v-for="(v_show,index) in allsuccessbook">

   <!-- <tr> -->

           <td style="text-align:center;padding-top:30px;">{{index+1}}</td>
           <td style="text-align:center;padding-top:30px;">{{v_show.student_name}}</td>
           <td style="text-align:center;padding-top:30px;">{{v_show.student_roll}}</td>
           <td style="text-align:center"><img :src="ourimage(v_show.student_image)" alt="" style="height:70px;width:70px;"></td>
           <td style="text-align:center;padding-top:30px;">{{v_show.department_name}}</td>
           <td style="text-align:center;padding-top:30px;">{{v_show.level_name}}</td>
           <td style="text-align:center;padding-top:30px;">{{v_show.libary_book_name}}</td>


           <td style="text-align:center"><img :src="ourimage(v_show.libary_book_image)" alt="" style="height:70px;width:70px;"></td>






           <td style="text-align:center;padding-top:30px;">{{v_show.studenttake_libary_book_take_date}}</td>
           <td style="text-align:center;padding-top:30px;">{{v_show.studenttake_libary_book_return_date}}</td>

           <!-- <td style="text-align:center;padding-top:30px;">fdgdf</td>
           <td style="text-align:center;padding-top:30px;">fdgfdg</td> -->


         <td>


           <center>
            <div v-if="v_show.studenttake_libary_book_status == 1" style="margin-top:20px;">
            <span class="bg-danger" style="color:white;padding:5px 5px 5px 5px">Pending</span>
            </div>

            <div v-else="v_show.studenttake_libary_book_status == 0" style="margin-top:20px;">
            <span class="bg-success"style="margin-top:30px;color:white;padding:5px 5px 5px 5px">Success</span>
            </div>
          </center>







          </td>



           <td>

           <center>



<router-link :to="`/view_success_book/${v_show.studenttake_libary_book_id}`" class="btn btn-danger btn-sm" style="margin-top:17px;" ><i class="fa fa-eye" aria-hidden="true" style="color:white;"></i></router-link>


<a class="btn btn-warning btn-sm" style="margin-top:17px;" @click.prevent = "deletestudenttakebook(v_show.studenttake_libary_book_id)"><i class="fa fa-trash" aria-hidden="true"></i></a>

           </center>

           </td>
           </tr>

       </tbody>





       </table>
       </div>




        </div>
        </div>
        </div>
        </div>

        </section>


   <Mybackendfooter></Mybackendfooter>

  </div>
</template>

<script>
   import _ from 'lodash'

   import Mybackendheader from "../backendlayout/Adminheader.vue"
   import MyBackendsidebar from "../backendlayout/Adminsidebar.vue"
   import Mybackendfooter from "../backendlayout/Adminfooter.vue"

    export default {


      data () {
        return {


           allsuccessbook:{},


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
         MyBackendsidebar,
         Mybackendheader,
         Mybackendfooter,
       },






    methods:{

      showstuentwhotakebook(){



     axios.get('/show_all_success_book').then((res) => {

     this.allsuccessbook = res.data.allsuccessbook

     })

  //   this.showstuentwhotakebook();

   },






  ourimage(img){

          return "/images/"+img;

      },





//pendingbooksuccess(v_show.studenttake_libary_book_id)



    //unactive category on



deletestudenttakebook(studenttake_libary_book_id){
  axios.get('/delate_success_libary_book/'+studenttake_libary_book_id)
  .then((response)=>{

    Toast.fire({
    icon: 'success',
    title: 'Student Take Libary Book delate Successfully'
     })


     this.showstuentwhotakebook();

      //this.showallteacher();
    //  this.$store.dispatch("allStudent")

      })
   .catch(()=>{
   console.log('fail');

    })

},



//}

},


computed:{

// getallLibryBook(){
//
// return this.$store.getters.getLibarybook
// }


},




        mounted() {

         // this.showalldepartmentinform();
         // this.showalllevelinstudentform();
         this.showstuentwhotakebook();
        //  this.RealSerchstudent();
        //  this.$store.dispatch("allLibarybookshow");

        }
    }
</script>
