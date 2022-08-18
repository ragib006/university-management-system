<template>
    <div>



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
             <h3 class="card-title">All Course</h3>
           </div>

  <div class="but">
         <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
          Add Course
         </button>
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
  <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="color:green">AddCourse</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>
  <div class="modal-body">

  <form enctype="multipart/form-data" role="form" @submit.prevent = "addcourse()">





        <div class="form-group">
        <label>Course Code</label>
        <input v-model="form.course_code" type="text" name="course_code"
        class="form-control" :class="{ 'is-invalid': form.errors.has('course_code') }" placeholder="Enter Course Code">
        <has-error :form="form" field="course_code"></has-error>
        </div>

        <div class="form-group">
        <label>Course Title</label>
        <input v-model="form.course_title" type="text" name="course_title"
        class="form-control" :class="{ 'is-invalid': form.errors.has('course_title') }" placeholder="Enater Course Title">
        <has-error :form="form" field="course_title"></has-error>
        </div>


        <div class="form-group">
             <label for="exampleFormControlSelect1">Select Department</label>
               <select  v-model="form.dept_id" class="form-control" id="exampleFormControlSelect1" name="dept_id" :class="{ 'is-invalid': form.errors.has('dept_id') }" style="" required>
                 <option value="" disabled>Select</option>

                 <option style="color:green;font-weight:bold;" v-for="selectteacher in allmydepartment" :value="selectteacher.department_id">{{selectteacher.department_name}}</option>

               </select>
               <has-error :form="form" field="dept_id"></has-error>
        </div>






        <div class="form-group">
             <label for="exampleFormControlSelect1">Select Classroom</label>
               <select  v-model="form.cls_room_id" class="form-control" id="exampleFormControlSelect1" name="cls_room_id" :class="{ 'is-invalid': form.errors.has('cls_room_id') }" style="" required>
                 <option value="" disabled>Select</option>

                 <option style="color:green;font-weight:bold;" v-for="selectteacher in allclassroom" :value="selectteacher.classroom_id">{{selectteacher.classroom_name}}</option>

               </select>
               <has-error :form="form" field="cls_room_id"></has-error>
        </div>










        <div class="form-group">
             <label for="exampleFormControlSelect1">Select Level</label>
               <select  v-model="form.lev_id" class="form-control" id="exampleFormControlSelect1" name="lev_id" :class="{ 'is-invalid': form.errors.has('lev_id') }" style="" required>
                 <option value="" disabled>Select</option>

                 <option style="color:green;font-weight:bold;" v-for="selectteacher in allmylevel" :value="selectteacher.level_id">{{selectteacher.level_name}}</option>

               </select>
               <has-error :form="form" field="lev_id"></has-error>
        </div>

        <div class="form-group">
             <label for="exampleFormControlSelect1">Select Teacher</label>
               <select  v-model="form.tec_id" class="form-control" id="exampleFormControlSelect1" name="tec_id" :class="{ 'is-invalid': form.errors.has('tec_id') }" style="" required>
                 <option value="" disabled>Select</option>

                 <option style="color:green;font-weight:bold;" v-for="selectteacher in allmyteacher" :value="selectteacher.teacher_id">{{selectteacher.teacher_name}}</option>

               </select>
               <has-error :form="form" field="tec_id"></has-error>
        </div>




        <div class="form-group">
        <label>Course Total Class</label>
        <input v-model="form.course_class_number" type="number" name="course_class_number"
        class="form-control" :class="{ 'is-invalid': form.errors.has('course_class_number') }" placeholder="Enter Course Total Class">
        <has-error :form="form" field="course_class_number"></has-error>
        </div>








<!--

        <div class="form-group">

                <label for="exampleFormControlSelect1">Group</label>
               <select  v-model="form.crouse_group" class="form-control" id="exampleFormControlSelect1" name="crouse_group" :class="{ 'is-invalid': form.errors.has('crouse_group') }" style="" required>
                 <option value="" disabled>Select</option>
                 <option value="A">A</option>
                 <option value="B">B</option>
               </select>
               <has-error :form="form" field="crouse_group"></has-error>
        </div>

--->
        <div class="form-group">
               <label for="exampleFormControlSelect1">Course Type</label>
               <select  v-model="form.course_type" class="form-control" id="exampleFormControlSelect1" name="course_type" :class="{ 'is-invalid': form.errors.has('course_type') }" style="" required>
                 <option value="" disabled>Select</option>
                 <option value="Theory">Theory</option>
                 <option value="Sessional">Sessional</option>
                  <!-- <option value="Sessional">Thesis Theory</option>
                  <option value="Sessional">Thesis </option> -->


                  <option value="Option-I-Thesis">Option-I-Thesis</option>
                  <option value="Option-II-Thesis">Option-II-Thesis</option>

                  <option value="Option-I-Thesis-Sessional">Option-I-Thesis-Sessional</option>
                  <option value="Option-II-Thesis-Sessional">Option-II-Thesis-Sessional</option>


                 <!-- <option value="Option-I-Thesis">Option-I-Thesis</option>
                 <option value="Option-II-Thesis">Option-II-Thesis</option>
                 <option value="Option-III-Thesis">Option-III-Thesis</option>
                 <option value="Option-IV-Thesis">Option-IV-Thesis</option>
                 <option value="Option-II-Thesis-Sessional">Option-II-Thesis-Sessional</option>
                 <option value="Option-III-Thesis-Sessional">Option-III-Thesis-Sessional</option>
                 <option value="Option-IV-Thesis-Sessional">Option-IV-Thesis-Sessional</option>
 -->


               </select>
               <has-error :form="form" field="course_type"></has-error>
        </div>



<!--
        <div class="form-group">
               <label for="exampleFormControlSelect1">Cc</label>
               <select  v-model="form.course_type" class="form-control" id="exampleFormControlSelect1" name="course_type" :class="{ 'is-invalid': form.errors.has('course_type') }" style="" required>
                 <option value="" disabled>Select</option>
                 <option value="Theory">Theory</option>
                 <option value="Sessional">Sessional</option>
                 <option value="Sessional">Thesis</option>
               </select>
               <has-error :form="form" field="course_type"></has-error>
        </div> -->












        <div class="form-group">
        <label>Course Creadit</label>
        <input v-model="form.course_credit" type="text" name="course_credit"
        class="form-control" :class="{ 'is-invalid': form.errors.has('course_credit') }" placeholder="Enater Course Creadit EXAMPLE 1.50">
        <has-error :form="form" field="course_credit"></has-error>
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
    <th style="text-align:center;">Sl</th>
    <th style="text-align:center;">Course Code</th>
    <th style="text-align:center;"> Type</th>
    <th style="text-align:center;">Credit</th>
    <th style="text-align:center;">Class Room</th>
    <th style="text-align:center;">Department</th>
    <th style="text-align:center;">Level</th>
    <th style="text-align:center;">Course Teacher</th>
    <th style="text-align:center;">Total Class</th>
    <th style="text-align:center;">Action</th>
</tr>




</thead>



<tbody>

 <tr v-for="(v_department,index) in getcourse">


    <!-- <td style="text-align:center;padding-top:30px">{{v_department.course_id}}</td> -->
        <td style="text-align:center;padding-top:25px">{{index+1}}</td>
    <td style="text-align:center;padding-top:25px;color:blue;">{{v_department.course_code}}</td>
    <td style="text-align:center;padding-top:25px;color:blue;">{{v_department.course_type}}</td>
    <td style="text-align:center;padding-top:25px;">{{v_department.course_credit}}</td>

        <td style="text-align:center;padding-top:25px;">{{v_department.classroom_name}}</td>

    <td style="text-align:center;padding-top:25px;color:blue;">{{v_department.department_name}}</td>
    <td style="text-align:center;padding-top:25px;">{{v_department.level_name}}</td>
    <td style="text-align:center;padding-top:25px;color:blue;">{{v_department.teacher_name}}</td>

    <td style="text-align:center;padding-top:25px;">{{v_department.course_class_number}}</td>



  <td>

     <center>

<router-link :to="`/view_course/${v_department.course_id}`" class="btn btn-primary btn-sm" style="margin-top:17px;"><i class="fa fa-eye" aria-hidden="true"></i></router-link>

<a class="btn btn-warning btn-sm" style="margin-top:17px;" @click.prevent = "deletecourse(v_department.course_id)"><i class="fa fa-trash" aria-hidden="true"></i></a>


<router-link :to="`/edit_course/${v_department.course_id}`" class="btn btn-success btn-sm" style="margin-top:17px;" ><i class="fa fa-edit" aria-hidden="true"></i></router-link>


<!-- <router-link :to="`/delete_course/${v_department.course_id}`" class="btn btn-primary btn-sm" style="margin-top:17px;"><i class="fa fa-trash" aria-hidden="true"></i></router-link> -->
<!-- <router-link :to="`/edit_course/${v_department.course_id}`" class="btn btn-success btn-sm" style="margin-top:17px;" ><i class="fa fa-edit" aria-hidden="true"></i></router-link>
<router-link :to="`/view_course/${v_department.course_id}`" class="btn btn-primary btn-sm" style="margin-top:17px;"><i class="fa fa-eye" aria-hidden="true"></i></router-link>
<a class="btn btn-warning btn-sm" style="margin-top:17px;" @click.prevent = "deletecourse(v_department.course_id)"><i class="fa fa-trash" aria-hidden="true"></i></a>
 -->

<!-- <router-link :to="`/all_course_attentdance/${v_department.course_id}`" class="btn btn-info btn-sm" style="margin-top:17px;" ><i class="fa fa-id-card" aria-hidden="true" style="color:white;"></i></router-link> -->

<router-link :to="`/add_course_attentdance/${v_department.course_id}`" class="btn btn-danger btn-sm" style="margin-top:17px;" ><i class="fas fa-users" style="color:white;"></i></router-link>
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


          allmydepartment:{},
          allmylevel:{},
          allmyteacher:{},

          showallcourse:{},
          allclassroom:{},

        //  showallsemester:{},

          // Create a new form instance
          form: new Form({

                course_id: '',
             	  lev_id: '',
             	  dept_id: '',
                tec_id:'',
                course_type:'',
                course_code:'',
                course_credit:'',
               // crouse_group :'',
                course_title:'',
                course_class_number:'',
                course_added_date:'',
                course_added_status:'',
                cls_room_id:'',
                // course_code:'',
                //cat_status: '',


          })
        }
      },


      components: {
         MyBackendsidebar,
         Mybackendheader,
         Mybackendfooter,
       },


    methods:{

      //showalldepartmentinform
      myallcourse(){


     axios.get('/show_all_course').then(({data}) => (this.showallcourse = data));


   },



   showalllevelincourse(){

axios.get('/show_all_level_in_add_course_form').then(({data}) => (this.allmylevel = data));

   },

   showalltecheruncourse(){

axios.get('/show_all_teacher_in_add_course_form').then(({data}) => (this.allmyteacher = data));

   },



   showalldepartmentincourse(){

axios.get('/show_all_department_in_add_course_form').then(({data}) => (this.allmydepartment = data));

   },



      showallclassroomincourse(){

   axios.get('/show_all_classroom_in_add_course_form').then(({data}) => (this.allclassroom = data));

      },



    addcourse(){
    this.form.post('/add_course_formaction')


   .then((response)=>{


  //  console.log(response.data)

     $('#exampleModal').modal('hide')

          this.form.reset();

             this.$store.dispatch("allCourse")

     if(response.data==0){

        // Swal.fire({
        //
        //      icon: 'error',
        //      title: 'Oops...',
        //      text: 'Sorry This Course Allready Exist !!',
        //
        //      })

             Toast.fire({
             icon: 'error',
             title: 'Sorry This Course Allready Exist !!'

              })






           }else if(response.data==1){

            Toast.fire({
            icon: 'success',
            title: 'Course Added Successfully'

             })

           }else{

            console.log(response.data)

           }













         })
         .catch(()=>{
         console.log('oppp fail');
         })

         },

       //show all category in add category form
        // displayalldepartment(){
        // //this.$store.dispatch("allCategory")
        // axios.get('/show_all_department').then(({data}) => (this.showalldepartment = data));
        //
        //  },

      //active category off

    //   activedepartmentoff(department_id){
    //
    //   axios.get('/active_department_unactive/'+department_id)
    //   .then((response)=>{
    //     Toast.fire({
    //     icon: 'success',
    //     title: 'Department Unactive Successfully'
    //    })
    //
    // //  this.$store.dispatch("allCategory",this.currentPage)
    //       // this.displayalldepartment();
    //         this.myallsemester();
    //
    //
    //
    //    })
    //
    //    },

    //unactive category on
      // activedepartmenton(department_id){
      //
      //   axios.get('/unactive_department_active/'+department_id)
      //   .then((response)=>{
      //
      //     Toast.fire({
      //     icon: 'success',
      //     title: 'Department Active Successfully'
      //    })
      //
      //     // this.displayalldepartment();
      //         this.myallsemester();
      //
      //
      //    })
      //
      //  },



//delete category

deletecourse(course_id){
  axios.get('/delete_course/'+course_id)
  .then((response)=>{


    Toast.fire({
    icon: 'success',
    title: 'Course delate Successfully'
     })

    // this.displayalldepartment();
    //this.myallcourse();

       this.$store.dispatch("allCourse")


      })
   .catch(()=>{
   console.log('fail');

    })

},



},


computed:{

getcourse(){

return this.$store.getters.getallCourse
}

},




        mounted() {

        //  this.displayalldepartment();
            this.myallcourse();
            this.showalldepartmentincourse();
            this.showalllevelincourse();

            this.showalltecheruncourse();
            this.showallclassroomincourse();

               this.$store.dispatch("allCourse")
          //  this.myallsemester();

        //  this.showallteacherinform();



        }
    }
</script>
