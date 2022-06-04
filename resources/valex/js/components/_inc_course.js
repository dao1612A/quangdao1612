var Course = {
    init : function (){
        this.saveCourseContent()
        this.nextTab()
    },

    nextTab()
    {
        $(".js-tabs-customer").click(function (event){
            $(".nav-link").removeClass('active')
            $(".js-tab-pane").removeClass('active')
            console.log("Click")
            $(this).addClass('active')
            console.log($($(this).attr('data-id')))
            $($(this).attr('data-id')).addClass('active')
        })
    },

    saveCourseContent()
    {
        let _this = this
        $(".js-course-content").click( function (event){
            event.preventDefault()
            let $this = $(this)
            let name = $('#nameCourse').val();
            let totalVideo = $('#videoCourse').val();
            let totalQuestion = $('#questionCourse').val();
            let contentCourse = $('#contentCourse').val();

            let URL = $this.attr('href')
            $.ajax({
                url: URL,
                type:"POST",
                data:{
                    name : name,
                    video : totalVideo,
                    question : totalQuestion,
                    content : contentCourse
                },
                success:function(response){
                    let html = _this.renderItemCourseContentHtml(name, totalVideo, totalQuestion)
                    $("#tab-content-course").append(html)
                    $('#nameCourse').val('');
                    $('#videoCourse').val('');
                    $('#questionCourse').val('');
                    $('#contentCourse').val('');
                },
            });
        })
    },

    renderItemCourseContentHtml(name, totalVideo, totalQuestion)
    {
        return `<div class="item">
            <p>${name}</p>
            <p>
                <span class="la la-video"> ${totalVideo} Video</span>
                <span class="fa fa-question-circle"> ${totalQuestion} Bài tập</span>
            </p>
        </div>`
    }
}

export default Course
