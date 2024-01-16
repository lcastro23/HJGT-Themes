// comment out this ajax call after you paste the colors below
// jQuery.ajax({
//      url: ajaxurl,
//      type: 'GET',
//      data: {action: 'get_bs_column_colors'},
//      success: function(results) {
//        console.log(results); // sends all custom colors to WP admin console log so you can copy and paste
//      }
//  });


function myColumnBgColorOptions( bgColorOptions ) {

    bgColorOptions.length = 0; //remove default colors
  	bgColorOptions.push(
      // Look in the console log of a WP admin page to get all the colors to copy and paste in here after you have updated the $themeColors variable in custom.php
      // Example list of what console log will show: {name:"primary",color:"#12212e"},{name:"secondary",color:"#CACFD4"},{name:"tertiary",color:"#B53631"}
    );

  	return bgColorOptions;
};

  wp.hooks.addFilter(
    'wpBootstrapBlocks.column.bgColorOptions',
    'tb_theme',
    myColumnBgColorOptions
  );
