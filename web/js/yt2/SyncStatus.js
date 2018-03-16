$(document).ready(function () {
    var status_token = localStorage.getItem("status_token");
    var lbry_channel_name_sync = localStorage.getItem("lbry_channel_name_sync");

   if (status_token || lbry_channel_name_sync){
       var url = "/youtube/status/" + status_token;
       $("#sync-status").show();
       $("#sync-status").html("Hey, " + lbry_channel_name_sync + "! " + "<a href='" + url + "'>" + "See your channel sync status here</a>.");
   }
});