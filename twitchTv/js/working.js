/**
 * Created by EMASYS ND on 7/11/2017.
 *for easier JSON formatting, I recommend firefox developer browser
 *or https://jsonformatter.curiousconcept.com/
 *use those options and thank me later.
 **/

//Array of channels from fcc user stories
var channels = ["DreadzTV","EULCS1",
    "OgamingSC2", "dreamhackcs", "freecodecamp",
    "StarCraft", "Ninja", "ESL_SC2"];
//Variable declaration
var url,channelName,channelUrl, channelLogo, content;

function getChannelInfo() {
    channels.forEach(function(channel) {
        function makeURL(type, name) {
            return 'https://wind-bow.gomix.me/twitch-api/' + type + '/' + name + '?callback=?';
        };
        $.getJSON(makeURL("streams", channel), function(data) {
//                var game,
//                    status;
            var showing, streaming;
            if (data.stream === null) {
                showing = "Offline";
                streaming = "offline";
            } else if (data.stream === undefined) {
                showing = "Account Closed";
                streaming = "offline";
            } else {
                showing = data.stream.game;
                streaming = "online";
            };
            $.getJSON(makeURL("channels", channel), function(data) {
                channelLogo = data.logo;
                channelUrl = data.url;
                channelName = data.display_name;
                content = "<div class=\"card\">" +
                    "<div class=\"row\">" +
                    "<div class=\"col-3 \"><img src='" + channelLogo + "' class='iconize'></div>" +
                    "<div class=\"col-9  cardText\">" +
                    "<h5 class='title'><a href='" + channelUrl + "' target='_blank'>" + channelName + "</a></h5>" +
                    "<p class=\"card-lines\">" + showing + "</p>" +
                    "<p class=\"card-lines borders status\" >" + streaming + "</p>" +
                    "</div></div></div>";
                $(".content").append(content);
            });
        });
    });
};

$(document).ready(function(){
    getChannelInfo();
});
