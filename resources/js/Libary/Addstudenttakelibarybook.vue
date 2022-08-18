
<template>
    <div>

      <Mybackendheader></Mybackendheader>

      <MyBackendsidebar></MyBackendsidebar>



        <section class="content" style="margin-top:20px;margin-bottom:450px;width:80%;margin-left:270px">
          <div class="container-fluid">
             <div class="row">
               <div class="col-12">




        <div class="card" style="padding-bottom:20px;">
        <div class="card-header">
        <div class="main">
                 <div class="title" style="width:1000px;float:left">
                   <h3 class="card-title">Take Book Student List</h3>
                 </div>

        <div class="but">
               <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Add Student Take Book
               </button>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
                      <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel" style="color:green">Add Student Take Book</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                      </button>
                      </div>
        <div class="modal-body">

        <form enctype="multipart/form-data" role="form" @submit.prevent = "addstudenttakelibarybook()">




              <div class="form-group">
              <label>Student Roll</label>
              <input v-model="form.studenttake_libary_book_roll" type="text" name="studenttake_libary_book_roll"
              class="form-control" :class="{ 'is-invalid': form.errors.has('studenttake_libary_book_roll') }" placeholder="Enter Student Roll">
              <has-error :form="form" field="studenttake_libary_book_roll"></has-error>
              </div>


              <div class="form-group">
                   <label for="exampleFormControlSelect1">Select Department</label>
                     <select  v-model="form.studenttake_libary_book_department" class="form-control" id="exampleFormControlSelect1" name="studenttake_libary_book_department" :class="{ 'is-invalid': form.errors.has('studenttake_libary_book_department') }" style="" required>
                       <option value="" disabled>Select</option>

                       <option style="color:green;font-weight:bold;" v-for="selectdept in alldepartment" :value="selectdept.department_id">{{selectdept.department_name }}</option>

                     </select>
                     <has-error :form="form" field="studenttake_libary_book_department"></has-error>
              </div>




              <div class="form-group">
                   <label for="exampleFormControlSelect1">Select Level</label>
                     <select  v-model="form.studenttake_libary_book_level" class="form-control" id="exampleFormControlSelect1" name="studenttake_libary_book_level" :class="{ 'is-invalid': form.errors.has('studenttake_libary_book_level') }" style="" required>
                       <option value="" disabled>Select</option>

                       <option style="color:green;font-weight:bold;" v-for="selectdept in alllevel" :value="selectdept.level_id">{{selectdept.level_name}}</option>

                     </select>
                     <has-error :form="form" field="studenttake_libary_book_level"></has-error>
              </div>


              <div class="form-group">
              <label>Libary Book Take Date</label>
              <input v-model="form.studenttake_libary_book_take_date" type="text" name="studenttake_libary_book_take_date" min="1997-01-01" max="2030-12-31"
              class="form-control" :class="{ 'is-invalid': form.errors.has('studenttake_libary_book_take_date') }" placeholder="01-12-2021">
              <has-error :form="form" field="studenttake_libary_book_take_date"></has-error>
              </div>







              <div class="form-group">
              <label>Libary Book Return Date</label>
              <input v-model="form.studenttake_libary_book_return_date" type="text" name="studenttake_libary_book_return_date" min="1997-01-01" max="2030-12-31"
              class="form-control" :class="{ 'is-invalid': form.errors.has('studenttake_libary_book_return_date') }" placeholder="01-12-2021">
              <has-error :form="form" field="studenttake_libary_book_return_date"></has-error>
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

          <th style="text-align:center;">Take Date</th>
          <th style="text-align:center;">Return Date</th>
          <th style="text-align:center;">Status</th>
          <th style="text-align:center;width:150px;">Action</th>

      </tr>
      <!-- </tr> -->




      </thead>

      <tbody>

       <tr v-for="(v_show,index) in whichstudenttakethisbook">

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


           <!-- <center>
            <div v-if="v_show.studenttake_libary_book_status == 1">
            <a class="btn btn-danger btn-sm" style="margin-top:17px;color:white;" @click.prevent = "pendingbooksuccess(v_show.studenttake_libary_book_id)" >Pending</a>
            </div>

            <div v-else="v_show.studenttake_libary_book_status == 0">
            <a class="btn btn-success btn-sm" style="margin-top:17px;color:white;" @click.prevent = "successbookpending(v_show.studenttake_libary_book_id)" >Success</a>
            </div>
          </center> -->



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



<router-link :to="`/view_student_take_libary_book/${v_show.studenttake_libary_book_id}`" class="btn btn-danger btn-sm" style="margin-top:17px;" ><i class="fa fa-eye" aria-hidden="true" style="color:white;"></i></router-link>

 <router-link :to="`/edit_student_take_libary_book/${v_show.studenttake_libary_book_id}`" class="btn btn-success btn-sm" style="margin-top:17px;" ><i class="fa fa-edit" aria-hidden="true"></i></router-link>

             <!-- <a class="btn btn-warning btn-sm" style="margin-top:17px;" @click.prevent = "deletelibarybook(v_show.libary_book_id)"><i class="fa fa-trash" aria-hidden="true"></i></a>

             <router-link :to="`/edit_libary_book/${v_show.libary_book_id}`" class="btn btn-success btn-sm" style="margin-top:17px;" ><i class="fa fa-edit" aria-hidden="true"></i></router-link>
 -->

            <!-- <router-link :to="`/view_student_course/${v_showteacher.student_id}`" class="btn btn-primary btn-sm" style="margin-top:17px;" ><i class="fas fa-book" aria-hidden="true" style="color:white;"></i></router-link> -->

          <!-- <a class="btn btn-warning btn-sm" style="margin-top:17px;"><i class="fa fa-trash" aria-hidden="true"></i></a> -->

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


           alldepartment:{},
           alllevel:{},
           whichstudenttakethisbook:{},


          // Create a new form instance
          form: new Form({

                 	studenttake_libary_book_id: '',
             	   	studenttake_libary_book_roll: '',
             	    libary_book_my_id: '',
                  studenttake_libary_book_department:'',
                 	studenttake_libary_book_level:'',
                  studenttake_libary_book_take_date:'',
                  studenttake_libary_book_take_date:'',
                  studenttake_libary_book_return_date:'',
                  // studenttake_libary_book_return_date:'',
                 	//libary_book_added_date:'',




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



     axios.get('/show_student_who_take_book/'+this.$route.params.libary_book_id).then((res) => {


      // console.log(res.data)

     this.whichstudenttakethisbook = res.data.whichstudenttakethisbook
    // this.hallname = res.data.hallname



     })

  //   this.showstuentwhotakebook();

   },


showalllevelinstudentform(){

axios.get('/show_all_level_student_form').then(({data}) => (this.alllevel = data));


},





     showalldepartmentinform(){


    axios.get('/show_all_department_in_addstudent_form').then(({data}) => (this.alldepartment = data));


  },



  ourimage(img){

          return "/images/"+img;

      },



      deletestudenttakebook(studenttake_libary_book_id){
        axios.get('/delate_student_take_libarybook/'+studenttake_libary_book_id)
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






       //add category
       addstudenttakelibarybook(){

        this.form.post('/add_student_take_libarybook_formaction/'+this.$route.params.libary_book_id)
        .then((response)=>{




       // console.log(response.data)



           $('#exampleModal').modal('hide')
            this.form.reset();

            this.showstuentwhotakebook();

              if(response.data==0){

                Toast.fire({
                icon: 'error',
                title: 'Student Information Not Right'

                 })

               }

                  else if(response.data==10){

                        Toast.fire({
                        icon: 'error',
                        title: 'Sorry Student Already Take This Book'

                       })
                     }

                     else if(response.data==11){

                           Toast.fire({
                           icon: 'error',
                           title: 'Student Can Not Take More Then Three Book'

                          })
                        }




                              else{

                                     Toast.fire({
                                     icon: 'success',
                                     title: 'Student Take Libary Book Succesfully'

                                      })
                                  }





              })
           .catch(()=>{
           console.log('fail');
           })

           },




           deletestudenttakebook(studenttake_libary_book_id){
             axios.get('/delate_success_libary_book/'+studenttake_libary_book_id)
             .then((response)=>{

               Toast.fire({
               icon: 'success',
               title: 'Student Take Libary Book delate Successfully'
                })


                // this.showstuentwhotakebook();
                this.showstuentwhotakebook();

                 //this.showallteacher();
               //  this.$store.dispatch("allStudent")

                 })
              .catch(()=>{
              console.log('fail');

               })

           },




},


computed:{

// getallLibryBook(){
//
// return this.$store.getters.getLibarybook
// }


},




        mounted() {

         this.showalldepartmentinform();
         this.showalllevelinstudentform();
         this.showstuentwhotakebook();
        //  this.RealSerchstudent();
        //  this.$store.dispatch("allLibarybookshow");

        }
    }
</script>
