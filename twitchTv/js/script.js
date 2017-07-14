/**
 * Created by EMASYS ND on 7/11/2017.
 *for easier JSON formatting, I recommend firefox developer browser
 *or https://jsonformatter.curiousconcept.com/
 *use those options and thank me later.
 **/

//Array of channels from fcc user stories
var channels = ["DreadzTV","ESL_SC2",
    "OgamingSC2", "dreamhackcs", "freecodecamp",
    "StarCraft", "Ninja", "EULCS1"];
//Variable declaration
var url, url1, channelName, showing, response, channelUrl, channelLogo, streaming, counter, content;
//$(".content").html(content);
$(document).ready(function(){
//API interaction
    for(counter = 0; counter < channels.length; counter++){
        url1 = "https://wind-bow.glitch.me/twitch-api/channels/"+channels[counter]+"?callback=?";//to get offline channel details
        url = "https://wind-bow.glitch.me/twitch-api/streams/"+channels[counter]+"?callback=?";//to get online channel details
        $.getJSON(url, function(data) {
            response = data.stream;
            if (response != null) {
                channelName = response.channel.display_name;
                showing = response.channel.status;
                streaming = "online";
                channelUrl = response.channel.url;
                channelLogo = response.channel.logo;
                content = "<div class=\"card\">" +
                    "<div class=\"row\">" +
                    "<div class=\"col-3 \"><img src='" + channelLogo + "' class='iconize'></div>" +
                    "<div class=\"col-9  cardText\">" +
                    "<h5 class='title'><a href='" + channelUrl + "' target='_blank'>" + channelName + "</a></h5>" +
                    "<p class=\"card-lines\">" + showing + "</p>" +
                    "<p class=\"card-lines borders status\" >" + streaming + "</p>" +
                    "</div></div></div>";
                $(".content").append(content);
                $(".status").removeClass('status');
            }
        });
    }
});