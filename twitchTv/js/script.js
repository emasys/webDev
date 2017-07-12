/**
 * Created by EMASYS ND on 7/11/2017.
 *for easier JSON formatting, I recommend firefox developer browser
 *or https://jsonformatter.curiousconcept.com/
 *use those options and thank me later.
 **/

//Array of channels from fcc user stories
var channels = ["ESL_SC2", "summit1g", "LIRIK", "YoDa",
    "OgamingSC2", "cretetion", "freecodecamp", "storbeck",
    "habathcx", "RobotCaleb", "noobs2ninjas", "DrDisRespectLIVE"];

//Variable declaration
var url, channelName, channelImage, channelUrl, channelLogo, streaming;

$(document).ready(function(){

//API interaction
for(var counter = 0; counter < channels.length; counter++){
    url = "https://wind-bow.glitch.me/twitch-api/streams/" + channels[counter] + "?callback=?";
    $.getJSON(url, function(data) {
        if(data.stream != null){
            console.log(data.stream);
            channelName = data.stream.channel.display_name;
            channelImage = 5;
            streaming = true;
            channelUrl = data.stream.channel.url;
            channelLogo = data.stream.channel.logo;
        }else{
            channelName = channels[i];
            streaming = false;
        }

        //DOM

    });
}


    $('.hover').on('click',function(){
        $(this).toggleClass('flip');
    });
    $('.hover').hover(function(){
        $(this).toggleClass('flip');
    },function(){
        $(this).removeClass('flip');
    });
});







/*
function getResult() {
    try{
        $.ajax({
            type: "GET",
            url: "https://wind-bow.glitch.me/twitch-api/streams/dreamhackcs",
            headers: {"Client-ID": 'it87glkgmid08t8iwendio6th4nz8r'},
            success: function (data) {
                console.log(data.stream);

                var channelName = data.stream.channel.display_name;
                var channelImage = 5;
                var channelUrl = data.stream.channel.url;
                var channelLogo = data.stream.channel.logo;

            }

        });
    }catch (err){
        console.log("not working");
    }
}
*/
