<template>
    <span>

<Mybackendheader></Mybackendheader>

<MyBackendsidebar></MyBackendsidebar>



          <!-- Main content -->
  <section class="content" style="margin-top:20px;margin-bottom:500px;width:84%;margin-left:16%">
    <div class="container-fluid">
       <div class="row">
         <div class="col-12">


  <div class="card" style="padding-bottom:20px;">
  <div class="card-header">
  <div class="main">
           <div class="title" style="width:1000px;float:left">
             <h3 class="card-title">All Semester Fee</h3>
           </div>


 </div>
 </div>



 <div class="card-body">



 <table id="section" class="table table-bordered table-striped">




 <thead>

 <tr>
          <th style="text-align:center;">SL</th>
          <th style="text-align:center;">Roll</th>
          <th style="text-align:center;">Name</th>
          <th style="text-align:center;">Dpt</th>
          <th style="text-align:center;">level</th>
          <th style="text-align:center;">Image</th>
          <th style="text-align:center;">Semester Fee</th>
          <th style="text-align:center;width:80px;">Fine</th>
          <th style="text-align:center;">Total</th>
          <th style="text-align:center;">Student Gives</th>
          <th style="text-align:center;width:80px;">Extra</th>
          <th style="text-align:center;width:85px;">Loss</th>
          <th style="text-align:center;">Give Date</th>
          <th style="text-align:center;">Exp Date</th>
  <!--
          <th style="text-align:center;">Action</th>

                    <th style="text-align:center;width:170px;">Action</th>

          <th style="text-align:center;">ON/OFF</th> -->
</tr>




</thead>

<tbody>

<tr v-for="(v_show,index) in showtudentgiveallsemesterfee">



 <td style="text-align:center;padding-top:37px;">{{index+1}}</td>
  <td style="text-align:center;padding-top:37px;">{{v_show.student_givesemesterfee_studentroll}}</td>
           <td style="text-align:center;padding-top:37px;">{{v_show.student_name}}</td>
           <td style="text-align:center;padding-top:37px;">{{v_show.department_name}}</td>

           <td style="text-align:center;padding-top:37px;">{{v_show.level_name}}</td>
           <td style="text-align:center"><img :src="ourimage(v_show.student_image)" alt="" style="height:70px;width:70px;"></td>



           <td style="text-align:center;padding-top:37px;">{{v_show.main_semester_fee}} TK</td>
           <td style="text-align:center;padding-top:37px;">{{v_show.student_givesemesterfee_fine}} TK</td>
          <td style="text-align:center;padding-top:37px;">{{v_show.student_givesemesterfee_fine_plus_total_amount}} TK</td>

            <td style="text-align:center;padding-top:37px;">{{v_show.student_givesemesterfee_amount}} TK</td>
          <td style="text-align:center;padding-top:37px;">{{v_show.student_givesemesterfee_extra_money}} TK</td>
          <td style="text-align:center;padding-top:37px;">{{v_show.student_givesemesterfee_loss_blance}} TK</td>
          <td style="text-align:center;padding-top:37px;">{{v_show.student_givesemesterfee_added_date}}</td>
           <td style="text-align:center;padding-top:37px;">{{v_show.student_givesemesterfee_expire_date}}</td>


          






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

    </span>
</template>



<script>
import _ from 'lodash'

import Mybackendheader from "../backendlayout/Adminheader.vue"
import MyBackendsidebar from "../backendlayout/Adminsidebar.vue"
import Mybackendfooter from "../backendlayout/Adminfooter.vue"

    export default {


      data () {
        return {

         // showalldepartment:{},
          showtudentgiveallsemesterfee:{},


          // Create a new form instance
          form: new Form({

        


          })
        }
      },

      components: {
         MyBackendsidebar,
         Mybackendheader,
         Mybackendfooter,
       },



    methods:{




      ourimage(img){

              return "/images/"+img;

          },


   
     Viewspeceficstudentallsemeterfee(){

     axios.get('/view_specificstudent_allsemesterfee/'+this.$route.params.student_id).then((res) => {


         console.log(res.data)

        this.showtudentgiveallsemesterfee = res.data.showtudentgiveallsemesterfee
     //this.hallname = res.data.hallname



     })

   },




},


// computed:{
//
// // getallcategory(){
// //
// // return this.$store.getters.getCategory
// // }
//
// },




        mounted() {

          this.Viewspeceficstudentallsemeterfee();


         // this.showallteacherinform();

          // this.showcategoryinselectform();
          // this.$store.dispatch("allCategory",this.currentPage);
          // this.RealSerchcategory();


        }
    }
</script>
