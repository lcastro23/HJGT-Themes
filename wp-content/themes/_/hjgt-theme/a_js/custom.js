//all non-greensock js goes here

jQuery(function($) {

  function setMaxHeight(equalHieightClasses) {
    // Create an empty object to store the heights of all the elements.
    var elementHeights = {};

    // Loop over the array of class names and reset the height of each element.
    equalHieightClasses.forEach(function(class_name) {
      $(class_name).css('height', null);
    });

    // Loop over the array of class names again and add the height of each element
    // to the elementHeights object. Check if the height of each element is a
    // valid number before adding it to the elementHeights object.
    equalHieightClasses.forEach(function(class_name) {
      var height = $(class_name).height();
      if (!isNaN(height)) {
        elementHeights[class_name] = height;
      }
    });

    // Keep track of the maximum height of all the elements.
    var maxHeight = 0;

    // Loop over the elementHeights object and calculate the maximum height.
    for (var class_name in elementHeights) {
      maxHeight = Math.max(maxHeight, elementHeights[class_name]);
    }

    // Set the height of all the elements to the maximum height.
    equalHieightClasses.forEach(function(class_name) {
      $(class_name).height(maxHeight);
    });
  }

  $(document).ready(function() {

    jQuery( ".stateRegions .cardSimple" ).each(function() {
      $(this).click(function() {
        $(this).find(".lds-roller-wrapper").css("display", "flex");
      });
    });


    jQuery( ".horizontalTabs" ).each(function() {
      jQuery(this).find(".tabs:nth-child(2) .tab").addClass("active");
      jQuery(this).find(".tabs:nth-child(2) .tabPane").fadeIn(0);
    });

    function setNumTabCols(winWidth) {
      jQuery( ".horizontalTabs" ).each(function() {
        let count = jQuery(this).children().length;
        if (winWidth >= 768) {
          if (count > 4) {
            count = count - 2;
            jQuery(this).css('gridTemplateColumns', `[pane-start] 1fr repeat(${count}, 1fr) 1fr [pane-end]`);
          } else {
            jQuery(this).css('gridTemplateColumns', `[pane-start] repeat(${count}, 1fr) [pane-end]`);
          }
        } else {
          jQuery(this).css('gridTemplateRows', `repeat(${count}, auto) [pane-start] 1fr [pane-end]`);
        }
    
        jQuery( ".tab" ).click(function(element) {
          let winWidth = jQuery(window).outerWidth();
          element.preventDefault();
          let targetID = jQuery(this).attr('href');
    
          if ( !jQuery(this).hasClass("active") ) {
            jQuery(this).parents( ".horizontalTabs" ).find(".tab").removeClass("active").next().fadeOut();
            jQuery(this).addClass("active");
            jQuery(this).next().fadeIn(400, function() {
              if (winWidth < 768 ) {
                let headerHigh = jQuery("#wrapper-navbar").height();
                console.log(targetID);
                var target = jQuery(targetID).offset().top;
                gsap.to(jQuery(window),.5,{scrollTo:{y:target-headerHigh}})
              }
            });
    
          }
        });
        
      }); //end horizontalTabs each loop
    }

    $(function() {
      var resizeEnd;
      $(window).on('resize', function() {
          clearTimeout(resizeEnd);
          resizeEnd = setTimeout(function() {
              $(window).trigger('resize-end');
          }, 200);
        });
    });
      
    $(window).on('resize-end', function() {
        resizeIt();
    });
    
    resizeIt();

    function resizeIt() {
      let winWidth = $(window).outerWidth();
      // let bodyWidth = $('body').outerWidth();
      var equalHieightClasses = [".matchHeightImageCols"];

      if (winWidth >= 576) {
        equalHieightClasses.push(".horizontalTabs .tabPane");
      }

      setMaxHeight(equalHieightClasses);
      
      //anything that needs to be resized goes in here
      setNumTabCols(winWidth);

      if ($( ".verticalNav" ).length) {
        
        $( ".verticalNav" ).each(function() {

          $(this).find(".linkWrapper a").each(function() {
            if ($(this).attr("href") == "#") {
              $(this).removeAttr("href");
            }
          });
          if ($( ".playerRankings" ).length) {
          var currentUrl = window.location.href;
              $.urlParam = function(name){
                var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(currentUrl);
                    if (results==null) {
                      return null;
                    }
                    return decodeURI(results[1]) || 0;
                }
              var poydiv = $.urlParam('poydiv');
              console.log(poydiv);
          }

          $(this).find("> *").each(function(i) {
            if (poydiv) {
              if (poydiv == "2279" && $( this ).index() == 1) {
                $(this).addClass("active");
              } else if (poydiv == "2281" && $( this ).index() == 2) {
                $(this).addClass("active");
              } else if (poydiv == "2280" && $( this ).index() == 3) {
                $(this).addClass("active");
              } else if (poydiv == "2282" && $( this ).index() == 4) {
                $(this).addClass("active");
              } else if (poydiv == "2719" && $( this ).index() == 5) {
                $(this).addClass("active");
              } else if (poydiv == "2714" && $( this ).index() == 6) {
                $(this).addClass("active");
              } 
            } else {
              if ($( this ).index() == 1) {
                $(this).addClass("active");
              }
            }
              
          });

          if (winWidth <= 1023) {
            $(this).find(".linkWrapper a").click(function(element) {
              element.preventDefault();
              $(this).parents(".conWrapper").toggleClass("active");
            });
          }

        });
      
        if (winWidth >= 1024) {
          
          
          $( ".verticalNav" ).each(function() {
            $(this).find(".conWrapper").hover(
              function() {
                $(this).parents(".verticalNav").find( ".conWrapper" ).removeClass("active")
                $(this).addClass("active");
            }, function() {
              $(this).removeClass("active");
              $(this).parents(".verticalNav").find( ".conWrapper" ).first().addClass("active");
            });

            var prevHeight = 0;
            $(this).find("> *").each(function(i) {
              
              let myHeight = ($( this ).hasClass("conWrapper")) ? $(this).find(".linkWrapper").outerHeight() : $(this).outerHeight();
  
              if ($( this ).index() != 0) {
                if ($( this ).hasClass("conWrapper")) {
                  $( this ).find(".linkWrapper").css('marginTop', prevHeight);
                } else {
                  $( this ).css('marginTop', prevHeight);
                }
              } 
              prevHeight = myHeight + prevHeight;
            });

          });
        }
  
      } //end verticalNav lenght check

      
    }; // end resizeIt
      

  }); //end ready
}); //end jquery for wordpress