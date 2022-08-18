<template>
    <div>


<div class="col-md-12" style="margin-top:25px;margin-bottom:70px;">
<div class="card">
<div class="card-header p-2">
<ul class="nav nav-pills">
<li class="nav-item"><p data-toggle="tab" style="color:black;font-weight:bold;font-size:23px;margin-top:10px;">Libary Book Information</p></li>

</ul>
</div><!-- /.card-header -->



<div class="card-body" style="margin-bottom:100px;">
<div class="tab-content">
<div class="active tab-pane" id="activity">
<!-- Post -->
<div class="post">
 <div class="user-block">
     <div class="ima" style="width:500px;float:left;height:650px;">
   <img :src="mypostimage(studenttakebookinfo.student_image)" alt="" style="height:400px;width:400px;">
 </div>


   <span class="username" style="margin-left:50px;margin-bottom:3px;">
    <span style="font-size:18px;">Student Name : </span> <span style="font-size:18px;color:green;">{{studenttakebookinfo.student_name}}</span>
   </span>
 <span class="username" style="margin-left:50px;margin-bottom:3px;">
    <span style="font-size:18px;">Student Roll  : </span> <span style="font-size:18px;color:green;">{{studenttakebookinfo.student_roll}}</span>
   </span>
   <span class="username" style="margin-left:50px;margin-bottom:3px;">
    <span style="font-size:18px;">Student Department: </span> <span style="font-size:18px;color:green;">{{studenttakebookinfo.department_name}}</span>
   </span>
   <span class="username" style="margin-left:50px;margin-bottom:3px;">
    <span style="font-size:18px;">Student Level : </span> <span style="font-size:18px;color:green;">{{studenttakebookinfo.level_name}}</span>
   </span>

   <span class="username" style="margin-left:50px;margin-bottom:3px;">
    <span style="font-size:18px;">Student Email: </span> <span style="font-size:18px;color:green;">{{studenttakebookinfo.student_email}}</span>
   </span>
   <span class="username" style="margin-left:50px;margin-bottom:3px;">
    <span style="font-size:18px;">Student Address : </span> <span style="font-size:18px;color:green;">{{studenttakebookinfo.student_address}}</span>
   </span>
   <span class="username" style="margin-left:50px;margin-bottom:3px;">
    <span style="font-size:18px;">Student District : </span> <span style="font-size:18px;color:green;">{{studenttakebookinfo.student_district}}</span>
   </span>

   <span class="username" style="margin-left:50px;margin-bottom:3px;">
    <span style="font-size:18px;">Student Mobile Number : </span> <span style="font-size:18px;color:green;">{{studenttakebookinfo.student_mobile_number}}</span>
   </span>



   <span class="username" style="margin-left:50px;margin-bottom:3px;">
    <span style="font-size:18px;">Student Father Name : </span> <span style="font-size:18px;color:green;">{{studenttakebookinfo.student_father_name}}</span>
   </span>
   <span class="username" style="margin-left:50px;margin-bottom:3px;">
    <span style="font-size:18px;">Student Mother Name: </span> <span style="font-size:18px;color:green;">{{studenttakebookinfo.student_mother_name}}</span>
   </span>
   <span class="username" style="margin-left:50px;margin-bottom:3px;">
    <span style="font-size:18px;">Student Father Mobile Number : </span> <span style="font-size:18px;color:green;">{{studenttakebookinfo.student_father_mobile_number}}</span>
   </span>
   <span class="username" style="margin-left:50px;margin-bottom:3px;">
    <span style="font-size:18px;">Student Mother Mobile Number : </span> <span style="font-size:18px;color:green;">{{studenttakebookinfo.student_mother_mobile_number}}</span>
   </span>

   <span class="username" style="margin-left:50px;margin-bottom:3px;">
    <span style="font-size:18px;">Student Semester Fee : </span> <span style="font-size:18px;color:green;">{{studenttakebookinfo.level_dpt_tution_free}}TK</span>
   </span>




 </div>

</div>

</div>

</div>



</div>


<div class="second" style="margin-top:-190px;">
   <div class="row">

      <div class="col-md-5">

        <div class="ima" style="width:500px;float:left;height:500px;margin-left:23px;">
      <img :src="mypostimage(studenttakebookinfo.libary_book_image)" alt="" style="height:400px;width:400px;">
      </div>


      </div>


      <div class="col-md-7">


        <span class="username" style="margin-bottom:3px;">
         <span style="font-size:18px;font-weight:bold">Book Name : </span> <span style="font-size:18px;color:green;font-weight:bold">{{studenttakebookinfo.libary_book_name}}</span>
       </span></br>

       <span class="username" style="margin-bottom:3px;">
        <span style="font-size:18px;font-weight:bold">Book Take Date : </span> <span style="font-size:18px;color:green;font-weight:bold">{{studenttakebookinfo.studenttake_libary_book_take_date}}</span>
      </span></br>

      <span class="username" style="margin-bottom:3px;">
       <span style="font-size:18px;font-weight:bold">Book Return Date: </span> <span style="font-size:18px;color:green;font-weight:bold">{{studenttakebookinfo.studenttake_libary_book_return_date }}</span>
     </span></br>


     <span class="username" style="margin-bottom:3px;">
      <span style="font-size:18px;font-weight:bold">Fine Status: </span>

      <span style="font-size:18px;color:white;font-weight:bold;background:green;padding:3px 3px 3px 3px" v-if="mylibarybookfine == 0">Not Fine  </span>

      <span style="font-size:18px;color:white;font-weight:bold;background:red;padding:3px 3px 3px 3px" v-else> Fine  </span>

    </span></br>

    <span class="username" style="margin-bottom:3px;">
     <span style="font-size:18px;font-weight:bold">Fine Day: </span> <span style="font-size:18px;color:green;font-weight:bold">{{mylibarybookfineday}}</span>
   </span></br>

   <span class="username" style="margin-bottom:3px;">
    <span style="font-size:18px;font-weight:bold">Fine Amount: </span> <span style="font-size:18px;color:green;font-weight:bold">{{mylibarybookfine}} TK</span>
  </span></br>









      </div>



   </div>

</div>



















</div>















</div>



  </div>
</template>



<script>
import _ from 'lodash'

// import Vue from 'vue'
// import axios from 'axios'
// import VueAxios from 'vue-axios'
    export default {


      data () {
        return {

          // posts: {},
           //allcategoryshowinform:[],
          // currentPage: 1,
          // searchallcategory:'',
          //search:'',
          //showsearch:false,
          //caris:[],
        //  allteacher:{},
      //  viewstudenttakebook:{},

        studenttakebookinfo:{},
        mylibarybookfine:{},
        mylibarybookfineday:{},

        

      //student:{},
      //hallname:{},
        //mycourse:{},

          // Create a new form instance
          form: new Form({

                // hall_id:'',
                // hall_name: '',
             	  // hall_type: '',
             	  // hall_added_date: '',
                // hall_status:'',
                //cat_status: '',


          })
        }
      },




    methods:{



      Viewstudenttakebook(){

     axios.get('/view_student_take_libarybook_addstudent/'+this.$route.params.studenttake_libary_book_id).then((res) => {




       this.studenttakebookinfo = res.data.studenttakebookinfo,
       this.mylibarybookfine = res.data.mylibarybookfine,
       this.mylibarybookfineday = res.data.mylibarybookfineday



     })

  },

   mypostimage(img){

       return "/images/"+img;

   },







},





        mounted() {

          this.Viewstudenttakebook();

          // this.Viewmystudentcourse();
        //  this.Viewmystudentinformation();




        }
    }
</script>
