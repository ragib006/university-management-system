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
             <h3 class="card-title"></h3><span style="font-weight:bold;color:black;font-size:19px;margin-right:10px;">{{courseinfo.course_code}}</span><span style="font-weight:bold;color:green;font-size:19px;margin-left:17px;">{{courseinfo.course_title}}</span><span style="font-weight:bold;font-size:19px;margin-left:17px;">Level -</span> <span style="font-weight:bold;color:green;font-size:19px;margin-left:5px;">{{courseinfo.level_name}}</span>
             <span style="font-weight:bold;font-size:19px;margin-left:17px;">Credit -</span> <span style="font-weight:bold;color:green;font-size:19px;margin-left:5px;">{{courseinfo.course_credit}}</span>

<!--
               <h3 class="card-title"></h3><span style="font-weight:bold;color:black;font-size:19px;margin-right:10px;">{{this.$route.params.addstuent_courseid}}</span><span style="font-weight:bold;color:green;font-size:19px;margin-left:17px;">FGHFGHGFH FG HFG HFGHFG</span>

                -->
           </div>

  <div class="but">
         <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
          Add CT Marks
         </button>
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
  <div class="modal-content"  style="width:700px;">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="color:green">Add CT Marks</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>
  <div class="modal-body">

  <form enctype="multipart/form-data" role="form" @submit.prevent = "addctmark()">



    <div class="form-group">
         <label for="exampleFormControlSelect1">CT Type</label>
           <select  v-model="form.ct_type_name" class="form-control" id="exampleFormControlSelect1" name="ct_type_name" :class="{ 'is-invalid': form.errors.has('ct_type_name') }" style="" required>
             <option value="" disabled>Select</option>

             <option style="color:green;font-weight:bold;" value="First CT">First CT</option>
             <option style="color:green;font-weight:bold;" value="Second CT">Second CT</option>
             <option style="color:green;font-weight:bold;" value="Third CT">Third CT</option>
             <option style="color:green;font-weight:bold;" value="Fourth CT">Fourth CT</option>

           </select>
           <has-error :form="form" field="ct_type_name"></has-error>
    </div>

    <div class="form-group">
    <label>CT Marks</label>
    <input v-model="form.ct_mark" type="number" name="ct_mark"
    class="form-control" :class="{ 'is-invalid': form.errors.has('ct_mark') }" placeholder="Enter Ct Marks ">
    <has-error :form="form" field="ct_mark"></has-error>
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
    <th style="text-align:center;">Sl No</th>
    <th style="text-align:center;">Roll No</th>
    <th style="text-align:center;">Student Name</th>
    <th style="text-align:center;">Course Code</th>
      <!-- <th style="text-align:center;">Course Credit</th> -->
    <th style="text-align:center;">Course Credit</th>
    <th style="text-align:center;">Student Level</th>
    <th style="text-align:center;">CT Type</th>
    <th style="text-align:center;">CT Markes</th>
    <th style="text-align:center;">CT Date</th>
    <th style="text-align:center;">Action</th>
    <!-- <th style="text-align:center;">Course Teacher</th> -->






</tr>




</thead>

<tbody>

 <tr v-for="(v_department,index) in allctmarks">




 <td style="text-align:center;padding-top:30px">{{index+1}}</td>
    <td style="text-align:center;padding-top:30px">{{v_department.student_roll}}</td>
    <td style="text-align:center;padding-top:30px">{{v_department.student_name}}</td>
    <td style="text-align:center;padding-top:30px">{{v_department.course_code}}</td>
      <!-- <td style="text-align:center;padding-top:30px">{{v_department.course_credit}}</td> -->
            <td style="text-align:center;padding-top:30px">{{v_department.course_credit}}</td>
      <td style="text-align:center;padding-top:30px">{{v_department.level_name}}</td>

 <td style="text-align:center;padding-top:30px;color:blue;font-weight:bold">{{v_department.ct_type_name}}</td>
  <td style="text-align:center;padding-top:30px;color:blue;font-weight:bold">{{v_department.ct_mark}}</td>
<td style="text-align:center;padding-top:30px;color:blue;font-weight:bold">{{v_department.ct_date}}</td>


<td>
  <center>
 <a class="btn btn-warning btn-sm" style="margin-top:17px;" @click.prevent = "deletectmarks(v_department.ct_id)"><i class="fa fa-trash" aria-hidden="true"></i></a>


</center>
</td>





     </tr>

 </tbody>





 </table>
 </div>


<!-- <h1>{{averagectmark}} sdfsgfdgf</h1> -->


<div v-if="averagectmark == 0">
 <p style="text-align:center;color:blue;padding-top:18px;margin-left:-50px;font-size:18px;font-weight:bold;">Average Mark Will be Show When Take Four CT</p>
</div>
<div v-else>
 <p style="text-align:center;color:blue;padding-top:18px;margin-left:-50px;font-size:18px;font-weight:bold;">Average CT Mark : {{averagectmark}}</p>
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

import Mybackendheader from "../backendlayout/Adminheader.vue"
import MyBackendsidebar from "../backendlayout/Adminsidebar.vue"
import Mybackendfooter from "../backendlayout/Adminfooter.vue"
    export default {


      data () {
        return {

                    // allmydepartment:{},
                    // allmysemester:{},
                    // allmyteacher:{},

                  //  allmydepartment:{},

                  courseinfo:{},
                  allctmarks:{},
                  averagectmark:{},
                  allctcount:{},
                  // teachername:{},

          // Create a new form instance
          form: new Form({



              ct_id:'',
              ct_student_id:'',
              ct_student_course_id :'',
              ct_student_level_id:'',
              ct_type_name:'',
              ct_mark :'',
              student_ct_status :'',
              ct_date:''





          })
        }
      },


      components: {
         MyBackendsidebar,
         Mybackendheader,
         Mybackendfooter,
       },


methods:{



  deletectmarks(ct_id){
    axios.get('/delate_ct_mark/'+ct_id)
    .then((response)=>{

      Toast.fire({
      icon: 'success',
      title: 'CT Mark Delate Successfully'
       })

        //this.showallteacher();
        this.showallctmark();


        })
     .catch(()=>{
     console.log('fail');

      })

  },









  showallctmark(){

    axios.get('/show_all_ct_martks/'+this.$route.params.addstuent_courseid).then((res) => {

     this.allctmarks = res.data.allctmarks,
     this.courseinfo = res.data.courseinfo,
     this.averagectmark = res.data.averagectmark
     // this.allctcount = res.data.allctcount






       console.log(res.data)



    })

  },



     addctmark(){

     this.form.post('/add_ct_mark_form_action/'+this.$route.params.addstuent_courseid)



        .then((response)=>{



            //    console.log(response.data);

        //  this.displaystudentallsemestercourse();
        //  this.this.showallctmark();
          $('#exampleModal').modal('hide')


          this.form.reset();

         this.showallctmark();

         if(response.data==1){


           Toast.fire({
           icon: 'success',
           title: 'CT Marks Added Successfully'
           })


         }else{


           Swal.fire({

                icon: 'error',
                title: 'Oops...',
                text: 'Sorry This CT Allready Exist !!',

                })



         }


          })
          .catch(()=>{

            console.log('error');

          })



    },







},




        mounted() {

          // this.showcourseinfoinmark();
           this.showallctmark();





        },



    }
</script>
