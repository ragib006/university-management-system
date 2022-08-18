<template>
    <div>


      <Mybackendheader></Mybackendheader>

      <MyBackendsidebar></MyBackendsidebar>

 <div class="card card-primary" style="width:550px;margin-top:25px;margin-left:270px;margin-bottom:500px;">


<!-- {{this.$route.params.id}} -->
<div class="card-header">
  <h3 class="card-title">Edit Notice</h3>

</div>

<form enctype="multipart/form-data" role="form" @submit.prevent = "updatemyhallroom()">

<div class="card-body">


  


                <div class="form-group">
              <label>Notice Title</label>
              <input v-model="form.notice_title" type="text" name="notice_title" style="width:500px"
              class="form-control" :class="{ 'is-invalid': form.errors.has('notice_title') }" placeholder="Enter Notice Title">
              <has-error :form="form" field="notice_title"></has-error>
              </div>





                <div class="form-group">
                    <label>Notice Description</label>
                    <textarea v-model="form.notice_description" type="text" name="notice_description" style="width:500px"
                      class="form-control" :class="{ 'is-invalid': form.errors.has('notice_description') }" placeholder="Enter Notice Description" required></textarea>
                    <has-error :form="form" field="notice_description"></has-error>
                  </div>





                <div class="form-group">
              <label>Notice Date</label>
              <input v-model="form.notice_date" type="text" name="notice_date" style="width:500px"
              class="form-control" :class="{ 'is-invalid': form.errors.has('notice_date') }" placeholder="Enter Notice Date">
              <has-error :form="form" field="notice_date"></has-error>
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

                    // allmydepartment:{},
                    // allmysemester:{},
                    // allmyteacher:{},

                  //  allmydepartment:{},

                  allhall:{},

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

  allhallinaddroomform(){

   axios.get('/show_hall_in_select_form').then(({data}) => (this.allhall = data));

  },


    //update category
  updatemyhallroom(){

     this.form.post('/update_nitice_from_action/'+this.$route.params.notice_id)
        .then((response)=>{

         this.$router.push('/add_notice')

          Toast.fire({
          icon: 'success',
          title: 'Notice Update Successfully'
          })

          })
          .catch(()=>{

            console.log('error');

          })


  //  console.log('hi')


    },







},




        mounted() {

       //  this.allhallinaddroomform();

        axios.get('/edit_notice_placeholder_value/'+this.$route.params.notice_id)
        .then((response)=>{

        this.form.fill(response.data)

        })



        },



    }
</script>
