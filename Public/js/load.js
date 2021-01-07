// NOTE: This codepen references https://codepen.io/box-platform/pen/xBRLmP for static assets

// How to use this CodePen:
// 1. Get started with Box Platform and create an application: https://developer.box.com/docs/getting-started-box-platform

// 2. Generate an access token using an SDK or use a developer token from https://app.box.com/developers/console/ -> your application -> configuration in the left sidebar -> Generate Developer Token

// 3. Whitelist 'https://s.codepen.io' in your CORS allowed origins in https://app.box.com/developers/console/ -> your application -> configuration in the left sidebar -> CORS Domains

// 4. Upload a file using a SDK or to your Box account and get a file ID

// 5. Enter your access token below, replacing the existing access token. Replace the file ID with yours from step 4. If you do so, comment out the 'collection' option passed into preview.show().

// NOTE: This codepen uses https://codepen.io/box-platform/pen/xBRLmP for static assets and authentication. The token used is a readonly token accessing public data in a demo enterprise.

var configData = {

    ACCESS_TOKEN: "GqWR1UYK8gVQR8g6VttAskUzpeOunaf3",
    FILE_ID: '<?php print_r($ID)?>'


}
var preview = new Box.Preview();
preview.show(configData.FILE_ID, configData.ACCESS_TOKEN, {
    container: '.preview-container',
    showDownload: true,
    // Comment out the following if you are using your own access token and file ID
    collection: [configData.FILE_ID]
});