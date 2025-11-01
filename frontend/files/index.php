<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cloud App Dashboard</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #6dd5fa, #2980b9);
            color: #fff;
            text-align: center;
            margin: 0;
            padding: 0;
        }

        header {
            background: rgba(0, 0, 0, 0.3);
            padding: 20px;
            font-size: 1.5rem;
            font-weight: bold;
        }

        main {
            padding: 50px 20px;
            min-height: 100vh;
        }

        .card {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            max-width: 600px;
            margin: 0 auto;
            padding: 30px;
            box-shadow: 0 0 15px rgba(0,0,0,0.2);
        }

        h1 {
            font-size: 2rem;
            margin-bottom: 15px;
        }

        p {
            font-size: 1.1rem;
            margin-bottom: 10px;
        }

        button {
            background-color: #fff;
            color: #2980b9;
            font-weight: bold;
            border: none;
            border-radius: 8px;
            padding: 10px 20px;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover {
            background-color: #2980b9;
            color: #fff;
        }

        #status {
            margin-top: 15px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <header>
        Application Portal
    </header>
    <main>
        <div class="card">
            <h1>Welcome to Our  App!</h1>
            <p>Backend connected at: <strong>http://103.36.188.169:5000</strong></p>
            <button onclick="checkBackend()">Check Backend Status</button>
            <p id="status">Status: Not checked yet</p>
        </div>
    </main>

    <script>
        async function checkBackend() {
            const backendUrl = 'http://103.36.188.169:5000/';
            const statusEl = document.getElementById('status');
            statusEl.textContent = 'Checking...';

            try {
                const response = await fetch(backendUrl);
                if (response.ok) {
                    const text = await response.text();
                    statusEl.textContent = '✅ Backend is online: ' + text;
                } else {
                    statusEl.textContent = '⚠️ Backend responded with error: ' + response.status;
                }
            } catch (error) {
                statusEl.textContent = '❌ Could not connect to backend';
            }
        }
    </script>
</body>
</html>
