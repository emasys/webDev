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
            var showing, streaming;
            if (data.stream === null) {
                showing = "Nothing";
                streaming = '<span class="offline">offline</span>';
            } else if (data.stream === undefined) {
                showing = "Account Closed";
                streaming = '<span class="offline">offline</span>';
            } else {
                showing = data.stream.game;
                streaming = '<span class="online">online</span>';
            };
            $.getJSON(makeURL("channels", channel), function(data) {
                channelLogo = data.logo;
                channelUrl = data.url;
                channelName = data.display_name;
                content = "<div class=\"card\" >" +
                    "<div class=\"row\">" +
                    "<div class=\"col-3 \"><img src='" + channelLogo + "' class='iconize'></div>" +
                    "<div class=\"col-4  hidden-xs-down text-right cardText\">" +
                    "<h5 class='title'>Channel Name:</h5>" +
                    "<p class=\"card-lines\">Currently Streaming:</p>" +
                    "<p class=\"card-lines borders status\" >Status:</p>" +
                    "</div>"+
                    "<div class=\"col-8  col-sm-5 offset-1 offset-sm-0 cardText\">" +
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
    $(".nav-link").click(function() {
        $(".nav-link").removeClass("active");
        $(this).addClass("active");

    });
});