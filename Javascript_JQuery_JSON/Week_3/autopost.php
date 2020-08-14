<form id="target">
<input type="text" name="one" value="Hello There" style="vertical-align: middle;"/>
<img id="spinner" src="spinner.gif" height="25" style="vertical-align: middle;displayname: none;">
</form>
<div id="result"></div>
<script type="text/javascript">
$('#target').change(function (event){
    $('#spinner').show();
    var form = $('#target');
    var txt = form.find('input[name="one"]').val();
    window.console && console.log('Sending POST');
    $.post('autoecho.php',{'val': txt},
    function (data){
        window.console && console.log(data);
        $('#result').empty().append(data);
        $('#spinner').hide();
    }).error(function (){
        $('#target').css('background-color','red');
        alert("Dang!");
    });
});
</script>