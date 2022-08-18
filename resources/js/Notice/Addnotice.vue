
<template>
    <div>



            <Mybackendheader></Mybackendheader>

            <MyBackendsidebar></MyBackendsidebar>

        <section class="content" style="margin-top:20px; margin-bottom:500px;width:84%;margin-left:16%">
          <div class="container-fluid">
             <div class="row">
               <div class="col-12">




        <div class="card" style="padding-bottom:20px;">
        <div class="card-header">
        <div class="main">
                 <div class="title" style="width:1000px;float:left">
                   <h3 class="card-title">All Notice</h3>
                 </div>

        <div class="but">
               <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Add Notice
               </button>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
                      <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel" style="color:green">Add Notice</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                      </button>
                      </div>
        <div class="modal-body">

        <form enctype="multipart/form-data" role="form" @submit.prevent = "addnotice()">





              <div class="form-group">
              <label>Notice Title</label>
              <input v-model="form.notice_title" type="text" name="notice_title"
              class="form-control" :class="{ 'is-invalid': form.errors.has('notice_title') }" placeholder="Enter Notice Title">
              <has-error :form="form" field="notice_title"></has-error>
              </div>





                <div class="form-group">
                    <label>Notice Description</label>
                    <textarea v-model="form.notice_description" type="text" name="notice_description"
                      class="form-control" :class="{ 'is-invalid': form.errors.has('notice_description') }" placeholder="Enter Notice Description" required></textarea>
                    <has-error :form="form" field="notice_description"></has-error>
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
          <!-- <th style="text-align:center;">Id</th> -->
          <th style="text-align:center;">Notice Id</th>
          <th style="text-align:center;">Notice Title</th>
      
           <th style="text-align:center;">Notice Date</th>
          <th style="text-align:center;">Status</th>
          <th style="text-align:center;">ON/OFF</th>
          <th style="text-align:center">Action</th>
      </tr>
      </tr>




      </thead>


    

      <tbody>

       <tr v-for="(v_showteacher,index) in allnotice">

  
           <td style="text-align:center;padding-top:30px;">{{index+1}}</td>
        
           <td style="text-align:center;padding-top:30px;">{{v_showteacher.notice_id}}</td>
           <td style="text-align:center;padding-top:30px;">{{v_showteacher.notice_title}}</td>
        

           <td style="text-align:center;padding-top:30px;">{{v_showteacher.notice_date}}</td>
      

          <td>

          <div v-if="v_showteacher.notice_status == 1">
           <p style="text-align:center;color:blue;padding-top:18px">Active</p>
          </div>
          <div v-else="v_showteacher.notice_status == 0">
           <p style="text-align:center;color:red;padding-top:18px">Unactive</p>
          </div>


          </td>

          <td style="">
         <center>
          <div v-if="v_showteacher.notice_status == 1">
          <a class="btn btn-primary btn-sm" style="margin-top:17px;color:white;" @click.prevent = "activestudentoff(v_showteacher.notice_id)" >OFF</a>
          </div>

          <div v-else="v_showteacher.notice_status == 0">
          <a class="btn btn-success btn-sm" style="margin-top:17px;color:white;" @click.prevent = "unactivestudenton(v_showteacher.notice_id)" >ON</a>
          </div>
        </center>



        </td>

           <td>

           <center>

<router-link :to="`/view_notice/${v_showteacher.notice_id}`" class="btn btn-danger btn-sm" style="margin-top:17px;" ><i class="fa fa-eye" aria-hidden="true" style="color:white;"></i></router-link>

<router-link :to="`/edit_notice/${v_showteacher.notice_id}`" class="btn btn-success btn-sm" style="margin-top:17px;" ><i class="fa fa-edit" aria-hidden="true" style="color:white;"></i></router-link>



<a class="btn btn-warning btn-sm" style="margin-top:17px;" @click.prevent = "deletenoticet(v_showteacher.notice_id)"><i class="fa fa-trash" aria-hidden="true"></i></a>
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


          allnotice:{},
          

         //showmyallteachers:{},



          // Create a new form instance
          form: new Form({

                notice_id: '',
             	  notice_title: '',
             	  notice_description: '',
                notice_date:'',
                //student_bus_id:'',
                notice_status:'',



          })
        }
      },



      components: {
         MyBackendsidebar,
         Mybackendheader,
         Mybackendfooter,
       },





    methods:{

//search category
//RealSerchstudent:_.debounce(function(){

//this.$store.dispatch('Searchstudent',this.keyword);

//},1000),



showallnotice(){

axios.get('/show_all_notice').then(({data}) => (this.allnotice = data));


},










       //add category
       addnotice(){

        this.form.post('/add_notice_formaction')



        .then((response)=>{

         console.log(response.data)


         $('#exampleModal').modal('hide')

              this.form.reset();

               //   this.$store.dispatch("allStudent")


                 this.showallnotice();



                if(response.data==1){

                        Toast.fire({
                        icon: 'success',
                        title: 'Student Added Successfully'

                         })

                  }else{


                        Toast.fire({
                        icon: 'error',
                        title: 'Server Error'

                        })



                  }

        



           })
           .catch(()=>{
           console.log('fail');
           })

           },


      activestudentoff(notice_id){

      axios.get('/active_notice_unactive/'+notice_id)
      .then((response)=>{
        Toast.fire({
        icon: 'success',
        title: 'Notice Unactive Successfully'
       })

        //  this.showallteacher();
         //   this.$store.dispatch("allStudent")

              this.showallnotice();



       })

       },

    //unactive category on
      unactivestudenton(notice_id){

        axios.get('/unactive_notice_active/'+notice_id)
        .then((response)=>{

          Toast.fire({
          icon: 'success',
          title: 'Notice Active Successfully'
         })

       this.showallnotice();

               // this.$store.dispatch("allStudent")



         })

       },



deletenoticet(notice_id){
  axios.get('/delate_notice/'+notice_id)
  .then((response)=>{

    Toast.fire({
    icon: 'success',
    title: 'Notice Delete Successfully'
     })

      //this.showallteacher();
     this.showallnotice();


      })
   .catch(()=>{
   console.log('fail');

    })

},



},


computed:{



},




        mounted() {

          this.showallnotice();
        //  this.showalldepartmentinform();
        //  this.showalllevelinstudentform();
        //  this.showallhallroominstudentform();
         // this.showallbusinstudentform();
       //   this.showallbatchinstudentform();
        //  this.RealSerchstudent();
          //
        // this.$store.dispatch("allStudent")


        }
    }
</script>
