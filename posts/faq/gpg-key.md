---
title: Do you have a GPG key?
category: other
---

[Yep, here it is](https://keybase.io/lbry/key.asc).

<pre><code id="keybase-key"></code></pre>
<script type="text/javascript">
  try {
    var request = new XMLHttpRequest();
    request.open('GET', 'https://keybase.io/lbry/key.asc', true);
    request.onload = function() {
      if (request.status >= 200 && request.status < 400) {
        el = document.getElementById('keybase-key');
        el.textContent = request.responseText;
      }
    };
    request.send();
  } catch(e) {}
</script>
