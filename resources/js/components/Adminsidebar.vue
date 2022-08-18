<template>
<span>


  <aside class="main-sidebar sidebar-dark-primary elevation-4">

    <router-link to="/admin_dashboard" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </router-link>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
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
                <!-- <i class="fas fa-angle-left right"></i> -->
                <!-- <span class="badge badge-info right"></span> -->
              </p>
            </router-link>
          </li>


          <li class="nav-item has-treeview">
            <router-link to="/add_profession" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Add Profession
                <!-- <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span> -->
              </p>
            </router-link>
          </li>





          <li class="nav-item has-treeview">
            <router-link to="/add_student" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Add Student
                <!-- <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span> add_student-->
              </p>
            </router-link>
          </li>



          <li class="nav-item has-treeview">
            <router-link to="/add_teacher" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Add Teacher
                <!-- <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span> -->
              </p>
            </router-link>

          </li>


          <li class="nav-item has-treeview">
            <router-link to="/add_level" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Add Level
                <!-- <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span> -->
              </p>
            </router-link>
          </li>






          <li class="nav-item has-treeview">
            <router-link to="/add_semester" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Add Semester
                <!-- <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span> -->
              </p>
            </router-link>
          </li>

          <li class="nav-item has-treeview">
            <router-link to="/add_course" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Add Course
                <!-- <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span> -->
              </p>
            </router-link>
          </li>

          <li class="nav-item has-treeview">
            <router-link to="/add_batch" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Add Batch
                <!-- <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span> -->
              </p>
            </router-link>
          </li>


          <li class="nav-item has-treeview">
            <router-link to="/add_hall" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Add Hall
                <!-- <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span> -->
              </p>
            </router-link>
          </li>

          <li class="nav-item has-treeview">
            <router-link to="/add_hall_room" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Add Hall Room
                <!-- <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span> -->
              </p>
            </router-link>
          </li>

          <li class="nav-item has-treeview">
            <router-link to="/add_bus" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Add Bus
                <!-- <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span> add_student-->
              </p>
            </router-link>
          </li>



          <li class="nav-item has-treeview">
            <router-link to="/add_student_give_semester_fee" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Student Semester Fee
                <!-- <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span> add_student-->
              </p>
            </router-link>
          </li>







          <!-- <li class="nav-item has-treeview">
              <router-link href="/add_teacher" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Add Teacher
                <i class="fas fa-angle-left right"></i>
              </p>
                </router-link>

          </li> -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Libary
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <router-link to="/add_libary_book" class="nav-link">
                  <i class="fas fa-angle-right"></i>
                  <p>Add Libary Book</p>
                </router-link>
              </li>


              <li class="nav-item">
                <router-link to="/all_pending_book" class="nav-link">
                  <i class="fas fa-angle-right"></i>
                  <p>All Pending Book</p>
                </router-link>
              </li>

              <li class="nav-item">
                <router-link to="/all_success_book" class="nav-link">
                  <i class="fas fa-angle-right"></i>
                  <p>All Success Book</p>
                </router-link>
              </li>


            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Tables
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/tables/simple.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Simple Tables</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/tables/data.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>DataTables</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/tables/jsgrid.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>jsGrid</p>
                </a>
              </li>
            </ul>
          </li>



        </ul>
      </nav>

    </div>

  </aside>








</span>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
