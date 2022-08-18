<template>
<span>

     <Mybackendheader></Mybackendheader>

     <MyBackendsidebar></MyBackendsidebar>




      <section class="content" style="margin-top:20px;margin-bottom:500px;width:80%;margin-left:18%">
        <div class="container-fluid">

          <div class="row">
            <div class="col-lg-3 col-6">

              <div class="small-box bg-info">
                <div class="inner">
                  <h3>{{studentcount}}</h3>

                  <p>Total Student</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
            
              </div>
            </div>

            <div class="col-lg-3 col-6">

              <div class="small-box bg-success">
                <div class="inner">
                  <h3>{{totaldepartment}}</h3>

                  <p>Total Department</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
              
              </div>
            </div>

            <div class="col-lg-3 col-6">

              <div class="small-box bg-warning">
                <div class="inner">
                  <h3>{{totalteacher}}</h3>

                  <p>Total Teacher</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
            
              </div>
            </div>

            <div class="col-lg-3 col-6">

              <div class="small-box bg-danger">
                <div class="inner">
                  <h3>{{totalclassroom}}</h3>

                  <p>Total Class Room</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
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


  import Mybackendheader from "../backendlayout/Adminheader.vue"
  import MyBackendsidebar from "../backendlayout/Adminsidebar.vue"

  import Mybackendfooter from "../backendlayout/Adminfooter.vue"

     export default {


         data() {
         return {

          studentcount:{},

          totaldepartment:{},

          totalteacher:{},

          totalclassroom:{},


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



            showallinfo(){

//axios.get('/show_all_notice_frontend').then(({data}) => (this.allnotice = data));


   axios.get('/over_all_information').then((res) => {


   // console.log(res.data)

       this.studentcount = res.data.studentcount,
       this.totaldepartment = res.data.totaldepartment,
       this.totalteacher = res.data.totalteacher,
       this.totalclassroom = res.data.totalclassroom

      //  this.totalsellproductquantity = res.data.totalsellproductquantity,
      //  this.totalsellproductmoney = res.data.totalsellproductmoney,
      //  this.totalselltodaymoney = res.data.totalselltodaymoney,
      //  this.quantistocksproduct = res.data.quantistocksproduct
       //totalsellproductquantity


    })


},





 },


 computed:{


 },




         mounted() {

        
          this.showallinfo();


         }
     }
 </script>
