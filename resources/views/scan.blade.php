<!DOCTYPE html>
<html>
<head>
    <title>QR Scanner</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5-qrcode/2.0.3/html5-qrcode.min.js"></script>
</head>
<body>
    <h1>Nguawur Cik</h1>
    <img src="https://i.pinimg.com/474x/09/ba/92/09ba9297ec464820a46ea6af02a27077.jpg" alt="Photo">
    <div id="reader" style="width:500px;"></div>
    <form method="POST" action="/scan">
        @csrf
        <input type="text" name="email" placeholder="Enter email">
        <button type="submit">Submit</button>
    </form>
    <script>
        function onScanSuccess(decodedText, decodedResult) {
            document.querySelector('form').submit();
        }

        let html5QrcodeScanner = new Html5QrcodeScanner(
            "reader", { fps: 10, qrbox: 250 });
        html5QrcodeScanner.render(onScanSuccess);
    </script>
</body>
</html>
