<template>
    <div>


      <Mybackendheader></Mybackendheader>

      <MyBackendsidebar></MyBackendsidebar>

 <div class="card card-primary" style="width:550px;margin-top:25px;margin-left:40px;margin-bottom:300px;width:80%;margin-left:270px">


<!-- {{this.$route.params.id}} -->
<div class="card-header">
  <h3 class="card-title">Edit Libarybook</h3>

</div>

<form enctype="multipart/form-data" role="form" @submit.prevent = "updatelibarybook()">

<div class="card-body">




                <div class="form-group">
                <label>Book Name</label>
                <input v-model="form.libary_book_name" type="text" name="libary_book_name"
                class="form-control" :class="{ 'is-invalid': form.errors.has('libary_book_name') }" placeholder="Enter Book Name">
                <has-error :form="form" field="libary_book_name"></has-error>
                </div>


                <div class="form-group">
                     <label for="exampleFormControlSelect1">Select Department</label>
                       <select  v-model="form.libary_book_department_id" class="form-control" id="exampleFormControlSelect1" name="libary_book_department_id" :class="{ 'is-invalid': form.errors.has('libary_book_department_id') }" style="" required>
                         <option value="" disabled>Select</option>

                         <option style="color:green;font-weight:bold;" v-for="selectdept in alldepartment" :value="selectdept.department_id">{{selectdept.department_name }}</option>

                       </select>
                       <has-error :form="form" field="libary_book_department_id"></has-error>
                </div>




                <div class="form-group">
                     <label for="exampleFormControlSelect1">Select Level</label>
                       <select  v-model="form.libary_book_level_id" class="form-control" id="exampleFormControlSelect1" name="libary_book_level_id" :class="{ 'is-invalid': form.errors.has('libary_book_level_id') }" style="" required>
                         <option value="" disabled>Select</option>

                         <option style="color:green;font-weight:bold;" v-for="selectdept in alllevel" :value="selectdept.level_id">{{selectdept.level_name}}</option>

                       </select>
                       <has-error :form="form" field="libary_book_level_id"></has-error>
                </div>






                <div class="form-group">
                <label for="exampleInputFile">Book Image</label>
                <div class="ass" style="margin-bottom:10px;">
                <!-- <img :src="`images/${form.product_image}`" alt="" style="height:70px;width:70px;"> -->
                <img :src="updateimage()" alt="" style="height:70px;width:70px;">
                </div>

                <div class="input-group">
                <div class="custom-file">
                <input @change="changephoto($event)" type="file" class="custom-file-input" id="exampleInputFile" name="libary_book_image" :class="{ 'is-invalid': form.errors.has('libary_book_image') }">
                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                <has-error :form="form" field="libary_book_image"></has-error>
                </div>
                </div>
                </div>



                <div class="form-group">
                <label>Book Quantity</label>
                <input v-model="form.libary_book_qty" type="number" name="libary_book_qty"
                class="form-control" :class="{ 'is-invalid': form.errors.has('libary_book_qty') }" placeholder="Enter Book Quntity">
                <has-error :form="form" field="libary_book_qty"></has-error>
                </div>







  <div class="form-group">
  <label>Libary Book Added Date</label>
  <input v-model="form.libary_book_added_date" type="text" name="libary_book_added_date"
  class="form-control" :class="{ 'is-invalid': form.errors.has('libary_book_added_date') }" placeholder=" Date = 07-02-2021" required>
  <has-error :form="form" field="libary_book_added_date"></has-error>
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


            libary_book_id: '',
            libary_book_name: '',
            libary_book_department_id: '',
            libary_book_level_id:'',
            libary_book_qty:'',
            libary_book_image:'',
            libary_book_added_date:''




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
       this.form.libary_book_image  = event.target.result
       console.log(event.target.result)
       };
       reader.readAsDataURL(file);

       },


       updateimage(){

        let img = this.form.libary_book_image;
        if(img.length>100){

           return  this.form.libary_book_image

        }else {


           return "/images/"+this.form.libary_book_image

        }

     },







    //update category
     updatelibarybook(){

     this.form.post('/update_libary_book/'+this.$route.params.libary_book_id)
        .then((response)=>{
         this.$router.push('/add_libary_book')

          Toast.fire({
          icon: 'success',
          title: 'Libary Book Update Successfully'
          })

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


        axios.get('/edit_libarybook_value/'+this.$route.params.libary_book_id)
        .then((response)=>{

        this.form.fill(response.data)

        })



        },



    }
</script>
