<?php

echo '<!DOCTYPE html>' . "\r\n" . '<html>' . "\r\n\t" . '<head>' . "\r\n\t\t" . '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">' . "\r\n\t\t" . '<title>elFinder 2.0</title>' . "\r\n\r\n\t\t" . '<!-- jQuery and jQuery UI (REQUIRED) -->' . "\r\n\t\t" . '<link rel="stylesheet" type="text/css" media="screen" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.15/themes/smoothness/jquery-ui.css">' . "\r\n\t\t" . '<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>' . "\r\n\t\t" . '<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.15/jquery-ui.min.js"></script>' . "\r\n\r\n\t\t" . '<!-- elFinder CSS (REQUIRED) -->' . "\r\n\t\t" . '<link rel="stylesheet" type="text/css" media="screen" href="css/elfinder.full.css">' . "\r\n\t\t" . '<link rel="stylesheet" type="text/css" media="screen" href="css/theme.css">' . "\r\n\r\n\t\t" . '<!-- elFinder JS (REQUIRED) -->' . "\r\n\t\t" . '<script type="text/javascript" src="js/elfinder.min.js"></script>' . "\r\n\t\t\r\n\t\t" . '<!-- TinyMCE Popup class (REQUIRED) -->' . "\r\n\t\t" . '<script type="text/javascript" src="../tiny-mce/tiny_mce_popup.js"></script>' . "\r\n\t\t\r\n\t\t" . '<!-- elFinder initialization (REQUIRED) -->' . "\r\n\t\t" . '<script type="text/javascript">' . "\r\n\t\t" . 'var FileBrowserDialogue = {' . "\r\n\t\t\t" . 'init : function () {' . "\r\n\t\t\t\t" . 'var elf = $(\'#elfinder\').elfinder({' . "\r\n\t\t\t\t\t" . 'url : \'php/connector.php?type=';
echo $_GET['type'];
echo '\',  // connector URL (REQUIRED)' . "\r\n\t\t\t\t\t" . 'getfile : {' . "\r\n\t\t\t\t\t\t" . 'onlyURL : true,' . "\r\n\t\t\t\t\t\t" . 'multiple : false,' . "\r\n\t\t\t\t\t\t" . 'folders : false' . "\r\n\t\t\t\t\t" . '},' . "\r\n\t\t\t\t\t" . 'getFileCallback : function(url) {' . "\r\n\t\t\t\t\t\t" . 'path = url.path;' . "\r\n\t\t\t\t\t\t" . 'FileBrowserDialogue.mySubmit(path);' . "\r\n\t\t\t\t\t" . '}                     ' . "\r\n\t\t\t\t" . '}).elfinder(\'instance\');' . "\r\n\t\t\t" . '},' . "\r\n\t\t\t" . 'mySubmit : function (URL) {' . "\r\n\t\t\t\t\r\n\t\t\t\t" . 'var win = tinyMCEPopup.getWindowArg("window");' . "\r\n\t\t\r\n\t\t\t\t" . '// insert information now' . "\r\n\t\t\t\t" . 'win.document.getElementById(tinyMCEPopup.getWindowArg("input")).value = URL;' . "\r\n\t\t\r\n\t\t\t\t" . '// are we an image browser' . "\r\n\t\t\t\t" . 'if (typeof(win.ImageDialog) != "undefined") {' . "\r\n\t\t\t\t\t" . '// we are, so update image dimensions...' . "\r\n\t\t\t\t\t" . 'if (win.ImageDialog.getImageData)' . "\r\n\t\t\t\t\t\t" . 'win.ImageDialog.getImageData();' . "\r\n\t\t\r\n\t\t\t\t\t" . '// ... and preview if necessary' . "\r\n\t\t\t\t\t" . 'if (win.ImageDialog.showPreviewImage)' . "\r\n\t\t\t\t\t\t" . 'win.ImageDialog.showPreviewImage(URL);' . "\r\n\t\t\t\t" . '}' . "\r\n\t\t\r\n\t\t\t\t" . '// close popup window' . "\r\n\t\t\t\t" . 'tinyMCEPopup.close();' . "\r\n\t\t\t" . '}' . "\r\n\t\t" . '}' . "\r\n\t\t\r\n\t\t" . 'tinyMCEPopup.onInit.add(FileBrowserDialogue.init, FileBrowserDialogue);' . "\r\n\r\n\t\t" . '</script>' . "\r\n\t\t\r\n\t" . '</head>' . "\r\n\t" . '<body>' . "\r\n\r\n\t\t" . '<!-- Element where elFinder will be created (REQUIRED) -->' . "\r\n\t\t" . '<div id="elfinder"></div>' . "\r\n\r\n\t" . '</body>' . "\r\n" . '</html>' . "\r\n";

?>
