<template>
    <div>




 <div class="card card-primary" style="width:550px;margin-top:25px;margin-left:40px;">


<!-- {{this.$route.params.id}} -->
<div class="card-header">
  <h3 class="card-title">Edit Department</h3>

</div>

<form enctype="multipart/form-data" role="form" @submit.prevent = "updateprofession()">

<div class="card-body">


  <div class="form-group">
  <label>Profession Name</label>
  <input v-model="form.Profession_name" type="text" name="Profession_name"
  class="form-control" :class="{ 'is-invalid': form.errors.has('Profession_name') }" placeholder="Enater Profesion Name">
  <has-error :form="form" field="Profession_name"></has-error>
  </div>


  <div class="form-group">
       <label for="exampleFormControlSelect1">Select Department</label>
         <select  v-model="form.pro_department_id" class="form-control" id="exampleFormControlSelect1" name="pro_department_id" :class="{ 'is-invalid': form.errors.has('pro_department_id') }" style="" required>
           <option value="" disable>Select</option>
           <!-- <option style="color:black;font-weight:bold;" disable>Select</option> -->
           <option style="color:green;font-weight:bold;" v-for="selectdept in alldepartment" :value="selectdept.department_id">{{selectdept.department_name }}</option>

         </select>
         <has-error :form="form" field="pro_department_id"></has-error>
  </div>

  <div class="form-group">
  <label>Profession Salary</label>
  <input v-model="form.profession_salary" type="number" name="profession_salary"
  class="form-control" :class="{ 'is-invalid': form.errors.has('profession_salary') }" placeholder="Enater Profesion Salary">
  <has-error :form="form" field="profession_salary"></has-error>
  </div>


  <div class="form-group">
  <label>Profession Added Date</label>
  <input v-model="form.profession_added_date" type="text" name="profession_added_date"
  class="form-control" :class="{ 'is-invalid': form.errors.has('profession_added_date') }" placeholder="07-02-2010">
  <has-error :form="form" field="profession_added_date"></has-error>
  </div>
















      <button type="submit" class="btn btn-primary">Update</button>

</div>

</form>


</div>







    </div>
</template>

<script>
    export default {


      data () {
        return {
alldepartment:{},
                    // allmydepartment:{},
                    // allmysemester:{},
                    // allmyteacher:{},

                  //  allmydepartment:{},

          // Create a new form instance
          form: new Form({


            profession_id: '',
            pro_department_id: '',
            Profession_name: '',
            profession_salary:'',
            profession_added_date:''



          })
        }
      },


methods:{



  showalldepartmentinform(){


 axios.get('/show_all_department_in_form').then(({data}) => (this.alldepartment = data));


},




     updateprofession(){

     this.form.post('/update_profession/'+this.$route.params.profession_id)
        .then((response)=>{
         this.$router.push('/add_profession')

          Toast.fire({
          icon: 'success',
          title: 'Profession Update Successfully'
          })

          })
          .catch(()=>{

            console.log('error');

          })



    },







},




        mounted() {

         this.showalldepartmentinform();
        //  this.showalldepartmentinform();

        //  this.placeholder();

        // this.showalldepartmentincourse();
        // this.showallsemeterincourse();
        // // this.showalltecheruncourse();
        // this.showalltecheruncourse();

      //  this.showalldepartmentincourse();

        axios.get('/edit_professionplaceholder_value/'+this.$route.params.profession_id)
        .then((response)=>{

        this.form.fill(response.data)

        })



        },



    }
</script>
