


jQuery(function(){
    var max = 3;
    var checkboxes7 = $('input[type="checkbox"][name="a7[]"]');
    var checkboxes8 = $('input[type="checkbox"][name="a8[]"]');
    var checkboxes11 = $('input[type="checkbox"][name="a11[]"]');
    var checkboxes12 = $('input[type="checkbox"][name="a12[]"]');
    var radio5 = $('input[type="radio"][name="a5"]');
    var checkbox = $('input[type="checkbox"][name="a12[]"]')
    var submitButt = $('input[type="submit"]');
    var w1 = 0, w2 = 0, w3 = 0, w4 = 0;
    checkboxes7.change(function(){
        var current = checkboxes7.filter(':checked').length;
        checkboxes7.filter(':not(:checked)').prop('disabled', current >= max);
        if(current<1){
            w1=0;
        }else
        {
            w1=1;
        };
        submitButt.prop('disabled', (w1 + w2 + w3 + w4) < 4);
    });
    checkboxes8.change(function(){
        var current = checkboxes8.filter(':checked').length;
        checkboxes8.filter(':not(:checked)').prop('disabled', current >= max);
        if(current<1){
            w2=0;
        }else
        {
            w2=1;
        };
        submitButt.prop('disabled', (w1+w2+w3+w4)<4);
    });
    checkboxes11.change(function(){
        var current = checkboxes11.filter(':checked').length;
        checkboxes11.filter(':not(:checked)').prop('disabled', current >= max);
        if(current<1){
            w3=0;
        }else
        {
            w3=1;
        };
        submitButt.prop('disabled', (w1+w2+w3+w4)<4);
    });
    checkboxes12.change(function(){
        var current = checkboxes12.filter(':checked').length;
        checkboxes12.filter(':not(:checked)').prop('disabled', current >= max);
        if(current<1){
            w4=0;
        }else
        {
            w4=1;
        };
        submitButt.prop('disabled', (w1+w2+w3+w4)<4);
    });
    radio5.change(function(){
       if(document.getElementById('5-1').checked==true)document.getElementById('6-2').disabled=false;
            else document.getElementById('6-2').disabled=true;
    });
    checkbox.change(function(){
        if(document.getElementById('12-38').checked==true)document.getElementById('12-38-t').disabled=false;
            else document.getElementById('12-38-t').disabled=true;
    });
});
