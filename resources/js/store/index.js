export default {




  state:{


    student:[],



    studentgivesemesterfee:[],
    alllibarybook:[],
    allcourse:[],



  },

  getters:{


    getStudent(state){
      return state.student

    },

    getallCourse(state){
      return state.allcourse

    },






    getStudentgivesemesterfee(state){
      return state.studentgivesemesterfee

    },

    getLibarybook(state){

    return state.alllibarybook

    },







   },

   actions:{



     allStudent(context){

    axios.get('/all_student_show')
        .then((response)=>{

        context.commit('Ragibstudent',response.data.students)

        })


     },




     allStudentgivesemesterfee(context){

    axios.get('/all_student_give_semester_fee_show')
        .then((response)=>{

        context.commit('Ragibstudentsemesterfee',response.data.myallstudentssemesterfee)

        })


     },


     Searchstudentsemesterfee(context,payload){

    axios.get('/studentsemesterfeesearch?s='+payload)

        .then((response)=>{

        context.commit('getSearchsemesterfee',response.data.searchsemesterfee)

        })


     },









         Searchstudent(context,payload){

        axios.get('/studentsearch?s='+payload)

            .then((response)=>{

            context.commit('getSearchstudent',response.data.searchstudents)

            })


         },





         Searchlibarybook(context,payload){

          axios.get('/searchbook?s='+payload)

            .then((response)=>{

            context.commit('getSearchlibarybook',response.data.searchlibarybook)

            })


         },








         allLibarybookshow(context){

        axios.get('/display_all_libary_book')
            .then((response)=>{

            context.commit('Libarybook',response.data.mylibarybook)

            })


         },



         allCourse(context){

        axios.get('/display_myall_courses')
            .then((response)=>{

            context.commit('Ragibcourse',response.data.mycourse)

            })


         },










  },

  mutations:{


 Ragibstudent(state,data){

 return state.student = data

},


Ragibcourse(state,data){

return state.allcourse = data

},


Ragibstudentsemesterfee(state,data){

return state.studentgivesemesterfee = data

},





getSearchstudent(state,payload){

  state.student = payload

},

getSearchsemesterfee(state,payload){

  state.studentgivesemesterfee = payload

},




 Libarybook(state,data){

 return state.alllibarybook = data

},




getSearchlibarybook(state,payload){

  state.alllibarybook = payload

},








},









}
