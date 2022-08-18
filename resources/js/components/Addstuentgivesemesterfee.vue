
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

        <div class="but">
               <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Add Semester Fee
               </button>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
                      <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel" style="color:green">Add Semester Fee</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                      </button>
                      </div>
        <div class="modal-body">

        <form enctype="multipart/form-data" role="form" @submit.prevent = "addstudentgivesemesterfee()">





              <div class="form-group">
              <label>Student Roll</label>
              <input v-model="form.student_givesemesterfee_studentroll" type="number" name="student_givesemesterfee_studentroll"
              class="form-control" :class="{ 'is-invalid': form.errors.has('student_givesemesterfee_studentroll') }" placeholder="Enater Student Roll">
              <has-error :form="form" field="student_givesemesterfee_studentroll"></has-error>
              </div>




              <div class="form-group">
                   <label for="exampleFormControlSelect1">Select Department</label>
                     <select  v-model="form.student_givesemesterfee_stuentdepartment" class="form-control" id="exampleFormControlSelect1" name="student_givesemesterfee_stuentdepartment" :class="{ 'is-invalid': form.errors.has('student_givesemesterfee_stuentdepartment') }" style="" required>
                       <option value="" disabled>Select</option>

                       <option style="color:green;font-weight:bold;" v-for="selectdept in alldepartment" :value="selectdept.department_id">{{selectdept.department_name }}</option>

                     </select>
                     <has-error :form="form" field="student_givesemesterfee_stuentdepartment"></has-error>
              </div>







              <div class="form-group">
                   <label for="exampleFormControlSelect1">Select Level</label>
                     <select  v-model="form.student_givesemesterfee_stuentlevel" class="form-control" id="exampleFormControlSelect1" name="student_givesemesterfee_stuentlevel" :class="{ 'is-invalid': form.errors.has('student_givesemesterfee_stuentlevel') }" style="" required>
                       <option value="" disabled>Select</option>

                       <option style="color:green;font-weight:bold;" v-for="selectdept in alllevel" :value="selectdept.level_id">{{selectdept.level_name}}</option>

                     </select>
                     <has-error :form="form" field="student_givesemesterfee_stuentlevel"></has-error>
              </div>





              <div class="form-group">
              <label>Student Give Semester Fee Amount</label>
              <input v-model="form.student_givesemesterfee_amount" type="number" name="student_givesemesterfee_amount"
              class="form-control" :class="{ 'is-invalid': form.errors.has('student_givesemesterfee_amount') }" placeholder="Enter Student Addresss">
              <has-error :form="form" field="student_givesemesterfee_amount"></has-error>
              </div>












            <button type="submit" class="btn btn-primary">Submit</button>

       </form>

       </div>
       </div>
       </div>
       </div>
       </div>
       </div>
       </div>



       <div class="card-body">



         <!-- <div class="input-group input-group-sm" style="width:20%;padding-bottom:20px;float:right;">
           <input class="form-control form-control-navbar" type="search"  placeholder="Search" aria-label="Search">
           <div class="input-group-append">
             <button class="btn btn-navbar" style="color:green">
               <i class="fas fa-search"></i>
             </button>
           </div>
         </div> -->


         <div class="input-group input-group-sm" style="width:20%;padding-bottom:20px;float:right;">
           <input class="form-control form-control-navbar" type="search" @keyup="RealSerchstudent" v-model="keyword" placeholder="Search" aria-label="Search">
           <div class="input-group-append">
             <button @click.prevent="RealSerchstudent" class="btn btn-navbar" style="color:green">
               <i class="fas fa-search"></i>
             </button>
           </div>
         </div>



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
  <!--
          <th style="text-align:center;">Action</th>
          <th style="text-align:center;">ON/OFF</th> -->
          <th style="text-align:center;width:170px;">Action</th>
      </tr>
      </tr>




      </thead>

      <tbody>

       <tr v-for="(v_show,index) in getallsemesterfee">

   <!-- <tr> -->

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


   <td>
           <center>





 <router-link :to="`/view_student_give_semester_fee/${v_show.student_givesemesterfee_id}`" class="btn btn-danger btn-sm" style="margin-top:17px;" ><i class="fa fa-eye" aria-hidden="true" style="color:white;"></i></router-link>

  <router-link :to="`/edit_student_give_semester_fee/${v_show.student_givesemesterfee_id}`" class="btn btn-success btn-sm" style="margin-top:17px;" ><i class="fa fa-edit" aria-hidden="true" style="color:white;"></i></router-link>
 <!-- <a class="btn btn-warning btn-sm" style="margin-top:17px;" ><i class="fa fa-edit" aria-hidden="true"></i></a> -->
  <!-- <a class="btn btn-warning btn-sm" style="margin-top:17px;" ><i class="fa fa-trash" aria-hidden="true"></i></a> -->
  <a class="btn btn-warning btn-sm" style="margin-top:17px;" @click.prevent = "deletestudentsemesterfee(v_show.student_givesemesterfee_id)"><i class="fa fa-trash" aria-hidden="true"></i></a>
           </center>

           </td>
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


          alldepartment:{},
          alllevel:{},
      //    allhallroom:{},
        //  allbus:{},
          // allbatch:{},
           keyword:'',

         //showmyallteachers:{},



          // Create a new form instance
          form: new Form({

                student_givesemesterfee_id: '',
             	  student_givesemesterfee_studentroll: '',
             	  student_givesemesterfee_stuentlevel: '',
                student_givesemesterfee_stuentdepartment:'',
              //  main_semester_fee:'',
                student_givesemesterfee_amount:'',
              //  student_givesemesterfee_fine:'',
              //  student_givesemesterfee_fine_plus_total_amount:'',
            //    student_givesemesterfee_extra_money:'',
            //    student_givesemesterfee_loss_blance:'',
              //  student_givesemesterfee_added_date,
                student_givesemesterfee_status:'',




          })
        }
      },




    methods:{


// RealSerchstudent(){
//
//
//
//
// this.$store.dispatch('Searchstudentsemesterfee',this.keyword);
//
//
//
//
// },
//search category
RealSerchstudent:_.debounce(function(){

this.$store.dispatch('Searchstudentsemesterfee',this.keyword);

},1000),



showalllevelinstudentform(){

axios.get('/show_all_level_student_form').then(({data}) => (this.alllevel = data));


},

// showallbatchinstudentform(){
//
// axios.get('/show_all_batch_student_form').then(({data}) => (this.allbatch = data));
//
//
// },





     showalldepartmentinform(){


    axios.get('/show_all_department_in_addstudent_form').then(({data}) => (this.alldepartment = data));


  },





      ourimage(img){

              return "/images/"+img;

          },



       //add category
      addstudentgivesemesterfee(){

        this.form.post('/add_student_give_semester_fee_amount')
        .then((response)=>{


          $('#exampleModal').modal('hide')

                  this.form.reset();

                  //this.$store.dispatch("allStudent")
                  this.$store.dispatch("allStudentgivesemesterfee")

             if(response.data==1){

               Toast.fire({
               icon: 'success',
               title: 'Semester Fee Added Successfully'

                })

              }else if(response.data==2){


                Toast.fire({
                icon: 'success',
                title: 'Semester Fee Added Successfully'

                 })


               }else if(response.data==3){

                 Toast.fire({
                 icon: 'success',
                 title: 'Semester Fee Added Successfully'

                  })



                }else if(response.data==4){


                  Toast.fire({
                  icon: 'success',
                  title: 'Semester Fee Added Successfully'

                   })



                }else if(response.data==5){


                  Toast.fire({
                  icon: 'success',
                  title: 'Semester Fee Added Successfully'

                   })



                }else if(response.data==6){


                  Toast.fire({
                  icon: 'success',
                  title: 'Semester Fee Added Successfully'

                   })



                }else if(response.data==7){


                  Toast.fire({
                  icon: 'success',
                  title: 'Semester Fee Added Successfully'

                   })



                }else if(response.data==8){


                  Toast.fire({
                  icon: 'error',
                  title: 'Sorry Student Information Wrong'

                   })



                }else{


                  Toast.fire({
                  icon: 'error',
                  title: 'Sorry Server is Down'

                   })



                 }

        //  console.log(response.data)







           })
           .catch(()=>{
           console.log('fail');
           })

           },

      //
      // activestudentoff(student_id){
      //
      // axios.get('/active_student_unactive/'+student_id)
      // .then((response)=>{
      //   Toast.fire({
      //   icon: 'success',
      //   title: 'Student Unactive Successfully'
      //  })
      //
      //   //  this.showallteacher();
      //       this.$store.dispatch("allStudent")
      //
      //
      //  })
      //
      //  },

    //unactive category on
      // unactivestudenton(student_id){
      //
      //   axios.get('/unactive_student_active/'+student_id)
      //   .then((response)=>{
      //
      //     Toast.fire({
      //     icon: 'success',
      //     title: 'Student Active Successfully'
      //    })
      //
      //      //this.showallteacher();
      //           this.$store.dispatch("allStudent")
      //
      //
      //    })
      //
      //  },



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

getallsemesterfee(){

return this.$store.getters.getStudentgivesemesterfee
}

},




        mounted() {

        //  this.showallteacher();
          this.showalldepartmentinform();
          this.showalllevelinstudentform();
          this.RealSerchstudent();
          //this.showallhallroominstudentform();
        //  this.showallbusinstudentform();
          // this.showallbatchinstudentform();

        //  this.RealSerchstudent();
        //  this.showallteacherprofesion();
          this.$store.dispatch("allStudentgivesemesterfee")


        }
    }
</script>
