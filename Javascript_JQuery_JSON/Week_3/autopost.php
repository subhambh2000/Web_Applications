<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
crossorigin="anonymous"></script>
<form id="target">
    <input type="text" name="one" value="Hello There" style="vertical-align: middle;"/>
    <img id="spinner" src="spinner.gif" height="25" style="vertical-align: middle;display: none;">
</form>
<div id="result"></div>
<script type="text/javascript">
    $('#target').change(function (event) {
        event.preventDefault();
        $('#spinner').show();
        var form = $('#target');
        var txt = form.find('input[name="one"]').val();
        window.console && console.log('Sending POST');
        $.post('autoecho.php',{'val': txt},
            function (data){
                window.console && console.log(data);
                $('#result').empty().append(data);
                $('#spinner').hide();
            }).fail(function (){
            //$('#target').css('background-color','red');
            //alert("Dang!");
            windows.console && cosnole.log('error');
        });
        return false;
    });
</script>