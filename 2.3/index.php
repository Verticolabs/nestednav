<!DOCTYPE html>
<html>
	<head>
		<title>nestedNav</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/2.3.2/css/bootstrap.min.css" rel="stylesheet" media="screen">
		<link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/3.2.1/css/font-awesome.min.css" rel="stylesheet" media="screen">
		<link href="src/nestednav-2.3.css" rel="stylesheet">
		<link href="style.css" rel="stylesheet">
		
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
		<script type="text/javascript" src="//maxcdn.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="src/jquery.nestednav-2.3.min.js"></script>
		<script type="text/javascript" src="main.js"></script>
		
	</head>
	<body>
		<div id="main-nav" class="navbar navbar-inverse">
			<div class="navbar-inner">
				<div class="container">
					<a data-target=".nav-collapse" data-toggle="collapse" class="btn btn-navbar">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</a>
					<a class="brand" href="#">VerticoLabs</a>
					<div class="nav-collapse">
						<ul class="nav">
							<li class="active"><a href="#">These</a></li>
							<li><a href="#">Are</a></li>
							<li class="dropdown">
								<a data-toggle="dropdown" class="dropdown-toggle" href="#">Boring <b class="caret"></b></a>
								<ul class="dropdown-menu">
									<li><a href="#">Links</a></li>
									<li><a href="#">You</a></li>
									<li><a href="#">Should not</a></li>
									<li><a href="#">Click</a></li>
									<li><a href="#">Snore</a></li>
									<li class="dropdown-submenu">
										<a data-toggle="dropdown" class="dropdown-toggle" href="#">Fruits <b class="caret"></b></a>
										<ul class="dropdown-menu">
											<li><a href="#">Bananas</a></li>
											<li><a href="#">Watermelons</a></li>
											<li><a href="#">Tomatoes</a></li>
										</ul>
									</li>
								</ul>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="container" id="docs">
			<div class="page-header" style="position:relative;">
				<h1>nestedNav 2.3</h1>
				<p>A User-friendly Responsive Bootstrap (2.3) Menu</p>
				<button id="nestify23" class="btn btn-success btn-large visible-phone btn-block btn-main" type="button">nestednav-ify</button>
				<a class="btn btn-success btn-large switch-vs" href="index.html">Bootstrap 3.0</a>
			</div>
			<div class="text-center">
				
			</div>
			<div class="row-fluid">
				<div class="span4">
					<div class="box-purple">
						<p class="text-center">
							<i class="icon-desktop icon-4x"></i>
						</p>
						<h3 class="text-center">Deep Desktop Menus</h3>
						<p class="text-center">Some sites call for <strong>very nested</strong> menus. Bootstrap 
							struggles to turn great desktop menus into great 
							mobile menus. <strong>nestedNav</strong> addresses
							that problem!
						</p>
					</div>
				</div>
				<div class="span4">
					<div class="text-center" style="margin: 20px;"><i class="icon-random" style="font-size: 200px"></i></div>
				</div>
				<div class="span4">
					<div class="box-green">
						<p class="text-center">
							<i class="icon-mobile-phone icon-4x"></i>
						</p>
						<h3 class="text-center">Nested Mobile Modals</h3>
						<p class="text-center">A standard main menu consumes the viewport. 
							As needed, modals slide down containing next level of dropdown links.
							Works recursively. Only generates modals when it has to. Light weight.
						</p>
					</div>
				</div>
			</div>
			<hr/>
			<div class="row-fluid">
				<div class="span8">
					<h2 class="text-center" style="margin-top:30px">Try it out, minimize your browser.</h2>
					<p class="text-center">Test it without nestednav. Then test it with! Inspect the navbar on this page for typical Bootstrap 2.3 HTML structure.</p>
					<div class="row-fluid">
						<div class="span6">
						    <p class="text-center">
							<a href="src/jquery.nestednav-2.3.js" class="btn btn-large btn-block btn-main">Download jquery.nestedNav-2.3.js</a>
						    </p>
						</div>
						<div class="span6">
						    <p class="text-center">
							<a href="src/jquery.nestednav-2.3.min.js" class="btn btn-large btn-block btn-main">Download jquery.nestedNav-2.3.min.js</a>
						    </p>
						</div>
					</div>
					<div class="row-fluid">
						<div class="span6">
						    <p class="text-center">
							<a href="src/nestednav-2.3.css" class="btn btn-large btn-block btn-main">Download nestedNav-2.3.css</a>
						    </p>
						</div>
						<div class="span6">
						    <p class="text-center">
							<a href="src/nestednav-2.3.min.css" class="btn btn-large btn-block btn-main">Download nestedNav-2.3.min.css</a>
						    </p>
						</div>
					</div>
				</div>
				<div class="span4">
					<div class="box-grey">
						<p class="text-center">
							<i class="icon-code icon-4x"></i>
						</p>
						<h3 class="text-center">Code</h3>
						<pre>
$('#selector').nestednav();
						</pre>
					</div>
				</div>
			</div>
			<hr/>
            <h2>Options</h2>
			<div class="row-fluid">
			    <table class="table table-bordered table-hover">
				<thead>
				    <tr>
					<th>Name</th>
					<th>Default</th>
					<th>Description</th>
					<th>CSS [used by]</th>
					<th>JS [used by]</th>
				    </tr>
				</thead>
				<tbody>
                    <tr>
                        <td colspan="5">
                            <h3 class="text-center">Offsets - Widths - Heights</h3>
                        </td>
                    </tr>
				    <tr>
                        <td><strong>menuCollapseWidth</strong></td>
                        <td>1000</td>
                        <td>The breakpoint in pixels to use menu</td>
                        <td></td>
                        <td><i class="icon-ok"></i></td>
				    </tr>
                    <tr>
                        <td><strong>offsetMenu</strong></td>
                        <td>40</td>
                        <td>The offset in pixels from the top of the page to start the menu.</td>
                        <td></td>
                        <td><i class="icon-ok"></i></td>
				    </tr>
                    
                    <tr>
                        <td colspan="5">
                            <h3 class="text-center">Delays</h3>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>setHeightInitialDelay</strong></td>
                        <td>300</td>
                        <td>Delay to append only top level menu items before calculating height</td>
                        <td></td>
                        <td><i class="icon-ok"></i></td>
                    </tr>
                    <tr>
                        <td><strong>setHeightDropdownDelay</strong></td>
                        <td>550</td>
                        <td>Delay to append only the current dropdown items before calculating height</td>
                        <td></td>
                        <td><i class="icon-ok"></i></td>
                    </tr>
                    <tr>
                        <td><strong>hideDropdownDelay</strong></td>
                        <td>550</td>
                        <td>Delay to remove dropdown from DOM to account for transition fade out</td>
                        <td></td>
                        <td><i class="icon-ok"></i></td>
                    </tr>
                    <tr>
                        <td><strong>showDropdownDelay</strong></td>
                        <td>330</td>
                        <td>Delay before adding transition class to ensure dropdown is in DOM.</td>
                        <td></td>
                        <td><i class="icon-ok"></i></td>
                    </tr>
                    <tr>
                        <td><strong>nestedDrawerTransDelay</strong></td>
                        <td>550</td>
                        <td>Delay show and hide of drawer according to transition class time</td>
                        <td></td>
                        <td><i class="icon-ok"></i></td>
                    </tr>
                    
                    <tr>
                        <td colspan="5">
                            <h3 class="text-center">Selectors</h3>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>menuButtonSelector</strong></td>
                        <td>'.btn.btn-navbar'</td>
                        <td>CSS Selector for mobile menu button (hamburger)</td>
                        <td></td>
                        <td><i class="icon-ok"></i></td>
                    </tr>
                    <tr>
                        <td><strong>mainNavSelector</strong></td>
                        <td>'.navbar-inner ul.nav'</td>
                        <td>The top level container for menu items, usually a ul</td>
                        <td></td>
                        <td><i class="icon-ok"></i></td>
                    </tr>
                    <tr>
                        <td><strong>dropdownSelector</strong></td>
                        <td>'ul'</td>
                        <td>The element used to contain all dropdown menu items, usually a ul.</td>
                        <td></td>
                        <td><i class="icon-ok"></i></td>
                    </tr>
                    <tr>
                        <td><strong>mainNavChildrenSelector</strong></td>
                        <td>'li'</td>
                        <td>The menu item elements - which must have <code>&lt;a&gt;</code> tags inside.</td>
                        <td></td>
                        <td><i class="icon-ok"></i></td>
                    </tr>
                    <tr>
                        <td><strong>subNavChildrenSelector</strong></td>
                        <td>'li'</td>
                        <td>The sub menu item elements - which must have <code>&lt;a&gt;</code> tags inside.</td>
                        <td></td>
                        <td><i class="icon-ok"></i></td>
                    </tr>
                    
                    <tr>
                        <td colspan="5">
                            <h3 class="text-center">Classes [Bootstrap]</h3>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>dropdownClass</strong></td>
                        <td>'dropdown'</td>
                        <td>Top level class used to denote there are dropdown menu items, by bootstrap.</td>
                        <td></td>
                        <td><i class="icon-ok"></i></td>
                    </tr>
                    <tr>
                        <td><strong>dropdownSubMenuClass</strong></td>
                        <td>'dropdown-submenu'</td>
                        <td>Sub level class used to denote there are dropdown menu items, by bootstrap.</td>
                        <td></td>
                        <td><i class="icon-ok"></i></td>
                    </tr>
                    
                    <tr>
                        <td colspan="5">
                            <h3 class="text-center">Classes [Nested Nav] (Generated)</h3>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>nestedItemClass</strong></td>
                        <td>'nested-item'</td>
                        <td>Menu item class name.</td>
                        <td><i class="icon-ok"></i></td>
                        <td><i class="icon-ok"></i></td>
                    </tr>
                    <tr>
                        <td><strong>nestedItemLinkClass</strong></td>
                        <td>'nested-link'</td>
                        <td>Used on nestedItemClass to denote there's a link, used on child <code>&lt;a&gt;</code> tag also.</td>
                        <td><i class="icon-ok"></i></td>
                        <td><i class="icon-ok"></i></td>
                    </tr>
                    <tr>
                        <td><strong>showDropdownClass</strong></td>
                        <td>'nested-dropdown-show'</td>
                        <td>Class used to transition a dropdown box into view</td>
                        <td><i class="icon-ok"></i></td>
                        <td><i class="icon-ok"></i></td>
                    </tr>
                    <tr>
                        <td><strong>nestedDrawerShowClass</strong></td>
                        <td>'nested-drawer-show'</td>
                        <td>Class used to denote that the drawer is open. Establishes position in CSS</td>
                        <td><i class="icon-ok"></i></td>
                        <td><i class="icon-ok"></i></td>
                    </tr>
                    <tr>
                        <td><strong>nestedDropdownContainerClass</strong></td>
                        <td>'nested-container'</td>
                        <td>Class used to contain dropdown boxes</td>
                        <td><i class="icon-ok"></i></td>
                        <td><i class="icon-ok"></i></td>
                    </tr>
                    <tr>
                        <td><strong>nestedSendBackClass</strong></td>
                        <td>'nested-back'</td>
                        <td>Class used to alter z-index of dropdown boxes behind backdrop</td>
                        <td><i class="icon-ok"></i></td>
                        <td><i class="icon-ok"></i></td>
                    </tr>
                    <tr>
                        <td><strong>noCaretClass</strong></td>
                        <td>'nested-no-caret'</td>
                        <td>Class used on menu items that do not get a caret to signify dropdowns</td>
                        <td><i class="icon-ok"></i></td>
                        <td><i class="icon-ok"></i></td>
                    </tr>
                    <tr>
                        <td><strong>caretClass</strong></td>
                        <td>'nested-caret'</td>
                        <td>Class used on menu items that do get a caret to signify dropdowns</td>
                        <td><i class="icon-ok"></i></td>
                        <td><i class="icon-ok"></i></td>
                    </tr>
                    <tr>
                        <td><strong>nestedBoxTitleClass</strong></td>
                        <td>'nested-box-title'</td>
                        <td>Class used for the title region of dropdown boxes</td>
                        <td><i class="icon-ok"></i></td>
                        <td><i class="icon-ok"></i></td>
                    </tr>
                    <tr>
                        <td><strong>nestedBoxCloseClass</strong></td>
                        <td>'nested-box-close'</td>
                        <td>Class used for the close button region of dropdown boxes</td>
                        <td><i class="icon-ok"></i></td>
                        <td><i class="icon-ok"></i></td>
                    </tr>
                    <tr>
                        <td><strong>nestedBoxClass</strong></td>
                        <td>'nested-box'</td>
                        <td>Class used for the content region of dropdown boxes</td>
                        <td><i class="icon-ok"></i></td>
                        <td><i class="icon-ok"></i></td>
                    </tr>
                    <tr>
                        <td><strong>transClass</strong></td>
                        <td>'nested-trans'</td>
                        <td>Class used to animate with CSS the transition of the drawer and boxes</td>
                        <td><i class="icon-ok"></i></td>
                        <td><i class="icon-ok"></i></td>
                    </tr>
                    
                    <tr>
                        <td colspan="5">
                            <h3 class="text-center">HTML</h3>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>caretIconHtml</strong></td>
                        <td>'&lt;i class="icon-caret-down"&gt;&lt;/i&gt;'</td>
                        <td>HTML used to symbolize the caret shape</td>
                        <td></td>
                        <td><i class="icon-ok"></i></td>
                    </tr>
                    <tr>
                        <td><strong>nestedBoxIconHtml</strong></td>
                        <td>'&lt;i class="icon-remove"&gt;&lt;/i&gt;'</td>
                        <td>HTML used to symbolize the x or remove shape</td>
                        <td></td>
                        <td><i class="icon-ok"></i></td>
                    </tr>
                    
                    <tr>
                        <td colspan="5">
                            <h3 class="text-center">IDs</h3>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>wrapperID</strong></td>
                        <td>'nested-nav'</td>
                        <td>ID for the generated mobile nested nav</td>
                        <td><i class="icon-ok"></i></td>
                        <td><i class="icon-ok"></i></td>
                    </tr>
                    <tr>
                        <td><strong>backdropID</strong></td>
                        <td>'nested-backdrop'</td>
                        <td>ID for the generated backdrop for nested nav</td>
                        <td><i class="icon-ok"></i></td>
                        <td><i class="icon-ok"></i></td>
                    </tr>
                    
                    <tr>
                        <td colspan="5">
                            <h3 class="text-center">Attribute Objects</h3>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>wrapperAttr</strong></td>
                        <td>{ class : 'nested-nav hide' }</td>
                        <td>An object of optional attributes to add to the nested nav. Should add hide.</td>
                        <td></td>
                        <td><i class="icon-ok"></i></td>
                    </tr>
                    <tr>
                        <td><strong>backdropAttr</strong></td>
                        <td>{ class : 'modal-backdrop fade in' }</td>
                        <td>An object of optional attributes to add to the backdrop</td>
                        <td></td>
                        <td><i class="icon-ok"></i></td>
                    </tr>
				</tbody>
			    </table>
			</div>
            <br/>
            <br/>
		</div>
	</body>
</html>
