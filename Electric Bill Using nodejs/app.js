const express = require('express');
const bodyParser = require('body-parser');
const path = require('path');

const app = express();
const PORT = process.env.PORT || 3000;

// Middleware to parse form data
app.use(bodyParser.urlencoded({ extended: false }));
app.use(bodyParser.json());

// Serve static files (HTML, CSS, JS)
app.use(express.static('public'));

// Define routes
app.post('/calculate', (req, res) => {
    const units = parseInt(req.body.units);

    let totalAmount = 0;

    if (units <= 50) {
        totalAmount = units * 3.50;
    } else if (units <= 150) {
        totalAmount = 50 * 3.50 + (units - 50) * 4.00;
    } else if (units <= 250) {
        totalAmount = 50 * 3.50 + 100 * 4.00 + (units - 150) * 5.20;
    } else {
        totalAmount = 50 * 3.50 + 100 * 4.00 + 100 * 5.20 + (units - 250) * 6.50;
    }

    // Generate bill details
    const billDetails = {
        month: req.body.month,
        units: units,
        name: req.body.name,
        address: req.body.address,
        houseNumber: req.body.houseNumber,
        consumerId: req.body.consumerId,
        bill: totalAmount.toFixed(2)
    };

    // Render HTML template with bill details
    res.send(renderBillTemplate(billDetails));
});

// Function to render HTML template with bill details
function renderBillTemplate(billDetails) {
    return `
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <title>Electricity Bill</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    background-color: #f4f4f4;
                    margin: 0;
                    padding: 0;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    height: 100vh;
                }

                .bill-container {
                    background-color: #fff;
                    width: 400px;
                    padding: 20px;
                    border: 2px solid #333;
                    border-radius: 10px;
                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
                    text-align: left;
                }

                h1 {
                    color: black;
                    text-align: center;
                }

                .bill-details {
                    margin-bottom: 20px;
                }

                .bill-details p {
                    margin: 5px 0;
                }

                #billResult {
                    padding: 10px;
                    border: 1px solid black;
                    border-radius: 5px;
                    text-align: center;
                }
            </style>
        </head>
        <body>
            <div class="bill-container">
                <h1>Electricity Bill</h1>
                <div class="bill-details">
                    <p><strong>Month:</strong> ${billDetails.month}</p>
                    <p><strong>Consumer Name:</strong> ${billDetails.name}</p>
                    <p><strong>Address:</strong> ${billDetails.address}</p>
                    <p><strong>House Number:</strong> ${billDetails.houseNumber}</p>
                    <p><strong>Consumer ID:</strong> ${billDetails.consumerId}</p>
                    <p><strong>Total Units Consumed:</strong> ${billDetails.units}</p>
                </div>
                <div id="billResult">
                    <p><strong>Total Electricity Bill:</strong> Rs. ${billDetails.bill}</p>
                </div>
            </div>
        </body>
        </html>
    `;
}

app.listen(PORT, () => console.log(`Server is running on http://localhost:${PORT}`));

