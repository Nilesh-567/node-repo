const express = require("express");
const app = express();
const PORT = 3000;

app.use(express.static(__dirname));

// Factorial function
function factorial(n) {
    if (n < 0) return "undefined";
    return n === 0 ? 1 : n * factorial(n - 1);
}

// Handle factorial request
app.get("/factorial", (req, res) => {
    const number = parseInt(req.query.number);
    if (isNaN(number) || number < 0) {
        return res.json({ factorial: "Invalid input. Enter a non-negative integer." });
    }
    const result = factorial(number);
    res.json({ factorial: result });
});

app.listen(PORT, () => {
    console.log(`Server running at http://localhost:${PORT}`);
});
