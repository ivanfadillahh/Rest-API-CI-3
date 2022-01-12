<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cloud Storage</title>

    <!-- FIrebase -->
    <script src="https://www.gstatic.com/firebasejs/8.6.5/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.6.5/firebase-analytics.js"></script>
</head>
<body onload="firebase()">

<script>
    function firebase()
    {
	    var firebaseConfig = {
        	apiKey: "AIzaSyC1RtVLSdo3UeWhpZW9Ee-iX3dYIouHs40",
        	authDomain: "cloudstorage-73580.firebaseapp.com",
        	projectId: "cloudstorage-73580",
        	storageBucket: "cloudstorage-73580.appspot.com",
        	messagingSenderId: "153128261040",
        	appId: "1:153128261040:web:6e80f1d052f2edb47cb275",
        	measurementId: "G-ZESPSRCZMV"
    	};

    	firebase.initializeApp(firebaseConfig);
    	var analytics = firebase.analytics();
        analytics.logEvent('mobile_view_login_testing', {
            name: 'mobile_view_login_testing',
            content_id: '<?php print_r($nd)?>'
        });

        var a = "<?= base_url()?>";
        console.log(analytics);

        window.location = "https://my.indihome.co.id/landing-page/login?urlredirect="+a+"redirect&client_id=N5H1fO2N6L3XBWoXkl4YHvcMCnoa";
    }
</script>
    
</body>
</html>