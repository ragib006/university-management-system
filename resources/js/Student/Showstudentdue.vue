<template>
    <span>

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
             <h3 class="card-title"></h3>

             <div>
          

        
            <span style="margin-left:10px;font-size:16px;font-weight:bold">Due Semester Fee</span>  
            <span style="margin-left:10px;font-size:16px;margin-right:10px">Name:</span><span>{{my_student_info.student_name}}</span>

              <span style="margin-left:10px;font-size:16px;margin-right:10px">Roll:</span><span>{{my_student_info.student_roll}}</span>

               <span style="margin-left:10px;font-size:16px;margin-right:10px">Department:</span><span>{{my_student_info.department_name}}</span>


                <span style="margin-left:10px;font-size:16px;margin-right:10px">Level:</span><span>{{my_student_info.level_name}}</span>

          

           </div>
          
           </div>


 </div>
 </div>



 <div class="card-body">



  <div class="dddd">
      <span style="margin-right:15px;font-weight:bold;font-size:18px;color:green">Main Semesterfee :</span><span style="font-weight:bold;font-size:18px">{{stumainsemesterfee}} TK</span>
 </div>

  <div class="dddd">
      <span style="margin-right:15px;font-weight:bold;font-size:18px;color:green">Student Give :</span><span style="font-weight:bold;font-size:18px">{{stugiveamount}} TK</span>
 </div>

   <div class="dddd">
      <span style="margin-right:15px;font-weight:bold;font-size:18px;color:green">Fine :</span><span style="font-weight:bold;font-size:18px">{{stufine}}</span>
 </div>

      <div class="dddd">

   <span style="margin-right:15px;font-weight:bold;font-size:18px;color:green">Fine Days:</span><span style="font-weight:bold;font-size:18px">{{fineduration}} Days</span>
 </div>

   <div class="dddd">
      <span style="margin-right:15px;font-weight:bold;font-size:18px;color:green">Total Semester Fee :</span><span style="font-weight:bold;font-size:18px">{{stufineplustotalamount}} TK</span>
 </div>

    <div class="dddd">
       <span style="margin-right:15px;font-weight:bold;font-size:18px;color:green">Due :</span><span style="font-weight:bold;font-size:18px">{{duebalance}} TK</span>
 </div>

    <div class="dddd">
      <span style="margin-right:15px;font-weight:bold;font-size:18px;color:green">Extra Money :</span><span style="font-weight:bold;font-size:18px">{{stugiveextra}} TK</span>
 </div>

 



    <div class="dddd">

       <span style="margin-right:15px;font-weight:bold;font-size:18px;color:green">Semester Fee Given Date :</span><span style="font-weight:bold;font-size:18px">{{givendate}}</span>
 </div>
    <div class="dddd">

   <span style="margin-right:15px;font-weight:bold;font-size:18px;color:green">Semester Fee Expire Date:</span><span style="font-weight:bold;font-size:18px">{{expiredate}}</span>
 </div>

    <div class="dddd">

   <span style="margin-right:15px;font-weight:bold;font-size:18px;color:green">Due Status:</span><span style="font-weight:bold;font-size:18px">{{studue}}</span>
 </div>





 </div>




  </div>




                </div>

              </div>

            </div>

          </section>

       <Mybackendfooter></Mybackendfooter>

    </span>
</template>



<script>
import _ from 'lodash'

import Mybackendheader from "../backendlayout/Adminheader.vue"
import MyBackendsidebar from "../backendlayout/Adminsidebar.vue"
import Mybackendfooter from "../backendlayout/Adminfooter.vue"

    export default {


      data () {
        return {
            
            stumainsemesterfee:{},
            stugiveamount:{},
            stufine:{},
            stufineplustotalamount:{},
            stugiveextra:{},
            duebalance:{},
            givendate:{},
            expiredate:{},
            studue:{},
            my_student_info:{},
            fineduration:{},

         // showalldepartment:{},
         // showstudentsemesterfeedue:{},
         // myfineamount:{},
         // myfineday:{},
         // mytotalsemesterfee:{},
         // mainsemesterfee:{},
         // levelname:{},
         // departmentname:{},
         // studentroll:{},
        //  studentname:{},


          // Create a new form instance
          form: new Form({

                department_id: '',
                department_name : '',
            
                department_added_date : '',
                department_semester_fee:'',
                deprtment_head :'',
                department_dean :'',
                department_added_date_status :'',
            


          })
        }
      },

      components: {
         MyBackendsidebar,
         Mybackendheader,
         Mybackendfooter,
       },



    methods:{




      ourimage(img){

              return "/images/"+img;

          },


   
     Studentsemesterfeedue(){

     axios.get('/view_specificstudent_allsemesterfee_due/'+this.$route.params.student_id).then((res) => {


         console.log(res.data)

        this.stumainsemesterfee = res.data.stumainsemesterfee,
        this.stugiveamount = res.data.stugiveamount,
        this.stufine = res.data.stufine,
        this.stufineplustotalamount = res.data.stufineplustotalamount,
        this.stugiveextra = res.data.stugiveextra,
        this.duebalance = res.data.duebalance,
        this.givendate = res.data.givendate,
        this.expiredate = res.data.expiredate,
        this.studue = res.data.studue,
        this.my_student_info = res.data.my_student_info,
        this.fineduration = res.data.fineduration





    


     })

   },




},


// computed:{
//
// // getallcategory(){
// //
// // return this.$store.getters.getCategory
// // }
//
// },




        mounted() {

          this.Studentsemesterfeedue();


         // this.showallteacherinform();

          // this.showcategoryinselectform();
          // this.$store.dispatch("allCategory",this.currentPage);
          // this.RealSerchcategory();


        }
    }
</script>
