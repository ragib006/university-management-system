<template>
    <div>


<div class="col-md-12" style="margin-top:25px;margin-bottom:70px;">
<div class="card">
<div class="card-header p-2">
<ul class="nav nav-pills">
<li class="nav-item"><p data-toggle="tab" style="color:black;font-weight:bold;font-size:23px;margin-top:10px;">{{teacherinformation.teacher_name}}</p></li>

</ul>
</div><!-- /.card-header -->



<div class="card-body" style="margin-bottom:100px;">
<div class="tab-content">
<div class="active tab-pane" id="activity">
<!-- Post -->
<div class="post">
 <div class="user-block">
     <div class="ima" style="width:500px;float:left;height:400px;">
   <img :src="mypostimage(teacherinformation.teacher_image)" alt="" style="height:300px;width:300px;">
 </div>

 <!-- <img :src="'/images/'+teacherinformation.product_image"/> -->
   <span class="username" style="margin-left:50px;margin-bottom:3px;">
    <span style="font-size:18px;">Teacher Name : </span> <span style="font-size:18px;color:green;">{{teacherinformation.teacher_name}}</span>
   </span>
   <span class="username" style="margin-left:50px;margin-bottom:3px;">
    <span style="font-size:18px;">Teacher Department: </span> <span style="font-size:18px;color:green;">{{teacherinformation.department_name}}</span>
   </span>
   <span class="username" style="margin-left:50px;margin-bottom:3px;">
    <span style="font-size:18px;">Profession : </span> <span style="font-size:18px;color:green;">{{teacherinformation.Profession_name}}</span>
   </span>
   <span class="username" style="margin-left:50px;margin-bottom:3px;">
    <span style="font-size:18px;">Teacher Email : </span> <span style="font-size:18px;color:green;">{{teacherinformation.teacher_email}}</span>
   </span>

   <span class="username" style="margin-left:50px;margin-bottom:3px;">
    <span style="font-size:18px;">Teacher Salary : </span> <span style="font-size:18px;color:green;">{{teacherinformation.profession_salary}} TK</span>
   </span>




   <span class="username" style="margin-left:50px;margin-bottom:3px;">
    <span style="font-size:18px;">Teacher Address : </span> <span style="font-size:18px;color:green;">{{teacherinformation.teacher_address}}</span>
   </span>
   <span class="username" style="margin-left:50px;margin-bottom:3px;">
    <span style="font-size:18px;">Teacher Ditrict : </span> <span style="font-size:18px;color:green;">{{teacherinformation.teacher_district}} </span>
   </span>
   <span class="username" style="margin-left:50px;margin-bottom:3px;">
    <span style="font-size:18px;">Teacher Mobile Number : </span> <span style="font-size:18px;color:green;">{{teacherinformation.teacher_mobile_number}}</span>
   </span>

   <span class="username" style="margin-left:50px;margin-bottom:3px;">
    <span style="font-size:18px;">Teacher Experience : </span> <span style="font-size:18px;color:green;">{{teacherinformation.teacher_experience}} Years</span>
   </span>

   <span class="username" style="margin-left:50px;margin-bottom:3px;">
    <span style="font-size:18px;">Teacher Added Date : </span> <span style="font-size:18px;color:green;">{{teacherinformation.teacher_added_date}}</span>
   </span>
   <!-- <span class="username" style="margin-left:50px;margin-bottom:3px;">
         <span style="font-size:18px;">Product Url : </span> <span style="font-size:18px;color:green;">{{teacherinformation.teacher_passwoard}}</span>
   </span> -->

   <!-- <span class="username" style="margin-left:50px;margin-bottom:3px;">
         <span style="font-size:18px;">Product Added : </span> <span style="font-size:18px;color:green;">{{teacherinformation.product_addedby}}</span>
   </span> -->

 </div>
 <!-- /.user-block -->


 <h3 style="font-weight:bold;color:black;margin-bottom:20px;">Teacher Description</h3>
 <p style="text-align:justify;color:black;font-family:tahoma;">
{{teacherinformation.teacher_description }}
 </p>

</div>

</div>

</div>

</div>

</div>
<!-- /.card -->
</div>



  </div>
</template>

<script>

export default {


  data () {
    return {
      teacherinformation: {},

    }
  },


methods:{


  Viewteacherdetails(){


    axios.get('/view_teacher_details/'+this.$route.params.teacher_id).then((res) => {

    this.teacherinformation = res.data.teacherinformation


    })


 },


  // Viewteacherdetails(){
  //
  //     axios.get('/view_teacher_details/'+this.$route.params.teacher_id).then(({data}) => (this.teacherinformation = data));
  //
  // },

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
