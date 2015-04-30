/*!
 * jQuery Nested Nav
 * Original author: @amurrell
 * Licensed under the MIT license
 */

;( function( $ ) {

	var uniqueNum = function() {
		return Math.floor(Math.random() * 100000);
	};

	var storedWidth = $(window).width();

	$.fn.nestednav = function( options ) {

		var settings = $.extend({}, $.fn.nestednav.defaults, options);

		/*
		 * Due to varied performance with prepend, html, append, there's a delay
		 */
		function setHeight ( vars, timeout ) {
			setTimeout(function(){

				//vars.computedHeight = vars.wrapper.outerHeight();
				if ( vars.window.width() > settings.menuCollapseWidth )
					vars.wrapper.css('height', 'auto').hide();
				else {
					vars.wrapper.css('height', 'auto');
					
					var docHeight = vars.document.height() - setTopOffset( vars );
					//var height = (vars.computedHeight > docHeight) ? vars.computedHeight : docHeight;
					vars.wrapper.css('height', docHeight+'px');
				}

			}, timeout );
		}

		function setTopOffset ( vars ) {
			var target = (settings.offsetMenuTargetSelector === '') ? vars.nav : $( settings.offsetMenuTargetSelector );
			var targetOffset = target.offset();
			var documentOffset = targetOffset.top + target.outerHeight();
			vars.wrapper.offset( { top: documentOffset } );
			return documentOffset;
		}

		function makeLink ( a ) {
			var link = [];

			link.text = a.text();
			link.hrefText = a.attr('href');
			link.href = (link.hrefText === undefined || link.hrefText === 'javascript:void(0);') ? '' : link.hrefText;
			link.html = (link.href.length) ? '<a class="' + settings.nestedItemLinkClass + '"' + 'href="' + link.href + '">' + link.text + '</a>' 
			: '<div class="' + settings.nestedItemNoLinkClass + '">' + link.text + '</div>';

			return link;
		}

		function makeItem ( el, link, dropID ) {
			var item = [];

			item.class = settings.nestedItemClass + ' ' + ( (link.href.length) ? settings.nestedItemLinkClass : '' );
			item.isDropdown = el.hasClass( settings.dropdownClass ) || el.hasClass( settings.dropdownSubMenuClass );
			item.dataDropdown = (item.isDropdown) ? 'data-dropdown="' + dropID + '"' : ''; 
			item.caretHtml = (item.isDropdown) ? '<div class="' + settings.caretClass + '" ' + item.dataDropdown + '>' + settings.caretIconHtml + '</div>' : '<div class="' + settings.noCaretClass + '"></div>';
			item.html = '<div class="' + item.class + '">' + item.caretHtml + link.html + '</div>';

			return item;
		}

		function makeItems ( items, vars ) {

			var html = '';

			items.each(function(){

				// Elements
				var el = $(this);
				var a = el.children('a');
				var sub = el.children(settings.dropdownSelector);

				// Make Nested Item HTML
				var dropID = 'drop-' + uniqueNum();
				var link = makeLink( a );
				var item = makeItem( el, link, dropID );

				// Add IDs to match new menu links to sub navs.
				a.attr('data-label', dropID);
				sub.attr('data-dropdown', dropID);
				
				html += item.html;
				
				if (settings.realMenuTriggers && el.parent().is(vars.mainNav) && sub.length) {
					el.attr('data-dropdown', dropID);
				}
			});

			var els = $(html);
			
			
			// allows the linkless nav item to also trigger the dropdown, not just the caret.
			if ( settings.linklessTriggers ) {
				els.find( '.' + settings.nestedItemNoLinkClass ).each(function(){
					var el = $(this);
					var dropdownEl = el.closest( '.' + settings.nestedItemClass ).find('[data-dropdown]');
					
					// Make sure there's even a dropdown to map it to.
					if (dropdownEl.length) {
						el.attr('data-dropdown', dropdownEl.attr('data-dropdown'));
					}
				});
			}
			
			callEvent( els.find( '[data-dropdown]' ) , 'nested-caret', vars );
			if (settings.realMenuTriggers) {
				callEvent( vars.mainNav.children().filter( '[data-dropdown]' ) , 'nested-caret', vars );
			}

			return els;
		}

		// Get a nested box!
		function getNestedBox( caret, vars ){

			var dropID = caret.attr( 'data-dropdown' );
			
			var subMenuTitle = vars.mainNav.find('[data-label=' + dropID + ']').text();
			var subMenuHrefText = vars.mainNav.find('[data-label=' + dropID + ']').attr('href');
			var subMenuTitleHtml = (subMenuHrefText === undefined || subMenuHrefText === 'javascript:void(0);') ? subMenuTitle : '<a href="' + subMenuHrefText + '">' + subMenuTitle + '</a>';
		
			var subMenuItems = vars.mainNav.find('[data-dropdown=' + dropID + ']').children( settings.subNavChildrenSelector );

			var els = makeItems( subMenuItems, vars );

			var dropWrapper = [];
			dropWrapper.close = '<div class="' + settings.nestedBoxCloseClass + '">' + settings.nestedBoxIconHtml + '</div>';
			dropWrapper.title = '<div class="' + settings.nestedBoxTitleClass + '">' + subMenuTitleHtml + dropWrapper.close + '</div>';
			dropWrapper.content = '<div class="' + settings.nestedBoxClass + '"></div>';

			dropWrapper.containerStart = '<div class="' + settings.nestedDropdownContainerClass + ' ' + settings.transClass + '">';
			dropWrapper.containerMid = dropWrapper.title + dropWrapper.content;
			dropWrapper.containerEnd = '</div>';

			var html = dropWrapper.containerStart + dropWrapper.containerMid + dropWrapper.containerEnd;
			var nestedBox = $( html );
			
			nestedBox.find( '.' + settings.nestedBoxClass ).html(els);
			callEvent( nestedBox.find( '.' + settings.nestedBoxCloseClass ), 'close-nested-box', vars );

			return nestedBox;
		}

		/*
		 * Creates only the nested-nav wrapper and top level menu items
		 */
		function makeMenu ( vars ) {

			var topLevelItems = vars.mainNav
					.children( settings.mainNavChildrenSelector );

			vars.wrapper.append(
					makeItems( topLevelItems, vars )
				);

			vars.nav.prepend( vars.wrapper );

			setTopOffset( vars );

			setHeight( vars, settings.setHeightInitialDelay );
		}


		function callEvent( els, eventType, vars ) {
			switch (eventType) {
				case 'nested-caret':
					// Makes Nested Box
					els.click(function( e ) {
						var el = $(this);
						
						if (el.parent().is(vars.mainNav)) {
							
							if (vars.window.width() > settings.realMenuTriggerWidth) {
								return;
							} else {
								e.preventDefault();
								e.stopImmediatePropagation();
							}
							
						}
						
						var backdrop = $( '#' + settings.backdropID);
						var dropdown = getNestedBox( el, vars );
						
						// Send other dropdowns behind backdrop
						vars.wrapper
								.find( '.' + settings.nestedDropdownContainerClass )
								.addClass( settings.nestedSendBackClass );

						// If no backdrop, create one.
						if (!backdrop.length ) {
							vars.wrapper.append( vars.backdropHtml );
						}

						// Add new dropdown to DOM
						vars.wrapper.append( dropdown );

						// Correct for very long dropdowns
						$('html, body').animate({
							scrollTop: 0
						}, 300);

						// Varied Performance, wait to add show class and reset height
						setTimeout(function(){
							dropdown.addClass( settings.showDropdownClass );
							setHeight( vars, settings.setHeightDropdownDelay );
						}, settings.showDropdownDelay );
					});
					break;
				case 'window-resize':
					// Manage resizing/changing the window width
					els.resize(function(){
						var width = $(this).width();

						if ( storedWidth === width )
							return;

						if ( width < settings.menuCollapseWidth ) {
							setHeight( vars, settings.setHeightInitialDelay );
							vars.wrapper.removeClass( settings.nestedDrawerShowClass ).show();
						} else {
							vars.wrapper.removeClass( settings.nestedDrawerShowClass ).hide();
						}
						vars.wrapper.find( '#' + settings.backdropID).add( '.' + settings.nestedDropdownContainerClass ).remove();
						storedWidth = width;
						
						setTopOffset( vars );
					});
					break;
				case 'menu-btn':
					els.click(function(e){
						// Leave at bigger resolutions
						if (vars.window.width() > settings.menuCollapseWidth)
							return;

						// Always Prevent Default
						e.preventDefault();
						e.stopPropagation();

						// For clicks after the first run.
						var possibleMenu = $('#' + settings.wrapperID);
						if (possibleMenu.length && possibleMenu.hasClass( settings.nestedDrawerShowClass )) {
							// Hide Menu.
							possibleMenu.removeClass( settings.nestedDrawerShowClass );
							setTimeout(function(){
								$('body').css('overflow-x', 'auto');
								setHeight( vars, 0 );
							}, settings.nestedDrawerTransDelay );
							return;
						} else if (possibleMenu.length) {
							// Show Menu
							possibleMenu.addClass( settings.nestedDrawerShowClass );
							setTimeout(function(){
								$('body').css('overflow-x', 'hidden');
							}, settings.nestedDrawerTransDelay );
							return;
						}
					});
					break;
				case 'close-nested-box':
					els.click(function(){
						var close = $(this);
						var curDropdown = close.closest( '.' + settings.nestedDropdownContainerClass );
						var backdrop = vars.wrapper.find( '#' + settings.backdropID );
						curDropdown.removeClass( settings.showDropdownClass );

						setTimeout(function(){
							curDropdown.remove();
							var prevDropdown = $( '.' + settings.nestedDropdownContainerClass ).last();
							prevDropdown.removeClass( settings.nestedSendBackClass );
							setHeight( vars, 0 );
							if (!$( '.' + settings.nestedDropdownContainerClass).length) {
								backdrop.remove();
							}
						}, settings.hideDropdownDelay );
					});
					break;
			}
		}



		return this.each( function() {

			var $nav = $( this );

			var vars = {
				nav: $nav,
				computedHeight: 0,
				menuButton: $(settings.menuButtonSelector),
				mainNav: $(settings.mainNavSelector),
				wrapper: $('<div />').attr(settings.wrapperAttr)
						.addClass( settings.transClass )
						.attr('id', settings.wrapperID),
				window: $(window),
				document: $(document),
				backdropHtml: $('<div></div>').attr( settings.backdropAttr )
						.attr( 'id' , settings.backdropID )
			};


			// Initialize
			makeMenu( vars );

			// Events
			callEvent( vars.window, 'window-resize', vars );
			callEvent( vars.menuButton, 'menu-btn', vars );
		});
	};

	$.fn.nestednav.defaults = {
		
		// Delays
		setHeightInitialDelay: 300,
		setHeightDropdownDelay: 550,
		hideDropdownDelay: 550,
		showDropdownDelay: 330,
		nestedDrawerTransDelay: 550,

		// Selectors
		menuButtonSelector: '.btn.btn-navbar',
		mainNavSelector: '.navbar-inner ul.nav',
		dropdownSelector: 'ul', // the element, perhaps a ul, that contains dropdown menu items.
		mainNavChildrenSelector: 'li', // must have a elements inside
		subNavChildrenSelector: 'li', // must have a elements inside,
		offsetMenuTargetSelector: '', // will compute window offset of main nav unless otherwise specified

		// Classes - Normal Navigation (Bootstrap)
		dropdownClass: 'dropdown', // Top Level
		dropdownSubMenuClass: 'dropdown-submenu', // Sub Navs

		// Classes - Nested Nav (Generated)
		nestedItemClass: 'nested-item',
		nestedItemLinkClass: 'nested-link', // applied to nested a's and their parents, style accordingly.
		nestedItemNoLinkClass: 'nested-no-link', // applied to items without links, style accordingly.
		showDropdownClass: 'nested-dropdown-show',
		nestedDrawerShowClass: 'nested-drawer-show',
		nestedDropdownContainerClass: 'nested-container',
		nestedSendBackClass: 'nested-back',
		noCaretClass: 'nested-no-caret',
		caretClass: 'nested-caret',
		nestedBoxTitleClass: 'nested-box-title',
		nestedBoxCloseClass: 'nested-box-close',
		nestedBoxClass: 'nested-box',
		transClass: 'nested-trans',

		// HTML
		caretIconHtml: '<i class="icon-caret-down"></i>', // any html to use to create the icon for carets.
		nestedBoxIconHtml: '<i class="icon-remove"></i>',

		// IDs
		wrapperID : 'nested-nav',
		backdropID: 'nested-backdrop',

		// Attribute Objects
		wrapperAttr: {
			class : 'nested-nav nested-hide'
		},
		backdropAttr: {
			class: 'modal-backdrop fade in'
		},
		
		// Widths, Booleans, Misc
		menuCollapseWidth: 1000,
		linklessTriggers: true, // whether linkless nav items should also trigger dropdowns.
		realMenuTriggers: false,
		realMenuTriggerWidth: 1000
	};

})( jQuery );