jQuery(function($) {
  $(document).ready(function() {

  var winwidth = jQuery( window ).width();

  //Begin Sticky Header
  let sticky_tl = gsap.timeline({
    paused: true,
    scrollTrigger: {
      trigger: "body",
      toggleActions: "play none reverse none",
      start: "top -10px",
      end: "+=5"
    }
  });

  sticky_tl.to("#jr_head_logo", {height: "40px"})
  .to(".quickLinks", {height: "0", overflow: "hidden"}, 0);

  
//.to("#upperNav", {height: "0", overflow: "hidden"}, 0)


//   //Begin Standard Navigation
//   jQuery.each(jQuery(".stand_menu_ul>.menu-item-has-children"), function(index, element) {
// 	var subMenu = jQuery(element).children('ul'),
//   tl;

// 	if(subMenu.length != 0) {
//     var tl = new gsap.timeline({paused:true});

// 		tl.set (subMenu, {display: 'block'})
//     .from(subMenu, .2, {height:0, autoAlpha: 0});

// 		element.subMenuAnimation = tl;

// 		jQuery(element).hover(menuItemOver, menuItemOut);
// 	}
// });

// function menuItemOver(e) {
//   this.subMenuAnimation.play();
// }

// function menuItemOut(e) {
// 	this.subMenuAnimation.reverse();
// }

      //begin fancy mobile menu
if (winwidth < 992 ) {

  let mobile_menu = gsap.timeline({
    scrollTrigger: {
      trigger: "#site_content",
      toggleActions: "play none none none",
      start: "top top",
      end: "bottom bottom",
      onUpdate: (self) => {
          if(self.direction == -1){
            mobile_menu.reverse();
          } else if (self.direction == 1){
            mobile_menu.play();
          }
      }

    }
  });

  mobile_menu.to("#menu_items", { duration: 1, bottom: -400 });

}//end width check

    var mm1 = new TimelineMax();
        mm1.set(jQuery('body'), {overflow: 'hidden'})
        mm1.set(jQuery('#mobile_jr_menu-1'), {display: 'flex'})
        mm1.from(jQuery('.inner_jr_mobile'), .75, {x:'+=400'});
        mm1.pause();


    jQuery( ".links_mm_1.collapsed" ).each(function( index, element ) {
          var activeout = gsap.timeline({paused:true});
              activeout.to($( this ).find( '.arrow_icon' ), .5, {rotation:180, transformOrigin:"center center"});

              element.animation = activeout;
          });

    jQuery( ".links_mm_1" ).click(function() {


      if ( jQuery( this ).hasClass( "collapsed" ) ) {


          jQuery( ".links_mm_1.collapsed" ).each(function( ) {
                this.animation.reverse();
              });

          this.animation.play();

        } else {

          this.animation.reverse();

        }

      });

    jQuery("#mobile_jr_menu-1").click
    (
    function(e) {
      if(jQuery(e.target).closest('.inner_jr_mobile').length == 0) {
      {
        mm1.reverse();
      }
    }});

    jQuery("#menu_front").click( function () {
      open_menu.play();
    });

    jQuery("#menu_back").click( function () {
      open_menu.reverse();
    });


    jQuery('#jr_menu_mobile img').click(function() {
          mm1.play();
        });

    jQuery("#mobile_m_close").click(function(e) {
        mm1.reverse();
    });

//end fancy mobile menu

  }); //end ready
}); //end jquery for wordpress
