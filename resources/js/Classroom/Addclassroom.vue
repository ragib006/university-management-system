<template>
    <div>


      <Mybackendheader></Mybackendheader>

      <MyBackendsidebar></MyBackendsidebar>

          <!-- Main content -->
  <section class="content" style="margin-top:20px;width:84%;margin-left:16%">
    <div class="container-fluid">
       <div class="row">
         <div class="col-12">




  <div class="card" style="padding-bottom:20px;">
  <div class="card-header">
  <div class="main">
           <div class="title" style="width:1000px;float:left">
             <h3 class="card-title">All Classroom</h3>
           </div>

  <div class="but">
         <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
          Add Classroom
         </button>
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
  <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="color:green">Add Classroom</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>
  <div class="modal-body">

  <form enctype="multipart/form-data" role="form" @submit.prevent = "addlevel()">





        <div class="form-group">
        <label>Classroom Name</label>
        <input v-model="form.classroom_name" type="text" name="classroom_name"
        class="form-control" :class="{ 'is-invalid': form.errors.has('classroom_name') }" placeholder="Enater Classroom Name" required>
        <has-error :form="form" field="classroom_name"></has-error>
        </div>


        <div class="form-group">
        <label>Classroom No</label>
        <input v-model="form.classroom_no" type="text" name="classroom_no"
        class="form-control" :class="{ 'is-invalid': form.errors.has('classroom_no') }" placeholder="Enater Classroom No" required>
        <has-error :form="form" field="classroom_no"></has-error>
        </div>





        <div class="form-group">
        <label>Class Room Flour</label>
        <input v-model="form.classroom_flour" type="number" name="classroom_flour"
        class="form-control" :class="{ 'is-invalid': form.errors.has('classroom_flour') }" placeholder="Enater Classroom Flour" required>
        <has-error :form="form" field="classroom_flour"></has-error>
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
    <th style="text-align:center;">Classroom Id</th>
    <th style="text-align:center;">Classroom Name</th>
    <th style="text-align:center;">Classroom No</th>
    <th style="text-align:center;">Classroom Flour</th>
    <th style="text-align:center;">Added Date</th>

    <th style="text-align:center;">Action</th>
</tr>




</thead>

<tbody>

 <tr v-for="(v_department,index) in showallclassroom">

   <!-- <tr> -->
      <td style="text-align:center;padding-top:30px">{{index+1}}</td>
    <td style="text-align:center;padding-top:30px">{{v_department.classroom_id}}</td>
    <td style="text-align:center;padding-top:30px;color:blue;">{{v_department.classroom_name}}</td>
    <td style="text-align:center;padding-top:30px;">{{v_department.classroom_no}}</td>
      <td style="text-align:center;padding-top:30px;color:blue;">{{v_department.classroom_flour}}</td>

      <td style="text-align:center;padding-top:30px;color:blue;">{{v_department.classroom_added_date}}</td>



  <td>

     <center>

 <router-link :to="`/edit_class_room/${v_department.classroom_id}`" class="btn btn-success btn-sm" style="margin-top:17px;" ><i class="fa fa-edit" aria-hidden="true"></i></router-link>

<!-- <a class="btn btn-warning btn-sm" style="margin-top:17px;" @click.prevent = "deletelevel(v_department.level_id)"><i class="fa fa-trash" aria-hidden="true"></i></a> -->

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

          showallclassroom:{},
          // alldepartment:{},
          // allmyteacher:{},

          // Create a new form instance
          form: new Form({

                classroom_id: '',
             	  classroom_name: '',
                classroom_no:'',
                classroom_flour:'',
                classroom_added_date:'',


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
      myallclassroom(){


     // axios.get('/show_all_level').then(({data}) => (this.showalllevel = data));

     axios.get('/show_all_classroom').then((res) => {

    this.showallclassroom = res.data.showallclassroom


})





   },





    addlevel(){
    this.form.post('/addclassroom_formaction')


            .then((response)=>{

              $('#exampleModal').modal('hide')
              this.form.reset();


            //  console.log(response.data)

              if(response.data==0){

                   Toast.fire({
                   icon: 'error',
                   title: 'This Classroom Already Exist'
                    })



              }else{



                   Toast.fire({
                   icon: 'success',
                   title: 'Classroom Added Successfully'
                    })

                      this.myallclassroom();


               }


               })
               .catch(()=>{
               console.log('fail');
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

deletelevel(level_id){
  axios.get('/delate_level/'+level_id)
  .then((response)=>{

    Toast.fire({
    icon: 'success',
    title: 'Level delate Successfully'
     })

    this.myalllevel();


      })
   .catch(()=>{
   console.log('fail');

    })

},



},





        mounted() {

            this.myallclassroom();
            // this.showalltecheruncourse();
            // this.showalldepartmentincourse();




        }
    }
</script>
