<html>

<script src="https://www.gstatic.com/firebasejs/8.6.5/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.6.5/firebase-analytics.js"></script>
<p id="response"></p>
<script>
    function FbLog() {
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
		const urlParams = new URLSearchParams(window.location.search);
        analytics.logEvent("ih_smart_upload", {
            name: "ih_smart_upload",
            content_id: "<?= $nd?>",
			start_time: "<?= date('Y-m-d')?>"
        });
		console.log(analytics);
        return analytics;
    }
	document.getElementById("response").innerHTML = JSON.stringify(FbLog());
</script>
</html>