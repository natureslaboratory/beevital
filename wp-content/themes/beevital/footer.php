<div id="footer_wrapper" class="container__outer">

    <div class="container__inner mw_1366">

        <div id="footer">

            <div class="column" id="contact">

                <div class="sub_heading">
                    Contact us
                </div>

                <p>
                    <strong>Phone:</strong> +44 (0)1947 602346
                </p>

                <p>
                    <strong>Address:</strong> Unit 3b, Enterprise Way, Whitby,<br>
                    North Yorkshire, YO22 4NH<br>
                    United Kingdom
                </p>

                <p>
                    <strong>Email:</strong> <a href="mailto:sales@beevitalpropolis.com">sales@beevitalpropolis.com</a>
                </p>

                <p>
                    <strong>We accept:</strong>
                </p>

                <div class="payment_methods">

                    <a href="#">
	                    <span>VISA</span>
                        <i class="fab fa-cc-visa"></i>
                    </a>

                    <a href="#">
	                    <span>Mastercard</span>
                        <i class="fab fa-cc-mastercard"></i>
                    </a>

                    <a href="#">
	                    <span>PayPal</span>
                        <i class="fab fa-cc-paypal"></i>
                    </a>

                </div>

            </div>

            <div class="column">

                <div class="sub_heading">
                    Get Help
                </div>

                <ul class="quick_links">

                    <li>
                        <a href="/ordering">
                            Ordering
                        </a>
                    </li>

                    <li>
                        <a href="/delivery-and-returns">
                            Delivery and returns
                        </a>
                    </li>

                    <li>
                        <a href="/customer-service">
                            Customer service
                        </a>
                    </li>

                    <li>
                        <a href="/privacy-policy">
                            Privacy policy
                        </a>
                    </li>

                    <li>
                        <a href="/terms-conditions">
                            Terms & Conditions
                        </a>
                    </li>

                </ul>

            </div>

            <div class="column">

                <div class="sub_heading">
                    About Propolis
                </div>

                <ul class="quick_links">

                    <li>
                        <a href="/what-is-propolis/" title="What is Propolis?">
                            What Is Propolis?
                        </a>
                    </li>
					
					<li>
                        <a href="/the-role-of-propolis-in-the-beehive/" title="The Role of Propolis in the Beehive">
                            The Role Of Propolis in the Beehive
                        </a>
                    </li>
					
					<li>
                        <a href="/how-does-propolis-work/" title="How Does Propolis Work?">
                            How Does Propolis Work?
                        </a>
                    </li>
                    
                    <li>
                        <a href="/faq/" title="Propolis FAQ">
                            FAQ
                        </a>
                    </li>
					
                </ul>

            </div>

            <div class="column">

                <div class="sub_heading">
                    Our Friends
                </div>

                <ul class="quick_links">

                    <li>
                        <a href="https://iprg.info" title="International Propolis Research Group">
                            International Propolis Research Group
                        </a>
                    </li>

                    <li>
                        <a href="https://sweetcecilys.com" title="Natutal Skincare">
                            Sweet Cecily's Natural Skincare
                        </a>
                    </li>

                    <li>
                        <a href="https://herbalapothecaryuk.com" title="Herbal Medicines, Remedies & Tinctures">
                            Herbal Apothecary
                        </a>
                    </li>

                    <li>
                        <a href="https://natureslaboratory.co.uk">
                            Nature's Laboratory
                        </a>
                    </li>

                </ul>

            </div>

            <div class="column">

                <div class="sub_heading">
                    Stay in touch
                </div>

                <p>
                    Find us on the following social channels
                </p>

                <div class="social_links">

                    <a href="https://facebook.com/beevitalpropolis">
                        <span>Facebook</span>
                        <i class="fab fa-facebook-f"></i>
                    </a>

                    <a href="https://instagram.com/beevitalpropolis">
	                    <span>Instagram</span>
                        <i class="fab fa-instagram"></i>
                    </a>

                </div>

            </div>

        </div>

    </div>

</div>
<script>

    // MOBILE NAV

    document.querySelector('.burger_cta').addEventListener('click', (e) => {
        e.preventDefault();

        document.querySelector('body').classList.add('open');
    });

    document.querySelector('.close_cta').addEventListener('click', (e) => {
        e.preventDefault();

        document.querySelector('body').classList.remove('open');
    });

    document.querySelector('.dropdown_toggle').addEventListener('click', (e) => {
        e.preventDefault()

        e.target.closest('li').classList.toggle('open');
    });


    // POPUP

    Array.from(document.querySelectorAll('.search_popup_open')).forEach((popupCta) => {
        popupCta.addEventListener('click', (e) => {
            e.preventDefault();

            document.getElementById('search_popup').classList.add('open');
            document.querySelector('body').style.overflow = 'hidden';
        });
    });

    document.getElementById('search_popup').addEventListener('click', (e) => {
        if (!e.target.closest('.popup_content')) {
            document.getElementById('search_popup').classList.remove('open');
            document.querySelector('body').style.overflow = 'visible';
        }
    });

</script>

<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>

<?php wp_footer(); ?>



<!-- Matomo -->
<script>
  var _paq = window._paq = window._paq || [];
  /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
  _paq.push(['trackPageView']);
  _paq.push(['enableLinkTracking']);
  (function() {
    var u="https://analytics.natureslaboratory.co.uk/";
    _paq.push(['setTrackerUrl', u+'matomo.php']);
    _paq.push(['setSiteId', '13']);
    var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
    g.async=true; g.src=u+'matomo.js'; s.parentNode.insertBefore(g,s);
  })();
</script>
<!-- End Matomo Code -->

<script type="application/ld+json">
{
  "@context" : "http://schema.org",
  "@type" : "Organization",
  "name" : "BeeVital",
 "url" : "https://beevitalpropolis.com",
 "sameAs" : [
   "https://twitter.com/BeeVitalUK",
   "https://www.facebook.com/beevitalpropolis", 
   "https://www.instagram.com/beevitalpropolis",
   "https://www.linkedin.com/company/beevital-propolis"
   ],
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "Unit 3B Enterprise Way",
    "addressRegion": "Whitby",
    "postalCode": "YO224NH",
    "addressCountry": "UK"
  }
}
</script>
<script type="text/javascript">
  window.woorankAssistantOptions = window.woorankAssistantOptions || {};
  window.woorankAssistantOptions.url = 'beevitalpropolis.com';
  window.woorankAssistantOptions.assistantPublicKey = '53e7c3e05e6b83beabe349e078b321d1';
  window.woorankAssistantOptions.collectWebVitals = true;
  (function() {
    var wl = document.createElement('script'); wl.type = 'text/javascript'; wl.async = true;
    wl.src = 'https://assistant.woorank.com/hydra/assistantLoader.latest.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(wl, s);
  })();
</script>

</body>
</html>
