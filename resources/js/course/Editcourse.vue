<template>
    <div>


      <Mybackendheader></Mybackendheader>

      <MyBackendsidebar></MyBackendsidebar>

 <div class="card card-primary" style="width:550px;margin-top:25px;margin-left:40px;margin-bottom:500px;width:84%;margin-left:16%">


<!-- {{this.$route.params.id}} -->
<div class="card-header">
  <h3 class="card-title">Course Edit</h3>

</div>

<form enctype="multipart/form-data" role="form" @submit.prevent = "updatecourse()">

<div class="card-body">

  <div class="form-group">
  <label>Course Edit</label>
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
       <label for="exampleFormControlSelect1">Select Level</label>
         <select  v-model="form.lev_id" class="form-control" id="exampleFormControlSelect1" name="lev_id" :class="{ 'is-invalid': form.errors.has('lev_id') }" style="" required>
           <option value="" disabled>Select</option>

           <option style="color:green;font-weight:bold;" v-for="selectteacher in allmylevel" :value="selectteacher.level_id">{{selectteacher.level_name}}</option>

         </select>
         <has-error :form="form" field="lev_id"></has-error>
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
  <label>Course Total Class</label>
  <input v-model="form.course_class_number" type="number" name="course_class_number"
  class="form-control" :class="{ 'is-invalid': form.errors.has('course_class_number') }" placeholder="Enter Course Total Class">
  <has-error :form="form" field="course_class_number"></has-error>
  </div>


  <div class="form-group">
       <label for="exampleFormControlSelect1">Select Teacher</label>
         <select  v-model="form.tec_id" class="form-control" id="exampleFormControlSelect1" name="tec_id" :class="{ 'is-invalid': form.errors.has('tec_id') }" style="" required>
           <option value="" disabled>Select</option>

           <option style="color:green;font-weight:bold;" v-for="selectteacher in allmyteacher" :value="selectteacher.teacher_id">{{selectteacher.teacher_name}}</option>

         </select>
         <has-error :form="form" field="tec_id"></has-error>
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


  <div class="form-group">
         <label for="exampleFormControlSelect1">Course Type</label>
         <select  v-model="form.course_type" class="form-control" id="exampleFormControlSelect1" name="course_type" :class="{ 'is-invalid': form.errors.has('course_type') }" style="" required>
           <option value="" disabled>Select</option>
           <option value="Theory">Theory</option>
           <option value="Sessional">Sessional</option>
         </select>
         <has-error :form="form" field="course_type"></has-error>
  </div> -->


  <div class="form-group">
         <label for="exampleFormControlSelect1">Course Type</label>
         <select  v-model="form.course_type" class="form-control" id="exampleFormControlSelect1" name="course_type" :class="{ 'is-invalid': form.errors.has('course_type') }" style="" required>
           <option value="" disabled>Select</option>
           <option value="Theory">Theory</option>
           <option value="Sessional">Sessional</option>

           <option value="Option-I-Thesis">Option-I-Thesis</option>
           <option value="Option-II-Thesis">Option-II-Thesis</option>

           <option value="Option-I-Thesis-Sessional">Option-I-Thesis-Sessional</option>
           <option value="Option-II-Thesis-Sessional">Option-II-Thesis-Sessional</option>




         </select>
         <has-error :form="form" field="course_type"></has-error>
  </div>



  <div class="form-group">
  <label>Course Creadit</label>
  <input v-model="form.course_credit" type="text" name="course_credit"
  class="form-control" :class="{ 'is-invalid': form.errors.has('course_credit') }" placeholder="Enater Course Creadit lIKE As = 1.50">
  <has-error :form="form" field="course_credit"></has-error>
  </div>


        <div class="form-group">
        <label>Added Date</label>
        <input v-model="form.course_added_date" type="text" name="course_added_date"
        class="form-control" :class="{ 'is-invalid': form.errors.has('course_added_date') }" placeholder="Formate 07-02-2021">
        <has-error :form="form" field="course_added_date"></has-error>
        </div>




















      <button type="submit" class="btn btn-primary">Update</button>

</div>

</form>


</div>





 <Mybackendfooter></Mybackendfooter>

    </div>
</template>

<script>


import Mybackendheader from "../backendlayout/Adminheader.vue"
import MyBackendsidebar from "../backendlayout/Adminsidebar.vue"
import Mybackendfooter from "../backendlayout/Adminfooter.vue"
    export default {


      data () {
        return {


          allmydepartment:{},
          allmylevel:{},
          allmyteacher:{},

      //    showallcourse:{},
          allclassroom:{},



          // Create a new form instance
          form: new Form({


            course_id: '',
            lev_id: '',
            dept_id: '',
            tec_id:'',
            course_type:'',
            course_code:'',
            course_class_number:'',
            course_credit:'',
           // crouse_group :'',
            course_title:'',
            cls_room_id:'',
            course_added_date:'',
            course_added_status:'',



          })
        }
      },



      components: {
         MyBackendsidebar,
         Mybackendheader,
         Mybackendfooter,
       },



methods:{





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




    //update category
     updatecourse(){

     this.form.post('/update_course/'+this.$route.params.course_id)
        .then((response)=>{
         this.$router.push('/add_course')

          Toast.fire({
          icon: 'success',
          title: 'Course Update Successfully'
          })



          //  console.log(response.data);

          })
          .catch(()=>{

            console.log('error');

          })



    },


// placeholder(){
//
// axios.get('/edit_productplaceholder_value/'+this.$route.params.id).then(({data}) => (this.place = data));
//
// },






},




        mounted() {



          this.showalldepartmentincourse();
          this.showalllevelincourse();

          this.showalltecheruncourse();
          this.showallclassroomincourse();



        axios.get('/edit_courseplaceholder_value/'+this.$route.params.course_id)
        .then((response)=>{

        this.form.fill(response.data)

        })


        },



    }
</script>
