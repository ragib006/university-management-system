
<template>
    <div>


        <section class="content" style="margin-top:20px;">
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
          <th style="text-align:center;">Department</th>
          <th style="text-align:center;">level</th>
          <th style="text-align:center;">Image</th>
          <th style="text-align:center;">Semester Fee</th>
          <th style="text-align:center;width:80px;">Fine</th>
          <th style="text-align:center;">Fine + Semester Fee</th>
          <th style="text-align:center;">Student Gives</th>
          <th style="text-align:center;width:80px;">Extra Money</th>
          <th style="text-align:center;width:80px;">Loss Money</th>
          <th style="text-align:center;">Give Date</th>
          <th style="text-align:center;">Last Date</th>
  <!--
          <th style="text-align:center;">Action</th>
          <th style="text-align:center;">ON/OFF</th> -->
          <!-- <th style="text-align:center;width:150px;">Action</th> -->
      </tr>
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
          <td style="text-align:center;padding-top:37px;">{{v_show.level_expire_date}}</td>


   <!-- <td>
           <center>





 <router-link :to="`/view_student_give_semester_fee/${v_show.student_givesemesterfee_id}`" class="btn btn-danger btn-sm" style="margin-top:17px;" ><i class="fa fa-eye" aria-hidden="true" style="color:white;"></i></router-link>

  <router-link :to="`/edit_student_give_semester_fee/${v_show.student_givesemesterfee_id}`" class="btn btn-success btn-sm" style="margin-top:17px;" ><i class="fa fa-edit" aria-hidden="true" style="color:white;"></i></router-link>

  <a class="btn btn-warning btn-sm" style="margin-top:17px;" @click.prevent = "deletestudentsemesterfee(v_show.student_givesemesterfee_id)"><i class="fa fa-trash" aria-hidden="true"></i></a>
           </center>

           </td> -->
           </tr>

       </tbody>





       </table>
       </div>


                   <!-- <center>
                   <el-pagination
                     background
                        @current-change="handleCurrentChange"
                        :current-page.sync="currentPage"
                        :page-size="getallproduct.per_page"
                        layout="prev, pager, next"
                       :total="getallproduct.total">
                   </el-pagination>

                   </center> -->


        </div>
        </div>
        </div>
        </div>

        </section>
  </div>
</template>

<script>
   import _ from 'lodash'

    export default {


      data () {
        return {


        //  alldepartment:{},
        //  alllevel:{},
      //    allhallroom:{},
        //  allbus:{},
          // allbatch:{},
          // keyword:'',

         //showmyallteachers:{},
         showtudentgiveallsemesterfee:{},



          // Create a new form instance
          form: new Form({

                //student_givesemesterfee_id: '',
             	  //student_givesemesterfee_studentroll: '',
             	 // student_givesemesterfee_stuentlevel: '',
                //student_givesemesterfee_stuentdepartment:'',
              //  main_semester_fee:'',
              //  student_givesemesterfee_amount:'',
              //  student_givesemesterfee_fine:'',
              //  student_givesemesterfee_fine_plus_total_amount:'',
            //    student_givesemesterfee_extra_money:'',
            //    student_givesemesterfee_loss_blance:'',
              //  student_givesemesterfee_added_date,
              //  student_givesemesterfee_status:'',




          })
        }
      },




    methods:{




      Viewspeceficstudentallsemeterfee(){

     axios.get('/view_specificstudent_allsemesterfee/'+this.$route.params.student_id).then((res) => {


          //console.log(res.data)

        this.showtudentgiveallsemesterfee = res.data.showtudentgiveallsemesterfee
     //this.hallname = res.data.hallname



     })

   },




      ourimage(img){

              return "/images/"+img;

          },






deletestudentsemesterfee(student_givesemesterfee_id){
  axios.get('/delate_student_semeter_fee/'+student_givesemesterfee_id)
  .then((response)=>{


    console.log(response.data)

    Toast.fire({
    icon: 'success',
    title: 'Semester Fee delate Successfully'
     })

      //this.showallteacher();
      //this.$store.dispatch("allStudent")
      this.$store.dispatch("allStudentgivesemesterfee")

      })
   .catch(()=>{
   console.log('fail');

    })

},



},


computed:{

//getallsemesterfee(){

//return this.$store.getters.getStudentgivesemesterfee
//}

},




        mounted() {


          this.Viewspeceficstudentallsemeterfee();

        //  this.showallteacher();
          //this.showalldepartmentinform();
        //  this.showalllevelinstudentform();
        //  this.RealSerchstudent();
          //this.showallhallroominstudentform();
        //  this.showallbusinstudentform();
          // this.showallbatchinstudentform();

        //  this.RealSerchstudent();
        //  this.showallteacherprofesion();
        //  this.$store.dispatch("allStudentgivesemesterfee")


        }
    }
</script>
