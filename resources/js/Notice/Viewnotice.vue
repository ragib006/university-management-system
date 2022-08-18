<template>
    <div>



        <Mybackendheader></Mybackendheader>

        <MyBackendsidebar></MyBackendsidebar>



<div class="col-md-12" style="margin-top:25px;margin-bottom:70px;margin-bottom:500px;width:80%;margin-left:18%">
<div class="card">

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
      mynotice: {},

    }
  },


  components: {
     MyBackendsidebar,
     Mybackendheader,
     Mybackendfooter,
   },

methods:{


  Viewteacherdetails(){


    axios.get('/view_notice_details/'+this.$route.params.notice_id).then((res) => {

    this.mynotice = res.data.mynotice


    })


 },



  mypostimage(img){

      return "/images/"+img;

  },

},

    mounted() {

        // this.Viewproductdetails();
        this.Viewteacherdetails();

    }
}


</script>
