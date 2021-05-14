<script type="text/javascript">
    function windoeOpen()
    {
        window.location.href = "{{asset($archivo->ruta.'/'.$archivo->nombre)}}";
    }
	</script>
<body onload ="windoeOpen()">