<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Buy Small Small<?php echo @$title; ?></title>

	<!--Benifit App Authomation Notification/Messages-->

	<!-- Pixel Code for https://www.benifit.app/ -->
	<script defer src="https://www.benifit.app/pixel/2vq0e0bmaplcnwjf0q0yrdrx3390ef8j"></script>
	<!-- END Pixel Code -->

	<!--Segment App platform script for monitoning users on the website-->
	<script>
		! function() {
			var analytics = window.analytics = window.analytics || [];
			if (!analytics.initialize)
				if (analytics.invoked) window.console && console.error && console.error("Segment snippet included twice.");
				else {
					analytics.invoked = !0;
					analytics.methods = ["trackSubmit", "trackClick", "trackLink", "trackForm", "pageview", "identify", "reset", "group", "track", "ready", "alias", "debug", "page", "once", "off", "on", "addSourceMiddleware", "addIntegrationMiddleware", "setAnonymousId", "addDestinationMiddleware"];
					analytics.factory = function(e) {
						return function() {
							var t = Array.prototype.slice.call(arguments);
							t.unshift(e);
							analytics.push(t);
							return analytics
						}
					};
					for (var e = 0; e < analytics.methods.length; e++) {
						var key = analytics.methods[e];
						analytics[key] = analytics.factory(key)
					}
					analytics.load = function(key, e) {
						var t = document.createElement("script");
						t.type = "text/javascript";
						t.async = !0;
						t.src = "https://cdn.segment.com/analytics.js/v1/" + key + "/analytics.min.js";
						var n = document.getElementsByTagName("script")[0];
						n.parentNode.insertBefore(t, n);
						analytics._loadOptions = e
					};
					analytics._writeKey = "VitzN07U7oVhNnokCgPPkuxeD3h6C8Ti";;
					analytics.SNIPPET_VERSION = "4.15.3";
					analytics.load("VitzN07U7oVhNnokCgPPkuxeD3h6C8Ti");
					analytics.page();
				}
		}();
	</script>

	<!--Benifit App Authomation Notification/Messages-->

	<link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/img/favicon.png">
	<link rel="stylesheet" href="<?php echo base_url(); ?>asset/css/navbar.css?version=<?php echo rand(99, 999999999); ?>">
	<link rel="stylesheet" href="<?php echo base_url(); ?>asset/css/style1.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>asset/css/by-a-home.css?version=<?php echo rand(99, 999999999); ?>">
	<link rel="stylesheet" href="<?php echo base_url(); ?>asset/css/get-started.css?version=<?php echo rand(99, 999999999); ?>">
	<link rel="stylesheet" href="<?php echo base_url(); ?>asset/css/stats.css?version=<?php echo rand(99, 999999999); ?>">
	<link rel="stylesheet" href="<?php echo base_url(); ?>asset/css/main.css?version=<?php echo rand(99, 999999999); ?>">
	<link rel="stylesheet" href="<?php echo base_url(); ?>asset/css/footer.css?version=<?php echo rand(99, 999999999); ?>">
	<link rel="stylesheet" href="<?php echo base_url(); ?>asset/css/header-select.css?version=<?php echo rand(99, 999999999); ?>">
	<link rel="stylesheet" href="<?php echo base_url(); ?>asset/css/form-extra.css?version=<?php echo rand(99, 999999999); ?>">
	<link rel="stylesheet" href="<?php echo base_url(); ?>asset/css/global.css?version=<?php echo rand(99, 999999999); ?>">
	<link rel="stylesheet" href="<?php echo base_url(); ?>asset/css/login.css?version=<?php echo rand(99, 999999999); ?>">
	<link rel="stylesheet" href="<?php echo base_url(); ?>asset/css/form-step.css?version=<?php echo rand(99, 999999999); ?>">
	<link rel="stylesheet" href="<?php echo base_url(); ?>asset/css/form-register.css?version=<?php echo rand(99, 999999999); ?>">
	<link rel="stylesheet" href="<?php echo base_url(); ?>asset/css/productsList.css?version=<?php echo rand(99, 999999999); ?>">
	<link rel="stylesheet" href="<?php echo base_url(); ?>asset/css/propertyPage.css?version=<?php echo rand(99, 999999999); ?>">
	<link rel="stylesheet" href="<?php echo base_url(); ?>asset/css/responsiveslides.css?version=<?php echo rand(99, 999999999); ?>">

	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/slider.css?version=<?php echo rand(99, 999999999); ?>">




	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.css?version=<?php echo rand(99, 999999999); ?>">



	<link rel="stylesheet" href="<?php echo base_url(); ?>asset/css/info.css?version=<?php echo rand(99, 999999999); ?>">
	<link rel="stylesheet" href="<?php echo base_url(); ?>asset/css/form.css?version=<?php echo rand(99, 999999999); ?>">
	<link rel="stylesheet" href="<?php echo base_url(); ?>asset/css/tooltip.css?version=<?php echo rand(99, 999999999); ?>">
	<link rel="stylesheet" href="<?php echo base_url(); ?>asset/css/toggle-switch.css?version=<?php echo rand(99, 99999999); ?>" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>asset/css/number-field.css?version=<?php echo rand(99, 999999999); ?>">
	<link rel="stylesheet" href="<?php echo base_url(); ?>asset/css/properties.css?version=<?php echo rand(99, 999999999); ?>">

	<script src="<?php echo base_url(); ?>assets/js/jquery-1.11.0.min.js" crossorigin="anonymous"></script>
	<!--<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">--->
	<!-----Amplitude Analytics Script ------>
	<script type="text/javascript">
		(function(e, t) {
			var n = e.amplitude || {
				_q: [],
				_iq: {}
			};
			var r = t.createElement("script");
			r.type = "text/javascript";
			r.integrity = "sha384-+EO59vL/X7v6VE2s6/F4HxfHlK0nDUVWKVg8K9oUlvffAeeaShVBmbORTC2D3UF+";
			r.crossOrigin = "anonymous";
			r.async = true;
			r.src = "https://cdn.amplitude.com/libs/amplitude-8.17.0-min.gz.js";
			r.onload = function() {
				if (!e.amplitude.runQueuedFunctions) {
					console.log("[Amplitude] Error: could not load SDK")
				}
			};
			var i = t.getElementsByTagName("script")[0];
			i.parentNode.insertBefore(r, i);

			function s(e, t) {
				e.prototype[t] = function() {
					this._q.push([t].concat(Array.prototype.slice.call(arguments, 0)));
					return this
				}
			}
			var o = function() {
				this._q = [];
				return this
			};
			var a = ["add", "append", "clearAll", "prepend", "set", "setOnce", "unset", "preInsert", "postInsert", "remove"];
			for (var c = 0; c < a.length; c++) {
				s(o, a[c])
			}
			n.Identify = o;
			var u = function() {
				this._q = [];
				return this
			};
			var l = ["setProductId", "setQuantity", "setPrice", "setRevenueType", "setEventProperties"];
			for (var p = 0; p < l.length; p++) {
				s(u, l[p])
			}
			n.Revenue = u;
			var d = ["init", "logEvent", "logRevenue", "setUserId", "setUserProperties", "setOptOut", "setVersionName", "setDomain", "setDeviceId", "enableTracking", "setGlobalUserProperties", "identify", "clearUserProperties", "setGroup", "logRevenueV2", "regenerateDeviceId", "groupIdentify", "onInit", "logEventWithTimestamp", "logEventWithGroups", "setSessionId", "resetSessionId"];

			function v(e) {
				function t(t) {
					e[t] = function() {
						e._q.push([t].concat(Array.prototype.slice.call(arguments, 0)))
					}
				}
				for (var n = 0; n < d.length; n++) {
					t(d[n])
				}
			}
			v(n);
			n.getInstance = function(e) {
				e = (!e || e.length === 0 ? "$default_instance" : e).toLowerCase();
				if (!Object.prototype.hasOwnProperty.call(n._iq, e)) {
					n._iq[e] = {
						_q: []
					};
					v(n._iq[e])
				}
				return n._iq[e]
			};
			e.amplitude = n
		})(window, document);

		amplitude.getInstance().init("909e9b8a62c58824442945e6703f7ba5");
	</script>
	<!-----Amplitude Analytics Script ------>

	<!-----Data Script ------>
	<script async src="https:///tag.clearbitscripts.com/v1/pk_37b3240118bfdca2cb061665cc17319e/tags.js" referrerpolicy="strict-origin-when-cross-origin"></script>
	<!-----Data Script ------>
	<script>
		(function(w, t, c, p, s, e, l, k) {

			p = new Promise(function(r) {
				w[c] = {
					client: function() {
						return p
					}
				};

				l = document.createElement('div');
				l.setAttribute("id", "live-caller-widget");

				s = document.createElement(t);
				s.async = 1;
				s.setAttribute("data-livecaller", 'script');

				k = document.body || document.documentElement;
				k.insertBefore(l, k.firstChild);

				l.setAttribute("data-livecaller", 'mount-el');

				s.src = 'https://cdn.livecaller.io/js/app.js';

				e = document.getElementsByTagName(t)[0];
				e ? e.parentNode.insertBefore(s, e) : k.insertBefore(s, l.nextSibling);

				s.onload = function() {
					r(w[c]);
				};
			});

			return p;

		})(window, 'script', 'LiveCaller').then(function() {

			try {
				LiveCaller.config.merge({
					"widget": {
						"id": "5c2b9bac-785c-49f6-b122-87bbaaca1a7a"
					},
					"app": {
						"locale": "en"
					}
				});
				LiveCaller.liftOff();
			} catch (e) {

			}
		});
	</script>

	<!-- TruConversion for buy.smallsmall.com -->
	<script type="text/javascript">
		var _tip = _tip || [];
		(function(d, s, id) {
			var js, tjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) {
				return;
			}
			js = d.createElement(s);
			js.id = id;
			js.async = true;
			js.src = d.location.protocol + '//app.truconversion.com/ti-js/29045/42102.js';
			tjs.parentNode.insertBefore(js, tjs);
		}(document, 'script', 'ti-js'));
	</script>
	<!-- End TruConversion for buy.smallsmall.com -->

	<!-- Record Script Header -->

	<!--Start of Record Script-->
	<script>
		! function(b, e, d, f) {
			var a = b.createElement("script");
			a.async = !0,
				a.id = "torecord", a.src = "https://cdn.torecord.it/recordLoader.js?key=" + d;
			var c = b.getElementsByTagName("script")[0];
			c.parentNode.insertBefore(a, c)
		}(document, window, "bbf79ddc-ad1d-4417-9ed7-43a1977378b1")
	</script>
	<!--End of Record Script-->

	<!-- Nector Reward Widget -->

	<!-- <script>var nector_params = { customer_id: window.localStorage.getItem("nector-customer-id") }</script>
<script async src="https://cdn.nector.io/nector-static/no-cache/reward-widget/mainloader.min.js"
	data-op="widget"
	data-api_key="ca91f88601fb02c3c90db6bbd20da779dbb3f5d07827db9df99e290617d7d63e"
	data-platform="custom_website"
></script> -->


	<!-- Partnero Universal -->
	<script>
		(function(p, t, n, e, r, o) {
			p['__partnerObject'] = r;

			function f() {
				var c = {
					a: arguments,
					q: []
				};
				var r = this.push(c);
				return "number" != typeof r ? r : f.bind(c.q);
			}
			f.q = f.q || [];
			p[r] = p[r] || f.bind(f.q);
			p[r].q = p[r].q || f.q;
			o = t.createElement(n);
			var _ = t.getElementsByTagName(n)[0];
			o.async = 1;
			o.src = e + '?v' + (~~(new Date().getTime() / 1e6));
			_.parentNode.insertBefore(o, _);
		})(window, document, 'script', 'https://app.partnero.com/js/universal.js', 'po');
		po('settings', 'assets_host', 'https://assets.partnero.com');
		po('program', 'C6APLXAJ', 'load');
	</script>
	<!-- End Partnero Universal -->


</head>

<body>

	<!-- Nav bar starts here -->
	<nav class="NavBarWrapper">
		<div class="container">
			<a class="NavLogoLink" href="<?php echo base_url(); ?>" onclick='closeMobileMenu()'>
				<img src="<?php echo base_url(); ?>asset/img/buysmallsmall-logo.png" alt="buysmallsmall logo" />
			</a>
			<a class="CreateAccountLink" href="<?php echo base_url('signup'); ?>">Create Account</a>
			<div class="MenuIconBar" onclick="doSomething()">
				<i class="fa fa-bars" style=' color:black; font-size:25px'></i>
			</div>
			<ul id="NavItemList" class="NavItemList nav-menu">
				<div class="menu-wrapper">
					<div class="buy-section">
						<div class="icon-logo">
							<img src="<?php echo base_url(); ?>asset/img/buysmallsmall-logo.png" alt="buysmallsmall logo" />
							<span style='display:flex; align-items:center'>
								<span style='margin-right:30px;margin-bottom:""; color:#64318A; font-size:13px'>close</span>
								<div class="MenuIconBar" onclick="closeMobileMenu()" style="position:static">
									<i class="fa fa-times" style='color:#64318A; bottom:12px; font-size:22px; margin-bottom:40px;'></i>
								</div>
							</span>

						</div>

						<div class="nav-menu-links">
							<a class="NavLinkHome" href="/#" onclick='closeMobileMenu()'>
								Home
							</a>
							<a class="NavLink" href="<?php echo base_url('properties/onpl'); ?>" onclick='closeMobileMenu()'>
								<span style='font-size:9px;'>&nbsp;</span>
								Own Now Pay Later
							</a>
							<!---<a class="NavLink" href="<?php //echo base_url('properties/buy-to-live'); 
															?>" onclick='closeMobileMenu()'>
								<span style='font-size:9px;'>&nbsp;</span>
								Buy2live
							</a>--->
							<a class="NavLink" href="<?php echo base_url('properties/co-ownership'); ?>" onclick='closeMobileMenu()'>
								<span style='font-size:9px;'>&nbsp;</span>
								Buy2Co-Own
							</a>
							<a class="NavLink" href="<?php echo base_url('properties/bnpl'); ?>" onclick='closeMobileMenu()'>
								<span style='font-size:9px;'>&nbsp;</span>
								Buy Now Pay Later
							</a>
						</div>

						<div class="small-small-section">
							<a class="NavLink" href="https://rent.smallsmall.com" onclick='closeMobileMenu()'>
								<span style='font-size:9px'>Rent monthly</span>
								<span>RentSmallsmall</span>
							</a>
							<!-- 							<a class="NavLink" href="https://stay.smallsmall.com" onclick='closeMobileMenu()'>
								<span style='font-size:9px;'>Nightly stay</span>
								<span>StaySmallsmall</span>
							</a> -->
						</div>
					</div>
					<div class="navBtn NavBtn">

						<?php if (@$userID && !@$ongod && @$user_type == 'tenant' && $interest != 'Buy') { ?>
							<!--- Tenant button ---->
							<a class="login BtnLink" onclick='closeMobileMenu()' href="<?php echo base_url('logout'); ?>">Logout</a>
							<a class="signup BtnLink" onclick='closeMobileMenu()' href="<?php echo base_url('user/dashboard'); ?>">Dashboard</a>

						<?php } else if (@$userID && !@$ongod && @$user_type == 'landlord' && $interest != 'Buy') { ?>
							<!--- Landlord button ---->
							<a class="login BtnLink" onclick='closeMobileMenu()' href="<?php echo base_url('logout'); ?>">Logout</a>
							<a class="signup BtnLink" onclick='closeMobileMenu()' href="<?php echo base_url('user/dashboard'); ?>">Dashboard</a>

						<?php } else if (@$userID && !@$ongod && $interest == 'Buy') { ?>
							<!--- Landlord button ---->
							<a class="login BtnLink" onclick='closeMobileMenu()' href="<?php echo base_url('logout'); ?>">Logout</a>
							<a class="signup BtnLink" onclick='closeMobileMenu()' href="<?php echo base_url('user/dashboard'); ?>">Dashboard</a>

						<?php } else { ?>
							<a class="login BtnLink" onclick='closeMobileMenu()' href="<?php echo base_url('login'); ?>">Login</a>
							<a class="signup BtnLink" onclick='closeMobileMenu()' href="<?php echo base_url('signup'); ?>">Signup</a>

						<?php } ?>
					</div>
				</div>
			</ul>
		</div>
	</nav>
	<!-- Nav bar ends here -->
	<?php
	//$CI =& get_instance();

	//$property = $CI->insert_stats(); 	
	?>