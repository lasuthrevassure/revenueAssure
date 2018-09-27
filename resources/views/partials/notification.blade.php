
<script>
    @if(Session::has('status'))
        $.notify({
                title: "Success ",
                message: {{ Session::get('status') }}!,
                icon: 'fa fa-check' 
            },{
                type: "info"
        });
    @endif
</script>