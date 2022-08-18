<template>
    <div>

      <Mybackendheader></Mybackendheader>

      <MyBackendsidebar></MyBackendsidebar>


 <div class="card card-primary" style="width:550px;margin-top:25px;margin-left:40px;margin-bottom:300px;">


<!-- {{this.$route.params.id}} -->
<div class="card-header">
  <h3 class="card-title">Examination Edit</h3>

</div>

<form enctype="multipart/form-data" role="form" @submit.prevent = "updatestudent()">

<div class="card-body">



                <div class="form-group">
              <label>Examination Name</label>
              <input v-model="form.exm_name" type="text" name="exm_name"
              class="form-control" :class="{ 'is-invalid': form.errors.has('exm_name') }" placeholder="Enter Examination Name">
              <has-error :form="form" field="exm_name"></has-error>
              </div>


              <div class="form-group">
                   <label for="exampleFormControlSelect1">Select Department</label>
                     <select  v-model="form.exm_dep_id" class="form-control" id="exampleFormControlSelect1" name="exm_dep_id" :class="{ 'is-invalid': form.errors.has('exm_dep_id') }" style="" required>
                       <option value="" disabled>Select</option>

                       <option style="color:green;font-weight:bold;" v-for="selectdept in alldepartment" :value="selectdept.department_id">{{selectdept.department_name }}</option>

                     </select>
                     <has-error :form="form" field="exm_dep_id"></has-error>
              </div>

    



              <div class="form-group">
                   <label for="exampleFormControlSelect1">Select Level</label>
                     <select  v-model="form.exm_level_id" class="form-control" id="exampleFormControlSelect1" name="exm_level_id" :class="{ 'is-invalid': form.errors.has('exm_level_id') }" style="" required>
                       <option value="" disabled>Select</option>

                       <option style="color:green;font-weight:bold;" v-for="selectdept in alllevel" :value="selectdept.level_id">{{selectdept.level_name}}</option>

                     </select>
                     <has-error :form="form" field="exm_level_id"></has-error>
              </div>



        

            

      




                <div class="form-group">
                <label>Exam Date</label>
                <input v-model="form.exam_date" type="text" name="exam_date"
                class="form-control" :class="{ 'is-invalid': form.errors.has('exam_date') }" placeholder="07-07-2022">
                <has-error :form="form" field="exam_date"></has-error>
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

                    exm_id:'',
                exm_name:'',
                exm_dep_id:'',
                exm_level_id:'',
                exam_date:'',


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







 changephoto(event){

      let file = event.target.files[0];
      let reader = new FileReader();
      reader.onload = event => {
      this.form.student_image  = event.target.result
      console.log(event.target.result)
      };
      reader.readAsDataURL(file);

      },


      updateimage(){

       let img = this.form.student_image;
       if(img.length>100){

          return  this.form.student_image

       }else {


          return "/images/"+this.form.student_image

       }

    },

    //update category
     updatestudent(){

     this.form.post('/update_examination/'+this.$route.params.exm_id)
        .then((response)=>{
         this.$router.push('/add_examination')

          Toast.fire({
          icon: 'success',
          title: 'Examination Update Successfully'
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

// hiragib(){
//
//
//   console.log('ragibbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb')
//
// }




},




        mounted() {


        this.showalldepartmentinform();
        this.showalllevelinstudentform();
    
        // this.RealSerchstudent();
        // this.hiragib();



        axios.get('/edit_examinationplaceholder_value/'+this.$route.params.exm_id)
        .then((response)=>{

        this.form.fill(response.data)

        })



        },



    }
</script>
