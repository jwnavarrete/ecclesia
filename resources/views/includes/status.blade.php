<script>
        @if(Session::has('message'))                    
            var mensaje = '{{Session::get("message")}}';
            var estado = '{{Session::get("status")}}';
            //toastr.clear();
            switch (estado) {                
                case "danger":
                    toastr.error( mensaje, 'Error!');
                    break;
                case "success":
                    toastr.success( mensaje, 'Exito!');
                    break;
                case "warning":
                    toastr.warning( mensaje, 'Alerta!');
                    break;                
            }

                
        @endif

        var error="";
        @if(session()->has('errors'))
            @foreach($errors->all() as $error)
                error +="{{ $error }}";
            @endforeach

            toastr.error( error, 'Error!');

        @endif
        
        
</script>
