/**
 * Created by EMASYS ND on 7/11/2017.
 */

//  aonauwvhzz10ppg7di4tirk9htv5ss
// https://api.twitch.tv/kraken/beta/streams/random?limit=10

$(document).ready(function(){

    $("#search").click(function(){
        var searchTerm = $("#searchTerm").val();
        $.ajax({
            type:"GET",
            url: 'https://api.twitch.tv/kraken/search/channels?query='+searchTerm+'&limit=10',
            headers: {
                "Client-ID": 'aonauwvhzz10ppg7di4tirk9htv5ss'},
            success: function(data){
                console.log(data);
                $("#searchTerm").attr("placeholder", "Search a channel...").val("").focus().blur();
                $("#resultField").html('');
                $("#title").html('');
                $("#title").prepend("<h1>Top followed channels associated with "+'"'+searchTerm+'"'+"</h1><hr>");
                for( var j = 0; j < data.channels.length; j++){

                    if(data.channels[j].game==""){
                        var game_search ="OFFLINE";
                    }else game_search ="ONLINE";

                    if(data.channels[j].logo){
                        var logo_search = data.channels[j].logo;
                    }else {logo_search = 'https://www.jobsheet.org/template/jobsheet/css/img/no-logo.png';}

                    $("#resultField").prepend("<div class='row one_line'><div class='col-md-2 logo'><img src="+logo_search+" /></div><div class='col-md-4 display_name'><a href="+data.channels[j].url+" target='_blank'><h1>"+data.channels[j].display_name+"</h1></a></div><div class='col-md-6 game'><h4>"+game_search+"</h4><p>"+data.channels[j].game+"</p></div></div>");
                }



            }//end success1
        });//end ajax call1

    });//end click function1

    $.ajax({
        type:"GET",
        url: 'https://api.twitch.tv/kraken/streams/featured?limit=10',
        headers: {
            "Client-ID": 'aonauwvhzz10ppg7di4tirk9htv5ss'},
        success: function(data1){
            // console.log(data1);
            for(var i = 0 ; i < data1.featured.length; i++)
                if( data1.featured[i].stream.channel.logo){
                    $("#resultField").prepend("<div class='row one_line'><div class='col-md-2 logo'><img src="+data1.featured[i].stream.channel.logo+" /></div><div class='col-md-4 display_name'><a href="+data1.featured[i].stream.channel.url+" target='_blank'><h1>"+data1.featured[i].stream.channel.display_name+"</h1></a></div><div class='col-md-6 game'><br><p>"+data1.featured[i].stream.channel.game+"</p></div></div>");
                    // console.log(data1.featured[i].stream.chanel.url);
                } else  $("#resultField").prepend("<div class='row one_line'><div class='col-md-2 logo'><img src='http://www.jobsheet.org/template/jobsheet/css/img/no-logo.png' /></div><div class='col-md-4 display_name'><a href="+data1.featured[i].stream.channel.url+" target='_blank'><h1>"+data1.featured[i].stream.channel.display_name+"</h1></a></div><div class='col-md-6 game'><br><p>"+data1.featured[i].stream.channel.game+"</p></div></div>");

            // $("#info").prepend("<div class='col-md-4 display_name'><h1>"+data1.featured[i].stream.channel.display_name+"</h1><div>");


        }//end success1
    });//end ajax call 2


    $("#searchTerm").keypress(function(e){
        if(e.keyCode==13){
            $("#search").click();
        }
    });

});


