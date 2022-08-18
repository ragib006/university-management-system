
<template>
    <div>

    <Mybackendheader></Mybackendheader>

    <MyBackendsidebar></MyBackendsidebar>


        <section class="content" style="margin-top:20px;margin-bottom:400px;width:80%;margin-left:270px">
          <div class="container-fluid">
             <div class="row">
               <div class="col-12">




        <div class="card" style="padding-bottom:20px;">
        <div class="card-header">
        <div class="main">
                 <div class="title" style="width:1000px;float:left">
                   <h3 class="card-title">All Libary Book</h3>
                 </div>

        <div class="but">
               <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Add Libary Book
               </button>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
                      <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel" style="color:green">Add Libary Book</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                      </button>
                      </div>
        <div class="modal-body">

        <form enctype="multipart/form-data" role="form" @submit.prevent = "addlibarybook()">




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
              <img :src="form.libary_book_image" alt="" style="height:70px;width:70px;">
              </div>

              <div class="input-group">
              <div class="custom-file">
              <input @change="changephoto($event)" type="file" class="custom-file-input" id="exampleInputFile" name="libary_book_image" :class="{ 'is-invalid': form.errors.has('libary_book_image') }" required>
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







              <!-- <div class="form-group">
              <label>Book Name</label>
              <input v-model="form.libary_book_added_date" type="date" name="libary_book_added_date"
              class="form-control" :class="{ 'is-invalid': form.errors.has('libary_book_added_date') }" placeholder="Enter Book Name">
              <has-error :form="form" field="libary_book_added_date"></has-error>
              </div>
 -->










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



         <div class="input-group input-group-sm" style="width:20%;padding-bottom:20px;float:right;">
           <input class="form-control form-control-navbar" type="search" @keyup="RealSerchstudent" v-model="keyword" placeholder="Search" aria-label="Search">
           <div class="input-group-append">
             <button @click.prevent="RealSerchstudent" class="btn btn-navbar" style="color:green">
               <i class="fas fa-search"></i>
             </button>
           </div>
         </div>

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
          <th style="text-align:center;">Sl</th>
          <th style="text-align:center;">Book Id</th>
          <th style="text-align:center;">Book Name</th>
          <th style="text-align:center;">Book Department</th>
          <th style="text-align:center;">Book Level</th>

          <th style="text-align:center;">Book Image</th>
          <th style="text-align:center;">Book Quantity</th>
          <th style="text-align:center;">Book Added Date</th>
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

       <tr v-for="(v_show,index) in getallLibryBook">

   <!-- <tr> -->

           <td style="text-align:center;padding-top:30px;">{{index+1}}</td>
            <td style="text-align:center;padding-top:30px;">{{v_show.libary_book_id}}</td>
           <td style="text-align:center;padding-top:30px;">{{v_show.libary_book_name}}</td>
           <td style="text-align:center;padding-top:30px;">{{v_show.department_name}}</td>
           <td style="text-align:center;padding-top:30px;">{{v_show.level_name}}</td>
           <td style="text-align:center"><img :src="ourimage(v_show.libary_book_image)" alt="" style="height:70px;width:70px;"></td>
           <td style="text-align:center;padding-top:30px;">{{v_show.libary_book_qty}}</td>
           <td style="text-align:center;padding-top:30px;">{{v_show.libary_book_added_date}}</td>
           <!-- <td style="text-align:center;padding-top:30px;">ertet</td>
           <td style="text-align:center;padding-top:30px;">ertet</td> -->


          </td>



           <td>

           <center>




             <router-link :to="`/edit_libary_book/${v_show.libary_book_id}`" class="btn btn-success btn-sm" style="margin-top:17px;" ><i class="fa fa-edit" aria-hidden="true"></i></router-link>
             <router-link :to="`/add_syudent_take_libary_book/${v_show.libary_book_id}`" class="btn btn-primary btn-sm" style="margin-top:17px;" ><i class="fas fa-plus" aria-hidden="true" style="color:white;"></i></router-link>
             <a class="btn btn-warning btn-sm" style="margin-top:17px;" @click.prevent = "deletelibarybook(v_show.libary_book_id)"><i class="fa fa-trash" aria-hidden="true"></i></a>

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
          // allhallroom:{},
          // allbus:{},
          // allbatch:{},
           keyword:'',

         //showmyallteachers:{},



          // Create a new form instance
          form: new Form({

                 	libary_book_id: '',
             	   	libary_book_name: '',
             	    libary_book_department_id: '',
                  libary_book_level_id:'',
                 	libary_book_qty:'',
                  libary_book_image:'',
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






// RealSerchstudent(){
//
//
//
//
// this.$store.dispatch('Searchlibarybook',this.keyword);
//
//
// },
//search category
RealSerchstudent:_.debounce(function(){

this.$store.dispatch('Searchlibarybook',this.keyword);

},1000),


deletelibarybook(libary_book_id){
  axios.get('/delate_libary_book/'+libary_book_id)
  .then((response)=>{



  //  console.log(response.data)


    Toast.fire({
    icon: 'success',
    title: 'Libary Book delate Successfully'
     })


    this.$store.dispatch("allLibarybookshow");


      })
   .catch(()=>{
   console.log('fail');

    })


},


//
// showallteacher(){
//
// axios.get('/show_my_all_teacher').then(({data}) => (this.showmyallteachers = data));
//
//
// },


showalllevelinstudentform(){

axios.get('/show_all_level_student_form').then(({data}) => (this.alllevel = data));


},



     showalldepartmentinform(){


    axios.get('/show_all_department_in_addstudent_form').then(({data}) => (this.alldepartment = data));


  },


  deletelibarybook(libary_book_id){
    axios.get('/delate_libary_book/'+libary_book_id)
    .then((response)=>{

      Toast.fire({
      icon: 'success',
      title: 'Libary Book delate Successfully'
       })

        //this.showallteacher();
      //  this.$store.dispatch("allStudent")
          this.$store.dispatch("allLibarybookshow");

        })
     .catch(()=>{
     console.log('fail');

      })

  },






      ourimage(img){

              return "/images/"+img;

          },

//change photo
      changephoto(event){

           let file = event.target.files[0];
           let reader = new FileReader();
           reader.onload = event => {
           this.form.libary_book_image = event.target.result
           console.log(event.target.result)
           };
           reader.readAsDataURL(file);

           },



       //add category
       addlibarybook(){

        this.form.post('/add_libarybook_formaction')
        .then((response)=>{



             //console.log(response.data)

           $('#exampleModal').modal('hide')
            this.form.reset();

              //    this.$store.dispatch("allStudent")
              this.$store.dispatch("allLibarybookshow");
               //
               //
              if(response.data==0){

                   Toast.fire({

                      icon: 'error',
                      title: 'Sorry This Book aLready Exist !!'

                      })

                      }else{

                      Toast.fire({
                      icon: 'success',
                      title: 'Libary Book Added Succesfully'

                       })
                   }

              })
           .catch(()=>{
           console.log('fail');
           })

           },


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

getallLibryBook(){

return this.$store.getters.getLibarybook
}


},




        mounted() {

          this.showalldepartmentinform();
          this.showalllevelinstudentform();
          this.RealSerchstudent();
          this.$store.dispatch("allLibarybookshow");

        }
    }
</script>
