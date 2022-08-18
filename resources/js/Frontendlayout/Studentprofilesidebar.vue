<template>
<div>




    <div class="jhshd bg-primary" style="height:1000px">

                              <ul class="list-group" style="margin-top:-20px;width:228px">
                                

                                <li class="list-group-item bg-primary" style="font-size:20px;font-weight:bold" >

                                
                               
                               <router-link to="/student_profile" style="text-decoration:none">Student Profile</router-link>


                            </li>


                                <li class="list-group-item bg-primary" style="font-size:16px" >

                               <router-link to="/student_all_semester_fee_frontend" style="text-decoration:none"> All Semester Fee</router-link>

                                </li>



                                <li class="list-group-item bg-primary" style="font-size:16px" >

                               <router-link to="/student_due_frontend" style="text-decoration:none">Current Semester Fee</router-link>

                                </li>


                                   <li class="list-group-item bg-primary" style="font-size:16px" >

                               <router-link to="/student_course_frontend" style="text-decoration:none">Course</router-link>

                                </li>


                                  <li class="list-group-item bg-primary" style="font-size:16px" >

                               <router-link to="/student_this_semester_result_frontend" style="text-decoration:none">Mark Sheet</router-link>

                                </li>


                                    <li class="list-group-item bg-primary" style="font-size:16px" >

                               <router-link to="/student_all_semester_result_frontend" style="text-decoration:none">Result</router-link>

                                </li>



                                    <li class="list-group-item bg-primary" style="font-size:16px" >

                               <router-link to="/libary_book_frontend" style="text-decoration:none">Libary</router-link>

                                </li>



                          



                                <!----
                                <li class="list-group-item bg-primary" style="font-size:16px" >All Coruse</li>
                                <li class="list-group-item bg-primary" style="font-size:16px" >Result</li>
                                <li class="list-group-item bg-primary" style="font-size:16px" >Backlock</li>


                                --------->
                              
                              </ul>
              
                     </div>




</div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
