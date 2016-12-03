/**
 * customizer.js
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */



( function( $ ) {
    
    
    
            function lebanon_slider() {

                var height = get_height();

                jQuery('#lebanon-slider').camera({
                    height: height + 'px',
                    loader: false,
                    overlay: false,
                    pagination: false,
                    thumbnails: false,
                    transPeriod: 1000,
                    overlayer: false,
                    playPause: false,
                    hover: false,
                });
            }
            
            function get_height() {

                if (jQuery(window).width() < 601) {

                    return jQuery(window).height();
                } else {
                    return jQuery(window).height();
                }


            }

    
	// Site title and description.
	wp.customize( 'blogname', function( value ) {
            
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );
	wp.customize( 'featured_image1_title', function( value ) {
		value.bind( function( to ) {
			$( '.slide1-header' ).text( to );
		} );
	} );
	wp.customize( 'featured_image2_title', function( value ) {
		value.bind( function( to ) {
			$( '.slide2-header' ).text( to );
		} );
	} );
	wp.customize( 'slide1_button1_text', function( value ) {
		value.bind( function( to ) {
                    console.log(value);
                    if( to == '' ) {
                        $( '.slide1_button1' ).hide();
                    }else{
                        $( '.slide1_button1' ).show();
                    }                      
			$( '.slide1_button1' ).text( to );
		} );
	} );
	wp.customize( 'slide1_button2_text', function( value ) {
		value.bind( function( to ) {
                    if( to == '' ) {
                        $( '.slide1_button2' ).hide();
                    }else{
                        $( '.slide1_button2' ).show();
                    }                    
			$( '.slide1_button2' ).text( to );
		} );
	} );
	wp.customize( 'slide2_button1_text', function( value ) {
		value.bind( function( to ) {
                    if( to == '' ) {
                        $( '.slide2_button1' ).hide();
                    }else{
                        $( '.slide2_button1' ).show();
                    }
			$( '.slide2_button1' ).text( to );
		} );
	} );
	wp.customize( 'slide2_button2_text', function( value ) {
		value.bind( function( to ) {
                    if( to == '' ) {
                        $( '.slide2_button2' ).hide();
                    }else{
                        $( '.slide2_button2' ).show();
                    }
                    $( '.slide2_button2' ).text( to );
		} );
	} );
	wp.customize( 'callout1_icon', function( value ) {
		value.bind( function( to ) {

                    $( '.featured-box1 .lebanon-icon span' ).remove();
                    $( '.featured-box1 .lebanon-icon' ).append('<span class="' + to + '"></span>');
                    
		} );
	} );
	wp.customize( 'callout1_title', function( value ) {
		value.bind( function( to ) {

                $( '.featured-box1 .lebanon-title' ).text( to );
                    
		} );
	} );
	wp.customize( 'callout1_text', function( value ) {
		value.bind( function( to ) {

                $( '.featured-box1 .lebanon-desc' ).text( to );
                    
		} );
	} );
	wp.customize( 'callout2_icon', function( value ) {
		value.bind( function( to ) {

                    $( '.featured-box2 .lebanon-icon span' ).remove();
                    $( '.featured-box2 .lebanon-icon' ).append('<span class="' + to + '"></span>');
                    
		} );
	} );
	wp.customize( 'callout2_title', function( value ) {
		value.bind( function( to ) {

                $( '.featured-box2 .lebanon-title' ).text( to );
                    
		} );
	} );
	wp.customize( 'callout2_text', function( value ) {
		value.bind( function( to ) {

                $( '.featured-box2 .lebanon-desc' ).text( to );
                    
		} );
	} );
	wp.customize( 'callout3_icon', function( value ) {
		value.bind( function( to ) {

                    $( '.featured-box3 .lebanon-icon span' ).remove();
                    $( '.featured-box3 .lebanon-icon' ).append('<span class="' + to + '"></span>');
                    
		} );
	} );
	wp.customize( 'callout3_title', function( value ) {
		value.bind( function( to ) {

                $( '.featured-box3 .lebanon-title' ).text( to );
                    
		} );
	} );
	wp.customize( 'callout3_text', function( value ) {
		value.bind( function( to ) {

                $( '.featured-box3 .lebanon-desc' ).text( to );
                    
		} );
	} );
	wp.customize( 'overlay_bool', function( value ) {
		value.bind( function( to ) {

                    if( to == 'on' ) {
                        $('#lebanon-overlay-trigger').show();
                    }else{
                        $('#lebanon-overlay-trigger').hide();
                    }
                    
		} );
	} );
	wp.customize( 'overlay_icon', function( value ) {
		value.bind( function( to ) {

                    $( '#lebanon-overlay-trigger span' ).remove();
                    $( '#lebanon-overlay-trigger' ).append('<span class="' + to + '"></span>');
                    
		} );
	} );
	wp.customize( 'logo_bool', function( value ) {
		value.bind( function( to ) {

                    if( to == 'on' ) {
                        $('#lebanon-logo').removeClass('hidden');
                        $('.site-title, .site-description').addClass('hidden');
                    }else{
                        $('#lebanon-logo').addClass('hidden');
                        $('.site-title, .site-description').removeClass('hidden');                        
                    }
                    
		} );
	} );
	wp.customize( 'logo', function( value ) {
		value.bind( function( to ) {

                    $('#lebanon-logo img').attr('src', to );
                    
		} );
	} );
	wp.customize( 'theme_color', function( value ) {
		value.bind( function( to ) {

                    var uri = $('#lebanon-template-css').attr('href');
                    
                    var new_uri = uri.slice(0, uri.lastIndexOf('/') ) + '/' + to + '.css';
                    
                    $('#lebanon-template-css').attr('href', new_uri );
                    
		} );
	} );
	wp.customize( 'header_font', function( value ) {
		value.bind( function( to ) {
                    
                    $('h1,h2,h3,h4,h5,h6,.slide2-header,.slide1-header,.lebanon-title, .widget-title,.entry-title, .product_title').css({
                        'font-family': to
                    });

		} );
	} );
	wp.customize( 'theme_font', function( value ) {
		value.bind( function( to ) {
                    
                    $('body').css({
                        'font-family': to
                    });

		} );
	} );
	wp.customize( 'menu_font_size', function( value ) {
		value.bind( function( to ) {
                    
                    $('ul.lebanon-nav > li.menu-item a').css({
                        'font-size': to
                    });

		} );
	} );
	wp.customize( 'theme_font_size', function( value ) {
		value.bind( function( to ) {
                    
                    $('body').css({
                        'font-size': to
                    });

		} );
	} );
        wp.customize( 'footer_background_image', function( value ) {
		value.bind( function( to ) {
                    
                    $('.parallax-mirror .parallax-slider').attr('src', to );
                    

		} );
	} );
        wp.customize( 'copyright_text', function( value ) {
		value.bind( function( to ) {
                    
                    $('.lebanon-copyright').text( to );

		} );
	} );
        wp.customize( 'facebook_url', function( value ) {
		value.bind( function( to ) {
                    if( to == '' ) {
                        $('.lebanon-facebook').hide();
                    }else{
                        $('.lebanon-facebook').show();
                    }
		} );
	} );
        wp.customize( 'gplus_url', function( value ) {
		value.bind( function( to ) {
                    if( to == '' ) {
                        $('.lebanon-gplus').hide();
                    }else{
                        $('.lebanon-gplus').show();
                    }
		} );
	} );
        wp.customize( 'instagram_url', function( value ) {
		value.bind( function( to ) {
                    if( to == '' ) {
                        $('.lebanon-instagram').hide();
                    }else{
                        $('.lebanon-instagram').show();
                    }
		} );
	} );
        wp.customize( 'linkedin_url', function( value ) {
		value.bind( function( to ) {
                    if( to == '' ) {
                        $('.lebanon-linkedin').hide();
                    }else{
                        $('.lebanon-linkedin').show();
                    }
		} );
	} );
        wp.customize( 'pinterest_url', function( value ) {
		value.bind( function( to ) {
                    if( to == '' ) {
                        $('.lebanon-pinterest').hide();
                    }else{
                        $('.lebanon-pinterest').show();
                    }
		} );
	} );
        wp.customize( 'twitter_url', function( value ) {
		value.bind( function( to ) {
                    if( to == '' ) {
                        $('.lebanon-twitter').hide();
                    }else{
                        $('.lebanon-twitter').show();
                    }
		} );
	} );
        
        
        
	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
                             
				$( '.site-title a, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title a, .site-description' ).css( {
					'clip': 'auto',
					'color': to,
					'position': 'relative'
				} );
			}
		} );
	} );
        
        wp.customize( 'featured_image1' , function( value ) {
           
            value.bind( function( to ) {
            
//                if( $( '.cameraSlide_0' ).hasClass( 'cameracurrent' ) ) {
//                    
//                    
//                }
            
                $( '.cameraSlide_0 img' ).attr( 'src', to ); 
            });
            
        });
        
        wp.customize( 'featured_image2' , function( value ) {
           
            value.bind( function( to ) {
                $( '.cameraSlide_1 img' ).attr( 'src', to ); 
            });
            
            
        });
        
} )( jQuery );
