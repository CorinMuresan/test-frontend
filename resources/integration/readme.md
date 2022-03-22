#Front End Development:#

Two options

##Hot Module Replacement (HMR)##
run `yarn front`
Livereload of styles and scripts without triggering a whole page refresh.
In order to use it you must add the query string parameter `hmr` to your url : 
Example:
 -No HMR
    `172.16.18.1/awesome-project/index.php?page=hp`
 -HMR
    `172.16.18.1/awesome-project/index.php?page=hp&hmr`

##File Watching##
run `yarn fwatch`
Watches sass and script files for changes and compiles them accordingly. If you have a livereload script or extension the page will be reloaded (similar to the gulp legacy version)

#App Deployment#

`yarn dev` - testing/debugging
`yarn prod` - for production