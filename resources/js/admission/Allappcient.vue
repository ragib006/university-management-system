
<template>
    <div>


      <Mybackendheader></Mybackendheader>

      <MyBackendsidebar></MyBackendsidebar>


        <section class="content" style="margin-top:20px;margin-bottom:500px;width:80%;margin-left:18%">
          <div class="container-fluid">
             <div class="row">
               <div class="col-12">




        <div class="card" style="padding-bottom:20px;">
        <div class="card-header">
        <div class="main">
                 <div class="title" style="width:1000px;float:left">
                   <h3 class="card-title" style="width:500px;">All Application Candid</h3><span>{{admissioninfo.admissionexam_name}}</span>
                 </div>














       </div>
       </div>



       <div class="card-body">






       <table id="section" class="table table-bordered table-striped">




       <thead>

       <tr>
         <th style="text-align:center;">Sl</th>
          <th style="text-align:center;">Apply Id</th>
             <th style="text-align:center;">Roll</th>
          <th style="text-align:center;">Name</th>
          <th style="text-align:center;">SSC</th>



            <th style="text-align:center;">SSC Roll</th>
            <th style="text-align:center;">HSC</th>
            <th style="text-align:center;">HSC Roll</th>
              <!-- <th style="text-align:center;">Image</th> -->
          <th style="text-align:center;">Image</th>
          <th style="text-align:center;">Payment Method</th>
          <th style="text-align:center;">Tnx Id</th>
                <th style="text-align:center;">Payment Status</th>
          <th style="text-align:center;">ON/OFF</th>
          <th style="text-align:center;width:100px">Action</th>
      </tr>
      </tr>




      </thead>

      <tbody>

    

       <tr v-for="(v_showteacher,index) in applicant">


            <td style="text-align:center;padding-top:30px;">{{index+1}}</td>
          <td style="text-align:center;padding-top:30px;">{{v_showteacher.apply_student_id}}</td>
              <td style="text-align:center;padding-top:30px;">{{v_showteacher.apply_student_roll}}</td>


  
            <td style="text-align:center;padding-top:30px;color:blue;">{{v_showteacher.apply_student_name}}</td>

              <td style="text-align:center;padding-top:30px;">{{v_showteacher.apply_student_ssc_pass_year}}</td>

                <td style="text-align:center;padding-top:30px;">{{v_showteacher.apply_student_ssc_roll}}</td>

                     <td style="text-align:center;padding-top:30px;">{{v_showteacher.apply_student_hsc_pass_year}}</td>

          <td style="text-align:center;padding-top:30px;">{{v_showteacher.apply_student_hsc_roll}}</td>

      
            <td style="text-align:center"><img :src="ourimage(v_showteacher.apply_student_image)" alt="" style="height:70px;width:70px;"></td>

    
            <td style="text-align:center;padding-top:30px;">{{v_showteacher.apply_student_payment_type}}</td>
           
             <td style="text-align:center;padding-top:30px;">{{v_showteacher.apply_payment_tax_id}}</td>
            
      

          <td>

          <div v-if="v_showteacher.apply_student_status == 1">
           <p style="text-align:center;color:blue;margin-top:20px;padding:2px 2px 2px 2px" class="bg-success">Success</p>
          </div>
          <div v-else="v_showteacher.apply_student_status == 0">
           <p style="text-align:center;color:red;margin-top:20px;padding:2px 2px 2px 2px"class="bg-danger">Unsuccess</p>
          </div>

      



          </td>

          <td style="">

          <div v-if="v_showteacher.apply_student_status == 1">
          <a class="btn btn-primary btn-sm" style="margin-top:20px;color:white;margin-left:12px;" @click.prevent = "successpaymentunsuccess(v_showteacher.apply_student_id)" >Unsuccess</a>
          </div>

          <div v-else="v_showteacher.apply_student_status == 0">
          <a class="btn btn-success btn-sm" style="margin-top:20px;color:white;margin-left:12px;" @click.prevent = "unsuccesspaymentsuccess(v_showteacher.apply_student_id)" >Success</a>
          </div>

      



        </td>

           <td>

           <center>

<!---
    <router-link :to="`/view_teacher/${v_showteacher.apply_student_id}`" class="btn btn-primary btn-sm" style="margin-top:17px;"><i class="fa fa-eye" aria-hidden="true"></i></router-link>------>

    <!--------
    <router-link :to="`/edit_applicant/${v_showteacher.apply_student_id}`" class="btn btn-success btn-sm" style="margin-top:17px;" ><i class="fa fa-edit" aria-hidden="true"></i></router-link>
---->



    <a class="btn btn-warning btn-sm" style="margin-top:17px;" @click.prevent = "deleteapplicant(v_showteacher.apply_student_id)"><i class="fa fa-trash" aria-hidden="true"></i></a>

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

         // alldepartment:{},
        //  allprofession:{},

         //showmyallteachers:{},

         admissioninfo:{},
         applicant:{},



          // Create a new form instance
          form: new Form({

              //  teacher_id: '',
             	//  dep_id: '',
             	//  teacher_name : '',
              //  proffe_id:'',
             //  teacher_email:'',
             //   teacher_image :'',
              //  teacher_address :'',
              //  teacher_district :'',
              //  teacher_mobile_number :'',
              //  teacher_description :'',
              //  teacher_added_date :'',
              //  teacher_passwoard :'',
              //  teacher_experience :'' ,
              //  teacher_status :'',


          })
        }
      },


      components: {
         MyBackendsidebar,
         Mybackendheader,
         Mybackendfooter,
       },




    methods:{




  allapplicant(){





   // axios.get('/all_applicant_get_there_are_apply').then((res) => {


          axios.get('/all_applicant_get_there_are_apply/'+this.$route.params.admissionexam_id).then((res) => {

      console.log(res.data)

       this.applicant = res.data.applicant,
       this.admissioninfo = res.data.admissioninfo
  // this.studentsemesterfinalcoursemark = res.data.studentsemesterfinalcoursemark






    })

  },











deleteteacher(teacher_id){
  axios.get('/delate_teacher/'+teacher_id)
  .then((response)=>{


    Toast.fire({
    icon: 'success',
    title: 'Teacher delate Successfully'
     })

    // this.displayalldepartment();
    // this.myallcourse();
    this.showallteacher();


      })
   .catch(()=>{
   console.log('fail');

    })


},



showallteacher(){


        axios.get('/show_my_all_teacher').then((res) => {

       this.showmyallteachers = res.data.showmyallteachers


})



},







      ourimage(img){

              return "/images/"+img;

          },




      successpaymentunsuccess(apply_student_id){

      axios.get('/success_paymentun_unsuccess/'+apply_student_id)
      .then((response)=>{
        Toast.fire({
        icon: 'success',
        title: 'Payment Unsuccess Successfully'
       })

          this.allapplicant();


       })

       },

    //unactive category on unsuccesspaymentsuccess
      unsuccesspaymentsuccess(apply_student_id){

        axios.get('/unsuccess_payment_success/'+apply_student_id)
        .then((response)=>{

          Toast.fire({
          icon: 'success',
          title: 'Payment Complete Successfully'
         })

           this.allapplicant();



         })

       },



deleteapplicant(apply_student_id){
  axios.get('/delete_applicant/'+apply_student_id)
  .then((response)=>{

    Toast.fire({
    icon: 'success',
    title: 'Appliciant delete Successfully'
     })

    //  this.showallteacher();
       this.allapplicant();

      })
   .catch(()=>{
   console.log('fail');

    })

},



},


computed:{

// getallteacher(){
//
// return this.$store.getters.getTeacher
// }

},




        mounted() {


          this.allapplicant();

        //  this.showallteacher();
        //  this.showalldepartmentinform();
        //  this.showallteacherprofesion();


        }
    }
</script>
