const { Preview } = Box;
const preview = new Preview();
var configData = {

    ACCESS_TOKEN: "GzKxn6IbnaP2HBEDN98TRsR7nScqrZQ8",
    FILE_ID: '128140677013?s=nplent87e2zq3d5pvats7opbs62fa8ah',
    FILE_ID_TEXT: '',
    FILE_ID_DOC: ''
}
var preview = new Box.Preview();
preview.show(configData.FILE_ID, configData.ACCESS_TOKEN, {
    container: '.preview-container',
    showDownload: true,
    // Comment out the following if you are using your own access token and file ID
    collection: [configData.FILE_ID, configData.FILE_ID_VIDEO]
});