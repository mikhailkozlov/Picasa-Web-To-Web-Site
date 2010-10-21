<?php
// First you need to set some defaults

$gTitle=""; // title of your gallary, if empty it will show: "your nickname' Photo Gallary"
$uName= "user_name"; // your picasaweb user name


/* 

The following values are valid for the thumbsize and imgmax query parameters and are embeddable on a webpage. These images are available as both cropped(c) and uncropped(u) sizes by appending c or u to the size. As an example, to retrieve a 72 pixel image that is cropped, you would specify 72c, while to retrieve the uncropped image, you would specify 72u for the thumbsize or imgmax query parameter values.

*/
$tSize="72c"; // thumbnail size can be 32, 48, 64, 72, 144, 160. cropt (c) and uncropt (u)
$maxSize="720u"; // max image size can be 200, 288, 320, 400, 512, 576, 640, 720, 800. These images are available as only uncropped(u) sizes by appending u to the size or just passing the size value without appending anything. 

// fro more information visit: http://code.google.com/apis/picasaweb/reference.html#Parameters  
