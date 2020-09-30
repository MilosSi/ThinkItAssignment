$(document).ready(function () {
    $(".addtocrew").click(function () {
        let id=$(this).data('crew');
        let shipid=$("#shipid").val();
        $.ajax({
            type:"POST",
            url:"index.php?page=ajaxaddcrewmember",
            data:{
                id,
                shipid
            },
            success:function (podaci,jq,kod) {
                console.log(podaci);
                if(kod.status == 200)
                {
                    window.location.reload();
                }
                else
                {
                    console.log("ERROR 500");
                }
            },
            error:function (err) {
                console.log(`${err.status}`)
            }
        })
    })
})
