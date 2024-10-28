function calculateFactorial() {
    const number = document.getElementById("numberInput").value;

    fetch(`/factorial?number=${number}`)
        .then(response => response.json())
        .then(data => {
            document.getElementById("result").innerText = `Factorial: ${data.factorial}`;
        })
        .catch(error => {
            document.getElementById("result").innerText = `Error: ${error.message}`;
        });
}
