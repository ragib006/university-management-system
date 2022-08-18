<template>
<span>


  <aside class="main-sidebar sidebar-dark-primary elevation-4">

    <router-link to="/admin_dashboard" class="brand-link">
     <!-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
                     -->
      <span class="brand-text font-weight-light" style="font-weight:bold;margin-left:30px">Admin Dashboard</span>




    </router-link>




    <!-- Sidebar -->
    <div class="sidebar">
    

      <div class="user-panel mt-3 pb-3 mb-3 d-flex">

        <div class="info">
          <a href="#" class="d-block" style="margin-left:50px">{{admininfo.admin_name}}</a>
        </div>
      </div>




   



       




      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">



          <li class="nav-item has-treeview">
            <router-link to="/add_department" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Add Department
              </p>
            </router-link>
          </li>


       



            <li class="nav-item has-treeview">
            <router-link to="/add_profession" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Add Designation                
              </p>
            </router-link>
          </li>


            <li class="nav-item has-treeview">
            <router-link to="/add_teacher" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Add Teacher         
              </p>
             </router-link>
           </li>


           <li class="nav-item has-treeview">
            <router-link to="/add_level" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Add Level
              </p>
            </router-link>
          </li>

           <li class="nav-item has-treeview">
            <router-link to="/add_batch" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Add Batch
              </p>
            </router-link>
          </li>



          <li class="nav-item has-treeview">
            <router-link to="/add_class_room" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Add Classroom
              </p>
            </router-link>
          </li>





              <li class="nav-item has-treeview">
            <router-link to="/add_course" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Add Course              
              </p>
            </router-link>
          </li>

          
          <li class="nav-item has-treeview">
            <router-link to="/add_student" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Add Student       
              </p>
            </router-link>
          </li>

             
      
<!-----
          <li class="nav-item has-treeview">
            <router-link to="/add_department_tution_fee" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Add Tution Fee
              </p>
            </router-link>
          </li>-------->

          <li class="nav-item has-treeview">
            <router-link to="/add_examination" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Examination
              </p>
            </router-link>
          </li>


          <li class="nav-item has-treeview">
            <router-link to="/show_all_result_exam_wise" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Result
              </p>
            </router-link>
          </li>


       


        











    


       




<!---

          <li class="nav-item has-treeview">
            <router-link to="/add_semester" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Add Semester
                <!-- <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </router-link>
          </li>

      --->

         

<!----
          <li class="nav-item has-treeview">
            <router-link to="/add_hall" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Add Hall
  
              </p>
            </router-link>
          </li>

          <li class="nav-item has-treeview">
            <router-link to="/add_hall_room" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Add Hall Room
          
              </p>
            </router-link>
          </li>

          <li class="nav-item has-treeview">
            <router-link to="/add_bus" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Add Bus
            
              </p>
            </router-link>
          </li>------->




              <li class="nav-item has-treeview">
            <router-link to="/take_studentsemester_fee" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Take Semester Fees
            
              </p>
            </router-link>
          </li>

       


      
      
      
      
      
        
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                All Student
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>





        <ul class="nav nav-treeview">
      
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    CSE
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">

                   <router-link to="/cse_one_one" class="nav-link">         
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>CSE-1/1</p>
                   </router-link>

                  </li>
                  <li class="nav-item">
                    <router-link to="/cse_one_two" class="nav-link">   
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>CSE-1/2</p>
                    </router-link>
                  </li>
                  <li class="nav-item">
                   <router-link to="/cse_two_one" class="nav-link">   
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>CSE-2/1</p>
                    </router-link>
                  </li>
                     <li class="nav-item">
                                   <router-link to="/cse_two_two" class="nav-link">   
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>CSE-2/2</p>
                       </router-link>
                  </li>
                     <li class="nav-item">
                    <router-link to="/cse_three_one" class="nav-link">   
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>CSE-3/1</p>
                       </router-link>
                  </li>
                     <li class="nav-item">
                                      <router-link to="/cse_three_two" class="nav-link">   
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>CSE-2/2</p>
                       </router-link>

                  </li>
                     <li class="nav-item">
                                   <router-link to="/cse_four_one" class="nav-link">   

                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>CSE-4/1</p>
                            </router-link>
                  </li>
                     <li class="nav-item">
                    <router-link to="/cse_four_two" class="nav-link">   
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>CSE-4/2</p>
                            </router-link>
                  </li>
                </ul>
              </li>

            </ul>





        <ul class="nav nav-treeview">
      
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    EEE
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>EEE-1/1</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>EEE-1/2</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>EEE-2/1</p>
                    </a>
                  </li>
                     <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>EEE-2/2</p>
                    </a>
                  </li>
                     <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>EEE-3/1</p>
                    </a>
                  </li>
                     <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>EEE-2/2</p>
                    </a>
                  </li>
                     <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>EEE-4/1</p>
                    </a>
                  </li>
                     <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>EEE-4/2</p>
                    </a>
                  </li>
                </ul>
              </li>

            </ul>







          </li>


   
            <li class="nav-item has-treeview">
            <router-link to="/add_notice" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Add Notice
              </p>
            </router-link>
          </li>
      
      


          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Admission
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item" style="margin-left:30px;">
                <router-link to="/add_admission_exam" class="nav-link">
                  <i class="fas fa-angle-right"></i>
                  <p>Add Admission Exam</p>
                </router-link>
              </li>


              <li class="nav-item" style="margin-left:30px;">
                <router-link to="/admission_result" class="nav-link">
                  <i class="fas fa-angle-right"></i>
                  <p>Admission Result</p>
                </router-link>
              </li>




              <li class="nav-item" style="margin-left:30px;">
                <router-link to="/add_marite_range" class="nav-link">
                  <i class="fas fa-angle-right"></i>
                  <p>Add Marite Range</p>
                </router-link>
              </li>




              


              <!---

              <li class="nav-item" style="margin-left:30px;">
                <router-link to="/all_success_book" class="nav-link">
                  <i class="fas fa-angle-right"></i>
                  <p>All Success Book</p>
                </router-link>
              </li>

              <li class="nav-item" style="margin-left:30px;">
                <router-link to="/all_libary_book_fine_student" class="nav-link">
                  <i class="fas fa-angle-right"></i>
                  <p>Libary Book Fine List</p>
                </router-link>
              </li>-->
            </ul>
          </li>








          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Libary
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item" style="margin-left:30px;">
                <router-link to="/add_libary_book" class="nav-link">
                  <i class="fas fa-angle-right"></i>
                  <p>Add Libary Book</p>
                </router-link>
              </li>


              <li class="nav-item" style="margin-left:30px;">
                <router-link to="/all_pending_book" class="nav-link">
                  <i class="fas fa-angle-right"></i>
                  <p>All Pending Book</p>
                </router-link>
              </li>

              <li class="nav-item" style="margin-left:30px;">
                <router-link to="/all_success_book" class="nav-link">
                  <i class="fas fa-angle-right"></i>
                  <p>All Success Book</p>
                </router-link>
              </li>

              <li class="nav-item" style="margin-left:30px;">
                <router-link to="/all_libary_book_fine_student" class="nav-link">
                  <i class="fas fa-angle-right"></i>
                  <p>Libary Book Fine List</p>
                </router-link>
              </li>
            </ul>
          </li>







              <li class="nav-item has-treeview">
            <a class="nav-link" @click.prevent = "adminlogout()">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                
                Logout
            
              </p>
            </a>
          </li>






        



        </ul>
      </nav>

    </div>

  </aside>








</span>
</template>




<script>
  

    export default {


      data () {
        return {


          admininfo:{},
          

         //showmyallteachers:{},



          // Create a new form instance
          form: new Form({

             //   notice_id: '',
             //   notice_title: '',
             //   notice_description: '',
             //   notice_date:'',
                //student_bus_id:'',
             //   notice_status:'',



          })
        }
      },



   




    methods:{

//search category
//RealSerchstudent:_.debounce(function(){

//this.$store.dispatch('Searchstudent',this.keyword);

//},1000),



showuserinfo(){

axios.get('/admin_info').then(({data}) => (this.admininfo = data));


},




  adminlogout(){


          axios.get('/admin_logout')

        .then((response)=>{


                if(response.data==1){



                 this.$router.push('/admin')

                   Toast.fire({
                   icon: 'success',
                      title: 'Logout Successfully'

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





  }






},


computed:{



},




        mounted() {

          this.showuserinfo();
        


        }
    }
</script>

