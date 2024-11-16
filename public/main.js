function updateTime(t,finished){
    $.ajax({
        url:"/api/my-courses",
        method:"post",
        data:{
            time:t,
            course_id:$("[data-course]").attr("data-course"),
            admin_id:$("[data-admin]").attr("data-admin"),
            finished:+finished
        },
        headers:{
            "X-CSRF-TOKEN":$("meta[name=csrf-token]")
        },
       
    }
    )
  }


  function onPlayerStateChange(event) {

    if(event.data == YT.PlayerState.PAUSED ){
    
           updateTime(player.getCurrentTime().toFixed(2),false)
      }
      if(event.data == YT.PlayerState.ENDED)
      {
        updateTime(player.getCurrentTime().toFixed(2),true)
      }
    }

    function onPlayerReady()
    {
        console.log("ready")
    }