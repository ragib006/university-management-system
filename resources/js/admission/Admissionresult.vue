<template>
    <span>

<Mybackendheader></Mybackendheader>

<MyBackendsidebar></MyBackendsidebar>



          <!-- Main content -->
  <section class="content" style="margin-top:20px;margin-bottom:500px;width:80%;margin-left:18%">
    <div class="container-fluid">
       <div class="row">
         <div class="col-12">


  <div class="card" style="padding-bottom:20px;">
  <div class="card-header">
  <div class="main">
           <div class="title" style="width:900px;float:left">
             <h3 class="card-title">Admission Result</h3>
           </div>

  




     
  
           

 

 </div>
 </div>



 <div class="card-body">


 <button
        type="button"
        class="btn btn-success"
        @click="addMore()"
      >
        <i class="fa fa-plus" aria-hidden="true"></i>
      </button>






     <form @submit.prevent ="admissionresult()"> 
      <div v-for="(course, index) in courses" :key="index">
        <div class="flex justify-start ml-2 mt-4">


            
          <input type="number"
            v-model="course.stu_roll" name="stu_roll" style="width:300px;padding-left:10px;border-radius:2px;border:3px solid pink;height:35px"
            placeholder="Enter Student Admission Roll" required="" 
        
          />
        
        <!------
          <input
            v-model="course.stu_exm_id"
            placeholder="enter you course name" name="stu_exm_id"
        
          />
---------->

        
        
             <select  v-model="course.stu_exm_id"  name="admission_exam_id" style="width:300px;padding-left:10px;border-radius:2px;border:3px solid pink;height:35px" required>
                       <option value="" disabled>Select Exam</option>

                       <option style="font-weight:bold;" v-for="selectdept in alladmission" :value="selectdept.admissionexam_id">{{selectdept.admissionexam_name}}</option>

                     </select>
                    
            











              <input
            v-model="course.stu_exm_mark" name="stu_exm_mark" type="number"
            style="width:300px;padding-left:10px;border-radius:2px;border:3px solid pink;height:35px" 
            placeholder="Enter Admission Mark" required
    
          />



          <button
            type="button"
            class="btn btn-danger btn-sm" 
            @click="remove(index)"
            v-show="index != 0"
          >

                  <i class="fa fa-trash" aria-hidden="true"></i>
            
          </button>













        </div>
        </div>


        <button type="submit" class="btn btn-primary" style="margin-top:50px">Publish Result</button>

 </form>








 </div>




  </div>




                </div>

              </div>

            </div>

          </section>

       <Mybackendfooter></Mybackendfooter>

    </span>
</template>




















<!---<template>
    <div class="container">--->
    

<!----

        <button
        type="button"
        class="flex justify-start ml-2 rounded-md border px-3 py-2 bg-pink-600 text-white"
        @click="addMore()"
      >
        Add More
      </button>


--->

<!---
<Mybackendheader></Mybackendheader>

<MyBackendsidebar></MyBackendsidebar>--->

<!--------

 <button
        type="button"
        class="flex justify-start ml-2 rounded-md border px-3 py-2 bg-pink-600 text-white"
        @click="addMore()"
      >
        <i class="fa fa-plus" aria-hidden="true"></i>
      </button>






     <form @submit.prevent ="admissionresult()"> 
      <div v-for="(course, index) in courses" :key="index">
        <div class="flex justify-start ml-2 mt-4">


            
          <input
            v-model="course.stu_roll" name="stu_roll"
            placeholder="enter you course name"
        
          />
        
          <input
            v-model="course.stu_exm_id"
            placeholder="enter you course name" name="stu_exm_id"
        
          />


        
        
             <select  v-model="course.stu_exm_id"  name="admission_exam_id" style="" required>
                       <option value="" disabled>Select</option>

                       <option style="font-weight:bold;" v-for="selectdept in alladmission" :value="selectdept.admissionexam_id">{{selectdept.admissionexam_name}}</option>

                     </select>
                    
            











              <input
            v-model="course.stu_exm_mark" name="stu_exm_mark"
            placeholder="enter you course name"
    
          />



          <button
            type="button"
            class="ml-2 rounded-md border px-3 py-2 bg-red-600 text-white"
            @click="remove(index)"
            v-show="index != 0"
          >
            Remove
          </button>













        </div>
        </div>


        <button type="submit" class="btn btn-success" style="margin-top:50px">Login</button>

 </form>






----->










<!--------

     <form @submit.prevent ="admissionresult()"> 
      <div v-for="(course, index) in courses" :key="index">
        <div class="flex justify-start ml-2 mt-4">



          <input
            v-model="course.stu_roll" name="stu_roll"
            placeholder="enter you course name"
            class="w-full py-2 border border-indigo-500 rounded"
          />
        
          <input
            v-model="course.stu_exm_id"
            placeholder="enter you course name" name="stu_exm_id"
            class="w-full py-2 border border-indigo-500 rounded"
          />


         <div class="form-group">
        
             <select  v-model="course.stu_exm_id"  class="w-full py-2 border border-indigo-500 rounded"
 id="exampleFormControlSelect1" name="admission_exam_id" style="" required>
                       <option value="" disabled>Select</option>

                       <option style="color:green;font-weight:bold;" v-for="selectdept in alladmission" :value="selectdept.admissionexam_id">{{selectdept.admissionexam_name}}</option>

                     </select>
                    
              </div>











              <input
            v-model="course.stu_exm_mark" name="stu_exm_mark"
            placeholder="enter you course name"
            class="w-full py-2 border border-indigo-500 rounded"
          />

          <button
            type="button"
            class="ml-2 rounded-md border px-3 py-2 bg-red-600 text-white"
            @click="remove(index)"
            v-show="index != 0"
          >
            Remove
          </button>

        </div>
        </div>


        <button type="submit" class="btn btn-success" style="margin-top:50px">Login</button>

 </form>

-------->


<!------       <Mybackendfooter></Mybackendfooter>


    </div>
</template>


-->

<script>




import Mybackendheader from "../backendlayout/Adminheader.vue"
import MyBackendsidebar from "../backendlayout/Adminsidebar.vue"
import Mybackendfooter from "../backendlayout/Adminfooter.vue"





export default {
  name: "HelloWorld",
  props: {
   // msg: String,
  },
  data() {
    return {

              alladmission:{},

      courses: [
        {
          stu_roll:"",
          stu_exm_id: "",
          stu_exm_mark:"",
       
        },
      ],
    };
  },


      components: {
         MyBackendsidebar,
         Mybackendheader,
         Mybackendfooter,
       },
  methods: {


    addMore() {
      this.courses.push({

        stu_roll:"",
        stu_exm_id: "",
        stu_exm_mark:"",
      
      });
    },
    remove(index) {
      this.courses.splice(index, 1);
    },





         displayalladmissionexam(){


     axios.get('/show_all_admission_exam').then(({data}) => (this.alladmission = data));


    },



  admissionresult(){


  //.post('/admission_test_result', {
        // my_prop_name: JSON.stringify(this.courses)


       // })
     // axios.post('/admission_test_result',{stu_roll:this.stu_roll,stu_exm_mark:this.stu_exm_mark,stu_exm_id:this.stu_exm_id})
      

            axios.post('/admission_test_result',{stu_roll:this.courses})

 .then((response) => {

   console.log(response.data)





     //   this.stu_roll = "";
     //   this.stu_exm_mark = "";

     //    this.stu_exm_id = "";

     if(response.data==1){

     this.$router.push('/add_admission_exam')
         Toast.fire({
         icon: 'success',
         title: 'Result Publish Successfully'

     })

      }else{

       Swal.fire({

        icon: 'error',
        title: 'Oops...',
        text: 'Customer Email Or Password Not Valid !!',

       })

      }




        })

      .catch(()=>{

     console.log('error');

      })





  },



  },





         mounted() {


                 this.displayalladmissionexam();


         }







};
</script>


<!----

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
---->