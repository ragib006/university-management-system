<template>
    <span>
        <Websiteheader></Websiteheader>

   



<div class="ddd" style="margin-bottom:50px">

   <div class="container">

    <div class="row">


      <div class="card" style="width:100%;margin-top:20px;margin-bottom:400px">



       <div class="sdfjef" style="padding:20px 20px 20px 20px">

           <span style="font-size:18px;font-weight:bold;margin-right:20px;color:green">Notice Title :</span><span style="font-size:18px;font-weight:bold">{{mynotice.notice_title}}</span>

          <p style="margin-top:30px">
           <span style="font-size:18px;font-weight:bold;margin-right:20px;color:green">Date : </span><span style="font-size:18px">{{mynotice.notice_date}}</span>

          </p>

           <div class="kjbgfkdhbg" style="margin-top:30px">

               <p style="font-size:18px;font-weight:bold;margin-right:20px;color:green">Description :</p>

               <p style="text-align:justify;">{{mynotice.notice_description}}</p>




           </div>


       </div>




       </div>


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

           mynotice:{},


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

//axios.get('/show_all_notice_frontend').then(({data}) => (this.allnotice = data));


   axios.get('/view_notice_details_frontend/'+this.$route.params.notice_id).then((res) => {

    this.mynotice = res.data.mynotice


    })


},





 },


 computed:{


 },




         mounted() {


         this.showallnotice();


         }
     }
</script>
