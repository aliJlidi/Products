$(document).ready(function () {
    var name = $("#type").text();
    if(name!=""){
    var selector = $("." + name);
    $(selector).show();
    var list = document.getElementById('productType');
    var opts = list.options.length;
    console.log(name);
    for (var i=0; i<opts; i++){
    if (list.options[i].value == name){
        list.options[i].selected = true;
        break;
    }
}
}
    $("#productType").change(function () {
        $(".weight").hide(); $(".height").hide();$(".size").hide();
        var inputVal = $(this).val();
        if(inputVal!="Choose..."){
        var div = $("." + inputVal);
        $(div).show();
    }
    });

});



