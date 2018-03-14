$(document).ready(function () {
    var status_token = localStorage.getItem("status_token");
    var lbry_channel_name_sync = localStorage.getItem("lbry_channel_name_sync");

   if (status_token || lbry_channel_name_sync){
       var url = "/youtube/status/" + status_token;
       $("#sync-status").show();
       $("#sync-status").html("To see the sync status of channel: " +lbry_channel_name_sync + " " + "Please" + ' <a href=' +"'" + url + "'" + '>Click Here </a>');
   }
});