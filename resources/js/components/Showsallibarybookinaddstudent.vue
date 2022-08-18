
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
                   <h3 class="card-title">Take Libary Book List</h3>
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
          <th style="text-align:center;">Action</th>
              <!-- <th style="text-align:center;">Image</th> -->
          <!-- <th style="text-align:center;">Image</th> -->
          <!-- <th style="text-align:center;">Action</th>
          <th style="text-align:center;">ON/OFF</th> -->
          <!-- <th style="text-align:center;width:500px;">Action</th> -->
      </tr>
      <!-- </tr> -->




      </thead>

      <tbody>

       <tr v-for="(v_show,index) in whichstudenttakethisbook">



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


          </td>



          <td>


            <center>
             <div v-if="v_show.studenttake_libary_book_status == 1">
             <a class="btn btn-danger btn-sm" style="margin-top:17px;color:white;" >Pending</a>
             </div>

             <div v-else="v_show.studenttake_libary_book_status == 0">
             <a class="btn btn-success btn-sm" style="margin-top:17px;color:white;" >Success</a>
             </div>
           </center>







           </td>





           <td>

           <center>


<router-link :to="`/view_student_take_libary_book_add_student/${v_show.studenttake_libary_book_id}`" class="btn btn-danger btn-sm" style="margin-top:17px;" ><i class="fa fa-eye" aria-hidden="true" style="color:white;"></i></router-link>


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


           // alldepartment:{},
           // alllevel:{},
           // whichstudenttakethisbook:{},
          // allhallroom:{},
          // allbus:{},
          // allbatch:{},
           //keyword:'',
           whichstudenttakethisbook:{},

         //showmyallteachers:{},



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
                  // studenttake_libary_book_return_date:'',
                 	//libary_book_added_date:'',




          })
        }
      },




    methods:{

      showlibarybookinaddstudent(){



     axios.get('/show_libary_book_add_student/'+this.$route.params.student_id).then((res) => {


      // console.log(res.data)

    this.whichstudenttakethisbook = res.data.whichstudenttakethisbook
    // this.hallname = res.data.hallname



     })



   },









  ourimage(img){

          return "/images/"+img;

      },






       //add category
       // addstudenttakelibarybook(){
       //
       //  this.form.post('/add_student_take_libarybook_formaction/'+this.$route.params.libary_book_id)
       //  .then((response)=>{
       //
       //
       //
       //
       //   console.log(response.data)
       //
       //
       //
       //     $('#exampleModal').modal('hide')
       //      this.form.reset();
       //
       //      this.showstuentwhotakebook();
       //
       //        if(response.data==0){
       //
       //          Toast.fire({
       //          icon: 'error',
       //          title: 'Student Information Not Right'
       //
       //           })
       //
       //         }else if(response.data==1){
       //
       //           Toast.fire({
       //           icon: 'error',
       //           title: 'Sorry Student Already Take This Book'
       //
       //          })
       //
       //         }else if(response.data==2){
       //
       //
       //           Toast.fire({
       //           icon: 'error',
       //           title: 'Sorry Student Can Not Take More Then Three Book'
       //
       //         })
       //
       //         }else{
       //
       //                Toast.fire({
       //                icon: 'success',
       //                title: 'Student Take Libary Book Succesfully'
       //
       //                 })
       //             }
       //
       //        })
       //     .catch(()=>{
       //     console.log('fail');
       //     })
       //
       //     },


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
      //         //this.showallteacher();
      //           this.$store.dispatch("allStudent")
      //
      //    })
      //
      //  },



// deletestudent(teacher_id){
//   axios.get('/delate_student/'+teacher_id)
//   .then((response)=>{
//
//     Toast.fire({
//     icon: 'success',
//     title: 'Student delate Successfully'
//      })
//
//       //this.showallteacher();
//       this.$store.dispatch("allStudent")
//
//       })
//    .catch(()=>{
//    console.log('fail');
//
//     })
//
// },



//}

},


computed:{

// getallLibryBook(){
//
// return this.$store.getters.getLibarybook
// }


},




        mounted() {

          this.showlibarybookinaddstudent();

      //   this.showalldepartmentinform();
      //   this.showalllevelinstudentform();
      //   this.showstuentwhotakebook();
        //  this.RealSerchstudent();
        //  this.$store.dispatch("allLibarybookshow");

        }
    }
</script>
