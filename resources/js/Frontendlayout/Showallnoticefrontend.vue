<template>
    <span>
        <Websiteheader></Websiteheader>

   



<div class="ddd" style="margin-bottom:200px;margin-top:30px">

   <div class="container">

    <div class="row">


      




<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">SL</th>
      <th scope="col">Notice Title</th>
      <th scope="col">Notice Date</th>
  
      <th scope="col">Action</th>
           
    

    </tr>
  </thead>





  <tbody>




    <tr v-for="(v_showteacher,index) in allnotice">
      <th scope="row">{{index+1}}</th>
      <th scope="row">{{v_showteacher.notice_title}}</th>


    


            <th scope="row">{{v_showteacher.notice_date}}</th>


            <th scope="row">

              <router-link :to="`/view_notice_frontend/${v_showteacher.notice_id}`" class="btn btn-danger btn-sm" style="margin-top:17px;margin-left:10px" ><i class="fa fa-eye" aria-hidden="true" style="color:white;"></i></router-link>

            </th>
    


                  

                                    


  
    </tr>

  </tbody>



</table>








    </div>

  </div>

</div>





        <Websitefooter></Websitefooter>

</span>
</template>

<script>


  import  Websiteheader from "../Frontendlayout/Websiteheader.vue"
  import  Websitefooter from "../Frontendlayout/Websitefooter.vue"

  //import Mybackendfooter from "../backendlayout/Adminfooter.vue"




     export default {


         data() {
         return {

           allnotice:{},


           // Create a new form instance
           form: new Form({

                    // category_id: '',
                    // category_name: '',
                    // category_type: '',
                    // category_added_date:'',
                    // category_url:'',
                    // category_status:'',
                 //cat_status: '',


           })
         }
       },




       components: {
          Websiteheader,
          Websitefooter,
          //Mybackendfooter,
        },



     methods:{



showallnotice(){

axios.get('/show_all_notice_frontend').then(({data}) => (this.allnotice = data));


},





 },


 computed:{


 },




         mounted() {


         this.showallnotice();


         }
     }
</script>
