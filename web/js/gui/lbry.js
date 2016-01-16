var lbry = {
  isConnected: false,
  rootPath: 'http://staging.lbry.io/',
  colors: {
    primary: '#155B4A'
  }
};

//core
lbry.connect = function(callback)
{
  //dummy connect function - one of the first things we should do is dump people to get help if it can't connect
  setTimeout(function() {
    lbry.isConnected = true;
    callback();
  }, 1500);
}

lbry.getBalance = function()
{
  return 10000;
}

lbry.search = function(query, callback)
{
  //simulate searching via setTimeout with
  setTimeout(function() {
    var results = query && 'wonderfullife'.startsWith(query) ?
          [{
              'name' : 'wonderfullife',
              'img' : 'http://staging.lbry.io/img/wonderful-life-cover.jpg',
              'title' : 'It\'s A Wonderful Life',
              'cost_est' : 740,
              'description' : 'An angel helps a compassionate but despairingly frustrated businessman by showing what life would have been like if he never existed.',
            }] : [];

    callback(results);
  }, 300);
}

//utilities
lbry.formatCredits = function(amount, precision)
{
  return amount.toFixed(precision || 1);
}

lbry.loadJs = function(src, type, onload)
{
  var lbryScriptTag = document.getElementById('lbry'),
      newScriptTag = document.createElement('script'),
      type = type || 'text/javascript';
      
  newScriptTag.src = src;
  newScriptTag.type = type;
  if (onload)
  {
    newScript.onload = onload;
  }
  lbryScriptTag.parentNode.insertBefore(newScriptTag, lbryScriptTag);
}

lbry.imagePath = function(file)
{ 
  return lbry.rootPath + '/img/' + file; 
}