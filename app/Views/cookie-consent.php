<link rel="stylesheet" href="<?= base_url(); ?>/public/assets/css/cookie-consent.css">
<div class="container-fluid px-4 py-2" id="cookieConsentWrapper">
    <div id="cookieConsentContentWrapper" class="w-100 bg-white rounded container-fluid py-2">    
        <h3 class="cookie-consent-title">Allow Cookies <?= $continentCode?></h3>
        <p class="cookie-consent-content">
            We use cookies to improve your experience on NODAQ and to show you suitable promotions.
            For more information please read out updated <a href="<?=$ccpaForNodaq?>">CCPA</a>, <a href="<?=$privacyPolicy?>">Privacy Policy</a>, and <a href="<?= $cookiePolicy?>">Cookie Policy</a>
        </p>
        <div class="container-fluid text-right">
            <button onclick="acceptCookie()" id="btnAcceptCookie" class="btn btn-primary d-inline">Accept</button>
            <button onclick="declineCookie()" id="btnDeclineCookie" class="btn btn-muted d-inline">Decline</button>
        </div>
    </div>
</div>
<script>
    const acceptCookie = () => {
        document.cookie = "cookie-consent=accepted";
        document.querySelector('#cookieConsentWrapper').style.display = 'none';
    }
    const declineCookie = () => {
        document.cookie = "cookie-consent=declined";
        document.querySelector('#cookieConsentWrapper').style.display = 'none';
    }
</script>