/**
 * Created by eMASYS ND on 7/31/2017.
 */
$(document).ready(function(){
    var buttons = document.getElementById('buttons');
    var clear = document.getElementById('clear');
    var answer = document.getElementById('results');
    let expressions = document.getElementById('expressions');

        $('#err').hide();

    $('#buttons').on('click', function(e) {

        if (e.target.nodeName === 'LI') {
            var v = e.target.innerHTML;
            console.log(expressions.innerHTML.length);
            if (v === '=') {
                try {
                    answer.innerHTML = eval(expressions.innerHTML);
                } catch(e) {
                    answer.innerHTML = "sign error";
                }
            } else if(v ==='AC'){
                expressions.innerHTML = "";
                answer.innerHTML = "";
                $('#results').css("fontSize","45px");
                $('#expressions').css("fontSize","28px");
                $('.typed-cursor').css("fontSize","28px");
            }
            else if(v==='C'){
                var c = expressions.innerHTML;
                if(expressions.innerHTML.length < 14) {
                    expressions.innerHTML = c.slice(0,c.length-1);
                    answer.innerHTML = "";
                    $('#results').css({"fontSize":"26px","fontWeight":"Bolder"});
                    $('#expressions').css("fontSize","28px");
                    $('.typed-cursor').css("fontSize","28px");

                }else{
                    expressions.innerHTML = c.slice(0,c.length-1);
                    answer.innerHTML = "";
                    if(expressions.innerHTML.length === 28) {
                        $('#err').show();
                    }
                }
            }
            else{
                if(expressions.innerHTML.length <= 11) {
                    $('#err').hide();
                    expressions.innerHTML += v;
                    $('#results').css("fontSize","40px");
                    $('#expressions').css("fontSize","28px");
                    $('.typed-cursor').css("fontSize","28px");
                }else if(expressions.innerHTML.length === 28) {
                    $('#err').show();
                }else{
                    $('#err').hide();
                    expressions.innerHTML += v;
                    $('#results').css("fontSize","16px");
                    $('#expressions').css("fontSize","12px");
                    $('.typed-cursor').css("fontSize","12px");
                }
            }
        }
    });

});

