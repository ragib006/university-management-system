<template>
    <div>


      <Mybackendheader></Mybackendheader>

      <MyBackendsidebar></MyBackendsidebar>

 <div class="card card-primary" style="width:550px;margin-top:25px;margin-left:40px;margin-bottom:300px;width:80%;margin-left:270px">


<!-- {{this.$route.params.id}} -->
<div class="card-header">
  <h3 class="card-title">Edit Student Take Libary Book</h3>

</div>

<form enctype="multipart/form-data" role="form" @submit.prevent = "updatelibarybook()">

<div class="card-body">





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

          alldepartment:{},

          alllevel:{},

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




          })
        }
      },


      components: {
         MyBackendsidebar,
         Mybackendheader,
         Mybackendfooter,
       },



methods:{


  showalllevelinstudentform(){

  axios.get('/show_all_level_student_form').then(({data}) => (this.alllevel = data));


  },



       showalldepartmentinform(){


      axios.get('/show_all_department_in_addstudent_form').then(({data}) => (this.alldepartment = data));


    },









  // changephoto(event){
  //
  //      let file = event.target.files[0];
  //      let reader = new FileReader();
  //      reader.onload = event => {
  //      this.form.libary_book_image  = event.target.result
  //      console.log(event.target.result)
  //      };
  //      reader.readAsDataURL(file);
  //
  //      },
  //
  //
  //      updateimage(){
  //
  //       let img = this.form.libary_book_image;
  //       if(img.length>100){
  //
  //          return  this.form.libary_book_image
  //
  //       }else {
  //
  //
  //          return "/images/"+this.form.libary_book_image
  //
  //       }
  //
  //    },







    //update category
     updatelibarybook(){

     this.form.post('/update_student_take_libary_book/'+this.$route.params.studenttake_libary_book_id)
        .then((response)=>{

          if(response.data==1){


            this.$router.push('/add_libary_book')

             Toast.fire({
             icon: 'success',
             title: 'Student Take Libary Book Update Successfully'
             })



          }else{


            Toast.fire({
            icon: 'error',
            title: 'Student Information Not Right'
            })




          }



          })
          .catch(()=>{

            console.log('error');

          })



    },







},




        mounted(){

          this.showalldepartmentinform();
          this.showalllevelinstudentform();



        //  this.showalltecheruncourse();
        //  this.showalldepartmentincourse();
        //  this.showallclassroominlevel();


        axios.get('/edit_studenttke_libarybook_placeholdervalue/'+this.$route.params.studenttake_libary_book_id)
        .then((response)=>{

        this.form.fill(response.data)

        })



        },



    }
</script>
