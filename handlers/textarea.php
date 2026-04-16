<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>B24 SDK Test</title>
    <script src="https://unpkg.com/@bitrix24/b24jssdk@latest/dist/umd/index.js"></script>
    <style>
        .controls { display: flex; flex-direction: column; gap: 10px; max-width: 120px; }
        .row { display: flex; align-items: center; gap: 3px; }
        textarea { width: 100%; height: 50px; }
        button { padding: 3px 5px; cursor: pointer; }
        label { user-select: none; }
        #log {
            margin-top: 10px;
            padding: 2px;
            background: #f5f5f5;
            white-space: pre-wrap;
            font-family: monospace;
            font-size: 13px;
            max-height: 120px;
            overflow-y: auto;
        }
    </style>
</head>
<body>
<div class="controls">
    <textarea id="text" placeholder="Text to send...">Hello from iframe!</textarea>
    <div>
        <label><input type="checkbox" id="withNewLine"> add with new line</label><br>
        <label><input type="checkbox" id="replace" checked> replace whole text</label>
    </div>
    <div class="row">
        <button id="btnGet">Get text</button>
        <button id="btnSet">Set text</button>
    </div>
</div>

<div id="log"></div>

<script type="module">
    const logEl = document.getElementById('log')
    function log(label, data) {
        logEl.textContent += `text: ${JSON.stringify(data)}\n`;
        console.log(label, data)
    }

    const $b24 = await B24Js.initializeB24Frame()

    document.getElementById('btnGet').addEventListener('click', async () => {
        const response = await $b24.parent.message.send(
            'im:getImTextareaContent',
            {
                requestId: B24Js.Text.getUuidRfc4122(),
                isSafely: true,
                safelyTime: 1500
            }
        )
        log('GET result', response)
    })

    document.getElementById('btnSet').addEventListener('click', async () => {
        const response = await $b24.parent.message.send(
            'im:setImTextareaContent',
            {
                text: document.getElementById('text').value,
                requestId: B24Js.Text.getUuidRfc4122(),
                withNewLine: document.getElementById('withNewLine').checked,
                replace: document.getElementById('replace').checked,
                isSafely: true,
                safelyTime: 1500
            }
        )
        log('SET result', response)
    })
</script>
</body>
</html>
