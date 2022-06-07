<link href="{{ asset('css/custom.css') }}" rel="stylesheet">
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
@include('partials.form.validation.scripts')
<script>
    $(function() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        let form = $('#main-form');
        form.parsley();

        $("#showMessage").hide();

        $("#voteButton").on("click", function() {
            //$(this).prop("disabled", true);
            let cbrandId = $(this).attr("data-id")
            $("#voteButton").attr("disabled", true);
            $('#voteButton').addClass("disabled");

            $('.spinloading').html('<i class="fa fa-spinner fa-spin fa-3x fa-fw mx-auto"></i><span class="sr-only">Loading...</span>');

            $.ajax({
            type: "POST",
            url: '{!! route('cbrands.vote') !!}',
            data: {
                'cbrandId' : cbrandId,
            },

            success: function (data) {
                //console.log(data.status)
                $('.spinloading').html('');
                if(data.status === 'success') {
                    $("#showMessage").show();
                    //$('#agentParameter').html(data.html);
                    //alert('User vote successfully saved to this brand!');
                    //let $elm = $("<div style='color: #038a00; padding-bottom:10px;'>"+data.message+"</div>");
                    $("#showMessage").html('<div style="background-color:light-blue; color:green;">'+data.message+'</div>');
                    setTimeout(function(){
                    $('#showMessage').fadeOut('slow');
                    }, 3000);
                }
            }
        });

        });

    });
</script>
