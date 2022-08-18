
<template>
    <div>



            <Mybackendheader></Mybackendheader>

            <MyBackendsidebar></MyBackendsidebar>

        <section class="content" style="margin-top:20px; margin-bottom:500px;width:84%;margin-left:18%">
          <div class="container-fluid">
             <div class="row">
               <div class="col-12">




        <div class="card" style="padding-bottom:20px;">
        <div class="card-header">
        <div class="main">
                 <div class="title" style="width:1000px;float:left">
                   <h3 class="card-title">All Examination</h3>
                 </div>

        <div class="but">
               <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Add Examination
               </button>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
                      <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel" style="color:green">Add Examination</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                      </button>
                      </div>
        <div class="modal-body">

        <form enctype="multipart/form-data" role="form" @submit.prevent = "addstudent()">





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


<!---
         <div class="input-group input-group-sm" style="width:20%;padding-bottom:20px;float:right;">
           <input class="form-control form-control-navbar" type="search" @keyup="RealSerchstudent" v-model="keyword" placeholder="Search" aria-label="Search">
           <div class="input-group-append">
             <button @click.prevent="RealSerchstudent" class="btn btn-navbar" style="color:green">
               <i class="fas fa-search"></i>
             </button>
           </div>
         </div>

-->
       <table id="section" class="table table-bordered table-striped">




       <thead>




       <tr>
          <th style="text-align:center;">Sl</th>

                    <th style="text-align:center;">Exam Id</th>
          
        
          <th style="text-align:center;">Exam Name</th>
          <th style="text-align:center;">Level</th>
          <th style="text-align:center;width:50px;">Department</th>
          <th style="text-align:center;width:50px;">Date</th>

             <th style="text-align:center;">Action</th>
          <th style="text-align:center;">ON/OFF</th>
          <th style="text-align:center;width:400px;">Action</th>
      </tr>
      </tr>




      </thead>

      <tbody>



  

       <tr v-for="(v_showteacher,index) in allexamination">

           <td style="text-align:center;padding-top:30px;">{{index+1}}</td>

               <td style="text-align:center;padding-top:30px;">{{v_showteacher.exm_id}}</td>

           <td style="text-align:center;padding-top:30px;">{{v_showteacher.exm_name}}</td>
           <td style="text-align:center;padding-top:30px;">{{v_showteacher.department_name}}</td>

           <td style="text-align:center;padding-top:30px;width:90px">{{v_showteacher.level_name}}</td>
           <td style="text-align:center;padding-top:30px;width:110px">{{v_showteacher.exam_date}}</td>

                     <td>

          <div v-if="v_showteacher.exam_status == 1">
           <p style="text-align:center;color:blue;padding-top:18px">Active</p>
          </div>
          <div v-else="v_showteacher.exam_status == 0">
           <p style="text-align:center;color:red;padding-top:18px">Unactive</p>
          </div>


          </td>

          <td style="">
         <center>
          <div v-if="v_showteacher.exam_status == 1">
          <a class="btn btn-primary btn-sm" style="margin-top:17px;color:white;" @click.prevent = "activeexamoff(v_showteacher.exm_id)" >OFF</a>
          </div>

          <div v-else="v_showteacher.exam_status == 0">
          <a class="btn btn-success btn-sm" style="margin-top:17px;color:white;" @click.prevent = "unactiveexamon(v_showteacher.exm_id)" >ON</a>
          </div>
        </center>



        </td>
          
           




        </td>

           <td>



           <center>

            
<router-link :to="`/edit_examination/${v_showteacher.exm_id}`" class="btn btn-success btn-sm" style="margin-top:17px;" ><i class="fa fa-edit" aria-hidden="true" style="color:white;"></i></router-link>



            <a class="btn btn-warning btn-sm" style="margin-top:17px;" @click.prevent = "deleteexam(v_showteacher.exm_id)"><i class="fa fa-trash" aria-hidden="true"></i></a>
      
              
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
          allexamination:{},
        //  allhallroom:{},
        //  allbus:{},
         // allbatch:{},
         // keyword:'',

         //showmyallteachers:{},



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









           activeexamoff(exm_id){

      axios.get('/active_exam_unactive/'+exm_id)
      .then((response)=>{
        Toast.fire({
        icon: 'success',
        title: 'Exam Unactive Successfully'
       })

        //  this.showallteacher();
          //  this.$store.dispatch("allStudent")


                this.showallexamination();


       })

       },

    //unactive category on
      unactiveexamon(exm_id){

        axios.get('/unactive_exam_active/'+exm_id)
        .then((response)=>{




             if(response.data==2){

                  Swal.fire({

                       icon: 'error',
                       title: 'Oops...',
                       text: 'Already Same Department and Same Level Exam Is Active, You Unactive This Then Try',

                       })

                     }else if(response.data==1){


                        this.showallexamination();

                      Toast.fire({
                      icon: 'success',
                      title: 'Exam Active Successfully'

                       })

                     }
                     else{

                      console.log(response.data)

                     }





           //this.showallteacher();

              



         })

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

//change photo
      changephoto(event){

           let file = event.target.files[0];
           let reader = new FileReader();
           reader.onload = event => {
           this.form.student_image = event.target.result
           console.log(event.target.result)
           };
           reader.readAsDataURL(file);

           },


        showallexamination(){


     axios.get('/show_all_examination').then(({data}) => (this.allexamination = data));


   },




       //add category
       addstudent(){

        this.form.post('/add_examination')
        .then((response)=>{

        //  console.log(response.data)


          $('#exampleModal').modal('hide')

               this.form.reset();

                //  this.$store.dispatch("allStudent")

                this.showallexamination();


               if(response.data==0){

                  Swal.fire({

                       icon: 'error',
                       title: 'Oops...',
                       text: 'Sorry This Exam Allready Exist !!',

                       })

                     }else if(response.data==1){

                      Toast.fire({
                      icon: 'success',
                      title: 'Examination Added Successfully'

                       })

                     }else if(response.data==11){

                      Toast.fire({
                      icon: 'error',
                      title: 'Oops...',
                      title: 'Alrady This Department and Level Is Active, You Unactive This One Then Add New One'

                       })

                     }
                     else{

                      console.log(response.data)

                     }




           })
           .catch(()=>{
           console.log('fail');
           })

           },





deleteexam(exm_id){
  axios.get('/delate_exam/'+exm_id)
  .then((response)=>{

    Toast.fire({
    icon: 'success',
    title: 'Exam delete Successfully'
     })

      //this.showallteacher();
     // this.$store.dispatch("allStudent")

         this.showallexamination();


      })
   .catch(()=>{
   console.log('fail');

    })

},



},


computed:{

//getallstudent(){

//return this.$store.getters.getStudent
//}

},




        mounted() {

        //  this.showallteacher();
          this.showalldepartmentinform();
          this.showalllevelinstudentform();
          this.showallexamination();
         // this.showallhallroominstudentform();
         // this.showallbusinstudentform();
         // this.showallbatchinstudentform();
         // this.RealSerchstudent();
          //
        // this.$store.dispatch("allStudent")


        }
    }
</script>
