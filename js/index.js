
$(document).ready(function () {
    document.querySelector('.mass-delete').disabled = true;
    $(".boxcheck").change(function(){
        var checkboxes = document.querySelectorAll('input[type="checkbox"]');
        if(Array.prototype.slice.call(checkboxes).some(x => x.checked)){
          //no checkbox checked
          document.querySelector('.mass-delete').disabled = false;
        }else{
            document.querySelector('.mass-delete').disabled = true;
        }
    })
});