// Ensure browser compatibility with Web Speech API
if ('webkitSpeechRecognition' in window) {
    const startButton = document.getElementById('start-btn');
    const outputText = document.getElementById('output-text');

    const recognition = new webkitSpeechRecognition();
    recognition.continuous = false; // Stop automatically when speech stops
    recognition.interimResults = false; // Show only final results
    recognition.lang = 'en-US';

    // Event listener for the button click
    startButton.addEventListener('click', () => {
        recognition.start();
        startButton.textContent = 'Listening...';
    });

    // When speech recognition provides a result
    recognition.onresult = (event) => {
        const speechResult = event.results[0][0].transcript;
        outputText.textContent = speechResult;
        startButton.textContent = '🎙️ Start Speaking';
    };

    // Handle speech recognition errors
    recognition.onerror = (event) => {
        console.error('Speech recognition error:', event.error);
        startButton.textContent = '🎙️ Start Speaking';
    };

    // Stop recognition if the user stops speaking
    recognition.onend = () => {
        startButton.textContent = '🎙️ Start Speaking';
    };
} else {
    alert('Your browser does not support Speech Recognition.');
}
