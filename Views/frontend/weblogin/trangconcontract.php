<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn01.boxcdn.net/platform/preview/2.34.0/en-US/preview.css" rel="stylesheet" type="text/css"></link>
    <script src="https://cdn01.boxcdn.net/polyfills/core-js/2.5.3/core.min.js"></script>
    <script src="https://cdn01.boxcdn.net/platform/preview/2.34.0/en-US/preview.js"></script>
    <!-- <script src="./Public/js/load.js"></script> -->
    <link href="./Public/css/frontend/contract.css" rel="stylesheet" type="text/css"></link>
    <style>.preview-container {
    border: 1px solid #eee;
    height:950px;
    width: 100%;
}
</style>
</head>
<body>
<div class="preview-container"></div>
</body>
</html>

<script>
    // NOTE: This codepen references https://codepen.io/box-platform/pen/xBRLmP for static assets

   // How to use this CodePen:
   // 1. Get started with Box Platform and create an application: https://developer.box.com/docs/getting-started-box-platform

   // 2. Generate an access token using an SDK or use a developer token from https://app.box.com/developers/console/ -> your application -> configuration in the left sidebar -> Generate Developer Token

   // 3. Whitelist 'https://s.codepen.io' in your CORS allowed origins in https://app.box.com/developers/console/ -> your application -> configuration in the left sidebar -> CORS Domains

   // 4. Upload a file using a SDK or to your Box account and get a file ID

   // 5. Enter your access token below, replacing the existing access token. Replace the file ID with yours from step 4. If you do so, comment out the 'collection' option passed into preview.show().

   // NOTE: This codepen uses https://codepen.io/box-platform/pen/xBRLmP for static assets and authentication. The token used is a readonly token accessing public data in a demo enterprise.

   var configData = {

ACCESS_TOKEN: "9DDXeOZkj5HG5xYK7xe6KTuwViiW8obG",
FILE_ID: '<?php print_r($ID)?>'


}
var preview = new Box.Preview();
preview.show(configData.FILE_ID, configData.ACCESS_TOKEN, {
container: '.preview-container',
showDownload: true,
// Comment out the following if you are using your own access token and file ID
collection: [configData.FILE_ID]
});
</script>