<template>
<span>

     <Mybackendheader></Mybackendheader>

     <MyBackendsidebar></MyBackendsidebar>
      <section class="content" style="margin-top:20px;margin-bottom:500px;">
        <div class="container-fluid">

          <div class="row">
            <div class="col-lg-3 col-6">

              <div class="small-box bg-info">
                <div class="inner">
                  <h3>150</h3>

                  <p>New Orders</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>

            <div class="col-lg-3 col-6">

              <div class="small-box bg-success">
                <div class="inner">
                  <h3>53<sup style="font-size: 20px">%</sup></h3>

                  <p>Bounce Rate</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>

            <div class="col-lg-3 col-6">

              <div class="small-box bg-warning">
                <div class="inner">
                  <h3>44</h3>

                  <p>User Registrations</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>

            <div class="col-lg-3 col-6">

              <div class="small-box bg-danger">
                <div class="inner">
                  <h3>65</h3>

                  <p>Unique Visitors</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
             </div>


           </div>
         </div>
       </section>



    <Mybackendfooter></Mybackendfooter>

</span>
</template>


<script>


  import Mybackendheader from "../backendlayout/Adminheader.vue"
  import MyBackendsidebar from "../backendlayout/Adminsidebar.vue"
  import Mybackendfooter from "../backendlayout/Adminfooter.vue"

     export default {


         data() {
         return {


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
          MyBackendsidebar,
          Mybackendheader,
          Mybackendfooter,
        },



     methods:{






 },


 computed:{


 },




         mounted() {


         }
     }
 </script>
