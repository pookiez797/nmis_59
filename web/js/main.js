var row_index = $(this).closest('tr').index();
var code = row_index-1

$("#changeMyAttribute").click(function(){
    $("#myModal").modal('show')
            .find("#myModalContent")
            .load($(this).attr('value'));
    console.log(code);
    
});